<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Warta Jemaat</title>
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
include 'config.php';

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$warta_sql = "SELECT * FROM `berita_verifikasi` WHERE jenis='Warta' ORDER BY tanggal DESC";
$warta_result = $conn->query($warta_sql);
?>

<div>
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
    </br>

    <div class="text-center">
        <h1 class="display-5 mb-0 text-secondary" style="position: relative;">Warta Jemaat</h1></br>
    </div>

    <div class="container align-items-center">
        <div>
            <div class="row g-5">
                <?php
                if ($warta_result->num_rows > 0) {
                    while ($row = $warta_result->fetch_assoc()) {
                        $tanggal = new DateTime($row["tanggal"]);
                        $gambar_file = $row["gambar"];
                        $gambar_path = 'uploads/' . $gambar_file;

                        $ext = pathinfo($gambar_file, PATHINFO_EXTENSION);
                        $valid_image_extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'pjpeg', 'pdf');

                        if (file_exists($gambar_path)) {
                            $image_src = $gambar_path;
                        } else {
                            $image_src = 'img/wartajemaat.png';
                        }

                        echo '
                    <div class="col-xl-6 col-lg-12 col-md-6">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="' . $gambar_file . '" alt="">
                            </div>
                            <div class="bg-secondary d-flex">
                                <div class="flex-shrink-0 d-flex flex-column justify-content-center text-center bg-primary text-white px-4">
                                    <span>' . $tanggal->format('d') . '</span>
                                    <h5 style="color: white;" class="text m-0">' . $tanggal->format('M') . '</h5>
                                    <span>' . $tanggal->format('Y') . '</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center py-3 px-4">
                                    <a class="h4" href="user_rincian_warta.php?warta_id=' . $row["warta_id"] . '">' . $row["judul"] . '</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo '<p>No data available</p>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    </br>
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