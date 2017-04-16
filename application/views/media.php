<!DOCTYPE html>
<html lang="en">
  <?php include 'head_admin.php';?>

  <body>

    <!-- Fixed navbar -->
   <?php include 'navbar_admin.php';?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Media</h1>
      </div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Media</button>
      <div class="row">
        <div class="col-lg-12">


            <?php
            $limitPerLine = 4;
            $currentData = 0;
            for($a=0; $a<count($arr); $a++) {            
                $data = $arr[$a];
                // increment data
                ++$currentData;
            ?>
            <?php if($currentData == 1) { ?>
          <div class="row">
            <?php } ?>
            
             
              <div class="col-lg-3">
                <div class="thumbnail">
                
                    <video width="250px"  controls  class="img-responsive img-thumbnail" >
                      <source src="<?php echo base_url().$data['file_media'];?>" type="video/mp4">
                      <source src="movie.ogg" type="video/ogg">
                      Your browser does not support the video tag.
                    </video> 
                  <div class="caption">
                    <h3 class="text-center"><?php echo ucfirst($data['judul_media']); echo anchor('admin/hapusMedia/'.$data['id_media'],' <span class="badge"><span class="glyphicon glyphicon-trash"></span></span>'); ?></h3>
                  </div>
                </div>
              </div>
            
            <?php if($currentData == $limitPerLine) {
            $currentData = 0;
            ?>
        </div>
            <?php }
            } ?>
        
        
        </div>
      </div>

    </div>
<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/tambahMedia';?>" role="form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Media</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="col-lg-2 control-label">Judul</label>
            <div class="col-lg-10">
              <input type="text" name="judul" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">VIdeo (.mp4)</label>
            <div class="col-lg-10">
             
                <input type="file" name="gambar" size="20" required id="preview_gambar" accept="video/mp4"/>
              
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
