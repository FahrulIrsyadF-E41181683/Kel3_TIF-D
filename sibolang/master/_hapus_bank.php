<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data id yang dikirim oleh _bank.php melalui URL
$id = $_GET['id'];
// Query untuk menampilkan data siswa berdasarkan id yang dikirim
$query = "SELECT * FROM bank WHERE ID_BANK='".$id."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

$query2 = "DELETE FROM bank WHERE ID_BANK='".$id."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  echo "<script>alert('Data berhasil dihapus');document.location.href='home.php?page=bank'</script>\n"; // Redirect ke halaman admin.php
}else{
  // Jika Gagal, Lakukan :
  echo "<script>alert('Data gagal dihapus');document.location.href='home.php?page=bank'</script>\n";
}
?>