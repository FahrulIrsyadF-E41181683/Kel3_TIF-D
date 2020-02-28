<?php include 'koneksi.php';
session_start();
$dt = $_POST['rowid'];
$st = $_SESSION['ID_PELANGGAN'];
?>                


              <div class="modal-body">
                  <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
              <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
              <?php
              $sql2 = mysqli_query($connect ,"SELECT B.NAMA_PELANGGAN, A.TANGGAL_TRANSAKSI, A.ID_BANK
              FROM transaksi A JOIN pelanggan B ON A.ID_PELANGGAN=B.ID_PELANGGAN
              wHERE A.ID_TRANSAKSI='$dt'");
              while($q = mysqli_fetch_array($sql2)){
                  $idb=$q['ID_BANK'];
              ?>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">ID Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $dt;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $q['NAMA_PELANGGAN'];?>">
                                        </div>
                                    </div>

                                    <?php
                                    if($idb==1){?>
                                        <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Bank</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="Bayar Di Tempat">
                                        </div>
                                    </div>
                                    <?php }else{
                                        $sqlb=mysqli_query($connect, "SELECT * FROM bank WHERE ID_BANK='$idb'");
                                        $sqlb2=mysqli_fetch_assoc($sqlb);
                                        ?>
                                        <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Bank</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $sqlb2['NAMA_BANK'] ?>">
                                        </div>
                                    </div>
                                    <?php }
                                    ?>
                                    
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $q['TANGGAL_TRANSAKSI'];?>">
                                        </div>
                                    </div>
                                        <a href="../transaksi/nota_pesanan.php?ID_TRANSAKSI=<?=$dt?>" class="float-right btn btn-success">Cetak Nota</a>

                  <?php 
                  }
                  ?>

                                </form>