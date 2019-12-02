<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                <div class="col-sm-12">
                                        <div class="col-sm-12 col-md-6">
                                            <label>
                                                <h4>Data Bank </h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                        
                                              <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>
                                        <!-- tambahmodal -->                                          
                                              <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
                                                 <div class="modal-dialog modal-lg" role="document">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <form  method="post" action="_tambah_bank.php" enctype="multipart/form-data"> 
                                                                <div class="row">
                                                                <div class="form-group col col-md-6 ml-auto">
                                                                    <label class="col-form-label">Nama Bank</label>
                                                                    <input type="text" name="nm_bk" class="form-control input-default" placeholder="Nama Bank">
                                                                </div>
                                                                <div class="form-group col col-md-6 ml-auto">
                                                                    <label class="col-form-label">No Rekening</label>
                                                                    <input type="text" name="rkn" class="form-control input-default" placeholder="No Rekening">
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
                                        
                                        <!-- editmodal -->
                                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
                                                 <div class="modal-dialog modal-lg" role="document">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form  method="post" action="_tambah_bank.php" enctype="multipart/form-data"> 
                                                                <div class="row">
                                                                <div class="form-group col col-md-6 ml-auto">
                                                                    <label class="col-form-label">Nama Produk</label>
                                                                    <input type="text" name="nm_prd" class="form-control input-default" placeholder="Nama Produk">
                                                                    <label class="col-form-label">Stok</label>
                                                                    <input type="text" name="stk" class="form-control input-default" placeholder="Stok">
                                                                    <label class="col-form-label">Harga</label>
                                                                    <input type="text" name="hrg" class="form-control input-default" placeholder="Harga" maxlength="11"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                </div>
                                                                <div class="form-group col col-md-6 ml-auto">
                                                                    <label class="col-form-label">Foto Produk</label>
                                                                    <input type="file" name="fotoprd" class="form-control input-default">    
                                                                    <label class="col-form-label">Tanggal Input</label>
                                                                    <input type="date" name="tglin" readonly class="form-control input-default" value="<?php echo $now?>" >           
                                                                </div>
                                                                </div>
                                                                    <label for=""></label>
                                                                    <div class="form-check mb-3">
                                                                     <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" value="">&nbsp; Ceklis jika ingin mengubah foto</label>
                                                                    </div>
                                                                    <label class="col-form-label">Tanggal</label>
                                                                    <input type="date" name="tanggal" readonly class="form-control input-default" value="<?php echo $now?>" >           
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
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID Bank</th>
                                                <th>Nama Bank</th>
                                                <th>No Rekening</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $id = $_GET['id'];
                                        $query = "Select * from bank";
                                        $query1 = "Select * from bank where ID_BANK='".$id."'";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $data['ID_BANK']; ?></td>
                                                <td><?php echo $data['NAMA_BANK']; ?></td>
                                                <td><?php echo $data['NO_REKENING']; ?></td>
                                                <td>
                                                    <span>
                                                        <div class="btn-group mr-2 mb-2">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editmodal" data-whatever="@getbootstrap">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button> 
                                                        </a>      
                                                        &nbsp;
                                                        <a href="_hapus_bank.php?id=<?php echo $data['ID_BANK']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger sweet-confirm">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button> 
                                                        </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID Bank</th>
                                                <th>Nama Bank</th>
                                                <th>No Rekening</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>