@extends('layouts.template_body')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        </div>
    </div>
    <div> 


    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Discussion Title</th>
                <th>Last Entry</th>
                <th>Total comments</th>
                <th>Details</th>
            </tr>
        </thead>
     
        <tbody>
         
           @foreach($downloads as $dwm)
                     
                        <tr>
                            <td>{{$dwm->title}}</td>
                            <td>10 tarikh</td>
                            <td>1000000</td>
                            @if( strcmp($dwm->status ,"suspended" )!=0)
                            <td class="panel danger">
                                <a href="a.com" class="btn btn-success btn-xs btn-archive" style=margin-right: 3px;">VIew
                                </a>
                            </td>
                            @else
                            <td class="panel danger">
                                <a href="a.com" class="btn btn-danger btn-xs btn-archive" style=margin-right: 3px;">Suspended
                                </a>
                            </td>
                            @endif

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