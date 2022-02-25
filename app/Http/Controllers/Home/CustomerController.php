<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Customer_cart;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $category;
    private $product;
    private $customer;
    public function __construct(Category $category, Product $product, Customer $customer, Customer_cart $customerCart)
    {
        $this->category = $category;
        $this->product = $product;
        $this->customer = $customer;
        $this->customerCart = $customerCart;
        $this->menu = $this->category->where('parent_id', 0)->where('addMenu', 1)->where('active', 1)->orderby('id', 'DESC')->get();
    }
    public function payment()
    {
        return view('home.cart.payment', [
            'title' => 'Thanh toán',
            'categoryMenu' => $this->menu
        ]);
    }
    public function paymented(Request $req, CartHelper $cart)
    {
        $data = $req->validate([
            'name' => 'required',
            'phone' => 'required|max:10|min:10',
            'note' => '',
            'address' =>  'required',
            'email' => 'email'
        ]);
        $codeId = substr($data['phone'], -3,) . rand(1, 1000);;
        $customer = $this->customer->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'note' => $data['note'],
            'codeId' => $codeId,
            'email' => $data['email']
        ]);
        foreach ($cart->items as $item) {
            $this->customerCart->create([
                'productId' => $item['id'],
                'customerId' => $customer->id,
                'quantity' => $item['quantity'],
                'price' => $item['priceSale']
            ]);
        }
        $this->sendEmail($customer);
        return redirect()->route('myCart')
            ->with('success', 'Đã đặt hàng thành công, Mã đơn hàng của bạn là: ' .$codeId . " . Thông tin chi tiết đã được gửi và mail của bạn");
    }

    public function sendEmail($data)
    {

        $email = $data->email;
        $name = $data->name;
        Mail::send(
            'home.cart.email',
            compact('data', 'name'),
            function ($message) use ($email, $name) {
                $message->to($email, $name);
                $message->subject('Thông tin Đơn hàng');
            }
        );
    }

    public function findOder()
    {
        return view('home.cart.followOrder', [
            'title' => 'Find my Oder',
            'categoryMenu' => $this->menu,
        ]);
    }

    public function myOredr(Request $req)
    {
        $data = $req->validate(
            [
                'maId' => 'required',
            ],
            [
                'maId.required' => 'Mã đơn hàng không được để trống'
            ]
        );
        $maId = $data['maId'];
        $customer = $this->customer->where('codeId', $maId)->first();
        if ($customer == null) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại');
        }
        return view('home.cart.followOrder', [
            'title' => 'My Oder',
            'categoryMenu' => $this->menu,
            'customer' => $customer
        ]);
    }
}
