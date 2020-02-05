<html>
<head>
	<title>PDF</title>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
   body
   {
    margin:30px;
    padding: 50px;
    background-color:WHITE;
    border: 1px solid black;
   }
   
  </style>
  

</head>
<body>
    <h2 align = "center">Laporan Transaksi Rush Badminton</h2><hr>
    <div class = "lp2">
<div class="list">
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
</div>
        <button type="submit">Tampilkan</button>
        <a href="<?php echo base_url(); ?>">Reset Filter</a>
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />


    
    <div class="table-responsive">
    <table class="table">
    <thead class="thead-dark">
            <tr>
      <th scope="col">TANGGAL</th>
      <th scope="col">ID TRANSAKSI</th>
      <th scope="col">ID PELANGGAN</th>
      <th scope="col">ID BANK</th>
      <th scope="col">METODE</th>
      <th scope="col">HARGA TOTAL</th>
      <th scope="col">WAKTU PEMBAYARAN</th>
      <th scope="col">BUKTI PEMBAYARAN</th>
      <th scope="col">STATUS PEMBAYARAN</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tgl));
            
    		echo "<tr>";
    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->ID_TRANSAKSI."</td>";
    		echo "<td>".$data->ID_PELANGGAN."</td>";
            echo "<td>".$data->ID_BANK."</td>";
            echo "<td>".$data->METODE."</td>";
            echo "<td>".$data->HARGA_TOTAL."</td>";
            echo "<td>".$data->WAKTU_PEMBAYARAN."</td>";
            echo "<td>".$data->BUKTI_PEMBAYARAN."</td>";
    		echo "<td>".$data->STATUS_PEMBAYARAN."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
    
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
         </tbody>
</table>
</div>

</body>
</html>
