<?php

    @session_start();

    if( !isset($_SESSION['user_name']) ) {

        header("Location:index.html");
        exit;
    }

    require 'config.php';

     //ambil data di url
    //$id = $_GET["id"];

    // query data pelanggan berdasarkan id
    //$adm = query1 ("SELECT * FROM tb_users WHERE id = $id")[0];


    // koneksikan ke database
    $conn = mysqli_connect("localhost", "root", "", "db_sitap");

    // cek terlebih dahulu apakah tombol submitnya sudah ditekan atau belum
    if ( isset($_POST['submit'])) {
        //ambil setiap elemen dari tiap elemen dalam form
        

        

        // cek dulu apakah data berhasil dimasukan ke database atau tidak
        // menggunakan code script javascript
        if (ganti($_POST) > 0) {
            echo "
                <script>
                        alert('Data berhasil diubah! silahkan login kembali')
                        document.location.href = 'dash_user_bio.php';
                </script>
            ";
        } else {
            echo "<script>
                        alert('Data Gagal diubah!')
                        document.location.href = 'dash_user_bio.php';
                </script>
            ";
        }



    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SITAP - User</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dash_user.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SITAP ONLINE</div>
            </a>

            <!-- Garis Batas -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dash_user.php">
                    <i class="fas fa-fw fa-tachometer-alt text-gray-400"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Garis Batas -->
            <hr class="sidebar-divider my-0">
            

            <!-- Nav Item - Biodata -->
            <li class="nav-item">
                <a class="nav-link" href="dash_user_bio.php">
                    <i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
                    <span>Biodata</span></a>
            </li>

            <!-- Nav Item - Ubah Password -->
            <li class="nav-item">
                <a class="nav-link" href="dash_user_cp.php">
                    <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
                    <span>Ubah Password</span></a>
            </li>

            <!-- Nav Item - Data Pelanggan -->
            <li class="nav-item">
                <a class="nav-link" href="dash_user_it.php">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Info Tagihan </span></a>
            </li>

            <!-- Nav Item - memesan layanan -->
            <li class="nav-item">
                <a class="nav-link" href="dash_user_pl.php">
                    <i class="fas fa-cart-plus fa-fw text-gray-300"></i>
                    <span>Pesan Layanan </span></a>
            </li>

            <!-- Nav Item - riwayat pemesanan -->
            <li class="nav-item">
                <a class="nav-link" href="dash_user_it.php">
                    <i class="far fa-bell fa-fw text-gray-300"></i>
                    <span>Riwayat Pemesanan </span></a>
            </li>


            <!-- Garis Batas -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- garis pembatas vertical -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="asset/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="dash_user_bio.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                   <!-- Card Biodata pelanggan -->
                    <div class="card">
                      <div class="card-header bg-gradient-info text-white text-center">
                        Biodata Pengguna
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3 text-dark">
                              <!--<label for="id" class="form-label">id</label> -->
                              <input type="hidden" class="form-control" id="id" name="id" value="<?= $_SESSION["user_id"]; ?>">
                            </div>
                            <!-- output nama pengguna -->
                            <div class="mb-3 text-dark">
                              <label for="nama" class="form-label">Nama Lengkap</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION["user_name"]; ?>">
                            </div>
                            <!-- output tanggal pengguna -->
                            <div class="mb-3 text-dark">
                              <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                              <input type="date" class="form-control" id="tgl_lahir" id="nama" name="tgl_lahir" value="<?= $_SESSION["user_date"]; ?>" disabled>
                            </div>
                            <!-- output tempat lahir pengguna -->
                            <div class="mb-3 text-dark">
                              <label for="tempat_lhr" class="form-label">Tempat Lahir</label>
                              <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr" value="<?= $_SESSION["user_birth"]; ?>" disabled>
                            </div>
                            <!-- output Jenis Kelamin -->
                            <div class="mb-3 text-dark">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jk" disabled>
                                 <option value="<?= $_SESSION["user_gender"]; ?>"><?= $_SESSION["user_gender"]; ?></option>
                                 <option value="<?= $_SESSION["user_gender"]; ?>"><?= $_SESSION["user_gender"]; ?></option>
                                </select>
                            </div>
                            <!-- output no telepon pengguna -->
                            <div class="mb-3 text-dark">
                              <label for="no_telp" class="form-label">Nomor Telepon/WA</label>
                              <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $_SESSION["user_phone"]; ?>">
                            </div>
                            <!-- output alamat pengguna -->
                            <div class="mb-3 text-dark">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $_SESSION["user_address"]; ?>">
                            </div>
                            <!-- tombol aksi -->
                            <div class="mb-3 mt-2">
                                <button type="submit" name="submit" class="btn btn-warning">Ubah Data</button>
                                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </form>
                      </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih tombol "Logout" di bawah jika  anda ingin meninggalkan halaman ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>