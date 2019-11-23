<?php

namespace App\Http\Controllers\Employer;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\insertGetId;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class employerRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employer.register');
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
            'first_name'   => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'business_name'   => 'required|string|max:255',
            'email'   => 'required|string|email|max:255',
            'password'   => 'required|string|min:8|confirmed',
        ]);


        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['business_name'] = $request->business_name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);

        $employerId = DB::table('employers')->insertGetId($data);
        Session::put('employer_id', $employerId);
        Session::put('first_name', $request->first_name);
        Session::put('last_name', $request->last_name);

        return redirect()->route('profile.index');


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
