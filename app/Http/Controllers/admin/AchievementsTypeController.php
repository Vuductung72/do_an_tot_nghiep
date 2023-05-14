<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AchievementsRequest;
use App\Http\Requests\admin\AchievementsTypeRequest;
use App\Models\AchievementType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievement_types = AchievementType::orderBy('id', 'DESC')->paginate(10);
        return view('admin.achievement_types.index', compact('achievement_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.achievement_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AchievementsTypeRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name');
            AchievementType::create($data);
            DB::commit();
            session()->flash('success', 'Thêm loại khen thưởng thành công');
            return redirect()->route('ad.achievementTypes_index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('ad.achievementTypes_create');
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
        $achievement_type = AchievementType::find($id);
        return view('admin.achievement_types.edit', compact('achievement_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AchievementsTypeRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $achievement_type = AchievementType::find($id);
            $data = $request->only('name');
            $achievement_type->update($data);
            DB::commit();
            session()->flash('success', 'Sửa loại khen thưởng thành công');
            return redirect()->route('ad.achievementTypes_index');
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
        $achievement_type = AchievementType::find($id);
        $achievement_type->delete();
        session()->flash('success', 'Xóa loại khen thưởng thành công');
        return redirect()->route('ad.achievementTypes_index');
    }
}
