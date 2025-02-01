<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Verifikasi Warta Jemaat</title>
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
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role_id'] != 4) {
    header("Location: login.php");
    exit();
}

include 'config.php';
?>

<div>
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
    </br>

    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <h2 class="m-0 text-secondary" style="position: relative;">Verifikasi Pendataan Jemaat</h2>
            <div class="card-body">
                <?php
                session_start();
                if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <div id="dataTable" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="search">Search:</label>
                                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Masukkan kata kunci pencarian..." onkeyup="searchTable()">
                                <table id="dataTable" class="table display table-bordered table-striped table-hover basic dataTable no-footer" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Position: activate to sort column ascending">Jenis Data</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Start date: activate to sort column ascending">Nama Pendata</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 130px;" aria-label="Start date: activate to sort column ascending">Nomor KK</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111.867px;" aria-label="Salary: activate to sort column ascending">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'config.php';

                                        $sql = "SELECT * FROM kkjemaat";
                                        $result = $conn->query($sql);
                                        $no = 1;

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr role='row'>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>Kartu Keluarga Jemaat</td>";
                                                echo "<td>" . $row["nama"] . "</td>";
                                                echo "<td>" . $row["nomorkk"] . "</td>";
                                                echo "<td>";
                                                echo "<a href='formulirkkjemaat_view.php?id=" . $row["id"] . "' title='Lihat'><i class='fa fa-eye' style='font-size: 20px; color: #2772ab; margin-right: 10px;'></i></a>";
                                                echo "<a href='formulirkkjemaat_verifikasi.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin Verifikasi?\");' title='Verifikasi'><i class='hvr-buzz-out fas fa-check' style='font-size: 20px; color: green; margin-right: 10px;'></i></a>";
                                                echo "<a href='formulirkkjemaat_delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");' title='Hapus'><i class='fa fa-trash' style='font-size: 20px; color: red;'></i></a>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        }

                                        $sql = "SELECT * FROM babtisanak";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr role='row'>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>Pembabtisan Anak</td>";
                                                echo "<td>" . $row["nama"] . "</td>";
                                                echo "<td>" . $row["nomorkk"] . "</td>";
                                                echo "<td>";
                                                echo "<a href='formulirpembabtisananak_view.php?id=" . $row["id"] . "' title='Lihat'><i class='fa fa-eye' style='font-size: 20px; color: #2772ab; margin-right: 10px;'></i></a>";
                                                echo "<a href='formulirpembabtisananak_verifikasi.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin Verifikasi?\");' title='Verifikasi'><i class='hvr-buzz-out fas fa-check' style='font-size: 20px; color: green; margin-right: 10px;'></i></a>";
                                                echo "<a href='formulirpembabtisananak_delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");' title='Hapus'><i class='fa fa-trash' style='font-size: 20px; color: red;'></i></a>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        }

                                        $sql = "SELECT * FROM sekolahsidi";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr role='row'>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>Siswa Sekolah SIDI</td>";
                                                echo "<td>" . $row["nama"] . "</td>";
                                                echo "<td>" . $row["nomorkk"] . "</td>";
                                                echo "<td>";
                                                echo "<a href='formulirsiswasidi_view.php?id=" . $row["id"] . "' title='Lihat'><i class='fa fa-eye' style='font-size: 20px; color: #2772ab; margin-right: 10px;'></i></a>";
                                                echo "<a href='formulirsiswasidi_verifikasi.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin Verifikasi?\");' title='Verifikasi'><i class='hvr-buzz-out fas fa-check' style='font-size: 20px; color: green; margin-right: 10px;'></i></a>";
                                                echo "<a href='formulirsiswasidi_delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");' title='Hapus'><i class='fa fa-trash' style='font-size: 20px; color: red;'></i></a>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
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
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "searching": true
        });

        $('#search').on('keyup change', function() {
            table.search($(this).val()).draw();
        });
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