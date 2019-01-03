<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Create a new projects</h1>

	<form method="POST" action="/projects">

		{{ csrf_field() }}

		<div>
			<input type="text" name="title" placeholder="WTF">
		</div>

		<div>
			<textarea name="description" placeholder="project description"></textarea>
		</div>

		<div>
			<button type="submit">Create Project</button>
		</div>
	</form>

</body>
</html>