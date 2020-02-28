<?php include 'koneksi.php';
session_start();
$dt = $_POST['rowid'];
$st = $_SESSION['ID_PELANGGAN'];
?>

<?php
//jam sekarang
    ini_set('date.timezone', 'Asia/Jakarta');
    date_default_timezone_get();
    
    $date = new DateTime( date('H:i:s'));
    date_add($date, date_interval_create_from_date_string('-7 hours'));
    echo $waktu_sekarang = date_format($date, 'H:i:s'); 

    $query = "SELECT * FROM `transaksi` WHERE `ID_TRANSAKSI`='".$dt."'";
    $sql = mysqli_query($connect, $query);
    while($data = mysqli_fetch_array($sql)){
        echo $waktu_habis=$data['WAKTU_HABIS'];
    }
//jam sekarang
?>
<div class="modal-body">
<div class="text-center">Sisa Waktu Pembayaran <br><h1 id="timer"></h1></div>
<h6 class="text-center font-italic">(sebelum pukul : <?php echo $waktu_habis ?>)</h6>

 
                  <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
                            <?php
                                // include 'koneksi.php';
                                //$st = $_SESSION['ID_PELANGGAN'];
                                //$tr= $_GET['ID_TRANSAKSI'];
                                $sql2 = mysqli_query($connect ,"SELECT B.NAMA_PELANGGAN, A.ID_BANK, A.TANGGAL_TRANSAKSI, A.HARGA_TOTAL
                                FROM transaksi A JOIN pelanggan B ON A.ID_PELANGGAN=B.ID_PELANGGAN WHERE B.ID_PELANGGAN='$st' and A.ID_TRANSAKSI='$dt'");
                                
                                while($konfir = mysqli_fetch_array($sql2)){
                                $idb=$konfir['ID_BANK'];
                            ?>
                            <form action="_upload_bukti_pembayaran.php" method="post" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $st ?>" name="id">
                                    <div class="form-group row">
                                        <label class="col-sm-5 text-right mt-1">ID Transaksi :</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control" id="" name= 'idtransaksi' value="<?php echo $dt;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 mt-1 text-right">Nama Pelanggan :</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control" id="" value="<?php echo $konfir['NAMA_PELANGGAN'];?>">
                                        </div>
                                    </div>
                                    <?php
                                    if($idb==1){?>
                                        <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label mt-1 text-right">Bank :</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="Bayar Di Tempat">
                                        </div>
                                    </div>
                                    <?php }else{
                                        $sqlb=mysqli_query($connect, "SELECT * FROM bank WHERE ID_BANK='$idb'");
                                        $sqlb2=mysqli_fetch_assoc($sqlb);
                                        ?>
                                        <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label mt-1 text-right">Bank :</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $sqlb2['NAMA_BANK'] ?>">
                                        </div>
                                    </div>
                                    <?php }
                                    ?>
                                    <div class="form-group row">
                                        <h6 class="col-sm-12 mt-1 text-center">Jumlah yang harus dibayar</h6>
                                        <h3 class="col-sm-12 mt-1 text-center text-danger text-bold"><u>Rp <?php echo $konfir['HARGA_TOTAL'] ?></u></h3><tr>
                                    </div>

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


<!-- untuk timer countdown -->
<?php
            $waktu_awal=strtotime($waktu_sekarang);
            $waktu_akhir=strtotime($waktu_habis);

            if($waktu_awal>=$waktu_akhir){
                $waktu_awal=$waktu_akhir;
            }

            $diff    =$waktu_akhir - $waktu_awal; ?> <br> <?php

                    //membagi detik menjadi jam
                    $jam    =floor($diff / (60 * 60));?> <br> <?php
                    //membagi sisa detik setelah dikurangi $jam menjadi menit
                    $menit    =$diff - $jam * (60 * 60);
                    $menit2 = floor( $menit / 60 );
                    $menit3  = (($jam *60)+$menit2 );
                    ?>

                        <script>
                        var menit=<?= $menit3 ?>;

                            document.getElementById('timer').innerHTML =
                            menit + ":" + 0;
                            startTimer();
                            function startTimer() {
                                var presentTime = document.getElementById('timer').innerHTML;
                                var timeArray = presentTime.split(/[:]+/);
                                var m = timeArray[0];
                                var s = checkSecond((timeArray[1] - 1)); //detik

                                    if(s==59){
                                        m=m-1
                                        }
                                    if(m<0){
                                        clearstartTimer();
                                        }

                                    document.getElementById('timer').innerHTML =
                                        m + ":" + s;
                                    setTimeout(startTimer, 1000);
                            }
                            function checkSecond(sec) {
                            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                            if (sec < 0) {sec = "59"};
                            return sec;
                            }
                        </script>
<!-- untuk timer countdown -->