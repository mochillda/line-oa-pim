<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <!-- DATA TABLES -->
<link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
 <!-- Daterange picker -->
<link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
 <!-- bootstrap wysihtml5 - text editor -->
<link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="../css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="../css/autocomplete/typeahead.css" rel="stylesheet" />
<link href="../js/sweetalert2/sweetalert2.css" rel="stylesheet" />
<?php
foreach($this->load->css_files as $css_files):
	echo '<link href="'.$css_files.'" rel="stylesheet" type="text/css">'."\r\n";
endforeach;
?>