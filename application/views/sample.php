<!DOCTYPE html>
<html lang="en">
<?php include 'head_client.php';?>
  <body>
<style type="text/css">
            .marquee{

            	margin: auto;
               width: 100%;
              height: 300px;
              overflow: hidden;
              
            }
            .marquee1{
               width: 100%;
              height: 370px;
              overflow: hidden;
              border:0px solid #ccc;
            }
            .marquee2{
               width: 100%;
              height: 350px;
              overflow: hidden;
              border:0px solid #ccc;
            }
        </style>
    <div class="container-fluid">
	<div style="border: solid 0px #29447E; width=1920px; height=283px; background: url('<?php echo base_url().'assets/';?>images/langit.jpg'); padding: 0px; -moz-border-radius: 0px; -khtml-border-radius: 0px; -webkit-border-radius: 0px; border-radius: 0px; margin: 0;" class="row">
		<div class="col-md-12">
			<div class="page-header">
				<div class="pull-left"><a href="<?php echo base_url().'login.html'?>"><span class="glyphicon glyphicon-lock"></span> Login</a></div>
				<h3>
					<center><img width=50 height=80 src="<?php echo base_url().'assets/';?>images/logo.gif"> &nbsp;&nbsp;<b>BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA</b> </center>

				</h3>

			</div>
		</div>
	</div>
	<div class="row">
	<br>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="text-center">AGENDA</h4>	
						</div>
						<div class="" style="background: #8a9ac5;">
								<table border='1' class="table-bordered " style="font-size:20px; background: #ffffff; " width="100%">
			                        <tr class="text-center active" >
			                            <td align="center" rowspan="2" scope="col" width="36"><b>No</b></td>
			                            <td align="center" rowspan="2" scope="col" width="175"><b>Kegiatan</b></td>
			                            
			                            <td width="172" rowspan="2" align="center" scope="col"><b>Lokasi</b><b></b></td>
			                            <td width="93" rowspan="2" align="center" scope="col"><b>Ruang</b></td>
			                            <td align="center" colspan="2" scope="col"><b>Waktu</b></td>
			                            <td align="center" rowspan="2" scope="col" width="142"><b>Penyelenggara</b></td>
			                            <td align="center" rowspan="2" scope="col" width="177"><b>keterangan</b></td>
			                            </tr>
			                          <tr class="active">
			                            <td  align="center" width="160"><b>Tanggal</b></td>
			                            <td  align="center" width="91"><b>Jam</b></td>
			                        </tr>
			                        
			                      
			                    </table>
								
			                    <div class="marquee">
									<table   class="table table-bordered table-hover" border="1" style="margin:0 0 0 0; font-size:20px" width="100%">
				                      <tbody   <?php $sk5=count($kegiatan); if($sk5>=5){?> id="demo" <?php }?>>
				                      	<?php $no=1;
				                      	foreach($kegiatan as $rk){
				                      	?>
				                      	<tr class="active">
				                      		<td align="center" width="40"><?php echo $no;?></td>
				                      		<td width="175"><?php echo ucwords($rk['nama_kegiatan']);?></td>
				                      		
				                      		<td width="171"><?php echo ucwords($rk['nama_gedung']." - ".$rk['lantai']);?></td>
				                      		<td width="94"><?php echo ucwords($rk['nama_ruang']);?></td>
				                      		<td align="center" width="157"><?php if($rk['tanggal2']==null or $rk['tanggal2']=='0000-00-00'){
                                        echo date('d F Y',strtotime($rk['tanggal']));
                                      }else{ 
                                        if(date('F y',strtotime($rk['tanggal']))==date('F y',strtotime($rk['tanggal2']))){
                                              echo date('d',strtotime($rk['tanggal']))." - ".date('d F y',strtotime($rk['tanggal2'])) ;
                                            }else{ 
                                              echo date('d F y',strtotime($rk['tanggal']))." - ".date('d F y',strtotime($rk['tanggal2']));
                                              } 
                                          }?></td>
				                      		<td width="91"><?php echo $rk['jam'];?></td>
				                      		<td width="144"><?php echo ucwords($rk['penyelenggara']);?></td>
				                      		<td width="177"><?php echo $rk['keterangan'];?></td>
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
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="text-center">PENGUMUMAN</h4>	
				</div>
				<div class="" style="height: 375px; background: #8a9ac5;">
					<div class="col-md-12">
					<div class="marquee2">
					<table class="table">
						<tbody <?php if(count($pengumuman)>3){?> id="pengumuman" <?php } ?>>
							<?php foreach($pengumuman as $rp){?>
							<tr>
								<td align="justify"> 
								<h3><?php echo ucfirst($rp['judul_pengumuman']);?></h3>
								<p><?php echo ucfirst($rp['isi_pengumuman']);?></p>
								</td>
							<tr>
							<?php }?>
						</tbody>
					</table>
						<ul class="list-unstyled" >
							
						</ul>
					</div>
				</div>	
				</div>
			</div>
				
		</div>	
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<center>
						<h4>MEDIA</h4>
					</center>	
				</div>
				<div class="panel-body" style="background: #8a9ac5;" height="360px">
					
					<ul  id=""  class="list-unstyled">
						<?php foreach($media as $rm){?>
						<li>
							<video controls width="600" height="360" autoplay>
							  <source  src="<?php echo base_url().$rm['file_media'];?>" type="video/mp4" >
							  Your browser does not support the video tag.
							</video>		
						</li>
						<?php }?>
					</ul>
				
				</div>
			</div>
			
		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<center>
						<h4>Galeri</h4>
					</center>	
				</div>
				<div class="panel-body" style="background: #8a9ac5;">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    	<div class="carousel-inner">
                        <?php $no=1; foreach($iu as $ru){ ?>
                        	<div class="item <?php if($no==1){ echo "active";}?>">
                            	<img style="width:80%; height:350px" class="img-responsive img-thumbnail" src="<?php echo base_url($ru['foto_iu']);?>" alt="">
                            	<div class="carousel-caption">
                            	</div>
                            	<p class="text-center"><?php echo $ru['iu'];?></p>
                            </div>
						<?php $no++; }?>
						</div>
					<!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left"></span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right"></span>
					  </a>
                    </div>
				</div>
			</div>
		
		</div>
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<center>
						<h4>SEPUTAR KITA</h4>
					</center>	
				</div>
				
				<div  class="panel-body" style="background: #8a9ac5; height:410px" >
				<div class="marquee1">
					<ul <?php if(count($sk)>0){?> id="sk" <?php }?> class="list-unstyled">
					<?php foreach($sk as $rk){?>
						<li >
							<div  class="media">
							  <a class="pull-left" href="#">
							    <img  width="130px"   class="media-object img-responsive img-thumbnail" src="<?php echo base_url($rk['foto_sk']);?>" alt="">
							  </a>
							  <div class="media-body">
							    <h4 class="media-heading"><?php echo $rk['judul_sk']?></h4>
							    <p class="text-justify"><?php echo $rk['isi_sk']?></p>
							  </div>
							</div>
						</li>
					<?php }?>
					</ul>
				</div>
				</div>
			</div>
			
		</div>
	</div>


<?php include 'footer_client.php';?>
</div>
<?php include 'js_client.php';?>

				
  </body>
</html>