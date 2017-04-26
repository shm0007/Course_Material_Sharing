<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Input;
use App\UserDetailsModel;
use App\EnrollmentModel;
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

    public function adminEditTeacher(Request $request)
    {
        $data = $request->all();
        
        $teacher_name = $data['6'];

        return $teacher_name;
    }

    public function adminEdit(Request $request)
    {
        $data = $request->all();
        $user_name = $data['1'];
        $course_code = $data['2'];
        $offered_dept = $data['3'];
        $taking_dept = $data['4'];
        $taking_session = $data['5'];

        $data2=array(
                    'user_name' => $user_name,
                    'course_code' => $course_code,
                    'offered_dept' => $offered_dept,

                    'taking_dept' => $taking_dept,
                    'taking_session' => $taking_session
                    

                    );

                 EnrollmentModel::insert($data2);

        return   redirect()->back();

        return $user_name.$course_code.$offered_dept.$taking_dept.$taking_session;
    }


    public function admin()
    {
        $us=DB::table('users')->where('role',2)->get();
        $crse=DB::table('course')->get();
        //return $downloads;

        $current_view= "profile";

        return view('admin',compact('current_view','us','crse'));
    }
    public function index()
    {
        $name= Auth::user()->name;

        //return $name;
        $current_view= "home";
        if(Auth::user()->role==1)
        $course_list= DB::table('teacher_enrolment')->where('user_name',$name)->get();
    else
             $course_list= DB::table('enrollment')->where('user_name',$name)->get();
   
        return view('home',compact('course_list','current_view'));
    }
    public function getProfile()
    {

        $name= Auth::user()->name;
        
        $current_view= "profile";
        $image= DB::table('user_details')->where('user_name',$name)->get();
        if(count($image)==0) {



            $data2=array(
                    'user_name' => Auth::user()->name,
                    'dept_name' => 'CSE',   
               
                     'session' => '2012-13', 
                     'image_link'  => '/profile_pic/pic2.png'
                     
               
                    );

                 UserDetailsModel::insert($data2);
        }
;        //return $image;
 $image= DB::table('user_details')->where('user_name',$name)->get();
        return view('profile',compact('current_view','image'));
    }
     public function insertphoto(){
        $current_view= "upload";
    
        $file=Input::file('myfile');
        
            $destinationPath = 'profile_pic';
            $extension = $file->getClientOriginalExtension();
          //  $filename = $file->getClientOriginalName();
            $filename =Auth::user()->name.rand(11111,99999).'.'.$extension;
            
            $upload_success = $file->move($destinationPath, $filename);

          DB::table('user_details')
            ->where('user_name', Auth::user()->name)
            ->update(['image_link' => '/profile_pic/'.$filename]);
          


          
$name= Auth::user()->name;
        
        $current_view= "profile";
        $image= DB::table('user_details')->where('user_name',$name)->get();
        //return $image;
        return view('profile',compact('current_view','image'));

             } 
    
    
}
