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
                    <h4>Jadwal Ruangan</h4>
                  </div>
                  <div class="col-md-6 text-right">

                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="">
                  <form method="post" action="<?php echo base_url('admin/jadwalRuangan.html');?>" class="form-inline">
                            <div class="form-group">
                              <div class="input-group">
                           
                                 <select name='bulan' class="form-control" class="">
                                      <?php foreach($bulan as $rb){?>
                                      <option <?php if($this->session->userdata('bj')==$rb['bulan']){echo "selected";}?> value="<?php echo $rb['bulan'];?>"><?php echo $rb['nama_bulan'];?></option>
                                      <?php }?>
                                    </select>
                                            
                                <span class="input-group-btn">
                                  
                                  <select  class="form-control " name="tahun" >
                                  <?php foreach($tahun as $rt){?>
                                  <option <?php if($this->session->userdata('tj') == $rt['tahun']){echo "selected";}?> value="<?php echo $rt['tahun'];?>"><?php echo $rt['tahun'];?></option>
                                  <?php }?>
                                  </select>
                                  <button type="submit" class="btn btn-primary" name='cari'> Cari</button>
                                
                                </span>
                                </div>
                            </div>
                        </form>
                        <BR>
                    
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped" id="table1" style="font-size:10px">
                        <thead>
                          <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Ruangan</th>
                            <th rowspan="2">Gedung</th>
                            <th rowspan="2">Kapasitas</th>
                            <th align="center" colspan="31">Tanggal</th>
                          </tr>
                          <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach($jadwal as $row){ ?>
                      
                          <tr>
                            <td align="center"><?php echo $no;?></td>
                            <td><?php echo $row['nama_ruang'];?></td>
                            <td><?php echo $row['nama_gedung'];?></td>
                            <td align="center" ><?php echo $row['kapasitas'];?></td>
                            <td align="center" <?php  if($row['t1']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t1']!=null){ echo $row['t1'];}?></td>
                            <td align="center" <?php if($row['t2']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t2']!=null){echo $row['t2'];}?></td>
                            <td align="center" <?php if($row['t3']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t3']!=null){echo $row['t3'];}?></td>
                            <td align="center" <?php if($row['t4']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t4']!=null){echo $row['t4'];}?></td>
                            <td align="center" <?php if($row['t5']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t5']!=null){echo $row['t5'];}?></td>
                            <td align="center" <?php if($row['t6']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t6']!=null){echo $row['t6'];}?></td>
                            <td align="center" <?php if($row['t7']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t7']!=null){echo $row['t7'];}?></td>
                            <td align="center" <?php if($row['t8']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t8']!=null){echo $row['t8'];}?></td>
                            <td align="center" <?php if($row['t9']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t9']!=null){echo $row['t9'];}?></td>
                            <td align="center" <?php if($row['t10']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t10']!=null){echo $row['t10'];}?></td>
                            <td align="center" <?php if($row['t11']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t11']!=null){echo $row['t11'];}?></td>
                            <td align="center" <?php if($row['t12']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t12']!=null){echo $row['t12'];}?></td>
                            <td align="center" <?php if($row['t13']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t13']!=null){echo $row['t13'];}?></td>
                            <td align="center" <?php if($row['t14']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t14']!=null){echo $row['t14'];}?></td>
                            <td align="center" <?php if($row['t15']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t15']!=null){echo $row['t15'];}?></td>
                            <td align="center" <?php if($row['t16']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t16']!=null){echo $row['t16'];}?></td>
                            <td align="center" <?php if($row['t17']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t17']!=null){echo $row['t17'];}?></td>
                            <td align="center" <?php if($row['t18']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t18']!=null){echo $row['t18'];}?></td>
                            <td align="center" <?php if($row['t19']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t19']!=null){echo $row['t19'];}?></td>
                            <td align="center" <?php if($row['t20']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t20']!=null){echo $row['t20'];}?></td>
                            <td align="center" <?php if($row['t21']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t21']!=null){echo $row['t21'];}?></td>
                            <td align="center" <?php if($row['t22']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t22']!=null){echo $row['t22'];}?></td>
                            <td align="center" <?php if($row['t23']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t23']!=null){echo $row['t23'];}?></td>
                            <td align="center" <?php if($row['t24']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t24']!=null){echo $row['t24'];}?></td>
                            <td align="center" <?php if($row['t25']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t25']!=null){echo $row['t25'];}?></td>
                            <td align="center" <?php if($row['t26']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t26']!=null){echo $row['t26'];}?></td>
                            <td align="center" <?php if($row['t27']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t27']!=null){echo $row['t27'];}?></td>
                            <td align="center" <?php if($row['t28']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t28']!=null){echo $row['t28'];}?></td>
                            <td align="center" <?php if($row['t29']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t29']!=null){echo $row['t29'];}?></td>
                            <td align="center" <?php if($row['t30']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t30']!=null){echo $row['t30'];}?></td>
                            <td align="center" <?php if($row['t31']!=null){ echo 'style="background:#00FF00" data-toggle="tooltip" data-placement="top"  title=" kegiatan :'.ucwords($row['nama_kegiatan']).' , penyelenggara: '.ucwords($row['penyelenggara']).'"';}?> ><?php if($row['t31']!=null){echo $row['t31'];}?></td>
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
    </div>

    <?php include 'footer_admin.php';?>
    <script type="text/javascript">
      $(document).ready(function() {

        $('#table1').DataTable({
                responsive: true
                 "searching":   false,
                 "ordering": false,
    "info":     false,
    "language": {
            "lengthMenu": "Menampilkan _MENU_ data per halaman",
            "zeroRecords": "Maaf, tidak ada data!",
            "info": "Menampilkan halaman ke _PAGE_ dari _PAGES_ halaman"
            
        },
     "pagingType": "full_numbers",
      "lengthMenu": [[ 50, 100, -1], [ 50, 100, "Semua"]],
       "dom": '<"top"i>rt<"bottom"flp><"clear">'
        });
    });
    </script>
  </body>
</html>
