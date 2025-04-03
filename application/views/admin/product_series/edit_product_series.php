<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
<link rel="stylesheet" href="<?php echo base_url().'admin_assets/bootsrap_multiselect'?>/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url().'admin_assets/bootsrap_multiselect'?>/js/bootstrap-multiselect.js"></script>
<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
   .multiselect-container{
      overflow: scroll;
      max-height: 400px;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Edit Series</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-product-series'; ?>">Series</a>
         </li>
         <li class="active">
            <strong>Edit Series</strong>
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
                     <label class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-10">
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo $detail['title'];?>">
                     </div>
                  </div>
                  <div class="hr-line-dashed " ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Construction</label>
                     <div class="col-sm-10">
                      <!-- <select class="form-control" name="construction_id" id="construction_id"> -->
                      <select id="construction_id" name="construction_id[]" class="form-control selectmulti" multiple data-live-search="true">
                        <option value="">Select Construction</option>
                        <?php
                          if(!empty($construction))
                          {
                            foreach ($construction as $constr) 
                            {
                              $selected = '';
                              // if(!empty($detail['construction_id']) && $detail['construction_id'] == $constr['c_id']){
                              //     $selected = 'selected';
                              // }
                              if(!empty($detail['construction_id']) ){
                                $construction_ids = explode(',', $detail['construction_id']);
                                foreach ($construction_ids as $ckey => $cvalue) {
                                  if($cvalue == $constr['c_id'])
                                  {
                                    $selected = 'selected';
                                  }
                                }
                                
                              }
                        ?>
                              <option value="<?=$constr['c_id'];?>" <?=$selected;?>><?php echo ucwords($constr['construction_title']);?></option>
                        <?php
                            }
                          }
                        ?>
                      </select>
                      <div id="construction_id_err"></div>
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
                     <label class="col-sm-2 control-label">Featured Product</label>
                     <div class="col-sm-10">
                        <!-- <input type="checkbox" id="position" name="position" class="position form-control" value="<?php echo $detail['position'];?>"> -->
                        <div class="onoffswitch">
                           <input <?=(!empty($detail['show_as_featured']) && $detail['show_as_featured'] == 'on') ? 'checked' : ''; ?> id="check_1" data-for="1" data-status="1" class="onoffswitch-checkbox" name="show_as_featured" data-toggle="toggle" type="checkbox"> 
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
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="meta_description" name="meta_description" class="form-control"><?php echo set_value('meta_description')?><?php echo $detail['seo_description'];?></textarea>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Title</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="meta_title" name="meta_title" class="form-control"><?php echo $detail['seo_title'];?></textarea>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Image</label>
                     <div class="col-sm-10">
                        <input name="hidden_img" id="hidden_img" type="hidden" style="margin:0 0 0 0px;"  value="<?=$detail['series_image']?>">   
                        <?php
                          if($detail['series_image']!="")
                          {
                        ?>
                            <img src="<?php echo base_url().'uploads/series/'.$detail['series_image'];?>" style="width: 120px;">
                        <?php
                          }
                        ?>
                        <input name="series_image" id="series_image" type="file" style="margin:0 0 0 0px;" multiple=false ><!-- class="btn btn-primary" -->
                        <p style="color: green;">Note :  Diamension size atleast 530px X 464px for product image. </p>
                     </div>

                       <label class="col-sm-2 control-label">Alternative Text</label>
                       <div class="col-sm-10">
                          <input name="series_image_alt" id="series_image_alt" type="text" class="form-control" style="margin:0 0 0 0px;" multiple=false value="<?=(!empty($detail['series_image_alt'])) ? $detail['series_image_alt'] : ''; ?>">
                          <p style="color: green;">Note :  Add Alternative Text for Image. </p>
                       </div>


                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Document's</label>
                     <div class="col-sm-10">
                      <div id="alert_doc"></div>
                      <br>
                        <div class="old_documnets">
                          <?php
                            $i = 1;
                            if(count($files)>0)
                            {
                              foreach ($files as $value) {

                          ?>
                                <div class="row remove_documnet" data-pdf="<?php echo $value['pdf_id'];?>">
                                  <div class="col-sm-5">
                                    <textarea name="old_doc_details[]" id="old_doc_details" rows="5" cols="100" placeholder="Document Description" class="doc_details form-control" readonly="readonly"><?php echo $value['pdf_detail'];?></textarea>
                                  </div>
                                  <div class="col-sm-4">
                                    <input type="hidden" name="hidden_pdf_id[]" id="hidden_pdf_id" value="<?php echo $value['pdf_id'];?>">

                                    <input type="hidden" name="hidden_old_files[]" id="hidden_old_files" value="<?php echo $value['pdf_file'];?>">
                                    <input type="hidden" name="old_files[]" id="old_files" class="files form-control" value="" >
                                    <br>
                                    <a  href="<?php echo base_url().'uploads/series_pdf/'.$value['folder'].'/'.$value['pdf_file'];?>"target="_blank" >Document<?=$i;?></a>
                                  </div>
                                  <div class="col-sm-1">
                                    <button class="btn btn-danger remove_old_doc" name="remove_old_doc" id="remove_old_doc" data-pdf="<?php echo $value['pdf_id'];?>" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                  </div>  
                                </div>
                                <br>
                          <?php
                                $i++;
                              }
                            }
                          ?>
                        </div>
                        <div class="add_documnets">
                          
                        </div>
                        <div class="row">
                          <div class="col-sm-5">
                            <textarea name="doc_details[]" id="doc_details" rows="5" cols="100" placeholder="Document Description" class="doc_details form-control"></textarea>
                          </div>
                          <div class="col-sm-4">
                            <input type="file" name="files[]" id="files" class="files form-control" value="">
                          </div>
                          <div class="col-sm-1">
                            <button class="btn btn-success add_doc" name="add_doc" id="add_doc" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                          </div>  
                        </div>

                     </div>
                  </div>
                  <div class="hr-line-dashed" ></div>
                  
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-w-m btn-primary" id="btn_edit_product_series" name="btn_edit_product_series" value="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-product-series';?>"><button class="btn btn-white" type="button">Cancel</button></a>
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
    $('.selectmulti').multiselect({
      nonSelectedText: 'Select',
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      buttonWidth:'100%'
    });

    $("#frm_add_application").on('submit',function()
    {     
      var description         = CKEDITOR.instances.description.getData(); 
      $('#descerr').val(description);
     
      var title               = $('#title').val();
      var short_description   = $('#short_description').val();
      var construction_id     = $('#construction_id').val();
      var meta_title          = $('#meta_title').val();
      var meta_description    = $('#meta_description').val();
      var meta_keyword        = $('#meta_keyword').val();
      var position            = $('#position').val();
      var flag=0;

      
      if(position=="")
      {
        show_error("position","Enter position");
        flag=1;
      }
      else
      {
        remove_error("position");       
      }

      if(description=="")
      {
        show_error("descerr","Enter description");
        flag=1;
      }
      else
      {
        remove_error("descerr");       
      }

      if(title=="")
      {
        show_error("title","Enter application name");
        flag=1;
      }
      else
      {
        remove_error("title");       
      }
      if(construction_id=="" || construction_id==null)
      {
        show_error("construction_id_err","Select construction");
        flag=1;
      }
      else
      {
        remove_error("construction_id_err");       
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
     
     if(series_image=="")
     {
       show_error("series_image","Please Add Product Image");
       flag=1;
     }
     else
     {
       remove_error("series_image");       
     }
 
     if(flag==1)
     {
       return false;
     }
     else
     {
      $('#btn_add_product_series').css('pointer-events','none')
       return true;
     }  
    });
  });
  $(document).on('change', '#series_image', function(e) {
     var sub_image=$(this).val();
     var extension = sub_image.split('.').pop().toUpperCase();
     var file = this.files[0];
     var name = file.name;
     var size = file.size;
     var type = file.type;
    
    if (extension!="PNG" && extension!="JPG" && extension!="JPEG")
     {
       show_error("series_image","Please select only jpg or png image type");
       flag=1;
     }
     else
     {
        remove_error("series_image");
               return true;
       
     }
  });
  $(document).on("click",".remove_doc",function(){
    var datapdf = $(this).attr("data-pdf");
    $(this).parent().parent().remove();
  });
  $(document).on("click",".remove_old_doc",function(){
    var datapdf = $(this).attr("data-pdf");
    $(this).parent().parent().remove();
    var link = "<?php echo base_url().'manageProductSeries/remove_document';?>";
    $.ajax({
        url: link,
        type: "POST",
        dataType: "html",
        data: {
            pdf_id : datapdf
        },
        success: function (data) {
            var obj = jQuery.parseJSON(data);
           
            if (obj.code == "error") {                                
              $("#alert_doc").css('color','red');
              $("#alert_doc").html(obj.msg);
              return false
            } else {
              $("#alert_doc").css('color','green');
              $("#alert_doc").html(obj.msg);
            }
            return false
        },
        beforeSend: function () {
          
        },
        complete:function(){}
    });
  });

  var x = 1; 
  $(document).on("click",".add_doc",function(){

    $html = "";
    $html += '<div class="row" data-x="'+x+'"><div class="col-sm-5"><textarea name="doc_details[]" id="doc_details" data-x="'+x+'" rows="5" cols="100" placeholder="Document Description" class="doc_details form-control"></textarea></div><div class="col-sm-4"><input type="file" data-x="'+x+'" name="files[]" id="files" class="files form-control" value=""></div><div class="col-sm-1"><button class="btn btn-danger remove_doc" name="remove_doc" data-x="'+x+'" id="remove_doc" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div><br>';

    $(".add_documnets").append($html);
    x++;

  })
</script>