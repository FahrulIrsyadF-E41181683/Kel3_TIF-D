
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
                                        include 'koneksi.php';
                                        $id = $_POST['rowid'];
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
                                        while($data1 = mysqli_fetch_array($sql1)){$bukti=$data1['BUKTI_PEMBAYARAN'];$status=$data1['STATUS_PEMBAYARAN'];}

                                        if(empty( $jamjam)){?>
                                    <button name="konfirm" class="btn btn-primary mb-2 mt-3" disabled> Konfirmasi </button> 
                                        <br>*detail pesanan kosong
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

<?php 
    if(isset($_POST['konfirm'])){
        
        echo "<script>alert('hidupmu');</script>\n";
    }
    ?>