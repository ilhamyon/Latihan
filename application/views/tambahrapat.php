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
                    <h4>Tambah Rapat</h4>
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
                <form class="form-horizontal" method="post" action="<?php echo base_url('admin/doaddrapat');?>">
                  <div class="form-group <?php if($kg==2){ echo 'visible-print';} ?>">
                    <label class="control-label col-lg-2">Pejabat</label>
                    <div class="col-lg-10">
                    
                      <select name="id_p" class="form-control" <?php if($kg==2){echo "readonly";}?> >
                        <option value=""></option>
                        <?php foreach($ese as $rowq){?>
                        <option <?php if($id_p==$rowq['id_p']){echo "selected";}?> value="<?php echo $rowq['id_p']?>"><?php echo $rowq['penyelenggara'];?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">NO Undangan</label>
                    <div class="col-lg-10">
                      <input type="text" name="no_undangan" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Acara</label>
                    <div class="col-lg-10">
                      <textarea name="acara" class="form-control" row="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Disposisi</label>
                    <div class="col-lg-10">
                      <input type="text" name="disposisi" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Hari</label>
                    <div class="col-lg-10">
                      <select name="hari" class="form-control" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Tanggal</label>
                    <div class="col-lg-10">
                      <input type="text" name="tgl_awal" class="form-control tgl" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Tanggal 2</label>
                    <div class="col-lg-10">
                      <input type="text" name="tgl_akhir" class="form-control tgl" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jam</label>
                    <div class="col-lg-10">
                      <input type="text" name="jam" class="form-control " required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Tempat</label>
                    <div class="col-lg-10">
                      <select id="mySelect" onchange="myFunction()" name="kode_ruangan" class="form-control" required>
                        <option value=""></option>
                        <option value="lain">Lainya...</option>
                        <?php foreach($tmp as $row){?>
                        <option value="<?php echo $row['kode_ruang']?>"><?php echo $row['tempat'];?></option>
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
    document.getElementById("demo").innerHTML = "<input required class='form-control' name='tempat_lain' type='text'>";
}else{
    document.getElementById("demo").innerHTML = "";
}

}
</script>

  </body>
</html>
