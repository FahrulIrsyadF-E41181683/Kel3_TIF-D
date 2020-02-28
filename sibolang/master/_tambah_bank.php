<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
$nm_bank = $_POST['nm_bank'];
$no_rek = $_POST['no_rek'];

$data = mysqli_query($connect, "SELECT ID_BANK FROM bank ORDER BY ID_BANK DESC LIMIT 1");
while($produk_data = mysqli_fetch_array($data))
{
    $prd_id = $produk_data['ID_BANK'];
}

$row = mysqli_num_rows($data);
if($row>0){
  $id_bk = autonumber($prd_id, 3, 3);
}else{
  $id_bk = 'BK0001';
}  
 // Proses simpan ke Database 
  $sql = mysqli_query($connect, "INSERT INTO `bank` (`ID_BANK`, `NAMA_BANK`, `NO_REKENING`) 
                                VALUES ('$id_bk', '$nm_bank', '$no_rek');"); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
      echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=bank'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data gagal disimpan, silakan cek ulang');document.location.href='home.php?page=bank'</script>\n";
  }
} ?>