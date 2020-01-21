<?php
ob_start();
?>
<html>
<head>
<title>Laporan Penyewaan</title>
<style>
.table1{
font-family:sans_serif;
color:#232323;
border-collapse:collapse;
}
.table1,th,td{
border:1px solid #999;
padding:5px 14px;
}
</style>
</head>
<body>
<h3 style="text-align: center;">Laporan Penyewaan <br> Rush Badminton</h3>
<table cellspacing="0";  width="90%" align="center">
<tr>
<th style="text-align: center;" width="10%" bgcolor="#F4F4F">No</th>
<th style="text-align: center;" width="25%">ID Transaksi</th>
<th style="text-align: center;" width="25%">ID Pelanggan</th>
<th style="text-align: center;" width="15%">Jam</th>
<th style="text-align: center;" width="20%">Tanggal Pesanan</th>
<th style="text-align: center;" width="20%">Harga Total</th>
</tr>
<?php
include "koneksi.php";
$query = "SELECT D.ID_TRANSAKSI,D.ID_PELANGGAN, A.JAM, A.TANGGAL_PESANAN, D.HARGA_TOTAL 
FROM detail_transaksi A JOIN transaksi D ON D.ID_TRANSAKSI = A.ID_TRANSAKSI ";
$query1 = "SELECT D.ID_TRANSAKSI,D.ID_PELANGGAN, A.JAM, A.TANGGAL_PESANAN, D.HARGA_TOTAL 
FROM detail_transaksi A JOIN transaksi D ON D.ID_TRANSAKSI = A.ID_TRANSAKSI";
$sql = mysqli_query($connect, $query);
$row = mysqli_num_rows($sql);
if($row > 0){
$i=1;
while($data = mysqli_fetch_array($sql)){
if($i%2!=0){
$gridcolor="white";
}else{
$gridcolor="lavender";
}
echo "<tr>";
echo "<td style='text-align: center;' width='10%' bgcolor='".$gridcolor."'>".$i++."</td>";
echo "<td style='text-align: left;' width='25%' bgcolor='".$gridcolor."'>".$data['ID_TRANSAKSI']."</td>";
echo "<td style='text-align: left;' width='25%' bgcolor='".$gridcolor."'>".$data['ID_PELANGGAN']."</td>";
echo "<td style='text-align: center;' width='15%' bgcolor='".$gridcolor."'>".$data['JAM']."</td>";
echo "<td style='text-align: center;' width='20%' bgcolor='".$gridcolor."'>".$data['TANGGAL_PESANAN']."</td>";
echo "<td style='text-align: center;' width='20%' bgcolor='".$gridcolor."'>".$data['HARGA_TOTAL']."</td>";
echo "</tr>";
}
}else{ // Jika data tidak ada
echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>
<p></p>
<h5 style="text-align: right;"> <?php echo date ('l, d-m-Y');
                                    echo "<br>";
                                    echo "Rush Badminton" ;
                                    echo "<p></p>";
                                    echo "<p></p>";
                                    echo "<p></p>";
                                    echo "Rudi Rahmawan";
?></h5>

</body>
</html>
<?php
$html = ob_get_contents();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
ob_end_clean();
$pdf->Output('Laporan_Penyewaan.pdf', 'FI');
?>