<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return view('admin.index', [
                'title' => 'Admin HTH',
                'tieude' => 'Trang quản trị ',
            ]);
        }
        return redirect()->route('login-admin');
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }
        return view('admin.login.login', [
            'title' => 'Đăng nhập hệ thống',

        ]);
    }
    public function dangnhap(Request $req)
    {
        $data = $req->validate([
            'user' => 'required',
            'password' => 'required'
        ], [
            'user.required' => 'User not empty',
            'password.required' => 'Password not empty'
        ]);
        if (auth::attempt([
            'user' => $data['user'],
            'password' => $data['password'],
        ])) {
            return redirect()->route('admin')->with('success', 'Xin chào : ' . auth::user()->name);
        } else {
            return redirect()->route('login-admin')->with('error', 'Tài khoản hoặc password không đúng');
        }
    }
    public function logout()
    {
        auth::logout();
        return redirect()->route('login-admin');
    }
}
