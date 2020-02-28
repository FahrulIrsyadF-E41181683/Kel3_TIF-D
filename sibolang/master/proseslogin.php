<?php
// Mengaktifkan Session PHP
session_start();

// Menghubungkan dengan koneksi
include 'koneksi.php';

// Menangkap data yang dikirim dari form index.php
$nama_admin = $_POST['NAMA_ADMIN'];
$password_admin = $_POST['PASSWORD_ADMIN'];

// Menyeleksi data dari tabel user dengan username dan password yang sesuai
$data = mysqli_query($connect, " SELECT * FROM admin where NAMA_ADMIN='$nama_admin' and PASSWORD_ADMIN='$password_admin' ");
        if($result = mysqli_fetch_array($data)){
            $id_admin=$result['ID_ADMIN']; 
        }

//Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['NAMA_ADMIN'] = $nama_admin;
    $_SESSION['status'] = "login";
    $_SESSION['id_admin'] = $id_admin;
    header("location:home.php?page=home");
}else{
    header("location:index.php?pesan=gagal");
}
?>