<?php

    require "config.php";

    @session_start();

    if( !isset($_SESSION['admin_name']) ) {

        header("Location:index.html");
        exit;
    }

    $bayar = query3("SELECT * FROM transaksi");
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
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <h3 class="m-0 font-weight-bold text-primary text-center">Data Transaksi</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>TGL Langganan</th>
                                            <th>TGL Bayar</th>
                                            <th>JNS Pembayaran</th>
                                            <th>TTL Bayar</th>
                                            <th>Keterangan</th>
                                            <th>Status Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $bayar as $row )  : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["id_transaksi"];  ?></td>
                                            <td><?= $row["tgl_langganan"];  ?></td>
                                            <td><?= $row["tgl_byr"];  ?></td>
                                            <td><?= $row["mode_byr"];  ?></td>
                                            <td><?= $row["jml_biaya"];  ?></td>
                                            <td><?= $row["pembayaran"];  ?></td>
                                            <td><?= $row["status"];  ?></td>
                                            <td>
                                                
                                                <a href="dash_admin_dt_tbh.php?id=<?= $row["id"];  ?>" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <a href="dash_admin_dt_ubh.php?id=<?= $row["id"];  ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-cogs"></i>
                                                </a>
                                                <a href="dash_admin_dt_hps.php?id=<?= $row["id"];  ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
                $('#dataTable').DataTable();
            } );
    </script>

</body>

</html>