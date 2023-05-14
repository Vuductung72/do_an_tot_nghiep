<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ApplyRecruitment;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitments = Recruitment::where('type', 1)->orderBy('id', 'DESC')->paginate(6);
        if(Auth::guard('user')->check()){
            $apply = new ApplyRecruitment;
            // dd($apply);
            return view('web.recruitment.index', compact('recruitments', 'apply'));
        }
        return view('web.recruitment.index', compact('recruitments'));
    }

    public function show($id)
    {
        $recruitment = Recruitment::find($id);
        if($recruitment->type == 0){
            session()->flash('warning', 'Tin tuyển dụng này đã bị ẩn!');
            return redirect()->route('w.recruitment');
        }
        if(Auth::guard('user')->check()){
            $apply = new ApplyRecruitment;
            // dd($apply);
            return view('web.recruitment.show', compact('recruitment', 'apply'));
        }
        return view('web.recruitment.show', compact('recruitment'));
    }

    /* ham xu li ung tuyen */
    public function recruitment($id)
    {
        if (Auth::guard('user')->check()) {
            try {
                DB::beginTransaction();
                $recruitment = Recruitment::find($id);
                $data['user_id'] = Auth::guard('user')->user()->id;
                $data['recruitment_id'] = $recruitment->id;
                $data['status'] = 0;
                ApplyRecruitment::create($data);
                DB::commit();
                session()->flash('success', 'Ứng tuyển thành công');
                return redirect()->back();
            } catch (\Throwable $th) {
                DB::rollBack();
                session()->flash('error', 'Ứng tuyển thất bại');
                return redirect()->back();
            }
        } else {
            session()->flash('info', 'Bạn cần đăng nhập để ứng tuyển');
            return redirect()->back();
        }
    }

    
}
