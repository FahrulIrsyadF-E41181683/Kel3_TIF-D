<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data id yang dikirim oleh _bank.php melalui URL
$id = $_GET['id'];

$query2 = "DELETE FROM komentar WHERE ID_KOMENTAR='".$id."'";

$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  echo "<script>alert('Komentar berhasil dihapus');document.location.href='home2.php'</script>\n"; // Redirect ke halaman admin.php
}else{
  // Jika Gagal, Lakukan :
  echo "<script>alert('Komentar gagal dihapus');document.location.href='home2.php'</script>\n";
}
?>