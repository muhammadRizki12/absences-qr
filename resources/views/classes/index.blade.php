<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index classes</title>
</head>

<body>
    @foreach ($classes as $class)
        <div style="margin-top: 50px; text-align: center">
            <h1 for="">{{ $class->class_name }}</h1>
            <img src="data:image/png;base64,{{ $class->qr_image }}">
        </div>
    @endforeach
</body>

</html>
