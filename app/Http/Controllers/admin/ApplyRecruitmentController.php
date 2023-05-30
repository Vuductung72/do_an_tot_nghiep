<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyRecruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplyRecruitmentController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apply = ApplyRecruitment::find($id);
        $cv = $apply->user->cv;
        return view('admin.recruitments.show_apply', compact('apply', 'cv'));
    }

    public function download($id)
    {
        $apply = ApplyRecruitment::find($id);
        $fileCV = $apply->user->cv;
        $fileName = basename($fileCV);
        $file=Storage::disk('public')->get('cv_user/'.$fileName);

        return (response($file, 200))
              ->header('Content-Type', 'image/pdf');

        return redirect()->route('ad.apply_recruitments_show', $id);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
