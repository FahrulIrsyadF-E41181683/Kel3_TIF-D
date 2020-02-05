<?php
session_start();
require 'functions.php';
if (isset($_POST["signin_submit"])){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT* FROM pelanggan
WHERE  NAMA_PELANGGAN ='$username' AND PASSWORD_PELANGGAN = '$password' ");


  if (mysqli_num_rows($result) === 1) {
    while($data = mysqli_fetch_assoc($result)){
              $_SESSION['ID_PELANGGAN'] = $data['ID_PELANGGAN'];
              $_SESSION['login'] = true;
              header("Location: home2.php?status=sukses");
    }
      exit ;
  }
  $error = true;
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
  <link rel="stylesheet" href="./loginstyle.css">

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
      <form action="" method="post" > 
        <div id="login-box">
          <div class="right">
            <!-- <h1>Sign In</h1> -->
           
            <span class="ketlogin"> Masuk </span>
            <br>
            <br>
            <br>
            <!-- <h1>Sign In</h1> -->
            <?php if(isset($error)) : ?>

            <p style= "color: red; font-style : italic;">nama pengguna/kata sandi salah<p>

            <?php endif; ?> 
            <input type="text" name="username" placeholder="nama pengguna" required autocomplete="off" autofocus />
            <input type="password" name="password" placeholder="kata sandi" required autocomplete="off" />
            <br>
            
            <input type="submit" name="signin_submit" value="Masuk" />
            <br> <br> <br> <br>
            <hr>
            <span class="lupa"><a href="forget.php"> Lupa Kata Sandi?</a></span>
          </div>
  
          
        
          <div class="left">
              <span class="loginwith">Selamat Datang!</span>
              <button class="social-signin facebook"  onclick="window.location.href = 'homesignup.php';"> Daftar  </button>
         </div>
        
        </div>
        <form>
      
    </div>
  </section><!-- #hero -->
<br>

</body>
</html>
