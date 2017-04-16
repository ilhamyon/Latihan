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
                        <h4>Hak Akses</h4>
                      </div>
                      <div class="col-lg-6 text-right">
                        
                      </div>
                  </div>
                </div>
                <div class="panel-body">
                
                 <fieldset>
                  <form method="post" action="<?php echo base_url().'admin/do_role'?>">
                    <input type="submit" class="btn btn-warning" value="Simpan"> <input class="btn btn-info" type="reset" value="Batal"><br><br>
                    <input type="hidden" name="kode_group"  value="<?php echo $kode_groupq;?>">
                    <table width="100%"  class="table table-hover  table-bordered">
                      <thead>
                        <tr>
                          <th width="4%">No</th>
                          <td align="center" width="4%"><input type="checkbox" id="ceksemua"></td>
                          <th>Menu</th>
                          <th>Parent</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;
                          foreach($role as $row){
                            $st=$no%2;
                        ?>
                        <tr <?php if($st=='0'){echo "class='active'";} ?>>
                          <td align="center"><?php echo $no;?></td>
                          <td align="center"><input <?php if($row['status_role']==1){ echo "checked";}?> type="checkbox" name="role[]" value="<?php echo $row['kode_role']; ?>"></td>
                          <td><?php echo ucwords($row['nama_menu']);?></td>
                          <td><?php echo ucwords($row['parent']);?></td>
                        </tr>
                        <?php $no++;}?>
                      </tbody>
                    </table>
                  </form>
                </fieldset>
                
                </div>
            </div>
        </div>
      </div>

    </div>

 
    <?php include 'footer_admin.php';?>
    <script type="text/javascript">
      $(document).ready(function(){    
    $('#ceksemua').click(function () {
     $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
    });

  

  

});
    </script>
  </body>
</html>
