<?php
    session_start();
    include 'koneksi.php';

    if(isset($_POST["new_pass"])){

      $email = $_POST['email'];
      $result = mysqli_query($connect , "SELECT*FROM pelanggan
      WHERE  EMAIL_PELANGGAN ='$email'");
    
      if (mysqli_fetch_assoc($result)) {
        $pass = $_POST["password"];
        $query = mysqli_query($connect , "UPDATE pelanggan SET PASSWORD_PELANGGAN = '$pass' WHERE EMAIL_PELANGGAN = '$email'");
        if(!$query){ exit("Error");}
        header("Location: home2.php");
      }

       echo "<script>
       alert ('Email Anda salah')
    </script>" ;
    
        // $pass = $_POST["password"];
    
      // if($count>0);
      // {
        // $query = mysqli_query($connection, "UPDATE pelanggan SET PASSWORD_PELANGGAN = '$pass' WHERE EMAIL_PELANGGAN = '$email'");
        // if(!$query){ exit("Error");}
      // header("Location: homelogin.php");
    
      // }
    //	echo "<script>
      //alert ('Email yang anda masukkan belum terdaftar pada sistem ini')
    //</script>"; 
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

  <!-- forgot password -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="forget.css">
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
          <li class=""><a href="home2.php">Kembali Halaman Utama</a></li>
          
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
          <a href="reset2.php" class="dropdown-item dropdown-menu-center masuk2"> Change Password</a>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-key fa-4x"></i></h3>
                  <h3 class="text-center">Ubah Kata Sandi?</h3>
                  <p>Masukkan Password baru dan email anda<p>
        
                  <div class="panel-body">
    
                    <form action="" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key fa-1x"></i></span>
                          <input id="email" name="password" placeholder="Kata Sandi baru" class="form-control"  type="password">
						  
                          <input id="email" name="email" placeholder="E-mail" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="new_pass" class="btn btn-lg btn-primary btn-block" value="Kirim" type="submit">
                      </div>
                      
                    
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
    </div>
  </section><!-- #hero -->

  <main id="main">

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
