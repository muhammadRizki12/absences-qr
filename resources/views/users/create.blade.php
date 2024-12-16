<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Data Guru</title>
    <!-- Menambahkan link CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="/laporan_kehadiran">Laporan Kehadiran</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-9">
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>Form Data Guru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nama</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>

                                <!-- Gender -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-select" required>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <!-- Rank -->
                                <div class="mb-3">
                                    <label for="rank" class="form-label">Pangkat</label>
                                    <input type="text" id="rank" name="rank" class="form-control">
                                </div>

                                <!-- Grade -->
                                <div class="mb-3">
                                    <label for="grade" class="form-label">Golongan</label>
                                    <input type="text" id="grade" name="grade" class="form-control">
                                </div>

                                <!-- Job Tier -->
                                <div class="mb-3">
                                    <label for="job_tier" class="form-label">Jenjang Jabatan</label>
                                    <input type="text" id="job_tier" name="job_tier" class="form-control">
                                </div>

                                <!-- Main Position -->
                                <div class="mb-3">
                                    <label for="main_position" class="form-label">Jabatan Utama</label>
                                    <input type="text" id="main_position" name="main_position"
                                        class="form-control">
                                </div>

                                <!-- Additional Position -->
                                <div class="mb-3">
                                    <label for="additional_position" class="form-label">Jabatan Tambahan</label>
                                    <input type="text" id="additional_position" name="additional_position"
                                        class="form-control">
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
