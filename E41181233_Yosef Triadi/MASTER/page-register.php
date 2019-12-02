<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<?php
    if(isset($_GET['isused'])){
        $isused = $_GET['isused'];

        if($isused === 'yes'){
            echo "<script>alert('email atau username sudah digunakan');</script>";
        } else {

        }

    } else {
        $isused = '';
    }

    if(isset($_GET['message'])){
        $message = $_GET['message'];

        if($message === 'succes'){
            echo "<script>alert('user baru telah ditambahkan!');</script>";
        } else {
            echo "<script>alert('something wrong!');</script>";
        }

    } else {
        $message = '';
    }

    if(isset($_GET['valid'])){
        $valid = $_GET['valid'];

        if($valid === 'no'){
            echo "<script>alert('Yang anda upload bukan Gambar');</script>";
        } else {

        }

    } else {
        $valid = '';
    }

    if(isset($_GET['size'])){
        $size = $_GET['size'];

        if($size === 'over'){
            echo "<script>alert('ukuran gambar terlalu besar maksimal 1 mb');</script>";
        } else {

        }

    } else {
        $size = '';
    }
    
    if(isset($_GET['confirm'])){
        $confirm = $_GET['confirm'];

        if($confirm === 'false'){
            echo "<script>alert('password konfirmasi tidak cocok');</script>";
        } else {

        }

    } else {
        $confirm = '';
    }
?>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center" href="index.html"> <h4>Daftar Akun!</h4></a>
        
                                <form action="functionReg.php" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Nama Lengkap" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control custom-select" name="jk">
                                            <option selected>Jenis Kelamin</option>
                                            <option value="1" name="lk">Laki-laki</option>
                                            <option value="2" name="pr">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text-area" class="form-control"  placeholder="Alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="No Handphone" name="nohp" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Email/Username" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih file gambar...</label>
                                        </div>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" name="daftar">Daftar</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Sudah punya akun? <a href="page-login.html" class="text-primary">Sign Up </a> sekarang</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>





