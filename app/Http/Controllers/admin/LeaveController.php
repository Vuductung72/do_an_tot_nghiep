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

