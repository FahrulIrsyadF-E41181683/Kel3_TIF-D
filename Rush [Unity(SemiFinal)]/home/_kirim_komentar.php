<?php 

if (isset($_POST['komentar'])){
$nm_pel = $_POST['nama'];
$id_pel = $_POST['id_pl'];
$komen = $_POST['komen'];
$tgl = date("Y/m/d");
$jam = date("h:i:sa");

            $data = mysqli_query($connect, "SELECT ID_KOMENTAR FROM komentar ORDER BY ID_KOMENTAR DESC LIMIT 1");
            while($komen = mysqli_fetch_array($data))
            {
                $komen2 = $komen['ID_KOMENTAR'];
            }

            $row = mysqli_num_rows($data);
            if($row>0){
            $id_km = autonumber($komen2, 3, 3);
            }else{
            $id_km = 'KM0001';
            }  

 // Proses simpan ke Database 
  $sql = mysqli_query($connect, "INSERT INTO `komentar`(`ID_KOMENTAR`, `ID_PELANGGAN`, `TANGGAL_KOMENTAR`, `WAKTU`, `KOMENTAR`) 
                                                VALUES ('$id_km','$id_pel','$tgl','$jam','$komen')"); 
                                // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
      echo "<script>alert('Komentar berhasil dikirim');document.location.href='home2.php'</script>\n"; // Redirect ke halaman admin.php
  }
} ?>