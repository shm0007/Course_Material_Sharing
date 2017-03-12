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
    return view('auth.login');
});

Auth::routes();
//Route::get('uploadfile/{id}',['as' => 'uploadfile', 'uses' => 'UploadController@getviewteacher']);
Route::get('uploadfile/{course_code}/{taking_dept}/{offered_dept}/{sesson}',['as' => 'uploadfile', 'uses' =>  'UploadController@getviewteacher']);
Route::get('/home',['as' => 'home', 'uses' =>'HomeController@index'] );
Route::get('/uploadfile','UploadController@getview');

Route::post('/insertfile/{course_code}/{taking_dept}/{teacher}/{sesson}',array('as'=>'insertfile' , 'uses' => 'UploadController@insertFile'));



Route::get('uploadfile/{title}/{course_code}/{offered_dept}/{taking_dept}/{sesson}/delete',['as' => 'uploadfile.delete', 'uses' => 'UploadController@destroy2']);



Route::get('/viewAlldownloadfile', ['as' => 'viewAlldownloadfile', 'uses' =>  'DownloadController@downfunc']);

Route::get('/viewAlldownloadfile/{id}', ['as' => 'viewAlldownloadfile', 'uses' =>  'DownloadController@viewfunc']);
Route::get('/discussion', ['as'=> 'discussion', 'uses'=>  'DiscussionController@getview']);
Route::get('/discussionEntry/{id}', ['as'=> 'discussionEntry', 'uses'=>  'DiscussionEntryController@getview']);

Route::get('discussion3/{d_id}',['as' => 'discussion.update3', 'uses' => 'DiscussionController@update3']);
Route::get('discussion/{d_id}',['as' => 'discussion.update2', 'uses' => 'DiscussionController@update2']);

//Route::get('uploadfile/{id}',['as' => 'uploadfile', 'uses' => 'UploadController@getviewteacher']);



Route::post('/insertdiscussion/{course_code}/{taking_dept}/{offered_dept}/{sesson}',array('as'=>'insertdiscussion' , 'uses' => 'DiscussionController@insertFile'));


Route::post('/insertdiscussionentry/{d_id}',array('as'=>'insertdiscussionentry' , 'uses' => 'DiscussionEntryController@insertFile'));


