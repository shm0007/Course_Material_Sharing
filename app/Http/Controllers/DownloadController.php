<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
class DownloadController extends Controller
{
    //

	public function downfunc(){

		$downloads=DB::table('material')->get();

    return view('download.viewfile',compact('downloads'));
    //return view('download.viewfile');
	}


	
	public function viewfunc($id)
	{
//return $id;



	$path = public_path("\\up_file\\".$id);


return Response::make(file_get_contents($path), 200, [
    'Content-Type' => 'application/pdf',
   'Content-Disposition' => 'inline; filename="'.$id.'"'
]);
	}
    

}
