<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(7);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name', 'display_name');
            $role = Role::create($data);
            $role->permissions()->attach($request->permissions);
            DB::commit();
            session()->flash('success', 'Thêm vai trò thành công');
            return redirect()->route('ad.roles_index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Thêm vai trò thất bại');
            return redirect()->back();
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
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $role = Role::find($id);
            $data = $request->only('name', 'display_name');
            $role->update($data);
            $role->permissions()->sync($request->permissions);
            DB::commit();
            session()->flash('success', 'Sửa vai trò thành công');
            return redirect()->route('ad.roles_index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Sửa vai trò thất bại');
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
        $role = Role::find($id);
        $role->permissions()->detach();
        $role->delete();
        session()->flash('success', 'Xóa vai trò thành công');
        return redirect()->back();

    }
}
