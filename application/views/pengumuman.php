<!DOCTYPE html>
<html lang="en">
  <?php include 'head_admin.php';?>

  <body>

    <!-- Fixed navbar -->
   <?php include 'navbar_admin.php';?>

    <!-- Begin page content -->
    <div class="container">
      
      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Master Pengumuman</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                    
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th width="7%">No</th>
                                <th width="30%">Judul</th>
                                <th>Isi</th>
                                <th width="10%">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach($rp as $rp){?>
                              <tr>
                                <td align="center"><?php echo $no;?></td>
                                <td><?php echo $rp['judul_pengumuman'];?></td>
                                <td><?php echo $rp['isi_pengumuman'];?></td>
                                <td align="center"><a data-toggle="modal" data-target="#edit<?php echo $rp['id_pengumuman'];?>" href=""><span class="glyphicon glyphicon-pencil"></span></a> | <?php echo anchor('admin/hapusPengumuman/'.$rp['id_pengumuman'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus data ini ?')\"");?></td>
                              </tr>
                               
                              <?php $no++; }?>
                            </tbody>
                        </table>
                    <?php  foreach($edit as $ra){ ;?>
                    <!-- Modal -->
                                <div class="modal fade" id="edit<?php echo $ra['id_pengumuman'];?>" tabindex="-1" role="dialog" aria-labelledby="tambahPengumuman" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/editPengumuman';?>">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Pengumuman</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Judul</label>
                                            <div class="col-lg-10">
                                            <input type="hidden" name="id_pengumuman" value="<?php echo $ra['id_pengumuman'];?>">
                                              <input type="text" name="judul" class="form-control" value="<?php echo $ra['judul_pengumuman'];?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Isi</label>
                                            <div class="col-lg-10">
                                              <textarea name="isi" class="form-control" rows="3"><?php echo $ra['isi_pengumuman'];?></textarea>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                    <?Php }?>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="tambahPengumuman" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/tambahPengumuman';?>">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Pengumuman</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Judul</label>
                                    <div class="col-lg-10">
                                      <input type="text" name="judul" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Isi</label>
                                    <div class="col-lg-10">
                                      <textarea name="isi" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                </div>
            </div>
          </div>
      </div>
    </div>

    <?php include 'footer_admin.php';?>
  </body>
</html>
