<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// $id = $_GET['id'];
// Ambil Data yang Dikirim dari Form

$id = $_POST['id'];
$nm_admin = $_POST['nm_admin'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['nohp'];
$email = $_POST['email'];
$password = $_POST['password'];


// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubahfoto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "images/avatar/".$fotobaru;

  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM 'admin' WHERE ID_ADMIN='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("images/avatar/".$data['FOTO_ADMIN'])) // Jika foto ada
      unlink("images/avatar/".$data['FOTO_ADMIN']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE `admin` SET `NAMA_ADMIN`='$nm_admin',`NOTLP_ADMIN`='$no_hp',`EMAIL_ADMIN`='$email',`ALAMAT_ADMIN`='$alamat',`PASSWORD_ADMIN`='$password' , FOTO_ADMIN='".$fotobaru."' WHERE ID_ADMIN='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: index.php?page=admin"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo ("location: index.php?page=admin");
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE `admin` SET `NAMA_ADMIN`='$nm_admin',`NOTLP_ADMIN`='$no_hp',`EMAIL_ADMIN`='$email',`ALAMAT_ADMIN`='$alamat',`PASSWORD_ADMIN`='$password' WHERE ID_ADMIN='".$id."'" ;
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data Berhasil Disimpan');document.location.href='index.php?page=admin'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data Gagal Disimpan karena gagal terhubung ke server');document.location.href='index.php?page=admin'</script>\n";
   }
}
?>
