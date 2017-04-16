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
                    <h4>Kegiatan</h4>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php echo anchor('admin/tambahKegiatan','<button class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Tambah Kegiatan</button>');?>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="">
                <form class="form-inline" role="form" method="post" action="<?php echo base_url().'admin/masterKegiatan'?>">
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Periode kegiatan</label>
                    <input type="text" class="form-control tgl" value="<?php echo $this->session->userdata('tgl1');?>" placeholder="Tanggal" name="tgl1">
                  </div>
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Sampai</label>
                    <input type="text" class="form-control tgl" value="<?php echo $this->session->userdata('tgl2');?>" name="tgl2" placeholder="Tanggal">
                  </div>
                  
                  <button type="submit" name="cari" class="btn btn-default">Cari</button>
                </form><br>

                    <table class="table table-bordered table-striped table-hover" id="table" style="font-size:12px">
                      <thead>
                        <tr>
                          <td align="center"><b>No</b></td>
                          <td align="center"><b>Nama Kegiatan</b></td>
                          <td align="center"><b>Jenis Kegiatan</b></td>
                          <td align="center"><b>Tanggal</b></td>
                          <td align="center"><b>Gedung</b></td>
                          <td align="center"><b>Ruang</b></td>
                          <td align="center"><b>Penyelenggara</b></td>
                          <td align="center"><b>Aksi</b></td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($mk as $rk){?>
                        <tr>
                          <td align="center"><?php echo $no;?></td>
                          <td><?php echo $rk['nama_kegiatan'];?></td>
                          <td><?php echo $rk['jenis_kegiatan'];?></td>
                          <td><?php if($rk['tanggal2']==null or $rk['tanggal2']=='0000-00-00'){
                                        echo date('d F Y',strtotime($rk['tanggal']));
                                      }else{ 
                                        if(date('F y',strtotime($rk['tanggal']))==date('F y',strtotime($rk['tanggal2']))){
                                              echo date('d',strtotime($rk['tanggal']))." - ".date('d F y',strtotime($rk['tanggal2'])) ;
                                            }else{ 
                                              echo date('d F y',strtotime($rk['tanggal']))." - ".date('d F y',strtotime($rk['tanggal2']));
                                              } 
                                          }?></td>
                          <td><?php echo $rk['nama_gedung'];?></td>
                          <td><?php echo $rk['nama_ruang'];?></td>
                          <td><?php echo $rk['penyelenggara'];?></td>
                          <td align="center"> <?php echo anchor('admin/editKegiatan/'.$rk['id_kegiatan'],'<span class="glyphicon glyphicon-pencil"></span>');?> | <?php echo anchor('admin/hapusKegiatan/'.$rk['id_kegiatan'],'<span class="glyphicon glyphicon-trash"></span>',"onclick=\"return confirm('Hapus ".ucfirst($rk['nama_kegiatan'])." ?')\"");?></td>
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
