<?php 
include 'koneksi.php';
    if(isset($_POST['konfirm'])){
        echo $id = $_POST['id'];

        $query1 = "SELECT * FROM transaksi WHERE ID_TRANSAKSI='".$id."'";
                                        $sql1 = mysqli_query($connect, $query1);
                                        while($data1 = mysqli_fetch_array($sql1)){
                                            $tanggal=$data1['TANGGAL_TRANSAKSI'];
                                        }

        $query = "SELECT * FROM `detail_transaksi` WHERE ID_TRANSAKSI='".$id."'";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                                <?php echo $jam[] = $data['JAM']; ?>
                                                <?php echo $nama_lap = $data['NAMA_LAPANGAN']; ?>
                                                <?php echo $tgl = $data['TANGGAL_PESANAN']; ?>
<?php } ?>
<?php
$query2 = mysqli_query ($connect , "UPDATE `transaksi` SET `STATUS_PEMBAYARAN`= 1 WHERE `ID_TRANSAKSI`='".$id."'");

                    $jumlah = count($jam);
                    for($j=0;$j<$jumlah;$j++){ //perulangan
                        $jam[$j];
                        $nama_lap;
                        echo $tgl;

                        //untuk ambil id detail jadawl do looping
        $sql = mysqli_query($connect, "SELECT * FROM detail_jadwal A JOIN lapangan B on A.ID_LAPANGAN=B.ID_LAPANGAN JOIN jam C on A.ID_JAM= C.ID_JAM 
                                    WHERE B.NAMA_LAPANGAN='".$nama_lap."' && C.JAM='".$jam[$j]."'");
        while($data2 = mysqli_fetch_assoc ($sql)){
            echo $id_dj= $data2['ID_DETAIL_JADWAL'];
        }

                    //untuk ambil id tanggal pesanan
                    $data1 = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data1))
                    {
                        $tp = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data1);
                    if($row>0){
                        $id_tp = autonumber($tp, 3, 3);
                    }else{
                        $id_tp = 'TP0001';
                    }

                    echo $tanggal;
                    $query1 = mysqli_query ($connect , "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                    VALUES ('$id_tp','$id_dj',1,'$tanggal')");
                    if($query1){
                        echo "<script>alert('Konfirmasi sukses');document.location.href='home.php?page=pesanan';</script>\n"; // Redirect ke halaman admin.php
                    }else{
                        // Jika Gagal, Lakukan :
                        echo "<script>alert('konfirmasi gagal');document.location.href='home.php?page=pesanan';</script>\n";
                    }
                    }
}?>