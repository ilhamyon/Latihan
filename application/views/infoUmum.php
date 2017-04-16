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
                      <h4>Galeri</h4>
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
                        <th width="20">Foto</th>
                        <th width="10%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($data as $rk){?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo ucfirst($rk['iu']);?></td>
                        <td align="center"><img width="100" height="120"  src="<?php echo base_url( $rk['foto_iu']);?>" alt="..." class="img-thumbnail"></td>
                        <td align="center"><a href="" data-toggle="modal" data-target="#myModal<?php echo $rk['id_iu'];?>"><span class="glyphicon glyphicon-pencil"></span></a> | <?php echo anchor('admin/hapusInfo/'.$rk['id_iu'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus data ini ?')\"")?></td>
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
<div class="modal fade" id="myModal<?php echo $rkw['id_iu'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form-horizontal" enctype="multipart/form-data" role="form" action="<?php echo base_url().'admin/ubahInfo'?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id_rt" value="<?php echo $rkw['id_iu'];?>">
          <label class="col-lg-2 control-label">Text</label>
          <div class="col-lg-10">
            <input type="text" name="rt" class="form-control" value="<?php echo $rkw['iu'];?>" required>            
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
    <form class="form-horizontal" enctype="multipart/form-data"  role="form" action="<?php echo base_url().'admin/tambahInfo'?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-2 control-label">Text</label>
          <div class="col-lg-10">
            <input type="text" name="rt" maxlength="50" class="form-control" required>            
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Gambar</label>
            <div class="col-lg-10">
             <img alt="foto profile" id="gambar_nodin" class="img-responsive img-thumbnail" 
                 style="width: 200px;" height="250px" src="<?php echo base_url().'upload/nopic.png'?>">
                <input type="file" name="gambar" size="20" id="preview_gambar" accept="image/*"/>
              
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
