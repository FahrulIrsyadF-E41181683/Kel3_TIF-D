<!-- ubah modal -->
<div class="modal fade" id="myPesan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="pesan-data modal-body">
                </div>
                </div>
            </div>
        </div>
<!-- ubah modal -->

<?php
ini_set('date.timezone', 'Asia/Jember');
date_default_timezone_get();
$waktu_sekarang = date('H:i:s');
?>
<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>NAMA<br>PELANGGAN</th>
                                                <th>METODE<br>PEMBAYARAN</th>
                                                <th>HARGA</th>
                                                <th>TANGGAL<br> & WAKTU</th>
                                                <th>WAKTU<br>MEMBAYAR</th>
                                                <th>STATUS</th>
                                                <th>BUKTI</th>
                                                <th>Action & Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        $query = "SELECT A.ID_TRANSAKSI,A.ID_BANK,B.NAMA_PELANGGAN,C.NAMA_BANK,A.HARGA_TOTAL,A.TANGGAL_TRANSAKSI,A.WAKTU_PEMBAYARAN,A.STATUS_PEMBAYARAN,
                                        A.BUKTI_PEMBAYARAN,A.STATUS_PEMBAYARAN,A.WAKTU_TRANSAKSI,A.WAKTU_HABIS FROM transaksi A join pelanggan B on A.ID_PELANGGAN=B.ID_PELANGGAN 
                                        LEFT JOIN bank C on A.ID_BANK=C.ID_BANK ORDER by A.ID_TRANSAKSI DESC";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){

                    //kalo waktu habisnya sudah habis
                    $waktu_habis = $data['WAKTU_HABIS'];
                    $waktu_habis2=strtotime($waktu_habis); //ambil data dari databaser
                    $waktu_sekarang2=strtotime($waktu_sekarang); // jam sekarang
                    $id_trans=$data['ID_TRANSAKSI'];
                    $status = $data['STATUS_PEMBAYARAN'];

                    if($waktu_sekarang2 >= $waktu_habis2 && $status==0){
                        mysqli_query($connect, "UPDATE transaksi SET STATUS_PEMBAYARAN =3 WHERE ID_TRANSAKSI='".$id_trans."'");
                    }
                    //kalo waktu habisnya sudah habis
                                        ?>
                                            <tr class="text-center">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['NAMA_PELANGGAN']; ?></td>

                                                <?php if(($data['ID_BANK'])==1){ ?>
                                                    <td>Bayar Langsung</td>
                                                <?php } else { ?>
                                                    <td>Transfer<br><span class="badge badge-primary"><?php echo $data['NAMA_BANK']; ?></span></td>
                                                <?php } ?>

                                                        <?php $angka=$data['HARGA_TOTAL']; //menampilkan harga rupiah?>
                                                <td> Rp.<?php echo number_format($angka, 0, '', '.'); ?></td>
                                                <td>
                                                    <?php echo $data['TANGGAL_TRANSAKSI']; ?><br>
                                                    <?php echo $data['WAKTU_TRANSAKSI']; ?>
                                                </td>
                                                <td><?php echo $data['WAKTU_PEMBAYARAN']; ?></td>

                                                <!-- //status -->
                                                <?php
                                                if($data['STATUS_PEMBAYARAN']==0){?>
                                                    <td>sedang dalam proses pembayaran</td>
                                                <?php }else if ($data['STATUS_PEMBAYARAN']==1){?>
                                                    <td>sudah dikonfirmasi oleh admin</td>
                                                <?php }else if($data['STATUS_PEMBAYARAN']==2){?>
                                                    <td>dibatalkan pelanggan</td>
                                                <?php }else if($data['STATUS_PEMBAYARAN']==3){?>
                                                    <td>waktu habis</td>
                                                <?php } ?>

                                                <?php if(($data['BUKTI_PEMBAYARAN'])==0){?>
                                                    <td><img alt="" class="" width="100" src="images/bukti/BELUM MEMBAYAR.jpg"></td>
                                                <?php }else{ ?>
                                                <td><img alt="" class="" width="100" src="images/bukti/<?php echo $data['BUKTI_PEMBAYARAN']; ?>"></td>
                                                <?php } ?>

                                                <td>
                                                    <span>
                                                        <div class="btn-group mr-2 mb-2">
                                                        <a href='#myPesan' class='pesan' id='<?php echo $data['ID_TRANSAKSI']; ?>' data-toggle='modal'>
                                                            <button type="button" class="btn btn-primary">Konfirmasi</button>
                                                        </a>     
                                                        &nbsp;
                                                        <a href="_hapus_konfirm.php?id=<?php echo $data['ID_JAM']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger sweet-confirm">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button> 
                                                        </a>
                                                        </div>
                                                    </span>
                                                    <br>
                                                </td>
                                            </tr>
                                                
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>