<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>

<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Add Power Rating</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-construction'; ?>"> Power Rating</a>
         </li>
         <li class="active">
            <strong>Add Power Rating</strong>
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
                     <label class="col-sm-2 control-label">Power Rating</label>
                     <div class="col-sm-10">
                        <!-- <input type="number" step="any" min="0" id="power_rating" name="power_rating" class="form-control" > -->
                        <input type="text" id="power_rating" name="power_rating" class="form-control" >
                     </div>
                  </div>
                  <!-- <div class="hr-line-dashed " ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Measuring Unit </label>
                     <div class="col-sm-10">
                        <input type="text" id="unit" name="unit" class="form-control" >
                     </div>
                  </div> -->
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Position</label>
                     <div class="col-sm-10">
                        <input type="number" id="position" min="0" name="position" class="position form-control">
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>

                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-w-m btn-primary" id="btn_add_powerrating" name="btn_add_powerrating" value="submit" ><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-power-rating';?>"><button class="btn btn-white" type="button">Cancel</button></a>
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
      var power_rating          = $('#power_rating').val();
      // var unit    = $('#unit').val();
      var position                    = $('#position').val();
      var flag=0;

      if(power_rating=="")
      {
        show_error("power_rating","Enter power rating number");
        flag=1;
      }
      else
      {
        remove_error("power_rating");       
      }

      // if(unit=="")
      // {
      //   show_error("unit","Enter unit");
      //   flag=1;
      // }
      // else
      // {
      //   remove_error("unit");       
      // }

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
      $('#btn_add_powerrating').css('pointer-events','none')
       return true;
     }  
   });
     
   });
   
</script>