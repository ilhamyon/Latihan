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
                    <h4>Rekap Kegiatan</h4>
                  </div>
                  <div class="col-md-6 text-right">

                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="">
                <form class="form-inline" role="form" method="post" action="<?php echo base_url().'admin/rekapKegiatan'?>">
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Periode kegiatan</label>
                    <input type="text" class="form-control tgl" value="<?php echo $this->session->userdata('tgl11');?>" placeholder="Tanggal" name="tgl1">
                  </div>
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Sampai</label>
                    <input type="text" class="form-control tgl" value="<?php echo $this->session->userdata('tgl22');?>" name="tgl2" placeholder="Tanggal">
                  </div>
                  
                  <button type="submit" name="cari" class="btn btn-default">Cari</button>
                </form><br>

                    <table class="table table-bordered table-striped table-hover" id="table">
                      <thead>
                        <tr>
                          <td width="3%" align="center"><b>No</b></td>
                          <td align="center"><b>Jenis Kegiatan</b></td>
                          <td align="center" width="10%"><b>Jumlah</b></td>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($sql as $rk){?>
                        <tr>
                          <td align="center"><?php echo $no;?></td>
                          <td><?php echo $rk['jenis_kegiatan'];?></td>
                          <td align="center"><?php echo $rk['jum'];?></td>
                        </tr>
                        <?php $no++;}?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>

          </div>
      </div>
    </div>

    <?php include 'footer_admin.php';?>
  </body>
</html>
