<?php
session_start();
// Load file koneksi.php
include "koneksi.php";
// Ambil data id yang dikirim oleh _bank.php melalui URL
$dj = $_GET['dj'];
$tgl_pesan=$_GET['date'];
$lap_ubah=$_GET['lap_ubah'];


$data = mysqli_query($connect, "SELECT ID_TANGGAL_PESANAN FROM tanggal_pesanan ORDER BY ID_TANGGAL_PESANAN DESC LIMIT 1");
while($act = mysqli_fetch_array($data))
{
    $id_tp = $act['ID_TANGGAL_PESANAN'];
}

$row = mysqli_num_rows($data);
if($row>0){
    $id_tp = autonumber($id_tp, 3, 3);
}else{
    $id_tp = 'TP0001';
}

$sql = mysqli_query($connect, "INSERT INTO `tanggal_pesanan`(`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`)
                                                    VALUES ('$id_tp','$dj',1,'$tgl_pesan')"); // Eksekusi/ Jalankan query dari variabel $query

if($sql){
    echo "<script>alert('Berhasil Ubah Status');document.location.href='home.php?tgl_ubah=$tgl_pesan&lap_uba=$lap_ubah & page=jadwal'</script>\n"; 
    $_SESSION['status_lap'] = 1;

}else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Gagal mengganti status');document.location.href='home.php?page=jadwal'</script>\n";
}
?>

