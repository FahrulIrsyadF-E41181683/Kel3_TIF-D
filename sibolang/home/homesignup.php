<?php
session_start();
require 'functions.php';
if (isset($_POST["signup_submit"])){

 if (daftar($_POST) > 0){
   echo "<script>
         alert ('user berhasil ditambah');
       </script>";
       header("Location: homelogin.php");
 }else{
   echo mysqli_error($conn);}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rush Badminton</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="signupstyle.css">



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
          <li class=""><a href="home1.php">Beranda</a></li>
          <li><a href="#">kelebihan</a></li>
          <li><a href="#">daftar lapangan</a></li>
          <li><a href="#">cara pemesanan</a></li>
          <li><a href="#">lokasi</a></li>
          <li><a href="#">tentang rush</a></li>
          <li class="nav-item dropdown"><img src="img/user.png"  width='40px'></li>
        </ul>
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <form action="" method="post" enctype="multipart/form-data" >
        <div id="login-box">
          <div class="left">
          <span class="ketsignup"> DAFTAR</span>
          
          <input type="text" name="username" placeholder="Nama Pengguna" required autocomplete="off" autofocus/>
          <input type="email" name="email" placeholder="E-mail" required autocomplete="off"/> 
          <input type="text" name="alamat" placeholder="Alamat" required autocomplete="off"/> 
          <p>
            <span> Jenis kelamin:</span>
                    <select name="jeniskelamin">
                        <option value="perempuan">Perempuan</option>
                        <option value="laki-laki">Laki-laki</option>
                    </select>
        </p>
          <input type="text" name="notelepon" maxlength="13" 
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="No Telepon" required autocomplete="off">
          <input type="password" name="password" placeholder="Kata Sandi" required autocomplete="off"/>
          <input type="password" name="password2" placeholder="Tulis Ulang Kata Sandi" required autocomplete="off"/>
          <input type="file" name="foto" class="photo" required />  
          <input type="submit" name="signup_submit" value="Daftar" />
        
        
          </div>
          
          <div class="right">
            <span class="loginwith">Sudah ada akun?</span>
            <button class="social-signin facebook"  onclick="window.location.href = 'homelogin.php';">Masuk</button>
          </div>
        <div class="or">OR</div> 
        </div>
    </div>
  </section><!-- #hero -->
<br>
</body>
</html>
