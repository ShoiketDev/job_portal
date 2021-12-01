<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.job.index');
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
        $request->validate([
            'title' => 'required',
            'job_type' => 'required',
            'company' => 'required'
        ]);

        $data = new Job();
        $data->job_types_id = $request->job_type;
        $data->title = $request->title;
        $data->company = $request->company;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->has('thumbnail')) {
            $fileName = uniqid().'.'.$request->thumbnail->extension();
            $filePath = 'public/img/job/'.$fileName;
            $request->thumbnail->move(public_path('img/job/'),$fileName);
            $data->thumbnail = $filePath;
        }
        $data->save();

        alert()->success('Success!', 'Posted Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Job::findOrFail($request->id);

        $temp_data['data']=$data;
        $temp_data['title']= 'Job Post Update';

        return view('admin.job.modal', $temp_data);
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
    public function update(Request $request)
    {
        $data = Job::findOrFail($request->id);
        $data->job_types_id = $request->job_type;
        $data->title = $request->title;
        $data->company = $request->company;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->has('thumbnail')) {
            $fileName = uniqid().'.'.$request->thumbnail->extension();
            $filePath = 'public/img/job/'.$fileName;
            $request->thumbnail->move(public_path('img/job/'),$fileName);
            $data->thumbnail = $filePath;
        }
        $data->save();

        alert()->success('Success!', 'Successfully Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Job::findOrFail($request->id);
        $e = $data->delete();
        return $e;
    }
}
