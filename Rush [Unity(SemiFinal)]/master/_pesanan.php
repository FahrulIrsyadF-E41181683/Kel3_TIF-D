<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>PELANGGAN</th>
                                                <th>BANK</th>
                                                <th>HARGA</th>
                                                <th>TANGGAL</th>
                                                <th>WAKTU MEMBAYAR</th>
                                                <th>BUKTI</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        $query = "SELECT A.ID_TRANSAKSI,B.NAMA_PELANGGAN,C.NAMA_BANK,A.HARGA_TOTAL,A.TANGGAL_TRANSAKSI,A.WAKTU_PEMBAYARAN,
                                        A.BUKTI_PEMBAYARAN,A.STATUS_PEMBAYARAN FROM transaksi A join pelanggan B on A.ID_PELANGGAN=B.ID_PELANGGAN 
                                        LEFT JOIN bank C on A.ID_BANK=C.ID_BANK"
                                        
                                        ;
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['NAMA_PELANGGAN']; ?></td>
                                                <td><?php echo $data['NAMA_BANK']; ?></td>
                                                        <?php $angka=$data['HARGA_TOTAL']; //menampilkan harga rupiah?>
                                                <td> <?php echo number_format($angka, 0, '', '.'); ?></td>
                                                <td><?php echo $data['TANGGAL_TRANSAKSI']; ?></td>
                                                <td><?php echo $data['WAKTU_PEMBAYARAN']; ?></td>
                                                <td><img alt="" class="" width="100" src="images/bukti/<?php echo $data['BUKTI_PEMBAYARAN']; ?>"></td>

                                                <td>
                                                    <span>
                                                        <div class="btn-group mr-2 mb-2">
                                                        <a href="_konfirm.php?id=<?php echo $data['ID_TRANSAKSI']; ?>" data-toggle="tooltip" data-placement="top" title="">
                                                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editmodal" data-whatever="@getbootstrap">
                                                            Konfirmasi
                                                        </button> 
                                                        </a>      
                                                        &nbsp;
                                                        <a href="_hapus_konfirm.php?id=<?php echo $data['ID_JAM']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger sweet-confirm">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button> 
                                                        </a>
                                                        </div>
                                                    </span>
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