<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN</title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN PEYEWAAN</h2>
		<h4>RUSH BADMINTON</h4>
 
	</center>
 
	<?php 
	include 'config.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
                <th>ID TRANSAKSI</th>
				<th>ID PELANGGAN</th>
                <th>JAM PESANAN</th>
                <th>TANGGAL PESANAN</th>
                <th>HARGA SEWA</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($db,"SELECT D.ID_TRANSAKSI,D.ID_PELANGGAN, A.JAM, A.TANGGAL_PESANAN, D.HARGA_TOTAL 
		FROM detail_transaksi A JOIN transaksi D ON D.ID_TRANSAKSI = A.ID_TRANSAKSI");
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
 
	<script>
		window.print();
	</script>
 
</body>
</html>













