<?php
    session_start();
    include 'koneksi.php';
 ?>

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

  <!-- INDONESIA -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>

</head>

<body>
<header id="header">
  
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Halaman Utama</a></li>
          <li><a href="#hero" height="40px">Pesananku</a></li>
           <li class="nav-item dropdown">

            <!-- Kodingan ambil data pelanggan -->
          <?php
              $st= "PL0001";
              $sql = mysqli_query($connect, "Select * from pelanggan where ID_PELANGGAN='".$st."'");
              while($data = mysqli_fetch_array($sql)){
                
                $foto=$data['FOTO_PELANGGAN'];
              ?>
        <a class="nav-link" id="navbarDropdown " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(  empty($foto)){ ?>
                            <img src="../master/images/pelanggan/user2.png"  width='40px' height='30px'>
                                <?php }else{ ?>
                            <img src="../master/images/pelanggan/<?php echo $foto;?>"  width='40px' height='30px'>
                                <?php } ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item dropdown-menu-center mt-3 md-3"> 
                          <?php if(  empty($foto)){ ?>
                            <img src="../master/images/pelanggan/user2.png"  width='100px' height='90px'>
                                <?php }else{ ?>
                            <img src="../master/images/pelanggan/<?php echo $foto;?>"  width='100px' height='90px'>
                                <?php } ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-menu-center"> <?php echo $data['NAMA_PELANGGAN']; ?> </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-menu-center"> <?php echo $data['JENIS_KELAMIN']; ?> </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-menu-center"> <?php echo $data['ALAMAT_PELANGGAN']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-menu-center"> <?php echo $data['EMAIL_PELANGGAN']; ?></a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item dropdown-menu-center masuk2"> Keluar?</a>
        </div>
        <?php } ?>
              <!-- Kodingan ambil data pelanggan end -->
      </li>
      
        </ul>
    </div>
  </header><!-- #header -->

  <div class="modal-body">
        <form  method="post" enctype="multipart/form-data"> 
            <div class="row">
            <div class="form-group col col-md-6 ml-auto">
                <label class="col-form-label">Pilih Tanggal</label>
                  <div class="date2"> <input type="text" class="form-control date" name='date' id='date'> </div>
            </div>
            <div class="form-group col col-md-6 ml-auto">
                <label class="col-form-label">Pilih Lapangan</label>
                <select name="nim" id="nim" class="form-control input-defaut" onchange="changeValue(this.value)">
              <option value="">-Pilih Lapangan-</option>

              <!-- <?php
                  $result = mysqli_query($connect, "select NAMA_LAPANGAN from lapangan");   
                  while ($row = mysqli_fetch_array($result)) {   
                      echo '<option value="' . $row['NAMA_LAPANGAN'] .'" >' . $row['NAMA_LAPANGAN'].'</option>';
                  }?> -->

                  <?php
                  $result = mysqli_query($connect, "select NAMA_LAPANGAN from lapangan");   
                  while ($options = mysqli_fetch_assoc($result)) {   
                    foreach ($options as $area) {
                      $selected = @$_POST['nim'] == $area ? ' selected="selected"' : '';
                      echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
                  }}?>


                  </select>
            </div>
            </div>
</div>

<div class="menu">
		<ul>
			<li><a class="klik_menu" id="home">HOME</a></li>
			<li><a class="klik_menu" id="tentang">TENTANG</a></li>
			<li><a class="klik_menu" id="tutorial">TUTORIAL</a></li>
			<li><a class="klik_menu" id="sosmed">SOSIAL MEDIA</a></li>
		</ul>
	</div>
 
	<div class="badan">
 
 
 
	</div>

<div class="modal-footer ">
        <button name="cari" class="btn btn-info" id="cari">Cari</button>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
    
</body>

<script>
   $(document).ready(function() {
    $("#cari").click(function() {
         $('.date2').hide();
     });
     });
   </script>
</html>