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
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="../home/home2.php">Halaman Utama</a></li>
        </ul>
    </div>
  </header>
    
</body>

<!-- ajax ubah jam -->
<!-- <script type="text/javascript">
        $(document).ready(function(){
            $('.detail').click(function(){
                var rowid = $(this).attr('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'detail_pesanan.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.detail-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script> -->
<!-- ajax ubah jam -->

<!-- ubah modal -->
    <div class="modal fade" id="modaldetail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
              <?php
              // include 'koneksi.php';

              // $id = $_GET['id'];
              // $query1 = "Select * from transaksi WHERE ID_TRANSAKSI='".$id."'";
              // $sql = mysqli_query($connect, $query1);
              // while($data = mysqli_fetch_array($sql)){
              ?>

              <div class="modal-body">
                  <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
              <form action="" method="POST" class="mb-5 login-input" enctype="multipart/form-data">
                  <h4 class="text-center text-dark">Jam</h4>
                  <label class="col-form-label">ID Jam</label>
                  <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="text" class="form-control" value="<?php echo $id; ?>" disabled>
                  </div>
                  <label class="col-form-label">Jam</label>
                  <div class="input-group form-group border-bottom border-dark ">
                          <input type="text" class="form-control input-default"  placeholder="Jam" name="jam" value="<?php echo $data['JAM'];?>">
                          <div class="input-group-prepend"><i class="fa fa-pencil mt-4"></i></div>
                  </div><br>

                </form>
                </div>

              <?php  ?>
                </div>
            </div>
        </div>
<!-- ubah modal -->

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
                  include 'koneksi.php';
                  $no = 1;
                  $st = $_GET['id'];
                  //$tr = $_GET['ID_TRANSAKSI'];
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
                    if($d['STATUS_PEMBAYARAN']==0){
                    echo " <a href='../master/konfirmasi.php?id=$st&ID_TRANSAKSI=$tr' class='btn btn-warning'>Belum Lunas</a>";
                    }else {
                    echo ' <a href="#" class="btn btn-success">Lunas</a>';
                    }
                    ?></td>
                    <td>
                            <button href="#" data-target="#modaldetail" data-toggle='modal' type="button" class="btn btn-primary">
                                Detail Pesanan
                            </button>
                    </td>
                  </tr>
                  <?php 
                  }
                  ?>

                </tbody>
              </table>



</form>
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