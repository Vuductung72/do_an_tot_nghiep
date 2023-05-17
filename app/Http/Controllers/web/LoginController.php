<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\LoginRequest;
use App\Http\Requests\web\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::guard('user')->check()){
            return redirect()->route('w.home');
        }
        return view('web.login.login');
    }

    public function login(LoginRequest $request)
    {
        $result = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($result)) {
            session()->flash('success', 'Đăng nhập thành công');
            return redirect()->route('w.home');
        } else{
            session()->flash('error', 'Email hoặc Mật khẩu không chính xác');
            return redirect()->route('w.login');
        }
    }

    public function getRegister()
    {
        if(Auth::guard('user')->check()){
            return redirect()->route('w.home');
        }
        return view('web.login.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name','email','gender','phone','address');
            $data['password'] = Hash::make($request->password);
            User::create($data);
            DB::commit();
            session()->flash('success', 'Đăng kí thành công');
            return redirect()->route('w.login');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Đăng kí thất bại');
            return redirect()->back();
        }
    }

    public function logout()
    {
        auth('user')->logout();
        session()->flash('success', 'Đăng xuất thành công');
        return redirect()->back();
    }
}
