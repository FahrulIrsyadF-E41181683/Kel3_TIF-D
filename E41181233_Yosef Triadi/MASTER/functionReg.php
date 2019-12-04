<?php
    include ('koneksi.php');

    if(isset($_POST['daftar'])) {
        $id_admin = $id;
        $nama = htmlspecialchars($_POST['nama']);
        $jeniskelamin = htmlspecialchars($_POST['jk']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $nohp = htmlspecialchars($_POST['nohp']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars(strtolower(stripcslashes($_POST['username'])));
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $password2 = mysqli_real_escape_string($connect, $_POST['password2']);
        $foto = upload();
        $tanggal = date("Y-m-d H:i:s");
        $sql = mysqli_query($connect, "SELECT username OR email FROM tabel_admin WHERE username = '$username' OR email = '$email'");

        if(mysqli_fetch_assoc($sql)){
            header("Location: page-register.php?isused=yes");
        } else {
            header("Location: page-register.php?isused=no");
        }

        if($password !== $password2){
            header("Location: page-register.php?confirm=false");
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $insert_db = "INSERT INTO tabel_admin (`id_admin`, `nama_admin`, `jenis_kelamin`, `alamat`, `no_hp`, `username`, `password`) VALUES('$id_admin','$nama','$jeniskelamin','$alamat','$nohp','$email','$password')";
            
            $var = mysqli_query($connect, $insert_db);
            if($var == true){
                header("Location: page-register.php?message=succes");
            } else {
                header("Location: page-register.php?message=failed");
            }
        } 
        } else {
            header("Location: page-register.php");
        }

    function upload(){
        $namaFile   = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error      = $_FILES['foto']['error'];
        $tmpName    = $_FILES['foto']['tmp_name'];
    
        // cek apakah tidak ada gambar yang di upload
        // if($error === 4){
        //     header("Location: register.php?upload=nothing");
        // } else
        // {
        //     header("Location: register.php?upload=right");
        // }
    
        // cek apakah itu upload gambar atau bukan
        $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar       = explode('.', $namaFile);
        $ekstensiGambar       = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            header("Location: page-register.php?valid=no");
            }
    
        // cek jika ukuran gambar terlalu besar
        if($ukuranFile > 1000000) {
            header("Location: page-register.php?size=over");
            echo "<script>alert('Ukuran Gambar terlalu besar, maksimal 1 Mb');</script>";
        }
    
        // lolos pengecekan, gambar siap upload
        // generate nama baru
        $namaFileBaru  = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'images/' . $namaFileBaru);
        return $namaFileBaru;
    }

    function ID(){
        $criid = mysqli_query($connect, "SELECT max(id_admin) AS id FROM tabel_admin");
        $cari = mysqli_fetch_array($criid);
        $kode = substr($cari['id'],3,6);
        $idnya = $kode+1;

        if($idnya < 10){
            $id="ADM00".$idnya;
        } elseif ($idnya>=10 && $idnya<100){
            $id="ADM0".$idnya;
        } else{
            $id="ADM".$idnya;
        } 
    }
?>