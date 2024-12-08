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
                    <option value={{ $user->id }}>{{ $user->nama }}</option>
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
            <label for="hari">Choose a day:</label>
            <select name="hari" id="hari">
                <option value="">--pilih hari--</option>
                <option value="senin">Senin</option>
                <option value="selasa">Selasa</option>
                <option value="rabu">Rabu</option>
                <option value="kamis">Kamis</option>
                <option value="jumat">Jumat</option>
            </select>
        </div>

        <div>
            <label for="hari">Choose a entry time:</label>
            <input type="time" name="waktu_masuk" id="waktu_masuk">
        </div>

        <div>
            <label for="hari">Choose a out time:</label>
            <input type="time" name="waktu_keluar" id="waktu_keluar">
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</body>

</html>
