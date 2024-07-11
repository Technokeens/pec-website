<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Add Clients</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-client'; ?>">Clients</a>
         </li>
         <li class="active">
            <strong>Clients</strong>
         </li>
      </ol>
   </div>
   <div class="col-lg-2">
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <?php if($this->session->flashdata('success')!='')
      {
        ?>
   <div class="alert alert-success">
      <button data-dismiss="alert" class="close"></button>
      <?php echo $this->session->flashdata('success');?>
      <?= $this->session->unset_userdata('success');?>
   </div>
   <?php
      } ?>
   <?php if($this->session->flashdata('error')!=''){?>
   <div class="alert alert-danger">
      <button data-dismiss="alert" class="close"></button>
      <?php echo $this->session->flashdata('error');?>
      <?= $this->session->unset_userdata('error');?>
   </div>
   <?php } ?>
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-content">
               <form action="" method="post" class="form-horizontal" name="frm_add_client" id="frm_add_client" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-10">
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title')?>">
                        <div id="titles"></div>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-2 control-label" >Upload Images </label>
                     <div class="col-sm-10">
                        <input type="file" class="form-control" name="file_name" id="file_name">
                        <?php echo form_error('file_name', '<div class="error text-danger">', '</div>'); ?>
                        <div class="file_names"></div>
                        <!-- <p style="color: green;">Note : Choose 500 X 500px or 600 X 600px diamension size  for client </p> -->
                     </div>
                  </div>
               
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-w-m btn-primary" id="btn_client" name="btn_client" type="submit" value="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-client';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?=base_url()?>admin_assets/ckeditor2/ckeditor.js"></script> 
<script type="text/javascript">
    CKEDITOR.replace('description', {
        'filebrowserImageBrowseUrl': '<?=base_url()?>admin_assets/ckeditor2/plugins/imgbrowse/imgbrowse.html',
        'filebrowserImageUploadUrl': '<?=base_url()?>admin_assets/ckeditor2/plugins/iaupload.php'
      });
    
</script> 

<script type="text/javascript">
   $(document).ready(function()
   {
     function show_error(id,msg)
     { 
       if(!$("#"+id).hasClass("has-error"))
       {
         $("#"+id).addClass("has-error");
         $('<span for="'+id+'" class="text-danger">'+msg+'</span>').insertAfter($("#"+id));      
       }
       else
       {
         $("#"+id).next("span.text-danger").html(msg);
       }
     }
     function remove_error(id)
     {
       $("#"+id).removeClass("has-error");
       $("#"+id).next("span.text-danger").remove();
     }
   });
   $(document).on('submit','#frm_add_client',function(){   
      var title        = $('#title').val();
      var file_name         = $('#file_name').val();
      var flag = 0;
   
     if(title == "")
     {
       $("#titles").css("color","red");
       $("#titles").html("Please enter Title");
       flag = 1;
     }else{
       $("#titles").html("");
     }

     if(file_name == "")
     {
       $(".file_names").css("color","red");
       $(".file_names").html("Please select atleast one Image");
       flag = 1;
     }else{
       $("#file_name").html("");
     }  
   
     if (flag == 1) {
         return false;
     } else {
      $('#btn_client').css('pointer-clients','none');
         return true;
     }
   });
</script>