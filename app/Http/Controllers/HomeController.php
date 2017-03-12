<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name= Auth::user()->name;
        //return $name;
        $current_view= "home";
        $course_list= DB::table('enrollment')->where('user_name',$name)->get();
        return view('home',compact('course_list','current_view'));
    }
}
