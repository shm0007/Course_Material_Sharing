<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ config('app.name', 'Home') }}</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
   
    <link rel="stylesheet" type="text/css" href="/css/dt1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready( function () {

   $('#example').dataTable( {
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 50, 100, -1], [5, 50, 100, "All"]]
  } );
} );


</script>
<!--   Free Website Template by t o o p l a t e . c o m   -->
</head>
<body>

<div id="tooplate_wrapper">
	
	<div id="tooplate_header">
        <div id="site_title"><h1><a href="#">Service Box</a></h1></div>
        
        <div id="tooplate_menu">
            <ul>
                <li><a href="#" class="current">Dashboard</a></li>
                <li><a href="#" >Discussion</a></li>
              
                <li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_main">
    
		<div id="tooplate_content">
        	
      		
            
            <div class="col_w900 col_w900_last">
            	
                 
				@yield('content')
                
				<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of content -->
        
    </div> <!-- end of main -->
    
    <div id="tooplate_footer">
    	Copyright © 2048 <a href="#">Department of CSE, SUST</a>
	</div> <!-- end of footer -->
    
</div> <!-- end of wrapper -->
<!--   Free Website Template by t o o p l a t e . c o m   -->
</body>
</html>