<?php
    session_start();
    include '../home/koneksi.php';
    error_reporting(0);

    if(empty($_SESSION['total'])){
        echo "<script>document.location.href='pilih_lapangan.php'</script>\n";
    }
?>

<!DOCTYPE html>
<html class="h-100" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rush Badminton</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style_bank.css" rel="stylesheet">

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    
</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->
    
<div class="row justify-content-center h-100">
    <div class="col-xl-6">
        <div class="card-body pt-5 card login-form mb-0 mt-5">
            <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
            
            <div class="content">
                    <h3>Pilih Metode Pembayaran</h3>
            
                <div class="menu">
                    <ul>
                        <li><a class="klik_menu btn btn-success text-white" id="bayar">BAYAR LANGSUNG</a></li>
                        <li><a class="klik_menu btn btn-success text-white" id="transfer">TRANSFER BANK</a></li>
                    </ul>
                </div>
                
            </form>
            
            <div class="badan">
            <!-- isi dari class badan -->
            </div>

        </div>
    </div>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('.klik_menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "bayar"){
				$('.badan').load('bayar.php');						
			}else if(menu == "transfer"){
				$('.badan').load('transfer.php');						
			}
		});				
	});
</script>

<?php
ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_get();

$date = new DateTime( date('H:i:s'));
date_add($date, date_interval_create_from_date_string('-7 hours'));
 $waktu_sekarang = date_format($date, 'H:i:s'); //jam sekarang

$date2 = new DateTime( date('H:i:s'));
date_add($date2, date_interval_create_from_date_string('-6 hours'));
 $waktu_habis = date_format($date2, 'H:i:s'); //jam habis yang ditambah 1 jam
?>

