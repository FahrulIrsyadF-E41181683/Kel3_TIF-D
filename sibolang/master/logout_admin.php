<?php 
    session_start();
    session_unset();
    session_destroy();

    header("location:../home/home1.php?keluar=sukses");
?>