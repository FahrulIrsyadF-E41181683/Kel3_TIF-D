<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <div class="col-sm-12">
            <div class="col-sm-12 col-md-6">
                <label>
                    <h4>Data Bank </h4>
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
            <form  method="post" action="_tambah_bank.php" enctype="multipart/form-data"> 
                <div class="row">
                <div class="form-group col col-md-6 ml-auto">
                    <label class="col-form-label">Nama Bank</label>
                    <input type="text" name="nm_bank" class="form-control input-default" maxlength="8" placeholder="Nama Bank">
                </div>
        <div class="form-group col col-md-6 ml-auto">
                    <label class="col-form-label">No Rekening</label>
                    <input type="text" name="no_rek" class="form-control input-default" maxlength="15" 
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="No Rekening">
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

<!-- ubah modal -->
    <div class="modal fade" id="myBank" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="bank-data modal-body">
                </div>
                </div>
            </div>
        </div>
<!-- ubah modal -->

<table class="table table-striped table-bordered zero-configuration">
    <thead>
    <tr>
        <th>ID Bank</th>
        <th>Nama Bank</th>
        <th>No Rekening</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM bank";
        $query1 = "SELECT * FROM bank WHERE ID_BANK='".$id."'";
        $sql = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($sql)){
        ?>
    <tr>
        <td><?php echo $data['ID_BANK']; ?></td>
        <td><?php echo $data['NAMA_BANK']; ?></td>
        <td><?php echo $data['NO_REKENING']; ?></td>
        <td>
    <span>
    <div class="btn-group mr-2 mb-2">
                    <a href='#myBank' class='bank' id='<?php echo $data['ID_BANK']; ?>' data-toggle='modal'>
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-pencil color-muted m-r-5"></i>
                            </button>
                    </a>    
            &nbsp;
        <a href="_hapus_bank.php?id=<?php echo $data['ID_BANK']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
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