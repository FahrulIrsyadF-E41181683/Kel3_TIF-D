<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
</head>
<body>

    <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>

	<?php
    include 'koneksi.php';
    
    $id = $_GET['id'];
    $query1 = "Select * from admin WHERE ID_ADMIN='".$id."'";
    $sql = mysqli_query($connect, $query1);
	while($data = mysqli_fetch_array($sql)){
     ?>
        
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
                     </div>

        <div class="modal-body">
		<form method="post" action="_edit_admin.php">
        <div class="row">
        <div class="form-group col col-md-6 ml-auto">

           <input type="text" name="id" value="<?php echo $id; ?>"> <br>
           
            <label class="col-form-label">Nama Admin</label>
            <input type="text" name="nm_admin" value="<?php echo $data['NAMA_ADMIN'];?>">
             
            <label class="col-form-label">Password</label>
             <input type="password" name="password" class="form-control input-default" value="<?php echo $data['PASSWORD_ADMIN'];?>">
            
             <label class="col-form-label">Jenis Kelamin</label>
             <select class="form-control" name="jenis_kelamin" id="sel1" value="<?php echo $data['JENIS_KELAMIN'];?>">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
                                                                    
            <label class="col-form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control input-default" style="height:125px;"  value="<?php echo $data['ALAMAT_ADMIN'];?>"></textarea>
        

        <label class="col-form-label">No Hp</label>
        <input type="text" name="no_hp" class="form-control input-default" maxlength="13" 
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $data['NOTLP_ADMIN'];?>">
        
        <label class="col-form-label">Email</label>
        <input type="email" name="email" class="form-control input-default" value="<?php echo $data['EMAIL_ADMIN'];?>">

        <label class="col-form-label">Foto Profil</label>
        <input type="file" name="foto" class="form-control input-default" value="<?php echo $data['FOTO_ADMIN'];?>">      
        <input type="checkbox" name="ubahfoto" >Ubah Foto?
    </div>
</div>
</div>


<div class="modal-footer">
<input type="reset" class="btn btn-secondary" value="Reset" style="color:white;">
<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                    </div> 
		</form>
		<?php }?>
 
</body>
</html>