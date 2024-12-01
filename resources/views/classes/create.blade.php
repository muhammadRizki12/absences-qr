<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create - class</title>
</head>

<body>
    <h1>Create class</h1>
    <form action="{{ route('class.store') }}" method="post">
        @csrf
        <input type="text" name="class_name" id="class_name">
        <button type="submit">Save</button>
    </form>
</body>

</html>
