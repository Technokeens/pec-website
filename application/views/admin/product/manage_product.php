<style type="text/css">
   .text-danger{color:red !important;}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Manage Product</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Manage Product</strong>
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
               <div class="row-fluid">
                  <div class="span12">
                     <div class="grid simple ">
                        <div class="grid-body ">
                          <div class="table-responsive m-b-20">
                              <table class="table table-striped table-bordered table-hover" id="example" style="width: 100%">
                                 <thead>
                                     <tr>
                                          <th>Sr. No.</th>
                                          <th>Product Name</th>
                                          <th>Series</th>
                                          <th>Power Rating</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                 </tbody>
                              </table>
                          </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?=base_url();?>admin_assets/jquery/DataTables/datatables.min.js"></script>
<script src="<?=base_url();?>admin_assets/jquery/pages/datatable/datatable-basic.init.js"></script>
<script>
    $(document).ready(function () {
        application_table();
    });

    function application_table()
    {
        if($.fn.DataTable.isDataTable('#example')) 
        {
          $('#example').dataTable().fnClearTable();
          $('#example').dataTable().fnDestroy();
        }
        $('#example').DataTable({
            'processing'    : true,
            "serverSide"    : true,
            'serverMethod'  : 'POST',     
            // 'searching'     : true,  
            "ajax": {
                'url':site_url + 'manageProduct/product_list',
                "data" :{
                    title:'aaa',
                },
                "complete": function(response) {
                },
            },
            //"dom": 'Bfrtip',
            "order": [[ 0, 'desc' ]],
            "columns":[
                { "data": "sr_no" },   
                { "data": "product_name" }, 
                { "data": "series_name" },     
                { "data": "power_rating" },    
                { "data": "status" },    
                { "data": "action" },
            ],
            "aLengthMenu": [[ 10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            'fnCreatedRow': function( nRow, aData, iDataIndex ) 
            {
                // $(nRow).attr('id','product_row'+aData.business_id);
            }
        });
    }
</script>
<script>
   $('#parent_check').click( function() {      
    if($(this).is(':checked')){     
      $('table .checkbox input').attr("checked","checked");
    }
    else{ 
    $('table .checkbox input').attr("checked",false);
    }
   });
   $('.customer-sparkline').each(function () { 
    $(this).sparkline('html', { type:$(this).attr("data-sparkline-type"), barColor:$(this).attr("data-sparkline-color") , enableTagOptions: true });  
   });
</script>