	<div class="row">
	
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
				<div style="background:#228B22;" class="navbar navbar-default navbar-fixed-bottom">
					<?php $sql=$this->db->query("SELECT rt from tb_rt")->result_array();?>
				<a><marquee style="color:#fff; font-size:25px;" direction="left" scrolldelay="100"><?php foreach($sql as $rs){ echo " | ".ucfirst($rs['rt'])." | ";} ?></marquee></a>
				</div>	 
				</div>
			</div>
		</div>
	</div>