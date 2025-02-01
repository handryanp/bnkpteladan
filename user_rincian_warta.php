<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Rincian Warta Jemaat</title>
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
      <h1 class="m-0 text-primary">Gereja BNKP Teladan</h1>
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

  <?php
  include 'config.php';

  if (isset($_GET['warta_id'])) {
    $warta_id = intval($_GET['warta_id']);

    $warta_sql = "SELECT judul, deskripsi, tanggal, gambar FROM berita_verifikasi WHERE warta_id = ? AND jenis = 'Warta'";
    $stmt = $conn->prepare($warta_sql);
    $stmt->bind_param("i", $warta_id);
    $stmt->execute();
    $warta_result = $stmt->get_result();

    if ($warta_result->num_rows > 0) {
      $row = $warta_result->fetch_assoc();
      $tanggal = new DateTime($row["tanggal"]);
      $gambar_file = $row["gambar"];
      $gambar_path = 'uploads/' . $gambar_file;

      if (file_exists($gambar_path)) {
        $image_src = $gambar_path;
      } else {
        $image_src = 'img/wartajemaat.png';
      }

      echo '
        <div class="container">
            <h2>' . htmlspecialchars($row["judul"]) . '</h2>
            <p><strong>Tanggal:</strong> ' . $tanggal->format('d M Y') . '</p>
            <img class="img-fluid" src="' . $gambar_file . '" alt="' . htmlspecialchars($row["judul"]) . '">
            <div class="mt-4">
                <p>' . nl2br(htmlspecialchars($row["deskripsi"])) . '</p>
            </div>
        </div>';
    } else {
      echo '<p>Data tidak ditemukan.</p>';
    }

    $stmt->close();
  } else {
    echo '<p>Warta ID tidak ditemukan.</p>';
  }

  $conn->close();
  ?>

  <footer id="contact" class="bg-dark text-white pt-5 pb-4">
    <div class="container text-center text-md left">
      <div class="row text-center text-md-left">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h3 class="text-white mb-3">Gereja BNKP Teladan Medan</h3>
          <p class="m-0"><a>Jl. Asrama II No. 03 Teladan Medan</a></p>
          <br>
          <p class="m-0"><a>Copyright</a> &copy; 2024 <a>Andhika, Ryan & Zaldy</a></p>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <div class="text-center">
            <img src="img/Gereja.jpg" class="rounded mx-auto d-block" style="width: 18rem" alt="...">
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h3 class="text-white mb-5">Hubungi Kami</h3>
          <p>
            <a style="color: white;" href="tel:0617366035" target="_blank">
              <i style="color: white;" class="bi bi-telephone-fill"></i> (061) 7366035
            </a>
          </p>
          <p>
            <a style="color: white;" href="https://m.facebook.com/jemaatbnkp.telmdn" target="_blank">
              <i style="color: white;" class="bi bi-facebook"></i> Jemaat Bnkp Tldn Mdn
            </a>
          </p>
          <p>
            <a style="color: white;" href="mailto:bnkpteladan@gmail.com" target="_blank">
              <i class="bi bi-chat-right-text-fill"></i> bnkpteladan@gmail.com
            </a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>