<?php
    session_start();
    include 'koneksi.php';
?>

<!-- font awesome -->
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<div class="halaman">
	
	<i class="fas fa-money-check text-warning fa-6x"></i>
	<h2>Silahkan Pilih Bank Tujuan</h2>
	
		<select name="bank" id="bank" class="form-control input-defaut" onchange="changeValue(this.value)">
			<option value="">-Pilih Bank-</option>
					<?php
					$result = mysqli_query($connect, "select NAMA_BANK from bank");
					// $jsArray="var BK2 = new Array();\n";

					while ($options = mysqli_fetch_assoc($result)) {?>
					
					<option  value="<?php echo $options['NAMA_BANK'];?>"><?php echo $options['NAMA_BANK'];?></option>
					<?php }?>

					</select>
					<br>
					<h6>No. Virtual Account :</h6>
					<h1><label type="text" name="rek" id="rek" class="text-uppercase text-danger">------------</label></h1>

	<p>waktu pembayaran anda adalah 60 menit, terhitung saat tombol bayar ditekan</p>
	<button class="btn btn-danger btn-lg btn-block" name="bayar" id="bayar">Bayar</button>
</div>

<!-- untuk menampilkan no rek berdasarkan nama bank -->
<script type="text/javascript">
			$("#bank").change(function(){

				// variabel dari nilai combo box bank
				var nm_bank = $('#bank').val();
				// Menggunakan ajax untuk mengirim dan dan menerima data dari server
				$.ajax({
					type: "POST",
					dataType: "html",
					url: "ambil-data.php",
					data: "nm_bank="+nm_bank,

					success: function(data){
					$("#rek").html(data);
				}
			});
			
		});
</script>

