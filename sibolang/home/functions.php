<?php 

//koneksi ke database
$conn= mysqli_connect("localhost", "u5445042_sibolang", "sibolang1234sip", "u5445042_sibolang");


function daftar($data) {
    global $conn;

    $username =strtolower(stripslashes($data["username"]));
    $email= mysqli_real_escape_string($conn, $data["email"]);
    $alamat= mysqli_real_escape_string($conn, $data["alamat"]);
    $jeniskelamin=mysqli_real_escape_string($conn, $data["jeniskelamin"]);
    $notelepon= mysqli_real_escape_string ($conn, $data["notelepon"]);
    $password= mysqli_real_escape_string ($conn, $data["password"]);
    $password2= mysqli_real_escape_string ($conn, $data["password2"]);

    //upload foto
    $foto = upload();
    if (!$foto){
       return false;
    }

//id autoincrement dari varchar`
$cri_id = mysqli_query ($conn, "SELECT max(ID_PELANGGAN) AS ID_PELANGGAN FROM pelanggan");
$cari = mysqli_fetch_array ($cri_id);
$kode = substr ($cari ['ID_PELANGGAN'], 3,6);
$id_tbh = $kode+1;

if($id_tbh<10) {
    $id="PL00".$id_tbh;
}else if($id_tbh>=10 && $id_tbh<100)
{$id="PL0".$id_tbh;
}else{$id="PL".$id_tbh;

}


//cek username sudah ada atau belum
$result = mysqli_query($conn, "SELECT NAMA_PELANGGAN FROM pelanggan
WHERE  NAMA_PELANGGAN ='$username'");

if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert ('username sudah terdaftar')
        </script>";
        return false;
}
 //cek email sudah ada atau belum
$hasil = mysqli_query($conn, "SELECT EMAIL_PELANGGAN FROM pelanggan
WHERE  EMAIL_PELANGGAN ='$email'");

if (mysqli_fetch_assoc($hasil)) {
    echo "<script>
            alert ('email sudah terdaftar')
        </script>";
        return false;
}

    //cek konfirmasi password
if ( $password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
    return false;
}

//upload foto

//enkripsi password
// $password = password_hash($password, PASSWORD_DEFAULT);

//Rename nama fotonya dengan menambahkan tanggal dan jam upload
//  $fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
 //$path = "./images/".$fotobaru;
// Proses upload

//tambah username ke database
mysqli_query ($conn , "INSERT INTO `pelanggan`(`ID_PELANGGAN`, `NAMA_PELANGGAN`, `JENIS_KELAMIN`, `ALAMAT_PELANGGAN`,`EMAIL_PELANGGAN`, `NOTLP_PELANGGAN`, `PASSWORD_PELANGGAN`,`FOTO_PELANGGAN` ) 
                                        VALUES  ('$id', '$username', '$jeniskelamin', '$alamat', '$email', '$notelepon', '$password', '$foto')") ;
  
return mysqli_affected_rows($conn);

}
 
function upload() {

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    //cek apakah yang diupload adalah gambar
    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
    $eksistensifoto = explode('.',$namafile);
    $eksistensifoto = strtolower(end($eksistensifoto));
    if(!in_array($eksistensifoto,$ekstensifotovalid )) {
        echo "<script>
                alert('yang anda upload bukan foto');
                </script> " ;
            return false;   }
     //cek jika gmbar terlalu besar
     if($ukuranfile > 1000000) {
         echo "<script>
         alert('ukuran foto terlalu besar');
         </script> " ;
     return false; 
     }

     //gambar siap di upload
        move_uploaded_file($tmpname,'img/'.$namafile);
        return $namafile;
            
}

?>