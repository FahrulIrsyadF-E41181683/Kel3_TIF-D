<?php
// Load file koneksi.php
include "koneksi.php";

$id         = $_POST['id'];
$nm_lp      = $_POST['nm_lp'];
$harga_sewa = $_POST['harga_sewa'];
  // Proses ubah data ke Database
  $query = "UPDATE `lapangan` SET `NAMA_LAPANGAN`='$nm_lp',`HARGA_SEWA`='$harga_sewa' WHERE ID_LAPANGAN='".$id."'" ;
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=harga'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data gagal disimpan, silakan cek ulang');document.location.href='home.php?page=harga'</script>\n";
   }

?>
