<?php include 'koneksi.php';
session_start();
$dt = $_POST['rowid'];
$st = $_SESSION['ID_PELANGGAN'];
?>

<div class="modal-body">
 
                  <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
                            <?php
                                // include 'koneksi.php';
                                //$st = $_SESSION['ID_PELANGGAN'];
                                //$tr= $_GET['ID_TRANSAKSI'];
                                $sql2 = mysqli_query($connect ,"SELECT B.NAMA_PELANGGAN, A.ID_BANK, A.TANGGAL_TRANSAKSI 
                                FROM transaksi A JOIN pelanggan B ON A.ID_PELANGGAN=B.ID_PELANGGAN WHERE B.ID_PELANGGAN='$st' and A.ID_TRANSAKSI='$dt'");
                                
                                while($konfir = mysqli_fetch_array($sql2)){
                                $idb=$konfir['ID_BANK'];
                            ?>
                            <form action="_upload_bukti_pembayaran.php" method="post" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $st ?>" name="id">
                                    <div class="form-group row">
                                        <label class="col-sm-2">ID Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="" name= 'idtransaksi' value="<?php echo $dt;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">Nama Pelanggan</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="" value="<?php echo $konfir['NAMA_PELANGGAN'];?>">
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
                                    <div class="custom-file">
                                        <label class="col-form-label">Upload Bukti Bayar</label>
                                        <input type="file" name="foto" class="form-control input-default">                                         
                                    </div>
                                        <button type="submit" name="ubahfoto" class="float-right mt-4 btn btn-info" value="ass">Konfirmasi</button>
                                </form>
                                <?php } ?>

</div>


<script type="text/javascript">
    </script>


<?php 
?>