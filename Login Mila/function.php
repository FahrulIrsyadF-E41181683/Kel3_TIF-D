<?php 

//koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "baru");


function daftar($data) {
    global $conn;

    $username =strtolower(stripslashes($data["username"]));
    $email= mysqli_real_escape_string($conn, $data["email"]);
    $notelepon= mysqli_real_escape_string ($conn, $data["notelepon"]);
    $password= mysqli_real_escape_string ($conn, $data["password"]);
    $password2= mysqli_real_escape_string ($conn, $data["password2"]);

//id autoincrement dari varchar`
$cri_id = mysqli_query ($conn, "SELECT max(id) AS id FROM pemesan");
$cari = mysqli_fetch_array ($cri_id);
$kode = substr ($cari ['id'], 3,6);
$id_tbh = $kode+1;

if($id_tbh<10) {
    $id="PY00".$id_tbh;
}else if($id_tbh>=10 && $id_tbh<100)
{$id="PY00".$id_tbh;
}else{$id="PY".$id_tbh;

}

//cek username sudah ada atau belum
$result = mysqli_query($conn, "SELECT username FROM pemesan
WHERE  username ='$username'");

if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert ('username sudah terdaftar')
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

//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

//tambah username ke database
mysqli_query ($conn , "INSERT INTO pemesan VALUES('$id', '$username', 
'$email', '$notelepon', '$password')") ;
  
return mysqli_affected_rows($conn);

}

?>