<?php
    session_start();
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Rush Badminton</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Favicons -->
<link href="img/favicon.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>

<!-- Bootstrap CSS File -->
<link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/animate/animate.css" rel="stylesheet">




<!-- Main Stylesheet File -->
<link href="css/style.css" rel="stylesheet">


<!-- JQuery -->
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
<script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
<script src="lib/jquery/jquery-3.4.1.js"></script>

<!-- Datepicker -->
<link href="css/datepicker.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    
<script>
$(document).ready(function(){
$("#date").datepicker({
        format: "dd/mm/yyyy",
        startDate: "today"
        todayBtn: "linked",
        locale:'id',
        orientation: "bottom auto",
        enableOnReadonly: true,
    })
});
</script>

</head>

<body>


<!-- #header -->
<!-- input tanggal dan lapangan -->
</header>
<div class="modal-body bg-krem">
        <form  method="post" enctype="multipart/form-data"> 
            <div class="row">
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Tanggal</label> -->
                <input type="text" class="form-control date" name='date' id='date' placeholder ="Pilih Tanggal" value="<?=isset($_POST['date']) ? $_POST['date'] : ''?>">
            </div>
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Lapangan</label> -->
                <select name="lap" id="lap" class="form-control input-defaut" onchange="changeValue(this.value)">

            <?php
            $result = mysqli_query($connect, "SELECT NAMA_LAPANGAN FROM lapangan");   
            while ($options = mysqli_fetch_assoc($result)) {
                    foreach ($options as $area) {
                    $selected = @$_POST['lap'] == $area ? ' selected="selected"' : '';
                    echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
                }}?>
                
                </select>
            </div>
            </div>
    </div>

<!--tombol cari --> 
    <div class="modal-footer ">
            <button name="tampilkan" id="tampilkan" class="btn btn-info">Tampilkan</button>
    </div>

