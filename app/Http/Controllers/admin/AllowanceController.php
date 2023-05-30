<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AllowanceRequest;
use App\Models\Allowance;
use App\Models\Department;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        $departments = Department::all();
        $positions = Position::all();
        $allowances = Allowance::orderBy('id', 'DESC')->paginate(10);
        return view('admin.allowances.index', compact('allowances', 'staffs', 'departments', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AllowanceRequest $request)
    {
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
        $staffs = Staff::all();
        $allowance = Allowance::find($id);
        return view('admin.allowances.edit', compact('staffs', 'allowance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AllowanceRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $allowance = Allowance::find($id);
            $data = $request->only('name', 'money', 'description');
            $data['idStaff'] = $allowance->staff->id;
            $allowance->update($data);
            DB::commit();
            session()->flash('success', 'Sửa phụ cấp thành công');
            return redirect()->route('ad.allowances_index');
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allowance = Allowance::find($id);
        $allowance->delete();
        session()->flash('success', 'Xóa phụ cấp thành công');
        return redirect()->route('ad.allowances_index');
    }

    public function search(Request $request)
    {
        $staffs = Staff::all();
        $positions = Position::all();
        $departments = Department::all();
        $name = $request->name ?? '';
        $department = $request->department ?? '';
        $position = $request->position ?? '';
        $allowances = Allowance::when($name, function($query) use ($name){
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

        return view('admin.allowances.index', compact('allowances', 'staffs', 'departments', 'positions', 'name', 'department', 'position'));
    }
}
