<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>
	Hello Guys this is Mubashir's Daily routines:
	<ul>
	@foreach($tasks as $task)
		<li>{{ $task->body }}</li>
	@endforeach
	</ul>
</body>
</html>