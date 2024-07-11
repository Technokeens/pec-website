<style type="text/css">
   .error{color:red !important;}
</style>
<link href="<?php echo base_url();?>admin_assets/css/style.css" rel="stylesheet">
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Media Settings</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Media Settings</strong>
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
                     <label class="col-sm-3 control-label" style="text-align: justify;">Application Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="tech_thumb_width" name="tech_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('tech_thumb_width');?>">
                        <?php echo form_error('tech_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="tech_thumb_height" name="tech_thumb_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('tech_thumb_height');?>">
                        <?php echo form_error('tech_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Application Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="tech_large_width" name="tech_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('tech_large_width');?>">
                        <?php echo form_error('tech_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="tech_large_height" name="tech_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('tech_large_height');?>">
                        <?php echo form_error('tech_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <!-- category Media -->

                   <!-- <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Category Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="cat_thumb_width" name="cat_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('cat_thumb_width');?>">
                        <?php echo form_error('cat_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="cat_thumb_height" name="cat_thumb_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('cat_thumb_height');?>">
                        <?php echo form_error('cat_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div> -->

                  <!-- <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Category Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="cat_large_width" name="cat_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('cat_large_width');?>">
                        <?php echo form_error('cat_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="cat_large_height" name="cat_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('cat_large_height');?>">
                        <?php echo form_error('cat_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div> -->
                  <div class="hr-line-dashed"></div>

                  <!-- Work Media -->

                  <!--  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Work Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="work_thumb_width" name="work_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('work_thumb_width');?>">
                        <?php echo form_error('work_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                      <input type="text" id="work_thumb_height" name="work_thumb_height" class="form-control" 
                      value="<?php echo $this->common->getValueStore('work_thumb_height');?>">
                        <?php echo form_error('work_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div> -->

                  <!-- <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Work Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="work_large_width" name="work_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('work_large_width');?>">
                        <?php echo form_error('work_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="work_large_height" name="work_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('work_large_height');?>">
                        <?php echo form_error('work_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div> -->

                  <!-- Series Media -->

                   <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Series Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="series_thumb_width" name="series_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('series_thumb_width');?>">
                        <?php echo form_error('series_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                      <input type="text" id="series_thumb_height" name="series_thumb_height" class="form-control" 
                      value="<?php echo $this->common->getValueStore('series_thumb_height');?>">
                        <?php echo form_error('series_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Series Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="series_large_width" name="series_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('series_large_width');?>">
                        <?php echo form_error('series_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="series_large_height" name="series_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('series_large_height');?>">
                        <?php echo form_error('series_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <!-- Brand Media -->

                   <!-- <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Brand Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="brand_thumb_width" name="brand_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('brand_thumb_width');?>">
                        <?php echo form_error('brand_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                      <input type="text" id="brand_thumb_height" name="brand_thumb_height" class="form-control" 
                      value="<?php echo $this->common->getValueStore('brand_thumb_height');?>">
                        <?php echo form_error('brand_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Brand Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="brand_large_width" name="brand_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('brand_large_width');?>">
                        <?php echo form_error('brand_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="brand_large_height" name="brand_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('brand_large_height');?>">
                        <?php echo form_error('brand_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div> -->

                  <!-- Series Media -->

                   <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">product Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="prod_thumb_width" name="prod_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('prod_thumb_width');?>">
                        <?php echo form_error('prod_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                      <input type="text" id="prod_thumb_height" name="prod_thumb_height" class="form-control" 
                      value="<?php echo $this->common->getValueStore('prod_thumb_height');?>">
                        <?php echo form_error('prod_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">product Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="prod_large_width" name="prod_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('prod_large_width');?>">
                        <?php echo form_error('prod_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="prod_large_height" name="prod_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('prod_large_height');?>">
                        <?php echo form_error('prod_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <!-- Size -->

                   <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Size Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="size_thumb_width" name="size_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('size_thumb_width');?>">
                        <?php echo form_error('size_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                      <input type="text" id="size_thumb_height" name="size_thumb_height" class="form-control" 
                      value="<?php echo $this->common->getValueStore('size_thumb_height');?>">
                        <?php echo form_error('size_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Size Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="size_large_width" name="size_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('size_large_width');?>">
                        <?php echo form_error('size_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="size_large_height" name="size_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('size_large_height');?>">
                        <?php echo form_error('size_large_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <!-- News -->

                   <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Event Thumb <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="news_thumb_width" name="news_thumb_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('news_thumb_width');?>">
                        <?php echo form_error('news_thumb_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                      <input type="text" id="news_thumb_height" name="news_thumb_height" class="form-control" 
                      value="<?php echo $this->common->getValueStore('news_thumb_height');?>">
                        <?php echo form_error('news_thumb_height', '<div class="error">', '</div>'); ?>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-3 control-label" style="text-align: justify;">Event Large <br> Width X Height(Pixel)</label>
                     <div class="col-sm-4">
                        <input type="text" id="news_large_width" name="news_large_width" class="form-control" 
                        value="<?php echo $this->common->getValueStore('news_large_width');?>">
                        <?php echo form_error('news_large_width', '<div class="error">', '</div>'); ?>
                     </div>
                     <div><label style="top:5px;text-align: center;" class="col-sm-1 control-label">X</label></div>
                     <div class="col-sm-4">
                        <input type="text" id="news_large_height" name="news_large_height" class="form-control" 
                        value="<?php echo $this->common->getValueStore('news_large_height');?>">
                        <?php echo form_error('news_large_height', '<div class="error">', '</div>'); ?>
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