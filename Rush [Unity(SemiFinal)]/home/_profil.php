
<body class="h-100">

    <?php //ambil data admin di database
        $sql = mysqli_query($connect, "Select * from admin where ID_ADMIN='".$_SESSION['id_admin']."'");
        while($data = mysqli_fetch_array($sql)){
                $foto=$data['FOTO_ADMIN'];
    ?>
    <div class="login-form-bg h-100 mt-3 mb-3">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-9">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                            <a class="text-center" href="#"> <h4>Profil</h4></a>
                            <form action="_ubah_profil.php" method="POST" class="mt-5 mb-5" enctype="multipart/form-data">
                                
                            <input type="hidden" name="id" value="<?php echo $data['ID_ADMIN'];?>">
                            <div class="container">
                                <div class="row">
                            <div class="col-sm">
                            
                                        <div class="input-group mb-3 gambar-ganti">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto">
                                    <label  for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">    

                                            <?php if(empty($foto)){ ?>
                                            <img class="bulat gambar1" src="images/avatar/admin.png"  width='200px' height='200px'>
                                                <?php }else{ ?>
                                            <img class="bulat gambar1" src="images/avatar/<?php echo $foto;?>"  width='200px' height='200px'>
                                                <?php } ?>
                                            <img class="bulat gambar2" src="images/gantifoto.png"  width='200px' height='200px'>
                                            
                                            
                                    </label>  
                                    </div>
                                    <img class height="200px">
                                    <br>
                                    <input class="mb-3" type="checkbox" name="ubahfoto">Ubah Foto?
                            </div>
                            <div class="col-sm-7">
                                <label class="col-form-label">Nama Admin</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Nama Admin" name="nm_admin" value="<?php echo $data['NAMA_ADMIN'];?>">
                                    </div>
                                        <label class="col-form-label">Password</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-default"  placeholder="Password" name="password" value="<?php echo $data['PASSWORD_ADMIN'];?>">
                                    </div>
                                </div>
                            </div>
                                    

                            <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                <label class="form-group">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                    <option><?php echo $data['JENIS_KELAMIN'];?></option>
                                                    <option name="lk">Laki-laki</option>
                                                    <option name="pr">Perempuan</option>
                                                </select> <br>
                                            <label class="col-form-label">Alamat</label>
                                        <div class="form-group">
                                            <input type="text-area" class="form-control"  placeholder="Alamat" name="alamat"  value="<?php echo $data['ALAMAT_ADMIN'];?>" required>
                                        </div>

                                </div>
                                <div class="col-sm">

                                <label class="col-form-label">No Hp</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="No Hp" name="nohp" maxlength="13" minlength="11"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $data['NOTLP_ADMIN'];?>" required>
                                        </div>
                                            <label class="col-form-label">Email</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Email" name="email"  value="<?php echo $data['EMAIL_ADMIN'];?>" required>
                                        </div>

                                </div>
                            </div>
                                    <button class="btn login-form__btn submit w-100" name="simpan">Simpan Perubahan</button>
                                </form>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    





