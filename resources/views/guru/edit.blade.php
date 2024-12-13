<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Data Guru</title>
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Data Guru</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dataguru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="{{ old('nama', $guru->nama) }}" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP/NI PPPK</label>
                <input type="text" class="form-control" id="nip" name="nip"
                    value="{{ old('nip', $guru->nip) }}" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jenjang_jabatan" class="form-label">Jenjang Jabatan</label>
                <input type="text" class="form-control" id="jenjang_jabatan" name="jenjang_jabatan"
                    value="{{ old('jenjang_jabatan', $guru->jenjang_jabatan) }}" required>
            </div>
            <div class="mb-3">
                <label for="pangkat_golongan" class="form-label">Pangkat & Golongan</label>
                <input type="text" class="form-control" id="pangkat_golongan"
                    name="pangkat_golongan"value="{{ old('jenjang_jabatan', $guru->pangkat_golongan) }}" required>
            </div>
            <div class="mb-3">
                <label for="jabatan_tugas_utama" class="form-label">Jabatan Tugas Utama</label>
                <input type="text" class="form-control" id="jabatan_tugas_utama" name="jabatan_tugas_utama"
                    value="{{ old('jabatan_tugas_utama', $guru->jabatan_tugas_utama) }}" required>
            </div>
            <div class="mb-3">
                <label for="jabatan_tugas_tambahan" class="form-label">Jabatan Tugas Tambahan</label>
                <input type="text" class="form-control" id="jabatan_tugas_tambahan" name="jabatan_tugas_tambahan"
                    value="{{ old('jabatan_tugas_tambahan', $guru->jabatan_tugas_tambahan) }}">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $guru->keterangan) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
