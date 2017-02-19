@extends('layouts.template')
@section('content')
<div class="container">
 
 
  {!!Form::open(array('route' => ['insertfile', $course_code,$taking_dept,$teacher,$sesson] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Title:</label>
      <div class="col-sm-10">
        <input type="text" name='file_title'class="form-control file_title_c" id="form-control file_title_id" placeholder="Enter title" value="{{ Input::old('file_title')}}">

        @if($errors->has('file_title')) <p class="help-block"> {{ $errors->first('file_title')}} </p> @endif

      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Upload:</label>
      <div class="col-sm-10">          
        <input type="file" name="filenam" class="filename">

        @if($errors->has('filenam')) <p class="help-block"> {{ $errors->first('filenam')}} </p> @endif

      </div>
    </div>
   <!--  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div> -->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  <!-- </form> -->
  {!! Form::close() !!}
  <div>
    <table class="table table-bordered">
          <thead>
            <th>{{$sesson}}</th>
            <th>File Name</th>
            <th>Action</th>
          </thead>

          <tbody>

          @foreach($downloads as $down)
            
            <tr>
              <td>{{$down->title}}</td>
              <td>{{$down->file_name}}</td>
              <td><a href="/up_file/{{$down->file_name}}" download="{{$down->file_name}}">
                <button type="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-download">  Download</i>

                </button>
              </a></td>
              <td class="panel danger">
                                                        <a href="{{ route('viewAlldownloadfile', $down->file_name) }}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;">View
                                                        </a>
                                                    </td>           </tr>
          
          @endforeach
          </tbody>
          
         </table>



  </div>
</div>
@stop
@section('style')

@stop
@section('script')



@stop