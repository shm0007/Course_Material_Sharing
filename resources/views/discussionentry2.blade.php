@extends('layouts.template_body')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-5">
        
         <div id="div2cc" style="border: 2px solid violet;border-radius: 5px;padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;">
         <p>Enter a comment</p>
      {!!Form::open(array('route' => ['insertdiscussion','dsf','fsdfdsf','fdsf','ffdsf'] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
      <div class="form-group">
         
         <div class="col-sm-10">
            <input type="text" name='file_title'class="form-control file_title_c" id="form-control file_title_id" placeholder="Enter title" value="{{ Input::old('file_title')}}">
            @if($errors->has('file_title')) 
            <p class="help-block"> {{ $errors->first('file_title')}} </p>
            @endif
         </div>
          
      </div>
    <div class="form-group">
         
        <div class="col-sm-10">
            <input type="text" name='file_type'class="form-control file_title_c" id="form-control file_title_id" placeholder="Description" value="{{ Input::old('file_type')}}">
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
      </div>
    </div>


         <div class="row">
           <div class="col-md-2"></div>
          <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Uploader</th>
                <th>Comment</th>
                <th>Time</th>
                
            </tr>
        </thead>
     
        <tbody>

             @for($i=0;$i< count($downloads);$i++)
              
               <td> <strong>{{$downloads[$i]->uploader_name}}</strong></td>
                   <td>{{$downloads[$i]->description}}</td> 
                   <td> {{$downloads[$i]->created_at}}</td>
                            
              @endfor

           </div>

         </div>
                      
         

    </div>
  
@stop