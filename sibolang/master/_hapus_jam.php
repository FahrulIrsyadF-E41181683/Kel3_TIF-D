<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh admin.php melalui URL
$id = $_GET['id'];
// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM jam WHERE ID_JAM='".$id."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

$query2 = "DELETE FROM jam WHERE ID_JAM='".$id."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  echo "<script>alert('Data Berhasil Dihapus');document.location.href='home.php?page=jam'</script>\n"; // Redirect ke halaman admin.php
}else{
  // Jika Gagal, Lakukan :
  echo "<script>alert('Data Gagal Dihapus');document.location.href='home.php?page=jam'</script>\n";
}
?>