<?php
error_reporting(0);
session_start();

include "koneksi.php";
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
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
<!-- Preloader end -->
<!-- Main wrapper start -->
<div id="main-wrapper">
<!-- Nav header start -->        
<div class="nav-header">
    <div class="brand-logo">
        <a href="home.php">
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
<div class="header">
    <div class="header-content clearfix">
    <!-- Menu Collapse -->
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
    <div class="header-left">
        <div class="input-group icons">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
            </div>
            <input type="search" class="form-control" placeholder="Search" aria-label="Search Dashboard">
            <div class="drop-down animated flipInX d-md-none">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Search">
                </form>
            </div>
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
                        <span class="">New Messages</span>
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
            <li class="icons dropdown">
                <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                    <span class="activity active"></span>
                    <img src="images/user/1.png" height="40" width="40" alt="">
                </div>
                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                    <div class="dropdown-content-body">
                        <ul>
                            <li>
                                <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                            </li>
                            <li>
                                <a href="javascript:void()">
                                    <a href="#"><i class="icon-envelope-open"></i> <span>Inbox</span></a>
                                    <!-- <div class="badge gradient-3 badge-pill gradient-1">3</div> -->
                                </a>
                            </li>
                            <hr class="my-2">
                            <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
<!-- Header end ti-comment-alt -->
<!-- Sidebar start -->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">MASTER</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Halaman Utama</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="home.php">Home</a></li>
                </ul>
            </li>
            <li class="nav-label">Edit</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-pencil menu-icon"></i><span class="nav-text">Edit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="?page=admin">Admin</a></li>
                    <li><a href="?page=pelanggan">Pelanggan</a></li>
                    <li><a href="?page=bank">Bank</a></li>                  
                    <li><a href="?page=lapangan">Lapangan</a></li>                  
                    <!-- <li><a href="?page=jadwal">Jadwal</a></li>  -->
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-clock menu-icon"></i><span class="nav-text">Jadwal</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="?page=lapangan1">Lapangan 1</a></li>
                    <li><a href="?page=lapangan2">Lapangan 2</a></li>
                    <li><a href="?page=lapangan3">Lapangan 3</a></li>
                    <li><a href="?page=lapangan4">Lapangan 4</a></li>
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
			case 'admin':
				include "./_admin.php";
                break;
            case 'bank':
                include "./_bank.php";
                break;
            case 'jadwal':
                include "./_jadwal.php";
                break;
            case 'lapangan1':
                include "./_lapangan1.php";
                break;
            case 'lapangan2':
                include "./_lapangan2.php";
                break;
            case 'lapangan3':
                include "./_lapangan3.php";
                break;
            case 'lapangan4':
                include "./_lapangan4.php";
                break;
            case 'pelanggan':
                include "./_pelanggan.php";
                break;
			case 'contact':
				include "contact.php";
				break;	
            case 'logout':
                include "logout.php";
                break;
			default:
				include "./_admin.php";
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
        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; 2019</p>
            </div>
        </div> -->
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
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="./js/plugins-init/chartjs-init.js"></script>
    
    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script>

    <script src="./js/dashboard/dashboard-1.js"></script>

 

</body>

</html>

<?php ?>