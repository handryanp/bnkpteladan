<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Buat Berita</title>
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

  if (isset($_SESSION['message']) && $_SESSION['msg_type'] == "success") {
    // header("Location: notifikasi_sukses.php");
    // exit();
  }

  ?>

  <div class="wrapper">
    <div class="sidebar sidebar-bunker">
      <ul class="nav-links">
        <?php foreach ($menus as $menu) : ?>
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
        <i class='bx bx-menu'></i>
        <span class="text">Gereja BNKP Teladan Medan</span>
      </div>
      <div class="container">
        <div class="d-flex flex-column p-4 border">
          <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
              <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
              unset($_SESSION['msg_type']);
              ?>
            </div>
          <?php endif; ?>
          <form method="post" action="warta_simpan.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="jenis berita">Pilih Jenis Berita</label>
                  <div class="row">
                    <div class="col-6 col-sm-3">
                      <label><input type="radio" value="Warta" name="jenis" id="checkwarta" onclick="onlyOneas(this);wartajemaat()" />Warta Jemaat</label>
                    </div>
                    <div class="col-6 col-sm-3">
                      <label><input type="radio" value="Kegiatan" name="jenis" id="checkkegiatan" onclick="onlyOneas(this);kegiatan()" />Kegiatan</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="judul">Judul</label>
                  <input style="border-radius: 10px;" type="text" class="form-control" placeholder="-" name="judul" required>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="tanggal">Tanggal</label>
                <input style="border-radius: 10px;" class="form-control" type="date" value="2011-08-19" id="example-date-input" name="tanggal">
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="deskripsi">Deskripsi</label>
              <textarea style="border-radius: 10px;" type="text" class="form-control" placeholder="Masukkan Deskripsi" rows="5" name="deskripsi" required></textarea>
            </div>
            <div class="form-group mb-3">
              <div class="custom-file">
                <input type="file" name="gambar" id="file-2" class="form-upload" data-multiple-caption="{count} files selected" accept=".jpg, .jpeg, .png, .gif, .pjpeg, .x-png" required>
              </div>
              <small class="form-text text-muted">Hanya file dengan ekstensi gambar (jpg, jpeg, png, gif, pjpeg, x-png) yang diizinkan.</small>
            </div>

            <button style="position: relative; left: 560px;" class="btn btn-primary align-self-start" type="submit">
              Buat Berita
            </button>
        </div>
        </form>
      </div>
  </div>
  </section>

  <script>
    function onlyOneas(checkbox) {
      var checkboxes = document.getElementsByName('checkas')
      checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
      })
    }
  </script>
  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", () => {
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