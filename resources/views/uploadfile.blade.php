@extends('layouts.template_body')
@section('content')
<div class="container">
   <div class="details">
      <h3>Course Name: XXX</h3>
      <p>Course code: XXX
      <p>
      <p>Course Taken: 70 students </p>
      <p>Total Credit : 3</p>
   </div>
   <div id="preview"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload Files</button></div>
   <div id="div2">
      {!!Form::open(array('route' => ['insertfile', $course_code,$taking_dept,$offered_dept,$sesson] , 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) !!}
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
   <div>
      <table id="example" class="display">
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
                  <a href="/up_file/{{$dow2->file_name}}" download="{{$dow2->file_name}}">        
                  {{$dow2->file_name}}           
                  </a>
                  @endif
                  @endforeach
               </td>
               <td>
                  @if($in==1)
                  <a href="{{ route('viewAlldownloadfile', $down->file_name) }}" class="btn btn-success btn-xs btn-archive"  style="margin-right: 3px;color: white;">View
                  </a>
                  @else
                  <button type="button" class="btn btn-default" disabled="disabled"  style="margin-right: 3px;">View</button>
                  @endif
                  
                  <!-- {{$te= $down->title}} -->
                  <a href="#" data-record-id={{ $te }} class="btn btn-danger btn-xs btn-archive deleteBtn" data-record-title= {{ $te }} data-toggle="modal" data-target="#confirm-delete">Delete</a>
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
   <a href="#" data-record-id="23" data-record-title="The first one" data-toggle="modal" data-target="#confirm-delete">
   Delete "The first one", #23
   </a>
   <br />
   <button class="btn btn-default" data-record-id="54" data-record-title="Something cool" data-toggle="modal" data-target="#confirm-delete">
   Delete "Something cool", #54
   </button>
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