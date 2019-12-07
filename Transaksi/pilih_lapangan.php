<!DOCTYPE html>
<html lang="en">
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

  <!-- Bootstrap File -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

      <!-- Date Picker -->
      <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
      <link rel="stylesheet" href="css/datepicker.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
      
      <script src="js/jquery.js"></script>
      <script src="js/jquery-3.4.1.min"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script>
        $(function () {
        $('#datepicker').datepicker({
        autoclose: true
      });
      });
      </script>
      <?php include "koneksi.php"; ?>
</head>

<body>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li><a href="../Rush Home/index.html"><strong>Halaman Utama</a></li>
          <li><a href="#">Pesananku</a></li>
        </ul>
    </div>
  </header><!-- #header -->

          <div class="modal-body">
        <form  method="post" enctype="multipart/form-data" action="" name="inputtanggal"> 
            <div class="row">
            <div class="form-group col">
                <label class="col-form-label">Pilih Tanggal</label>
                &nbsp;
                <input type="date" id="datepicker" class="form-control">
            </div>
            <div class="form-group col">
                <label class="col-form-label">Pilih Lapangan</label>
                  <select name="nim" id="nim" class="form-control input-default" onchange="changeValue(this.value)">
                  <option value=0>-Pilih Lapangan-</option>
                  <!-- <?php
                    $query = "Select * from lapangan ORDER BY NAMA_LAPANGAN esc";
                    //$query = "Select * from lapangan";
                    $sql = mysqli_query($connect, $query);
                    $jsArray = "var prdName = new Array();\n";
                    while($row =  mysqli_fetch_assoc($sql)){
                      // echo "<option>$row[NAMA_LAPANGAN]</option>";	
                      echo '<option value="' . $row['NAMA_LAPANGAN'] . '">' . $row['NAMA_LAPANGAN'] . '</option>';
                      $jsArray .= "prdName['" . $row['NAMA_LAPANGAN'] . "'] = {id_lap:'" . addslashes($row['ID_LAPANGAN']) . "',
                        nm_lap:'".addslashes($row['NAMA_LAPANGAN'])."'};\n";		
                    }
                    ?> -->

              <?php
                  $result = mysqli_query($connect, "select * from lapangan");   
                  $jsArray = "var dtMhs = new Array();\n";       
                  while ($row = mysqli_fetch_array($result)) {   
                      echo '<option value="' . $row['NAMA_LAPANGAN'] . '">' . $row['NAMA_LAPANGAN'] . '</option>';   
                      $jsArray .= "dtMhs['" . $row['NAMA_LAPANGAN'] . "'] = {nama:'" . addslashes($row['NAMA_LAPANGAN']) . "',jrsn2:'".addslashes($row['HARGA_LAPANGAN'])."'};\n";   
                  }     
              ?>    

                  </select>
            </div>
            </div>
        <div class="modal-footer">
                <button type="submit" name="cari" class="btn btn-primary" >Cari</button>
        </div>
        </div>

        <div class="modal-body">
            <div class="row">
            <div class="form-group col">
                <input type="text" name="nm" id="nm" class="form-control">
            </div>
            <div class="form-group col">
                <input type="text" name="jrsn" id="jrsn" class="form-control">
            </div>
            </div>

            <script type="text/javascript">   
                // <?php echo $jsArray; ?> 
                // function changeValue(pilih_lp){ 
                // document.getElementById('id_lap').value = prdName[pilih_lp].ID_LAPANGAN; 
                // document.getElementById('nm_lap').value = prdName[pilih_lp].NAMA_LAPANGAN; 
                // }; 
                <?php echo $jsArray; ?> 
                    function changeValue(nim){ 
                    document.getElementById('nm').value = dtMhs[nim].nama; 
                    document.getElementById('jrsn').value = dtMhs[nim].jrsn2; 
                    };  
            </script> 


       <!-- <?php
        if (isset($_POST['cari'])){
          $lapangan = $_POST['nm_lp']?>
      <div class="row">
          <div class="col">
            1 of 2
          </div>
          <div class="col">
                  <?php
              //$query = "Select * from lapangan ";
              $query = "SELECT * FROM `lapangan` WHERE `NAMA_LAPANGAN` = $lapangan";
              $sql = mysqli_query($connect, $query);
              while($data = mysqli_fetch_assoc($sql)){
              ?>
                  <tr>
                      <td><img alt="" class="" width="200" src="img/lapangan/<?php echo $data['FOTO_LAPANGAN']; ?>"></td>
                  </tr>
              <?php } ?>
          </div>
      </div>      
    </div> } 
    <?php } ?> -->
      
























  <!--==========================
    Footer
  ============================-->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>SIBOLANG</h5>
					<p>SI BOLANG (Sistem Informasi Booking Lapangan) adalah sebuah website untuk
            melakukan proses pemesaan lapangan online yang dapat dilakukan dimana saja
            dan kapan saja. Website ini bertujuan untuk mempermudah proses transaksi
            antara penyedia lapangan dan penyewa lapangan agar proses pemesanan 
            berjalan dengan efektif dan efisien </p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Menu</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Halaman Utama</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Kelebihan</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Daftar Lapangan</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Cara Pemesanan</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Apa Itu lapangan</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Lokasi</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Tentang Rush</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Author</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Informasi RUSH Badminton</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><img src="img/icon/pemilik.png" width="30px">  Rudi Rahmawan</a></li>
						<li><a href="javascript:void();"><img src="img/icon/berdiri.png" width="30px">  November 2018</a></li>
						<li><a href="javascript:void();"><img src="img/icon/alamat.png" width="30px">  Sebelah Neutron - Kampus, 
                                                                                           Jln. Kalimantan, Gg. 14, Krajan Timur, 
                                                                                           Sumbersari, Kec. Sumbersari, Kabupaten 
                                                                                           Jember, Jawa Timur 68121</a></li>
						<li><a href="javascript:void();"><img src="img/icon/email.png" width="30px">  RushBadminton@gmail.com</a></li>
					</ul>
				</div>
      </div>
      


			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i> Rush Badminton    </a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i> rushbadminton    </a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-whatsapp"></i> 0851 0557 0333    </a></li> 
					</ul>
				</div>
				</hr>
      </div>	
      
    </div>
    
    <div class="copyright">
      <p>&copy Copyright 2019</p>
    </div>
    </hr>
	</section>
	<!-- ./Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
