<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Models\Permisstion;
class RoleController extends Controller
{
    private $role;
    private $permisstion;
    public function __construct(Role $role,Permisstion $permisstion)
    {
    $this->role=$role;
    $this->permisstion=$permisstion;
    }

    public function show(Request $req){
        $page= isset($req->page)? $req->page: 1; 
        $quantity=10;
        $stt = ($page-1)*$quantity+1;
        $roles=$this->role->paginate($quantity); 
        return view('admin.role.show',[
            'title' => 'List Role',
            'tieude' => 'List Role',
            'roles' => $roles,
            'stt' => $stt
        ]);
    }

    public function add(){
        $permisstions=$this->permisstion->where('parent_id',0)->get();
        return view('admin.role.add',[
            'title' => 'Add Role',
            'tieude' => 'Thêm Role',
            'permisstions' => $permisstions
            
        ]);
    }

    public function create(Request $req){
        $data=$req->validate([
            'name' => 'required|unique:roles,name',
            'display' => 'required',
            'chilPer' => 'required',
        ]);
        $role=$this->role->create([
            'name' => $data['name'],
            'display_name' => $data['display']
        ]);
        $role->permisstion()->sync($data['chilPer']);
        return redirect()->back()->with('success','Thêm thành công role '.$role->name);
    }
    public function edit($id){
        $role=$this->role::find($id);
        if($role==null){
            return redirect()->back()->with('error','Không tìm thấy role, vui lòng quay lại sau');
        }
        $permisstions=$this->permisstion->where('parent_id',0)->get();
        return view('admin.role.edit',[
            'title' => 'Edit Role',
            'tieude' => 'Sửa Role',
            'role' => $role,
            'permisstions' => $permisstions,
        ]);
    }

    public function update(Request $req){
        $data=$req->validate([
            'name' => 'required',
            'display' => 'required',
            'id' => 'required',
            'chilPer' => 'required',
        ]);
       
        $role=$this->role::find($data['id']);
        if($role==null){
            return redirect()->back()->with('error','Không tìm thấy role, vui lòng quay lại sau');
        }
        $role->update([
            'name' => $data['name'],
            'display_name' => $data['display']
        ]);
        $role->permisstion()->sync($data['chilPer']);
        return redirect()->back()->with('success','Sửa thành công role '.$role->name);
    }

    public function delete($id){
        $role=$this->role::find($id);
        if($role==null){
            return redirect()->back()->with('error','Không tìm thấy role, vui lòng quay lại sau');
        }
        $role->delete();
        return redirect()->back()->with('success','Xóa thành công role '.$role->name);
    }

}
