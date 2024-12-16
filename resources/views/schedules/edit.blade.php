<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('schedule.update', $schedule->id) }}" method="post">
        @csrf
        @method('PATCH')

        <!-- Study -->
        <div class="mb-3">
            <label for="study" class="form-label">Mata pelajaran</label>
            <input type="text" name="study" id="study" class="form-control" value="{{ $schedule->study }}"
                required>
        </div>

        <!-- User Selection -->
        <div class="mb-3">
            <label for="users" class="form-label">Choose a User</label>
            <select name="user_id" id="users" class="form-select" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $schedule->user_id ? 'selected' : '' }}>
                        {{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <!-- Class Selection -->
        <div class="mb-3">
            <label for="classes" class="form-label">Choose a Class</label>
            <select name="class_id" id="classes" class="form-select" required>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id == $schedule->class_id ? 'selected' : '' }}>
                        {{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Day Selection -->
        <div class="mb-3">
            <label for="day" class="form-label">Choose a Day</label>
            <select name="day" id="day" class="form-select" required>
                <option value="">--pilih hari--</option>
                <option value="Senin" {{ $schedule->day == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="Selasa" {{ $schedule->day == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="Rabu" {{ $schedule->day == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="Kamis" {{ $schedule->day == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="Jumat" {{ $schedule->day == 'Jumat' ? 'selected' : '' }}>Jumat</option>
            </select>
        </div>

        <!-- Entry Time -->
        <div class="mb-3">
            <label for="entry_time" class="form-label">Entry Time</label>
            <input type="time" name="entry_time" id="entry_time" class="form-control"
                value="{{ $schedule->entry_time }}" required>
        </div>

        <!-- Out Time -->
        <div class="mb-3">
            <label for="out_time" class="form-label">Out Time</label>
            <input type="time" name="out_time" id="out_time" class="form-control" value="{{ $schedule->out_time }}"
                required>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</body>

</html>
