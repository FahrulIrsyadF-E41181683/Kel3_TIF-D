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

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Halaman Utama</a></li>
          <li><a href="../transaksi/pesananku.php?id=<?= $_SESSION['ID_PELANGGAN'];?>" height="40px">Pesananku</a></li>
          <li><a href="#kelebihan">kelebihan</a></li>
          <li><a href="#member">Member</a></li>
          <li><a href="#lapangan">daftar lapangan</a></li>
          <li><a href="#pemesan">cara pemesanan</a></li>
          <li><a href="#lokasi">lokasi</a></li>
          <li><a href="#footer">tentang</a></li>
          <li class="nav-item dropdown">

            <!-- Kodingan ambil data pelanggan -->
          <?php
              $st= $_SESSION['ID_PELANGGAN'];
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

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Selamat Datang di Rush</h1>
      <h2>RUSH Badminton adalah sebuah tempat bermain olahraga badminton</h2>
      <a href="../transaksi/pilih_lapangan.php" class="btn-get-started">Pesan Sekarang</a>
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
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><img src="img/icon/tidakribet.png" width="100px"></a></div>
              <h4 class="title"><a href="">Tidak Ribet</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><img src="img/icon/mudah.png" width="100px"></i></a></div>
              <h4 class="title"><a href="">Pembayaran Mudah</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #kelebihan -->

     <!--==========================
     MEMBER
    ============================-->
    <section id="member">
        <div class="container">
          <div class="row member-container">
            <div class="col-lg-6 background order-lg-1 order-2 wow fadeInLeft"></div>
            <div class="col-lg-6 content order-lg-2 order-3">
                <img src="img/icon/Ayo jadi.png"><br>
                <p>
                    Dengan adanya Member Profile, para pengguna aplikasi atau yang kerap kali disebut user ini dapat dengan mudah melihat jumlah poin yang dimiliki dan dapat juga memasukkan gambar profile / profile picture, maupun data keanggotaan si pengguna juga dapat terlihat pada Member Profile tersebut. Selain itu, pada Member Profile juga dapat diatur field atau data mana yang akan muncul pada halaman Member Profile Anda.
                </p>
                <!-- <a href="#" class="btn-get-started">Daftar Member</a> -->
            </div>
          </div>
        </div>
      </section><!-- #about -->
  

    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">RUSH Badminton</h3>
            <p class="cta-text"> SI BOLANG (Sistem Informasi Booking Lapangan) adalah sebuah website untuk melakukan proses pemesaan lapangan online yang dapat dilakukan dimana saja dan kapan saja. Website ini bertujuan untuk mempermudah proses transaksi antara penyedia lapangan dan penyewa lapangan agar proses pemesanan berjalan dengan efektif dan efisien. </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#lapangan">Klik untuk beraksi</a>
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
          <h3 class="section-title">Daftar Lapangan</h3><br>
          <!-- <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p> -->
        </div>

        <div class="container wow fadeIn">
            <div class="row">
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="box">
                  <img src="img/lapangan/lap1.jpg">
                  <h4>Lapangan 1</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="box">
                  <h5>Pilih Lapangan yang Kamu Sukai</h5>
                  <div class="animated infinite heartBeat tombol2"><a href="#"><h3>Pesan Sekarang</h3></a></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="box">
                  <img src="img/lapangan/lap2.jpg">
                  <h4>Lapangan 2</h4>
                </div>
              </div>
            </div>
          </div>



          <div class="container wow fadeIn">
              <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="box">
                        <img src="img/lapangan/lap3.jpg">
                        <h4>Lapangan 3</h4>
                      </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.0s">
                    <div class="box">
                        <img src="img/lapangan/center.jpg">
                      </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.2s">
                    <div class="box">
                        <img src="img/lapangan/lap4.jpg">
                        <h4>Lapangan 4</h4>
                      </div>
                </div>
      
              </div>
      
            </div>

    <!--==========================
      Tata Cara Pemesanan
    ============================-->
    <section id="pemesan">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Tata Cara Pemesanan</h3><br>
          </div>
  
          <div class="container wow fadeIn">
              <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                  <div class="box">
                    <img src="img/icon/cara1.png">
                    <h4>Tekan tombol Pesan Sekarang di halaman Web</h4>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="box">
                        <img src="img/icon/cara2.png">
                        <h4>pilih lapangan yang mau dipesan, jam bermain dan tanggal bermain</h4>
                      </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="box">
                    <img src="img/icon/cara3.png">
                    <h4>lakukan pembayaran di bank terdekat dan lakukan konfirmasi pembayaran</h4>
                  </div>
                </div>
              </div>
            </div>
  

    <!--==========================
      Lokasi
    ============================-->
    <section id="lokasi">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Lokasi</h3>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1974.6839623508288!2d113.70902124147506!3d-8.165636857757912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3c5639c7bcdde6cd!2sRUSH%20Badminton%20Jember!5e0!3m2!1sen!2sid!4v1576422044648!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

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
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Masukkan minimal 4 huruf" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Masukkan Email yang Benar" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="komen" rows="5" data-rule="required" placeholder="Tulis Komentar di sini" data-msg="Tulis sesuatu untuk kita"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Kirim Pesan</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #lokasi -->

  </main>

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
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Apa Itu Member</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Lokasi</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Tentang Rush</a></li>
            <li><a href="../master/index.php"><i class="fa fa-angle-double-right"></i>Author</a></li>
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