<!-- jika tombol cari ditekan -->
    <?php
    if (isset($_POST['tampilkan'])){
    $tgl = $_POST['date'];
    $lap = $_POST['lap']; 

    if($lap=='Lapangan1'){
    ?>
<!-- tabel jam lapangan1 -->
<div class="jam-content modal-body">

    <br>
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lapangan</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
            <tbody>
            <tr>
                <th>1</th>
                <td>Lapangan 1</td>
                <td>08:00</td>           
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0001' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia1" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong1" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>Lapangan 1</td>
                <td>09:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0002' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia2" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong2" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>                                                
            <tr>
                <th>3</th>
                <td>Lapangan 1</td>
                <td>10:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0003' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->           
                <td>
                <button name="sedia3" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong3" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>4</th>
                <td>Lapangan 1</td>
                <td>11:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0004' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia4" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong4" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>5</th>
                <td>Lapangan 1</td>
                <td>12:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0005' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia5" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong5" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>6</th>
                <td>Lapangan 1</td>
                <td>13:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0006' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia6" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong6" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>7</th>
                <td>Lapangan 1</td>
                <td>14:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0007' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia7" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong7" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>8</th>
                <td>Lapangan 1</td>
                <td>15:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0008' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia8" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong8" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>9</th>
                <td>Lapangan 1</td>
                <td>16:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0009' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia9" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong9" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>10</th>
                <td>Lapangan 1</td>
                <td>17:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0010' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia10" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong10" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>11</th>
                <td>Lapangan 1</td>
                <td>18:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0011' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia11" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong11" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>12</th>
                <td>Lapangan 1</td>
                <td>19:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0012' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia12" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong12" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>13</th>
                <td>Lapangan 1</td>
                <td>20:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0013' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia13" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong13" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>14</th>
                <td>Lapangan 1</td>
                <td>21:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0014' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia14" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong14" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>
            <tr>
                <th>15</th>
                <td>Lapangan 1</td>
                <td>22:00</td>
                <!-- Code Status start -->
                <?php
                $st= 0;
                $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                A.ID_DETAIL_JADWAL='DJ0015' && B.TANGGAL_PESANAN= '$tgl'");
                while($data = mysqli_fetch_assoc($sql1)){
                    $st= $data['STATUS'];
                } ?>           
                    <?php 
                        if($st==1){?>
                            <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                        <?php } else {?>
                            <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                    <?php }
                    ?>
                <!-- Code Status End -->
                <td>
                <button name="sedia15" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button name="kosong15" class="btn btn-danger sweet-confirm">
                    <i class="fa fa-close color-muted m-r-5"></i>
                </button>
                </td>
            </tr>                                      
        </tbody>
    </table> 
    </div>
<!-- tabel jam lapangan1 -->


    <?php } else if($lap=='Lapangan2'){?>

<!-- tabel jam Lapangan2 -->
                <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lapangan</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>Lapangan 2</td>
                    <td>08:00</td>           
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0016' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia16" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong16" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Lapangan 2</td>
                    <td>09:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0017' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia17" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong17" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>                                                
                <tr>
                    <th>3</th>
                    <td>Lapangan 2</td>
                    <td>10:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0018' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->           
                    <td>
                    <button name="sedia18" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong18" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>4</th>
                    <td>Lapangan 2</td>
                    <td>11:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0019' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia19" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong19" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>5</th>
                    <td>Lapangan 2</td>
                    <td>12:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0020' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia20" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong20" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>6</th>
                    <td>Lapangan 2</td>
                    <td>13:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0021' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia21" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong21" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>7</th>
                    <td>Lapangan 2</td>
                    <td>14:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0022' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia22" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong22" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>8</th>
                    <td>Lapangan 2</td>
                    <td>15:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0023' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia23" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong23" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>9</th>
                    <td>Lapangan 2</td>
                    <td>16:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0024' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia24" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong24" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>10</th>
                    <td>Lapangan 2</td>
                    <td>17:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0025' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia25" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong25" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>11</th>
                    <td>Lapangan 2</td>
                    <td>18:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0026' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia26" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong26" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>12</th>
                    <td>Lapangan 2</td>
                    <td>19:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0027' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia27" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong27" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>13</th>
                    <td>Lapangan 2</td>
                    <td>20:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0028' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia28" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong28" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>14</th>
                    <td>Lapangan 2</td>
                    <td>21:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0029' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia29" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong29" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>15</th>
                    <td>Lapangan 2</td>
                    <td>22:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0030' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia30" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong30" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>                                       
            </tbody>
        </table>                            
                <div class="modal-footer">
                    <!-- <input type="reset" class="btn btn-danger" value="Reset" style="color:white;"> -->
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
        </div>
<!-- tabel jam Lapangan2 -->

    <?php } else if($lap=='Lapangan3'){?>

<!-- tabel jam Lapangan 3 -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lapangan</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>Lapangan 3</td>
                    <td>08:00</td>           
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0031' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia31" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong31" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Lapangan 3</td>
                    <td>09:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0032' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia32" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong32" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>                                                
                <tr>
                    <th>3</th>
                    <td>Lapangan 3</td>
                    <td>10:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0033' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->           
                    <td>
                    <button name="sedia33" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong33" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>4</th>
                    <td>Lapangan 3</td>
                    <td>11:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0034' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia34" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong34" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>5</th>
                    <td>Lapangan 3</td>
                    <td>12:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0035' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia35" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong35" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>6</th>
                    <td>Lapangan 3</td>
                    <td>13:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0036' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia36" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong36" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>7</th>
                    <td>Lapangan 3</td>
                    <td>14:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0037' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia37" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong37" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>8</th>
                    <td>Lapangan 3</td>
                    <td>15:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0038' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia38" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong38" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>9</th>
                    <td>Lapangan 3</td>
                    <td>16:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0039' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia39" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong39" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>10</th>
                    <td>Lapangan 3</td>
                    <td>17:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0040' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia40" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong40" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>11</th>
                    <td>Lapangan 3</td>
                    <td>18:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0041' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia41" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong41" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>12</th>
                    <td>Lapangan 3</td>
                    <td>19:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0042' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia42" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong42" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>13</th>
                    <td>Lapangan 3</td>
                    <td>20:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0043' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia43" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong43" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>14</th>
                    <td>Lapangan 3</td>
                    <td>21:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0044' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia44" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong44" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>15</th>
                    <td>Lapangan 3</td>
                    <td>22:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0045' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia45" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong45" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>                                       
            </tbody>
        </table>                            
                <div class="modal-footer">
                    <!-- <input type="reset" class="btn btn-danger" value="Reset" style="color:white;"> -->
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
<!-- tabel jam Lapangan3 -->

    <?php } else if($lap=='Lapangan4'){?>

<!-- tabel jam Lapangan 4 -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lapangan</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>Lapangan 4</td>
                    <td>08:00</td>           
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0046' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia46" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong46" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Lapangan 4</td>
                    <td>09:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0047' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia47" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong47" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>                                                
                <tr>
                    <th>3</th>
                    <td>Lapangan 4</td>
                    <td>10:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0048' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->           
                    <td>
                    <button name="sedia48" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong48" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>4</th>
                    <td>Lapangan 4</td>
                    <td>11:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0049' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia49" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong49" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>5</th>
                    <td>Lapangan 4</td>
                    <td>12:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0050' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia50" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong50" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>6</th>
                    <td>Lapangan 4</td>
                    <td>13:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0051' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia51" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong51" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>7</th>
                    <td>Lapangan 4</td>
                    <td>14:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0052' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia52" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong52" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>8</th>
                    <td>Lapangan 4</td>
                    <td>15:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0053' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia53" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong53" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>9</th>
                    <td>Lapangan 4</td>
                    <td>16:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0054' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia54" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong54" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>10</th>
                    <td>Lapangan 4</td>
                    <td>17:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0055' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia55" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong55" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>11</th>
                    <td>Lapangan 4</td>
                    <td>18:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0056' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia56" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong56" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>12</th>
                    <td>Lapangan 4</td>
                    <td>19:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0057' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia57" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong57" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>13</th>
                    <td>Lapangan 4</td>
                    <td>20:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0058' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia58" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong58" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>14</th>
                    <td>Lapangan 4</td>
                    <td>21:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0059' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia59" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong59" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th>15</th>
                    <td>Lapangan 4</td>
                    <td>22:00</td>
                    <!-- Code Status start -->
                    <?php
                    $st= 0;
                    $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
                    FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
                    B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
                    A.ID_DETAIL_JADWAL='DJ0060' && B.TANGGAL_PESANAN= '$tgl'");
                    while($data = mysqli_fetch_assoc($sql1)){
                        $st= $data['STATUS'];
                    } ?>           
                        <?php 
                            if($st==1){?>
                                <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                            <?php } else {?>
                                <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                        <?php }
                        ?>
                    <!-- Code Status End -->
                    <td>
                    <button name="sedia60" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button name="kosong60" class="btn btn-danger sweet-confirm">
                        <i class="fa fa-close color-muted m-r-5"></i>
                    </button>
                    </td>
                </tr>                                       
            </tbody>
        </table>                            
                <div class="modal-footer">
                    <!-- <input type="reset" class="btn btn-danger" value="Reset" style="color:white;"> -->
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
<!-- tabel jam Lapangan 4 -->

    <?php  }} ?>

