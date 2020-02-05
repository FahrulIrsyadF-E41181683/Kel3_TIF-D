<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="8">
	<tr>
		<th>Tanggal</th>
		<th>ID TRANSAKSI</th>
		<th>ID BANK</th>
		<th>HARGA TOTAL</th>
		<th>WAKTU BAYAR</th>
	</tr>

    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tgl));

    		echo "<tr>";
    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->ID_TRANSAKSI."</td>";
    		echo "<td>".$data->ID_BANK."</td>";
			echo "<td>".$data->HARGA_TOTAL."</td>";
			echo "<td>".$data->WAKTU_PEMBAYARAN."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
