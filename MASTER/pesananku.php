<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                    <a class="text-center" href="index.php"> <h4>Pesananku</h4></a>
                                <form action="_ubah_admin.php" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="id" value="<?php echo $id; ?>">
                                    </div>
                                    <label class="col-form-label">ID Transaksi</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="ID Transaksi" name="id" value="<?php echo $data['NAMA_ADMIN'];?>">
                                    </div>
                                    <label class="col-form-label">Nama Pelanggan</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Nama Pelanggan" name="nm_plggn" value="<?php echo $data['NAMA_ADMIN'];?>">
                                    </div>                                      
                                    <label class="col-form-label">Bank</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="bank" name="bank" value="<?php echo $data['NAMA_ADMIN'];?>">
                                    </div>
                                    <label class="col-form-label">Tanggal Pesan</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Email" name="email"  value="<?php echo $data['EMAIL_ADMIN'];?>" required>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Lapangan</th>
                                                <th>Jadwal</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        // $id = $_GET['id'];
                                        // $query = "Select * from konfirmasi_pembayaran";
                                        // $query1 = "Select * from konfirmasi_pembayaran where ID_TRANSAKSI='".$id."'";
                                        // $sql = mysqli_query($connect, $query);
                                        // while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $data['ID_ADMIN']; ?></td>
                                                <td><?php echo $data['NAMA_ADMIN']; ?></td>
                                                <td><?php echo $data['NOTLP_ADMIN']; ?></td>
                                            </tr>
                                        </tbody>
                                    <button class="btn login-form__btn submit w-100" name="simpan">Konfirmasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ?>