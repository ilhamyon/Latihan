<!DOCTYPE html>
<html lang="en">
  <?php include 'head_admin.php';?>

  <body>

    <!-- Fixed navbar -->
   <?php include 'navbar_admin.php';?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h4 class="text-center">Jenis Kegiatan</h4>        
      </div>
      
      <div class="row">
          <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                  Data
                </div>
                <div class="panel-body">
                  <table id="table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th>Jenis</th>
                        <th width="20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($kegiatan as $rk){?>
                      <tr>
                        <td align="center"><?php echo $no;?></td>
                        <td><?php echo ucfirst($rk['jenis_kegiatan']);?></td>
                        <td align="center"><a href="" data-toggle="modal" data-target="#edit<?php echo $rk['id_jk'];?>"><span class="glyphicon glyphicon-pencil"></span></a> | <?php echo anchor('admin/hapusJK/'.$rk['id_jk'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus data ini ?')\"");?></td>
                      </tr>
                      <!-- Modal -->
                      <div class="modal fade" id="edit<?php echo $rk['id_jk'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form class="form-horizontal" role="form" action="<?php echo base_url().'admin/doEditJK';?>" method="post">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Jenis</label>
                                    <div class="col-lg-10">
                                      <input type="hidden" name="id_jk" value="<?php echo $rk['id_jk'];?>">
                                        <input type="text" name="jk" class="form-control" value="<?php echo $rk['jenis_kegiatan'];?>">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                              
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php $no++;}?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Form Tambah 
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" action="<?php echo base_url().'admin/doTambahJK';?>" method="post">
                    <div class="form-group">
                      <label class="label-control col-lg-4">Jenis Kegiatan</label>
                      <div class="col-lg-8">
                        <input type="text" name="jk" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-8 col-lg-offset-4">
                        <button type="submit" class="btn btn-success">Simpan</button> <button type="reset" class="btn btn-warning">Reset</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
    </div>

    <?php include 'footer_admin.php';?>
  </body>
</html>
