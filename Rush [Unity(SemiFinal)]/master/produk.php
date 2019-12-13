<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                <div class="col-sm-12">
                                        <div class="col-sm-12 col-md-6">
                                            <label>
                                                <h4>Data Produk</h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label style="text-aling:right;">
                                                <a href="">
                                                    <button type="button" class="btn mb-1 btn-primary btn-lg">TAMBAH PRODUK</button>
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Stok</th>
                                                <th>Harga Produk</th>
                                                <th>Foto Produk</th>
                                                <th>Tanggal Input</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "Select * from tabel_produk";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $data['id_produk']; ?></td>
                                                <td><?php echo $data['nama_produk']; ?></td>
                                                <td><?php echo $data['stok']; ?></td>
                                                <td><?php echo $data['harga_produk']; ?></td>
                                                <td><?php echo $data['foto_profil']; ?></td>
                                                <td><?php echo $data['tanggal_daftar']; ?></td>
                                                <td>
                                                    <span>
                                                        <div class="btn-group mr-2 mb-2">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button> 
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button> 
                                                        </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>ID Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Stok</th>
                                                <th>Harga Produk</th>
                                                <th>Foto Produk</th>
                                                <th>Tanggal Input</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>