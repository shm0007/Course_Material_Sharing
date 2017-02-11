@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome, User</div>

                
            </div>
        </div>
    </div>
    <div> 


    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Taking Dept</th>
                <th>Session</th>
                <th>Details</th>
            </tr>
        </thead>
        <tfoot>
           <tr>
                <th>Course Code</th>
                <th>Taking Dept</th>
                <th>Session</th>
                <th>Details</th>
            </tr>
        </tfoot>
        <tbody>
         
           @foreach($course_list as $crs)
                     
                              <tr>
                            <td>{{$crs->course_code}}</td>
                            <td>{{$crs->taking_dept}}</td>
                            <td>{{$crs->session}}</td>
                            <td class="panel danger">

                                <a href="{!! route('uploadfile',[$crs->course_code.'+'.$crs->taking_dept.'+'.$crs->offered_dept.'+'.$crs->session]) !!}" class="btn btn-success btn-xs btn-archive" style=margin-right: 3px;">Draft
                                </a>$crs->course_code
                                    </td>
                        </tr>
                  
                    @endforeach
            

        </tbody>
    </table></div>
    </div>
@stop
@section('style')

@stop
@section('script')



@stop