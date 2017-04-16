<!DOCTYPE html>
<html lang="en">
  <?php include 'head_admin.php';?>

  <body>

    <!-- Fixed navbar -->
   <?php include 'navbar_admin.php';?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Beranda</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="caption">
              <?php echo anchor('admin/masterKegiatan','<h3>Kegiatan <span class="badge">'.$kegiatan.'</span></h3>'); ?>
              <hr>
              <?php echo anchor('admin/pengumuman','<h3>Pengumuman <span class="badge">'.$pengumuman.'</span></h3>'); ?>
              <hr>
              <?php echo anchor('admin/seputarKita','<h3>Seputar Kita <span class="badge">'.$sk.'</span></h3>'); ?>
              <hr>
              <?php echo anchor('admin/infoUmum','<h3>Galeri <span class="badge">'.$iu.'</span></h3>'); ?>
              <hr>
              <?php echo anchor('admin/media','<h3>Media <span class="badge">'.$md.'</span></h3>'); ?>
              <hr>
              <?php echo anchor('admin/runingText','<h3>Runing Text <span class="badge">'.$rt.'</span></h3>'); ?>
              <hr>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php include 'footer_admin.php';?>
  </body>
</html>
