<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AchievementsRequest;
use App\Http\Requests\admin\StaffRequest;
use App\Models\Achievement;
use App\Models\AchievementType;
use App\Models\Department;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        $achievements = Achievement::orderBy('id', 'DESC')->paginate(10);
        $achievementTypes = AchievementType::all();
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.achievements.index', compact('staff', 'achievements', 'achievementTypes', 'departments', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $achievementTypes = AchievementType::all();
        return view('admin.achievements.create', compact('staffs', 'achievementTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AchievementsRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('idStaff', 'type', 'reason', 'money', 'description');
            Achievement::create($data);
            DB::commit();
            session()->flash('success', 'Thêm khen thưởng thành công');
            return redirect()->route('ad.achievements_index');
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
        $achievementTypes = AchievementType::all();
        $achievement = Achievement::find($id);
        return view('admin.achievements.edit', compact('staffs', 'achievement', 'achievementTypes'));
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
            $achievement = Achievement::find($id);
            $data = $request->only('idStaff', 'type', 'reason', 'money', 'description');
            $achievement->update($data);
            DB::commit();
            session()->flash('success', 'Sửa khen thưởng thành công');
            return redirect()->route('ad.achievements_index');
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
        $achievement = Achievement::find($id);
        $achievement->delete();
        session()->flash('success', 'Xóa khen thưởng thành công');
        return redirect()->route('ad.achievements_index');
    }

    public function search(Request $request)
    {
        $staff = Staff::all();
        $positions = Position::all();
        $departments = Department::all();
        $achievementTypes = AchievementType::all();
        $name = $request->name ?? '';
        $department = $request->department ?? '';
        $position = $request->position ?? '';
        $achievements = Achievement::when($name, function($query) use ($name){
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

        return view('admin.achievements.index', compact('staff', 'achievements', 'achievementTypes', 'departments', 'positions', 'name', 'department', 'position'));
    }





}
