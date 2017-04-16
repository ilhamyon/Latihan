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
                    <h4>Master Ruangan</h4>
                  </div>
                  <div class="col-md-6 text-right">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#tambahruang"><span class="glyphicon glyphicon-plus"></span> Tambah Ruangan</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-bordered table-striped" id="table">
                  <thead>
                    <tr>
                      <th width="3%">No</th>
                      <th>Ruang</th>
                      <th>Gedung</th>
                      <th>Lokasi</th>
                      <th width="10%">Kapasitas</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($ruang as $row){?>
                    <tr>
                      <td align="center"><?php echo $no;?></td>
                      <td><?php echo ucwords($row['nama_ruang']);?></td>
                      <td><?php echo ucwords($row['nama_gedung']);?></td>
                      <td><?php echo ucfirst($row['lantai']);?></td>
                      <td align="center"><?php echo $row['kapasitas'];?> Orang</td>
                      <td align="center"><a href="" data-toggle="modal" data-target="#editruang<?php echo $row['kode_ruang'];?>"><span class="glyphicon glyphicon-edit"></span></a> || <?php echo anchor('admin/hapusruangan/'.$row['kode_ruang'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus ".$row['nama_ruang']." ?')\"");?></td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
      </div>
    </div>
<?php  foreach($ruang as $rr){?>
<!-- Modal -->
<div class="modal fade" id="editruang<?php echo $rr['kode_ruang'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('admin/editruangan.html')?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Edit Ruangan</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Ruangan</label>
            <input type="hidden" value="<?php echo $rr['kode_ruang'];?>" name="kode_ruang">
            <input type="text" name="nama_ruang" class="form-control" required value="<?php echo $rr['nama_ruang'];?>">
          </div>
          <div class="form-group">
            <label>Kapasitas</label>
            <input type="text" name="kapasitas" class="form-control" required value="<?php echo $rr['kapasitas'];?>">
          </div>
          <div class="form-group">
            <label>Gedung</label>
            <select name="kode_gedung" class="form-control">
              <option></option>
              <?php foreach($gedung as $rg){?>
                <option <?php if($rr['nama_gedung']==$rg['nama_gedung']){echo "selected";}?> value="<?php echo $rg['kode_gedung'];?>"><?php echo ucwords($rg['nama_gedung']);?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Lokasi / Lantai</label>
            <input type="text" name="lantai" value="<?php echo $rr['lantai'];?>" class="form-control" required>
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
<div class="modal fade" id="tambahruang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('admin/tambahruangan.html')?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Ruangan</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Ruangan</label>
            <input type="text" name="nama_ruang" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Kapasitas</label>
            <input type="text" name="kapasitas" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Gedung</label>
            <select name="kode_gedung" class="form-control">
              <option></option>
              <?php foreach($gedung as $rg){?>
                <option value="<?php echo $rg['kode_gedung'];?>"><?php echo ucwords($rg['nama_gedung']);?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Lokasi / Lantai</label>
            <input type="text" name="lantai" class="form-control" required>
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
