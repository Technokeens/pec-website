<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>

<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Add Construction</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-construction'; ?>">Construction</a>
         </li>
         <li class="active">
            <strong>Add Construction</strong>
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
               <form action="" method="post" class="form-horizontal" name="frm_add_product" id="frm_add_product" enctype="multipart/form-data">
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Construction Title</label>
                     <div class="col-sm-10">
                        <input type="text" id="construction_title" name="construction_title" class="form-control" >
                     </div>
                  </div>
                  <div class="hr-line-dashed " ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="construction_description" name="construction_description" class="form-control"></textarea>
                       
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Position</label>
                     <div class="col-sm-10">
                        <input type="number" min="0" id="position" name="position" class="position form-control">
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>

                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-w-m btn-primary" id="btn_add_construction" name="btn_add_construction" value="submit" ><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-construction';?>"><button class="btn btn-white" type="button">Cancel</button></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

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

    $("#frm_add_product").on('submit',function()
    {     
      var construction_title          = $('#construction_title').val();
      var construction_description    = $('#construction_description').val();
      var position                    = $('#position').val();
      var flag=0;

      if(construction_title=="")
      {
        show_error("construction_title","Enter construction title");
        flag=1;
      }
      else
      {
        remove_error("construction_title");       
      }

      if(construction_description=="")
      {
        show_error("construction_description","Enter short description");
        flag=1;
      }
      else
      {
        remove_error("construction_description");       
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
 
     if(flag==1)
     {
       return false;
     }
     else
     {
      $('#btn_add_construction').css('pointer-events','none')
       return true;
     }  
   });
     
   });
   
</script>