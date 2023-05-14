<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\staff\LoginRequest;
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
        if(Auth::guard('staff')->check()){
            return redirect()->route('staff.accounts_index');
        }
        return view('staff.login');
    }

    public function login(LoginRequest $request)
    {
        $result = $request->only('email', 'password');

        if (Auth::guard('staff')->attempt($result)) {
            session()->flash('success', 'Đăng nhập thành công');
            return redirect()->route('staff.accounts_index');
        } else{
            session()->flash('error', 'Email hoặc Mật khẩu không chính xác');
            return redirect()->route('staff.login');
        }
    }

    public function logout()
    {
        auth('staff')->logout();
        session()->flash('success', 'Đăng xuất thành công');
        return redirect()->route('staff.login');
    }
}
