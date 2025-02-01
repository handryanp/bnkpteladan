<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>View Siswa Sekolah SIDI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<?php
include_once "config.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM `sekolahsidi` WHERE `id` = $id";
    $hasil = mysqli_query($conn, $query);

    if ($hasil && mysqli_num_rows($hasil) == 1) {
        $r = mysqli_fetch_assoc($hasil);
    } else {
        echo "Data tidak ditemukan atau terjadi kesalahan dalam query.";
        exit();
    }
} else {
    echo "ID tidak valid!";
    exit();
}
?>

<div>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="shintua_beranda.php" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"></i>Gereja BNKP Teladan</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="shintua_beranda.php" class="nav-item nav-link">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data Jemaat</a>
                    <div class="dropdown-menu m-0">
                        <a href="shintua_verifikasi_pendataan_jemaat.php" class="dropdown-item">Verifikasi Pendataan Jemaat</a>
                        <a href="shintua_data_jemaat.php" class="dropdown-item">Data Jemaat</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">SNK</a>
                    <div class="dropdown-menu m-0">
                        <a href="shintua_profile.php" class="dropdown-item">Profile</a>
                        <a href="shintua_list_lingkungan.php" class="dropdown-item">List Lingkungan</a>
                        <a href="shintua_list_sektor.php" class="dropdown-item">List Sektor</a>
                        <a href="logout.php" class="dropdown-item">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</br>

<div class="container-fluid py-6 px-5">
    <div class="row g-5">
        <h2 class="m-0 text-secondary" style="position: relative;">View Siswa Sekolah SIDI</h2>
        <div class="card-body">
            <form method="post" action="formulirsiswasidi_simpan.php" enctype="multipart/form-data">
            <div class="form-group mb-3">
            <label for="nama">Jenis Data</label>
            <input type="text" class="form-control" placeholder="Siswa Sekolah SIDI" name="jenis" readonly>
          </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= htmlspecialchars($r['nama']); ?>" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="TempatLahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= htmlspecialchars($r['tempat_lahir']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="TanggalLahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= htmlspecialchars($r['tanggal_lahir']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>Pilih Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" readonly>
                                <option value="-" <?= $r['jenis_kelamin'] == '-' ? 'selected' : ''; ?> >-</option>
                                <option value="Laki-Laki" <?= $r['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= $r['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="anakke">Anak Keberapa</label>
                        <input type="number" class="form-control" placeholder="-" name="anakke" value="<?= htmlspecialchars($r['anakke']); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="<?= htmlspecialchars($r['nama_ayah']); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="<?= htmlspecialchars($r['nama_ibu']); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" rows="3" name="alamat" readonly> <?= htmlspecialchars($r['alamat']); ?> </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="lingkungan">Lingkungan</label>
                            <input type="number" name="lingkungan" class="form-control" placeholder="Lingkungan" value="<?= htmlspecialchars($r['lingkungan']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="sektor">Sektor</label>
                            <input type="text" name="sektor" class="form-control" placeholder="-" value="<?= htmlspecialchars($r['sektor']); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomorkk">Nomor KK</label>
                        <input type="number" class="form-control" placeholder="Masukkan No KK" name="nomorkk" value="<?= htmlspecialchars($r['nomorkk']); ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>