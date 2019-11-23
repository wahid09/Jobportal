<?php

namespace App\Http\Controllers;

use App\Employer;
use App\JobPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TotalPosts = Employer::with('jobposts')->latest()->get();
        return view('home', compact('TotalPosts'));
    }
    public function jobDetails($slug)
    {
        $TotalPost = JobPost::with('employer')
                             ->where('slug', $slug)
                             ->first();
        return view('jobpost/post-details', compact('TotalPost'));
    }
}
