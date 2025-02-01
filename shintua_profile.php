<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile SNK</title>
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
        <h2 class="m-0 text-secondary" style="position: relative; bottom: 50px;">Profile SNK</h2>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="container">
                            <div class="container py-3">
                                <div class="row">
                                    <?php if (isset($_SESSION['message'])) : ?>
                                        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                                            <?php
                                            echo $_SESSION['message'];
                                            unset($_SESSION['message']);
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-lg-4">
                                        <div class="card text-center p-2">
                                            <div class="card-body">
                                                <a class="btn" href="shintua_beranda.php">
                                                    <i class="bi bi-chevron-left"></i>
                                                </a>
                                                <p class="profile-text mt-2">Profile SNK</p>
                                                <img src="uploads/<?php echo htmlspecialchars($profile_pic); ?>" class="img img-thumbnail rounded-circle profile-picture" alt="Profile Picture" style="width: 250px; height: 250px; object-fit: cover; border-radius: 50%;" />
                                                <br>
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
                                                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= htmlspecialchars($r['nama']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nickname">Nama Panggilan</label>
                                                            <input type="text" class="form-control" placeholder="Nama Panggilan" name="nickname" value="<?= htmlspecialchars($r['nickname']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="tmptlahir">Tempat, Tanggal Lahir</label>
                                                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="tmptlahir" value="<?= htmlspecialchars($r['tmptlahir']); ?>" readonly>
                                                            <input style="position: relative; top: 10px;" type="date" name="tnggllahir" class="form-control" value="<?= htmlspecialchars($r['tnggllahir']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" disabled>
                                                                <option value="-" <?= $r['jenis_kelamin'] == '-' ? 'selected' : ''; ?>>-</option>
                                                                <option value="Laki-Laki" <?= $r['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                                                <option value="Perempuan" <?= $r['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nomorsk">Nomor SK</label>
                                                            <input type="text" class="form-control" placeholder="No SK" name="nomorsk" value="<?= htmlspecialchars($r['nomorsk']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= htmlspecialchars($r['alamat']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="lingkungan">Lingkungan</label>
                                                            <input type="text" class="form-control" placeholder="Lingkungan" name="lingkungan" value="<?= htmlspecialchars($r['lingkungan']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="nomortelp">Nomor Telepon</label>
                                                            <input type="text" class="form-control" placeholder="No Telp" name="nomortelp" value="<?= htmlspecialchars($r['nomortelp']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="sektor">Sektor</label>
                                                            <input type="text" class="form-control" placeholder="Sektor" name="sektor" value="<?= htmlspecialchars($r['sektor']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="shintua_profile_edit.php" style="position: relative; left: 630px;" class="btn btn-primary mt-3">Edit Profile</a>
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
            <div class="wrapper">
                <div class="content-wrapper">
                    <div class="main-content">
                        <div class="body-content">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <h2 class="m-0 text-secondary" style="position: relative; bottom: 20px;">List Kepala Keluarga</h2>
                                </div>
                                <div class="col-6 col-md-4">
                                    <a href="shintua_kkjemaat_create.php"><i class="hvr-buzz-out fas fa-plus-circle" style="font-size: 35px; color:#5D5A88; position: relative; left: 380px; bottom: 10px;" title="Tambah"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <label for="search">Search:</label>
                                                    <input type="text" id="searchInput" class="form-control" placeholder="Masukkan kata kunci pencarian..." onkeyup="searchTable()">
                                                </div>
                                                </br>
                                                <table class="table display table-bordered table-striped table-hover basic dataTable no-footer" id="dataTable" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Position: activate to sort column ascending">Nomor Kartu Keluarga</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Start date: activate to sort column ascending">Nama Kepala Keluarga</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 130px;" aria-label="Start date: activate to sort column ascending">Nomor Telepon</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111.867px;" aria-label="Salary: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include 'config.php';

                                                        $sql = "SELECT id, nomorkk, nama, nomortelp FROM kkjemaat_verifikasi";
                                                        $result = $conn->query($sql);
                                                        $no = 1;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr role='row'>";
                                                                echo "<td>" . $no++ . "</td>";
                                                                echo "<td>" . $row["nomorkk"] . "</td>";
                                                                echo "<td>" . $row["nama"] . "</td>";
                                                                echo "<td>" . $row["nomortelp"] . "</td>";
                                                                echo "<td>";
                                                                echo "<a href='shintua_kkjemaat.php?id=" . $row["id"] . "' title='Lihat'><i class='fa fa-eye' style='font-size: 20px; color: #2772ab; margin-right: 10px;'></i></a>";
                                                                echo "<a href='shintua_kkjemaat_delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");' title='Hapus'><i class='fa fa-trash' style='font-size: 20px; color: red;'></i></a>";
                                                                echo "</td>";
                                                                echo "</tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                                                        }

                                                        $conn->close();
                                                        ?>
                                                    </tbody>
                                                </table>
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
    </div>
</section>

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