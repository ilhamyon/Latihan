<script src="<?php echo base_url().'assets/';?>jquery/jquery-1.10.2.js"></script>
<script src="<?php echo base_url().'assets/';?>js/bootstrap.min.js"></script>    
<script src="<?php echo base_url();?>assets/media/js/jquery.dataTables.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.marquee.js"></script>  
<script src="<?php echo base_url();?>assets/js/flowplayer.playlist-3.2.11.js"></script>  

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

itemSelecter : 'tr',
delay: 5000,

// animation speed
speed: 1,

// animation timing
timing: 0,


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
mouse: false

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
mouse: false

});  

$('#sk').marquee({

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
mouse: false

});  


$('#pengumuman').marquee({

// enable the plugin
enable : true,  //plug-in is enabled

// scroll direction
// 'vertical' or 'horizontal'
direction: 'vertical',

// children items
itemSelecter : 'tr', 

// animation delay
delay: 10000,

// animation speed
speed: 2,

// animation timing
timing: 1,

// mouse hover to stop the scroller
mouse: false

});  

</script>