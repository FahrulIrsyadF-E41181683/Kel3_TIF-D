<?php
    session_start();
    include 'koneksi.php';

    // if(empty($_SESSION['login'])){
    //   echo "<script>document.location.href='../home/homelogin.php'</script>\n";
    // }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Rush Badminton</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../home/img/favicon.png" rel="icon">
  <link href="../home/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- Datepicker -->
  <link href="css/datepicker.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

      
  <script>
  $(document).ready(function(){
	$("#date").datepicker({
      format: "dd/mm/yyyy",
      useCurrent: true,
      todayBtn: "linked",
      startDate: "today",
      locale:'id',
      orientation: "bottom auto",
      enableOnReadonly: true,
	})


    $("#pesan").click(function() {
      
    });


    $(document).on("click", "input[type='checkbox']", function(){
    
    total=0;
    $("input[type='checkbox']:checked").each(function(){
        // total += parseInt($(this).val())
        total += parseInt($("#input").val())
    })
    $("input[name='total']").val(total)
})
    });
</script>

</head>

<body>

            <?php
              $st= $_SESSION['ID_PELANGGAN'];
              $sql = mysqli_query($connect, "Select * from pelanggan where ID_PELANGGAN='".$st."'");
              while($data = mysqli_fetch_array($sql)){
                $foto=$data['FOTO_PELANGGAN']; }
            ?>

