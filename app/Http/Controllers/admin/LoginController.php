<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('ad.index');
        }
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $result = $request->only('email', 'password');

        if (Auth::attempt($result)) {
            session()->flash('success', 'Đăng nhập thành công');
            return redirect()->route('ad.index');
        } else{
            session()->flash('error', 'Email hoặc Mật khẩu không chính xác');
            return redirect()->route('ad.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Đăng xuất thành công');
        return redirect()->route('ad.login');
    }
}
