<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                <div class="col-sm-12">
                                        <div class="col-sm-12 col-md-6">
                                            <label>
                                                <h4>Data Paket</h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label style="text-aling:right;">
                                                <a href="">
                                                    <button type="button" class="btn mb-1 btn-primary btn-lg">TAMBAH DATA</button>
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID Admin</th>
                                                <th>Nama Admin</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Foto Profil</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "Select * from tabel_admin";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $data['id_admin']; ?></td>
                                                <td><?php echo $data['nama_admin']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td><?php echo $data['no_hp']; ?></td>
                                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                                <td><?php echo $data['foto_profil']; ?></td>
                                                <td><?php echo $data['tanggal_daftar']; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['password']; ?></td>
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
                                                <th>ID Admin</th>
                                                <th>Nama Admin</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Foto Profil</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Username</th>
                                                <th>Password</th>
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