@extends('layouts.template_body')
@section('content')
<div class="container">
    
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">
        <h3>Topic: {{$disc[0]->discussion_title}}</h3>
         <h5>Created on: {{$disc[0]->uploaded_time}}</h5>

      </div>


    </div>



        


             @for($i=0;$i< count($downloads);$i++)
              <div class="row">
           <div class="col-md-3"></div>>
           <div class="col-md-6" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">
            
            @for($j=0;$j<count($image);$j++)
            
              @if($image[$j]->user_name==  $downloads[$i]->uploader_name )
              @php
              $link = $image[$j]->image_link;
              @endphp
              @endif

      
            @endfor
            
            
                <img src="{{$link}}" height="25px" width="25px">
                <p> <strong>{{$downloads[$i]->uploader_name}}</strong> at
               
                   {{$downloads[$i]->created_at}} 
                    @if(Auth::user()->name==$downloads[$i]->uploader_name)
                    <a href="{!! route('deletecomment',[$downloads[$i]->d_id,$downloads[$i]->id]) !!}" class="btn btn-xs btn-danger" style="text-decoration: none">Delete</a>
                    @endif
                    </p>
                  <div>
                  {{$downloads[$i]->description}}
                   </div>    
              </div> 
              </div> 

              @endfor

          

        
                      
         
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        </div>
    </div>
  
     
        
         <div class="row" id="div2cc" style="padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;">
         <div class="col-md-3"></div>
         <div class="col-md-6" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; border-radius: 5px; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">
       
      {!!Form::open(array('route' => ['insertdiscussionentry',$disc[0]->id] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
      <div class="form-group">
         
         <div class="col-sm-10">
            <input style="width: 200px;" type="text" name='file_title'class="form-control file_title_c" id="form-control file_title_id" placeholder="Leave a comment" value="{{ Input::old('file_title')}}">
            @if($errors->has('file_title')) 
            <p class="help-block"> {{ $errors->first('file_title')}} </p>
            @endif
         </div>
          
      </div>
    
      


      <div class="form-group">
         <div class="col-sm-5 col-sm-offset-4">
            <button type="submit" class="btn btn-default">Post</button>
         </div>
      </div>
      <!-- </form> -->
      {!! Form::close() !!}
   </div>
   </div>
    </div>


@stop