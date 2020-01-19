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
    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap"> <a href="cetak.php">Cetak</a></button>
<!-- tambahpelanggan -->                                          
<div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CETAK DATA</h5>
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


<!-- Table -->
<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>ID TRANSAKSI</th>
            <th>ID Pelanggan</th>
            <th>JAM PESANAN</th>
            <th>TANGGAL PESANAN</th>
            <th>HARGA TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php                                         
            $id = $_GET['id'];
            $query = "SELECT D.ID_TRANSAKSI,D.ID_PELANGGAN, A.JAM, A.TANGGAL_PESANAN, D.HARGA_TOTAL 
            FROM detail_transaksi A JOIN transaksi D ON D.ID_TRANSAKSI = A.ID_TRANSAKSI ";
            $query1 = "SELECT D.ID_TRANSAKSI,D.ID_PELANGGAN, A.JAM, A.TANGGAL_PESANAN, D.HARGA_TOTAL 
            FROM detail_transaksi A JOIN transaksi D ON D.ID_TRANSAKSI = A.ID_TRANSAKSI WHERE TANGGAL_PESANAN='".$id."'  ";
            $sql = mysqli_query($connect, $query);
            while($data = mysqli_fetch_array($sql)){
            ?>
        <tr>
            <td><?php echo $data['ID_TRANSAKSI']; ?></td>
            <td><?php echo $data['ID_PELANGGAN']; ?></td>
            <td><?php echo $data['JAM']; ?></td>
            <td><?php echo $data['TANGGAL_PESANAN']; ?></td>
            <td><?php echo $data['HARGA_TOTAL']; ?></td>


    </td>
</tr>
<?php } ?>
</tbody>
    <tfoot>
        <tr>
        <th>ID TRANSAKSI</th>
            <th>ID Pelanggan</th>
            <th>JAM PESANAN</th>
            <th>TANGGAL PESANAN</th>
            <th>HARGA TOTAL</th>
        </tr>
    </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>