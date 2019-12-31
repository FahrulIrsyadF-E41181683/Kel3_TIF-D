<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">                         
            <div class="table-responsive">
            <div class="col-sm-12">

                <div class="container">
                    <div class="row">
                    <div class="col-6">
                        <h4>Data Jadwal</h4>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control date" name='date' id='date' placeholder="Pilih Tanggal" >
                    </div>
    
        <!-- value di date -->
    <!-- value="<?=isset($_POST['date']) ? $_POST['date'] : ''?>" -->

                        <button class="btn btn-info tampilkan" name="tampilkan" id="tampilkan">Tampilkan</button>
                        <button class="btn btn-info" name="tampilkan2" id="tampilkan2">Tampilkan2  </button>
                        <input type="submit" value="go" name="as" class="as"></input>
                </div> 
    </div>    
</div>

    <div class="content">
    
    </div>

<!-- tabel jam -->
 <div class="jam-content">
    
    
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
                A.ID_DETAIL_JADWAL='DJ0001'");
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
                A.ID_DETAIL_JADWAL='DJ0002'");
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
                A.ID_DETAIL_JADWAL='DJ0003'");
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
<!-- tabel jam -->

</div>
</div>
</div>
</div>
</div>
</div>

<?php 
    if(isset($_POST["#tampilkan2"])){ ?>
        <h1>Suksess</h1>;
        <?php echo "<script>alert('pilih Lapangan dulu');</script>\n";
    }
?>

</body>
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".tampilkan").click(function(){
		$.ajax({
			type: "POST",
			url: "go.php",
			data: $('#date').val(),
			success: function() {
				$('.content').load("go.php");
                // $('.content').load("go.php");
			}
		});
	});
});
</script>

</html>