<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DisciplineTypeRequest;
use App\Models\DisciplineType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discipline_types = DisciplineType::orderBy('id', 'DESC')->paginate(10);
        return view('admin.discipline_types.index', compact('discipline_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discipline_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplineTypeRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name');
            DisciplineType::create($data);
            DB::commit();
            session()->flash('success', 'Thêm loại kỉ luật thành công');
            return redirect()->route('ad.disciplinesTypes_index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('ad.disciplinesTypes_create');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discipline_type = DisciplineType::find($id);
        return view('admin.discipline_types.edit', compact('discipline_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplineTypeRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $discipline_type = DisciplineType::find($id);
            $data = $request->only('name');
            $discipline_type->update($data);
            DB::commit();
            session()->flash('success', 'Sửa loại kỉ luật thành công');
            return redirect()->route('ad.disciplinesTypes_index');
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
        $discipline_type = DisciplineType::find($id);
        $discipline_type->delete();
        session()->flash('success', 'Xóa loại kỉ luật thành công');
        return redirect()->route('ad.disciplinesTypes_index');
    }
}
