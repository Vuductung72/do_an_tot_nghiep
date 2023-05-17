<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RecruitmentRequest;
use App\Models\ApplyRecruitment;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitments = Recruitment::orderBy('id', 'DESC')->paginate(10);
        $applyCount = new ApplyRecruitment;
        return view('admin.recruitments.index', compact('recruitments', 'applyCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recruitments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('title', 'position', 'experience', 'quantity', 'wage', 'type_work', 'type', 'description');
            $data['slug'] = Str::slug($request->title);
            Recruitment::create($data);
            DB::commit();
            session()->flash('success', 'Thêm tin tuyển dụng thành công');
            return redirect()->route('ad.recruitments_index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Thêm tin tuyển dụng thất bại');
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
        $recruitment = Recruitment::find($id);
        $applys = ApplyRecruitment::where('recruitment_id', $recruitment->id)->orderBy('id', 'DESC')->paginate(5);
        $applysCount = ApplyRecruitment::where('recruitment_id', $recruitment->id)->count();
        return view('admin.recruitments.edit', compact('recruitment', 'applys','applysCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $recruitment = Recruitment::find($id);
            $data = $request->only('title', 'position', 'experience', 'quantity', 'wage', 'type_work', 'type', 'description');
            $data['slug'] = Str::slug($request->title);
            $recruitment->update($data);
            DB::commit();
            session()->flash('success', 'Sửa tin tuyển dụng thành công');
            return redirect()->route('ad.recruitments_index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Sửa tin tuyển dụng thất bại');
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
        //
    }

    public function status($id)
    {
        $recruitment = Recruitment::find($id);
        if ($recruitment->type == 0) {
            $recruitment->update(['type' => 1]);
            session()->flash('success', 'Hiện tin tuyển dụng thành công');
            return redirect()->back();
        } else {
            $recruitment->update(['type' => 0]);
            session()->flash('success', 'Ẩn tin tuyển dụng thành công');
            return redirect()->back();
        }

    }

    public function statusApplyRecruitment($id)
    {
        $apply = ApplyRecruitment::find($id);
        if ($apply->status == 0) {
            $apply->update(['status' => 1]);
            session()->flash('success', 'Xác nhận người tuyển dụng thành công');
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $name = $request->name ?? '';
        $applyCount = new ApplyRecruitment;
        $recruitments = Recruitment::When($name, function($query, $name){
            return $query->where('title', 'like', '%'.$name.'%');
        })->orderBy('id', 'DESC')->paginate(5);;

        return view('admin.recruitments.index', compact('recruitments', 'applyCount', 'name'));

    }
}
