<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create-schedules</title>
</head>

<body>
    <h1>Create Schedules</h1>
    <form action="{{ route('schedule.store') }}" method="post">
        @csrf
        <div>
            <label for="users">Choose a user:</label>
            <select name="user_id" id="users">
                @foreach ($users as $user)
                    <option value={{ $user->id }}>{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="classes">Choose a class:</label>
            <select name="class_id" id="classes">
                @foreach ($classes as $class)
                    <option value={{ $class->id }}>{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="day">Choose a day:</label>
            <select name="day" id="day">
                <option value="">--pilih hari--</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>

        <div>
            <label for="entry_time">Choose a entry time:</label>
            <input type="time" name="entry_time" id="entry_time">
        </div>

        <div>
            <label for="out_time">Choose a out time:</label>
            <input type="time" name="out_time" id="out_time">
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</body>

</html>
