<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
<link rel="stylesheet" href="<?php echo base_url().'admin_assets/bootsrap_multiselect'?>/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url().'admin_assets/bootsrap_multiselect'?>/js/bootstrap-multiselect.js"></script>
<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Edit Application</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-application'; ?>">Application</a>
         </li>
         <li class="active">
            <strong>Edit Application</strong>
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
               <form action="" method="post" class="form-horizontal" name="frm_add_application" id="frm_add_application" enctype="multipart/form-data">
                  
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Application Name</label>
                     <div class="col-sm-10">
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo $detail['title'];?>">
                        <?php //echo form_error('title', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed " ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Short Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="short_description" name="short_description" class="form-control"><?php echo $detail['short_description'];?></textarea>
                        
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="description" name="description" class="form-control"><?php echo $detail['description'];?></textarea>
                        <?php echo form_error('description', '<div class="error">', '</div>'); ?>
                        <div id="descerr"> </div>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Position</label>
                     <div class="col-sm-10">
                        <input type="number" id="position" name="position" min="0" class="position form-control" value="<?php echo $detail['position'];?>">
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Show on Home Page</label>
                     <div class="col-sm-10">
                        <div class="onoffswitch">
                           <input <?=(!empty($detail['show_as_home']) && $detail['show_as_home'] == 'on') ? 'checked' : ''; ?> id="check_1" data-for="1" data-status="1" class="onoffswitch-checkbox" name="show_as_home" data-toggle="toggle" type="checkbox"> 
                           <label class="onoffswitch-label" for="check_1">
                           <span class="onoffswitch-inner"></span>
                           <span class="onoffswitch-switch"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Keyword</label>
                     <div class="col-sm-10">
                        <input type="text" id="meta_keyword" name="meta_keyword" class="meta_keyword form-control" value="<?php echo $detail['seo_keywords'];?>">
                        <?php echo form_error('meta_keyword', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="meta_description" name="meta_description" class="form-control"><?php echo set_value('meta_description')?><?php echo $detail['seo_description'];?></textarea>
                        <?php echo form_error('meta_description', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Title</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="meta_title" name="meta_title" class="form-control"><?php echo $detail['seo_title'];?></textarea>
                        <?php echo form_error('meta_title', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Black Image</label>
                     <div class="col-sm-4">
                        <input name="hidden_img" id="hidden_img" type="hidden" style="margin:0 0 0 0px;"  value="<?=$detail['application_image']?>">   
                        <?php
                          if($detail['application_image']!="")
                          {
                        ?>
                            <img src="<?php echo base_url().'uploads/application/thumb/'.$detail['application_image'];?>" style="margin-bottom:10px;">
                        <?php
                          }
                        ?>
                        <input name="application_image" id="application_image" type="file" style="margin:0 0 0 0px;" multiple=false ><!-- class="btn btn-primary" -->
                        <?php echo form_error('application_image', '<div class="error">', '</div>'); ?>
                        <p style="color: green;">Note :  Diamension size atleast 530px X 464px for product image. </p>
                     </div>
                     <label class="col-sm-2 control-label">White Image</label>
                     <div class="col-sm-4">
                        <input name="hidden_img_white" id="hidden_img_white" type="hidden" style="margin:0 0 0 0px;"  value="<?=$detail['application_icon_white']?>">   
                        <?php
                          if($detail['application_icon_white']!="")
                          {
                        ?>
                            <img src="<?php echo base_url().'uploads/application/white/thumb/'.$detail['application_icon_white'];?>" style="background: black;padding: 10px;margin-bottom:10px;" >
                        <?php
                          }
                        ?>
                        <input name="application_icon_white" id="application_icon_white" type="file" style="margin:0 0 0 0px;" multiple=false ><!-- class="btn btn-primary" -->
                        <?php echo form_error('application_icon_white', '<div class="error">', '</div>'); ?>
                        <p style="color: green;">Note :  Diamension size atleast 530px X 464px for product image. </p>
                     </div>

                     <label class="col-sm-2 control-label">Alternative Text</label>
                     <div class="col-sm-4">
                        <input name="application_image_alt" id="application_image_alt" type="text" style="margin:0 0 0 0px;" class="meta_keyword form-control" value="<?=(!empty($detail['application_image_alt'])) ? $detail['application_image_alt'] : ''; ?>">
                        <p style="color: green;">Note :  Add Alternative Text for Black Image. </p>
                     </div>

                     <label class="col-sm-2 control-label">Alternative Text</label>
                     <div class="col-sm-4">
                        <input name="application_icon_white_alt" id="application_icon_white_alt" type="text" style="margin:0 0 0 0px;" class="meta_keyword form-control" value="<?=(!empty($detail['application_icon_white_alt'])) ? $detail['application_icon_white_alt'] : ''; ?>">
                        <p style="color: green;">Note :  Add Alternative Text for White Image. </p>
                     </div>

                  </div>
                  <div class="hr-line-dashed"></div>
                 
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Banner Image</label>
                     <div class="col-sm-10">
                        <input name="hidden_ban_img" id="hidden_ban_img" type="hidden" style="margin:0 0 0 0px;" value="<?=$detail['banner_image']?>">   
                        <?php
                          if($detail['banner_image']!="")
                          {
                        ?>
                            <img src="<?php echo base_url().'uploads/application_banner/thumb/'.$detail['banner_image'];?>" style="margin-bottom: 10px;">
                        <?php
                          }
                        ?>
                        <input name="banner_image" id="banner_image" type="file" style="margin:0 0 0 0px;" multiple=false ><!-- class="btn btn-primary" -->
                        <?php echo form_error('banner_image', '<div class="error">', '</div>'); ?>
                        <p style="color: green;">Note :  Diamension size atleast 1350px X 400px for banner. </p>
                     </div>

                     <label class="col-sm-2 control-label">Alternative Text</label>
                     <div class="col-sm-4">
                        <input name="banner_image_alt" id="banner_image_alt" type="text" style="margin:0 0 0 0px;" class="meta_keyword form-control" value="<?=(!empty($detail['banner_image_alt'])) ? $detail['banner_image_alt'] : ''; ?>">
                        <p style="color: green;">Note :  Add Alternative Text for Banner Image. </p>
                     </div>

                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-w-m btn-primary" id="btn_edit_product" name="btn_edit_product" value="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-application';?>"><button class="btn btn-white" type="button">Cancel</button></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="<?=base_url()?>admin_assets/ckeditor2/ckeditor.js"></script> 
<script type="text/javascript">
    CKEDITOR.replace('description', {
        'filebrowserImageBrowseUrl': '<?=base_url()?>ckeditor2/plugins/imgbrowse/imgbrowse.html',
        'filebrowserImageUploadUrl': '<?=base_url()?>ckeditor2/plugins/iaupload.php'
      });
</script> 

<script type="text/javascript">
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
 
  $(document).ready(function()
  {
    $("#frm_add_application").on('submit',function()
    {     
      var description         = CKEDITOR.instances.description.getData(); 
      $('#descerr').val(description);
      var title         = $('#title').val();
      var short_description   = $('#short_description').val();
      var meta_title          = $('#meta_title').val();
      var meta_description    = $('#meta_description').val();
      var meta_keyword        = $('#meta_keyword').val();
      var position            = $('#position').val();
      var flag=0;

      if(title=="")
      {
        show_error("title","Enter application name");
        flag=1;
      }
      else
      {
        remove_error("title");       
      }

      if(description=="")
      {
        show_error("descerr","Enter technology description");
        flag=1;
      }
      else
      {
        remove_error("descerr");       
      }

      if(position=="")
      {
        show_error("position","Enter position");
        flag=1;
      }
      else
      {
        remove_error("position");       
      }

      if(short_description=="")
      {
        show_error("short_description","Enter short description");
        flag=1;
      }
      else
      {
        remove_error("short_description");       
      }

      if(meta_title=="")
      {
        show_error("meta_title","Enter meta title");
        flag=1;
      }
      else
      {
        remove_error("meta_title");       
      }

      if(meta_description=="")
      {
        show_error("meta_description","Enter meta description");
        flag=1;
      }
      else
      {
        remove_error("meta_description");       
      }

      if(meta_keyword=="")
      {
        show_error("meta_keyword","Enter meta keywords");
        flag=1;
      }
      else
      {
        remove_error("meta_keyword");       
      }
     
 
     if(flag==1)
     {
       return false;
     }
     else
     {
       return true;
     }  
    });
  });
  $(document).on('change', '#application_image', function(e) {
     var sub_image=$(this).val();
     var extension = sub_image.split('.').pop().toUpperCase();
     var file = this.files[0];
     var name = file.name;
     var size = file.size;
     var type = file.type;
    
    if (extension!="PNG" && extension!="JPG" && extension!="JPEG")
     {
       show_error("application_image","Please select only jpg or png image type");
       flag=1;
     }
     else
     {
        remove_error("application_image");
               return true;
       
     }
  });
  $(document).on('change', '#banner_image', function(e) {
     var sub_image=$(this).val();
     var extension = sub_image.split('.').pop().toUpperCase();
     var file = this.files[0];
     var name = file.name;
     var size = file.size;
     var type = file.type;
    
    if (extension!="PNG" && extension!="JPG" && extension!="JPEG")
     {
       show_error("banner_image","Please select only jpg or png image type");
       flag=1;
     }
     else
     {
        remove_error("banner_image");
               return true;
       
     }
  });
</script>