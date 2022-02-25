<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }
    public function show(Request $req){
        $page= isset($req->page)? $req->page: 1; 
        $quantity=4;
        $stt = ($page-1)*$quantity+1;
        $users= $this->user->latest()->paginate($quantity);
       
        return view('admin.user.show',[
            'title' => 'User list',
            'tieude' => 'Danh sách User',
            'users' => $users,
            'stt' => $stt
        ]);

    }
    public function add(){
        $roles=$this->role->get();
        return view('admin.user.add',[
            'title'=> 'Add User',
            'tieude' => 'Thêm User',
            'roles' => $roles
        ]);
    }
    public function create(Request  $req){
        $data=$req->validate([
            'user' => 'required|unique:users,user',
            'name' => 'required',
            'password' => 'required',
            're-password' => 'required',
            'email' => 'email|required',
            'role' => 'required'
        ]);
        if($data['password']!=$data['re-password']){
            return redirect()->back()->with('error','Password nhập lại không trùng khớp');
        }
        $user=$this->user->create([
            'name' => $data['name'],
            'user' => $data['user'],
            'email' => $data['email'],
            'password'=>Hash::make($data['password'])
        ]);
        $user->roles()->sync($data['role']);
        return redirect()->back()->with('success','Đã thêm user :'.$data['name']);

    }
    public function edit($id){
        $user=$this->user::find($id);
        $roles=$this->role->get();
        $roleItem=$user->roles; 
        if($user==null){
            return redirect()->back()->with('error','Do not found User');
        }
        return view('admin.user.edit',[
            'title' => 'Edit User',
            'tieude' => 'Sửa User',
            'user'=> $user,
            'roles'=> $roles,
            'roleItem' => $roleItem
        ]);
    }


    public function update(Request $req){
        $data=$req->validate([
            'name'=> 'required',
            'user'=> 'required',
            'email'=>'required|email',
            'role' =>'required',
            'id' => 'required',
            'password' => '',
            're-password'=> '' 
        ]);
        $user=$this->user::find($data['id']);
        if($user==null ){
            return redirect()->back()->with('error','Không tìm thấy User');
        }   
        if($data['password'] Or $data['re-password']){
            if($data['password']!=$data['re-password']){
                return redirect()->back()->with('error','Password nhập lại không trùng khớp');
            }else{
                $user->update([
                    'password' => Hash::make($data['password'])
                ]);
            }
        }
        $user->update([
            'name' => $data['name'],
            'user' => $data['user'],
            'email' => $data['email'],
        ]);
        $user->roles()->sync($data['role']);
        return redirect()->back()->with('success','Đã sửa user :'.$data['name']);

        
    }
    public function delete($id){
        $user=$this->user::find($id);
        if($user==null){
            return redirect()->back()->with('error','Do not found User');
        }
        $user->delete();
        return redirect()->back()->with('success','Xóa thành công nhân viên '.$user->name);
    }

}
