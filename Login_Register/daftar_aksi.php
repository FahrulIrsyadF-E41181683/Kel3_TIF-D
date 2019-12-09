<?php 

//koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "sibolang(manbasdat)");


function daftar($data) {
    global $conn;

    $username =strtolower(stripslashes($data["username"]));
    $email= mysqli_real_escape_string($conn, $data["email"]);
    $alamat= mysqli_real_escape_string($conn, $data["alamat"]);
    $jeniskelamin=mysqli_real_escape_string($conn, $data["jeniskelamin"]);
    $notelepon= mysqli_real_escape_string ($conn, $data["notelepon"]);
    $foto= mysqli_real_escape_string ($conn, $data["foto"]);
    $password= mysqli_real_escape_string ($conn, $data["password"]);
    $password2= mysqli_real_escape_string ($conn, $data["password2"]);

//id autoincrement dari varchar`
$data = mysqli_query($conn, "select ID_PELANGGAN from pelanggan ORDER BY ID_PELANGGAN DESC LIMIT 1");
while($pl_data = mysqli_fetch_array($data))
{
    $pl_id = $pl_data['ID_PELANGGAN'];
}

$row = mysqli_num_rows($data);
if($row>0){
  $id_pelanggan = autonumber($pl_id, 3, 3);
}else{
  $id_pelanggan = 'PL0001';
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
    //cek konfirmasi password
if ( $password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
    return false;
}

//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "MIL".$fotobaru;
// Proses upload

//tambah username ke database
mysqli_query ($conn , "INSERT INTO `pelanggan`(`ID_PELANGGAN`, `NAMA_PELANGGAN`, `JENIS_KELAMIN`, `EMAIL_PELANGGAN`, `NOTLP_PELANGGAN`, `PASSWORD_PELANGGAN`, `FOTO_PELANGGAN`)
                                        VALUES('$id_pelanggan', '$username', '$jeniskelamin', '$alamat','$email', '$notelepon', '$password', $fotobaru);") ;
  
return mysqli_affected_rows($conn);

}

?>