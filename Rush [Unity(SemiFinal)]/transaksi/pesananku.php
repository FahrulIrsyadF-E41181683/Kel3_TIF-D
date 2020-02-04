<!-- HEADER -->
<?php require 'koneksi.php';
    session_start();
    //error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesananku</title>

      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

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
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="../home/home2.php">Halaman Utama</a></li>
        </ul>
    </div>
  </header>

    
</body>

  <form>
<br>
<h3 class="text-center">PESANANKU</h3>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Tanggal pesan</th> 
                    <th scope="col">Metode</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  // include 'koneksi.php';
                  $no = 1;
                  $st = $_SESSION['ID_PELANGGAN'];
                  // $tr = $_GET['ID_TRANSAKSI'];
                  $data = mysqli_query($connect,"SELECT transaksi.ID_TRANSAKSI, ID_BANK, TANGGAL_TRANSAKSI, STATUS_PEMBAYARAN FROM transaksi
                  WHERE ID_PELANGGAN='".$st."'");
                  while($d = mysqli_fetch_array($data)){
                ?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $d['ID_TRANSAKSI']; ?></td>
                    <td><?= $d['TANGGAL_TRANSAKSI']; ?></td>
                    <td><?php
                    if($d['ID_BANK']==1){
                      echo "Bayar Di Tempat";
                    }else{
                      echo "Transfer Bank";
                    }
                    ?></td>
                    <td>
                    <?php 
                    $tr=$d['ID_TRANSAKSI'];
                    if($d['STATUS_PEMBAYARAN']==0){?>
                    <button href="#" data-target="#Mykonfirmasi<?php echo $d['ID_TRANSAKSI']; ?>" data-toggle="modal" type="button" class="btn btn-primary">
                        Konfirmasi Pembayaran</button>
                    <?php }else {
                    echo ' <a href="#" class="btn btn-success">Lunas</a>';
                    }
                    ?></td>
                    <td>
                            <button href="#" data-target="#Mydetail<?php echo $d['ID_TRANSAKSI']; ?>" data-toggle='modal' type="button" class="btn btn-info">
                                Detail Pesanan
                            </button>
                    </td>
                  </tr>
                  </form>

<!-- modal konfirmasi -->
    <div class="modal fade" id="Mykonfirmasi<?php echo $d['ID_TRANSAKSI']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                

              <div class="modal-body">
                  <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
              <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                            <?php
                                // include 'koneksi.php';
                                // $st = $_GET['id'];
                                // $tr= $_GET['ID_TRANSAKSI'];
                                $sql2 = mysqli_query($connect ,"SELECT NAMA_PELANGGAN, NAMA_BANK, TANGGAL_TRANSAKSI 
                                FROM transaksi A JOIN pelanggan B ON A.ID_PELANGGAN=B.ID_PELANGGAN JOIN bank C ON A.ID_BANK=C.ID_BANK WHERE B.ID_PELANGGAN='$st' and A.ID_TRANSAKSI='$tr'");
                                
                                while($konfir = mysqli_fetch_array($sql2)){
                            ?>

                                    <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2">ID Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="" value="<?php echo $tr;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">Nama Pelanggan</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="" value="<?php echo $konfir['NAMA_PELANGGAN'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">Bank</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="" value="<?php echo $konfir['NAMA_BANK'];?>">
                                        </div>
                                    </div>
                                    <div class="custom-file">
                                        <label class="col-form-label">Upload Bukti Bayar</label>
                                        <input type="file" name="foto" class="form-control input-default">                                            
                                    </div>
                                    <!-- <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Lapangan</th>
                                                <th>Nama Lapangan</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                        // include 'koneksi.php';
                                        // $no = 1;
                                        // $data = mysqli_query($connect,"select * from lapangan");
                                        // while($d = mysqli_fetch_array($data)){
                                        //     ?>
                                        //     <tr>
                                        //         <td><?php echo $no++; ?></td>
                                        //         <td><?php echo $d['ID_LAPANGAN']; ?></td>
                                        //         <td><?php echo $d['NAMA_LAPANGAN']; ?></td>
                                        //         <td><?php echo $d['HARGA_SEWA']; ?></td>
                                            </tr>
                                            <?php 
                                        //}
                                        ?>
                                        </tbody> -->
                                        <button type="submit" name="ubahfoto" class="float-right mt-4 btn btn-info">Konfirmasi</button>

                                </form>
                                
                                

                                <?php } ?>

                </tbody>
              </table>


                </div>

              <?php ?>
                </div>
            </div>
        </div>
<!-- modal konfirmasi -->
<!-- modal detail -->
    <div class="modal fade" id="Mydetail<?php echo $d['ID_TRANSAKSI']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                

              <div class="modal-body">
                  <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
              <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
              <?php
              
              //$id = $_GET['tr'];
              //$tr= $_GET['ID_TRANSAKSI'];
              $sql2 = mysqli_query($connect ,"SELECT NAMA_PELANGGAN, NAMA_BANK, TANGGAL_TRANSAKSI, 
              FROM transaksi A JOIN pelanggan B ON A.ID_PELANGGAN=B.ID_PELANGGAN JOIN bank C ON A.ID_BANK=C.ID_BANK 
              WHERE B.ID_PELANGGAN='$st' and A.ID_TRANSAKSI='$tr'");
              while($q = mysqli_fetch_array($sql2)){
              ?>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">ID Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $tr;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $q['NAMA_PELANGGAN'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Bank</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $q['NAMA_BANK'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $q['TANGGAL_TRANSAKSI'];?>">
                                        </div>
                                    </div>
                                        <a href="../transaksi/nota_pesanan.php?ID_TRANSAKSI=<?=$tr?>" class="float-right btn btn-success">Cetak Nota</a>

                                </form>
                  <?php 
                  }
                  ?>

                </tbody>
              </table>


                </div>

              <?php } ?>
                </div>
            </div>
        </div>
<!-- ubah modal -->

<?php 
                                //include "koneksi.php" ;

  if(isset($_POST['ubahfoto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
    // Ambil data foto yang dipilih dari form
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;
    
    // Set path folder tempat menyimpan fotonya
    $path = "images/bukti/".$fotobaru;

    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Query untuk menampilkan data 
      $query = "SELECT * FROM 'transaksi' WHERE ID_PELANGGAN='".$st."'";
      $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
      $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

      // Cek apakah file foto sebelumnya ada di folder images
      if(is_file("images/bukti/".$data['BUKTI_PEMBAYARAN'])) // Jika foto ada
        unlink("images/bukti/".$data['BUKTI_PEMBAYARAN']); // Hapus file foto sebelumnya yang ada di folder images
      
      // Proses ubah data ke Database
      $query = "UPDATE `transaksi` SET BUKTI_PEMBAYARAN='".$fotobaru."' WHERE ID_PELANGGAN='".$st."'";
      $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        echo "<script>alert('Bukti Pembayaran Berhasil Diupload');window.location='../home/home2.php'</script>\n"; // Redirect ke halaman home.php
      }else{
        // Jika Gagal, Lakukan :
        echo "<script>alert('Bukti Pembayaran Gagal Diupload');window.location='../home/home2.php'</script>\n";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
        echo "<script>alert('Gagal menyimpan foto');window.location='../home/home2.php'</script>\n";
        }
    }
      
  
    ?>

    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    
    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script>

    <script src="./js/dashboard/dashboard-1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
</html>