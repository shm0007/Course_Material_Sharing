<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Input;
use Validator;
use Redirect;
use App\DiscussionEntryModel;



use Carbon\Carbon;

class DiscussionEntryController extends Controller
{
    //
    public function getview($id){
    	$disc = DB::table('discussion')->where('id',$id)->get();
       $downloads=DB::table('discussion_entry')->where('d_id',$id)->get();
        $current_view= "discussion";
        return view('discussionentry',compact('downloads','disc','current_view'));
    }
     public function insertFile($d_id){
     	
     	$mytime = Carbon::now();
        

        $filetitle=Input::get('file_title');
        
 		//$filetype=Input::get('file_type');
        
      
        //  Session::flash('success', 'Upload successfully'); 

            $data2=array(
                    'description' => $filetitle,
                    'd_id'=> $d_id,
                
                     'uploader_name' => 'shamim',
                     'created_at' => Carbon::now()->toDateTimeString(),
                     'updated_at' => Carbon::now()->toDateTimeString()

                     

                    );

                 DiscussionEntryModel::insert($data2);
                   $current_view= "discussion";
                   $disc = DB::table('discussion')->where('id',$d_id)->get();
       $downloads=DB::table('discussion_entry')->where('d_id',$d_id)->get();
          return view('discussionentry',compact('downloads','disc','current_view'));
      
       
    }
}
