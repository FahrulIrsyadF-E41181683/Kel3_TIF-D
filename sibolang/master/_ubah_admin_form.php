
<?php
    include 'koneksi.php';
    
    $id = $_POST['rowid'];
    $query1 = "Select * from admin WHERE ID_ADMIN='".$id."'";
    $sql = mysqli_query($connect, $query1);
	while($data = mysqli_fetch_array($sql)){
    ?>
                <a class="text-center" href="home.php"> <h4>Ubah Data Admin</h4></a>
<form action="_ubah_admin.php" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
        <label class="col-form-label">ID Admin</label>
    <div class="form-group">
        <input type="text" class="form-control" readonly="readonly" name="id" value="<?php echo $id; ?>">
    </div>
        <label class="col-form-label">Nama Admin</label>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="Nama Admin" name="nm_admin" value="<?php echo $data['NAMA_ADMIN'];?>">
    </div>
        <label class="col-form-label">Password</label>
    <div class="form-group">
        <input type="text" class="form-control input-default"  placeholder="Password" name="password" value="<?php echo $data['PASSWORD_ADMIN'];?>">
    </div>
        <label class="form-group">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" value="<?php echo $data['JENIS_KELAMIN'];?>">
                <option name="lk">Laki-laki</option>
                <option name="pr">Perempuan</option>
            </select> <br>
        <label class="col-form-label">Alamat</label>
    <div class="form-group">
        <input type="text-area" class="form-control"  placeholder="Alamat" name="alamat"  value="<?php echo $data['ALAMAT_ADMIN'];?>" required>
    </div>
        <label class="col-form-label">No Hp</label>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="No Hp" name="nohp" maxlength="13" 
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $data['NOTLP_ADMIN'];?>" required>
    </div>
        <label class="col-form-label">Email</label>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="Email" name="email"  value="<?php echo $data['EMAIL_ADMIN'];?>" required>
    </div>
        <input type="checkbox" name="ubahfoto">Ubah Foto?
    <div class="input-group mb-3">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto">
            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih file</label>                                            
    </div>
</div>
    <button class="btn login-form__btn submit w-100" name="simpan">Simpan</button>
    
</form>

    <?php } ?>