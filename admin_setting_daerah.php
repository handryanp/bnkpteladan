<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Setting Daerah</title>
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
            <i class='bx bx-menu'></i>
            <span class="text">Gereja BNKP Teladan Medan</span>
        </div>
        <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <h2 class="m-0 text-secondary" style="position: relative;">Sektor</h2>
            <?php
            if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?>">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>
            <a href="admin_setting_daerah_create.php"><i class="hvr-buzz-out fas fa-plus-circle" style="font-size: 35px; color:#5D5A88; position: relative;" title="Tambah Sektor"></i></a>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                          <table class="table display table-bordered table-striped table-hover basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132.133px;" aria-label="Position: activate to sort column ascending">Nama Sektor</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132.133px;" aria-label="Position: activate to sort column ascending">Jumlah Lingkungan</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.867px;" aria-label="Salary: activate to sort column ascending">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'config.php';

                                $sql = "SELECT t.id, t.sektor, COUNT(l.id) AS jumlah_lingkungan
                                        FROM trsektor t
                                        LEFT JOIN trsektor_trlingkungan st ON t.id = st.trsektor_id
                                        LEFT JOIN trlingkungan l ON st.trlingkungan_id = l.id
                                        GROUP BY t.id, t.sektor";
                                $result = $conn->query($sql);
                                $no = 1;

                                if ($result->num_rows > 0) {
                                    echo "<tbody>";
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr role='row'>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . htmlspecialchars($row["sektor"]) . "</td>";
                                        echo "<td>" . $row["jumlah_lingkungan"] . "</td>";
                                        echo "<td>";
                                        echo "<a href='admin_setting_daerah_view.php?id=" . $row["id"] . "' title='Lihat'><i class='far fa-eye' style='font-size: 20px; color: green; margin-right: 10px;'></i></a>";
                                        echo "<a href='admin_setting_daerah_delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin Hapus Sektor ini?\");' title='Hapus'><i class='fas fa-trash' style='font-size: 20px; color: red;'></i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                } else {
                                    echo "<tr><td colspan='4'>Tidak ada data sektor nih!</td></tr>";
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
