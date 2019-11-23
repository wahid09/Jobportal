<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class employerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employer/login');
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
    public function Login(Request $request)
    {
        $employer_email = $request->email;
        $employer_password = md5($request->password);

        $result = DB::table('employers')
                    ->where('email', $employer_email)
                    ->where('password', $employer_password)
                    ->first();
        //dd($result);
        if($result){
            Session::put('employer_id', $result->id);
            return redirect()->route('profile.index');
        }else{
            return redirect()->route('login.index');
        }
    }
    public function Logout()
    {
        Session::flush();
        return redirect()->route('login.index');
    }
}
