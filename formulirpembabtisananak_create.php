<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Formulir Pembabtisan Anak</title>
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

<body>
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="user_beranda.php" class="navbar-brand p-0">
      <h1 class="m-0 text-primary"></i>Gereja BNKP Teladan</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0 me-n3">
        <a href="user_beranda.php" class="nav-item nav-link">Beranda</a>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pengisian Formulir</a>
          <div class="dropdown-menu m-0">
            <a href="formulirkkjemaat_create.php" class="dropdown-item">Formulir Kartu Keluarga Jemaat</a>
            <a href="formulirpembabtisananak_create.php" class="dropdown-item">Formulir Pembabtisan Anak</a>
            <a href="formulirsiswasidi_create.php" class="dropdown-item">Formulir Siswa Sekolah SIDI</a>
          </div>
        </div>
        <a href="login.php" class="nav-item nav-link">Masuk</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="d-flex flex-column p-4 border">
      <h2 class="text-center mb-3 mt-3">Formulir Pembaptisan Anak</h2>
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
      <form method="post" action="formulirpembabtisananak_simpan.php" enctype="multipart/form-data">
        <div class="form-group mb-3">
          <label for="nama">Jenis Data</label>
          <input type="text" class="form-control" placeholder="Pembabtisan Anak" name="jenis" readonly>
        </div>
        <div class="form-group mb-3">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" maxlength="35" required>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="TempatLahir"> Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" maxlength="20" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="TanggalLahir"> Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo date('y-m-d'); ?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label>Pilih Jenis Kelamin</label>
              <select class="form-select" id="jenis_kelamin" aria-label="Floating label select example" name="jenis_kelamin">
                <option>-</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="anakke">Anak Keberapa</label>
            <input type="number" class="form-control" placeholder="-" name="anakke" maxlength="3" required>
          </div>
          <div class="form-group mb-3">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" maxlength="35" required>
          </div>
          <div class="form-group mb-3">
            <label for="nama">Nama Ibu</label>
            <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" maxlength="35" required>
          </div>
          <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <textarea type="text" class="form-control" placeholder="Alamat" rows="3" name="alamat" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="lingkungan">Lingkungan</label>
              <input type="number" class="form-control" placeholder="Lingkungan" name="lingkungan" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="sektor">Sektor</label>
              <input type="text" class="form-control" placeholder="Sektor" name="sektor" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="nomorkk">Nomor KK</label>
            <input type="number" class="form-control" placeholder="Masukkan No KK" name="nomorkk" required>
          </div>
        </div>
        <div class="mb-4 w-50">
          <h6 class="text-start">Syarat & Ketentuan :</h6>
          <ul class="list-group-numbered mb-2">
            <li class="list-group-item mb-2">
              Mengisi Formulir Baptis dengan lengkap dan benar.
            </li>
            <li class="list-group-item mb-2">Persembahan.</li>
            <ol type="a">
              <li class="mb-2">
                <div style="display: flex; justify-content: space-between">
                  <span>Iuran Tahun</span>
                  <span>Rp50.000</span>
                </div>
              </li>
              <li class="mb-2">
                <div style="display: flex; justify-content: space-between">
                  <span>Pers. Baptisan Anak</span>
                  <span>Rp25.000</span>
                </div>
              </li>
              <li class="mb-2">
                <div style="display: flex; justify-content: space-between">
                  <span>Blanko Baptis</span>
                  <span>Rp50.000</span>
                </div>
              </li>
              <li class="mb-2">
                <div style="display: flex; justify-content: space-between">
                  <span>Foto Wajib 2 Lembar</span>
                  <span>Rp30.000</span>
                </div>
              </li>
              <li class="mb-2">
                <div style="display: flex; justify-content: space-between">
                  <span>US</span>
                  <input style="width: 100px;" type="number" class="form-control" placeholder="Rp." name="uang_sumbangan" required>
                </div>
              </li>
              <li class="mb-2">
                <div style="display: flex; justify-content: space-between">
                  <span>Foto Tambahan (12.000/Lembar)</span>
                  <input style="width: 100px;" type="number" class="form-control" placeholder="Rp." name="foto_tambahan" required>
                </div>
              </li>
            </ol>
          </ul>
        </div>
        <button style="width: 200px;" class="btn btn-primary align-self-start" type="submit">
          Kirim Data
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