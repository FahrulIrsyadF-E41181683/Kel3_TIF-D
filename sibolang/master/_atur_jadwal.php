<?php   
        $tgl_ubah = $_GET['tgl_ubah']; 
        $lap_ubah=$_GET['lap_uba'];
?>

<div class="modal-body bg-krem">
<form  method="post" enctype="multipart/form-data"> 
            <div class="row">
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Tanggal</label> -->
                
                <?php $tgl = date('d/m/Y'); ?>

                <input type="text" class="form-control" id="date" name='date' value="<?=isset($_POST['date']) ? $_POST['date'] : '' ?>" 
                        placeholder="<?php if (empty($tgl_ubah)){ echo $tgl; }else{echo $tgl_ubah;} ?>">
            </div>
            <div class="form-group col col-md-6 ml-auto">
                <!-- <label class="col-form-label">Pilih Lapangan</label> -->
                <select name="lap" id="lap" class="form-control input-defaut" onchange="changeValue(this.value)" value="ASW">
                    <?php $res = mysqli_query($connect, "SELECT NAMA_LAPANGAN FROM lapangan where ID_LAPANGAN='LP0001'"); 
                while ($opti = mysqli_fetch_assoc($res)) {?>
                    <option selected> <?php if(empty($lap_ubah)){echo $opti['NAMA_LAPANGAN']; }else{ echo $lap_ubah; } ?></option>
                <?php } ?>
            <?php
            $result = mysqli_query($connect, "SELECT NAMA_LAPANGAN FROM lapangan");   
            while ($options = mysqli_fetch_assoc($result)) {
                    foreach ($options as $area) {
                    $selected = @$_POST['lap'] == $area ? ' selected="selected"' : '';
                    echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
                }}?>
                
                </select>
            </div>
            </div>
    </div>

<!--tombol cari --> 
    <div class="modal-footer ">
            <button name="tampilkan" id="tampilkan" class="btn btn-info">Tampilkan</button>
    </div>
    </form>

<!-- jika tombol cari ditekan -->
    <?php
    $status_lap = $_SESSION['status_lap'];

    if (isset($_POST['tampilkan'])
        or $status_lap==1
    ){
        if(!empty($tgl_ubah)){
            $date=$tgl_ubah ;
        }else if(!empty($_POST['date'])) {
            $date=$_POST['date'];
        }else{
            $date=$tgl;
        }// menentukan value date
        
    
    if(empty($lap_ubah)){
        $lap_ubah = $_POST['lap'];
    }
    ?>

    <div class="jam-content modal-body">
    <br>
        <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Nama Lapangan</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

    <form method="post">
        <?php
        $no=1;
        $sql = mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, B.NAMA_LAPANGAN, C.JAM , D.STATUS, d.TANGGAL_PESANAN 
                            FROM detail_jadwal A JOIN lapangan B on A.ID_LAPANGAN=B.ID_LAPANGAN 
                            JOIN jam C on A.ID_JAM=C.ID_JAM 
                            LEFT JOIN (SELECT * from tanggal_pesanan WHERE tanggal_pesanan='$date') D 
                            on A.ID_DETAIL_JADWAL=D.ID_DETAIL_JADWAL WHERE B.NAMA_LAPANGAN = '$lap_ubah' 
                            ORDER BY C.JAM ASC");
        while($data = mysqli_fetch_array($sql)){
            $dj= $data['ID_DETAIL_JADWAL'];
        ?>
        <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['NAMA_LAPANGAN']; ?></td>
                <td><?php echo $data['JAM']; ?></td>

                            <?php if($data['STATUS']==1){?>
                <td> <span name="terpesan" class="badge badge-danger px-2"><h5 class="mt-2 text-white">Terpesan</h5></span> </td>
                <td>
                    <span>
                    <div class="btn-group mr-2 mb-2">
                        <a href="_atur_jadwal_tersedia.php?dj=<?php echo $dj; ?> & date=<?php echo $date; ?> & lap_ubah=<?php echo $lap_ubah ?>" 
                                onclick="return confirm('Ubah Status ke Tersedia?')">
                            <input type="button" class="btn btn-primary" value="Ubah Status">
                        </a>
                    </div>
                    </span>
                </td>

                        <?php }else{ //jika tersedia ?>
                <td> <span name="tersedia" class="badge badge-success px-2 "><h5 class="mt-2">Tersedia</h5></span> </td>
                <td>
                    <span>
                    <div class="btn-group mr-2 mb-2">
                        <a href="_atur_jadwal_terpesan.php?dj=<?php echo $dj; ?> & date=<?php echo $date; ?> & lap_ubah=<?php echo $lap_ubah ?>" 
                                onclick="return confirm('Ubah Status ke Terpesan?')">
                            <input type="button" class="btn btn-primary" value="Ubah Status">
                        </a>
                    </div>
                    </span>
                </td>
                            <?php }
                            ?>
        </tr>
                <?php } ?>
                </tbody>
    </form>

    </table> 
    </div>
    <?php  } 
        unset($_SESSION['status_lap']);
    ?>
