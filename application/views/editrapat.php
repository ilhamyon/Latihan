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
                    <h4>Edit Rapat</h4>
                  </div>
                  <div class="col-md-6 text-right">
                   <a href="<?php echo  $_SERVER['HTTP_REFERER'];?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-backward"></span> Kembali</button></a>
                  </div>
                </div>
              </div>
              <?php 
                    $kg=$this->session->userdata('kg_jadwal');
                    $id_p=$this->session->userdata('id_p');

                    ?>
              <div class="panel-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url('admin/doeditrapat');?>">
                  <div class="form-group <?php if($kg==2){ echo 'visible-print';} ?>">
                    <label class="control-label col-lg-2">Pejabat</label>
                    <div class="col-lg-10">
                      <input type="hidden" name="kode_rapat" value="<?php echo $data->kode_rapat;?>">
                      <select name="id_p" class="form-control" <?php if($kg==2){echo "readonly";}?> >
                        <option value=""></option>
                        <?php foreach($ese as $rowq){?>
                        <option <?php if($data->id_p==$rowq['id_p']){echo "selected";}?> value="<?php echo $rowq['id_p']?>"><?php echo $rowq['penyelenggara'];?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">NO Undangan</label>
                    <div class="col-lg-10">
                      <input type="text" name="no_undangan" class="form-control" value="<?php echo $data->no_undangan;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Acara</label>
                    <div class="col-lg-10">
                      <textarea name="acara" class="form-control" row="3"> <?php echo $data->acara;?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Disposisi</label>
                    <div class="col-lg-10">
                      <input type="text" name="disposisi" class="form-control" value="<?php echo $data->disposisi;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Hari</label>
                    <div class="col-lg-10">
                      <select name="hari" class="form-control" required>
                        <option <?php if($data->hari=='Senin'){echo "selected";} ?> value="Senin">Senin</option>
                        <option <?php if($data->hari=='Selasa'){echo "selected";} ?> value="Selasa">Selasa</option>
                        <option <?php if($data->hari=='Rabu'){echo "selected";} ?> value="Rabu">Rabu</option>
                        <option <?php if($data->hari=='Kamis'){echo "selected";} ?> value="Kamis">Kamis</option>
                        <option <?php if($data->hari=='Jumat'){echo "selected";} ?> value="Jumat">Jumat</option>
                        <option <?php if($data->hari=='Sabtu'){echo "selected";} ?> value="Sabtu">Sabtu</option>
                        <option <?php if($data->hari=='Minggu'){echo "selected";} ?> value="Minggu">Minggu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Tanggal</label>
                    <div class="col-lg-10">
                      <input type="text" name="tgl_awal" class="form-control tgl" value="<?php echo $data->tgl_awal;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Tanggal 2</label>
                    <div class="col-lg-10">
                      <input type="text" name="tgl_akhir" class="form-control tgl" value="<?php echo $data->tgl_akhir;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jam</label>
                    <div class="col-lg-10">
                      <input type="text" name="jam" class="form-control " value="<?php echo $data->jam;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Tempat</label>
                    <div class="col-lg-10">
                      <select id="mySelect"  onchange="myFunction()" name="kode_ruangan" class="form-control" required>
                        <option value=""></option>
                        <option <?php if($data->tl!=null){echo "selected";} ?>  value="lain">Lainya...</option>
                        <?php foreach($tmp as $row){?>
                        <option <?php if($data->kode_ruang==$row['kode_ruang']){echo "selected";} ?> value="<?php echo $row['kode_ruang']?>"><?php echo $row['tempat'];?></option>
                        <?php }?>

                      </select>

                      <p id="demo"></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button> <button type="reset" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    <?php include 'footer_admin.php';?>

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    if(x=='lain'){
        document.getElementById("demo").innerHTML = "<input required class='form-control' value='<?php echo $data->tl;?>' name='tempat_lain' type='text'>";
    }else{

        document.getElementById("demo").innerHTML = "";
    }
}
  <?php if($data->tl!=null){?>
  document.getElementById("demo").innerHTML = "<input required class='form-control' value='<?php echo $data->tl;?>' name='tempat_lain' type='text'>";
 <?php }?>
</script>

  </body>
</html>
