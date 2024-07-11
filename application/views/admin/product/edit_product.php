<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
<link rel="stylesheet" href="<?php echo base_url().'admin_assets/bootsrap_multiselect'?>/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url().'admin_assets/bootsrap_multiselect'?>/js/bootstrap-multiselect.js"></script>
<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
  .bootstrap-tagsinput {
     width: 100%;
  }
  .multiselect-container{
    overflow: scroll;
    max-height: 400px;
  }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Add Product</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-product'; ?>">Product</a>
         </li>
         <li class="active">
            <strong>Add Product</strong>
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
                     <label class="col-sm-2 control-label">Product Name</label>
                     <div class="col-sm-4">
                        <input type="text" id="product_name" name="product_name" class="form-control" value="<?=(!empty($detail['product_name'])) ? $detail['product_name'] : ''; ?>">
                     </div>

                     <label class="col-sm-2 control-label">Position</label>
                     <div class="col-sm-4">
                        <input type="number" id="position" name="position" min="0" class="position form-control" value="<?=(!empty($detail['position'])) ? $detail['position'] : ''; ?>">
                     </div>
                     
                  </div>
                  <div class="hr-line-dashed" ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Series</label>
                     <div class="col-sm-4">
                        <select id="series_id" name="series_id" class="form-control" style="text-transform: capitalize;">
                          <option value="">Select Series</option>
                          <?php
                          if(!empty($series))
                          {
                            foreach ($series as $val) 
                            {
                              $selected = '';
                              if(!empty($detail['series_id']) && $detail['series_id'] == $val['ps_id']){
                                  $selected = 'selected';
                              }
                        ?>
                              <option value="<?=$val['ps_id'];?>" <?=$selected?>><?php echo ucwords($val['title']);?></option>
                        <?php
                            }
                          }
                        ?>
                        </select>   
                     </div>
                      <label class="col-sm-2 control-label">Application</label>
                      <div class="col-sm-4">
                        <select id="application_id" name="application_id[]" class="form-control selectmulti" multiple data-live-search="true">

                          <option value="">Select Application</option>
                          <?php
                          if(!empty($applications))
                            {
                              foreach ($applications as $app_val) 
                              {
                                $selected = '';
                                if(!empty($detail['application_id']) ){
                                  $one_application = explode(',', $detail['application_id']);
                                  foreach ($one_application as $key => $value) {
                                    if($value == $app_val['t_id'])
                                    {
                                      $selected = 'selected';
                                    }
                                  }
                                  
                                }
                          ?>
                                <option value="<?=$app_val['t_id'];?>" <?=$selected?>><?php echo ucwords($app_val['title']);?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>   
                     </div>
                  </div>

                  <div class="hr-line-dashed" ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="description" name="description" class="form-control"><?=(!empty($detail['description'])) ? $detail['description'] : ''; ?></textarea>
                        <div id="descerr"> </div>
                     </div>
                  </div>
                  <div class="hr-line-dashed" ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Power Rating</label>
                     <div class="col-sm-4">

                        <select id="power_rating" name="power_rating[]" class="form-control selectmulti" multiple data-live-search="true">

                          <option value="">Select Power Rating</option>
                          <?php
                          if(!empty($power_ratings_list))
                            {
                              foreach ($power_ratings_list as $pr_val) 
                              {
                                $selected = '';
                                if(!empty($detail['power_rating']) ){
                                  $one_power_rate = explode(',', $detail['power_rating']);
                                  foreach ($one_power_rate as $prkey => $prvalue) {
                                    if($prvalue == $pr_val['pr_id'])
                                    {
                                      $selected = 'selected';
                                    }
                                  }
                                  
                                }
                          ?>
                                <option value="<?=$pr_val['pr_id'];?>" <?=$selected?>><?php echo ucwords($pr_val['power_rating']);?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>   




                        <!-- <select id="power_rating" name="power_rating[]" class="form-control selectmulti" multiple data-live-search="true">
                          <option value="">Select Power Rating</option>
                          <?php
                          if(!empty($power_ratings_list))
                            {
                              foreach ($power_ratings_list as $pr_val) 
                              {
                                $selected = '';
                                if(!empty($detail['power_rating']) && $detail['power_rating'] == $pr_val['pr_id']){
                                    $selected = 'selected';
                                }
                          ?>
                                <option value="<?=$pr_val['pr_id'];?>" <?=$selected;?>><?php echo ucwords($pr_val['power_rating']);?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>  -->  
                     </div>

                     <label class="col-sm-2 control-label">TCR PPM C</label>
                     <div class="col-sm-4">
                        <input type="text" id="tcr_ppm_c" name="tcr_ppm_c" class="position form-control" value="<?=(!empty($detail['tcr_ppm_c'])) ? $detail['tcr_ppm_c'] : ''; ?>">
                     </div>
                     
                  </div>
                  <div class="hr-line-dashed" ></div>

                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Min Resistance Value <br>(Ohms)</label>
                     <div class="col-sm-4">
                        <input type="text" id="min_resistance" name="min_resistance" class="form-control" value="<?=(!empty($detail['min_resistance'])) ? $detail['min_resistance'] : ''; ?>">
                     </div>

                     <label class="col-sm-2 control-label">Max Resistance Value <br>(Ohms)</label>
                     <div class="col-sm-4">
                        <input type="text" id="max_resistance" name="max_resistance" class="form-control" value="<?=(!empty($detail['max_resistance'])) ? $detail['max_resistance'] : ''; ?>">
                     </div>
                  </div>
                  <div class="hr-line-dashed" ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Termination Type</label>
                     <div class="col-sm-4">
                        <input type="text" id="termination_type" name="termination_type" class="form-control" value="<?=(!empty($detail['termination_type'])) ? $detail['termination_type'] : ''; ?>">
                     </div>

                     <label class="col-sm-2 control-label">Resistor Tolerance</label>
                     <div class="col-sm-4">
                        <input type="text" id="resistor_tolerance" name="resistor_tolerance" class="form-control" value="<?=(!empty($detail['resistor_tolerance'])) ? $detail['resistor_tolerance'] : ''; ?>">
                     </div>
                  </div>
                  <div class="hr-line-dashed" ></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Dimensions Body Diameter - Width</label>
                     <div class="col-sm-4">
                        <input type="number" id="dimension_width" name="dimension_width" step="any" min="0" class="form-control" value="<?=(!empty($detail['dimension_width'])) ? $detail['dimension_width'] : ''; ?>">
                     </div>

                     <label class="col-sm-2 control-label">Dimensions Body Length - Height</label>
                     <div class="col-sm-4">
                        <input type="number" id="dimension_height" name="dimension_height" step="any" min="0" class="form-control" value="<?=(!empty($detail['dimension_height'])) ? $detail['dimension_height'] : ''; ?>">
                     </div>
                  </div>
                  
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Cross Reference</label>
                     <div class="col-sm-10">
                        <input type="text" id="cross_reference" name="cross_reference" class="position form-control" data-role="tagsinput" value="<?=(!empty($detail['cross_reference'])) ? $detail['cross_reference'] : ''; ?>"><br>
                        <span style="color: green;">For keyword separation use comma (,) </span>
                     </div>
                  </div>
                  <div class="hr-line-dashed "></div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Title</label>
                     <div class="col-sm-4">
                         <input type="text" id="meta_title" name="meta_title" class="meta_title form-control" value="<?=(!empty($detail['meta_title'])) ? $detail['meta_title'] : ''; ?>">
                     </div>
                  </div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Keyword</label>
                     <div class="col-sm-10">
                        <input type="text" id="meta_keyword" name="meta_keyword" class="meta_keyword form-control" value="<?=(!empty($detail['meta_keyword'])) ? $detail['meta_keyword'] : ''; ?>">
                        <br>
                        <span style="color: green;">For keyword separation use comma (,) </span>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label class="col-sm-2 control-label">Meta Description</label>
                     <div class="col-sm-10">
                        <textarea rows="4" cols="50" id="meta_description" name="meta_description" class="form-control"><?=(!empty($detail['meta_description'])) ? $detail['meta_description'] : ''; ?></textarea>
                     </div>
                  </div>
                 
                  <div class="hr-line-dashed"></div>

                  <div class="form-group ">
                      <label class="col-sm-2 control-label">Related Series</label>
                      <div class="col-sm-10">
                        <select id="related_series" name="related_series[]" class="form-control selectmulti" multiple data-live-search="true">
                          <option value="">Select Related Series</option>
                          <?php
                          if(!empty($series))
                            {
                              foreach ($series as $series_val) 
                              {
                                $selected = '';
                                if(!empty($detail['related_series']) ){
                                  $one_application = explode(',', $detail['related_series']);
                                  foreach ($one_application as $key => $value) {
                                    if($value == $series_val['ps_id'])
                                    {
                                      $selected = 'selected';
                                    }
                                  }
                                  
                                }
                          ?>
                                <option value="<?=$series_val['ps_id'];?>" <?=$selected?>><?php echo ucwords($series_val['title']);?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>   
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-w-m btn-primary" id="btn_edit_product" name="btn_edit_product" value="submit" ><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo base_url().'admin/manage-product';?>"><button class="btn btn-white" type="button">Cancel</button></a>
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
        'filebrowserImageBrowseUrl': '<?=base_url()?>admin_assets/ckeditor2/plugins/imgbrowse/imgbrowse.html',
        'filebrowserImageUploadUrl': '<?=base_url()?>admin_assets/ckeditor2/plugins/iaupload.php'
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

    $("#frm_add_product").on('submit',function()
    {     
      var description         = CKEDITOR.instances.description.getData(); 
      $('#descerr').val(description);
      var product_name        = $('#product_name').val();
      var series_id           = $('#series_id').val();
      var application_id      = $('#application_id').val();
      var meta_title          = $('#meta_title').val();
      var meta_description    = $('#meta_description').val();
      var meta_keyword        = $('#meta_keyword').val();
      var power_rating        = $('#power_rating').val();
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

      if(product_name=="")
      {
        show_error("product_name","Enter product name");
        flag=1;
      }
      else
      {
        remove_error("product_name");       
      }

      if(series_id=="")
      {
        show_error("series_id","Select series");
        flag=1;
      }
      else
      {
        remove_error("series_id");       
      }

      if(application_id=="")
      {
        show_error("application_id","Select application");
        flag=1;
      }
      else
      {
        remove_error("application_id");       
      }

      if(power_rating=="")
      {
        show_error("power_rating","Select power rating");
        flag=1;
      }
      else
      {
        remove_error("power_rating");       
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
   
</script>