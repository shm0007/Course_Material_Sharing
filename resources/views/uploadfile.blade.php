<!DOCTYPE html>
<html lang="en">
<head>
  <title>File Upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="//cdnjs/cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs/cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.js" rel="stylesheet">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
   
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
  <style type="text/css">
  .help-block{
  	color: red;
  }
  </style>
<script>
$(document).ready( function () {

   $('#example').dataTable( {
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 50, 100, -1], [5, 50, 100, "All"]]
  } );
} );


</script>
  <script >
  	@if(Session::has('message'))
  	var type = ""{{ Session::get('alert-type','info')}};
	switch(type){

		case 'success':
		toastr.success("{{ Session::get('message')}}");
		break;

		case 'error':
		toastr.error("{{ Session::get('message')}}");
		break;
	}
	@endif  	
  </script>

</head>
<body>

<div class="container">
  <h2>File Upload</h2>
  <!-- <form class="form-horizontal"> -->
  {!! Form::open(array('url'=>'insertfile','method'=>'POST', 'class' =>'form-horizontal' , 'files' => true))!!}
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
  <table class="table table-bordered">
          <thead>
            <th>Title</th>
            <th>File Name</th>
            <th>Action</th>
          </thead>

          <tbody>

          @foreach($downloads as $down)
            @if($down->material_type=="pdf")
            <tr>
              <td>{{$down->title}}</td>
              <td>{{$down->file_name}}</td>
              <td><a href="up_file/{{$down->file_name}}" download="{{$down->file_name}}">
                <button type="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-download">  Download</i>

                </button>
              </a></td>
              <td class="panel danger">
                                                        <a href="viewAlldownloadfile\{{$down->file_name}}" class="btn btn-success btn-xs btn-archive" style="margin-right: 3px;">View
                                                        </a>
                                                    </td>           </tr>
          @endif
          @endforeach
          </tbody>
          
         </table>
</body>
</html>
