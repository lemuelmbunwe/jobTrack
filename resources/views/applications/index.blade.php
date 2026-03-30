<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    @foreach($applications as $app)
        <p>Applied to <strong>{{ $app->company }}</strong> in the capacity of <strong> {{ $app->role }} </strong></p>
    
    @endforeach
</body>
</html>