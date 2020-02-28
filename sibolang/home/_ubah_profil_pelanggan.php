<?php
session_start();
require 'koneksi.php';
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
          <li class=""><a href="home1.php">Halaman Utama</a></li>
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
  <body class="h-100">

<?php //ambil data admin di database
    $sql = mysqli_query($connect, "Select * from pelanggan where ID_PELANGGAN='".$_SESSION['ID_PELANGGAN']."'");
    while($data = mysqli_fetch_array($sql)){
            $foto=$data['FOTO_PELANGGAN'];
?>
                        <a class="text-center" href="#"> <h4>Profil</h4></a>
                        <form action="_ubah_profil.php" method="POST" class="mt-5 mb-5" enctype="multipart/form-data">
                            
                        <input type="hidden" name="id" value="<?php echo $data['ID_PELANGGAN'];?>">
                        <div class="container">
                            <div class="row">
                        <div class="col-sm">
                        
                                    <div class="input-group mb-3 gambar-ganti">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto">
                                <label  for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">    

                                        <?php if(empty($foto)){ ?>
                                        <img class="bulat gambar1" src="../master/images/avatar/admin.png"  width='200px' height='200px'>
                                            <?php }else{ ?>
                                        <img class="bulat gambar1" src="../master/images/pelanggan/<?php echo $foto;?>"  width='200px' height='200px'>
                                            <?php } ?>
                                        <img class="bulat gambar2" src="../master/images/gantifoto.png"  width='200px' height='200px'>
                                        
                                        
                                </label>  
                                </div>
                                <img class height="200px">
                                <br>
                                <input class="mb-3" type="checkbox" name="ubahfoto">Ubah Foto?
                        </div>
                        <div class="col-sm-7">
                            <label class="col-form-label">Nama Admin</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="Nama Admin" name="nm_admin" value="<?php echo $data['NAMA_PELANGGAN'];?>">
                                </div>
                                    <label class="col-form-label">Password</label>
                                <div class="form-group">
                                    <input type="text" class="form-control input-default"  placeholder="Password" name="password" value="<?php echo $data['PASSWORD_PELANGGAN'];?>">
                                </div>
                            </div>
                        </div>
                                

                        <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            <label class="form-group">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                                <option><?php echo $data['JENIS_KELAMIN'];?></option>
                                                <option name="lk">Laki-laki</option>
                                                <option name="pr">Perempuan</option>
                                            </select> <br>
                                        <label class="col-form-label">Alamat</label>
                                    <div class="form-group">
                                        <input type="text-area" class="form-control"  placeholder="Alamat" name="alamat"  value="<?php echo $data['ALAMAT_PELANGGAN'];?>" required>
                                    </div>

                            </div>
                            <div class="col-sm">

                            <label class="col-form-label">No Hp</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="No Hp" name="nohp" maxlength="13" minlength="11"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $data['NOTLP_PELANGGAN'];?>" required>
                                    </div>
                                        <label class="col-form-label">Email</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Email" name="email"  value="<?php echo $data['EMAIL_PELANGGAN'];?>" required>
                                    </div>

                            </div>
                        </div>
                                <button class="btn login-form__btn submit w-100" name="simpan">Simpan Perubahan</button>
                            </form>
                            <?php } ?>
  </section><!-- #hero -->
<br>

</body>
</html>
