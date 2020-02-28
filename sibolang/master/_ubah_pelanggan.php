<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data id yang dikirim oleh _ubah_pelanggan_form.php melalui URL
// Ambil Data yang Dikirim dari Form
$id             = $_POST['id'];
$nm_pl          = $_POST['nm_pl'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$no_hp          = $_POST['no_hp'];
$alamat_pl      = $_POST['alamat_pl'];
$email          = $_POST['email_pl'];
$password       = $_POST['password'];
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubahfoto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp  = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "images/pelanggan/".$fotobaru;

  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM 'pelanggan' WHERE ID_PELANGGAN='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("images/pelanggan/".$data['FOTO_PELANGGAN'])) // Jika foto ada
      unlink("images/pelanggan/".$data['FOTO_PELANGGAN']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE `pelanggan` SET `NAMA_PELANGGAN`='$nm_pl',`ALAMAT_PELANGGAN`='$alamat_pl',`JENIS_KELAMIN`='$jenis_kelamin',`NOTLP_PELANGGAN`='$no_hp',`EMAIL_PELANGGAN`='$email',`PASSWORD_PELANGGAN`='$password', `FOTO_PELANGGAN`='".$fotobaru."' WHERE ID_PELANGGAN='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: home.php?page=pelanggan"); // Redirect ke halaman home.php
    }else{
      // Jika Gagal, Lakukan :
      echo "<script>alert('Data gagal disimpan');document.location.href='home.php?page=pelanggan'</script>\n";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
      echo "<script>alert('Gagal menyimpan foto');document.location.href='home.php?page=pelanggan'</script>\n";
  }
  }else{ // Jika user tidak menceklis checkbox yang ada di form ubah foto, lakukan :
  // Proses ubah data ke Database
    $query = "UPDATE `pelanggan` SET `NAMA_PELANGGAN`='$nm_pl',`ALAMAT_PELANGGAN`='$alamat_pl',`JENIS_KELAMIN`='$jenis_kelamin',`NOTLP_PELANGGAN`='$no_hp',`EMAIL_PELANGGAN`='$email',`PASSWORD_PELANGGAN`='$password' WHERE ID_PELANGGAN='".$id."'" ;
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      
    // Jika Sukses, Lakukan :
      echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=pelanggan'</script>\n"; // Redirect ke halaman pelanggan.php
  }else{
    // Jika Gagal, Lakukan :
      echo "<script>alert('Data gagal disimpan');document.location.href='home.php?page=pelanggan'</script>\n";
   }
}
?>
