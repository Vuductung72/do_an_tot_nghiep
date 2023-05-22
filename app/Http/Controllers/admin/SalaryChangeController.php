<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Position;
use App\Models\SalaryChange;
use Illuminate\Http\Request;

class SalaryChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $positions = Position::all();
        $salarys = SalaryChange::orderBy('id', 'desc')->paginate(5);
        return view('admin.salary_changes.index', compact('salarys', 'departments', 'positions'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = SalaryChange::find($id);
        return view('admin.salary_changes.show', compact('salary'));
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

    public function search(Request $request)
    {
        $positions = Position::all();
        $departments = Department::all();
        $name = $request->name ?? '';
        $department = $request->department ?? '';
        $position = $request->position ?? '';
        $salarys = SalaryChange::when($name, function($query) use ($name){
            return $query->whereHas('staff', function($query) use ($name){
                return $query->where('name','like', '%' .$name. '%');
            });
        })->when($department, function($query) use ($department){
            return $query->whereHas('staff', function($query) use ($department){
                return $query->where('idDepartment', $department);
            });
        })->when($position, function($query) use ($position){
            return $query->whereHas('staff', function($query) use ($position){
                return $query->where('idPosition', $position);
            });
        })->orderBy('id', 'desc')->paginate(10);

        return view('admin.salary_changes.index', compact('salarys', 'departments', 'positions', 'name', 'department', 'position'));
    }

}
