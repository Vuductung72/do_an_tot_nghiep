<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deparments = Department::orderBy('id', 'DESC')->paginate(10);
        return view('admin.department.index', compact('deparments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name', 'code');
            Department::create($data);
            DB::commit();
            session()->flash('success', 'Thêm phòng ban thành công');
            return redirect()->route('ad.departments_index');
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
        $deparment = Department::find($id);
        return view('admin.department.edit', compact('deparment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $deparment = Department::find($id);
            $data = $request->only('name', 'code');
            $deparment->update($data);
            DB::commit();
            session()->flash('success', 'Sửa phòng ban thành công');
            return redirect()->route('ad.departments_index');
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
        $deparment = Department::find($id);
        $deparment->delete();
        session()->flash('success', 'Xóa tài phòng ban thành công');
        return redirect()->route('ad.departments_index');
    }
}
