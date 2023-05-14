<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Paycheck;
use App\Models\Staff;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class PaycheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paychecks = Paycheck::orderBy('id', 'desc')->paginate(10);
        $departments = Department::all();
        return view('admin.paychecks.index', compact('paychecks', 'departments'));
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
        $paycheck = Paycheck::find($id);
        return view('admin.paychecks.show', compact('paycheck'));
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
        $month = $request->month ?? '';
        $year = $request->year ?? '';
        $department = $request->department ?? '';
        $departments = Department::all();
        $paychecks = Paycheck::when($month, function($query, $month){
            return $query->where('month', $month);
        })->when($year, function($query, $year){
            return $query->where('year', $year);
        })->when($department, function($query) use ($department){
            return $query->whereHas('staff', function($query) use ($department){
                return $query->where('idDepartment', $department);
            });
        })->orderBy('id', 'desc')->paginate(10);
        return view('admin.paychecks.index', compact('paychecks', 'departments', 'department', 'month', 'year'));
        
    }
}
