<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ env('APP_NAME', 'Laravel') }}</title>

	<link href="{{ asset('/css/webview.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	@yield('top')
</head>
<body>
    <script>
        (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/messenger.Extensions.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'Messenger'));
    </script>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">{{ env('APP_NAME', 'Laravel') }}</a>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready( function () {
            $('.table').DataTable();
            $('.dataTables_wrapper').css('margin-top', '2rem');
        } );
        
        window.extAsyncInit = function() {
            // the Messenger Extensions JS SDK is done loading 
            console.log('Messenger Extensions JS SDK loaded.');
        };
	</script>

	@yield('bottom')
</body>
</html>
