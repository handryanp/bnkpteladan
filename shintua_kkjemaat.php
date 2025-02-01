<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Kartu Keluarga Jemaat</title>
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

  <?php
  include_once "config.php";

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM `kkjemaat_verifikasi` WHERE `id` = $id";
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
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">SHINTUA</a>
          <div class="dropdown-menu m-0">
            <a href="shintua_profile.php" class="dropdown-item">Profile</a>
            <a href="shintua_list_lingkungan.php" class="dropdown-item">List Lingkungan</a>
            <a href="shintua_kkjemaat.php" class="dropdown-item">KK Jemaat</a>
            <a href="logout.php" class="dropdown-item">Keluar</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="text-center mb-4 mt-3">Kartu Keluarga Jemaat</h2>
    <div class="container">
      <div class="d-flex flex-column p-4 border mb-5">
        <form class="mb-4">
          <h4 class="fs-17 font-weight-600 mb-0">KETERANGAN KEPALA KELUARGA</h4>
          <br>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="nama">Nama Kepala Keluarga</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" value="<?= htmlspecialchars($r['nama']); ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="Namapanggilan">Nama Panggilan</label>
                <input type="text" class="form-control" placeholder="Nama Panggilan" value="<?= htmlspecialchars($r['nama_panggilan']); ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="Nomorkk">Nomor kk</label>
                <input type="number" class="form-control" placeholder="-" value="<?= htmlspecialchars($r['nomorkk']); ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" value="<?= htmlspecialchars($r['alamat']); ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="Nomortelp">Nomor Telepon</label>
                <input type="number" class="form-control" placeholder="-" value="<?= htmlspecialchars($r['nomortelp']); ?>" readonly>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-12 col-lg-12">
      <div class="mb-4">
        <a href="shintua_kkanggota_create.php"><i class="hvr-buzz-out fas fa-plus-circle" style="font-size: 35px; color:#5D5A88;" title="Tambah"></i></a>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="fs-17 font-weight-600 mb-0">KETERANGAN ANGGOTA KELUARGA</h5>
          <br>
          <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table display table-bordered table-striped table-hover basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.5px;" aria-label="Position: activate to sort column ascending">Nama Lengkap</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.133px;" aria-label="Start date: activate to sort column ascending">Jenis Kelamin</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.133px;" aria-label="Start date: activate to sort column ascending">Tanggal Lahir</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.133px;" aria-label="Start date: activate to sort column ascending">Hubungan Keluarga</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.133px;" aria-label="Start date: activate to sort column ascending">Status Perkawinan</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.133px;" aria-label="Start date: activate to sort column ascending">Keterangan</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111.867px;" aria-label="Salary: activate to sort column ascending">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include 'config.php';

                      $sql = "SELECT * FROM `bnkpteladan`.`tblanggota`";
                      $result = $conn->query($sql);
                      $no = 1;

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr role='row'>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td>" . $row["nama"] . "</td>";
                          echo "<td>" . $row["jenis_kelamin"] . "</td>";
                          echo "<td>" . $row["tnggllahir"] . "</td>";
                          echo "<td>" . $row["hub_keluarga"] . "</td>";
                          echo "<td>" . $row["status_nikah"] . "</td>";
                          echo "<td>" . $row["keterangan"] . "</td>";
                          echo "<td>";
                          echo "<a href='shintua_kkanggota_view.php?id=" . $row["id"] . "' title='Lihat'><i class='far fa-eye' style='font-size: 20px; color: green; margin-right: 10px;'></i></a>";
                          echo "<a href='shintua_kkanggota_edit.php?id=" . $row["id"] . "' title='Edit'><i class='fas fa-pencil-alt' style='font-size: 20px; color: #2772ab; margin-right: 10px;'></i></a>";
                          echo "<a href='shintua_kkanggota_delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin Hapus Data?\");' title='Hapus'><i class='fas fa-trash' style='font-size: 20px; color: red;'></i></a>";
                          echo "</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='8'>Belum ada data keluarga nih!</td></tr>";
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>