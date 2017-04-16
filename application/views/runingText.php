<!DOCTYPE html>
<html lang="en">
  <?php include 'head_admin.php';?>

  <body>

    <!-- Fixed navbar -->
   <?php include 'navbar_admin.php';?>

    <!-- Begin page content -->
    <div class="container">

      <div class="row">
        <div class="col-lg-12 col-sm-6 col-md-4">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-6">
                      <h4>Runing Text</h4>
                    </div>
                    <div class="col-lg-6 text-right">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
                    </div>
                </div>
              </div>
              <div class="panel-body">
                  <table id="table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="3%">No</th>
                        <th>Text</th>
                        <th width="10%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($data as $rk){?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo ucfirst($rk['rt']);?></td>
                        <td><a href="" data-toggle="modal" data-target="#myModal<?php echo $rk['id_rt'];?>"><span class="glyphicon glyphicon-pencil"></span></a> | <?php echo anchor('admin/hapusRt/'.$rk['id_rt'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus data ini ?')\"")?></td>
                      </tr>
                      <?php $no++;}?>
                    </tbody>
                  </table>
              </div>
          </div>
        </div>
      </div>
    </div>
<?php foreach($data as $rkw){?>
<div class="modal fade" id="myModal<?php echo $rkw['id_rt'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form-horizontal" role="form" action="<?php echo base_url().'admin/ubahRuningText'?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id_rt" value="<?php echo $rkw['id_rt'];?>">
          <label class="col-lg-2 control-label">Text</label>
          <div class="col-lg-10">
            <input type="text" name="rt" class="form-control" value="<?php echo $rkw['rt'];?>" required>            
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
<?php }?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form-horizontal" role="form" action="<?php echo base_url().'admin/tambahRuning'?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-2 control-label">Text</label>
          <div class="col-lg-10">
            <input type="text" name="rt" class="form-control" required>            
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

    <?php include 'footer_admin.php';?>
  </body>
</html>
