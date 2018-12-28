<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Projects</h1>

	@foreach($projects as $project) <!--use foreach loop to fetch single data from database-->
		<li>{{ $project -> title }}</li>
	@endforeach

</body>
</html>