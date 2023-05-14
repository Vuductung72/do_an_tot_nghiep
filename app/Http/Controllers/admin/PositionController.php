<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('id', 'DESC')->paginate(10);
        return view('admin.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name', 'code');
            Position::create($data);
            DB::commit();
            session()->flash('success', 'Thêm chức vụ thành công');
            return redirect()->route('ad.positions_index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return view('admin.position.create');
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
        $position = Position::find($id);
        return view('admin.position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $position = Position::find($id);
            $data = $request->only('name', 'code');
            $position->update($data);
            DB::commit();
            session()->flash('success', 'Sửa chức vụ thành công');
            return redirect()->route('ad.positions_index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return view('admin.position.create');
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
        $position = Position::find($id);
        $position->delete();
        session()->flash('success', 'Xóa chức vụ thành công');
        return redirect()->route('ad.positions_index');
    }
}
