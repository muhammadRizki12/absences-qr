<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Data Guru</title>
</head>

<body>
    <div class="container mt-5">
        <h3>Tambah Data Guru</h3>
        <form action="{{ route('dataguru.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP/NI PPPK</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jenjang_jabatan" class="form-label">Jenjang Jabatan</label>
                <input type="text" class="form-control" id="jenjang_jabatan" name="jenjang_jabatan" required>
            </div>
            <div class="mb-3">
                <label for="pangkat_golongan" class="form-label">Pangkat & Golongan</label>
                <input type="text" class="form-control" id="pangkat_golongan" name="pangkat_golongan" required>
            </div>
            <div class="mb-3">
                <label for="jabatan_tugas_utama" class="form-label">Jabatan Tugas Utama</label>
                <input type="text" class="form-control" id="jabatan_tugas_utama" name="jabatan_tugas_utama" required>
            </div>
            <div class="mb-3">
                <label for="jabatan_tugas_tambahan" class="form-label">Jabatan Tugas Tambahan</label>
                <input type="text" class="form-control" id="jabatan_tugas_tambahan" name="jabatan_tugas_tambahan">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
