<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    private $order;
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function show()
    {
        $customers = $this->customer->latest()->paginate(15);

        return view('admin.order.show', [
            'title' => 'Danh sách đơn hàng',
            'tieude' => 'Danh sách đơn hàng',
            'customers' => $customers
        ]);
    }
    public function detail($CodeId, Request $req)
    {
        $order = $this->customer->where('CodeId', $CodeId)->first();
        if (empty($order)) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại');
        }
        return view('admin.order.orderDetail', [
            'title' => 'Thông tin đơn hàng',
            'tieude' => 'Chi tiết đơn hàng : ' . $CodeId,
            'order' => $order,
        ]);
    }
    public function customerInfomation($CodeId, Request $req)
    {
        $customer = $this->customer->where('CodeId', $CodeId)->first();
        if (empty($customer)) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại');
        }
        return view('admin.order.customerDetail', [
            'title' => 'Thông tin khác hàng',
            'tieude' => 'Thông tin khác hàng ( ' . $CodeId . ' )',
            'customer' => $customer,
        ]);
    }
    public function changeStatus($code, Request $req){
        $data=$req->validate([
            'status' => 'required',
        ]);
        $customer = $this->customer->where('CodeId', $code)->first();
        if (empty($customer)) {
            return redirect()->back()->with('error', 'Sửa không thành công');
        }
        
        $customer->update([
            'status' => $data['status']
        ]);
        return redirect()->back()->with('success', 'Sửa thành công');
    }
    public function delete($code){
        $this->customer->where('CodeId',$code)->delete();

        return redirect()->back()->with('success', ' Đã xóa thành công đơn hàng : ,'.$code);
    }
}
