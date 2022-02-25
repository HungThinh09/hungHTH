<?php

namespace App\Http\Controllers\Home;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CartController extends Controller
{
    private $category;
    private $product;
    private $cart;
    public function __construct(Category $category, Product $product)
    {
        $this->category=$category;
        $this->product=$product;
        $this->menu= $this->category->where('parent_id', 0)->where('addMenu', 1)->where('active', 1)->orderby('id', 'DESC')->get();
    }
    public function myCart(){
        return view('home.cart.cart',[
            'title' => 'Giỏ hàng',
            'categoryMenu'=> $this->menu
        ]);
    }
    public function addCart(Request $req, CartHelper $cart){
        $data=$req->validate([
            'id' => 'required',
            'quantity' => ""
        ]);
       
        $product=$this->product::find($data['id']);
        if($product==null){
            return redirect()->back()->with('error','có lỗi trong quá trình mua hàng');
        }
        $quantity= isset($data['quantity']) && $data['quantity'] != 0 ? $data['quantity']:"1";
        $cart->add($product, $quantity);
       return redirect()->back()->with('success',$product->productName. ' đã được thêm vào giỏ hàng.');
    }
    public function cartUpdate($id, CartHelper $cart, Request $req){
     
        $quantity=$req->quantity?$req->quantity : 1;

        $cart->update($id,$quantity);
        return redirect()->back()->with('success','Thay đổi thành công !');
    }
    public function cartRemove(CartHelper $cart,$id){
        $cart->remove($id);
        return redirect()->back()->with('success','Đã xóa thành công');
        
    }
    public function cartClear(CartHelper $cart){
        $cart->clear();
        return redirect()->back()->with('success','Đã xóa giỏ hàng');
    }
}
