<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Tambah Anggota Keluarga</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="img/favicon.ico" rel="icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

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
    <h2 class="text-center mb-4 mt-3">Tambah Anggota Keluarga</h2>
    <div class="container">
      <div class="d-flex flex-column p-4 border mb-5">
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
        <form method="post" action="shintua_kkanggota_simpan.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="Jeniskelamin">Jenis kelamin</label>
                <select class="form-select" id="jenis_kelamin" aria-label="Floating label select example" name="jenis_kelamin">
                  <option>-</option>
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="tempatlahir">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tmptlahir" />
              </div>
            </div>

            <h5 class="text-start mb-3 mt-3">Tanggal dan Tahun</h5>
            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="lahir">Lahir</label>
                <input type="date" class="form-control" placeholder="" name="tnggllahir" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="baptis">Baptis</label>
                <input type="date" class="form-control" placeholder="" name="baptis" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="sidi">SIDI</label>
                <input type="date" class="form-control" placeholder="" name="sidi" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="nikah">Nikah</label>
                <input type="date" class="form-control" placeholder="" name="nikah" />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="hubungan">Hubungan Keluarga</label>
                <select class="form-select" id="hub_keluarga" aria-label="Floating label select example" name="hub_keluarga">
                  <option>-</option>
                  <option>Suami</option>
                  <option>Istri</option>
                  <option>Anak</option>
                  <option>Bapak</option>
                  <option>Ibu</option>
                  <option>Saudara Kandung</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="status">Status Perkawinan</label>
                <select class="form-select" id="status_nikah" aria-label="Floating label select example" name="status_nikah">
                  <option>-</option>
                  <option>Sudah Menikah</option>
                  <option>Belum Menikah</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="pend">Pendidikan</label>
                <input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="pekerjaan">Pekerjaan</label>
                <select class="form-select" id="pekerjaan" aria-label="Floating label select example" name="pekerjaan">
                  <option>-</option>
                  <option>PNS</option>
                  <option>POLRI/TNI</option>
                  <option>Wiraswasta</option>
                  <option>Lainnya</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="pend">Keterangan</label>
                <input type="text" class="form-control" placeholder="-" name="keterangan" />
              </div>
            </div>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-primary" type="button" onclick="window.history.back();">Batal</button>
          </div>
        </form>
      </div>
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