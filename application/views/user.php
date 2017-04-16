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
                        <h4>Master Penguuna</h4>
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
                          <th>Username</th>
                          <th>Password</th>
                          <th>Nama</th>
                          <th>Group</th>
                          <th>Pejabat</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($data as $rd){?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $rd['username'];?></td>
                            <td><?php echo base64_decode($rd['password']);?></td>
                            <td><?php echo ucwords($rd['nama']);?></td>
                            <td><?php echo ucwords($rd['nama_group']);?></td>
                            <td><?php echo ucwords($rd['penyelenggara']);?></td>
                            <td><a href="" data-toggle="modal" data-target="#myModal<?php echo $rd['id_user'];?>"><span class="glyphicon glyphicon-edit"></span></a> <?php if($rd['id_user']!=1){ echo anchor('admin/hapusUser/'.$rd['id_user'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus data ini ?')\"");}?></td>
                          </tr>
                        <?php $no++;}?>
                      </tbody>
                  </table>
                
                </div>
            </div>
        </div>
      </div>

    </div>
    <?php  foreach($data as $rdq){?>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $rdq['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/editPengguna';?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label class="control-label col-lg-4">Username</label>
              <div class="col-lg-8">
              <input type="hidden" name="id_user" value="<?php echo $rdq['id_user'];?>">
                <input type="text" name="usernameq" class="form-control" value="<?php echo $rdq['username'];?>">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Password</label>
              <div class="col-lg-8">
                <input type="password" name="passwordq" class="form-control" value="<?php echo base64_decode($rdq['password']);?>">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Nama</label>
              <div class="col-lg-8">
                <input type="text" name="nama" class="form-control" required value="<?php echo $rdq['nama'];?>">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Group user</label>
              <div class="col-lg-8">
                <select class="form-control" name="kode_group" required>
                  <option value=""></option>
                  <?php foreach($group as $rg){?>
                  <option <?php if($rg['nama_group']==$rdq['nama_group']){echo "selected";}?> value="<?php echo $rg['kode_group'];?>"><?php echo ucwords($rg['nama_group']);?></option>
                  <?php } ?>
                </select>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Pejabat</label>
              <div class="col-lg-8">
                <select class="form-control" name="id_p">
                  <option value=""></option>
                  <?php foreach($py as $rp){?>
                  <option <?php if($rp['penyelenggara']==$rdq['penyelenggara']){echo "selected";}?> value="<?php echo $rp['id_p'];?>"><?php echo ucwords($rp['penyelenggara']);?></option>
                  <?php } ?>
                </select>
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
    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/tambahPengguna';?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label class="control-label col-lg-4">Username</label>
              <div class="col-lg-8">
                <input type="text" name="usernameq" class="form-control" required>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Password</label>
              <div class="col-lg-8">
                <input type="password" name="passwordq" class="form-control" required>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Nama</label>
              <div class="col-lg-8">
                <input type="text" name="nama" class="form-control" required>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Group user</label>
              <div class="col-lg-8">
                <select class="form-control" name="kode_group" required>
                  <option value=""></option>
                  <?php foreach($group as $rg){?>
                  <option value="<?php echo $rg['kode_group'];?>"><?php echo ucwords($rg['nama_group']);?></option>
                  <?php } ?>
                </select>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-lg-4">Pejabat</label>
              <div class="col-lg-8">
                <select class="form-control" name="id_pF">
                  <option value=""></option>
                  <?php foreach($py as $rp){?>
                  <option value="<?php echo $rp['id_p'];?>"><?php echo ucwords($rp['penyelenggara']);?></option>
                  <?php } ?>
                </select>
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
