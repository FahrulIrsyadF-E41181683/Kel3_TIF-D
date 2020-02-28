<?php
// Load file koneksi.php
include "koneksi.php";

$id = $_POST['id'];
$nm_bank = $_POST['nm_bank'];
$no_rek = $_POST['no_rek'];
  // Proses ubah data ke Database
  $query = "UPDATE `bank` SET `NAMA_BANK`='$nm_bank',`NO_REKENING`='$no_rek' WHERE ID_BANK='".$id."'" ;
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=bank'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data gagal disimpan, silakan cek ulang');document.location.href='home.php?page=bank'</script>\n";
   }

?>
