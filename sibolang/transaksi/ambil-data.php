<?php
include "koneksi.php";
    $nm_bank = $_POST["nm_bank"];

    $result = mysqli_query($connect, "SELECT NO_REKENING FROM bank WHERE NAMA_BANK = '".$nm_bank."'");
    while ($data = mysqli_fetch_assoc($result)) {
        echo $data['NO_REKENING'];
    }?>