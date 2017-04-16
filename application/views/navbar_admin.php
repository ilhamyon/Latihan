 <script type="text/javascript">
tday  =new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
tmonth=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Augustus","September","Oktober","November","Desember");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+ndate+" "+tmonth[nmonth]+" "+nyear+" | "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
<?php $kode_group=$this->session->userdata('kg_jadwal');?>
 <div class="navbar navbar-default navbar-fixed-top" role="navigation" <?php if($kode_group==2){?> style="background-color:blue" <?php } ?>>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <div class="pull-left"> </div> <a class="navbar-brand" href="#"><img height="30" src="<?php echo base_url().'logo.png';?>"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav" >
            
           
             <?php 
                                    //$kode_group=$this->session->userdata('kg_jadwal'];
                                
                                    $qmenu0=$this->db->query("SELECT a.* FROM tb_menu a,tb_role b WHERE a.kode_menu=b.kode_menu AND status_role='1' AND parent_menu='0' AND kode_group='$kode_group' order by sort_menu asc")->result_array();
                                    foreach ($qmenu0 as $row0) {
                                        $parent=$row0['kode_menu'];
                                        $qmenu1=$this->db->query("SELECT a.* FROM tb_menu a,tb_role b WHERE a.kode_menu=b.kode_menu AND status_role='1' AND parent_menu='$parent' AND kode_group='$kode_group' order by sort_menu asc");
                                        $cekmenu=$qmenu1->num_rows();
                                        $dmenu1=$qmenu1->result_array();
                                        if($cekmenu>0){
                                            echo "<li class=\"dropdown\" >"; ?>
                                            <a  <?php if($kode_group==2){echo "style='color:white'";}?> href='#' <?php  echo " class=\"dropdown-toggle\" data-toggle=\"dropdown\">".ucwords($row0['nama_menu'])." <b class=\"caret\"></b></a>";
                                            echo "<ul class=\"dropdown-menu\">";
                                                foreach($dmenu1 as $row1){
                                                    echo "<li>".anchor($row1['link_menu'],ucwords($row1['nama_menu']))."</li>";
                                                }
                                            echo "</ul>
                                            </li>";
                                        }else{
                                            echo "<li>".anchor($row0['link_menu'],ucwords($row0['nama_menu']))."</li>";
                                        }
                                    }
                               ?> 
            
            
          </ul>
          <div class="pull-right">
            <ul class="nav navbar-nav">
            <li><a <?php if($kode_group==2){?> style="color:white" <?php } ?> href=""><?php echo ucwords($this->session->userdata('nama'))." - "; if($this->session->userdata('nama_group')=='admin'){echo $this->session->userdata('nama_group');}else{echo $this->session->userdata('penyelenggara'); }?></a></li>
            <li><a <?php if($kode_group==2){?> style="color:white" <?php } ?> href="#"><?php echo "<div id='clockbox'></div>";?></a></li>
              
              <?php if($kode_group==2){?><li><?php echo anchor('login/keluar','<span class="glyphicon glyphicon-lock-out"></span> Logout','style="color:white"');?></li><?php }else{?>
                <li><?php echo anchor('login/keluar','<span class="glyphicon glyphicon-lock-out"></span> Logout');?></li>
                <?php }?>
            </ul>
          </div>
        </div><!--/.nav-collapse -->
      </div>
    </div>