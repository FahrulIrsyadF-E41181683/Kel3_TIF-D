<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
$nm_pl                  = $_POST['nm_pl'];
$jenis_kelamin          = $_POST['jenis_kelamin'];
$alamat_pl              = $_POST['alamat_pl'];
$email                  = $_POST['email_pl'];
$no_hp                  = $_POST['no_hp'];
$password               = $_POST['password'];
$ekstensi_diperbolehkan	= array('png','jpg');
$foto                   = $_FILES['foto']['name'];
$x                      = explode('.', $foto);
$ekstensi               = strtolower(end($x));
$tmp                    = $_FILES['foto']['tmp_name'];

$data = mysqli_query($connect, "SELECT ID_PELANGGAN FROM pelanggan ORDER BY ID_PELANGGAN DESC LIMIT 1");
while($admin_data = mysqli_fetch_array($data))
{
    $adm_id = $admin_data['ID_PELANGGAN'];
}

$row = mysqli_num_rows($data);
if($row>0){
  $id_pl = autonumber($adm_id, 3, 3);
}else{
  $id_pl = 'PL0001';
}  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "images/pelanggan/".$fotobaru;  
// Proses upload
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true | move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak

// Proses simpan ke Database
  $sql = mysqli_query($connect, "INSERT INTO `pelanggan`(`ID_PELANGGAN`, `NAMA_PELANGGAN`, `JENIS_KELAMIN`, `ALAMAT_PELANGGAN`,`EMAIL_PELANGGAN`, `NOTLP_PELANGGAN`, `PASSWORD_PELANGGAN`, `FOTO_PELANGGAN`)
  VALUES ('$id_pl','$nm_pl','$jenis_kelamin','$alamat_pl','$email','$no_hp','$password','$fotobaru');"); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
      echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=pelanggan'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Gagal menyimpan data');document.location.href='home.php?page=pelanggan'</script>\n";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "<script>alert('Data gagal disimpan karena gagal upload foto');document.location.href='home.php?page=pelanggan'</script>\n";
}} ?>