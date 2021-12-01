<?php

namespace App\Http\Controllers\API;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AllJobResource;
use App\Http\Resources\SingleJobResource;
use App\Models\JobApply;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key=null,$id=null)
    {
        $auth = User::where('access_token', $key)->first();

        if ($auth == '') {
            $message = 'Authentication Failed!';
            return response()->json(['message' => $message], 401);
        }else{
            $data = AllJobResource::collection(Job::where('status',1)->get());
            return response()->json($data, 200);
        }
    }

    public function singleJob($key,$id){
        $auth = User::where('access_token', $key)->first();

        if ($auth == '') {
            $message = 'Authentication Failed!';
            return response()->json(['message' => $message], 401);
        }else{
            $data = new SingleJobResource(Job::findOrFail($id));
            return response()->json($data, 200);
        }
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
        $auth = User::where('access_token', $request->token)->first();

        if ($auth == '') {
            $message = 'Authentication Failed!';
            return response()->json(['message' => $message], 401);
        }else{
            $data = new JobApply();
            $data->job_id = $request->job_id;
            $data->user_id = $auth->id;
            $data->save();
            return response()->json($data, 200);
        }
        return $request->all();
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
