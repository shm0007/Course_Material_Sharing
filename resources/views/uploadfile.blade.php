@extends('layouts.template_body')
@section('content')
<div class="container">
   <div class="details">
      <h3>Course Name: {{ $crs_details[0]->course_name}} </h3>
      <p>Course code: {{ $crs_details[0]->course_code}}
      <p>
      <p>Course Taken: {{ $tot_crs_taken }} students </p>
      <p>Total Credit : {{ $crs_details[0]->credit}}</p>
   </div>
   @if(Auth::user()->role==1)
   <div id="preview"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload Files</button></div>
   @endif
   <div id="div2"  >
      {!!Form::open(array('route' => ['insertfile', $course_code,$taking_dept,$offered_dept,$sesson] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
      <div class="form-group">
         <label class="control-label col-sm-2" for="name">Title:</label>
         <div class="col-sm-10">
            <input type="text" name='file_title'class="form-control file_title_c" id="form-control file_title_id" placeholder="Enter title" value="{{ Input::old('file_title')}}" required>
            @if($errors->has('file_title')) 
            <p class="help-block"> {{ $errors->first('file_title')}} </p>
            @endif
         </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-2" for="pwd">Upload:</label>
         <div class="col-sm-10">          
            {!! Form::file('myfile[]', array('multiple'=>true)) !!}
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
<br> </br>
   <div>
      <table id="example" class="display"  cellspacing="0" width="100%">
         <thead>
            <th>Title</th>
            <th>File Name</th>
            <th>Action</th>
         </thead>
         <tbody>
            @foreach($multi as $down)
            <!-- {{$in=0}} -->
            <tr>
               <td>{{$down->title}} <img src="/extensions/{{$down->image}}" height="20" width="20"></td>
               <td>
                  @foreach($downloads as $dow2)
                  @if($dow2->title ==$down->title)
                  ({{$in=$in+1}})
                  <a href="/up_file/{{$dow2->file_name}}" download="{{$dow2->file_name}}" style="color:black;">        
                  {{$dow2->file_name}}           
                  </a>
                  @endif
                  @endforeach
               </td>
               <td style="width:100px">
                  @if($in==1)
                  @if($down->material_type=="pdf")
                  <a href="{{ route('viewAlldownloadfile', $down->file_name) }}" class="btn btn-success btn-xs btn-archive"  style="margin-right: 3px;color: white; text-decoration:none">View
                  </a>
                  @else
                 <!-- {{$lnk = "http://10.100.32.128:8000/up_file/".$down->file_name}} -->
                  <a href="{{$lnk}}" target="_blank" class="btn btn-success btn-xs btn-archive"  style="margin-right: 3px;color: white; text-decoration:none;">View
                  </a>
                  @endif
                  @else
                  <button type="button" class="btn btn-success btn-xs btn-archive" disabled="disabled"  style="margin-right: 3px;color:white; text-decoration:none">View</button>
                  @endif
                  
                  <!-- {{$te= $down->title}} -->
                  @if(Auth::user()->role==1)
                  <a href="#" style="color:white; text-decoration:none" data-record-id={{ $te }} class="btn btn-danger btn-xs btn-archive deleteBtn" data-record-title= {{ $te }} data-toggle="modal" data-target="#confirm-delete">Delete</a>
                  @endif
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
               <p>You are about to delete <b><i class="title"></i></b>, this procedure is irreversible.</p>
               <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-danger btn-ok">Delete</button>
            </div>
         </div>
      </div>
   </div>


   <script>

      $('#confirm-delete').on('click', '.btn-ok', function(e) {
          var $modalDiv = $(e.delegateTarget);
          var id = $(this).data('recordId');
          var course_code =  '<?php echo $course_code ?>';
          var offered_dept =  '<?php echo $offered_dept ?>';
          var taking_dept =  '<?php echo $taking_dept ?>';
          var sesson =  '<?php echo $sesson ?>';

          $modalDiv.addClass('loading');
          setTimeout(function() {
              $modalDiv.modal('hide').removeClass('loading');
          }, 1000)
          document.location.href="//localhost:8000/uploadfile/"+ id +"/"+course_code+"/"+offered_dept+"/"+taking_dept+"/"+ sesson+   "/delete"
      });
      $('#confirm-delete').on('show.bs.modal', function(e) {
          var data = $(e.relatedTarget).data();
          $('.title', this).text(data.recordTitle);
          $('.btn-ok', this).data('recordId', data.recordId);
      });
   </script>
</div>
@stop