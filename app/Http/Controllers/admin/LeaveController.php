<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::orderBy('id', 'desc')->paginate(30);
        $departments = Department::all();
        return view('admin.leave.index', compact('leaves', 'departments'));
    }

    public function status($id)
    {
        $leave = Leave::find($id);
        if ($leave->status == 1) {
            $leave->update(['status' => 2]);
            session()->flash('success', 'Xác nhận ngày nghỉ thành công!');
            return redirect()->back();
        } else {
            $leave->update(['status' => 1]);
            session()->flash('success', 'Huỷ xác nhận ngày nghỉ thành công!');
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $date = $request->date ?? '';
        $department = $request->department ?? '';
        $departments = Department::all();
        $leaves = Leave::when($date, function($query, $date){
            return $query->where('date', $date);
        })->when($department, function($query) use ($department){
            return $query->whereHas('staff', function($query) use ($department){
                return $query->where('idDepartment', $department);
            });
        })->orderBy('id', 'desc')->paginate(30);
        return view('admin.leave.index', compact('leaves', 'departments', 'date', 'department'));
    }
}

