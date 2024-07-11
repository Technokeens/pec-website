<html>
<head>
    <?php 
    $feviconlogo = base_url()."assets/images/fevi.png";
  ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title?></title>
    <!-- <link rel="icon" href="<?php echo base_url()?>uploads/element.png" type="images/png" sizes="32x32"> -->
    <link href="<?=$feviconlogo;?>" rel="icon">
    <link href="<?php echo base_url();?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">    
    <link href="<?php echo base_url();?>admin_assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/iCheck/custom.css" rel="stylesheet">    
    <link href="<?php echo base_url();?>admin_assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">    
    <link href="<?php echo base_url();?>admin_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="<?php echo base_url();?>admin_assets/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script> 
    <script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>admin_assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
    <style type="text/css">
    .note-editor.note-frame .note-editing-area .note-editable{height: 400px;}</style>
   <!--  <script type="text/javascript">var site_url="<?php echo base_url();?>";</script> -->
   <script type="text/javascript">var site_url="<?php echo base_url();?>";</script>
   <style type="text/css">
       .ajax_loading {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: .8;
            background: url('<?php echo base_url();?>admin_assets/icons/loader.gif') 50% 50% no-repeat #f9f9f9
        }

      /*  .loader_page {
            display: none
        }

        .hide_loader {
            display: none
        }*/

        .loader_background {
            background: rgb(13, 106, 113, 0.26)
        }
   </style>
</head>
<body>
<div class="loader_background">
    <div class="ajax_loading hide_loader" id="ajax_loading">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo base_url()?>admin_assets/icons/loader.gif" width="48" height="48" alt="Munchur Machines"></div>
        <p style="color: wheat;">Please wait...</p>   
    </div>
</div>
