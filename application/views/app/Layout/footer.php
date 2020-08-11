<footer class="footer hidden-xs-down">
        <p>© MEMO ONLINE | IT DEPT. PLASINDO LESTARI. | VERSION: PLSME-DEE-v2.1</p>
    </footer>
</section>
</main>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/tether/dist/js/tether.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/Waves/dist/waves.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script> -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/moment/min/moment.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/flatpickr/dist/flatpickr.min.js"></script> -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/nouislider/distribute/nouislider.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>

<!-- <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/flot/jquery.flot.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/flot.curvedlines/curvedLines.js"></script> -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<!-- <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script> -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script> -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/autosize/dist/autosize.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>

<!-- Charts and maps-->
<!-- <script src="<?php echo base_url()?>assets/v2/demo/js/flot-charts/curved-line.js"></script>
<script src="<?php echo base_url()?>assets/v2/demo/js/flot-charts/chart-tooltips.js"></script>
<script src="<?php echo base_url()?>assets/v2/demo/js/other-charts.js"></script>
<script src="<?php echo base_url()?>assets/v2/demo/js/jqvmap.js"></script> -->

<!-- Calendar Script -->
<!-- <script src="<?php echo base_url()?>assets/v2/js/calendar.js"></script> -->

<!-- Vendors: Data tables -->
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/v2/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>

<!-- App functions and actions -->
<script src="<?php echo base_url()?>assets/v2/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/js/memo.js"></script>
<script src="<?php echo base_url()?>assets/js/autocomplete.js"></script>
<script>
// Ajax Validasi Add Username
$(document).ready(function(){  
    $('#username').change(function(){  
        var username = $('#username').val();  
        if(username != '')  
        {  
            $.ajax({  
                url:"<?php echo base_url(); ?>user/chekusername",  
                method:"POST",  
                data:{username:username},  
                success:function(data){  
                  $('#message').html(data);  
              }  
          });
            $.ajax({  
                url:"<?php echo base_url(); ?>user/adduserbtn",  
                method:"POST",  
                data:{username:username},  
                success:function(data){  
                    $('#adduser').html(data);  
                }  
            });    
        }  
    });  
});
</script>
</html>