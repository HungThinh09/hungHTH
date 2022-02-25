<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Components\MenuRecusive;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;
    private $menuRecusive;
    public function __construct(Menu $menu, MenuRecusive $menuRecusive)
    {
     $this->menu=$menu;   
     $this->menuRecusive=$menuRecusive;
    }
    public function show(){
       $menus= $this->menu->orderby('id','desc')->get();
        return view('admin.menu.show',[
            'title' => 'List Menu',
            'tieude' =>'Danh sách menu',
            'menus' => $menus,
        ]);
    }
    public function add(){
        $menu=$this->menuRecusive->menuAdd();
        return view('admin.menu.add',[
            'tieude' => 'Thêm menu',
            'title'  => 'Menu',
            'option' => $menu
        ]);
    }
    public function create(Request $req){
        
        $data = $req->validate([
            'name' => 'required|unique:menus',
        ],);
        $this->menu->create([
            'name' => $data['name'],
            'slug' => str::slug($data['name']),
            'active' => $req->input('active',0),
            'parent_id' => $req->input('parent_id',0)
        ]);
        return redirect()->back()->with('success','Thêm thành công Menu '.$data['name']);
    }
    public function edit($id){
        $menu=$this->menu::find($id);
        $option=$this->menuRecusive->menuEdit($menu->parent_id);
        return view('admin.menu.edit',[
            'title'=>'Menu',
            'tieude'=>'Sửa menu '.$menu->name,
            'menu' => $menu,
            'option' => $option
        ]);

    }
    public function update(Request $req){
        $data=$req->validate([
            'name' => 'required',
            'id' => 'required'
        ],[
            'name.required' => "Tên menu không được bỏ trống"
        ]);
       
        $menu=$this->menu->find($req->id);
        if(empty($menu)){
            return redirect()->back()->with('error','Không tìm thấy menu cần update');
        }
        $menu->update([
            "name"=> $data['name'],
            'slug' => str::slug($data['name']),
            'active' => $req->input('active',0),
            'parent_id' => $req->input('parent_id',0),
        ]);
        return redirect()->back()->with('success','Sửa thành công '.$menu->name );
    }
    public function delete($id){
       $menu= $this->menu->find($id);
        $menu->delete();
        return redirect()->route('menu-show')->with('success','Đã xóa thành công '. $menu->name);
    }
}
