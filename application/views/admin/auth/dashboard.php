
<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
   .cardtextleft{
      float: left;
/*      margin-top: 5px;*/
   }
   .ibox-content {
      padding: 15px 20px 25px 20px;
   }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Dashboard</h2>
   </div>
   <div class="col-lg-2">
   </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-lg-3">
       <div class="ibox ">
          <div class="ibox-title">
            <h5>Total Applications</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins"><?php echo $applicationCounts;?></h1>
            <div class="stat-percent font-bold text-success cardtextleft"><a href="<?php echo base_url().'admin/manage-application'?>" title="Click Here...">Application</a></div>
          </div>
       </div>
    </div>
    <div class="col-lg-3">
       <div class="ibox ">
          <div class="ibox-title">
            <h5>Total Series</h5>
          </div>
          <div class="ibox-content">
             <h1 class="no-margins"><?php echo $seriesCounts;?></h1>
             <div class="stat-percent font-bold text-navy cardtextleft"><a href="<?php echo base_url().'admin/manage-product-series';?>" title="Click Here...">Series</a></div>
          </div>
       </div>
    </div>
    <div class="col-lg-3">
       <div class="ibox ">
          <div class="ibox-title">
            <h5>Total Products</h5>
          </div>
          <div class="ibox-content">
             <h1 class="no-margins"><?php echo $productCounts;?></h1>
             <div class="stat-percent font-bold text-info cardtextleft"><a href="<?php echo base_url().'admin/manage-product';?>" title="Click Here...">Products</a></div>
          </div>
       </div>
    </div>
    
    <div class="col-lg-3">
       <div class="ibox ">
          <div class="ibox-title">
            <h5>Total Events</h5>
          </div>
          <div class="ibox-content">
             <h1 class="no-margins"><?php echo $eventCounts;?></h1>
             <div class="stat-percent font-bold text-navy cardtextleft"><a href="<?php echo base_url().'admin/manage-event';?>" title="Click Here...">Events</a></div>
          </div>
       </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
       <div class="ibox ">
          <div class="ibox-title">
            <h5>Total Leads</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins"><?php echo $leadsCounts;?></h1>
            <div class="stat-percent font-bold text-success cardtextleft"><a href="<?php echo base_url().'admin/manage-lead'?>" title="Click Here...">Lead</a></div>
          </div>
       </div>
    </div>
    <div class="col-lg-3">
       <div class="ibox ">
          <div class="ibox-title">
            <h5>Quote Requested</h5>
          </div>
          <div class="ibox-content">
             <h1 class="no-margins"><?php echo $quoteRequestCounts;?></h1>
             <div class="stat-percent font-bold text-info cardtextleft"><a href="<?php echo base_url().'admin/manage-quotation';?>" title="Click Here...">Quotation</a></div>
          </div>
       </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
   <div class="ibox ">
      <div class="ibox-title">
        <h5>Latest Requested Quotation </h5>
      </div>
      <div class="ibox-content">
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Customer Name </th>
                     <th>Email</th>
                     <th>Created Date </th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                    $i = 1; 
                    if(!empty($getLatestQuoteRequest))
                    {
                      foreach ($getLatestQuoteRequest as $req) 
                      {
                  ?>
                        <tr>
                          <td><?=$i;?></td>
                          <td><a href="<?=base_url();?>admin/view-quotation/<?=base64_encode($req['id'])?>"><?php echo ucfirst($req['name']);?></a></td>
                          <td><?=$req['email'];?></td>
                          <td><?=date('Y-m-d',strtotime($req['created_on']));?></td>
                        </tr>
                  <?php
                      $i++;
                      }
                    }
                  ?>
                  
               </tbody>
            </table>
         </div>
      </div>
   </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
         <div class="col-lg-1">
            <div class="container">
               <?php if($this->session->flashdata('success')!='')
                  {
                  ?>
               <div class="alert alert-success">
                  <button data-dismiss="alert" class="close"></button>
                  <?php echo $this->session->flashdata('success');?>
               </div>
               <?php
                  } ?>
               <?php if($this->session->flashdata('error')!=''){?>
               <div class="alert alert-danger">
                  <button data-dismiss="alert" class="close"></button>
                  <?php echo $this->session->flashdata('error');?>
               </div>
               <?php } ?>
            </div>
        
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
         
      </div>
   </div>
</div>
<script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
