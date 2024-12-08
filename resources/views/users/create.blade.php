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
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="nip">NIP</label>
            <input type="text" id="nip" name="nip" required>
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <div>
            <label for="jenjang_jabatan">Jenjang Jabatan</label>
            <input type="text" id="jenjang_jabatan" name="jenjang_jabatan">
        </div>
        <div>
            <label for="pangkat">Pangkat</label>
            <input type="text" id="pangkat" name="pangkat">
        </div>
        <div>
            <label for="golongan">Golongan</label>
            <input type="text" id="golongan" name="golongan">
        </div>
        <div>
            <label for="jabatan_tugas_utama">Jabatan Tugas Utama</label>
            <input type="text" id="jabatan_tugas_utama" name="jabatan_tugas_utama" required>
        </div>
        <div>
            <label for="jabatan_tugas_tambahan">Jabatan Tugas Tambahan</label>
            <input type="text" id="jabatan_tugas_tambahan" name="jabatan_tugas_tambahan">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>

</html>
