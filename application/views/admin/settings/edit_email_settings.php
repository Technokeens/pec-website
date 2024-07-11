<style type="text/css">
   .error {
   color: red !important;
   }
</style>
<link href="<?php echo base_url();?>admin_assets/css/style.css" rel="stylesheet">
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Email Settings</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Email Settings</strong>
         </li>
      </ol>
   </div>
   <div class="col-lg-2">
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <?php if($this->session->flashdata('success')!=''){?>
   <div class="alert alert-success">
      <button data-dismiss="alert" class="close"></button>
      <?php echo $this->session->flashdata('success');?>
      <?= $this->session->unset_userdata('success');?>
   </div>
   <?php } ?>
   <?php if($this->session->flashdata('error')!=''){?>
   <div class="alert alert-error">
      <button data-dismiss="alert" class="close"></button>
      <?php echo $this->session->flashdata('error');?>
      <?= $this->session->unset_userdata('error');?>
   </div>
   <?php } ?>
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-content">
               <form action="" method="post" class="form-horizontal" name="frm_update_email_setting" id="frm_update_email_setting" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SMTP Host</label>
                     <div class="col-sm-6">
                        <input type="text" name="smtphost" id="smtphost" class="form-control" value="<?php echo $mailsetting['smtphost'];?>">
                        <?php echo form_error('smtphost', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SMTP Port</label>
                     <div class="col-sm-6">
                        <input type="text" name="smtpport" id="smtpport" class="form-control" value="<?php echo $mailsetting['smtpport'];?>">
                        <?php echo form_error('smtpport', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SMTP User</label>
                     <div class="col-sm-6">
                        <input type="text" name="smtpuser" id="smtpuser" class="form-control" value="<?php echo $mailsetting['smtpuser'];?>">
                        <?php echo form_error('smtpuser', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SMTP Password</label>
                     <div class="col-sm-6">
                        <input type="password" name="smtppass" id="smtppass" class="form-control" value="<?php echo base64_decode($mailsetting['smtppass']);?>">
                        <?php echo form_error('smtppass', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-w-m btn-primary" id="btn_update_email_settings" name="btn_update_email_settings" type="submit" value="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/dashboard';?>">
                        <button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button>
                        </a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/switchery/switchery.js"></script>
<script>
   $(document).ready(function()
   
       {
   
           var elem = document.querySelector('.js-switch');
   
           var switchery = new Switchery(elem, {
               color: '#1AB394'
           });
   
           var elem_2 = document.querySelector('.js-switch_2');
   
           var switchery_2 = new Switchery(elem_2, {
               color: '#ED5565'
           });
   
           var elem_3 = document.querySelector('.js-switch_3');
   
           var switchery_3 = new Switchery(elem_3, {
               color: '#1AB394'
           });
   
       });
</script>
<script type="text/javascript">
   $(document).ready(function()
   
       {
   
           function show_error(id, msg)
   
           {
   
               if (!$("#" + id).hasClass("has-error"))
   
               {
   
                   $("#" + id).addClass("has-error");
   
                   $('<span for="' + id + '" class="text-danger">' + msg + '</span>').insertAfter($("#" + id));
   
               } else
   
               {
   
                   $("#" + id).next("span.text-danger").html(msg);
   
               }
   
           }
   
           function remove_error(id)
   
           {
   
               $("#" + id).removeClass("has-error");
   
               $("#" + id).next("span.text-danger").remove();
   
           }
   
           $("#frm_update_email_setting").on('submit', function()
   
               {
   
                   var smtphost = $('#smtphost').val();
   
                   var smtpport = $('#smtpport').val();
   
                   var smtpuser = $('#smtpuser').val();
   
                   var smtppass = $('#smtppass').val();
   
                   var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
   
                   var flag = 0;
   
                   if (smtphost == "")
                   {
                       show_error("smtphost", "Please enter SMTP Host");
   
                       flag = 1;
                   } else
   
                   {
                       remove_error("smtphost");
                   }
   
                   if (smtpport == "")
                   {
                       show_error("smtpport", "Please enter SMTP Port");
   
                       flag = 1;
                   } else
   
                   {
                       remove_error("smtpport");
                   }
   
                   if (smtpuser == "")
                   {
                       show_error("smtpuser", "Please enter SMTP User");
   
                       flag = 1;
                   } else
   
                   {
                       remove_error("smtpuser");
                   }
   
                   if (smtppass == "")
                   {
                       show_error("smtppass", "Please enter SMTP Password");
   
                       flag = 1;
                   } else
   
                   {
                       remove_error("smtppass");
                   }
   
                   if (flag == 1) {
                       return false;
                   } else {
                       $('#btn_update_email_settings').css('pointer-events','none');
                       return true;
   
                   }
   
               });
   
       });
</script>