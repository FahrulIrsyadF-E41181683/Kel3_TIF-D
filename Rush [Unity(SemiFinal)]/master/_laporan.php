<center>
 
 <h2>CETAK LAPORAN PENYEWAAN <br/><a href="#">RUSH BADMINTON JEMBER</a></h2>

 
 <?php 
 include '../koneksi.php';
 ?>

<input type="text" class="form-control" id="date" name='date' placeholder="<?php echo $tgl ?>" value="<?=isset($_POST['date']) ? $_POST['date'] : ''?>">
 <table border="1">
     <tr>
         <th>NO</th>
         <th>ID TRANSAKSI</th>
         <th>ID PELANGGAN</th>
         <th>JAM PESANAN</th>
         <th>TANGGAL PESANAN</th>
         <th>HARGA SEWA</th>
         
     </tr>
     <?php 
     $no = 1;
     $sql = mysqli_query($connect,"SELECT D.ID_TRANSAKSI,D.ID_PELANGGAN, A.JAM, A.TANGGAL_PESANAN, D.HARGA_TOTAL 
     FROM detail_transaksi A JOIN transaksi D ON D.ID_TRANSAKSI = A.ID_TRANSAKSI  ");
     while($data = mysqli_fetch_array($sql)){
     ?>
     <tr>
         <td><?php echo $no++; ?></td>
         <td><?php echo $data['ID_TRANSAKSI'];?></td>
         <td><?php echo $data['ID_PELANGGAN'];?></td>
          <td><?php echo $data['JAM'];?></td>
          <td><?php echo $data['TANGGAL_PESANAN'];?></td>
          <td><?php echo $data['HARGA_TOTAL'];?></td>
     </tr>
     <?php 
     }
     ?>
 </table>

 <br/>
 <span class="badge"><a href="report/cetak.php"><i class="fa fa-print fa-5x"><h5>cetak</h5></i></a></span>


</center>