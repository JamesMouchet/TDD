<html>
<head>

</head>
<body>
<h1>Listes des projets</h1>
@foreach($projectts as $projectt)
    <p>{{ $projectt->title }}</p>
@endforeach
</body>
</html>