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

//Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['NAMA_ADMIN'] = $nama_admin;
    $_SESSION['status'] = "login";
    header("location:home.php");
}else{
    header("location:index.php?pesan=gagal");
}
?>