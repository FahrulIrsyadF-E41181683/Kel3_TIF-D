<?php
error_reporting(0);
session_start();

include "koneksi.php";
// Grafik
// $harga    = mysqli_query($connect, "select SUM(HARGA_DEAL) AS total from transaksi");
// $jmlt     = mysqli_query($connect, "select COUNT(NMR_TRNS) AS jmlt from transaksi");
// $jmlp     = mysqli_query($connect, "select COUNT(ID_CUST) AS jmlp from customer");
// $row      = mysqli_fetch_array($harga);
// $row2     = mysqli_fetch_array($jmlt);
// $row3     = mysqli_fetch_array($jmlp);
// $sum      = $row['total'];
// $jmltr    = $row2['jmlt'];
// $jmlcs    = $row3['jmlp'];
// $now = date_create('now')->format('Y-m-d');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rush Master</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>
<!-- Preloader start -->
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
<!-- Preloader end -->


<!-- Main wrapper start -->
<div id="main-wrapper">
<!-- Nav header start -->        
<div class="nav-header">
    <div class="brand-logo">
        <a href="home.php?page=home">
            <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
            <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
            <span class="brand-title">
                <img src="images/logo-text.png" alt="">
            </span>
        </a>
    </div>
</div>
<!-- Nav header end -->
<!-- Header start -->        
<div class="header ">
    <div class="header-content clearfix">
    <!-- Menu Collapse -->
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
    <div class="header-left">
        <div class="input-group icons">
        </div>
    </div>

    <div class="header-right">
        <ul class="clearfix">
            <li class="icons dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown">
                    <i class="mdi mdi-email-outline"></i>
                    <span class="badge badge-pill gradient-1">3</span>
                </a>
                <div class="drop-down animated fadeIn dropdown-menu">
                    <div class="dropdown-content-heading d-flex justify-content-between">
                        <span class="">Pesan Baru</span>
                        <a href="javascript:void()" class="d-inline-block">
                            <span class="badge badge-pill gradient-1">3</span>
                        </a>
                    </div>
                    <div class="dropdown-content-body">
                        <ul>
                            <li class="notification-unread">
                                <a href="javascript:void()">
                                    <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                    <div class="notification-content">
                                        <div class="notification-heading">Pelanggan 1</div>
                                        <div class="notification-timestamp">8 jam yang lalu</div>
                                        <div class="notification-text">Gimana cara ordernya ya?</div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-unread">
                                <a href="javascript:void()">
                                    <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                    <div class="notification-content">
                                        <div class="notification-heading">Pelanggan 2</div>
                                        <div class="notification-timestamp">8 jam yang lalu</div>
                                        <div class="notification-text">Lapangan 1 kosong ga?</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()">
                                    <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                    <div class="notification-content">
                                        <div class="notification-heading">Pelanggan 3</div>
                                        <div class="notification-timestamp">8 jam yang lalu</div>
                                        <div class="notification-text">Mau pesan lapangan kak..</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()">
                                    <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                    <div class="notification-content">
                                        <div class="notification-heading">Pelanggan 4</div>
                                        <div class="notification-timestamp">8 jam yang lalu</div>
                                        <div class="notification-text">Bisa transfer?</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            
<!-- data admin -->
            <li class="icons dropdown">
            <?php
              $sql = mysqli_query($connect, "Select * from admin where ID_ADMIN='".$_SESSION['id_admin']."'");
              while($data = mysqli_fetch_array($sql)){
                $foto=$data['FOTO_ADMIN'];
              ?>
        <a class="nav-link" id="navbarDropdown " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(  empty($foto)){ ?>
                            <img src="../master/images/avatar/1.jpg"  width='40px' height='30px'>
                                <?php }else{ ?>
                            <img src="../master/images/avatar/<?php echo $foto;?>"  width='40px' height='30px'>
                                <?php } ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item dropdown-menu-center mt-3 md-3"> 
                          <?php if(  empty($foto)){ ?>
                            <img src="../master/images/avatar/1.jpg"  width='100px' height='90px'>
                                <?php }else{ ?>
                            <img src="../master/images/avatar/<?php echo $foto;?>"  width='100px' height='90px'>
                                <?php } ?></a>

          <a class="dropdown-item dropdown-menu-center"> Nama: <?php echo $data['NAMA_ADMIN']; ?> </a>
          <a class="dropdown-item dropdown-menu-center"> Jenis Kelamin: <?php echo $data['JENIS_KELAMIN']; ?> </a>
          <a class="dropdown-item dropdown-menu-center"> Alamat: <?php echo $data['ALAMAT_ADMIN']; ?></a>
          <a href="logout.php" class="dropdown-item dropdown-menu-center masuk2"> Keluar?</a>
        </div>
        <?php } ?>
            </li>
<!-- data admin -->

        </ul>
    </div>
</div>
</div>
<!-- Header end ti-comment-alt -->
<!-- Sidebar start -->
    <div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="?page=home">Home</a></li>
                    <li><a href="?page=pesanan">Pesanan</a></li>
                    <li><a href="_atur_jadwal.php">Jadwal</a></li>
                    <li><a href="?page=jadwal">Jadwal2</a></li>
                    <li><a href="report/report.php">Laporan</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-pencil menu-icon"></i><span class="nav-text">Edit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="?page=admin">Admin</a></li>
                    <li><a href="?page=lapangan">Lapangan</a></li>
                    <li><a href="?page=jam">Jam</a></li>
                    <li><a href="?page=bank">Bank</a></li>    
                    <li><a href="?page=pelanggan">Pelanggan</a></li> 
                    <!-- <li><a href="?page=jadwal">Jadwal</a></li>  -->
                </ul>
            </li>
        </ul>
    </div>

</div>                
<!-- Sidebar end -->    
<!-- Content body start -->
        <div class="content-body">
        
            <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];

                switch ($page) {
                    case 'home':
                        include "_home.php";
                        break;
                    case 'pesanan':
                        include "./_pesanan.php";
                        break;
                    case 'jadwal':
                        require "atur_jadwal2.php";
                        break;
                    
                        

                    case 'admin':
                        include "./_admin.php";
                        break;
                    case 'lapangan':
                        include "./_lapangan.php";
                        break;
                    case 'jam':
                        include "./_jam.php";
                        break;
                    case 'bank':
                        include "./_bank.php";
                        break;
                    case 'pelanggan':
                        include "./_pelanggan.php";
                        break;


                    default:
                        include "./_home.php";
                        break;
                }}
            ?>
                    <!-- #/ container -->
                </div>
<!--**********************************
    Content body end
***********************************-->



<!--**********************************
    Footer start
***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; 2019</p>
            </div>
        </div>
<!--**********************************
Footer end
***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    
    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script>

    <script src="./js/dashboard/dashboard-1.js"></script>


</body>

<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
    <link rel="stylesheet" href="=css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.datepicker3.css"/>

        <script src="js/jquery-3.4.1.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#date').datepicker({
                    format: "dd/mm/yyyy",
        useCurrent: true,
        todayBtn: "linked",
        locale:'id',
        orientation: "bottom auto",
        enableOnReadonly: true,
                });
            });
        </script>
<!-- datepicker -->


</html>