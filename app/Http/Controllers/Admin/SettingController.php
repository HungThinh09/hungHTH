<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting=$setting;
    }
    public function show(Request $req){
        $page= isset($req->page)? $req->page: 1; 
        $quantity=4;
        $stt = ($page-1)*$quantity+1;
        $setting=$this->setting->orderby('id','desc')->paginate($quantity);
        return view('admin.setting.show',[
            'title'=> 'Setting',
            'tieude'=> 'Setting List',
            'settings' => $setting,
            'stt'=> $stt
        ]);
    }
    public function add(){
        return view('admin.setting.add',[
            'title'=> 'Setting',
            'tieude'=> 'Setting List',
        ]);
    }
    public function create(Request $req){
        $data=$req->validate([
            'key' => 'required|unique:settings,key',
            'value_key'=> 'required'
        ]);
        $setting=$this->setting->create([
            'key'=>$data['key'],
           'value_key' => $data['value_key'],
            'active' => $req->input('active',0),
            'type'=> $req->type
        ]);
        return redirect()->back()->with('success','Đã thêm thành công Setting '.$setting->key);
    }
    public function edit($id){
        $setting=$this->setting::find($id);
        if($setting==null){
            return redirect()->back()->with('error','Do not found!!!');
        }
       return view('admin.setting.edit',[
           'title'=>'Edit Setting',
           'tieude'=> 'Sửa Setting',
           'setting'=> $setting,
       ]);
    }
    public function update(Request $req){
        
    }
    public function delete($id){
       $this->setting::find($id)->delete();
          return redirect()->back()->with('success','Xóa thành công setting');
        }
    

}
