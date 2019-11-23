<?php

namespace App\Http\Controllers\Jobpost;

use App\Http\Controllers\Controller;
use App\JobPost;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class jobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobpost/jobpost');
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
        //dd($request->all());
        $this->validate($request, [
            'job_title' => 'required|string|max:200',
            'job_description' => 'required|max:6000',
            'salary' => 'required',
            'location' => 'required',
            'country' => 'required',
        ]);

        $job = new JobPost();
        $job->employer_id = session::get('employer_id');
        $job->job_title = $request->job_title;
        $job->slug = str_slug($request->job_title);
        $job->job_description = $request->job_description;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->country = $request->country;
        if(isset($request->status)){
            $job->status = 1;
        }else{
            $job->status = 0;
        }

        $job->save();

        return redirect()->route('profile.index')->with('success', 'Your Job post successfully added');
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
