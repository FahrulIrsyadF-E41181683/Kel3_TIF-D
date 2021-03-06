<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <div class="col-sm-12">
            <div class="col-sm-12 col-md-6">
                <label>
                    <h4>Data Harga</h4>
                </label>
            </div>
<div class="col-sm-12 col-md-6">
    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>
<!-- tambahmodal -->                                          
<div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span>
            </button>
        </div>
<div class="modal-body">
    <form  method="post" action="_tambah_harga.php" enctype="multipart/form-data"> 
        <div class="row">
        <div class="form-group col col-md-6 ml-auto">
            <label class="col-form-label">Nama Lapangan</label>
            <input type="text" name="nm_lapangan" class="form-control input-default" maxlength="15" placeholder="Nama Lapangan">
        </div>
<div class="form-group col col-md-6 ml-auto">
            <label class="col-form-label">Harga Sewa</label>
            <input type="text" name="harga_sewa" class="form-control input-default" maxlength="5" 
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Harga Sewa">
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
                                       
<table class="table table-striped table-bordered zero-configuration">
    <thead>
    <tr>
        <th>ID Lapangan</th>
        <th>Nama Lapangan</th>
        <th>Harga Sewa</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM lapangan";
        $query1 = "SELECT * FROM lapangan WHERE ID_LAPANGAN='".$id."'";
        $sql = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($sql)){
        ?>
    <tr>
        <td><?php echo $data['ID_LAPANGAN']; ?></td>
        <td><?php echo $data['NAMA_LAPANGAN']; ?></td>
        <td><?php echo $data['HARGA_SEWA']; ?></td>
        <td>
    <span>
    <div class="btn-group mr-2 mb-2">
        <a href="_ubah_harga_form.php?id=<?php echo $data['ID_LAPANGAN']; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editmodal" data-whatever="@getbootstrap">
            <i class="fa fa-pencil color-muted m-r-5"></i>
            </button> 
        </a>      
            &nbsp;
        <a href="_hapus_harga.php?id=<?php echo $data['ID_LAPANGAN']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
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
    <tfoot>
    <tr>
        <th>ID Lapangan</th>
        <th>Nama Lapangan</th>
        <th>Harga Sewa</th>
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