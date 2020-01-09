<script src="../js/jquery.min.js?v=2.1.1"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/language/<?php echo lang; ?>.js" type="text/javascript"></script>

<!-- Morris.js charts -->
<script src="../js/raphael-min.js"></script>
<script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>
<script src="../js/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="../js/validate/jquery.validate.min_<?php echo lang; ?>.js" type="text/javascript"></script>
<script src="../js/jquery.form.js" type="text/javascript"></script>
<script src="../js/jquery.fancybox.js" type="text/javascript"></script>
<script src="../js/core.js" type="text/javascript"></script>
<script src="../js/plugins/autocomplete/typeahead.bundle.js"></script>

<script src="../js/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>
<?php
foreach($this->load->js_files as $v_js):
	echo '<script src="'.$v_js.'" type="text/javascript"></script>'."\r\n";
endforeach;
?>