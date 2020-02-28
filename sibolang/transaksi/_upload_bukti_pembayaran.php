<?php
include 'koneksi.php';
//$gambar=$_POST['foto'];
$st=$_POST['id'];
$idt=$_POST['idtransaksi'];

   if(isset($_POST['ubahfoto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
                          // Ambil data foto yang dipilih dari form
                          $foto = $_FILES['foto']['name'];
                          $tmp  = $_FILES['foto']['tmp_name'];
                          
                          // Rename nama fotonya dengan menambahkan tanggal dan jam upload
                          $fotobaru = date('dmYHis').$foto;
                          
                          // Set path folder tempat menyimpan fotonya
                          $path = "images/bukti/".$fotobaru;

                          // Proses upload
                          if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                            // Query untuk menampilkan data 
                            $query = "SELECT * FROM transaksi WHERE ID_PELANGGAN='$st'";
                            $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
                            $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

                            // Cek apakah file foto sebelumnya ada di folder images
                            if(is_file("images/bukti/".$data['BUKTI_PEMBAYARAN'])) // Jika foto ada
                              unlink("images/bukti/".$data['BUKTI_PEMBAYARAN']); // Hapus file foto sebelumnya yang ada di folder images

                            ini_set('date.timezone', 'Asia/Jakarta');
                            $waktu = date("H:i:s");
                            $tgl = date("Y-m-d");
                            // Proses ubah data ke Database
                            $query = "UPDATE transaksi SET BUKTI_PEMBAYARAN='$fotobaru', WAKTU_PEMBAYARAN='$tgl $waktu' WHERE ID_TRANSAKSI= '$idt'";
                            $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

                            
                            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                              // Jika Sukses, Lakukan :
                              echo "<script>alert('Bukti Pembayaran Berhasil Diupload, tunggu konfirmasi pembayyaran dari admin');window.location='../home/home2.php'</script>\n"; // Redirect ke halaman home.php
                            }else{
                              // Jika Gagal, Lakukan :
                              echo "<script>alert('Bukti Pembayaran Gagal Diupload');window.location='../home/home2.php'</script>\n";
                            }
                          }else{
                            // Jika gambar gagal diupload, Lakukan :
                              echo "<script>alert('Gagal menyimpan foto');window.location='../home/home2.php'</script>\n";
                              }  
                
    }
?>