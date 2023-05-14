<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DisciplineRequest;
use App\Models\Department;
use App\Models\Discipline;
use App\Models\DisciplineType;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        $disciplineTypes = DisciplineType::all();
        $departments = Department::all();
        $positions = Position::all();
        $disciplines = Discipline::orderBy('id', 'DESC')->paginate(10);
        
        return view('admin.disciplines.index', compact('staff', 'disciplines', 'disciplineTypes', 'departments', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $disciplineTypes = DisciplineType::all();
        return view('admin.disciplines.create', compact('staffs', 'disciplineTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplineRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('idStaff', 'type', 'reason', 'description');
            Discipline::create($data);
            DB::commit();
            session()->flash('success', 'Thêm kỉ luật thành công');
            return redirect()->route('ad.disciplines_index');
        } catch (\Exception $exception) {
            DB::rollBack();
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
        $staffs = Staff::all();
        $disciplineTypes = DisciplineType::all();
        $discipline = Discipline::find($id);
        return view('admin.disciplines.edit', compact('staffs', 'discipline', 'disciplineTypes'));
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
        try {
            DB::beginTransaction();
            $discipline = Discipline::find($id);
            $data = $request->only('idStaff', 'type', 'reason', 'description');
            $discipline->update($data);
            DB::commit();
            session()->flash('success', 'Sửa khen thưởng thành công');
            return redirect()->route('ad.disciplines_index');
        } catch (\Exception $exception) {
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
        $discipline = Discipline::find($id);
        $discipline->delete();
        session()->flash('success', 'Xóa kỉ luật thành công');
        return redirect()->route('ad.disciplines_index');
    }

    public function search(Request $request)
    {
        $staff = Staff::all();
        $positions = Position::all();
        $departments = Department::all();
        $disciplineTypes = DisciplineType::all();
        $name = $request->name ?? '';
        $department = $request->department ?? '';
        $position = $request->position ?? '';
        $disciplines = Discipline::when($name, function($query) use ($name){
            return $query->whereHas('staff', function($query) use ($name){
                return $query->where('name','like', '%' .$name. '%');
            });
        })->when($department, function($query) use ($department){
            return $query->whereHas('staff', function($query) use ($department){
                return $query->where('idDepartment', $department);
            });
        })->when($position, function($query) use ($position){
            return $query->whereHas('staff', function($query) use ($position){
                return $query->where('idDepartment', $position);
            });
        })->orderBy('id', 'desc')->paginate(10);

        return view('admin.disciplines.index', compact('staff', 'disciplines', 'disciplineTypes', 'departments', 'positions', 'name', 'department', 'position'));
    }
}
