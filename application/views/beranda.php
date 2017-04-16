<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TEMPLATE1</title>
	<link href="<?php echo base_url().'assets/';?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/';?>css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/';?>css/jadwal.css" media="all" />
	<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">
	<!--[if IE]>
	<style type="text/css" media="all">.borderitem {border-style: solid;}</style>
	<![endif]-->
</head>

<body>

<div id="main">
	<div id="Div">
		<div class="Txt_BADAN">
			
				<p class="lastNode">BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA
			</p>
		</div>
		<div class="clearFloat"></div>
	</div>
	<div class="clearFloat"></div>
	<div id="Div2">
		<div class="Txt_JADWAL">
			
				<p class="lastNode">JADWAL AGENDA KEGIATAN</p>

		</div>
		<div class="clearFloat"></div>
	
	</div>
	<div id="Div3">
		<div class="Txt_PENGUMUMAN">
			
				<p class="lastNode">PENGUMUMAN
			</p>
		</div>
		<div class="clearFloat"></div>
	</div>
	<div class="clearFloat"></div>
	<div id="Div4">
	<table class="table table-striped table-bordered table-hover" style="font-size:12px" width="100%">
                      <thead>
                        <tr class="text-center">
                            <td align="center" rowspan="2" scope="col" width="40px"><b>No</b></td>
                            <td align="center" rowspan="2" scope="col" width="200px"><b>Nama Kegiatan</b></td>
                            <td align="center" rowspan="2" scope="col" width="200px"><b>Jenis Kegiatan</b></td>
                            <td align="center" colspan="2" scope="col"><b>Tempat</b></td>
                            <td align="center" colspan="2" scope="col"><b>Waktu</b></td>
                            <td align="center" rowspan="2" scope="col" width="150px"><b>Penyelenggara</b></td>
                            <td align="center" rowspan="2" scope="col" width="200px"><b>keterangan</b></td>
                            
                            </tr>
                          <tr>
                            <td  align="center" width="150px"><b>Gedung</b></td>
                            <td  align="center" width="150px"><b>Lantai</b></td>
                            <td  align="center" width="150px"><b>Tanggal</b></td>
                            <td  align="center" width="150px"><b>Jam</b></td>
                            
                        </tr>
                        
                      </thead>
                    </table  >
	</div>
	<div id="Div5">
	</div>
	<div class="clearFloat"></div>
	<div id="Div6">
		<div class="Txt_MEDIA">
			
				<p class="lastNode">MEDIA BMKG
			</p>
		</div>
		<div class="clearFloat"></div>
	</div>
	<div id="Div7">
		<div class="Txt_INFORMASI">
			
				<p class="lastNode">INFORMASI UMUM
			</p>
		</div>
		<div class="clearFloat"></div>
	</div>
	<div id="Div8">
		<div class="Txt_SEPUTAR">
			
				<p class="lastNode">SEPUTAR KITA
			</p>
		</div>
		<div class="clearFloat"></div>
	</div>
	<div class="clearFloat"></div>
	<div id="Div9">
	</div>
	<div id="Div10">
	</div>
	<div id="Div11">
	</div>
	<div class="clearFloat"></div>
	<div id="Div12">
		<div class="Txt_RUNING">
			
				<p class="lastNode">RUNING TEXT  RUNING TEXT  RUNING TEXT  RUNING TEXT  RUNING TEXT  RUNING TEXT  RUNING TEXT  RUNING TEXT 
			</p>
		</div>
		<div class="clearFloat"></div>
	</div>
	<div class="clearFloat"></div>
</div>
</body>
<script src="<?php echo base_url().'assets/';?>jquery/jquery-1.10.2.js"></script>
<script src="<?php echo base_url().'assets/';?>js/bootstrap.min.js"></script>    
<script src="<?php echo base_url();?>assets/media/js/jquery.dataTables.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.marquee.js"></script>  

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
                //responsive: true
                 "searching":   false,
                 "ordering": true,
                "info":     false,
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ data per halaman",
                    "zeroRecords": "Maaf, tidak ada data!",
                    "info": "Menampilkan halaman ke _PAGE_ dari _PAGES_ halaman"
                    },
                "pagingType": "full_numbers",
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Semua"]],
                "dom": '<"top"i>rt<"bottom"flp><"clear">'
        });
    });
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


$('#demo').marquee({


direction: 'vertical',

itemSelecter : 'tr'


});  

$('#demo1').marquee({

// enable the plugin
enable : true,  //plug-in is enabled

// scroll direction
// 'vertical' or 'horizontal'
direction: 'vertical',

// children items
itemSelecter : 'li', 

// animation delay
delay: 5000,

// animation speed
speed: 1,

// animation timing
timing: 1,

// mouse hover to stop the scroller
mouse: true

});  

$('#demo2').marquee({

// enable the plugin
enable : true,  //plug-in is enabled

// scroll direction
// 'vertical' or 'horizontal'
direction: 'vertical',

// children items
itemSelecter : 'li', 

// animation delay
delay: 10000,

// animation speed
speed: 1,

// animation timing
timing: 1,

// mouse hover to stop the scroller
mouse: true

});  

</script>
</html>
