<!-- HEADER -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesananku</title>

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
</head>
<body>
        <header id="header">
                <div class="container">
            
                  <div id="logo" class="pull-left">
                    <a href="../home/home2.php"><img src="img/logo.png" alt="" title="" /></img></a>
                  </div>
            
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="../home/home2.php"><strong>Halaman Utama</a></li>
                      <li><a href="#">Pesananku</a></li>
                    </ul>
                </div>
              </header><!-- #header -->
    
</body>
<form>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Tanggal pesan</th> 
                    <th scope="col">Harga Total</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  include 'koneksi.php';
                  $no = 1;
                  $st = $_GET['id'];
                  $data = mysqli_query($connect,"SELECT NAMA_LAPANGAN, HARGA_TOTAL, TANGGAL_TRANSAKSI, STATUS_PEMBAYARAN FROM transaksi, detail_transaksi
                  WHERE transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI and ID_PELANGGAN='".$st."'");
                  while($d = mysqli_fetch_array($data)){
                ?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><a href="#"></a><?php echo $d['NAMA_LAPANGAN']; ?></td>
                    <td><?= $d['TANGGAL_TRANSAKSI']; ?></td>
                    <td><?php echo $d['HARGA_TOTAL']; ?></td>
                    <td><?php 
                    
                    if($d['STATUS_PEMBAYARAN']==0){
                    echo ' <button type="button" class="btn btn-warning">Belum Lunas</button>';
                    }else {
                      echo ' <button type="button" class="btn btn-success">Lunas</button>';
                    }
                    ?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                </tbody>
              </table>

</form>
</html>