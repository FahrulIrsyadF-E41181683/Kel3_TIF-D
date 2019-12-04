<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
$nm_lp = $_POST['nm_lapangan'];
$harga = $_POST['harga'];

$ekstensi_diperbolehkan	= array('png','jpg');
$foto = $_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$tmp = $_FILES['foto']['tmp_name'];

$data = mysqli_query($connect, "select ID_LAPANGAN from lapangan ORDER BY ID_LAPANGAN DESC LIMIT 1");
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

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "images/lapangan/".$fotobaru;

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true | move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  
  // Proses simpan ke Database
  $sql = mysqli_query($connect, "INSERT INTO `lapangan` (`ID_LAPANGAN`, `NAMA_LAPANGAN`, `HARGA_SEWA`,`FOTO_LAPANGAN`) 
                                VALUES ('$id_lp', '$nm_lp', '$harga','$fotobaru');"); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
      echo "<script>alert('Data Berhasil Disimpan');document.location.href='home.php?page=lapangan'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data Gagal');document.location.href='home.php?page=lapangan'</script>\n";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "<script>alert('Data Gagal Disimpan karena gagal upload foto');document.location.href='home.php?page=lapangan'</script>\n";
}} ?>