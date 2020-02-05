
  <?php //ambil data admin di database
  session_start();
	include "function.php";

    $id = $_SESSION['ID_PELANGGAN'];
              $sql = mysqli_query($conn, "Select * from pelanggan where ID_PELANGGAN='$id'");
            while($data = mysqli_fetch_array($sql)){
                $foto= $data['FOTO_PELANGGAN'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rush Badminton</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="nyoba1.css">



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
     
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="home2.php">Kembali kehalaman utama</a></li>
      
        </ul>
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <form action="ubahup.php" method="post" enctype="multipart/form-data" >
        <div id="login-box">
          <div class="left">
          <span class="ketsignup">PROFIL</span>
          <br>
          <br>
          <br>
          
          <input type="hidden" name="id" value="<?php echo $data['ID_PELANGGAN'];?>">
          <input type="text" name="username" placeholder="Nama Pengguna" value="<?php echo $data['NAMA_PELANGGAN'];?>"required autocomplete="off" autofocus/>
          <input type="text" name="jeniskelamin" placeholder="Jenis kelamin" value="<?php echo $data['JENIS_KELAMIN'];?>" required autocomplete="off"/>
          <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $data['ALAMAT_PELANGGAN'];?>" required autocomplete="off"/> 
          <input type="email" name="email" placeholder="E-mail" value="<?php echo $data['EMAIL_PELANGGAN'];?>" required autocomplete="off"/> 
          
          <p> 
          <input type="text" name="notelepon" maxlength="13" 
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="No Telepon" value="<?php echo $data['NOTLP_PELANGGAN'];?>" autocomplete="off" >
         
  

          
          <input type="password" name="password" placeholder="Kata Sandi" value="<?php echo $data['PASSWORD_PELANGGAN'];?>" required autocomplete="off"/>
    
          <!-- <input type="file" name="foto" class="photo"value="<?php echo $data['FOTO_PELANGGAN'];?>" required />   -->
          <input type="submit" name="signup_submit" value="Ubah" />
          <br>
          <hr>
            <span class="profil"> Untuk ubah foto, klik bagian foto untuk merubah foto, lalu centang "ubah foto?"!</span>
        
  
          </div>
          
          <div class="right">
          <div class="input-group mb-3 gambar-ganti">
                                         
                                         <br>
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto">
                                      <br><br><br><br>
                                      
                                    <label  for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">    

                                            <?php if(empty($foto)){ ?>
                                            <img class="bulat" src="../master/images/pelanggan/user.png"  width='200px' height='200px'>
                                                <?php }else{ ?>
                                            <img class="bulat" src="../master/images/pelanggan/<?php echo $foto;?>" width='200px' height='200px'>
                                                <?php } ?>
                                          
                                            
                                            
                                    </label>  
                                    </div>
                                    <img class height="18px">
                          
                                    <input class="mb-3" type="checkbox" name="ubahfoto">Ubah Foto?
                            </div>l
                            
            
          </div>
            </div>

          </div>
        </div>
       <form>
       <?php } ?>
    </div>
  </section><!-- #hero -->
<br>
</body>
</html>
