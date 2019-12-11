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
        <form  method="post" enctype="multipart/form-data"> 
            <div class="row">
            <div class="form-group col col-md-6 ml-auto">
                <label class="col-form-label">Pilih Tanggal</label>
                &nbsp;
                  <input type="date" id="datepicker" class="form-control">
            </div>
            <div class="form-group col col-md-6 ml-auto">
                <label class="col-form-label">Pilih Lapangan</label>
                <select name="nim" id="nim" class="form-control input-defaut" onchange="changeValue(this.value)">
              <option value=0>-Pilih Lapangan-</option>

              <?php
                  $result = mysqli_query($connect, "select * from lapangan");   
                  $jsArray = "var dtMhs = new Array();\n";       
                  while ($row = mysqli_fetch_array($result)) {   
                      echo '<option value="' . $row['NAMA_LAPANGAN'] . '">' . $row['NAMA_LAPANGAN'] . '</option>';
                  }?> 
                  </select>
            </div>
            </div>
</div>

<div class="modal-footer ">
        <button name="cari" class="btn btn-info">Cari</button>
</div>

        
        <?php
        if (isset($_POST['cari'])){
          $id = $_POST['nim']; ?>
  <div class="modal-body">
  <div class="row">
  <div class="col">
              <?php
              $query = "Select * from lapangan where NAMA_LAPANGAN='".$id."'";
              $sql = mysqli_query($connect, $query);
              while($data = mysqli_fetch_array($sql)){
              ?>
              <img alt="" class="" width="600" src="img/lapangan/<?php echo $data['FOTO_LAPANGAN']; ?>">
              <?php } ?>
  </div>
  <div class="col"> 
            <label class="col-form-label">Pilih Jam :</label><br>

            <form method='post' name="letter" >
            <div class="container">
            <ul class="ks-cboxtags">
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0001'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam1" value="<?php echo $data['JAM']; ?>"><label for="jam1"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0002'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam2" value="<?php echo $data['JAM']; ?>"><label for="jam2"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0003'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam3" value="<?php echo $data['JAM']; ?>"><label for="jam3"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0004'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam4" value="<?php echo $data['JAM']; ?>"><label for="jam4"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0005'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                  <li><input type="checkbox" id="jam5" value="<?php echo $data['JAM']; ?>"><label for="jam5"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0006'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam6" value="<?php echo $data['JAM']; ?>"><label for="jam6"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0007'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam7" value="<?php echo $data['JAM']; ?>"><label for="jam7"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0008'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam8" value="<?php echo $data['JAM']; ?>"><label for="jam8"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0009'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam9" value="<?php echo $data['JAM']; ?>"><label for="jam9"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0010'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam10" value="<?php echo $data['JAM']; ?>"><label for="jam10"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0011'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam11" value="<?php echo $data['JAM']; ?>"><label for="jam11"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0012'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam12" value="<?php echo $data['JAM']; ?>"><label for="jam12"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0013'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam13" value="<?php echo $data['JAM']; ?>"><label for="jam13"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0014'");
              while($data = mysqli_fetch_assoc($sql)){?> 
                    <li><input type="checkbox" id="jam14" value="<?php echo $data['JAM']; ?>"><label for="jam14"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            <?php
              $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JD0015'");
              while($data = mysqli_fetch_assoc($sql)){?>
                    <li><input type="checkbox" id="jam15" value="<?php echo $data['JAM']; ?>"><label for="jam15"><?php echo $data['JAM']; ?></label></li>
            <?php } ?>
            </ul>
            </div>
            </form>

   </div>
  </div>
</div>
<?php } ?>

<?php
  if(isset($_POST['simpan'])){
    $jam1 = $_POST['jam1'] ?>

 <?php } ?>

</body>
</html>