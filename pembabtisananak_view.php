<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verifikasi Pendataan Jemaat</title>
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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   </head>
<body>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';
$role_id = $_SESSION['role_id'];

$query = "SELECT tblmenu.menu_nama, tblmenu.menu_id, tblmenu.menu_link, tblmenu.menu_icon
          FROM tblmenu
          INNER JOIN tblroleizin ON tblmenu.menu_id = tblroleizin.menu_id
          WHERE tblroleizin.role_id = $role_id";
$result = mysqli_query($conn, $query);

$menus = array();
while ($row = mysqli_fetch_assoc($result)) {
    $menus[] = $row;
}

$role_names = [
    1 => 'super admin',
    2 => 'admin',
    3 => 'bpmj',
    4 => 'snk'
];

$role_name = isset($role_names[$role_id]) ? $role_names[$role_id] : 'Unknown';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM `babtisanak` WHERE `id` = $id";
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

<div class="sidebar sidebar-bunker">
        <ul class="nav-links">
            <?php foreach ($menus as $menu): ?>
              <li>
                    <a href="<?php echo $menu['menu_link']; ?>">
                        <i class='bx bxs-<?php echo strtolower(str_replace(' ', '-', $menu['menu_icon'])); ?>'></i>
                        <span class="link_name"><?php echo $menu['menu_nama']; ?></span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="<?php echo $menu['menu_link']; ?>"><?php echo $menu['menu_nama']; ?></a></li>
                    </ul>
                </li>
                </br>
            <?php endforeach; ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content"></div>
                    <div class="name-job">
                        <div class="profile_name"><?php echo $_SESSION['username']; ?></div>
                        <div class="profile_role"><?php echo $_SESSION['role_name']; ?></div>
                    </div>
                    <a href="logout.php"><i class="bx bx-log-out"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section style="position: relative; bottom: 140px; background-color: white;" class="home-section">
      <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Gereja BNKP Teladan Medan</span>
      </div>
      <div class="container-fluid py-6 px-5">
    <div class="row g-5">
        <h2 class="m-0 text-secondary" style="position: relative;">View Pembabtisan Anak</h2>
        <div class="card-body">
            <form method="post" action="formulirpembabtisananak_simpan.php" enctype="multipart/form-data">
            <div class="form-group mb-3">
            <label for="nama">Jenis Data</label>
            <input type="text" class="form-control" placeholder="Pembabtisan Anak" name="jenis" readonly>
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
                <div class="mb-4 w-50">
                    <h6 class="text-start">Syarat & Ketentuan :</h6>
                    <ul class="list-group-numbered mb-2">
                        <li class="list-group-item mb-2">Mengisi Formulir Baptis dengan lengkap dan benar.</li>
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
                                    <span>Rp ............</span>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div style="display: flex; justify-content: space-between">
                                    <span>Foto Tambahan (12.000/Lembar)</span>
                                    <span>Rp ............</span>
                                </div>
                            </li>
                        </ol>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
    
    <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
     arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="js/main.js"></script>
  </body>
  </html>