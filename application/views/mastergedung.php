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
                    <h4>Master Gedung</h4>
                  </div>
                  <div class="col-md-6 text-right">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#tambahGedung"><span class="glyphicon glyphicon-plus"></span> Tambah Gedung</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-bordered table-striped" id="table">
                  <thead>
                    <tr>
                      <th width="3%">No</th>
                      <th>Gedung</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($gedung as $row){?>
                    <tr>
                      <td align="center"><?php echo $no; ?></td>
                      <td><?php echo ucwords($row['nama_gedung']); ?></td>
                      <td align="center"><a data-toggle="modal" data-target="#editgedung<?php echo $row['kode_gedung'];?>" href="#"><span class="glyphicon glyphicon-edit"></span></a> || <?php echo anchor('admin/hapusgedung/'.$row['kode_gedung'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus ".ucwords($row['nama_gedung'])." ?')\"")?></td>
                    </tr>
                    <?php $no++;}?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
      </div>
    </div>

<?php foreach($gedung as $re){?>

<!-- Modal Edit-->
<div class="modal fade" id="editgedung<?php echo $re['kode_gedung'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('admin/editGedung.html');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Edit Gedung</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label class="control-label">Nama gedung</label>
              <input type="hidden" value="<?php echo $re['kode_gedung'];?>" name="kode_gedung">
              <input type="text" name="nama_gedung" class="form-control" required value="<?php echo $re['nama_gedung'];?>">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php }?>

<!-- Modal -->
<div class="modal fade" id="tambahGedung" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('admin/tambahGedung.html');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Gedung</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label class="control-label">Nama gedung</label>
              <input type="text" name="nama_gedung" class="form-control" required >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <?php include 'footer_admin.php';?>
  </body>
</html>
