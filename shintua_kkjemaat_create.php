<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Formulir Kartu Keluarga Jemaat</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role_id'] != 4) {
  header("Location: login.php");
  exit();
}

include 'config.php';
?>

<body>
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

  <div class="container">
    <div class="d-flex flex-column p-4 border">
      <h2 class="text-center mb-3 mt-3">Formulir Kartu Keluarga Jemaat</h2>
      <?php
      session_start();
      if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
          <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          ?>
        </div>
      <?php endif; ?>
      <form method="post" action="formulirkkjemaat_simpan.php" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group mb-3">
            <label for="nama">Jenis Data</label>
            <input type="text" class="form-control" placeholder="Kartu Keluarga Jemaat" name="jenis" readonly>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="Namapanggilan">Nama Panggilan</label>
              <input type="text" class="form-control" placeholder="Nama Panggilan" name="nama_panggilan">
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <textarea type="text" class="form-control" placeholder="Alamat" rows="3" name="alamat"></textarea>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="nomorkk">Nomor KK</label>
          <input type="text" class="form-control" placeholder="Nomor KK" name="nomorkk">
        </div>
        <div class="form-group mb-3">
          <label for="nomortelp">Nomor Telepon</label>
          <input type="text" class="form-control" placeholder="Nomor Telepon" name="nomortelp">
        </div>
        <button style="width: 200px;" class="btn btn-primary align-self-start" type="submit">
          Simpan Data
        </button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>