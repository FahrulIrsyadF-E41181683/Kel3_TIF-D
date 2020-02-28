<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                <div class="col-sm-12">
                                        <div class="col-sm-12 col-md-6">
                                            <label>
                                                <h4>Data Lapangan</h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                        
                                            <!-- <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button> -->
                                        <!-- tambahlapangan -->                                          
                                            <!-- <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <form  method="post" action="_tambah_lapangan.php" enctype="multipart/form-data"> 
                                                                <div class="row">
                                                                <div class="form-group col col-md-6 ml-auto">
                                                                    <label class="col-form-label">Nama Lapangan</label>
                                                                    <input type="text" name="nm_lapangan" class="form-control input-default" placeholder="Nama Lapangan">
                                                                    <label class="col-form-label">Harga</label>
                                                                    <textarea type="text" name="harga" class="form-control input-default" placeholder="Harga" style="height:125px;"></textarea>
                                                                    <label class="col-form-label">Foto Lapangan</label>
                                                                    <input type="file" name="foto" class="form-control input-default"> 
                                                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                            <input type="reset" class="btn btn-danger" value="Reset" style="color:white;">
                                                            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                        </div>  
                                        
                                        </div> -->

<!-- edit modal -->
    <div class="modal fade" id="myLapangan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="lap-data modal-body">
            </div>
            </div>
        </div>
    </div>
<!-- edit modal -->

                                </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>ID Lapangan</th>
                                                <th>Nama Lapangan</th>
                                                <th>Harga Sewa</th>
                                                <th>Foto Lapangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=1;
                                        $id = $_GET['id'];
                                        $query = "Select * from lapangan";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['ID_LAPANGAN']; ?></td>
                                                <td><?php echo $data['NAMA_LAPANGAN']; ?></td>
                                                <td><?php echo $data['HARGA_SEWA']; ?></td>
                                                <td><img alt="" class="img-thumbnail" width="100" src="images/lapangan/<?php echo $data['FOTO_LAPANGAN']; ?>"></td>
                                                <td>
                                                <span>
                                                    <div class="btn-group mr-2 mb-2">
                                                        <a href='#myLapangan' class='lapangan' id='<?php echo $data['ID_LAPANGAN']; ?>' data-toggle='modal'>
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                                </button>
                                                        </a>
                                                        <h5 class="text-primary mt-2 ml-1">Edit</h5>
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