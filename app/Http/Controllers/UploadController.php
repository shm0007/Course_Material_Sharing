<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\FileModel;
use App\multifileModel;

use DB;
class UploadController extends Controller
{
    public function getview(){
        $downloads=DB::table('material')->get();
        return view('uploadfile',compact('downloads'));
    }
   // public function getviewteacher($id){
    public function getviewteacher($course_code,$taking_dept,$offered_dept,$sesson){
       // $arr = explode("+",$id);
       // $course_code = $arr[0];
       // $teacher = $arr[2];
       // $taking_dept = $arr[1];
       // $sesson = $arr[3];
       //return $course_code.$sesson;
        $downloads=DB::table('material')->get();
        $multi = DB::table('material_list')->get();
        $in=0;
        return view('uploadfile',compact('downloads','multi','course_code','taking_dept','offered_dept','sesson','in'));
    }

    public function insertFile($course_code,$taking_dept,$offered_dept,$sesson){

        $filetitle=Input::get('file_title');
        $files=Input::file('myfile');

         $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        $extension = 'check';
        foreach($files as $file) {
          $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            $destinationPath = 'up_file';
            $extension = $file->getClientOriginalExtension();
          //  $filename = $file->getClientOriginalName();
            $filename =$filetitle.'_'.$course_code.'_'.$taking_dept.'_'.$sesson.rand(11111,99999).'.'.$extension;
            
            $upload_success = $file->move($destinationPath, $filename);
            $uploadcount ++;

            $data=array(
                    'title' => $filetitle,
                    'file_name' => $filename,
                    'material_type' => $extension,
                     'uploader_type' => '1',
                     
                     'user_name' => 'shamim',

                     'taking_dept' => $taking_dept,
                     'offered_dept' => $offered_dept,
                     'session' => $sesson,
                     'course_code' => $course_code



                    );

                 FileModel::insert($data);
          }
        }

        if($extension == 'pdf')
        {
            $fileType = 'pdf.png';
        }
        else if($extension == 'txt')
        {
            $fileType = 'txt.png';
        }
        else if($extension == 'doc' || $extension == 'docx')
        {
            $fileType = 'doc.png';
        }
        else if($extension == 'ppt' || $extension == 'pptx')
        {
            $fileType = 'powerpoint.png';
        }
        else if($extension == 'png')
        {
            $fileType = 'png.png';
        }
        else if($extension == 'jpg' || $extension == 'jpeg')
        {
            $fileType = 'jpg.png';
        }



        if($uploadcount == $file_count){
        //  Session::flash('success', 'Upload successfully'); 

            $data2=array(
                                    'title' => $filetitle,
                                     'file_name' => $filename,
                    'image' => $fileType,
                    'material_type' => $extension,
                     'uploader_type' => '1',
                     'user_name' => 'shamim',
                     'taking_dept' => $taking_dept,
                     'offered_dept' => $offered_dept,
                     'session' => $sesson,
                     'course_code' => $course_code



                    );

                 multifileModel::insert($data2);
          return Redirect::to('viewAlldownloadfile');
        } 
        else {
          return Redirect::to('uploadfile')->withInput()->withErrors($validator);
        }
    }

    public function destroy($title)
    {
            
        // DB::table('material')->where('title', $title)->delete();
         //DB::table('material_list')->where('title', $title)->delete();
         
         // Redirect::to('home');
        //  return  redirect()->route('home')
             //   ->with('success', 'course deleted successfully');
           return  $title;//Redirect::to('home');
    }
    public function destroy2($title,$course_code,$offered_dept,$taking_dept,$sesson)
    {
            
         DB::table('material')->where('title', $title)->delete();
         DB::table('material_list')->where('title', $title)->delete();
         
         // Redirect::to('home');
        //  return  redirect()->route('home')
             //   ->with('success', 'course deleted successfully');
           //return  $title.$course_code.$offered_dept.$taking_dept.$sesson;
       $downloads=DB::table('material')->get();
        $multi = DB::table('material_list')->get();
        $in=0;
        return view('uploadfile',compact('downloads','multi','course_code','taking_dept','offered_dept','sesson','in'));

    }
               
}