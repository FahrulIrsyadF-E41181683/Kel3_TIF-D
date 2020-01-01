<?php
  include 'koneksi.php';
  session_start();
  if(isset($_GET['ID_TRANSAKSI'])){
    $id_pesanan = $_GET['ID_TRANSAKSI'];
    $result_pesanan = mysqli_query($connect, "SELECT 
    pelanggan.NAMA_PELANGGAN, transaksi.TANGGAL_TRANSAKSI, transaksi.HARGA_TOTAL, transaksi.STATUS_PEMBAYARAN 
    FROM transaksi,pelanggan 
    WHERE transaksi.ID_PELANGGAN = pelanggan.ID_PELANGGAN AND transaksi.ID_TRANSAKSI = '$id_pesanan' ");
    $data_pesanan = mysqli_fetch_assoc($result_pesanan);
    if($data_pesanan['STATUS_PEMBAYARAN']==0){
        $ket_status = 'Belum Lunas';
    }else {
        $ket_status = 'Lunas';
    }
    $nama_user = $data_pesanan['NAMA_PELANGGAN'];
    $tgl_psn = $data_pesanan['TANGGAL_TRANSAKSI'];
    $total_harga = $data_pesanan['HARGA_TOTAL'];
    //$ket_status = $data_pesanan['KET_STATUS'];
  }
  require 'fpdf.php';
$pdf = new FPDF('L','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->isFinished = false;
// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',16);
// mencetak string 
$pdf->Image('../master/images/logo-text.png',40,12,19,19);
$pdf->Cell(275,12,'Rush Badminton',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(275,7,'Jln. Kalimantan, Gg. 14, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',0,1,'C');
$pdf->Cell(275,4,'Kabupaten Jember - 0851-0547-0333',0,1,'C');
$pdf->Cell(235,3,'','',1);
$pdf->Cell(20,1,'',0,'B',1);
$pdf->Cell(235,1,'','B',1);
$pdf->Cell(20,1,'',0,'B',1);
$pdf->Cell(235,1,'','B',1);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','B',14);
$pdf->Cell(20,1,'',0,'B',1);
$pdf->Cell(235,12,'NOTA PEMESANAN',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,'',0,1);
// Menampilkan Header Tabel
$pdf->Cell(31,7,'',0,0,'C');
$pdf->Cell(220,7,'Atas Nama : '.$nama_user.'',0,1,'R');
$pdf->SetFont('Times','B',10);
$pdf->Cell(25,7,'',0,0,'C');
$pdf->Cell(115,7,'ID PESANAN : '.$id_pesanan.'','T',0,'L');
$pdf->Cell(110,7,$tgl_psn,'T',1,'R');
$pdf->SetFont('Times','',10);
$pdf->Cell(25,6,'',0,0,'C');
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(80,6,'Lapangan',1,0,'C');
$pdf->Cell(35,6,'Metode Bayar',1,0,'C');
$pdf->Cell(30,6,'Jam',1,0,'C');
$pdf->Cell(40,6,'Harga',1,1,'C');
$result_detail = mysqli_query($connect, "SELECT 
transaksi.HARGA_TOTAL, detail_transaksi.JAM, detail_transaksi.NAMA_LAPANGAN, transaksi.METODE
FROM transaksi, detail_transaksi
WHERE transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI and transaksi.ID_transaksi = '$id_pesanan'");
$i = 0;
while($data_detail = mysqli_fetch_assoc($result_detail)){
  $nama_lap = $data_detail['NAMA_LAPANGAN'];
        $sql2=mysqli_query($connect, "SELECT HARGA_SEWA from lapangan where NAMA_LAPANGAN='$nama_lap'");
        while($sqlss=mysqli_fetch_array($sql2)){
          $harga=$sqlss['HARGA_SEWA'];
        }

  $i+=1;
    if($data_detail['METODE']==1){
        $ket_metode = 'Transfer Bank';
    }else {
        $ket_metode = 'Bayar Di Tempat';
    }
  $quantity = $data_detail['JAM'];
  $sub_total = $harga;
  $nama_produk = $nama_lap;
  //$ket_status = $data_detail['METODE'];
  $daftar_produk = "$nama_produk";
  $cellWidth=80; //lebar sel
	$cellHeight=6; //tinggi sel satu baris normal
	
	//periksa apakah teksnya melibihi kolom?
	if($pdf->GetStringWidth($daftar_produk) < $cellWidth){
		//jika tidak, maka tidak melakukan apa-apa
		$line=1;
	}else{
		//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
		//dengan memisahkan teks agar sesuai dengan lebar sel
		//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
		
		$textLength=strlen($daftar_produk);	//total panjang teks
		$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
		$startChar=0;		//posisi awal karakter untuk setiap baris
		$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
		$textArray=array();	//untuk menampung data untuk setiap baris
		$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
		
		while($startChar < $textLength){ //perulangan sampai akhir teks
			//perulangan sampai karakter maksimum tercapai
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($daftar_produk,$startChar,$maxChar);
			}
			//pindahkan ke baris berikutnya
			$startChar=$startChar+$maxChar;
			//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
			array_push($textArray,$tmpString);
			//reset variabel penampung
			$maxChar=0;
			$tmpString='';
			
		}
		//dapatkan jumlah baris
		$line=count($textArray);
	}
  $pdf->Cell(25,($line * $cellHeight),'',0,0,'C');
  $pdf->Cell(10,($line * $cellHeight),"$i.",1,0,'C');
  $xPos=$pdf->GetX();
  $yPos=$pdf->GetY();
  $pdf->MultiCell($cellWidth,$cellHeight,$daftar_produk,1,'C');
  $pdf->SetXY($xPos + $cellWidth , $yPos);
  $pdf->Cell(35,($line * $cellHeight),$ket_metode,1,0,'C');
    $pdf->Cell(30,($line * $cellHeight),$quantity,1,0,'C');
  $pdf->Cell(40,($line * $cellHeight),'Rp. '.number_format($sub_total, 0,".",".").',-',1,1,'C');

}
$pdf->SetFont('Times','B',10);
$pdf->Cell(25,7,'',0,0,'C');
$pdf->Cell(145,7,'',0,0,'C');
$pdf->Cell(30,7,'Total Harga :','TB',0,'R');
$pdf->Cell(50,7,'Rp. '.number_format($total_harga, 0,".",".").',-','TB',1,'L');
$pdf->Cell(25,7,'',0,0,'C');
$pdf->Cell(145,7,'',0,0,'C');
$pdf->Cell(30,7,'Status Pesanan :','TB',0,'R');
$pdf->Cell(50,7,$ket_status,'TB',1,'L');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$pdf->Cell(275,12,'--   Terimakasih atas pesanan Anda.   --',0,1,'C');
$pdf->isFinished = true;

$pdf->Output();