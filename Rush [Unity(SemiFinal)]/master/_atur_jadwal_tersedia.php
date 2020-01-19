<?php
session_start();
// Load file koneksi.php
include "koneksi.php";
// Ambil data id yang dikirim oleh _bank.php melalui URL
$dj = $_GET['dj'];
$tgl_pesan=$_GET['date'];
$lap_ubah=$_GET['lap_ubah'];

        $sql = mysqli_query($connect, "DELETE FROM tanggal_pesanan WHERE ID_DETAIL_JADWAL='$dj' && TANGGAL_PESANAN='$tgl_pesan'"); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){
            echo "<script>alert('Berhasil Ubah Status');document.location.href='home.php?tgl_ubah=$tgl_pesan&lap_uba=$lap_ubah & page=jadwal'</script>\n"; // Redirect ke halaman admin.php
            $_SESSION['status_lap'] = 1;
        }else{
            // Jika Gagal, Lakukan :
            echo "<script>alert('Gagal mengganti status');document.location.href='home.php?page=jadwal?>'</script>\n";
        }
        
?>

