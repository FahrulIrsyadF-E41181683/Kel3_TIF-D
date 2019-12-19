<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">                         
            <div class="table-responsive">
            <div class="col-sm-12">
            <div class="col-sm-12 col-md-6">
                <label>
                    <h4>Data Jadwal</h4>
                </label>
            </div>
        </div>    
    </div>
<br>
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Lapangan</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
        <tbody>
        <tr>
            <th>1</th>
            <td>Lapangan 3</td>
            <td>08:00</td>           
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0031'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>2</th>
            <td>Lapangan 3</td>
            <td>09:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0032'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>                                                
        <tr>
            <th>3</th>
            <td>Lapangan 3</td>
            <td>10:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0033'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->           
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>4</th>
            <td>Lapangan 3</td>
            <td>11:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0034'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>5</th>
            <td>Lapangan 3</td>
            <td>12:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0035'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>6</th>
            <td>Lapangan 3</td>
            <td>13:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0036'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>7</th>
            <td>Lapangan 3</td>
            <td>14:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0037'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>8</th>
            <td>Lapangan 3</td>
            <td>15:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0038'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>9</th>
            <td>Lapangan 3</td>
            <td>16:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0039'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>10</th>
            <td>Lapangan 3</td>
            <td>17:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0040'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>11</th>
            <td>Lapangan 3</td>
            <td>18:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0041'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>12</th>
            <td>Lapangan 3</td>
            <td>19:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0042'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>13</th>
            <td>Lapangan 3</td>
            <td>20:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0043'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>14</th>
            <td>Lapangan 3</td>
            <td>21:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0044'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>
        <tr>
            <th>15</th>
            <td>Lapangan 3</td>
            <td>22:00</td>
            <!-- Code Status start -->
            <?php
            $st= 0;
            $sql1= mysqli_query($connect, "SELECT A.ID_DETAIL_JADWAL, A.ID_JAM, B.TANGGAL_PESANAN, C.NAMA_LAPANGAN , B.STATUS 
            FROM detail_jadwal A LEFT JOIN tanggal_pesanan B on A.ID_DETAIL_JADWAL = 
            B.ID_DETAIL_JADWAL JOIN lapangan C on A.ID_LAPANGAN=C.ID_LAPANGAN WHERE 
            A.ID_DETAIL_JADWAL='DJ0045'");
            while($data = mysqli_fetch_assoc($sql1)){
                $st= $data['STATUS'];
            } ?>           
                <?php 
                    if($st==1){?>
                        <td> <span name="terpesan" class="badge badge-danger px-2">Terpesan</span> </td>
                    <?php } else {?>
                        <td> <span name="tersedia" class="badge badge-success px-2">Tersedia</span> </td>
                <?php }
                ?>
            <!-- Code Status End -->
            <td>
            <button type="button" class="btn btn-success sweet-confirm">
                <i class="fa fa-check color-muted m-r-5"></i>
            </button>
            <button type="button" class="btn btn-danger sweet-confirm">
                <i class="fa fa-close color-muted m-r-5"></i>
            </button>
            </td>
        </tr>                                       
    </tbody>
</table>                            
        <div class="modal-footer">
            <!-- <input type="reset" class="btn btn-danger" value="Reset" style="color:white;"> -->
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>
</div>
</div>
</div>
</div>
</div>
</div>