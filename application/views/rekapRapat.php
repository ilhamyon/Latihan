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
                        <h4>Rekap Kegiatan Eselon II</h4>
                      </div>
                      <div class="col-lg-6 text-right">
                        
                      </div>
                  </div>
                </div>
                <div class="panel-body">
                <form class="form-inline" role="form" method="post" action="<?php echo base_url().'rapat/rekapRapat.html'?>">
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Periode </label>
                    <input type="text" class="form-control tgl" value="<?php echo $_SESSION['tgl1'];?>" placeholder="Tanggal" name="tgl1">
                  </div>
                  <div class="form-group">
                    <label class="" for="exampleInputEmail2">Sampai</label>
                    <input type="text" class="form-control " id="tanggal" value="<?php echo $_SESSION['tgl2'];?>" name="tgl2" placeholder="Tanggal">
                  </div>
                  
                  <button type="submit" name="cari" class="btn btn-default">Cari</button>
                </form><br>
                 <table id="table" class="table table-bordered table-striped"  style="font-size:12px">
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
                    </tr>
                    <?php $no++;}?>
                  </tbody>
                </table>
                

                </div>
            </div>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
        <div style="background:#228B22;" class="navbar navbar-default navbar-fixed-bottom">
          <?php $sql=$this->db->query("SELECT rt from tb_rt")->result_array();?>
        <a><marquee style="color:#fff;" direction="left" scrolldelay="100"><?php foreach($sql as $rs){ echo " | ".ucfirst($rs['rt'])." | ";} ?></marquee></a>
        </div>   
        </div>
      </div>
    </div>
  </div>
    </div>
 
    <?php include 'footer_admin.php';?>
  </body>
</html>
 