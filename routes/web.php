<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Route::get('uploadfile/{id}',['as' => 'uploadfile', 'uses' => 'UploadController@getviewteacher']);
Route::get('uploadfile/{course_code}/{taking_dept}/{teacher}/{sesson}',['as' => 'uploadfile', 'uses' =>  'UploadController@getviewteacher']);
Route::get('/home', 'HomeController@index');
Route::get('/uploadfile','UploadController@getview');

Route::post('/insertfile/{course_code}/{taking_dept}/{teacher}/{sesson}',array('as'=>'insertfile' , 'uses' => 'UploadController@insertFile'));
Route::get('/viewAlldownloadfile','DownloadController@downfunc');
Route::get('/viewAlldownloadfile/{id}', ['as' => 'viewAlldownloadfile', 'uses' =>  'DownloadController@viewfunc']);
Route::get('/discussion', ['as'=> 'discussion', 'uses'=>  'DiscussionController@getview']);




//Route::get('uploadfile/{id}',['as' => 'uploadfile', 'uses' => 'UploadController@getviewteacher']);







