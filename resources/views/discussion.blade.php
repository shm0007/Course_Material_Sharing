@extends('layouts.template_body')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        </div>
    </div>
    <div> 
    <div id="preview"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Create a Discussion</button></div>
        <div id="div2">
      {!!Form::open(array('route' => ['insertdiscussion','dsf','fsdfdsf','fdsf','ffdsf'] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
      <div class="form-group">
         <label class="control-label col-sm-2" for="name">Title:</label>
         <div class="col-sm-10">
            <input type="text" name='file_title'class="form-control file_title_c" id="form-control file_title_id" placeholder="Enter title" value="{{ Input::old('file_title')}}">
            @if($errors->has('file_title')) 
            <p class="help-block"> {{ $errors->first('file_title')}} </p>
            @endif
         </div>
          
      </div>
    <div class="form-group">
         <label class="control-label col-sm-2" for="name">Type:</label>
        <div class="col-sm-10">
            <input type="text" name='file_type'class="form-control file_title_c" id="form-control file_title_id" placeholder="Enter type" value="{{ Input::old('file_type')}}">
            @if($errors->has('file_type')) 
            <p class="help-block"> {{ $errors->first('file_title')}} </p>
            @endif
         </div>
          
      </div>
      


      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
         </div>
      </div>
      <!-- </form> -->
      {!! Form::close() !!}
   </div>

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
                            <td>{{$dwm->discussion_title}}</td>
                            <td>10 tarikh</td>
                            <td>1000000</td>
                            @if( strcmp($dwm->status ,"suspended" )!=0)
                            <td class="panel danger">
                                <a href="a.com" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;color: white;">VIew
                                </a>
                                <a href="a.com" class="btn btn-danger btn-xs btn-archive" style="margin-right: 3px;color: white">Suspend
                                </a>
                            </td>
                            @else
                            <td class="panel danger">
                                <a href="a.com" class="btn btn-danger btn-xs btn-archive" style="margin-right: 3px;color: white;">Suspended
                                </a>
                                <a href="a.com" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;color: white">Undo
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