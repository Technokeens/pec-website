<style type="text/css">
   .error{color:red !important;}
   .upload_input{
      margin:0 0 0 191px;
   }
   @media (max-width: 768px) {
      .upload_input{
         margin:0 0 0 20px;
      }
   }
</style>
<link href="<?php echo base_url();?>admin_assets/css/style.css" rel="stylesheet">
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>General Settings</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>General Settings</strong>
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
               <form action="" method="post" class="form-horizontal" name="frm_update_setting" id="frm_update_setting" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Website Title</label>
                     <input type="hidden" id="editid" name="editid" class="form-control" value="<?=(!empty($setting['wid'])) ? $setting['wid'] : ''; ?>">
                     <div class="col-sm-6">
                        <input type="text" id="title" name="title" class="form-control" value="<?=(!empty($setting['title'])) ? $setting['title'] : ''; ?>">
                        <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Primary Email</label>
                     <div class="col-sm-6">
                        <input type="text" id="webemail" name="webemail" class="form-control" value="<?=(!empty($setting['webemail'])) ? $setting['webemail'] : ''; ?>">
                        <?php echo form_error('webemail', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Subscribe Email</label>
                     <div class="col-sm-6">
                        <input type="text" id="subemail" name="subemail" class="form-control" value="<?=(!empty($setting['subemail'])) ? $setting['subemail'] : ''; ?>">
                        <?php echo form_error('subemail', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Website status</label>                       
                     <div class="col-sm-6">
                        <div class="onoffswitch">
                           <?php if(!empty($setting['status'])){ ?>
                              <input <?php if($setting['status']=="on"){?>checked<?php }?> id="check_<?php echo $setting['wid'];?>" data-for="<?php echo $setting['wid'];?>" data-status="<?php echo $setting['status'];?>" class="onoffswitch-checkbox" name="switch" data-toggle="toggle" type="checkbox"> 
                              <label class="onoffswitch-label" for="check_<?php echo $setting['wid'];?>">
                           <?php }else{ ?>
                              <input id="check_0" data-for="0" data-status="0" class="onoffswitch-checkbox" name="switch" data-toggle="toggle" type="checkbox"> 
                              <label class="onoffswitch-label" for="check_0">
                           <?php } ?>
                           
                           <span class="onoffswitch-inner"></span>
                           <span class="onoffswitch-switch"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Logo</label> 
                     <?php if(!empty($setting['logo'])){ ?>
                        <img src="<?php echo base_url();?>uploads/<?=$setting['logo'];?>" style="width:150px;">
                     <?php } ?>
                     
                     <br><br>
                     <div class="controls">
                        <div class="fallback">
                           <input name="logo" id="logo" type="file" class="upload_input" multiple />
                           <input type="hidden" name="hidden_logo" value="<?=(!empty($setting['logo'])) ? $setting['logo'] : ''; ?>">
                        </div>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SEO Title</label>
                     <div class="col-sm-6">
                        <input type="text" name="seo_title" id="seo_title" class="form-control" value="<?=(!empty($setting['seo_title'])) ? $setting['seo_title'] : ''; ?>">
                        <?php echo form_error('seo_title', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SEO Keywords</label>
                     <div class="col-sm-6">
                        <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="<?=(!empty($setting['seo_keywords'])) ? $setting['seo_keywords'] : ''; ?>">
                        <?php echo form_error('seo_keywords', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">SEO Description</label>
                     <div class="col-sm-6">
                        <textarea name="seo_description" id="seo_description" class="form-control"><?=(!empty($setting['seo_description'])) ? $setting['seo_description'] : ''; ?></textarea>
                        <?php echo form_error('seo_description', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Footer Script</label>
                     <div class="col-sm-6">
                        <textarea name="script" id="script" rows="8" class="form-control" >
                           <?=(!empty($setting['script'])) ? ucfirst($setting['script']) : ''; ?>
                         </textarea>
                        <?php echo form_error('script', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-w-m btn-primary" id="btn_update" name="btn_update" type="submit" value="submit"><i class="icon-ok"></i> Save</button>                        
                        <a href="<?php echo base_url().'admin/dashboard';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
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
   
       var switchery = new Switchery(elem, { color: '#1AB394' });
   
       var elem_2 = document.querySelector('.js-switch_2');
   
       var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
   
   
   
       var elem_3 = document.querySelector('.js-switch_3');
   
       var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });
   
          
   
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
   
   
   
     $("#frm_update_setting").on('submit',function()
   
     {    
   
       var title         = $('#title').val();
   
       var webemail      = $('#webemail').val();
   
       var subemail      = $('#subemail').val();
   
       var password   = $('#password').val();
       var seo_title = $('#seo_title').val();
       var seo_keywords  = $('#seo_keywords').val();
       var seo_description = $('#seo_description').val();
       var script  = $('#script').val();
   
       var pattern         = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
   
       var flag=0;
   
   
   
       if(title=="")
   
       {
   
         show_error("title","Please enter title");
   
         flag=1;
   
       }
   
       else
   
       {
   
         remove_error("title");       
   
       }
   
       if(seo_title == "")
       {
         show_error("seo_title","Please enter seo title");
         flag=1;
       }else{
         remove_error("seo_title");
       }
       if(seo_keywords == "")
       {
         show_error("seo_keywords","Please enter seo keywords");
         flag=1;
       }else{
         remove_error("seo_keywords");
       }
       if(seo_description == "")
       {
         show_error("seo_description","Please enter seo description");
         flag=1;
       }else{
         remove_error("seo_description");
       }
       if(script == "")
       {
         show_error("script","Please enter script");
         flag=1;
       }else{
         remove_error("script");
       }
   
      
   
       if(webemail=="")
       {
         show_error("webemail","Please enter email");
         flag=1;
       }
       else
       {
         if (pattern.test(webemail)) 
         {
           remove_error("webemail");
         }
         else
         {
           alert();
           show_error("webemail","Please enter valid email");
           flag=1;
         }
   
       }
   
   
       if(subemail=="")
       {
         show_error("subemail","Please enter sub email");
           flag=1;
       }
       else
       {
         if (pattern.test(subemail)) 
         {
           remove_error("subemail");
         }
         else
         {
           show_error("subemail","Please enter valid email");
           flag=1;
         }
       }
   
       if(flag==1)
       {
         return false;
       }
       else
       {
         $('#btn_update_user').css('pointer-events','none');
         return true;
   
       }  
   
     });
   
   
   
   });
   
</script>