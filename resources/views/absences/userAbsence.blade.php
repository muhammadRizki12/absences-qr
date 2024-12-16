<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kehadiran Guru</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Dashboard Kehadiran Guru - SMK Negeri 1 Soreang
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light p-3 d-none d-md-block">
                <h5 class="text-primary">HOME</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard-guru">Dashboard</a>
                    </li>
                </ul>

                <h5 class="text-primary mt-3">MENU</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Scan QR Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Kehadiran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/schedules">Jadwal</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-12">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4>Data Kehadiran Guru</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Tabel Kehadiran -->
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Kelas</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($absences as $index => $absence)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $absence->schedule->day }}, {{ $absence->date }}</td>
                                                    <td>{{ $absence->schedule->study }}</td>
                                                    <td>{{ $absence->schedule->class->class_name }}</td>
                                                    <td>{{ substr($absence->time, 0, 5) }}</td>
                                                    <td>{{ $absence->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Button Refresh -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
