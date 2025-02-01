<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Jemaat - Admin</title>
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
    <div class="sidebar close">
        <ul class="nav-links">
          <li>
            <a href="pengurus_verifikasi_warta.html">
                <i class='bx bxs-message-alt-edit'></i>
              <span class="link_name">Verifikasi Warta Jemaat & Kegiatan</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Verifikasi Warta Jemaat & Kegiatan</a></li>
              </ul>
          </li>
        </br>
          <li>
            <div class="iocn-link">
              <a href="pengurus_edit_warta.html">
                <i class='bx bxs-edit'></i>
                <span class="link_name">Edit Warta Jemaat & Kegiatan</span>
              </a>
            </div>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Edit Warta Jemaat & Kegiatan</a></li>
              </ul>
          </li>
        </br>
          <li>
            <div class="iocn-link">
              <a href="pengurus_pendataan_jemaat.html">
                <i class='bx bxs-book-bookmark'></i>
                <span class="link_name">Pendataan Jemaat</span>
              </a>
            </div>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Pendataan Jemaat</a></li>
            </ul>
          </li>
        </br>
            <li>
          <div class="profile-details">
            <div class="profile-content">
            </div>
            <div class="name-job">
              <div class="profile_name">Justin Hubner</div>
              <div class="job">Pengurus</div>
            </div>
            <a href="index.html"><i class="bx bx-log-out"></i></a>
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
            <div class="col-12 col-md-8">
                <h2 class="m-0 text-secondary" style="position: relative; bottom: 20px;">Data Jemaat Lingkungan</h2>
            </div>
            <div class="col-6 col-md-4">
            </div>
                    <label><input style="height: 50px;" type="search" class="form-control form-control-sm" placeholder="Cari berdasarkan nama, no sk atau sektor" aria-controls="DataTables_Table_0"></label>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table display table-bordered table-striped table-hover basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132.133px;" aria-label="Position: activate to sort column ascending">Nama Shintua</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 235.7px;" aria-label="Age: activate to sort column ascending">No SK Shintua</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.133px;" aria-label="Start date: activate to sort column ascending">Sektor</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 125.867px;" aria-label="Salary: activate to sort column ascending">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Justin Hubner</td>
                                                <td>1234567890987654</td>
                                                <td>Medan Amplas</td>
                                                <td>
                                                    <a href="">
                                                        <i class="hvr-buzz-out far fa-eye" title="Lihat" style="color:#37a000;font-size: 20px;margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="">
                                                        <i class="hvr-buzz-out fas fa-pencil-alt" style="font-size: 20px; margin-right: 10px; color:#5D5A88;" title="Edit"></i>
                                                    </a>
                                                    <a href="" onclick="return confirm('Yakin Untuk Verifikasi?')">
                                                        <i class="demo4 hvr-buzz-out fas fa-trash" title="Hapus" style="color:#e60303;font-size: 20px;margin-right: 10px;" id="demo4"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2</td>
                                                <td>Rafael Struick</td>
                                                <td>1234567890987654</td>
                                                <td>Medan Timur</td>
                                                <td>
                                                    <a href="">
                                                        <i class="hvr-buzz-out far fa-eye" title="Lihat" style="color:#37a000;font-size: 20px;margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="">
                                                        <i class="hvr-buzz-out fas fa-pencil-alt" style="font-size: 20px; margin-right: 10px; color:#5D5A88;" title="Edit"></i>
                                                    </a>
                                                    <a href="" onclick="return confirm('Yakin Untuk Verifikasi?')">
                                                        <i class="demo4 hvr-buzz-out fas fa-trash" title="Hapus" style="color:#e60303;font-size: 20px;margin-right: 10px;" id="demo4"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">3</td>
                                                <td>James Maroon</td>
                                                <td>1234567890987654</td>
                                                <td>Medan Kota</td>
                                                <td>
                                                    <a href="">
                                                        <i class="hvr-buzz-out far fa-eye" title="Lihat" style="color:#37a000;font-size: 20px;margin-right: 10px;"></i>
                                                    </a>
                                                    <a href="">
                                                        <i class="hvr-buzz-out fas fa-pencil-alt" style="font-size: 20px; margin-right: 10px; color:#5D5A88;" title="Edit"></i>
                                                    </a>
                                                    <a href="" onclick="return confirm('Yakin Untuk Verifikasi?')">
                                                        <i class="demo4 hvr-buzz-out fas fa-trash" title="Hapus" style="color:#e60303;font-size: 20px;margin-right: 10px;" id="demo4"></i>
                                                    </a>
                                                </td>
                                            </tr>
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