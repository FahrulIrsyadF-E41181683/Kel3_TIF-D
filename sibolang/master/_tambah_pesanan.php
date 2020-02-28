<?php 
include "koneksi.php" ;

if (isset($_POST['simpan'])){
      $jam = $_POST['jam'];

      $data = mysqli_query($connect, "select ID_JADWAL from jadwal ORDER BY ID_JADWAL DESC LIMIT 1");
      while($produk_data = mysqli_fetch_array($data))
      {
          $prd_id = $produk_data['ID_JADWAL'];
      }

      $row = mysqli_num_rows($data);
      if($row>0){
        $id_jd = autonumber($prd_id, 3, 3);
      }else{
        $id_jd = 'JD0001';
      }  

      // Proses simpan ke Database
        
        $sql = mysqli_query($connect, "INSERT INTO `jadwal` (`ID_JADWAL`, `JAM`) 
                                      VALUES ('$id_jd', '$jam');"); // Eksekusi/ Jalankan query dari variabel $query
        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
          // Jika Sukses, Lakukan :
            echo "<script>alert('Data Berhasil Disimpan');document.location.href='home.php?page=jadwal'</script>\n"; // Redirect ke halaman admin.php
        }else{
          // Jika Gagal, Lakukan :
          echo "<script>alert('Gagal menyimpan data');document.location.href='home.php?page=jadwal'</script>\n";
        }
} ?>