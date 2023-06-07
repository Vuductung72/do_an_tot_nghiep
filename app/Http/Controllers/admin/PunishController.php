<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PunishRequest;
use App\Models\Punish;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PunishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $staff = Staff::find($id);
        $punishs = Punish::orderBy('id', 'desc')->paginate(10);
        return view('admin.staff.punish.create', compact('staff', 'punishs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PunishRequest $request, $id)
    {
        $staff = Staff::find($id);
        try {
            DB::beginTransaction();
            $data = $request->only('money', 'reason');
            $data['id_staff'] = $staff->id;
            $data['date'] = date('Y-m-d');
            Punish::create($data);
            DB::commit();
            session()->flash('success', 'Thêm phạt thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Thêm phạt thất bại');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_punish)
    {
        $staff = Staff::find($id);
        $punish = Punish::find($id_punish);
        return view('admin.staff.punish.edit', compact('punish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_punish)
    {
        $staff = Staff::find($id);
        $punish = Punish::find($id_punish);
        try {
            DB::beginTransaction();
            $data = $request->only('money', 'reason');
            $punish->update($data);
            DB::commit();
            session()->flash('success', 'Sửa phạt thành công');
            return redirect()->route('ad.punish_create', $staff->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Sửa phạt thất bại');
            return redirect()->back();
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
        $punish = Punish::find($id);
        $punish->delete();
        session()->flash('success', 'Xoá phạt thành công');
        return redirect()->back();
    }
}
