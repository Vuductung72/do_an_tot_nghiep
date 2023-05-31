<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\staff\LeaveRequest;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('id_staff', Auth::guard('staff')->user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('staff.leave.index', compact('leaves'));
    }

    public function leave(LeaveRequest $request)
    {
        try {
            // $leave = Leave::where();
            DB::beginTransaction();
            $data = $request->only('date' ,'reason');
            $data['id_staff'] = Auth::guard('staff')->user()->id;
            $data['status'] = 1;
            $today = Carbon::now()->format('Y-m-d');
            // dd($data['date']);
            if ($data['date'] >= $today ) {
                $existingLeave = Leave::where('id_staff', Auth::guard('staff')->user()->id)->where('date', $data['date'])->first();
                if ($existingLeave) {
                    DB::rollback();
                    session()->flash('info', 'Bạn đã xin nghỉ ngày này!');
                    return redirect()->back();
                } else {
                    Leave::create($data);
                    DB::commit();
                    session()->flash('success', 'Xin nghỉ thành công!');
                    return redirect()->back();
                }
            }
            else{
                DB::rollback();
                session()->flash('error', 'Ngày nghỉ không được nhỏ hơn ngày hiện tại!');
                return redirect()->back();
            }

        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error', 'Xin nghỉ thất bại!');
            return redirect()->back();
        }

    }

    public function delete($id)
    {
        $leave = Leave::find($id);
        // dd($leave->status);
        if ($leave->status == 1) {
            $leave->delete();
            session()->flash('success', 'Huỷ xin nghỉ thành công!');
            return redirect()->back();
        }
        else{
            session()->flash('info', 'Ngày nghỉ đã được xác nhận không thể huỷ!');
            return redirect()->back();
        }
    }
}
