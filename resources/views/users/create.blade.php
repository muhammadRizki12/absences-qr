<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Form Data Pegawai</h1>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div>
            <label for="username">Nama</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" required>
                <option value="laki-laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
            </select>
        </div>

        <div>
            <label for="rank">Pangkat</label>
            <input type="text" id="rank" name="rank">
        </div>

        <div>
            <label for="grade">Golongan</label>
            <input type="text" id="grade" name="grade">
        </div>

        <div>
            <label for="job_tier">Jenjang Jabatan</label>
            <input type="text" id="job_tier" name="job_tier">
        </div>

        <div>
            <label for="main_position">Jabatan Utama</label>
            <input type="text" id="main_position" name="main_position">
        </div>

        <div>
            <label for="additional_postion">Jabatan Tambahan</label>
            <input type="text" id="additional_postion" name="additional_postion">
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>

</html>
