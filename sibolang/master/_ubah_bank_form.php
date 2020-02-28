
    <?php
    include 'koneksi.php';
    
    $id = $_POST['rowid'];
    $query1 = "Select * from bank WHERE ID_BANK='".$id."'";
    $sql = mysqli_query($connect, $query1);
	while($data = mysqli_fetch_array($sql)){
    ?>
<div class="modal-body">
        <h4 class="text-center">Bank</h4>
    <form action="_ubah_bank.php" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                <label class="col-form-label">Nama Bank</label>
        <div class="input-group form-group border-bottom border-dark ">
                <input type="text" class="form-control input-default"  placeholder="Nama Bank" name="nm_bank" value="<?php echo $data['NAMA_BANK'];?>" required>
                <div class="input-group-prepend"><i class="fa fa-pencil mt-4"></i></div>
        </div>
                <label class="col-form-label">No Rekening</label>
        <div class="input-group form-group border-bottom border-dark ">
                <input type="text" class="form-control input-default"  placeholder="No Rekening" name="no_rek" maxlength="15" value="<?php echo $data['NO_REKENING'];?>"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <div class="input-group-prepend"><i class="fa fa-pencil mt-4"></i></div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button class="btn login-form__btn submit w-100" name="simpan">Simpan</button>
    </form> 
    </div>
<?php }?>