<?php include 'koneksi.php'; ?>

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
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap:300,300i,400,400i,700,700i|Roboto:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/animate/animate.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="Ini Logo"/></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Beranda</a></li>
          <li><a href="#kelebihan">Kelebihan</a></li>
          <li><a href="#lapangan">Daftar Lapangan</a></li>
          <li><a href="#pemesan">Cara Pemesanan</a></li>
          <li><a href="#lokasi">Lokasi</a></li>
          <li><a href="#footer">Tentang Rush</a></li>
          <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdown " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="img/user.png"  width='40px'>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item dropdown-menu-center mt-3 md-3"><img src="img/user.png"  width='100px'></a>
          <div class="dropdown-divider"></div>
          <a href="homelogin.php" class="dropdown-item dropdown-menu-center masuk2"> Masuk/Daftar </a>
        </div>
      </li>
        </ul>
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Selamat datang di SI Bolang</h1>
      <h2>Booking lapangan secara online disini dengan mudah dan cepat</h2>
      <a href="../transaksi/pilih_lapangan.php" class="btn-get-started">Pesan Sekarang!</a>
    </div>
  </section><!-- #hero -->

  <main id="main">


    <!--==========================
      Kelebihan
    ============================-->
    <section id="kelebihan">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Kelebihan</h3><br><br><br><br><br>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><img src="img/icon/waktu.png" width="100px"></a></div>
              <h4 class="title"><a href="">Hemat Waktu</a></h4>
              <p class="description">Dapat memesan lapangan dimanapun dan kapanpun</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><img src="img/icon/tidakribet.png" width="100px"></a></div>
              <h4 class="title"><a href="">Mudah</a></h4>
              <p class="description">Bertujuan untuk memudahkan para pelanggan ketika ingin memesan lapangan</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><img src="img/icon/mudah.png" width="100px"></i></a></div>
              <h4 class="title"><a href="">Pembayaran Mudah</a></h4>
              <p class="description">Tidak perlu mempermasalahkan pembayaran, semuanya ada disini</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #kelebihan -->

    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">SI BOLANG</h3>
            <p class="cta-text"> SI BOLANG (Sistem Informasi Booking Lapangan) 
              adalah sebuah website untuk melakukan proses pemesaan lapangan online yang dapat dilakukan dimana saja dan kapan saja. 
              Website ini bertujuan untuk mempermudah proses transaksi antara penyedia lapangan dan penyewa lapangan 
              agar proses pemesanan berjalan dengan efektif dan efisien. </p>
          </div>
        </div>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      LAPANGAN
    ============================-->
    <section id="lapangan">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title text-center">Daftar Lapangan</h3><br>
          <!-- <h5 class="text-center">Pilih lapangan yang kamu inginkan</h5> -->
        </div>

            <?php 
                    $sql = mysqli_query($connect, "Select * from lapangan where ID_LAPANGAN='LP0001'");
                    while($lap = mysqli_fetch_array($sql)){
            ?>
        <div class="container wow fadeIn">
            <div class="row">
              <div class="col wow fadeInUp" data-wow-delay="0.2s">
                <div class="box">
                  <img src="../master/images/lapangan/<?php echo $lap['FOTO_LAPANGAN']; ?>" width="525" height="210">
                  <h4>Lapangan 1</h4>
                </div>
              </div>
            <?php } ?>
            
              <?php 
                    $sql = mysqli_query($connect, "Select * from lapangan where ID_LAPANGAN='LP0002'");
                    while($lap = mysqli_fetch_array($sql)){
            ?>
              <div class="col wow fadeInUp" data-wow-delay="0.6s">
                <div class="box">
                  <img src="../master/images/lapangan/<?php echo $lap['FOTO_LAPANGAN']; ?>" width="525" height="210">
                  <h4>Lapangan 2</h4>
                </div>
              </div>
            </div>
          </div>
            <?php } ?>

          <?php 
                $sql = mysqli_query($connect, "Select * from lapangan where ID_LAPANGAN='LP0003'");
                while($lap = mysqli_fetch_array($sql)){
            ?>
          <div class="container wow fadeIn">
              <div class="row">
                <div class="col wow fadeInUp" data-wow-delay="0.8s">
                    <div class="box">
                        <img src="../master/images/lapangan/<?php echo $lap['FOTO_LAPANGAN']; ?>" width="525" height="210">
                        <h4>Lapangan 3</h4>
                      </div>
                </div>
                <?php } ?>

            <?php 
            $sql = mysqli_query($connect, "Select * from lapangan where ID_LAPANGAN='LP0004'");
            while($lap = mysqli_fetch_array($sql)){
            ?>
                <div class="col wow fadeInUp" data-wow-delay="1.2s">
                    <div class="box">
                        <img src="../master/images/lapangan/<?php echo $lap['FOTO_LAPANGAN']; ?>" width="525" height="210">
                        <h4>Lapangan 4</h4>
                      </div>
                </div>
            <?php } ?>
              </div>
      
            </div>
            </section>

    <!--==========================
      Tata Cara Pemesanan
    ============================-->
    <section id="pemesan">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Cara Pemesanan</h3><br>
          </div>
  
          <div class="container wow fadeIn">
              <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                  <div class="box">
                    <img src="img/icon/cara1.png">
                    <h4>Tekan tombol pesan sekarang di beranda, kemudian masuk / daftar jika belum mempunyai akun</h4>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="box">
                        <img src="img/icon/cara2.png">
                        <h4>Pilih lapangan yang mau dipesan, jam bermain dan tanggal bermain dan metode pembayaran</h4>
                      </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="box">
                    <img src="img/icon/cara3.png">
                    <h4>Lakukan pembayaran di bank terdekat dan lakukan konfirmasi pembayaran di tab pesananku</h4>
                  </div>
                </div>
              </div>
            </div>
  </section>

    <!--==========================
      Lokasi
    ============================-->
    <section id="lokasi">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Lokasi</h3>
        </div>
      </div>

      <div class="text-center">
      <!-- Uncomment below if you wan to use dynamic maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3679253310543!2d113.70775291422329!3d-8.165636794122612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695aa99d14409%3A0x3c5639c7bcdde6cd!2sRUSH%20Badminton%20Jember!5e0!3m2!1sid!2s!4v1580808496920!5m2!1sid!2s" width="1000" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
              <div class="rush">
                <img src="img/icon/logorush.png" width="150px">
                <p>Kabupaten Jember<br>Jawa Timur</p>
              </div>

            <div class="social-links">
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-whatsapp"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <textarea class="form-control" name="komen" rows="7" placeholder="Tulis Komentar di sini" disabled=true></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button id="kirim" type="submit">Kirim Komentar</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #lokasi -->

    <?php 
    $st=1;
    require_once 'komentar.php';
    ?>

  </main>
  </section>
  <!--==========================
    Footer
  ============================-->
 
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>SI BOLANG</h5>
					<p>SI BOLANG (Sistem Informasi Booking Lapangan) adalah sebuah website untuk
            melakukan proses pemesaan lapangan online yang dapat dilakukan dimana saja
            dan kapan saja. Website ini bertujuan untuk mempermudah proses transaksi
            antara penyedia lapangan dan penyewa lapangan agar proses pemesanan 
            berjalan dengan efektif dan efisien </p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Menu</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="#hero"><i class="fa fa-angle-double-right"></i>Beranda</a></li>
						<li><a href="#kelebihan"><i class="fa fa-angle-double-right"></i>Kelebihan</a></li>
						<li><a href="#lapangan"><i class="fa fa-angle-double-right"></i>Daftar Lapangan</a></li>
						<li><a href="#pemesan"><i class="fa fa-angle-double-right"></i>Cara Pemesanan</a></li>
            <li><a href="#lokasi"><i class="fa fa-angle-double-right"></i>Lokasi</a></li>
            <li><a href="#footer"><i class="fa fa-angle-double-right"></i>Tentang Rush</a></li>
            <li><a href="..\master\index.php"><i class="fa fa-angle-double-right"></i>Admin</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Informasi RUSH Badminton</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><img src="img/icon/pemilik.png" width="30px">  Rudi Rahmawan</a></li>
						<li><a href="javascript:void();"><img src="img/icon/berdiri.png" width="30px">  Dibuka pada November 2018</a></li>
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

<script>
    $("#kirim").click(function() {
      alert('Silahkan masuk untuk mengirim komentar');
        });
</script>

</html>
