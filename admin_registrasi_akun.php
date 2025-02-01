<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registrasi Akun</title>
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
        <div class="body-content">
            <div class="row">
                <div class="col-md-12 col-lg-3" style="position: relative; left: 10px;">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">User Management</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="admin_registrasi_simpan.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="font-weight-600">User Name</label>
                                    <input type="hidden" name="id" value="">
                                    <input type="text" class="form-control" id="user_nm" name="user_nm" placeholder="" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="font-weight-600">Password</label>
                                    <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="font-weight-600">Email</label>
                                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="font-weight-600">Role Akses</label>
                                    <select name="role" class="form-control" style="background-color: white;">
                                        <?php
                                        $sql_role = "SELECT * FROM tblrole";
                                        $result_role = $conn->query($sql_role);
                                        if ($result_role->num_rows > 0) {
                                            while ($row_role = $result_role->fetch_assoc()) {
                                                echo "<option value='" . $row_role['role_id'] . "'>" . $row_role['role_nama'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button style="position: relative; top: 7px;" type="submit" name="btnSimpan" class="btn btn-primary align-self-start">Buat Akun</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Daftar Pengguna</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table display table-bordered table-striped table-hover basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th width="20px" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 10px;">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 80px;">Username</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Password: activate to sort column ascending" style="width: 100px;">Password</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 50px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 120px;">Role</th>
                                                    <th width="80px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 80px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';

                                                $sql = "SELECT tbluser.user_id, tbluser.user_nm, tbluser.user_pass, tbluser.user_email, tblrole.role_nama
                                        FROM tbluser
                                        JOIN tblrole ON tbluser.role_id = tblrole.role_id";
                                                $result = $conn->query($sql);
                                                $no = 1;

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr role='row'>";
                                                        echo "<td>" . $no++ . "</td>";
                                                        echo "<td>" . $row["user_nm"] . "</td>";
                                                        echo "<td>" . $row["user_pass"] . "</td>";
                                                        echo "<td>" . $row["user_email"] . "</td>";
                                                        echo "<td>" . $row["role_nama"] . "</td>";
                                                        echo "<td>";
                                                        echo "<a href='admin_registrasi_edit.php?id=" . $row["user_id"] . "' title='Ganti Password' class='btn btn-xs btn-primary'><i class='fas fa-pencil-alt'></i></a>";
                                                        echo "<a href='admin_registrasi_delete.php?id=" . $row["user_id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus Akun ini?\");' title='Hapus' class='btn btn-xs btn-danger' style='position:relative; left: 10px;'><i class='fa fa-trash'></i></a>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "Tidak Ada Akun!";
                                                }
                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                        if (isset($_SESSION['message'])) : ?>
                                            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                                                <?php
                                                echo $_SESSION['message'];
                                                unset($_SESSION['message']);
                                                ?>
                                            </div>
                                        <?php endif; ?>
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
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
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