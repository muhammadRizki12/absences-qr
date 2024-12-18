<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data user</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .btn-container {
            text-align: right;
            margin-bottom: 10px;
        }

        .btn-icon {
            padding: 5px 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Halo Admin - SMK Negeri 1 Soreang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3 bg-light p-3">
                <h5 class="text-primary">HOME</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/dashboardadmin">Dashboard</a>
                    </li>
                </ul>
                <h5 class="text-primary mt-3">ADMIN</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/classes">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedules">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/absences">Laporan Kehadiran</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-12 col-md-9">
                <div class="container">
                    <h3 class="mb-4">Data Guru SMK 1 Soreang</h3>

                    <!-- Tombol "Tambah Data user" di atas tabel -->
                    <div class="btn-container">
                        <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Data user</a>
                    </div>

                    <!-- Tabel Data user -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama <br>NIP/NI PPPK</th>
                                    <th scope="col">L/P</th>
                                    <th scope="col">Jenjang Jabatan <br>Pangkat & Golongan</th>
                                    <th scope="col">Jabatan Tugas Utama</th>
                                    <th scope="col">Jabatan Tugas Tambahan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $user->username }}</strong><br>
                                            {{ $user->nip }}
                                        </td>
                                        <td>{{ $user->gender }}</td>
                                        <td>
                                            <strong>{{ $user->job_tier }}</strong><br>
                                            {{ $user->rank }}
                                        </td>
                                        <td>{{ $user->main_position }}</td>
                                        <td>{{ $user->additional_position }}</td>
                                        </td>
                                        <td>{{ $user->email }}</td>

                                        <td>{{ $user->role }}</td>

                                        <td>
                                            <!-- Tombol Edit (ikon pensil) -->
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-warning btn-sm btn-icon" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Form untuk menghapus data dengan ikon tong sampah -->
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-icon"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tombol "Selengkapnya lihat di sini" -->
                    <div class="mt-4 text-center">
                        <a href="https://docs.google.com/spreadsheets/d/1WKsrrw9crQHSnC3cG4ejtSnuFacrPv3jtF0EjM9D14U/edit?gid=0#gid=0"
                            class="btn btn-primary" target="_blank">
                            Selengkapnya lihat di sini
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
