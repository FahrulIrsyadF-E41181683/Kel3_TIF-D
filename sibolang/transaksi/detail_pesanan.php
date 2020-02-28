
    <?php
    include 'koneksi.php';

    $id = $_POST['rowid'];
    $query1 = "Select * from transaksi WHERE ID_TRANSAKSI='".$id."'";
    $sql = mysqli_query($connect, $query1);
	while($data = mysqli_fetch_array($sql)){
    ?>

    <div class="modal-body">
        <!-- <a class="text-center"> <h4>Ubah Data Jam</h4></a> -->
    <form action="" method="POST" class="mb-5 login-input" enctype="multipart/form-data">
        <h4 class="text-center text-dark">Jam</h4>
        <label class="col-form-label">ID Jam</label>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" value="<?php echo $id; ?>" disabled>
        </div>
        <label class="col-form-label">Jam</label>
        <div class="input-group form-group border-bottom border-dark ">
                <input type="text" class="form-control input-default"  placeholder="Jam" name="jam" value="<?php echo $data['JAM'];?>">
                <div class="input-group-prepend"><i class="fa fa-pencil mt-4"></i></div>
        </div><br>

    </form>
    </div>

    <?php }?>