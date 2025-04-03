<style type="text/css">
   .error{color:red !important;}
   #charNum{color:red !important;}
</style>
<div id="main-page-content">
   <div class="site-min-height">
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-lg-10">
            <h2>Contact Settings</h2>
            <ol class="breadcrumb">
               <li>
                  <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
               </li>
               <li class="active">
                  <strong>Contact Settings</strong>
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
                     <form action="" method="post" class="form-horizontal" name="frm_contact" id="frm_contact" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-12">
                            <h2>Main Address</h2>
                            <input type="hidden" name="main_edit_id" value="<?=(!empty($contacts['id'])) ? $contacts['id'] : ''; ?>">
                          </div>
                        </div> 
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Address Title </label>
                           <div class="col-sm-4">
                              <input type="text" id="address_title" name="address_title" class="form-control" value="<?=(!empty($contacts['address_title'])) ? $contacts['address_title'] : '';?>">
                           </div>

                           <label class="col-sm-2 control-label">Company Name</label>
                           <div class="col-sm-4">
                              <input type="text" id="company_name" name="company_name" class="form-control" value="<?=(!empty($contacts['company_name'])) ? $contacts['company_name'] : '';?>">
                           </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Person Name</label>
                           <div class="col-sm-4">
                              <input type="text" id="person_name" name="person_name" class="form-control" value="<?=(!empty($contacts['person_name'])) ? $contacts['person_name'] : '';?>">
                           </div>

                            <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-4">
                              <input type="text" id="emailid" name="email" class="form-control" value="<?=(!empty($contacts['email'])) ? $contacts['email'] : '';?>">
                           </div>
                        </div>     
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Telephone</label>
                           <div class="col-sm-4">
                              <input type="text" id="telephone" name="telephone" class="form-control"  value="<?=(!empty($contacts['telephone'])) ? $contacts['telephone'] : '';?>">
                           </div>

                           <label class="col-sm-2 control-label">Phone</label>
                           <div class="col-sm-4">
                              <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?=(!empty($contacts['phone'])) ? $contacts['phone'] : '';?>">
                           </div>
                        </div>            
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Main Address</label>
                           <div class="col-sm-10"> 
                              <textarea id="address" name="address" class="form-control"><?=(!empty($contacts['address'])) ? $contacts['address'] : '';?></textarea>
                              <div id="charNum"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Embedded Google Map URL</label>
                           <div class="col-sm-10"> 
                              <textarea id="embedded_url" name="embedded_url" class="form-control"><?=(!empty($contacts['embedded_url'])) ? $contacts['embedded_url'] : '';?></textarea>
                              <div id="charNum"></div>
                           </div>
                        </div>
                        <div class="form-group">
                          
                        </div>

                        <div class="form-group">
                           
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Fax</label>
                           <div class="col-sm-6">
                              <input type="text" id="fax" name="fax" class="form-control" value="<?=(!empty($contacts['fax'])) ? $contacts['fax'] : '';?>">
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">SEO Title</label>
                           <div class="col-sm-6">
                              <input type="text" name="seo_title" id="seo_title" class="form-control" value="<?=(!empty($contacts['seo_title'])) ? $contacts['seo_title'] : ''; ?>">
                              <?php echo form_error('seo_title', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">SEO Keywords</label>
                           <div class="col-sm-6">
                              <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="<?=(!empty($contacts['seo_keywords'])) ? $contacts['seo_keywords'] : ''; ?>">
                              <?php echo form_error('seo_keywords', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">SEO Description</label>
                           <div class="col-sm-6">
                              <textarea name="seo_description" id="seo_description" class="form-control"><?=(!empty($contacts['seo_description'])) ? $contacts['seo_description'] : ''; ?></textarea>
                              <?php echo form_error('seo_description', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>

                        

                        <div class="form-group">
                           <div class="col-sm-4 col-sm-offset-2">
                              <button class="btn btn-w-m btn-primary" id="btn_save_contact" name="btn_save_contact" type="submit" value="submit"><i class="icon-ok"></i> Save</button>                        
                              <a href="<?php echo base_url().'admin/dashboard';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>    
                           </div>
                        </div>
                     </form> 
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-content">
               <div class="row-fluid">
                  <div class="span12">
                     <div class="grid simple ">
                        <div class="grid-body ">
                          <div class="row">
                            <div class="col-md-6">
                              <h2>Other Address</h2>
                            </div>
                            <div class="col-md-6" style="text-align: right">
                              <a class="btn btn-w-m addbtnn" href="<?=base_url();?>admin/add-contact"><i class="icon-ok"></i> Add Other Address</a>     
                            </div>
                          </div> 
                          <div class="table-responsive m-b-20">
                              <table class="table table-striped table-bordered table-hover" id="example" style="width: 100%">
                                 <thead>
                                     <tr>
                                          <th>Sr. No.</th>
                                          <th>Title</th>
                                          <th>Email</th>
                                          <th>Address</th>
                                          <th>Phone</th>
                                          <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                  <?php
                                    if(!empty($other_contacts)){
                                      $i=1;
                                      foreach ($other_contacts as $key => $value) { ?>
                                       <tr>
                                            <td><?=$i;?></td>
                                            <td><?=(!empty($value['address_title'])) ? $value['address_title'] : '';?></td>
                                           <td><?=(!empty($value['email'])) ? $value['email'] : '';?></td>
                                           <td><?=(!empty($value['address'])) ? $value['address'] : '';?></td>
                                           <td><?=(!empty($value['phone'])) ? $value['phone'] : '';?></td>
                                           <td>
                                             <a class="btn btn-sm btn-info show-tooltip" href="<?php echo base_url().'admin/edit_other_contact/'.base64_encode($value['id']);?>" title="Edit">
                                             Edit
                                             </a>
                                             <a class="btn btn-sm btn-danger show-tooltip" href="<?php echo base_url().'admin/delete_other_contact/'.base64_encode($value['id']);?>" title="Delete" onclick="return confirm('Are you sure wants to delete this Address?');">
                                             Delete
                                             </a>
                                           </td>
                                       </tr>
                                     <?php $i++;
                                      }
                                    }
                                  ?>
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
      $("#frm_contact").on('submit',function()
      { 
        var address_title       = $('#address_title').val();
        var company_name        = $('#company_name').val();
        var address             = $('#address').val(); 
        var embedded_url        = $('#embedded_url').val();
        var latitude            = $('#latitude').val();
        var longitude           = $('#longitude').val();
        var phone_number        = $('#phone_number').val();
        var fax                 = $('#fax').val();
        var emailid             = $('#emailid').val();

        var seo_title = $('#seo_title').val();
        var seo_keywords  = $('#seo_keywords').val();
        var seo_description = $('#seo_description').val();

        var reg                 = /^\d+$/;
        var pattern             = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        var flag=0;

        if(address_title=="")
        {
          show_error("address_title","Enter address title");
          flag=1;
        }
        else
        {
          remove_error("address_title");       
        }


        if(company_name=="")
        {
          show_error("company_name","Enter company name");
          flag=1;
        }
        else
        {
          remove_error("company_name");       
        }

        if(address=="")
        {
          show_error("address","Enter address");
          flag=1;
        }
        else
        {
          remove_error("address");       
        }

        if(embedded_url=="")
        {
          show_error("embedded_url","Enter embedded url");
          flag=1;
        }
        else
        {
          remove_error("embedded_url");       
        }

       /* if(latitude=="")
        {
          show_error("latitude","Enter latitude");
          flag=1;
        }
        else
        {
          remove_error("latitude");       
        }

        if(longitude=="")
        {
          show_error("longitude","Enter longitude");
          flag=1;
        }
        else
        {
          remove_error("longitude");       
        }
       */
       if(emailid=="")
       {
         show_error("emailid","Enter email");
         flag=1;
       }
       else
       {
         if (pattern.test(emailid))
         {
            remove_error("emailid");       
         }
         else
         {
            show_error("emailid", "Please enter valid email");
            flag = 1;
         }
       }

       if(phone_number=="")
       {
         show_error("phone_number","Enter phone number");
         flag=1;
       }
       else
       {
        remove_error("phone_number");       
       }

       if(fax=="")
       {
         show_error("fax","Enter Fax number");
         flag=1;
       }
       else
       {
        remove_error("fax");       
       }

       if(seo_title == "")
       {
         show_error("seo_title","Please enter seo title");
         flag=1;
       }else{
         remove_error("seo_title");
       }
       if(seo_keywords == "")
       {
         show_error("seo_keywords","Please enter seo keywords");
         flag=1;
       }else{
         remove_error("seo_keywords");
       }
       if(seo_description == "")
       {
         show_error("seo_description","Please enter seo description");
         flag=1;
       }else{
         remove_error("seo_description");
       }
   
       if(flag==1)
       {
         return false;
       }
       else
       {
        $('#btn_add_product').css('pointer-events','none')
         return true;
       }  
     });
     
   });

</script>
