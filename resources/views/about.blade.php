<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SMK Negeri 1 Soreang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Halo Admin - SMK Negeri 1 Soreang
            </a>a
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/dashboardadmin">Dashboard</a>
                    </li>
                </ul>
            </div>
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

            <!-- Main Content -->
            <div class="col-12 col-md-9 p-3">
                <h3>Visi dan Misi</h3>
                <div class="card mb-4">
                    <div class="card-header bg-success text-white text-center">
                        <h5>VISI</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Terwujudnya Peserta Didik Yang Religius, Cerdas, Terampil, Mandiri Dan Berwawasan Global</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h5>MISI</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Menanamkan keimanan dan ketakwaan, melalui pengalaman ajaran agama</li>
                            <li>Mengoptimalkan proses pembelajaran dan bimbingan</li>
                            <li>Mengembangkan bidang ilmu pengetahuan dan teknologi berdasarkan minat bakat dan potensi
                                peserta didik</li>
                            <li>Membina kemandirian peserta didik melalui kegiatan pembiasaan, kewirausahaan, dan
                                pengembangan diri yang terencana dan berkesinambungan</li>
                            <li>Menjalin kerjasama yang harmonis antar warga sekolah, dan lembaga lain yang terkait</li>
                        </ul>
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
