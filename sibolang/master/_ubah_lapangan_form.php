    <?php
    include 'koneksi.php';
    
    $id = $_POST['rowid'];
    $query1 = "Select * from lapangan WHERE ID_LAPANGAN='".$id."'";
    $sql = mysqli_query($connect, $query1);
	while($data = mysqli_fetch_array($sql)){
    ?>

        <div class="modal-body">
        <form action="_ubah_lapangan.php" method="POST" class="mb-5 login-input" enctype="multipart/form-data">
            <div class="input-group form-group border-bottom border-dark">
                <input type="text" class="form-control text-center form-control-lg"  placeholder="Nama Lapangan" name="nm_lp" value="<?php echo $data['NAMA_LAPANGAN'];?>">
                <div class="input-group-prepend"><i class="fa fa-pencil mt-4"></i></div>
            </div>
            
            <div class="text-center">
                <img alt="" class="img-thumbnail" width="300" src="images/lapangan/<?php echo $data['FOTO_LAPANGAN']; ?>">
            </div><br><br>

            <label class="col-form-label">Harga Sewa</label>
            <div class="input-group form-group border-bottom border-dark ">
                <input type="text" class="form-control input-default"  placeholder="Harga Sewa" name="hg_sw" value="<?php echo $data['HARGA_SEWA'];?>">
                <div class="input-group-prepend"><i class="fa fa-pencil mt-4"></i></div>
            </div>
            
            <input type="checkbox" name="ubahfoto" >Ubah Foto?
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih file gambar...</label>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="btn login-form__btn submit w-100" name="simpan">Simpan</button>
        </form>
        </div>
    <?php }?>