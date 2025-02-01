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
                <h2 class="m-0 text-secondary" style="position: relative; bottom: 20px;">Edit Warta Jemaat 24 Juli 2024</h2>
                <div class="container">
                    <div class="d-flex flex-column p-4 border">
                      <form class="mb-4">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group mb-3">
                              <label for="jenis berita">Pilih Jenis Berita</label>
                              <div class="row">
                                <div class="col-6 col-sm-3">
                                  <input type="radio" id="warta" name="jenis" value="warta" checked>
                                  <label for="warta">Warta Jemaat</label><br>
                                </div>
                                <div class="col-6 col-sm-3">
                                  <input type="radio" id="kegiatna" name="jenis" value="kegiatan">
                                  <label for="kegiatan">Kegiatan</label><br>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group mb-3">
                              <label for="judul">Judul</label>
                              <input
                              style="border-radius: 10px;"
                                type="text"
                                class="form-control"
                                placeholder="Warta Jemaat 24 Juli 2024"
                              />
                            </div>
                          </div>
                          <div class="form-group mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input 
                            style="border-radius: 10px;" class="form-control" type="date" value="2024-07-24" id="example-date-input">
                          </div>
                        </div>
                        <div class="form-group mb-3">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea
                          style="border-radius: 10px;"
                            type="text"
                            class="form-control"
                            placeholder="lorem ipsum"
                            rows="5"
                          ></textarea>
                        </div>
                        <div class="form-group mb-3">
                          <div class="custom-file">
                            <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required="">
                          </div>
                        </div>
                        <button style="position: relative; left: 560px;" class="btn btn-primary align-self-start" type="submit">
                          Simpan
                        </button>
                        </div>
                      </form>
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