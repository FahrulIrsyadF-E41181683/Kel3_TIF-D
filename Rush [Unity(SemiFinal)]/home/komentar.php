<br><br>
<table class="table table-striped table-bordered zero-configuration">
    <tbody>
        <?php

        $query = "SELECT A.ID_KOMENTAR,A.ID_PELANGGAN,A.TANGGAL_KOMENTAR,A.WAKTU,A.KOMENTAR,B.NAMA_PELANGGAN,B.FOTO_PELANGGAN 
                    FROM komentar A JOIN pelanggan B on A.ID_PELANGGAN=B.ID_PELANGGAN ORDER by A.ID_KOMENTAR DESC";
        $sql = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($sql)){
        ?>
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-2"></div>
                <div class="col-sm-1">
                <img alt="" width="50" src="../master/images/pelanggan/<?php echo $data['FOTO_PELANGGAN']; ?>" class="rounded-circle">
                </div>
                <div class="col-sm">
                    <h6 class="font-weight-normal mb-1 text-dark"><strong><?php echo $data['NAMA_PELANGGAN'];?></strong></h6>
                    <p class="mb-1 font-italic text-secondary"><?php echo $data['TANGGAL_KOMENTAR'] ?> <strong>di</strong>  <?php echo $data['WAKTU'];?><p>
                    <p></p>
                    
                </div>
                
                <?php if($st==$data['ID_PELANGGAN']){ ?>
                <div class="col-sm-2"></div>
                            <span>
                                <div class="btn-group mr-2 mb-2">
                                <a href="_hapus_komentar.php?id=<?php echo $data['ID_KOMENTAR']; ?>" onclick="return confirm('Anda yakin mau menghapus komentar ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                    <button type="button" class="btn btn-light sweet-confirm">
                                    <i class="fa fa-close"></i>
                                    </button> 
                                </a>
                                </div>
                            </span>
                </div>
                <?php } ?>

            </div>
            <div class="row">
                <div class="col-sm-3 mt-5"></div>
                <div class="col-sm font-weight-light">
                    <?php echo $data['KOMENTAR'];?>
                </div>
            <br>
            </div><hr>
            

    <?php } ?>
    </tbody>
    </table>
    <br><br>