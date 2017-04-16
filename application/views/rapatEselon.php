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
                    <h4>Kegiatan Eselon II</h4>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="<?php echo base_url('admin/tambahrapat.html');?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button></a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <form class="form-inline" role="form" method="post" action="<?php echo base_url().'admin/rapatEselon.html'?>">
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Periode </label>
                    <input type="text" class="form-control tgl" value="<?php echo $_SESSION['tgl1'];?>" placeholder="tgl_awal" name="tgl1">
                  </div>
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Sampai</label>
                    <input type="text" class="form-control tgl" id="tgl_awal" value="<?php echo $_SESSION['tgl2'];?>" name="tgl2" placeholder="tgl_awal">
                  </div>
                  <button type="submit" name="cari" class="btn btn-default">Cari</button>
                  <?php echo anchor('cetak/cetak_agenda/'.$_SESSION['tgl1'].'/'.$_SESSION['tgl2'],'<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Excel</button>')?>
                </form><br>
                <table class="table table-bordered table-striped" id="table" style="font-size:12px">
                  <thead>
                    <tr>
                      <th width="3%">No</th>
                      <th>Hari</th>
                      <th>Tanggal</th>
                      <th>Tempat</th>
                      <th width="20%">Acara</th>
                      <th>Jam</th>
                      <th>Disposisi</th>
                      <th>No Undangan</th>
                      <th>Pejabat</th>
                      <th>Aksi  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($data as $row){?>
                    <tr>
                      <td align="center"><?php echo $no;?></td>
                      <td><?php echo ucwords($row['hari']);?></td>
                      <td align="center" width="10%"><?php if($row['tgl_akhir']==null or $row['tgl_akhir']=='0000-00-00'){
                                        echo date('d M Y',strtotime($row['tgl_awal']));
                                      }else{ 
                                        if(date('F y',strtotime($row['tgl_awal']))==date('F y',strtotime($row['tgl_akhir']))){
                                              echo date('d',strtotime($row['tgl_awal']))." - ".date('d M y',strtotime($row['tgl_akhir'])) ;
                                            }else{ 
                                              echo date('d M y',strtotime($row['tgl_awal']))." - ".date('d M y',strtotime($row['tgl_akhir']));
                                              } 
                                          }?></td>
                      <td><?php if($row['tempat']==null){echo ucwords($row['tl']);}else{echo ucwords($row['tempat']);}?></td>
                      <td align="justify"><?php echo ucfirst($row['acara']);?></td>
                      <td><?php echo $row['jam'];?></td>
                      <td><?php echo ucwords($row['disposisi']);?></td>
                      <td><?php echo $row['no_undangan'];?></td>
                      <td><?php echo ucwords($row['penyelenggara']);?></td>
                      <td align="center"><a href="<?php echo base_url('admin/editrapat/'.$row['kode_rapat'].'.html');?>"><span class="glyphicon glyphicon-edit"></span></a> | <a href="<?php echo base_url('admin/hapusrapat/'.$row['kode_rapat']);?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    <?php $no++;}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>

    <?php include 'footer_admin.php';?>
  </body>
</html>
