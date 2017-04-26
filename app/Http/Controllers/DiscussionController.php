<?php

namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\DiscussionModel;
use Carbon\Carbon;
class DiscussionController extends Controller
{
    //
    public function getview(){
       $downloads=DB::table('discussion')->get();
       if(Auth::user()->role ==1)
          $enrol=DB::table('teacher_enrolment')->where('user_name',Auth::user()->name)->get();
      else
        $enrol=DB::table('enrollment')->where('user_name',Auth::user()->name)->get();
    

       
       $entry=DB::table('discussion_entry')->get();
        $ct=0;
        $current_view= "discussion";
        return view('discussion',compact('downloads','entry','ct','current_view','enrol'));
    }
    public function insertFile($course_code,$taking_dept,$offered_dept,$sesson){

        $filetitle=Input::get('file_title');
        
 		$filetype=Input::get('file_type');
        
      
        //  Session::flash('success', 'Upload successfully'); 

            $data2=array(
                    'discussion_title' => $filetitle,
                    'discussion_type' => $filetype,   
                     'username' => Auth::user()->name,
                     'taking_dept' => $taking_dept,
                     'offered_dept' => $offered_dept,
                     'session' => $sesson,
                     'course_code' => $course_code,
                     'status'=> 'OK',
                     'uploaded_time' => Carbon::now()
                    );

                 DiscussionModel::insert($data2);
       $downloads=DB::table('discussion')->get();
       if(Auth::user()->role ==1)
          $enrol=DB::table('teacher_enrolment')->where('user_name',Auth::user()->name)->get();
      else
        $enrol=DB::table('enrollment')->where('user_name',Auth::user()->name)->get();
    

       
       $entry=DB::table('discussion_entry')->get();
        $ct=0;
        $current_view= "discussion";
        return view('discussion_single',compact('downloads','entry','ct','current_view','enrol','course_code','taking_dept','offered_dept','sesson'));
      
       
    }

    public function update3($d_id)
    {
       
       {
         DB::table('discussion')
            ->where('id', $d_id)
            ->update(['status' => 'suspended']);
       }
       

        return Redirect::to('discussion');
    }
     public function update2($d_id)
    {
      
         {
         DB::table('discussion')
            ->where('id', $d_id)
            ->update(['status' => 'OK']);
        }

        return  Redirect::to('discussion');
    }

    public function single($course_code,$taking_dept,$offered_dept,$sesson)
    {
      
        $downloads=DB::table('discussion')->get();
       if(Auth::user()->role ==1)
          $enrol=DB::table('teacher_enrolment')->where('user_name',Auth::user()->name)->get();
      else
        $enrol=DB::table('enrollment')->where('user_name',Auth::user()->name)->get();
    

       
       $entry=DB::table('discussion_entry')->get();
        $ct=0;
        $current_view= "discussion";
        return view('discussion_single',compact('downloads','entry','ct','current_view','enrol','course_code','taking_dept','offered_dept','sesson'));
    }


     public function tag()
    {
      
        

         $current_view= "discussion";
        return view('tag',compact('current_view'));
    }
    

    

    

}
