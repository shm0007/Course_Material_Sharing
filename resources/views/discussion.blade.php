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
                <th>Discussion Type</th>
              
                <th>Total comments</th>

                <th>Details</th>
            </tr>
        </thead>
     
        <tbody>
         
           @foreach($downloads as $dwm)
              @foreach($enrol as $en)
              @if($en->course_code== $dwm->course_code    && $en->offered_dept == $dwm->offered_dept && $en->taking_dept == $dwm->taking_dept && $en->taking_session == $dwm->session)
                     
                        <tr>
                            <td>{{$dwm->discussion_title}}</td>
                            <td>{{$dwm->discussion_type}}</td>
                            <td>
                            
                          <!--{{$ct=0}} -->
                            @foreach($entry as $ent)
                            @if($ent->d_id==$dwm->id)
                           <!-- {{$ct = $ct+1}} -->
                            @endif
                            @endforeach


                            
                            {{$ct}}
                            </td>
                       
                            @if( strcmp($dwm->status ,"suspended" )!=0)
                            <td class="panel danger">
                                <a href="{{ route('discussionEntry', $dwm->id) }}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;color: white; text-decoration:none; width: 70px;height: 20px;">View
                                </a>
                                @if( Auth::user()->role==1)
                                <a href="{{ route('discussion.update3', $dwm->id) }}" class="btn btn-danger btn-xs btn-archive" style="margin-right: 3px;color: white;  text-decoration:none">Suspend
                                </a>
                                @endif
                            </td>
                            @else
                            <!-- $act="ok" -->
                            <td class="panel danger">
                                <a href="#" class="btn btn-danger btn-xs btn-archive" disabled="disabled"style="margin-right: 3px;color: white; text-decoration:none">Suspended
                                </a>
                                @if(Auth::user()->role==1)
                                <a href="{{ route('discussion.update2', $dwm->id) }}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;color: white; text-decoration:none">Undo
                                </a>
                                @endif
                            </td>
                            @endif

                        </tr>
                  @endif

                    @endforeach
                      @endforeach
            

        </tbody>
    </table></div>
    </div>
@stop
@section('style')

@stop
@section('script')



@stop