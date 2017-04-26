@extends('layouts.template_body')
@section('content')
<div class="container">
<div class="row">
   <div class="col-md-3 col-md-offset-5">
   <h4>Welcome, {{Auth::user()->name}}</h4>
   </div>
</div>
<div class="row">
   <div class="col-md-3 col-md-offset-5">

   <img src="{{$image[0]->image_link}}" alt="Smiley face" height="100" width="100">
   </div>
</div>
<div class="row">

	
</div>

  <div class="row"  >
      {!!Form::open(array('route' => ['insertphoto'] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
  
      <div class="form-group">
         <label class="control-label col-sm-2" for="pwd">Change Picture:</label>
         <div class="col-sm-10">          
            {!! Form::file('myfile') !!}
         </div>
      </div>
      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn  btn-success">Upload</button>
         </div>
      </div>
      <!-- </form> -->
      {!! Form::close() !!}
   </div>
</div>
@endsection
