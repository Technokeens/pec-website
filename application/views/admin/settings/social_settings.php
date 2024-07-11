<style type="text/css">
.error{color:red !important;}
</style>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Social Links</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
            </li>
            <li class="active">
                <strong>Social Links</strong>
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
          <form  method="post" class="form-horizontal" name="frm_add_ticket" id="frm_add_ticket" enctype="multipart/form-data">                  
            <div class="form-group">
                <label class="col-sm-2 control-label">Facebook</label>
                <div class="col-sm-6">
                  <input type="text" name="facebook" value="<?php echo $social['facebook']; ?>" class="form-control" id="facebook" />
                </div>
                
            </div> 
           <div class="form-group">
                <label class="col-sm-2 control-label">Twitter</label>
                <div class="col-sm-6">
                  <input type="text" name="twitter" value="<?php echo $social['twitter']; ?>" class="form-control" id="twitter" />
                 </div>
               
            </div> 
            
            <!-- <div class="hr-line-dashed"></div> 
            <div class="form-group">
                <label class="col-sm-2 control-label">Linkedin</label>
                <div class="col-sm-6">
                  <input type="text" name="linkedin" value="<?php echo $social['linkedin']; ?>" class="form-control" id="linkedin" />
                 </div>
               
            </div>  -->
            <div class="hr-line-dashed"></div> 
            <div class="form-group">
                <label class="col-sm-2 control-label">Google+</label>
                <div class="col-sm-6">
                  <input type="text" name="googleplus" value="<?php echo $social['googleplus']; ?>" class="form-control" id="googleplus" />
                 </div>
            </div> 
            
            <div class="hr-line-dashed"></div> 
            <div class="form-group">
                <label class="col-sm-2 control-label">Instagram</label>
                <div class="col-sm-6">
                  <input type="text" name="instagram" value="<?php echo $social['instagram']; ?>" class="form-control" id="instagram" />
                </div>
                
            </div> 
            <div class="hr-line-dashed"></div> 
            <div class="form-group">
                <label class="col-sm-2 control-label">Youtube</label>
                <div class="col-sm-6">
                  <input type="text" name="youtube" value="<?php echo $social['youtube']; ?>" class="form-control" id="youtube" />
                 </div>
              
            </div> 
            <div class="hr-line-dashed"></div>                               
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                  <button class="btn btn-w-m btn-primary" id="btn_add_social" name="btn_add_social" type="submit" value="submit"><i class="icon-ok"></i> Save</button>
                   <a href="<?php echo base_url().'admin/dashboard';?>"><button style="color: #676a6c;" class="btn btn-white" type="button">Cancel</button></a>  
                    </div>
            </div>
          </form>
        </div>
    </div>
</div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
 
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

   $("#frm_add_ticket").on('submit',function(){
    var subject=$("#subject").val();
    var message=$("#message").val();
    var user_id=$("#user_id").val();
    var flag=0;
    if(subject=="")
    {
      show_error("subject","Please enter Subject");
      flag=1;
    }
    else
    {
      remove_error("subject");       
    }

    if(message=="")
    {
      show_error("messageerr","Please enter Message");
      flag=1;
    }
    else
    {
      remove_error("messageerr");       
    }

    if(flag==1)
    {
      return false;
    }
    else
    {
      return true;
    } 
    if(flag==0)
    {
        var link = site_url + 'admin/ticket/';
        var image = site_url + 'images/loader.gif';
        $.ajax({
            url: link,
            type: "POST",
            dataType: "json",
            data: {
                subject: subject,
                message: message,
                user_id: user_id


            },
            success: function(msg) {
              
            },
            beforeSend: function() {
                $('#loading').html("<img src='" + image + "' />");
            },
            complete: function() {
                
            }
        })
    }
   }); 
});
</script>


