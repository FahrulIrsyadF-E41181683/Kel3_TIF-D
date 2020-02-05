<?php
error_reporting(0); //dinyalakan kalo sudah selesai semuanya
session_start();

include "koneksi.php";

if(empty($_SESSION['id_admin'])){
    echo "<script>document.location.href='index.php'</script>\n";
}
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
    <meta http-equiv="refresh" content="600"/> <!-- refresh otomatis setiap 10 min -->

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
<!-- data admin -->
            <?php //ambil data admin di database
                    $sql = mysqli_query($connect, "Select * from admin where ID_ADMIN='".$_SESSION['id_admin']."'");
                    while($data = mysqli_fetch_array($sql)){
                $foto=$data['FOTO_ADMIN'];
            ?>


        <li class="icons">  <!--nama -->
            Admin : @<?php echo $data['NAMA_ADMIN']; ?>
            </li>

        <li class="icons"> <!--foto Admin -->
            <a href="?page=profil">
                    <?php if(empty($foto)){ ?>
                <img class="bulat" src="images/avatar/admin.png"  width='40px' height='40px'>
                    <?php }else{ ?>
                <img class="bulat" src="images/avatar/<?php echo $foto;?>"  width='40px' height='40px'>
                    <?php } ?>
            </a>
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
                    <li><a href="?page=jadwal">Jadwal</a></li>
                    <li><a href="?page=laporan">Laporan</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-pencil menu-icon"></i><span class="nav-text">Edit</span>
                </a>
                <ul aria-expanded="false">

        <?php if($_SESSION['id_admin']=='AD0001'){//hanya SuperAdmin yang bisa mengakses CRUD ADMIN?>  
                    <li><a href="?page=admin">Admin</a></li>
        <?php }?>

                    <li><a href="?page=lapangan">Lapangan</a></li>
                    <li><a href="?page=jam">Jam</a></li>
                    <li><a href="?page=bank">Bank</a></li>    
                    <li><a href="?page=pelanggan">Pelanggan</a></li>
                    <li><a href="?page=profil">Profil</a></li>
                </ul>
            </li>
            <li>
                <a href="logout_admin.php" aria-expanded="false">
                <i class="fa fa-registered"></i><span class="nav-text">Halaman Rush</span>
                </a>
            </li>
            <li>
                <a href="logout.php" aria-expanded="false">
                <i class="fa fa-sign-out"></i><span class="nav-text">Keluar?</span>
                </a>
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
                        require "_atur_jadwal.php";
                        break;
                    case 'laporan':
                        require "_laporan.php";
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
                    case 'profil':
                        include "./_profil.php";
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
            <div class="copyright">
                <p class="text-center">Copyright &copy; Yosef,Rendy,Fahrul,Mila,Widya 2019</p>
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

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
    <link rel="stylesheet" href="=css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.datepicker3.css"/>

        <script src="js/jquery-3.4.1.js"></script>
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

<!-- ajax ubah lapangan -->
<script type="text/javascript">
        $(document).ready(function(){
            $('.lapangan').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '_ubah_lapangan_form.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.lap-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
<!-- ajax ubah lapangan -->


<!-- ajax ubah jam -->
<script type="text/javascript">
        $(document).ready(function(){
            $('.jam').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '_ubah_jam_form.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.jam-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
<!-- ajax ubah jam -->


<!-- ajax ubah Bank -->
<script type="text/javascript">
        $(document).ready(function(){
            $('.bank').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '_ubah_bank_form.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.bank-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
<!-- ajax ubah Bank -->

<!-- ajax ubah Pelanggan -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.pelanggan').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '_ubah_pelanggan_form.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.pel-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
<!-- ajax ubah Pelanggan -->

<!-- ajax ubah Admin -->
<script type="text/javascript">
        $(document).ready(function(){
            $('.admin').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '_ubah_admin_form.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.admin-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
<!-- ajax ubah Admin -->

<!-- ajax ubah Pesanan -->
<script type="text/javascript">
        $(document).ready(function(){
            $('.pesan').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '_konfirm.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.pesan-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
<!-- ajax ubah Pesanan -->

<script type="text/javascript">
	$(document).ready(function(){
		$('.klik_menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "lap1"){

			}else if(menu == "lap2"){
				$('.badan').load('_atur_jadwal_lap1.php');						
			}else if(menu == "lap3"){
				$('.badan').load('tutorial.php');						
			}else if(menu == "lap4"){
				$('.badan').load('sosmed.php');						
			}
		});					

	});
</script>

<!-- timer -->
<script>
        var mn=<?= $menit3 ?>;
            document.getElementById('timer').innerHTML =
            mn + ":" + 0;
            startTimer();
            function startTimer() {
                var presentTime = document.getElementById('timer').innerHTML;
                var timeArray = presentTime.split(/[:]+/);
                var m = timeArray[0];
                var s = checkSecond((timeArray[1] - 1)); //detik

                    if(s==59){
                        m=m-1
                        }
                    if(m<0){
                        alert('timer completed')
                        clearstartTimer();
                        }

                    document.getElementById('timer').innerHTML =
                        m + ":" + s;
                    setTimeout(startTimer, 1000);
            }
            function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
            if (sec < 0) {sec = "59"};
            return sec;
            }
</script>
<!-- timer -->

</html>