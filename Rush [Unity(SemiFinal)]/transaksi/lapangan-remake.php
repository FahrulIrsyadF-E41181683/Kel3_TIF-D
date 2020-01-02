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
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
$("#date").datepicker('setDate', new Date());
$("#date").datepicker({
        format: "dd/mm/yyyy",
        useCurrent: true,
        todayBtn: "linked",
        startDate: "today",
        locale:'id',
        orientation: "bottom auto",
        enableOnReadonly: true,
    })


    $("#pesan").click(function() {

    });


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
                <input type="text" class="form-control date" name='date' id='date' value="<?=isset($_POST['date']) ? $_POST['date'] : ''?>">
            </div>
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Lapangan</label> -->
                <select name="lap" id="lap" class="form-control input-defaut" onchange="changeValue(this.value)">

            <?php
            $result = mysqli_query($connect, "select NAMA_LAPANGAN from lapangan");   
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0003'  && B.TANGGAL_PESANAN= '$tgl'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0004'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0005'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0006'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0007'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0008'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0009'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0010'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0011'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0012'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0013'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0014'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                A.ID_DETAIL_JADWAL='DJ0015'");
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
                <button type="button" class="btn btn-success sweet-confirm">
                    <i class="fa fa-check color-muted m-r-5"></i>
                </button>
                <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0016'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0017'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0018'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0019'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0020'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0021'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0022'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0023'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0024'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0025'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0026'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0027'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0028'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0029'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0030'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0031'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0032'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0033'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0034'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0035'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0036'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0037'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0038'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0039'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0040'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0041'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0042'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0043'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0044'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0045'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0046'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0047'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0048'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0049'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0050'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0051'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0052'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0053'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0054'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0055'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0056'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0057'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0058'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0059'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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
                    A.ID_DETAIL_JADWAL='DJ0060'");
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
                    <button type="button" class="btn btn-success sweet-confirm">
                        <i class="fa fa-check color-muted m-r-5"></i>
                    </button>
                    <button type="button" class="btn btn-danger sweet-confirm">
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

</body>
</html>