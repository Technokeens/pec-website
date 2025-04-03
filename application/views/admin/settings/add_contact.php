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
                            <h2>Add Other Address</h2>
                          </div>
                         
                        </div> 
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Address Title </label>
                           <div class="col-sm-4">
                              <input type="text" id="address_title" name="address_title" class="form-control">
                           </div>

                           <label class="col-sm-2 control-label">Company Name</label>
                           <div class="col-sm-4">
                              <input type="text" id="company_name" name="company_name" class="form-control" >
                           </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Person Name</label>
                           <div class="col-sm-4">
                              <input type="text" id="person_name" name="person_name" class="form-control" >
                           </div>

                            <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-4">
                              <input type="text" id="emailid" name="email" class="form-control" >
                           </div>
                        </div>     
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Phone</label>
                           <div class="col-sm-4">
                              <input type="text" id="phone_number" name="phone_number" class="form-control">
                           </div>

                            <label class="col-sm-2 control-label">Telephone</label>
                           <div class="col-sm-4">
                              <input type="text" id="telephone" name="telephone" class="form-control">
                           </div>
                        </div>            
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Address</label>
                           <div class="col-sm-10"> 
                              <textarea id="address" name="address" class="form-control"></textarea>
                              <div id="charNum"></div>
                           </div>
                        </div>
                        <!-- <div class="form-group">
                           <label class="col-sm-2 control-label">Embedded Google Map URL</label>
                           <div class="col-sm-10"> 
                              <textarea id="embedded_url" name="embedded_url" class="form-control"></textarea>
                              <div id="charNum"></div>
                           </div>
                        </div> -->
                       
                        <!-- <div class="form-group">
                           <label class="col-sm-2 control-label">Fax</label>
                           <div class="col-sm-6">
                              <input type="text" id="fax" name="fax" class="form-control">
                           </div>
                        </div> -->
                     
                        <input type="hidden" name="seo_title" id="seo_title" class="form-control" value="">
                        <input type="hidden" name="seo_keywords" id="seo_keywords" class="form-control" value="">
                        <input type="hidden" name="seo_description" id="seo_description" class="form-control" value="">

                        

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
        // var embedded_url        = $('#embedded_url').val();
        var phone_number        = $('#phone_number').val();
        var person_name                 = $('#person_name').val();
        var emailid             = $('#emailid').val();

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

        // if(embedded_url=="")
        // {
        //   show_error("embedded_url","Enter embedded url");
        //   flag=1;
        // }
        // else
        // {
        //   remove_error("embedded_url");       
        // }

     
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

       if(person_name=="")
       {
         show_error("person_name","Enter person name");
         flag=1;
       }
       else
       {
        remove_error("person_name");       
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
