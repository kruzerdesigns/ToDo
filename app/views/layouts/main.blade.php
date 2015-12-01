
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>To Do App</title>


	<link rel="stylesheet" href="{{ URL::asset('css/foundation.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
	<link href='http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
	 
</head>

<body>
	
		@yield('content')
	

</body>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{ URL::asset('js/vue.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/script.js') }}" type="text/javascript"></script> 
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</html>