<?php 
session_start();
session_destroy();

echo "<script>alert('Anda berhasil logout');</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";

?>