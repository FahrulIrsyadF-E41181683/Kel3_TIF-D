  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Ambil data id yang dikirim oleh _ubah_admin_form.php melalui URL
  // Ambil Data yang Dikirim dari Form
  $id             = $_POST['id'];
  $nm_admin       = $_POST['nm_admin'];
  $jenis_kelamin  = $_POST['jenis_kelamin'];
  $alamat         = $_POST['alamat'];
  $no_hp          = $_POST['nohp'];
  $email          = $_POST['email'];
  $password       = $_POST['password'];
  // Cek apakah user ingin mengubah fotonya atau tidak
  if(isset($_POST['ubahfoto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
    // Ambil data foto yang dipilih dari form
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;
    
    // Set path folder tempat menyimpan fotonya
    $path = "images/avatar/".$fotobaru;

    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Query untuk menampilkan data 
      $query = "SELECT * FROM 'admin' WHERE ID_ADMIN='".$id."'";
      $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
      $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

      // Cek apakah file foto sebelumnya ada di folder images
      if(is_file("images/avatar/".$data['FOTO_ADMIN'])) // Jika foto ada
        unlink("images/avatar/".$data['FOTO_ADMIN']); // Hapus file foto sebelumnya yang ada di folder images
      
      // Proses ubah data ke Database
      $query = "UPDATE `admin` SET `NAMA_ADMIN`='$nm_admin',`JENIS_KELAMIN`='$jenis_kelamin',`NOTLP_ADMIN`='$no_hp',`EMAIL_ADMIN`='$email',`ALAMAT_ADMIN`='$alamat',`PASSWORD_ADMIN`='$password' , FOTO_ADMIN='".$fotobaru."' WHERE ID_ADMIN='".$id."'";
      $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: home.php?page=admin"); // Redirect ke halaman home.php
      }else{
        // Jika Gagal, Lakukan :
        echo "<script>alert('Data gagal disimpan');document.location.href='home.php?page=admin'</script>\n";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
        echo "<script>alert('Gagal menyimpan foto');document.location.href='home.php?page=admin'</script>\n";
    }
    }else{ // Jika user tidak menceklis checkbox yang ada di form ubah foto, lakukan :
    // Proses ubah data ke Database
      $query = "UPDATE `admin` SET `NAMA_ADMIN`='$nm_admin',`JENIS_KELAMIN`='$jenis_kelamin',`NOTLP_ADMIN`='$no_hp',`EMAIL_ADMIN`='$email',`ALAMAT_ADMIN`='$alamat',`PASSWORD_ADMIN`='$password' WHERE ID_ADMIN='".$id."'" ;
      $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        
      // Jika Sukses, Lakukan :
        echo "<script>alert('Data berhasil disimpan');document.location.href='home.php?page=admin'</script>\n"; // Redirect ke halaman admin.php
    }else{
      // Jika Gagal, Lakukan :
        echo "<script>alert('Data gagal disimpan');document.location.href='home.php?page=admin'</script>\n";
    }
  }
  ?>
