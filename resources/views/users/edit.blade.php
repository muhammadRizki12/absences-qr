<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="nip">NIP:</label>
        <input type="text" id="nip" name="nip" value="{{ $user->nip }}" required><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ $user->username }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
            placeholder="Leave blank to keep current password"><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select><br><br>

        <label for="rank">Rank:</label>
        <input type="text" id="rank" name="rank" value="{{ $user->rank }}"><br><br>

        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" value="{{ $user->grade }}"><br><br>

        <label for="job_tier">Job Tier:</label>
        <input type="text" id="job_tier" name="job_tier" value="{{ $user->job_tier }}"><br><br>

        <label for="main_position">Main Position:</label>
        <input type="text" id="main_position" name="main_position" value="{{ $user->main_position }}"><br><br>

        <label for="additional_position">Additional Position:</label>
        <input type="text" id="additional_position" name="additional_position"
            value="{{ $user->additional_position }}"><br><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>
