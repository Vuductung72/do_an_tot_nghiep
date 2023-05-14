<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'DESC')->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name', 'gender', 'email', 'phone', 'address', 'role_id');
            $data['password'] = Hash::make($request->password);
            $dataImageAdmin = $this->storageTraitUpload($request, 'image', 'ImageAdmin');
            $data['image'] = $dataImageAdmin['file_path'];
            Admin::create($data);
            DB::commit();
            session()->flash('success', 'Thêm tài khoản admin thành công');
            return redirect()->route('ad.admins_index');
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('error', 'Thêm tài khoản admin thất bại');
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
        $roles = Role::all();
        $admin = Admin::find($id);
        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $admin = Admin::find($id);
            $data = $request->only('name', 'gender', 'phone', 'address', 'role_id');
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }else{
                $data['password'] = $admin->password;
            }
            $dataImageAdmin = $this->storageTraitUpload($request, 'image', 'ImageAdmin');
            if( !empty($dataImageAdmin) ) {
                $data['image'] = $dataImageAdmin['file_path'];
            }
            $admin->update($data);
            DB::commit();
            session()->flash('success', 'Sửa tài khoản admin thành công');
            return redirect()->route('ad.admins_index');
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('error', 'Thêm tài khoản admin thất bại');
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
        $admin = Admin::find($id);
        $admin->delete();
        session()->flash('success', 'Xóa tài khoản admin thành công');
        return redirect()->route('ad.admins_index');
    }
}
