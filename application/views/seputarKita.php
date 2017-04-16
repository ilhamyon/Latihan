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
                      <h4>Master Seputar Kita</h4>
                    </div>
                    <div class="col-md-6 text-right" >
                      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
                    </div>
                  </div>
              </div>
              <div class="panel-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="20%">Judul</th>
                      <th>Isi</th>
                      <th width="15%">Foto</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($data as $rs){?>
                    <tr>
                      <td align="center"><?php echo $no;?></td>
                      <td><?php echo $rs['judul_sk'];?></td>
                      <td><?php echo $rs['isi_sk'];?></td>
                      <td align="center"><img class="img-thumbnail" width="100px" height="100px" src="<?php echo base_url().$rs['foto_sk'];?>"></td>
                      <td align="center"> <a href="" data-toggle="modal" data-target="#editData<?php echo $rs['id_sk'];?>"><span class="glyphicon glyphicon-pencil"></span></a> | <?php echo anchor('admin/hapusSk/'.$rs['id_sk'],'<span class="glyphicon glyphicon-trash"></span>');?></td>
                    </tr>
                    <?php $no++;}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
<?php foreach($data as $rk){?>
<div class="modal fade" id="editData<?php echo $rk['id_sk'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/editSk';?>" role="form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="col-lg-2 control-label">Judul</label>
            <div class="col-lg-10">
              <input type="text" name="judul" class="form-control" value="<?php echo $rk['judul_sk'];?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Gambar</label>
            <div class="col-lg-10">
              <input type="hidden" name="id_sk" value="<?php echo $rk['id_sk'];?>">
              <input type="hidden" name="foto_sk" value="<?php echo $rk['foto_sk'];?>">
               <img alt="foto profile" id="gambar_nodin" class="img-responsive img-thumbnail" 
                 style="width: 140px;" src="<?php echo base_url().$rk['foto_sk'];?>">
                <input type="file" name="gambar" size="20" id="preview_gambar" accept="image/*"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Isi</label>
            <div class="col-lg-10">
              <textarea class="form-control" name="isi" required><?php echo $rk['isi_sk'];?></textarea>
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
<?php } ?>


<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/tambahSK';?>" role="form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="col-lg-2 control-label">Judul</label>
            <div class="col-lg-10">
              <input type="text" name="judul" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Gambar</label>
            <div class="col-lg-10">
             <img alt="foto profile" id="gambar_nodin" class="img-responsive img-thumbnail" 
                 style="width: 140px;" src="<?php echo base_url().'upload/nopic.png'?>">
                <input type="file" name="gambar" size="20" id="preview_gambar" accept="image/*"/>
              
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Isi</label>
            <div class="col-lg-10">
              <textarea class="form-control" name="isi" required></textarea>
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
      <script language="JavaScript">
                      function bacaGambar(input) {
                        if (input.files && input.files[0]) {
                          var reader = new FileReader();

                          reader.onload = function (e) {
                            $('#gambar_nodin').attr('src', e.target.result);
                          }

                          reader.readAsDataURL(input.files[0]);
                        }
                      }

                      $("#preview_gambar").change(function(){
                        bacaGambar(this);
                      });

                  </script>
  </body>
</html>
