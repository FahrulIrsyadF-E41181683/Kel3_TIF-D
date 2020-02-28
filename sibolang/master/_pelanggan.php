<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">    
        <div class="table-responsive">
        <div class="col-sm-12">
        <div class="col-sm-12 col-md-6">
            <label>
            <h4>Data Pelanggan</h4>
            </label>
        </div>
    <div class="col-sm-12 col-md-6">
        <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>
<!-- tambahpelanggan -->                                          
    <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span>
            </button>
    </div>
    <div class="modal-body">
        <form  method="post" action="_tambah_pelanggan.php" enctype="multipart/form-data"> 
    <div class="row">
        <div class="form-group col col-md-6 ml-auto">
            <label class="col-form-label">Nama Pelanggan</label>
                <input type="text" name="nm_pl" class="form-control input-default" placeholder="Nama Pelanggan">
            <label class="col-form-label">Password</label>
                <input type="password" name="password" class="form-control input-default" placeholder="Password">
            <label class="col-form-label">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="sel1">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>
            <label class="col-form-label">Alamat</label>
                <input type="text" name="alamat_pl" class="form-control input-default" placeholder="Alamat">
    </div>
    <div class="form-group col col-md-6 ml-auto">
            <label class="col-form-label">No Hp</label>
                <input type="text" name="no_hp" class="form-control input-default" maxlength="13" 
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="No Hp">
            <label class="col-form-label">Email</label>
                <input type="email" name="email_pl" class="form-control input-default" placeholder="Email">
            <label class="col-form-label">Foto Profil</label>
                <input type="file" name="foto" class="form-control input-default">             
            </div>
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
    </div>
<!-- tambahpelanggan --> 

<!-- edit modal -->
<div class="modal fade" id="myPelanggan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="pel-data modal-body">
            </div>
            </div>
        </div>
    </div>
<!-- edit modal -->

    <!-- Table -->
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Foto Profil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php                                         
                $id = $_GET['id'];
                $query = "SELECT * FROM pelanggan";
                $query1 = "SELECT * FROM pelanggan WHERE ID_PELANGGAN='".$id."'";
                $sql = mysqli_query($connect, $query);
                while($data = mysqli_fetch_array($sql)){
                ?>
            <tr>
                <td><?php echo $data['ID_PELANGGAN']; ?></td>
                <td><?php echo $data['NAMA_PELANGGAN']; ?></td>
                <td><?php echo $data['JENIS_KELAMIN']; ?></td>
                <td><?php echo $data['NOTLP_PELANGGAN']; ?></td>
                <td><?php echo $data['ALAMAT_PELANGGAN']; ?></td>
                <td><?php echo $data['EMAIL_PELANGGAN']; ?></td>
                <td><img alt="" width="100" src="images/pelanggan/<?php echo $data['FOTO_PELANGGAN']; ?>" class="rounded-circle"></td>
                <td>
    <span>
    <div class="btn-group mr-2 mb-2">
        <a href='#myPelanggan' class='pelanggan' id='<?php echo $data['ID_PELANGGAN']; ?>' data-toggle='modal'>
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-pencil color-muted m-r-5"></i>
                </button>
        </a>                                                             
    &nbsp;
        <a href="_hapus_pelanggan.php?id=<?php echo $data['ID_PELANGGAN']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" 
            data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
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