@extends('layouts.template')
@section('content')

 


    <table id="example" class="display"  style="color:#d76300"  cellspacing="0" width="100%">
        <thead>
            <tr>
                <th  >Course Code</th>
                <th>Taking Dept</th>
                               <th>Offered Dept</th>
                <th>Session</th>
                <th>Details</th>
            </tr>
        </thead>
       
        <tbody>
         
           @foreach($course_list as $enrol)
                     
                              <tr>
                            <td>{{$enrol->course_code}}</td>
                            <td>{{$enrol->taking_dept}}</td>
                                   <td>{{$enrol->offered_dept}}</td>
                            <td>{{$enrol->taking_session}}</td>
                             <td >
                                
                                <a href="{!! route('uploadfile',[$enrol->course_code,$enrol->taking_dept,$enrol->offered_dept,$enrol->taking_session]) !!}" class="btn btn-success" style="margin-right: 3px;color:white; text-decoration:none"> view
                                </a>

                                <a href="{!! route('discussion.single',[$enrol->course_code,$enrol->taking_dept,$enrol->offered_dept,$enrol->taking_session]) !!}" class="btn btn-success" style="margin-right: 3px;color:white; text-decoration:none;">  <span class="glyphicon glyphicon-comment"></span> Discussion
                                </a>

                                    </td>
                        </tr>
                  
                    @endforeach
            

        </tbody>
    </table>

@stop
@section('style')

@stop
@section('script')



@stop