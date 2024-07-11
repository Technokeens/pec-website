<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Add Events</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-event'; ?>">Events</a>
         </li>
         <li class="active">
            <strong>Events</strong>
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
               <form action="" method="post" class="form-horizontal" name="frm_add_news" id="frm_add_news" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-10">
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title')?>">
                        <div id="titles"></div>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10">
                        <textarea id="description" name="description" rows="5" class="form-control"><?php echo set_value('description')?></textarea>
                        
                        <div id="descriptions"></div>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  
                  <!-- <div class="form-group">
                    <label class="col-sm-2 control-label">Event Start & End Date</label>
                    <div class="col-sm-5">
                      <input type="text" id="start_date" name="start_date" class="form-control" value="<?php echo set_value('start_date')?>">
                      <div id="starterr"></div>
                    </div>
                  
                    <div class="col-sm-5">
                      <input type="text" id="event_end_date" name="end_date" class="form-control" value="<?php echo set_value('end_date')?>">
                      <div id="enderr"></div>
                    </div>
                  </div>
                  <div class="hr-line-dashed"></div> -->

                  <div class="form-group">
                     <label class="col-sm-2 control-label" >Upload Images </label>
                     <div class="col-sm-10">
                        <input type="file" class="form-control" name="file_name" id="file_name">
                        <?php echo form_error('file_name', '<div class="error text-danger">', '</div>'); ?>
                        <div class="file_names"></div>
                        <p style="color: green;">Note : Choose 500 X 500px or 600 X 600px diamension size  for event </p>
                     </div>
                  </div>
               
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-w-m btn-primary" id="btn_news" name="btn_news" type="submit" value="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-event';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
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
   $(document).on('submit','#frm_add_news',function(){   
      var title        = $('#title').val();
      var description  = $('#description').val();
      var file_name         = $('#file_name').val();
      var start_date        = $('#start_date').val();
      var end_date          = $('#event_end_date').val();
      var flag = 0;
   
     if(title == "")
     {
       $("#titles").css("color","red");
       $("#titles").html("Please enter Title");
       flag = 1;
     }else{
       $("#titles").html("");
     }
     if(description == "")
     {
       $("#descriptions").css("color","red");
       $("#descriptions").html("Please enter Description");
       flag = 1;
     }else{
       $("#descriptions").html("");
     }
     
    if (start_date == "") 
    {
      $("#starterr").css("color","red");
      $("#starterr").html("Please select start date");
      flag = 1;
    }
    else
    {
      $("#starterr").html("");
    }

    if (end_date == "") 
    {
      $("#enderr").css("color","red");
      $("#enderr").html("Please select end date");
      flag = 1;
    }
    else
    {
      if (end_date < start_date ) 
      {
        $("#enderr").css("color","red");
        $("#enderr").html("Please select end date is greater than start date");
        flag = 1;
      } 
      else
      {
        $("#enderr").html("");
      }
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
      $('#btn_news').css('pointer-events','none');
         return true;
     }
   });
   
   
      var count = 1;
      function link_images() {
      
      count++;
      var objTo = document.getElementById('field');
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "form-group removeclass_image"+count);
     
      divtest.innerHTML = '<div class="form-group"><label class="col-sm-2 control-label">Link</label><div class="col-sm-4"><input type="text" id="link" name="link[]" class="form-control link" value="<?php echo set_value('link')?>"><?php echo form_error('link', '<div class="error">', '</div>'); ?><div class="links"></div></div><div class="col-sm-2"><button class="btn btn-danger" type="button" data-id="1"  onclick="remove_fields('+ count +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div>';
      
      objTo.appendChild(divtest)
   
      }
      function remove_fields(rid) {
         $('.removeclass_image'+rid).remove();
      }


      $(function() {
          $('input[name="start_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: false,
            minYear: 2018,
            //autoUpdateInput: false,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {
              format: 'DD-MM-YYYY'
            }
          }, 
          function(start, end, label) {
            var years = moment().diff(start, 'years');
          });
        });
        $(function() {
          $('input[name="end_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: false,
            minYear: 2018,
            //autoUpdateInput: false,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {
              format: 'DD-MM-YYYY'
            }
          }, 
          function(start, end, label) {
            var years = moment().diff(start, 'years');
          });
        });

   
</script>