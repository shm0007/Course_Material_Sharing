@extends('layouts.template')
@section('content')

 


    <table id="example" class="display"  style="color:#d76300">
        <thead>
            <tr>
                <th  >Course Code</th>
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
                             <td >
                                <a href="{!! route('uploadfile',[$crs->course_code,$crs->taking_dept,$crs->offered_dept,$crs->session]) !!}" class="btn btn-success" style="margin-right: 3px;color:white">View
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