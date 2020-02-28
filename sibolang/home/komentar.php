<br><br>
<table class="table table-striped table-bordered zero-configuration">
    <tbody>
        <?php

        $query = "SELECT * FROM komentar ORDER by ID_KOMENTAR DESC";
        $sql = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($sql)){
            $kom2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pelanggan where ID_PELANGGAN='".$data['ID_PELANGGAN']."'")); //komentar pelanggan
        ?>
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-2"></div>
                <div class="col-sm-1">

                            <?php if($data['ID_PELANGGAN']=='ADMIN'){?>
                <img alt="" width="50" src="../master/images/avatar/admin.png" class="rounded-circle">
                </div>
                <div class="col-sm">
                    <h6 class="font-weight-normal mb-1 text-dark"><strong>ADMIN</strong></h6>            
                                <?php }else{?>
                <img alt="" width="50" src="../master/images/pelanggan/<?php echo $kom2['FOTO_PELANGGAN']; ?>" class="rounded-circle">
                </div>
                <div class="col-sm">
                    <h6 class="font-weight-normal mb-1 text-dark"><strong><?php echo $kom2['NAMA_PELANGGAN'];?></strong></h6>
                                <?php } ?>

                    <p class="mb-1 font-italic text-secondary"><?php echo $data['TANGGAL_KOMENTAR'] ?> <strong>di</strong>  <?php echo $data['WAKTU'];?> WIB<p>
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