<!DOCTYPE html>
<head>
    <title>Login Page Admin</title>
</head>
<body>
    <h2>Halaman Admin</h2>

        <br>

    <!--Cek Apakah Sudah Login-->
    <?php
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>

    <h4>SELAMAT DATANG, <?php echo $_SESSION['username'];?>! Anda telah login</h4>
        
        <br>
        <br>

    <a href="logout.php">LOGOUT</a>
</body>
</html>