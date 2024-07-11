<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Edit Slider</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-slider'; ?>">Slider</a>
         </li>
         <li class="active">
            <strong>Edit Slider</strong>
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
               <form action="" method="post" class="form-horizontal" name="frm_edit_slider" id="frm_edit_slider" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Slider Content</label>
                     <div class="col-sm-6">
                        <input type="text" id="slider_content" name="slider_content" class="form-control" value="<?php echo $detail['title']?>">
                        <?php echo form_error('slider_content', '<div class="error">', '</div>'); ?>
                        <div id="cont_err"></div>
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
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Slider Image</label>
                     <div class="col-sm-6">
                        <input type="hidden" id="hidden_slider" name="hidden_slider" class="form-control" value="<?php echo $detail['image']?>">
                        <input type="file" id="slider_img" name="slider_img" class="form-control" value="<?php echo set_value('slider_img')?>">
                        <br><br>
                        <?php 
                           if($detail['image']!="")
                           {
                           ?>
                        <img src="<?php echo base_url().'uploads/slider/medium/'.$detail['image']?>" width="80" height="80">
                        <?php
                           }
                           ?>
                        <div id="slidererr"></div>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Url</label>
                     <div class="col-sm-6">
                        <input type="text" id="url" name="url" class="form-control" value="<?php echo $detail['url'];?>">
                        <?php echo form_error('url', '<div class="error">', '</div>'); ?>
                        <div id="url_err"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-w-m btn-primary" id="edit_slider" name="edit_slider" type="submit" value="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-slider';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>admin_assets/ckeditor2/ckeditor.js"></script> 
<script type="text/javascript">
    CKEDITOR.replace('description', {
        'filebrowserImageBrowseUrl': '<?=base_url()?>admin_assets/ckeditor2/plugins/imgbrowse/imgbrowse.html',
        'filebrowserImageUploadUrl': '<?=base_url()?>admin_assets/ckeditor2/plugins/iaupload.php'
      });
    
</script> 
<script type="text/javascript">
   $(document).on('submit','#frm_edit_slider',function(){ 
   //alert();  
     var slider_content  = $('#slider_content').val();

     var description         = CKEDITOR.instances.description.getData(); 
     $('#descerr').val(description);

     // var slider_img      = $("#slider_img").val();
     var flag = 0;
     if (slider_content == "") {
         $("#cont_err").css("color", "red");
         $("#cont_err").html("Please Enter Slider Content");
         flag = 1;
     } else {
       $("#cont_err").html("");
     }

     if(description=="")
      {
        //show_error("descerr","Enter technology description");
        $("#descerr").css("color", "red");
        $("#descerr").html("Enter slider description");
        flag=1;
      }
      else
      {
        //remove_error("descerr");
        $("#descerr").html("");   
      }
   
     if (slider_img == "") {
         $("#slidererr").css("color", "red");
         $("#slidererr").html("Please Select Image");
         flag = 1;
     } else {
       $("#slidererr").html("");
     }
     
     if (flag == 1) {
         return false;
     } else {
     
        return true;
   
     }
   });
   $(document).on('change', '#slider_img', function(e) {
        //alert();
        var sub_image = $(this).val();
        var extension = sub_image.split('.').pop().toUpperCase();
        var file = this.files[0];
        var name = file.name;
        var size = file.size;
        var type = file.type;
   
        if (extension != "PNG" && extension != "JPG" && extension != "JPEG") 
        {
            $("#slidererr").css("color", "red");
            $("#slidererr").html("Please select only jpg or png image type");
            return false;
        } 
        else 
        {
           /* var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function() {
                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height != 750 || width != 1680) {
                      $("#slidererr").css("color", "red");
                      $("#slidererr").html("Height must be 750px and Width must be 1680px.");
                        return false;
                    }
                    $("#slidererr").html("");*/
                    return true;
           /*     };
            }*/
        }
    });
   
</script>