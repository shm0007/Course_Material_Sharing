@extends('layouts.template_body')
@section('content')
<div class="container">
<div class="row">

 {!!Form::open(array('route' => ['adminEdit'] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}

<div class="col-md-2">	
	
	User Name

	<select name="1"  required="">
	@foreach($us as $tmp)
  <option value="{{$tmp->name}}">{{$tmp->name}}</option>
 	@endforeach
</select>
	
</div>
<div class="col-md-2">
	Course Code
<select name="2"  required="">
  	@foreach($crse as $tmp)
  <option value="{{$tmp->course_code}}">{{$tmp->course_code}}</option>
 	@endforeach
</select>
	
</div>
<div class="col-md-2">
	Taking Dept
<select name="3"  required="">
  <option value="CSE">CSE</option>
  <option value="EEE">EEE</option>
  <option value="STAT">STAT</option>
  <option value="ECO">ECO</option>
</select>
	
</div>

<div class="col-md-2">
	
	Offered Dept
<select name="4"  required="">
  <option value="CSE">CSE</option>
  <option value="EEE">EEE</option>
  <option value="STAT">STAT</option>
  <option value="ECO">ECO</option>
</select>
	
</div>

<div class="col-md-2">
	
	Session
<select name="5"  required="">
  <option value="2012-13">2012-13</option>
  <option value="2013-14">2013-14</option>
  <option value="2014-15">2014-15</option>
  <option value="2015-16">2015-16</option>
  <option value="2016-17">2016-17</option>
</select>
<br><br>
<div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
         </div>
      </div>


	{!! Form::close() !!}
</div>


</div>



</div>
@stop