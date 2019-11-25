<?php
    $koneksi = mysqli_connect("localhost", "root", "", "ezbooking");

    // Cek Koneksi
        if (mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
?>