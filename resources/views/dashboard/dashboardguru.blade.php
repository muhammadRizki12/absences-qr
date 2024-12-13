<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Halo Guru - SMK Negeri 1 Soreang
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light p-3 d-none d-md-block">
                <!-- Tampilkan hanya di perangkat desktop (d-none d-md-block) -->
                <h5 class="text-primary">HOME</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                </ul>

                <h5 class="text-primary mt-3">MENU</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/dataguru">Data Kehadiran</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-12">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4>Identitas Guru</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Foto Guru -->
                                    <div class="text-center mb-4">
                                        <img id="profile-image" src="https://via.placeholder.com/150"
                                            class="rounded-circle" alt="Foto Guru" style="width: 150px; height: 150px;">
                                    </div>

                                    <!-- Input untuk upload foto -->
                                    <div class="mb-3 text-center">
                                        <label for="file-upload" class="btn btn-primary">
                                            <i class="fas fa-upload"></i> Upload Foto
                                        </label>
                                        <input type="file" id="file-upload" accept="image/*" style="display: none;"
                                            onchange="previewImage(event)">
                                    </div>

                                    <!-- Data Guru -->
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Nama Lengkap
                                            <span class="badge bg-primary rounded-pill">Udin</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            NIP
                                            <span class="badge bg-secondary rounded-pill">1234567890</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Pendidikan
                                            <span class="badge bg-success rounded-pill">S1 Pendidikan</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Jabatan
                                            <span class="badge bg-warning rounded-pill">Guru Matematika</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Telepon
                                            <span class="badge bg-info rounded-pill">081234567890</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Email
                                            <span class="badge bg-danger rounded-pill">udin@example.com</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button Refresh -->
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-4 text-center">
                            <button class="btn btn-primary w-100">
                                <i class="fas fa-sync"></i> Refresh Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan gambar yang dipilih oleh pengguna
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                // Mengubah src gambar dengan file yang dipilih
                document.getElementById('profile-image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
