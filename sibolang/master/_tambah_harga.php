<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
$nm_lp = $_POST['nm_lapangan'];
$harga_sewa = $_POST['harga_sewa'];

$data = mysqli_query($connect, "SELECT ID_LAPANGAN FROM lapangan ORDER BY ID_LAPANGAN DESC LIMIT 1");
while($produk_data = mysqli_fetch_array($data))
{
    $prd_id = $produk_data['ID_LAPANGAN'];
}

$row = mysqli_num_rows($data);
if($row>0){
  $id_lp = autonumber($prd_id, 3, 3);
}else{
  $id_lp = 'LP0001';
}  

 // Proses simpan ke Database
  
  $sql = mysqli_query($connect, "INSERT INTO `lapangan` (`ID_LAPANGAN`, `NAMA_LAPANGAN`, `HARGA_SEWA`) 
                                VALUES ('$id_lp', '$nm_lp', '$harga_sewa');"); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
      echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=harga'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Gagal menyimpan data');document.location.href='home.php?page=harga'</script>\n";
  }
} ?>