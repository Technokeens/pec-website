<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>View Lead</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url().'admin/manage-lead'; ?>">Lead</a>
         </li>
         <li class="active">
            <strong>Lead</strong>
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
                     <label class="col-sm-2 control-label">Name :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['lead_name'])) ? ucfirst($detail['lead_name']) : '-'; ?></label>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Email :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['lead_email'])) ? $detail['lead_email'] : '-'; ?></label>
                     </div>
                  </div>
                  
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Subject :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['lead_subject'])) ? ucfirst($detail['lead_subject']) : '-'; ?></label>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-2 control-label">Message :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['lead_message'])) ? $detail['lead_message'] : '-'; ?></label>
                     </div>
                  </div>
               
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Date :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['created_on'])) ? date('Y-m-d',strtotime($detail['created_on'])) : '-'; ?></label>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <a href="<?php echo base_url().'admin/manage-lead';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
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

