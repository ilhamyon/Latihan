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
                        <h4>Privilege</h4>
                      </div>
                      <div class="col-lg-6 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
                      </div>
                  </div>
                </div>
                <div class="panel-body">
                
                  <table id="table" class="table table-bordered table-striped" >
                      <thead>
                        <tr>
                          <th width="3%">No</th>
                          <th>Group</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($data as $rd){?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo ucwords($rd['nama_group']);?></td>
                            <td><?php echo anchor('admin/hakAksesmenu/'.$rd['kode_group'],'<span class="glyphicon glyphicon-search"></span>');?> <a href="" data-toggle="modal" data-target="#myModal<?php echo $rd['kode_group'];?>"><span class="glyphicon glyphicon-edit"></span></a> <?php if($rd['kode_group']!=1){ echo anchor('admin/hapusgroup/'.$rd['kode_group'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus data ini ?')\"");}?></td>
                          </tr>
                        <?php $no++;}?>
                      </tbody>
                  </table>
                
                </div>
            </div>
        </div>
      </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/tambahPengguna';?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label class="control-label col-lg-2">Username</label>
              <div class="col-lg-10">
                <input type="text" name="usernameq" class="form-control">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-2">Password</label>
              <div class="col-lg-10">
                <input type="password" name="passwordq" class="form-control">
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
