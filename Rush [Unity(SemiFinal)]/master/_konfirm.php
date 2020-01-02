<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfirm</title>
    <?php include 'koneksi.php' ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<br><br>

<form method="POST">
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
                                        $id = $_GET['id'];
                                        $query = "SELECT * FROM `detail_transaksi` WHERE ID_TRANSAKSI='".$id."'";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $jam[] = $data['JAM']; ?></td>
                                                <td><?php echo $nama_lap[] = $data['NAMA_LAPANGAN']; ?></td>
                                                <td><?php echo $tgl = $data['TANGGAL_PESANAN']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- tombol konfirmasi -->
                                        <div class="row">
                                            <div class="col col-lg-6">
                                            <!-- 1 of 3 -->
                                            </div>
                                            <div class="col col-lg-4">
                                            <!-- 2 of 3 -->
                                            </div>
                                            <div class="col">
                                            <button name="konfirm" class="btn btn-primary mb-2 mt-3"> Konfirmasi </button>
                                            </div>
                                        </div>
<!-- tombol konfirmasi -->
</form>

<?php 
    if(isset($_POST['konfirm'])){
        $query2 = mysqli_query ($connect , "UPDATE `transaksi` SET `STATUS_PEMBAYARAN`= 1 WHERE `ID_TRANSAKSI`='".$id."'");
    
        // echo "<script>alert('silakan cek ulang');</script>\n";

                    $jumlah = count($jam);
                                                    
                    for($j=0;$j<3;$j++){ //perulangan
                        $jam[$j];
                        $nama_lap[$j];
                        $tgl;

        $query1 = "SELECT * FROM detail_jadwal A JOIN lapangan B on A.ID_LAPANGAN=B.ID_LAPANGAN JOIN jam C on A.ID_JAM= C.ID_JAM 
                    WHERE B.NAMA_LAPANGAN='".$nama_lap[$j]."' && C.JAM='".$jam[$j]."'";
        $sql = mysqli_query($connect, $query1);
        while($data = mysqli_fetch_assoc ($sql)){
            $id_dj= $data['ID_DETAIL_JADWAL'];

            $data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
                    while($act = mysqli_fetch_array($data))
                    {
                        $tp = $act['ID_TANGGAL_PESANAN'];
                    }
        
                    $row = mysqli_num_rows($data);
                    if($row>0){
                        $id_tp = autonumber($tp, 3, 3);
                    }else{
                        $id_tp = 'TP0001';
                    }

                    $query1 = mysqli_query ($connect , "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                            VALUES ('$id_tp','$id_dj',1,$tgl)");

                        if($query1){
                            echo "<script>alert('Konfirmasi sukses');document.location.href='home.php?page=jadwal';</script>\n"; // Redirect ke halaman admin.php
                        }else{
                            // Jika Gagal, Lakukan :
                            echo "<script>alert('konfirmasi gagal');document.location.href='home.php?page=jadwal';</script>\n";}
    
            }}
    }?>
</body>
</html>