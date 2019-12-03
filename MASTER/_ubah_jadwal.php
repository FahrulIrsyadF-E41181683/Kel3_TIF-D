<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// $id = $_GET['id'];
// Ambil Data yang Dikirim dari Form

$id = $_POST['id'];
$jam = $_POST['jam'];


  // Proses ubah data ke Database
  $query = "UPDATE `bank` SET `NAMA_BANK`='$nm_bank',`NO_REKENING`='$no_rek' WHERE ID_BANK='".$id."'" ;
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=bank'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data gagal disimpan');document.location.href='home.php?page=bank'</script>\n";
   }

?>
