<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['status'])){
  header("location:home.php");
}
$nama_admin = $_SESSION['NAMA_ADMIN'];
if(isset($_GET['id_detail_jadwal'])){
  $id_detail = $_GET['id_detail_jadwal'];
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }
  if($action == 'sudah'){
    $data = mysqli_query($connect, "UPDATE detail_jadwal SET STATUS = 1 WHERE ID_DETAIL_JADWAL = '$id_detail' AND NAMA_ADMIN = '$nama_admin'");
    if($data > 0){
      header("location:_lapangan1.php");
    }else{
      echo "GAGAL";
    }
  }else{
    $data = mysqli_query($connect, "UPDATE detail_jadwal SET STATUS = 0 WHERE ID_DETAIL_JADWAL = '$id_detail'");
    if($data > 0){
      header("location:_lapangan1.php");
    }else{
      echo "GAGAL";
    }
  }
  
}else{
  $data = mysqli_query($connect, "UPDATE detail_jadwal SET STATUS = 1 WHERE STATUS = 0");
    if($data > 0){
      header("location:_lapangan1.php");
    }else{
      echo "GAGAL";
    }
}