<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// $id = $_GET['id'];
// Ambil Data yang Dikirim dari Form

$id = $_POST['id'];
$nm_lp = $_POST['nm_lp'];
$hg_sw = $_POST['hg_sw'];


// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubahfoto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "images/lapangan/".$fotobaru;

  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM `lapangan` WHERE ID_LAPANGAN='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("images/lapangan/".$data['FOTO_LAPANGAN'])) // Jika foto ada
      unlink("images/lapangan/".$data['FOTO_LAPANGAN']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE `lapangan` SET `NAMA_LAPANGAN`='$nm_lp',`HARGA_SEWA`='$hg_sw', FOTO_LAPANGAN='".$fotobaru."' WHERE ID_LAPANGAN='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      echo "<script>alert('Data Berhasil Disimpan');document.location.href='home.php?page=lapangan'</script>\n"; // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "<script>alert('Terjadi kesalahan simpan di database');document.location.href='home.php?page=lapangan'</script>\n";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "<script>alert('Gambar gagal diUpload');document.location.href='home.php?page=lapangan'</script>\n";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE `lapangan` SET `NAMA_LAPANGAN`='$nm_lp',`HARGA_SEWA`='$hg_sw' WHERE ID_LAPANGAN='".$id."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data Berhasil Disimpan');document.location.href='home.php?page=lapangan'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data Gagal Disimpan karena gagal terhubung ke server');document.location.href='home.php?page=lapangan'</script>\n";
   }
}
?>
