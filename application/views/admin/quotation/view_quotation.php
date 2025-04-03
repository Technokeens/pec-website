<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>View Quotation</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>View Quotation</strong>
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
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['name'])) ? ucfirst($detail['name']) : '-'; ?></label>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Email :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['email'])) ? $detail['email'] : '-'; ?></label>
                     </div>
                  </div>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Phone :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['phone'])) ? $detail['phone'] : '-'; ?></label>
                     </div>
                  </div>
                  
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Message :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['message'])) ? ucfirst($detail['message']) : '-'; ?></label>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group">
                     <label class="col-sm-2 control-label">Address :  </label>
                     <div class="col-sm-10">
                       <label class="control-label" style="font-weight: normal;"><?=(!empty($detail['address'])) ? $detail['address'] : '-'; ?></label>
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

                  <div class="row">
                     <div class="col-sm-12">
                        <h4>Product Details</h4>
                        <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Image</th>
                                 <th>Product Name</th>
                                 <th>Series Name</th>
                                 <th>Resistance Value</th>
                                 <th>Tolerance Value</th>
                                 <th>Quantity</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 

                              if(!empty($detail['product_data'])){

                                 $product_data =json_decode($detail['product_data'], true);
                                 
                                 foreach ($product_data as $key => $value) { ?>
                                    <tr>
                                       <td><img src="<?=$value['product_image']?>" style="width: 100px;height: 100px;" /></td>
                                       <td><?=(!empty($value['product_name'])) ? $value['product_name'] : ''; ?></td>
                                       <td><?=(!empty($value['series_name'])) ? $value['series_name'] : ''; ?></td>
                                       <td><?=(!empty($value['resistance_value'])) ? $value['resistance_value'] : '-'; ?></td>
                                       <td><?=(!empty($value['tolerance_value'])) ? $value['tolerance_value'] : '-'; ?></td>
                                       <td><?=(!empty($value['qty'])) ? $value['qty'] : '1'; ?></td>
                                    </tr>
                                  <?php  
                                 }
                              }
                              ?>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                        <a href="<?php echo base_url().'admin/manage-quotation';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
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