<!-- fungsi tombol pesan -->
            <?php
                if (isset($_POST['sedia1'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0001';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0001',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>        
            <?php
                if (isset($_POST['sedia2'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0002';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0002',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }                   
            ?>
            <?php
                if (isset($_POST['sedia3'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0003';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0003',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia4'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0004';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0004',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia5'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0005';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0005',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia6'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0006';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0006',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia7'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0007';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0007',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia8'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0008';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0008',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia9'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0009';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0009',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia10'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0010';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0010',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia11'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0011';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0011',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia12'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0012';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0012',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia13'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0013';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0013',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia14'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0014';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0014',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia15'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0015';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0015',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia16'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0016';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0016',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia17'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0017';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0017',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia18'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0018';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0018',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia19'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0019';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0019',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia20'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0020';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0020',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia21'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0021';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0021',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia22'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0022';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0022',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia23'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0023';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0023',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia24'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0024';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0024',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia25'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0025';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0025',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia26'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0026';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0026',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia27'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0027';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0027',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia28'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0028';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0028',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia29'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0029';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0029',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia30'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0030';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0030',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia31'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0031';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0031',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia32'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0032';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0032',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia33'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0033';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0033',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia34'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0034';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0034',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia35'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0035';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0035',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia36'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0036';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0036',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia37'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0037';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0037',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia38'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0038';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0038',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia39'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0039';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0039',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia40'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0040';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0040',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia41'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0041';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0041',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia42'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0042';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0042',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia43'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0043';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0043',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia44'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0044';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0044',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia45'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0045';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0045',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia46'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0046';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0046',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia47'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0047';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0047',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia48'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0048';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0048',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia49'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0049';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0049',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia50'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0050';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0050',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia51'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0051';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0051',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia52'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0052';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0052',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia53'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0053';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0053',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia54'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0054';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0054',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia55'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0055';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0055',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia56'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0056';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0056',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia57'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0057';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0057',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia58'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0058';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0058',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia59'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0059';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0059',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
            <?php
                if (isset($_POST['sedia60'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0060';
                    }

                    $sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                                         VALUES ('$id_dj','DJ0060',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status ');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }          
            ?>
<!-- fungsi tombol pesan -->
<!-- fungsi tombol kosong -->
            <?php
                if (isset($_POST['kosong1'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0001';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0001' && TANGGAL_PESANAN='$tgl_pesan'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong2'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0002';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0002'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong3'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0003';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0003'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong4'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0004';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0004'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong5'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0005';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0005'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong6'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0006';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0006'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong7'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0007';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0007'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong8'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0008';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0008'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong9'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0009';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0009'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong10'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0010';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0010'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong11'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0011';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0011'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong12'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0012';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0012'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong13'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0013';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0013'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong14'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0014';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0014'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong15'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0015';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0015'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong16'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0016';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0016'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong17'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0017';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0017'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong18'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0018';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0018'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong19'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0019';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0019'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong20'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0020';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0020'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong21'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0021';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0021'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong22'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0022';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0022'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong23'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0023';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0023'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong24'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0024';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0024'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong25'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0025';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0025'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong26'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0026';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0026'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong27'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0027';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0027'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong28'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0028';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0028'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong29'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0029';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0029'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong30'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0030';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0030'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong31'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0031';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0031'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong32'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0032';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0032'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong33'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0033';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0033'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong34'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0034';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0034'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong35'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0035';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0035'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong36'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0036';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0036'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong37'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0037';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0037'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong38'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0038';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0038'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong39'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0039';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0039'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong40'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0040';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0040'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong41'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0041';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0041'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong42'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0042';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0042'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong43'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0043';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0043'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong44'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0044';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0044'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong45'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0045';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0045'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong46'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0046';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0046'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong47'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0047';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0047'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong48'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0048';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0048'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong49'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0049';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0049'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong50'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0050';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0050'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong51'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0051';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0051'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong52'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0052';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0052'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong53'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0053';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0053'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong54'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0054';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0054'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong55'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0055';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0055'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong56'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0056';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0056'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong57'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0057';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0057'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong58'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0058';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0058'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong59'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0059';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0059'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
            <?php
                if (isset($_POST['kosong60'])){
    
                    $tgl_pesan=$_POST['date'];

                    $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $djid = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_dj = autonumber($djid, 3, 3);
                    }else{
                        $id_dj = 'DJ0060';
                    }

                    $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='DJ0060'"); // Eksekusi/ Jalankan query dari variabel $query

                    if($sql){
                        echo "<script>alert('Berhasil mengganti status');document.location.href='#'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('Gagal mengganti status');document.location.href='#'</script>\n";
                    }
                    }
            ?>
<!-- fungsi tombol kosong -->
</body>
</html>