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
                    <h4>Tambah Kegiatan</h4>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php echo " ". anchor('admin/masterKegiatan','<button class="btn btn-primary"> <span class="glyphicon glyphicon-backward"></span> Kembali</button>');?> 
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/doTambahKegiatan';?>">
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Nama Kegiatan</label>
                      <div class="col-lg-10">
                        <input type="text" name="nama_kegiatan" class="form-control" required placeholder="Isikan nama kegiatan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Jenis Kegiatan</label>
                      <div class="col-lg-10">
                        <select name="jenis_kegiatan" class="form-control" required>
                          <option value=""></option>
                          <?php foreach($jk as $rj){?>
                          <option value="<?php echo $rj['id_jk'];?>"><?php echo ucfirst($rj['jenis_kegiatan']);?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Tempat</label>
                      <div class="col-lg-10">
                        <select name="kode_ruang" class="form-control" required>
                            <option></option>
                            <?php foreach($tempat as $rt){?>
                            <option value="<?php echo $rt['kode_ruang'];?>"><?php echo ucwords($rt['tempat']);?></option>
                            <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Tanggal Kegiatan</label>
                      <div class="col-lg-10">
                        <input type="text" name="tgl_kegiatan" id="tanggal" class="form-control" required placeholder="Isikan tanggal kegiatan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Sampai</label>
                      <div class="col-lg-10">
                        <input type="text" name="tgl_kegiatan2"  class="tgl form-control"   placeholder="Isikan tanggal kegiatan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Jam Kegiatan</label>
                      <div class="col-lg-10">
                        <input type="text" name="jam_kegiatan" class="form-control" required placeholder="Isikan jam kegiatan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Penyelenggara Kegiatan</label>
                      <div class="col-lg-10">
                        <select name="penyelenggara_kegiatan" class="form-control" required>
                          <option value=""></option>
                          <?php foreach($tp as $rjq){?>
                          <option value="<?php echo $rjq['id_p'];?>"><?php echo ucfirst($rjq['penyelenggara']);?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 label-control">Keterangan</label>
                      <div class="col-lg-10">
                        <textarea rows="3" name="keterangan" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-success" type="submit">Simpan</button> <button class="btn btn-warning" type="reset">Reset</button>
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
