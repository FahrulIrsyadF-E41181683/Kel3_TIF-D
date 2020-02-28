<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
$nm_bk = $_POST['nm_bk'];
$rkn = $_POST['rkn'];

$data = mysqli_query($connect, "select ID_BANK from bank ORDER BY ID_BANK DESC LIMIT 1");
while($produk_data = mysqli_fetch_array($data))
{
    $prd_id = $produk_data['ID_BANK'];
}
