<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SNK Create</title>
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

    $query = "SELECT * FROM `bnkpteladan`.`tblsnk` WHERE `id` = $id";
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

<div class="sidebar sidebar-bunker active">
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
            <br>
        <?php endforeach; ?>
        <li>
            <div class="profile-details">
                <div class="profile-content"></div>
                <div class="name-job">
                    <div class="profile_name"><?php echo $_SESSION['username']; ?></div>
                    <div class="profile_role"><?php echo $role_name; ?></div>
                </div>
                <a href="logout.php"><i class="bx bx-log-out"></i></a>
            </div>
        </li>
    </ul>
</div>
<section style="position: relative; bottom: 140px; background-color: white;" class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Gereja BNKP Teladan Medan</span>
    </div>
    <div class="container">
        <div class="d-flex flex-column p-4 border">
            <h2 class="text-center mb-3 mt-3">View SNK Profile</h2>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?>">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>
            <form method="post" action="admin_shintua_simpan.php" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= htmlspecialchars($r['nama']); ?>" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama Panggilan</label>
                    <input type="text" class="form-control" placeholder="Nama Panggilan" name="nickname" value="<?= htmlspecialchars($r['nickname']); ?>" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="TempatLahir">Tempat Lahir</label>
                            <input type="text" name="tmptlahir" class="form-control" placeholder="Tempat Lahir" value="<?= htmlspecialchars($r['tmptlahir']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="TanggalLahir">Tanggal Lahir</label>
                            <input type="date" name="tnggllahir" class="form-control" placeholder="Tanggal Lahir" value="<?= htmlspecialchars($r['tnggllahir']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>Pilih Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" disabled>
                                <option value="-" <?= $r['jenis_kelamin'] == '-' ? 'selected' : ''; ?>>-</option>
                                <option value="Laki-Laki" <?= $r['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= $r['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomorsk">Nomor SK</label>
                        <input type="number" class="form-control" placeholder="Nomor SK" name="nomorsk" value="<?= htmlspecialchars($r['nomorsk']); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" placeholder="Alamat" rows="3" name="alamat" readonly><?= htmlspecialchars($r['alamat']); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="lingkungan">Lingkungan</label>
                            <input type="number" class="form-control" placeholder="Lingkungan" name="lingkungan" value="<?= htmlspecialchars($r['lingkungan']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="sektor">Sektor</label>
                            <input type="text" class="form-control" placeholder="Sektor" name="sektor" value="<?= htmlspecialchars($r['sektor']); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomortelp">Nomor Telepon</label>
                        <input type="number" class="form-control" placeholder="Masukkan No Telepon" name="nomortelp" value="<?= htmlspecialchars($r['nomortelp']); ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
    let arrowParent = e.target.parentElement.parentElement;
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
