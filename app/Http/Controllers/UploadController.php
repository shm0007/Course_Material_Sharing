<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\FileModel;
use DB;
class UploadController extends Controller
{
    public function getview(){
        $downloads=DB::table('material')->get();
        return view('uploadfile',compact('downloads'));
    }
   // public function getviewteacher($id){
    public function getviewteacher($course_code,$taking_dept,$teacher,$sesson){
       // $arr = explode("+",$id);
       // $course_code = $arr[0];
       // $teacher = $arr[2];
       // $taking_dept = $arr[1];
       // $sesson = $arr[3];
       //return $course_code.$sesson;
        $downloads=DB::table('material')->get();
        return view('uploadfile',compact('downloads','course_code','taking_dept','teacher','sesson'));
    }

    public function insertFile($course_code,$taking_dept,$teacher,$sesson){

        $filetitle=Input::get('file_title');
        $file=Input::file('filenam');

        // echo $filetitle;
        // echo $file;

        $rules = array(
            'file_title' => 'required',
            'filenam' => 'required|mimes:doc,docx,jpeg,png,jpg,ppt,pptx,pdf,txt'
            );

        $validator=Validator::make(Input::all(), $rules);

        if($validator->fails()){

            //redirect our user back with error messages
            $messages=$validator->messages();

            //send back to the page with the input data and errors

           // return Redirect::to('uploadfile')->withInput->withErrors($validator);

        } else if($validator->passes()){
           // echo "success validator";

            //checking file is valid
            if(Input::file('filenam')->isValid()){

                //getting extension

                $extension = Input::file('filenam')->getClientOriginalExtension();

                //renaming
                //$filename =rand(11111,99999).'.'.$extension;
                // $c_id='c_id';
                // $taking_dept = 'dept';
                // $session = 'session';
                // $user_name ='sadia';

                 $filename =$filetitle.'_'.$course_code.'_'.$taking_dept.'_'.$sesson.'.'.$extension;

                $destinationPath = 'up_file';
                //it means projectfolder/public/up_file

                //uploading file to given path
                $file->move($destinationPath,$filename);

                $data=array(
                    'title' => $filetitle,
                    'file_name' => $filename,
                    'material_type' => $extension,
                     'uploader_type' => '1',
                     'user_name' => 'sadia',
                     'reg_no' => '1',
                     'c_id' => 1,
                     'taking_dept' => $taking_dept,
                     'session' => $sesson



                    );

                 FileModel::insert($data);

                $notification = array(
                    'message' => 'File Uploaded succesfully',
                    'alert-type' => 'success'
                    );
return Redirect::to('viewAlldownloadfile');

                //return Redirect::to('uploadfile')->with($notification);

            } else {

                $notification = array(
                    'message' => 'File is not valid!',
                    'alert-type' => 'error'
                    );

                return Redirect::to('uploadfile')->with($notification);
                
            }
        }
    }
}
