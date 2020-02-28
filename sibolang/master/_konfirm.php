<?php
    include 'koneksi.php';
    $id = $_POST['rowid'];

//jam sekarang
    ini_set('date.timezone', 'Asia/Jakarta');
    date_default_timezone_get();
    
    $date = new DateTime( date('H:i:s'));
    date_add($date, date_interval_create_from_date_string('-7 hours'));
    $waktu_sekarang = date_format($date, 'H:i:s'); 


    $query = "SELECT * FROM `transaksi` WHERE `ID_TRANSAKSI`='".$id."'";
        $sql = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($sql)){
            $waktu_habis=$data['WAKTU_HABIS'];
//jam sekarang
?>

        <?php if(($data['BUKTI_PEMBAYARAN'])==0){?>
            <img alt="" class="img-thumbnail rounded mx-auto d-block" width="400" src="images/bukti/BELUM MEMBAYAR.jpg">
        <?php }else{ ?>
        <img alt="" class="img-thumbnail rounded mx-auto d-block" width="400" src="images/bukti/<?php echo $data['BUKTI_PEMBAYARAN']; ?>"></<img>
        <?php }} ?>
        <div class="text-center">Sisa Waktu Pembayaran <br><h5 id="timer"></h5></div>

<form method="POST" action="konfirm_button.php">
<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>JAM</th>
                                                <th>LAPANGAN</th>
                                                <th>TANGGAL PESAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "SELECT * FROM `detail_transaksi` WHERE ID_TRANSAKSI='".$id."'";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                            $jamjam=$data['JAM'];
                                        ?>
                                            <tr>
                                                <td><?php echo $jam[] = $data['JAM']; ?></td>
                                                <td><?php echo $nama_lap[] = $data['NAMA_LAPANGAN']; ?></td>
                                                <td><?php echo $tgl = $data['TANGGAL_PESANAN']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                    <input name="id" type="hidden" value="<?php echo $id; ?>">;
                                        <?php
                                        $sql1 = mysqli_query($connect, "SELECT * FROM transaksi WHERE ID_TRANSAKSI='".$id."'");
                                        while($data1 = mysqli_fetch_array($sql1)){
                                            $bukti=$data1['BUKTI_PEMBAYARAN'];
                                            $status=$data1['STATUS_PEMBAYARAN'];
                                            $idbank=$data1['ID_BANK'];
                                        }

                                        if(empty( $jamjam)){?>
                                    <button name="konfirm" class="btn btn-primary mb-2 mt-3" disabled> Konfirmasi </button> 
                                        <br>*detail pesanan kosong
                                        <?php }else if($idbank==1){ ?>
                                            <button name="konfirm" class="btn btn-primary mb-2 mt-3"> Konfirmasi </button> 
                                            <br>*pastikan pelanggan sudah membayar langsung
                                        <?php }else if($bukti=='BELUM MEMBAYAR'){?>
                                            <button name="konfirm" class="btn btn-primary mb-2 mt-3" disabled> Konfirmasi </button> 
                                            <br>*pelanggan belum melakukan pembayaran
                                        <?php }else if($status==1){?>
                                                <button name="konfirm" class="btn btn-primary mb-2 mt-3" disabled> Konfirmasi </button> 
                                                <br>*sudah dilakukan konfirmasi
                                        <?php }else{ ?>
                                            <input name="konfirm" class="btn btn-primary mb-2 mt-3" type="submit" value="Konfirmasi">
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</form>

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