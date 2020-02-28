<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <div class="col-sm-12">
            <div class="col-sm-12 col-md-6">
                <label>
                    <h4>Komentar</h4>
                </label>
            </div>
<div class="col-sm-12 col-md-6">
    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH KOMENTAR</button>
<!-- tambahmodal -->                                          
        <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah komentar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <form  method="post" action="_tambah_komentar.php" enctype="multipart/form-data"> 
                <div class="row">
                <div class="form-group col col-md-12 ml-auto">
                    <label class="col-form-label">Komentar</label>
                    <textarea class="form-control" name="komen" rows="5" required placeholder="Tulis Komentar di sini" data-msg="Tulis sesuatu untuk kita"></textarea>
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
    <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Komentar</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $id = $_GET['id'];
        $query = "SELECT * FROM komentar order by ID_KOMENTAR desc";
        $sql = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($sql)){
        ?>
    <tr class="text-center">
        <td><?php echo $no++; ?></td>
            
            <?php if($data['ID_PELANGGAN']=='ADMIN'){?>
        <td>ADMIN</td>
                <?php }else{
                    $pl = mysqli_query($connect, "SELECT * FROM pelanggan where ID_PELANGGAN='".$data['ID_PELANGGAN']."'");
                    $pl2 = mysqli_fetch_array($pl);
                    ?>
        <td><?php echo $pl2['NAMA_PELANGGAN']; ?></td>
                <?php } ?>

        <td><?php echo $data['TANGGAL_KOMENTAR']; ?></td>
        <td><?php echo $data['WAKTU']; ?></td>
        <td><?php echo $data['KOMENTAR']; ?></td>
        <td>
    <span>
    <div class="btn-group mr-2 mb-2">
        <a href="_hapus_komentar.php?id=<?php echo $data['ID_KOMENTAR']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
            <button type="button" class="btn btn-danger sweet-confirm">
            <i class="fa fa-trash fa-1x"></i>
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