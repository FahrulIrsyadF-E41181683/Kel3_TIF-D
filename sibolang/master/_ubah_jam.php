<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// $id = $_GET['id'];
// Ambil Data yang Dikirim dari Form

$id = $_POST['id'];
$jam = $_POST['jam'];


  // Proses ubah data ke Database
  $query = "UPDATE `jam` SET `jam`='$jam' WHERE ID_JAM='".$id."'" ;
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=jam'</script>\n"; // Redirect ke halaman jadwal.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data gagal disimpan');document.location.href='home.php?page=jam'</script>\n";
   }

?>
