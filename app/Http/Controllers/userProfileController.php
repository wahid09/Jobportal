<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class userProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = UserProfile::latest()->first();
        return view('user/userprofile', compact('userInfo'));
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
        $this->validate($request, [
            'resume' => 'required|max:5000|mimes:pdf,docx,doc',
            //'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($resume = $request->file('resume'))
         {
            $applicantName = Auth::user()->first_name;
            $currentDate = Carbon::now()->toDateString();
            $resumeName  = $applicantName.'-'.$currentDate.'-'.uniqid().'.'.$resume->getClientOriginalExtension();
            /*if(!Storage::disk('public')->exists('resumes'))
            {
                Storage::disk('public')->makeDirectory('resumes');
            }
            Storage::disk('public')->put('resumes/'.$avatarName,$avatarImage);*/
            $resume->move(public_path().'/resumes/', $resumeName);  
            //$insert['file'] = "$filename";
         }

         // Applicant Image
         if($avatar = $request->file('avatar'))
            {
                $applicantName = Auth::user()->first_name;
               // make unipue name for image
                $currentDate = Carbon::now()->toDateString();
                $avatarName  = $applicantName.'-'.$currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('avatars'))
                {
                    Storage::disk('public')->makeDirectory('avatars');
                }
                $avatarImage = Image::make($avatar)->resize(300,300)->stream();
                Storage::disk('public')->put('avatars/'.$avatarName,$avatarImage);
            }
        $user_profile = new UserProfile();
        $user_profile->user_id = Auth::user()->id;
        $user_profile->bio = $request->bio;
        $user_profile->skill = $request->skill;
        $user_profile->gender = $request->gender;
        $user_profile->experience = $request->experience;
        $user_profile->address = $request->address;
        $user_profile->phone = $request->phone;
        $user_profile->resume = $resumeName;
        $user_profile->avatar = $avatarName;


        $user_profile->save();
        return back()->with('success', 'Data inserted successfully');
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