<!-- jika diklik tombol bayar di transfer -->
        <?php
            if (isset($_POST["bayar"])){
                $bank=$_POST['bank'];
                if($bank==''){
                    echo "<script>alert('gagal memesan, Pilih bank dulu');document.location.href='pilih_metode.php'</script>\n";
                }else{
            
                    // ambil data dari sesion
                    $id_pl= $_SESSION['id_pl'];
                    $nama_lap = $_SESSION["lap"];
                    $tgl_main = $_SESSION["tgl_main"];
                    $tgl_transaksi=date('d/m/Y');
                    $total=$_SESSION['total'];
                    $jam_pesan=$_SESSION['jam_pesan'];
                    
    //tentukan id transaksi
            $data = mysqli_query($connect, "select ID_TRANSAKSI from transaksi ORDER BY ID_TRANSAKSI DESC LIMIT 1");
            while($trans = mysqli_fetch_array($data))
            {
                $transid = $trans['ID_TRANSAKSI'];
            }

            $row = mysqli_num_rows($data);
            if($row>0){
                $id_tr = autonumber($transid, 3, 3);
            }else{
                $id_tr = 'TR0001';
            }

    //ambil id bank
                    
                    // $bank='BRI';
                    $sql1= mysqli_query($connect, "SELECT `ID_BANK` FROM `bank` WHERE `NAMA_BANK` = '$bank'");
                    while($ambil = mysqli_fetch_assoc($sql1)){
                        $bank1 = $ambil['ID_BANK'];
                    }
            
    //Proses simpan ke Database Transaksi
            
                    $bank2 = $bank1;
                    $sql = mysqli_query($connect, "INSERT INTO `transaksi`(`ID_TRANSAKSI`, `ID_PELANGGAN`, `ID_BANK`, `HARGA_TOTAL`, `TANGGAL_TRANSAKSI`, `WAKTU_PEMBAYARAN`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`,`WAKTU_TRANSAKSI`, `WAKTU_HABIS`) 
                                                                    VALUES ('$id_tr','$id_pl','$bank1','$total','$tgl_transaksi','00:00:00','BELUM MEMBAYAR',0,'$waktu_sekarang','$waktu_habis')"); // Eksekusi/ Jalankan query dari variabel $query
                    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                        // Jika Sukses, Lakukan :
                                            //Proses Simpan ke database detail Transaksi
                                        $jumlah_dipilih = count($jam_pesan);
                                        
                                        for($x=0;$x<$jumlah_dipilih;$x++){ //perulangan untuk simpan detail transaksi

            //tentukan id detail transaksi
            $data2 = mysqli_query($connect, "select ID_DETAIL_TRANSAKSI from detail_transaksi ORDER BY ID_DETAIL_TRANSAKSI DESC LIMIT 1");
            while($trans2 = mysqli_fetch_array($data2))
            {
                $transid2 = $trans2['ID_DETAIL_TRANSAKSI'];
            }

            $row2 = mysqli_num_rows($data2);
            if($row2>0){
                $id_dt = autonumber($transid2, 3, 3);
            }else{
                $id_dt = 'DT0001';
            }

            $dj = mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL FROM detail_jadwal A JOIN lapangan B on A.ID_LAPANGAN=B.ID_LAPANGAN JOIN jam C on A.ID_JAM=C.ID_JAM  
                                            WHERE B.NAMA_LAPANGAN= '".$nama_lap."' && C.JAM= '".$jam_pesan[$x]."'");
            while($dj2 = mysqli_fetch_array($dj))
            {
                $id_dj = $dj2['ID_DETAIL_JADWAL'];
            }
                    //proses simpannya detail transaksi
                mysqli_query($connect, "INSERT INTO `detail_transaksi`(`ID_DETAIL_TRANSAKSI`, `ID_TRANSAKSI`,`ID_DETAIL_JADWAL`,`JAM`, `NAMA_LAPANGAN`, `TANGGAL_PESANAN`) 
                                                                VALUES ('$id_dt','$id_tr','$id_dj','$jam_pesan[$x]','$nama_lap','$tgl_main')");
            }

                        echo "<script>alert('Pemesanan berhasil, Silahkan lakukan pembayaran');document.location.href='pesananku.php?id=$id_pl'</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('gagal memesan, silakan cek ulang');document.location.href='pilih_metode.php'</script>\n";
                    }
    
            }}
        ?>
<!-- jika diklik tombol bayar di transfer -->


<!-- jika diklik tombol bayar di bayar -->
        <?php
                    if (isset($_POST["bayar2"])){
                    
                            // ambil data dari sesion
                            $id_pl= $_SESSION['id_pl'];
                            $nama_lap = $_SESSION["lap"];
                            $tgl_main = $_SESSION["tgl_main"];
                            $tgl_transaksi=date('d/m/Y');
                            $total=$_SESSION['total'];
                            $jam_pesan=$_SESSION['jam_pesan'];
                            
            //tentukan id transaksi
                    $data = mysqli_query($connect, "select ID_TRANSAKSI from transaksi ORDER BY ID_TRANSAKSI DESC LIMIT 1");
                    while($trans = mysqli_fetch_array($data))
                    {
                        $transid = $trans['ID_TRANSAKSI'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_tr = autonumber($transid, 3, 3);
                    }else{
                        $id_tr = 'TR0001';
                    }
                    
            //Proses simpan ke Database Transaksi
                    
                            $sql = mysqli_query($connect, "INSERT INTO `transaksi`(`ID_TRANSAKSI`, `ID_PELANGGAN`, `ID_BANK`, `HARGA_TOTAL`, `TANGGAL_TRANSAKSI`, `WAKTU_PEMBAYARAN`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`,`WAKTU_TRANSAKSI`, `WAKTU_HABIS`) 
                                                                            VALUES ('$id_tr','$id_pl','1','$total','$tgl_transaksi','00:00:00','BELUM MEMBAYAR',0,'$waktu_sekarang','$waktu_habis')"); // Eksekusi/ Jalankan query dari variabel $query
                            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                                // Jika Sukses, Lakukan :
                                                    //Proses Simpan ke database detail Transaksi
                                                $jumlah_dipilih = count($jam_pesan);
                                                
                                                for($x=0;$x<$jumlah_dipilih;$x++){ //perulangan untuk simpan detail transaksi
        
                    //tentukan id detail transaksi
                    $data2 = mysqli_query($connect, "select ID_DETAIL_TRANSAKSI from detail_transaksi ORDER BY ID_DETAIL_TRANSAKSI DESC LIMIT 1");
                    while($trans2 = mysqli_fetch_array($data2))
                    {
                        $transid2 = $trans2['ID_DETAIL_TRANSAKSI'];
                    }
        
                    $row2 = mysqli_num_rows($data2);
                    if($row2>0){
                        $id_dt = autonumber($transid2, 3, 3);
                    }else{
                        $id_dt = 'DT0001';
                    }
        
                    $dj = mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL FROM detail_jadwal A JOIN lapangan B on A.ID_LAPANGAN=B.ID_LAPANGAN JOIN jam C on A.ID_JAM=C.ID_JAM  
                                                    WHERE B.NAMA_LAPANGAN= '".$nama_lap."' && C.JAM= '".$jam_pesan[$x]."'");
                    while($dj2 = mysqli_fetch_array($dj))
                    {
                        $id_dj = $dj2['ID_DETAIL_JADWAL'];
                    }
                            //proses simpannya detail transaksi
                        mysqli_query($connect, "INSERT INTO `detail_transaksi`(`ID_DETAIL_TRANSAKSI`, `ID_TRANSAKSI`,`ID_DETAIL_JADWAL`,`JAM`, `NAMA_LAPANGAN`, `TANGGAL_PESANAN`) 
                                                                        VALUES ('$id_dt','$id_tr','$id_dj','$jam_pesan[$x]','$nama_lap','$tgl_main')");
                    }
        
                    // unset session biar datanya hilang
                            unset ($_SESSION["lap"]);
                            unset ($_SESSION["tgl_main"]);
                            unset ($_SESSION['total']);
                            unset ($_SESSION['jam_pesan']);

                                echo "<script>alert('Pemesanan berhasil, Silahkan lakukan pembayaran');document.location.href='pesananku.php?id=$id_pl'</script>\n"; // Redirect ke halaman admin.php
                            }else{
                                // Jika Gagal, Lakukan :
                                echo "<script>alert('gagal memesan, silakan cek ulang');document.location.href='pilih_metode.php'</script>\n";
                            }
            
                    }
                ?>
<!-- jika diklik tombol bayar di bayar -->



</html>





