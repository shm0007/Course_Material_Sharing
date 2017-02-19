<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DiscussionController extends Controller
{
    //
    public function getview(){
       $downloads=DB::table('discussion2')->get();
        return view('discussion',compact('downloads'));
    }
}
