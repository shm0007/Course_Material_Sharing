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
        $downloads=DB::table('test')->get();
        return view('uploadfile',compact('downloads'));
    }

    public function insertFile(){

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

            return Redirect::to('uploadfile')->withInput->withErrors($validator);

        } else if($validator->passes()){
           // echo "success validator";

            //checking file is valid
            if(Input::file('filenam')->isValid()){

                //getting extension

                $extension = Input::file('filenam')->getClientOriginalExtension();

                //renaming
                //$filename =rand(11111,99999).'.'.$extension;
                $c_id='c_id';
                $taking_dept = 'dept';
                $session = 'session';
                $user_name ='sadia';

                 $filename =$filetitle.'_'.$c_id.'_'.$taking_dept.'_'.$session.'_'.$user_name.'.'.$extension;

                $destinationPath = 'up_file';
                //it means projectfolder/public/up_file

                //uploading file to given path
                $file->move($destinationPath,$filename);

                $data=array(
                    'title' => $filetitle,
                    'file_name' => $filename,
                    'material_type' => $extension,
                    // 'uploader_type' => '1',
                    // 'user_name' => 'sadia',
                    // 'reg_no' => 0,
                    // 'c_id' => 0,
                    // 'taking_dept' => 'null',
                    // 'session' => 'null'



                    );

                 FileModel::insert($data);

                $notification = array(
                    'message' => 'File Uploaded succesfully',
                    'alert-type' => 'success'
                    );


                return Redirect::to('uploadfile')->with($notification);

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
