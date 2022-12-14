<?php

    require "config.php";

    @session_start();

    if( !isset($_SESSION['admin_name']) ) {

        header("Location:index.html");
        exit;
    }


    //ambil data di url
    $id = $_GET["id"];

    // query data pelanggan berdasarkan id
    $jasa = query4 ("SELECT * FROM jasa WHERE id = $id")[0];

    // koneksikan ke database
    $conn = mysqli_connect('localhost','root','','db_sitap');

    // cek terlebih dahulu apakah tombol submitnya sudah ditekan atau belum
    if ( isset($_POST['submit'])) {
        //ambil setiap elemen dari tiap elemen dalam form

        // cek dulu apakah data berhasil dimasukan ke database atau tidak
        // menggunakan code script javascript
        if (rubah3 ($_POST) > 0) {
            echo "
                <script>
                        alert('Data berhasil ditambahkan!')
                        document.location.href = 'dash_admin_jasa.php';
                </script>
            ";
        } else {
            echo " 
                <script>
                        alert('Data gagal ditambahkan!')
                        document.location.href = 'dash_admin_jasa.php';
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

    <title>SITAP - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dash_admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SITAP ONLINE</div>
            </a>

            <!-- Garis Batas -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin.php">
                    <i class="fas fa-fw fa-tachometer-alt text-gray-400"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Garis Batas -->
            <hr class="sidebar-divider my-0">
            

            <!-- Nav Item - Biodata -->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin_bio.php">
                    <i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
                    <span>Biodata</span></a>
            </li>

            <!-- Nav Item - Ubah Password -->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin_cp.php">
                    <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
                    <span>Ubah Password</span></a>
            </li>

            <!-- Nav Item - Data Pelanggan -->
            <li class="nav-item">
                <a class="nav-link" href="dash_Admin_dp.php">
                    <i class="fas fa-clipboard-list fa-fw text-gray-300"></i>
                    <span>Data pelanggan</span></a>
            </li>

            <!-- Nav Item - Data Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin_dt.php">
                    <i class="fas fa-chart-line fa-fw text-gray-300"></i>
                    <span>Data Transaksi</span></a>
            </li>

            <!-- Nav Item - Pelayanan-->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin_jasa.php">
                    <i class="fas fa-fw fa-wrench text-gray-300"></i>
                    <span>Nama Pelayanan</span></a>
            </li>

             <!-- Nav Item - Invoice-->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin_invoice.php">
                    <i class="fas fa-file-alt fa-fw text-gray-300"></i>
                    <span>Invoice</span></a>
            </li>

            <!-- Nav Item - Approval-->
            <li class="nav-item">
                <a class="nav-link" href="dash_admin_approval.php">
                    <i class="fas fa-tags fa-fw text-gray-300"></i>
                    <span>Approval</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin_name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="asset/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="dash_admin_bio.php">
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


                    <!-- DataTales Example -->
                    
                    <div class="card">
                        <h5 class="card-header bg-primary text-white">Ubah Produk </h5>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <input type="hidden" name="id" value="<?= $jasa ["id"]; ?>">
                            </div>
                            <div class="form-group row">
                                <label for="gbr_produk" class="col-sm-2 col-form-label">Gambar Produk</label>
                                <div class="col-sm-10">
                                    <img src="asset/img/<?= $jasa ["gbr_produk"]; ?>" style="width: 15%;">
                                    <input type="file" class="form-control" id="gbr_produk" name="gbr_produk" value="<?= $jasa ["gbr_produk"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_jasa" class="col-sm-2 col-form-label">ID Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_jasa" name="id_jasa" required value="<?= $jasa ["id_jasa"]; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                                <div class="col-sm-10">
                                    <select id="produk" name="produk" class="form-control">
                                        <option value="<?= $jasa ["produk"]; ?>"><?= $jasa ["produk"]; ?></option>
                                        <option value="wifi">Wifi</option>
                                        <option value="cctv">Cctv</option>
                                        <option value="tarik_kbl">Tarik Kabel</option>
                                        <option value="runtext">Runtext</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="harga" name="harga" required value="<?= $jasa ["harga"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                            <div class="d-grid gap-2 ">
                              <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
                            </div>
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
                        <span aria-hidden="true">??</span>
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
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
                $('#dataTable').DataTable();
            } );
    </script>

</body>

</html>