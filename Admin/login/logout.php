<?php
// Mengaktifkan Session
session_start();

// Menghapus semua session
session_destroy();

// Mengalihkan halaman sambil mengirim pesan logout
header("location: index.php?pesan=logout");
?>