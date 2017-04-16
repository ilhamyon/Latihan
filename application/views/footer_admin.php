<div id="footer">
      <div class="container">
        <p class="text-muted">By: BMKG</p>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="<?php echo base_url().'assets/';?>jquery/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url().'assets/';?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'assets/';?>js/jquery-ui.js"></script>
    <script src="<?php echo base_url().'assets/';?>js/chosen.jquery.js"></script>
    <script src="<?php echo base_url();?>assets/media/js/jquery.dataTables.js"></script>  
    
    <script type="text/javascript">
    $("select").chosen({width: "100%"});
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
      "lengthMenu": [[ 10, 25, -1], [ 10, 25, "Semua"]],
       "dom": '<"top"i>rt<"bottom"flp><"clear">'
        });
    });
    
$(function() {
    $( "#tanggal" ).datepicker({
       dateFormat: "yy-mm-dd",
              changeMonth: true,
              changeYear: true
    });
    $( ".tgl" ).datepicker({
       dateFormat: "yy-mm-dd",
              changeMonth: true,
              changeYear: true
    });
  });


  
     </script>