<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="../home/img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Halaman Utama</a></li>
          <li><a href="../transaksi/pesananku.php?id=<?= $_SESSION['ID_PELANGGAN'];?>" height="40px">Pesananku</a></li>
          <li><a href="">cara pemesanan</a></li>

          <?php if(empty($st)){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdown " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="../home/img/user.png"  width='50px' height="40px">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item dropdown-menu-center mt-3 md-3"><img src="../home/img/user.png"  width='100px'></a>
                  <div class="dropdown-divider"></div>
                  <a href="../home/homelogin.php" class="dropdown-item dropdown-menu-center masuk2"> Masuk/Daftar </a>
                </div>
            </li>
          <?php }else{ ?>
            <a class="nav-link" id="navbarDropdown " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if(empty($foto)){ ?>
                                <img class="rounded-circle" src="../master/images/pelanggan/user.png"  width='40px' height='40px' class="rounded-circle">
                                    <?php }else{ ?>
                                <img class="rounded-circle" src="../master/images/pelanggan/<?php echo $foto;?>"  width='40px' height='40px' class="rounded-circle">
                                    <?php } ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item dropdown-menu-center mt-3 md-3"> 
                              <?php if(empty($foto)){ ?>
                                <img class="rounded-circle" src="../master/images/pelanggan/user.png"  width='100px' height='90px'>
                                    <?php }else{ ?>
                                <img class="rounded-circle" src="../master/images/pelanggan/<?php echo $foto;?>"  width='100px' height='90px'>
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
              <a href="../home/logout.php" class="dropdown-item dropdown-menu-center masuk2"> Keluar?</a>
            </div>
          <?php } ?>
        </ul>
    </div>
  </header><!-- #header -->

<!-- #header -->
<!-- input tanggal dan lapangan -->
  </header>
  <div class="modal-body bg-krem">
        <form  method="post" enctype="multipart/form-data"> 
            <div class="row">
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Tanggal</label> -->
                <input type="text" class="form-control date" name='date' id='date' placeholder="Pilih Tanggal" value="<?=isset($_POST['date']) ? $_POST['date'] : ''?>">
            </div>
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Lapangan</label> -->
                <select name="lap" id="lap" class="form-control input-defaut" onchange="changeValue(this.value)">
              <option value="">-Pilih Lapangan-</option>

                  <?php
                  $result = mysqli_query($connect, "select NAMA_LAPANGAN from lapangan");   
                  while ($options = mysqli_fetch_assoc($result)) {
                    foreach ($options as $area) {
                      $selected = @$_POST['lap'] == $area ? ' selected="selected"' : '';
                      echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
                  }}?>
                  
                  </select>
            </div>
            </div>
  </div>

  
<!--tombol cari --> 
    <div class="modal-footer ">
            <button name="cari" id="cari" class="btn btn-info">Cari</button>
    </div>

<!-- jika tombol cari ditekan -->
  <?php
  if (isset($_POST['cari'])){
    $tgl = $_POST['date'];
    $lap = $_POST['lap']; 

    if($tgl ==""){ //jika tangggal kosong
      echo "<script>alert('pilih tanggal main dulu');</script>\n";
    }else{
            if($lap ==""){ //jika lapangan kosong
              echo "<script>alert('pilih Lapangan dulu');</script>\n";
            }else{

              ?>
<!-- jika tombol cari ditekan -->

      <div class="modal-body">
      <div class="row">
      <div class="col">

<!-- Foto Lapanngan -->
    <div class="modal-body">
    
        <?php
          $query = "Select * from lapangan where NAMA_LAPANGAN='".$lap."'";
          $sql = mysqli_query($connect, $query);
          while($data = mysqli_fetch_array($sql)){
            $hg=$data['HARGA_SEWA'];
        ?>
          <img alt="" class="rounded mx-auto d-block img-thumbnail" width="600" height="400" src="../master/images/lapangan/<?php echo $data['FOTO_LAPANGAN']; ?>">
          <?php } ?>

          <!-- harga lapangan dari database -->
          <h5 class="text-center"> Harga lapangan : Rp <input value="<?php echo $hg ?>" name="input" id="input" hidden/> <?php echo $hg ?> /jam </h5>

          </div>

<!-- Foto Lapanngan -->
      </div>



      <div class="col bg-krem"> 
                <label class="col-form-label">Pilih Jam Bermain :</label><br>

                <form method='post' name="letter" >
                <div class="container2">
                <ul class="ks-cboxtags">
<!--header -->

<!-- Checkbox1 -->
            <?php
              $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0001' && B.TANGGAL_PESANAN='$tgl'");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0001'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                            <li class='opacity5'><input type="checkbox" id="jam1"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                            <label for="jam1"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                            <li ><input name="jam_pesan[]" type="checkbox" id="jam1" value="<?php echo $data['JAM']; ?>">
                            <label for="jam1"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox2 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS  
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0002' && B.TANGGAL_PESANAN='$tgl'");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0002'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                            <li class='opacity5'><input type="checkbox" id="jam2"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                            <label for="jam2"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                            <li ><input name="jam_pesan[]" type="checkbox" id="jam2" value="<?php echo $data['JAM']; ?>">
                            <label for="jam2"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox3 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS  
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0003' && B.TANGGAL_PESANAN='$tgl'");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0003'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                <li class='opacity5'><input type="checkbox" id="jam3"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                              <label for="jam3"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam3" value="<?php echo $data['JAM']; ?>">
                                <label for="jam3"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox4 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0004' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0004'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam4"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam4"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam4" value="<?php echo $data['JAM']; ?>">
                                <label for="jam4"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox5 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0005' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0005'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam5"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam5"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam5" value="<?php echo $data['JAM']; ?>">
                                <label for="jam5"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox6 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0006' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0006'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam6"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam6"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam6" value="<?php echo $data['JAM']; ?>">
                                <label for="jam6"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox7 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0007' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0007'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam7"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam7"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam7" value="<?php echo $data['JAM']; ?>">
                                <label for="jam7"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox8 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0008' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0008'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam8"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam8"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam8" value="<?php echo $data['JAM']; ?>">
                                <label for="jam8"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox9 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0009' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0009'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam9"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam9"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam9" value="<?php echo $data['JAM']; ?>">
                                <label for="jam9"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox10 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0010' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0010'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam10"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam10"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam10" value="<?php echo $data['JAM']; ?>">
                                <label for="jam10"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox11 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0011' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0011'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam11"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam11"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam11" value="<?php echo $data['JAM']; ?>">
                                <label for="jam11"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox12 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0012' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0012'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam12"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam12"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam12" value="<?php echo $data['JAM']; ?>">
                                <label for="jam12"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox13 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0013' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0013'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam13"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam13"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam13" value="<?php echo $data['JAM']; ?>">
                                <label for="jam13"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox14 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0014' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0014'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam14"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam14"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam14" value="<?php echo $data['JAM']; ?>">
                                <label for="jam14"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
<!-- Checkbox15 -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN, B.STATUS 
            FROM detail_jadwal A JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = B.ID_DETAIL_JADWAL JOIN lapangan C 
            on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE C.NAMA_LAPANGAN='$lap'&& A.ID_JAM='JM0015' && B.TANGGAL_PESANAN='$tgl' ");

            while($data = mysqli_fetch_assoc($sql1)){
              $st= $data['STATUS'];
            } ?>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT JAM FROM jam WHERE ID_JAM='JM0015'");
                        if($st==1){
                          while($data = mysqli_fetch_assoc($sql)){ ?>
                                
                                <li class='opacity5'><input type="checkbox" id="jam15"  value="<?php echo $data['JAM']; ?>"  disabled = true >
                                <label for="jam15"><?php echo $data['JAM']; ?></label></li>
                        <?php }} else {
                          while($data = mysqli_fetch_assoc($sql)){?>
                                <li ><input name="jam_pesan[]" type="checkbox" id="jam15" value="<?php echo $data['JAM']; ?>">
                                <label for="jam15"><?php echo $data['JAM']; ?></label></li>
                        <?php }}
                      ?>
            </ul>


<!-- tombol pesan dan harga total -->
            <div class="container">
                  <div class="row">
                    <div class="col">
                      <!-- 1 of 2 -->
                    </div>
                    <div class="col">
                      <!-- 2 of 2 -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <!-- 1 of 3 -->
                    </div>
                    <div class="col">
                      <!-- 2 of 3 -->
                    </div>
                    <div class="col">
                    <h5>Harga Total :  <input Readonly type="text" name="total" class="form-control input-defaut size-total"/> </h5>
                    </div>
                  </div>
                </div>
            
            <br>
            <button name="pesan" id="pesan" class="btn bg-orange btn-lg btn-block text-white pesan" >Pesan</button>
                      
            </div>
<!-- tombol pesan dan harga total -->

</form>
  </div>
  </div>
</div>
<?php }}} ?>

<!-- jika tombol pesan ditekan -->
    <?php
      if (isset($_POST["pesan"])){

            if(empty($st)){
              echo "<script>document.location.href='../home/homelogin.php'</script>\n";
          }

          $_SESSION['lap'] = $_POST['lap'];
          $_SESSION['tgl_main'] = $_POST['date'];
          $_SESSION['id_pl'] = $st;
          $_SESSION['total'] = $_POST['total'];
          $_SESSION['jam_pesan'] = $_POST["jam_pesan"];
            
            echo "<script> document.location='pilih_metode.php'; </script>";
      } ?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>