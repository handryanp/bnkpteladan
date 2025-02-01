<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gereja BNKP Teladan Medan</title>
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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<?php
include 'config.php';

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$warta_sql = "SELECT warta_id, judul, tanggal, deskripsi FROM berita_verifikasi WHERE jenis='Warta' ORDER BY tanggal DESC LIMIT 3";
$warta_result = $conn->query($warta_sql);

$kegiatan_sql = "SELECT warta_id, judul, tanggal, deskripsi FROM berita_verifikasi WHERE jenis='Kegiatan' ORDER BY tanggal DESC LIMIT 3";
$kegiatan_result = $conn->query($kegiatan_sql);
?>

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
                <a href="#" class="nav-item nav-link">Beranda</a>
                <a href="#wartajemaat" class="nav-item nav-link">Warta Jemaat</a>
                <a href="#kegiatan" class="nav-item nav-link">Kegiatan</a>
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

    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4">Gereja BNKP</h1>
                            <h1 class="display-1 text-white mb-md-4">Teladan Medan</h1>
                            <h5 class="text-white text-uppercase">Website Resmi Gereja BNKP Teladan Medan.</h5></br>
                            <a href="#kegiatan" class="btn btn-primary py-md-3 px-md-5 me-3 rounded-pill">Kegiatan</a>
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5 rounded-pill">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wartajemaat" class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 mb-0">Warta Jemaat</h1>
                <small>Warta Jemaat Gereja BNKP Teladan Medan</small>
                <hr class="w-25 mx-auto bg-primary">
            </div>
            <div class="row g-5">
                <?php
                if ($warta_result->num_rows > 0) {
                    while ($row = $warta_result->fetch_assoc()) {
                        echo '
                <div class="col-lg-4">
                    <div class="team-item position-relative overflow-hidden">
                        <img class="img-fluid" src="img/wartajemaat.png" alt="">
                        <div class="team-text w-100 position-absolute top-50 text-center bg-primary p-4">
                            <h3 class="text-white">' . $row["judul"] . '</h3>
                            <p class="text-white text-uppercase mb-0">' . date("j F Y", strtotime($row["tanggal"])) . '</p></br>
                            <a href="user_rincian_warta.php?warta_id=' . $row["warta_id"] . '" class="btn btn-primary btn-block">Read More</a>
                        </div>
                    </div>
                </div>';
                    }
                } else {
                    echo '<p>Tidak Ada Warta Terbaru</p>';
                }
                ?>
            </div>
            <div>
                <a href="user_warta.php" class="btn btn-primary btn-block align-items-center" style="display: inline-block; width: 1420px; height: 40px; position: relative; top: 30px;">Read More</a>
            </div>
        </div>
        <div id="kegiatan" class="container-fluid px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 mb-0">Kegiatan</h1></br>
                <small>Kegiatan - Kegiatan Gereja BNKP Teladan Medan</small>
                <hr class="w-25 mx-auto bg-primary">
            </div>
            <div class="row g-5">
                <?php
                if ($kegiatan_result->num_rows > 0) {
                    while ($row = $kegiatan_result->fetch_assoc()) {
                        echo '
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-secondary text-center px-5">
                        <img src="" alt="" style="height: 50; width: 50;">
                        <div class="d-flex align-items-center justify-content-center">
                        </div>
                        <h3 class="mb-3">' . $row["judul"] . '</h3>
                        <p class="mb-0">' . $row["deskripsi"] . '</p>
                        <a href="user_rincian_kegiatan.php?warta_id=' . $row["warta_id"] . '" class="mb-2 btn">Read More <i class="hvr-buzz-out fas fa-angle-right"></i></a>
                    </div>
                </div>';
                    }
                } else {
                    echo '<p>Tidak Ada Kegiatan Terbaru</p>';
                }
                $conn->close();
                ?>
            </div>
            <div>
                <a href="user_kegiatan.php" class="btn btn-primary btn-block align-items-center" style="display: inline-block; width: 1420px; height: 40px; position: relative; top: 30px;">Read More</a>
            </div>
        </div>
        <br>
        <footer id="contact" class="bg-dark text-white pt-5 pb-4" style="position: relative; top: 30px;">
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
