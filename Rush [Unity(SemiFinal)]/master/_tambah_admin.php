<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
$nm_admin = $_POST['nm_admin'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$password = $_POST['password'];
$ekstensi_diperbolehkan	= array('png','jpg');
$foto = $_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$tmp = $_FILES['foto']['tmp_name'];

$data = mysqli_query($connect, "select ID_ADMIN from admin ORDER BY ID_ADMIN DESC LIMIT 1");
while($admin_data = mysqli_fetch_array($data))
{
    $adm_id = $admin_data['ID_ADMIN'];
}

$row = mysqli_num_rows($data);
if($row>0){
  $id_admin = autonumber($adm_id, 3, 3);
}else{
  $id_admin = 'AD0001';
}  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "images/avatar/".$fotobaru;
// Proses upload
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true | move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  
  $sql = mysqli_query($connect, "INSERT INTO `admin`(`ID_ADMIN`, `NAMA_ADMIN`, `NOTLP_ADMIN`, `EMAIL_ADMIN`, `ALAMAT_ADMIN`, `PASSWORD_ADMIN`, `FOTO_ADMIN`) 
                                             VALUES ('$id_admin', '$nm_admin', '$no_hp',      '$email',      '$alamat',      '$password',      '$fotobaru');"); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
      echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=admin'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Gagal menyimpan data');document.location.href='home.php?page=admin'</script>\n";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "<script>alert('Data gagal disimpan karena gagal upload foto');document.location.href='home.php?page=admin'</script>\n";
}} ?>