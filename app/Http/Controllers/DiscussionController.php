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
        return view('discussion',compact('downloads'));
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

}
