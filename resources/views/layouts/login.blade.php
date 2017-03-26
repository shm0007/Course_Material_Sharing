<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	
 			<head>
		<title>Pinball Website Template | Home :: w3layouts</title>
		<link href="css/style_login.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="images/fav-icon.png" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	
    	{!! Html::style('css/bootstrap.min.css') !!}
		<!-- Global CSS for the page and tiles -->
		{!! Html::style('css/main.css') !!}
  		

 			<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/login.css" />
        </head>
	<body>
		<!---start-wrap---->
			
		<!---start-content---->
		<div class="content">
			<div class="wrap">
			 <div id="main" role="main">
			 	@yield('content')
			    </div>
			</div>
		</div>
		<!---//End-content---->
		
		<!---//End-wrap---->
	</body>
</html>

