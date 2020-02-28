
    <?php
        include 'koneksi.php';        
        $id = $_POST['rowid'];
        $query1 = "SELECT * FROM pelanggan WHERE ID_PELANGGAN='".$id."'";
        $sql = mysqli_query($connect, $query1);
        while($data = mysqli_fetch_array($sql)){
    ?>
                <h4 class="text-center">Pelanggan</h4>
    <form action="_ubah_pelanggan.php" method="POST" class="mt-3 mb-5 login-input" enctype="multipart/form-data">
                <div class="text-center" >
                        <img alt="" class="rounded-circle" width="200" src="images/pelanggan/<?php echo $data['FOTO_PELANGGAN']; ?>"><br><br>
                </div>
                    <label class="col-form-label">Nama Pelanggan</label>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Nama Pelanggan" name="nm_pl" value="<?php echo $data['NAMA_PELANGGAN'];?>">
                </div>
                    <label class="col-form-label">Password</label>
                <div class="form-group">
                    <input type="password" class="form-control input-default"  readonly name="password" value="<?php echo $data['PASSWORD_PELANGGAN'];?>">
                </div>
                    <label class="form-group">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" value="<?php echo $data['JENIS_KELAMIN'];?>">
                            <option><?php echo $data['JENIS_KELAMIN'];?></option>
                                    <?php if($data['JENIS_KELAMIN']=="Perempuan"){?>
                            <option name="lk">Laki-laki</option>
                                    <?php }else{ ?>
                            <option name="pr">Perempuan</option>
                                    <?php } ?>

                        </select> <br>
                    <label class="col-form-label">No HP</label>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="No Hp" name="no_hp" maxlength="13" 
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $data['NOTLP_PELANGGAN'];?>" required>
                </div>
                    <label class="col-form-label">Alamat</label>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Alamat" name="alamat_pl"  value="<?php echo $data['ALAMAT_PELANGGAN'];?>" required>
                </div>
                    <label class="col-form-label">Email</label>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Email" name="email_pl"  value="<?php echo $data['EMAIL_PELANGGAN'];?>" required>
                </div>
                    <!-- <input type="checkbox" name="ubahfoto">Ubah Foto?
                <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih file</label>                                            
                </div> -->
            </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button class="btn login-form__btn submit w-100" name="simpan">Simpan</button>
        </form>
<?php }?>