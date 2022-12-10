<?php

    @session_start();

    if( !isset($_SESSION['user_name']) ) {

        header("Location:index.html");
        exit;
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
    <!-- Link template bootsrape-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- link javascript-->
    <script type="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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

                    <!-- content pencarian data -->
                    <div class="container py-1 p-1 mt-5 mb-3">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-mt-4">
                            <div class="card bg-dark text-light text-center">
                              <h5 class="card-header bg-warning text-white">Masukan Kode Tagihan Anda!</h5>
                           

                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <form action="" method="POST">
                                          <div class="input-group mb-12">
                                            
                                            <input type="text" name="search" required autocomplete="off"  value="<?php if(isset($_POST['Search'])) {echo $_POST['Search'];} ?>" class="form-control" placeholder="mencari data...">
                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-primary">Mencari</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                         
                        </div>

                       <div class="container  py-2" style="background-color: #20b2aa;">
                         <div class="container">
                           <div class="row">
                             <div class="col-12">
                               <h5 class="text-center text-light">Informasi Pembayaran <?php echo $_SESSION['user_name']?></h5>
                             </div>
                           </div>
                         </div>
                       </div>
                       <?php
                          $conn = mysqli_connect('localhost','root','','db_sitap');

                              if(isset($_POST['search'])) {
                                  $search = $_POST['search'];
                                  $query = "SELECT * FROM kwitansi WHERE id_pelanggan ='$search'";
                                  $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0) {
                                      foreach($query_run as $items) {
                        ?>

                       <div class="container py-3" style="background-color: #FFFFFF;">
                        <div class="col-md-12">
                            <div class="col-mt-4">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead class="bg-gradient-primary text-white text-center">
                                            <th>ID Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $items['id_pelanggan'] ?></td>
                                                <td><?php echo $items['nama'] ?></td>
                                                <td><?php echo $items['status'] ?></td>
                                                <td class="text-center">

                                                    <!-- Button trigger modal Lihat Informasi-->
                                                    <button type="button" class="btn bg-gradient-info" data-toggle="modal" data-target="#exampleModal">
                                                      <i class="fas fa-eye text-light"></i>
                                                    </button>

                                                    <!-- button print invoice-->
                                                    <a href="dash_user_it_print.php?id=<?= $items["id"];  ?>" class="btn btn-primary">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         
                            <?php
                                }
                              } 
                              else 
                              {
 
                                ?>
                                    <br>
                                    <tr>
                                        <td colspan="4"><center>Kode Pelanggan Tidak Ditemukan!</center></td>
                                    </tr>

                            <?php
                                }
                              }
                            ?>
                        </div>
                    </div>
                    <!-- akhir dari content pencarian data -->
                </div>
            </div>
            <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->
            <br>
            <br>
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

    <!-- Modal lihat informasi pelanggan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-gradient-info text-white">
            <h3 class="modal-title fs-2" id="exampleModalLabel">Informasi Tagihan Anda</h3>
            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive text-dark">
                <tr>
                    <td>KODE PELANGGAN</td>
                    <td>:</td>
                    <td><?php echo $items['id_pelanggan'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>NAMA LENGKAP</td>
                    <td>:</td>
                    <td><?php echo $items['nama'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>ALAMAT RUMAH</td>
                    <td>:</td>
                    <td><?php echo $items['alamat'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>NOMOR TELEPON</td>
                    <td>:</td>
                    <td><?php echo $items['no_tlp'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>TANGGAL BAYAR</td>
                    <td>:</td>
                    <td><?php echo $items['tgl_byr'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>METODE BAYAR</td>
                    <td>:</td>
                    <td><?php echo $items['mode_byr'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>JUMLAH BIAYA</td>
                    <td>:</td>
                    <td><?php echo $items['jml_biaya'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>JENIS LAYANAN</td>
                    <td>:</td>
                    <td><?php echo $items['pembayaran'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>JASA / PRODUK</td>
                    <td>:</td>
                    <td><?php echo $items['produk'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>DIBAYAR DGN</td>
                    <td>:</td>
                    <td><?php echo $items['harga'] ?></td>
                </tr>
                <br>
                <tr>
                    <td>STATUS TAGIHAN</td>
                    <td>:</td>
                    <td><?php echo $items['status'] ?></td>
                </tr>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

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