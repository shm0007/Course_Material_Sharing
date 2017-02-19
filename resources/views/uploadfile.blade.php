@extends('layouts.template_body')
@section('content')
<div class="container">
  <div class="details">
  <h3>Course Name: XXX</h3>
  <p>Course code: XXX<p>

  <p>Course Taken: 70 students </p>
  <p>Total Credit : 3</p>

  </div>
  <div id="preview"><button type="submit" class="btn btn-default">Upload Files</button></div>
  <div id="div2">
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
  </div>
  <div>
   <table id="example" class="display">
          <thead>
            <th>Title</th>
            <th>File Name</th>
            <th>Action</th>
          </thead>

          <tbody>

          @foreach($downloads as $down)
            
            <tr>
              <td>{{$down->title}}</td>
              
              <td><a href="/up_file/{{$down->file_name}}" download="{{$down->file_name}}">
                
                  {{$down->file_name}}

                
              </a></td>
              <td> <a href="{{ route('viewAlldownloadfile', $down->file_name) }}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;color: white;">View
                                                        </a> 
<a href="{{ route('viewAlldownloadfile', $down->file_name) }}" class="btn btn-danger btn-xs btn-archive" style="margin-right: 3px;color: white;">Delete
                                                        </a>

                                                        </td>
                        </tr>
          
          @endforeach
          </tbody>
          
         </table>
         </div>
</div>
 

@stop
