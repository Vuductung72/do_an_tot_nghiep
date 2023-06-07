<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Punish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* show thông tin điểm danh */
        $attendances = Attendance::where('idStaff', '=' ,Auth::guard('staff')->user()->id)->orderBY('date', 'DESC')->paginate(30);
        $today = Carbon::now()->format('Y-m-d');
        $attendance = Attendance::where('idStaff', Auth::guard('staff')->user()->id)->where('date', $today)->first();
        // dd($attendance);
        return view('staff.attendance.index', compact('attendances', 'attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkIn(Request $request)
    {
        $data['idStaff'] = Auth::guard('staff')->user()->id;
        $data['date'] = date('Y-m-d');
        $data['time_in'] = date('H:i:s');
        $data['status'] = 1;
        Attendance::create($data);
        // kiểm tra xem đi làm muộn không
        $checkinTime = Carbon::parse($data['time_in']);

        if ($checkinTime->gte(Carbon::parse('8:35 am'))) {
            $punish['id_staff'] = Auth::guard('staff')->user()->id;
            $punish['date'] = date('Y-m-d');
            $punish['money'] = 20000;
            $punish['reason'] = 'Đi làm muộn ngày '. date('d-m-Y');
            Punish::create($punish);
            session()->flash('success', 'Điểm danh thành công, bạn bị phạt 20,000 VND vì đi làm muộn!');
            return redirect()->route('staff.attendance_index');
        }
        session()->flash('success', 'Điểm danh thành công');
        return redirect()->route('staff.attendance_index');

    }

    public function checkOut(Request $request)
    {
        $data['idStaff'] = Auth::guard('staff')->user()->id;
        $data['date'] = date('Y-m-d');
        $data['time_out'] = date('H:i:s');
        $data['status'] = 2;
        $attendance = Attendance::where('idStaff', $data['idStaff'])->where('date', $data['date'])->first();
        if($attendance){
            if ($attendance->status == 1) {
                $attendance->update($data);
                session()->flash('success', 'Checkout thành công!');
                return redirect()->route('staff.attendance_index');
            }
            else{
                session()->flash('info', 'Bạn đã checkout ngày hôm nay!');
                return redirect()->route('staff.attendance_index');
            }


        }
        else{
            session()->flash('error', 'Bản ghi không tồn tại!');
            return redirect()->route('staff.attendance_index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* check điểm danh */
    public function checkAttendance(Request $request)
    {

    }
}
