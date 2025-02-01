<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Profile SNK</title>
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
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User tidak terautentikasi.");
}

$user_id = $_SESSION['user_id'];

$query_user = "SELECT snk_id FROM tbluser WHERE user_id = " . intval($user_id);
$result_user = mysqli_query($conn, $query_user);

if (!$result_user) {
    die("Error dalam query user: " . mysqli_error($conn));
}

if ($result_user && mysqli_num_rows($result_user) == 1) {
    $row_user = mysqli_fetch_assoc($result_user);
    $snk_id = $row_user['snk_id'];

    $query_snk = "SELECT * FROM tblsnk WHERE id = " . intval($snk_id);
    $result_snk = mysqli_query($conn, $query_snk);

    if (!$result_snk) {
        die("Error dalam query SNK: " . mysqli_error($conn));
    }

    if ($result_snk && mysqli_num_rows($result_snk) == 1) {
        $r = mysqli_fetch_assoc($result_snk);
        $name = $r['nama'];
        $nomorsk = $r['nomorsk'];
        $profile_pic = $r['profile_pic'];
    } else {
        echo "Data SNK tidak ditemukan.";
        exit();
    }
} else {
    echo "Pengguna tidak ditemukan.";
    exit();
}
?>


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

<section class="bg-light">
    <div class="container">
        <h2 class="m-0 text-secondary" style="position: relative; bottom: 50px;">Edit Profile SNK</h2>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="container">
                            <div class="container py-3">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card text-center p-2">
                                            <div class="card-body">
                                                <a class="btn" onclick="window.history.back();">
                                                    <i class="bi bi-chevron-left"></i>
                                                </a>
                                                <p class="profile-text mt-2">Profile SNK</p>
                                                <img src="uploads/<?php echo htmlspecialchars($profile_pic); ?>" class="img img-thumbnail rounded-circle profile-picture" alt="Profile Picture" style="width: 250px; height: 250px; object-fit: cover; border-radius: 50%;" />
                                                <p style="position: relative; top: 15px;"><?php echo htmlspecialchars($nomorsk); ?></p>
                                                <h3><?php echo htmlspecialchars($name); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8" style="position: relative;">
                                        <div class="border rounded p-2">
                                            <form method="post" action="shintua_profile_simpan.php" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nama">Nama Lengkap</label>
                                                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= htmlspecialchars($r['nama']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nickname">Nama Panggilan</label>
                                                            <input type="text" class="form-control" placeholder="Nama Panggilan" name="nickname" value="<?= htmlspecialchars($r['nickname']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="tmptlahir">Tempat, Tanggal Lahir</label>
                                                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="tmptlahir" value="<?= htmlspecialchars($r['tmptlahir']); ?>">
                                                            <input style="position: relative; top: 10px;" type="date" name="tnggllahir" class="form-control" value="<?= htmlspecialchars($r['tnggllahir']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                                                <option value="-" <?= $r['jenis_kelamin'] == '-' ? 'selected' : ''; ?>>-</option>
                                                                <option value="Laki-Laki" <?= $r['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                                                <option value="Perempuan" <?= $r['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nomorsk">Nomor SK</label>
                                                            <input type="text" class="form-control" placeholder="No SK" name="nomorsk" value="<?= htmlspecialchars($r['nomorsk']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= htmlspecialchars($r['alamat']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="lingkungan">Lingkungan</label>
                                                            <input type="text" class="form-control" placeholder="Lingkungan" name="lingkungan" value="<?= htmlspecialchars($r['lingkungan']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nomortelp">Nomor Telepon</label>
                                                            <input type="text" class="form-control" placeholder="No Telp" name="nomortelp" value="<?= htmlspecialchars($r['nomortelp']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="sektor">Sektor</label>
                                                            <input type="text" class="form-control" placeholder="Sektor" name="sektor" value="<?= htmlspecialchars($r['sektor']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="text-align: right;">
                                                    <label style="position: relative; right: 595px; top: 30px;" for="profile_pic">Upload Foto Profile</label>
                                                    <input style="width: 250px; position: relative; top: 38px;" type="file" class="form-control" name="profile_pic" accept=".jpg, .jpeg, .png, .gif, .pjpeg, .x-png">
                                                    <button style="width: 140px;" class="btn btn-primary" type="submit">
                                                        Simpan Profile
                                                    </button>
                                                    <button style="width: 140px;" class="btn btn-primary" type="button" onclick="window.history.back();">
                                                        Batal
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
</script>

<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script src="js/main.js"></script>
</body>

</html>