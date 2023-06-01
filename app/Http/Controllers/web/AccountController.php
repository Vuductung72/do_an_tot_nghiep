<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\UpdateAccountRequest;
use App\Models\ApplyRecruitment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('user')->check()) {
            return view('web.account.index');
        }
        session()->flash('warning', 'Bạn chưa đăng nhập tài khoản!');
        return redirect()->route('w.home');
    }


    public function update(UpdateAccountRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name','gender','phone','address');
            if($request->hasFile('cv')){
                $dataCv = $this->storageTraitUpload($request, 'cv', 'cv_user');
                $data['cv'] = $dataCv['file_path'];
            }
            if($request->cv_link){
                $data['cv_link'] = $request->cv_link;
            }

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }else{
                $data['password'] = $user->password;
            }


            $user->update($data);
            DB::commit();
            session()->flash('success', 'Cập nhật tài khoản thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error', 'Cập nhật tài khoản thất bại');
            return redirect()->back();
            // dd($data['cv']);
        }
    }

    public function listRecruitment()
    {
        if (Auth::guard('user')->check()) {
            $applys = ApplyRecruitment::where('user_id', Auth::guard('user')->user()->id)->orderBy('id', 'DESC')->paginate();
            return view('web.account.recruitment', compact('applys'));
        }
        session()->flash('warning', 'Bạn chưa đăng nhập tài khoản!');
        return redirect()->route('w.home');
    }

}
