<?php

namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use DB;
use App\DiscussionModel;
class DiscussionController extends Controller
{
    //
    public function getview(){
       $downloads=DB::table('discussion')->get();
       $entry=DB::table('discussion_entry')->get();
        $ct=0;
        $current_view= "discussion";
        return view('discussion',compact('downloads','entry','ct','current_view'));
    }
    public function insertFile($course_code,$taking_dept,$offered_dept,$sesson){

        $filetitle=Input::get('file_title');
        
 		$filetype=Input::get('file_type');
        
      
        //  Session::flash('success', 'Upload successfully'); 

            $data2=array(
                    'discussion_title' => $filetitle,
                    'discussion_type' => $filetype,   
                     'username' => 'shamim',
                     'taking_dept' => $taking_dept,
                     'offered_dept' => $offered_dept,
                     'session' => $sesson,
                     'course_code' => $course_code,
                     'status'=> 'OK'
                    );

                 DiscussionModel::insert($data2);
          return Redirect::to('discussion');
      
       
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
     public function tag()
    {
      
        

         $current_view= "discussion";
        return view('tag',compact('current_view'));
    }
    

    

    

}
