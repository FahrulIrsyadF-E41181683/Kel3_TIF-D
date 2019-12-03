<?php 
include "koneksi.php";
 
$id_admin = $_POST["id"];
$username = $_POST["user"];
$password = $_POST["pwd"];
$no_hp = $_POST["no_hp"];
$alamat = $_POST["alamat"];

 
$query = mysqli_query($koneksi, "INSERT INTO `admin`(`ID_ADMIN`, `USERNAME`, `PASSWORD`, `NO_TELEPON`, `ALAMAT`) 
                                    VALUES ('$id_admin','$username','$password','$no_hp','$alamat')");

//"select * from admin where USERNAME='$username' and PASSWORD='$password'"

?>

