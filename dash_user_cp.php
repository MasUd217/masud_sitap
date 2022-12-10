<?php

@session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SITAP - Ubah Sandi</title>

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
                    <span>Info Tagihan</span></a>
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

                    <!-- tampilan awal selamat datang untuk admin -->
                    <div class="card ">
                      <h5 class="card-header bg-gradient-danger text-white text-center">Silahkan Ubah Password anda (jika tidak ingin mengubah abaikan)</h5>
                      <div class="card-body">
                        <!-- input password lama -->
                        <div class="mb-3 text-dark">
                          <label for="pass_old" class="form-label">Password Lama</label>
                          <input type="password" class="form-control" id="pass_old">
                        </div>
                        <!-- input password baru -->
                        <div class="mb-3 text-dark">
                          <label for="pass_newr" class="form-label">Password Baru</label>
                          <input type="password" class="form-control" id="pass_new">
                        </div>
                        <!-- input konfirmasi password -->
                        <div class="mb-3 text-dark">
                          <label for="conf_pass" class="form-label">Konformasi Password</label>
                          <input type="password" class="form-control" id="conf_pass">
                        </div>
                        <div class="mb-3 mt-4 content-wrapper">
                            <button type="submit" class="btn btn-primary" name="submit">Ubah Profile</button>
                            <button type="reset" class="btn btn-danger" name="submit">Batal</button>
                        </div>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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