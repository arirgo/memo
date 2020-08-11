<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/fanote.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/fanote.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MEMO ONLINE | PLASINDO LESTARI</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/select2/dist/css/select2.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/dropzone/dist/dropzone.css"> -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/flatpickr/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/nouislider/distribute/nouislider.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css"> -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css"> -->
    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/v2/css/app.min.css">
    <!-- Demo only -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/v2/demo/css/demo.css">
    <!-- Fonts and icons     -->
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='<?php echo base_url()?>assets/iconfont/material-icons.css' rel='stylesheet' type='text/css'>
    <!-- include css/js -->
    <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
        $("#loadingheader").hide(); 
            $("#addmemo").click(function(){
                $("#loadingheader").show(); 
                $("#addmemo").hide();
            });
        });
    </script>
    <style type="text/css">
        .denied { 
            width:100%;
            min-width: 250px;
            background-image:url('<?php echo base_url() ?>assets/img/declined.png');
            background-repeat: no-repeat;
            background-position: center center;  
        }
        .pending { 
            width:100%;
            min-width: 250px;
            background-image:url('<?php echo base_url() ?>assets/img/pending.png');
            background-repeat: no-repeat;
            background-position: center center;  
        }
        .expired { 
            width:100%;
            min-width: 250px;
            background-image:url('<?php echo base_url() ?>assets/img/expired.png');
            background-repeat: no-repeat;
            background-position: center center;  
        }
    </style>
</head>
<body data-ma-theme="green">