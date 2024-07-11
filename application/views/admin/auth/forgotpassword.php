<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Forgot-Password</title>
      <link href="<?php echo base_url();?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="<?php echo base_url();?>admin_assets/css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url();?>admin_assets/css/style.css" rel="stylesheet">
      <style type="text/css">
         .error{color:red !important;}
      </style>
   </head>
   <body class="gray-bg">
      <div class="middle-box text-center loginscreen animated fadeInDown">
         <div class="loginbox">
            <div>
               <a href="<?php echo base_url();?>">
               <?php
                  $setting = $this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid=1');
                  if(!empty($setting['logo']))
                  {
                ?>
                    <img src="<?=base_url()?>uploads/<?=$setting['logo'];?>" alt="logo" />
                <?php }else{ ?>
                    <h1 class="logo-name">PEC</h1>
                <?php } ?>
               </a>
            </div>
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
            <form id="" name="" class="animated fadeIn" method="post" action="<?php echo base_url().'admin/forgotpassword'?>" >
               <p>Enter your recovery email</p>
               <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-12">
                     <input name="email" id="email" type="text"  class="form-control" placeholder="Email id">  
                     <div id="email_id"></div>
                     <?php echo form_error('email', '<div class="error">', '</div>'); ?>     
                  </div>
               </div>
               <br><br><br><br>
               <button type="submit" class="btn btn-w-m btn-primary" id="login_toggle" name="btn_forgot" value="submit">Send</button>
               <a href="<?php echo base_url().'admin';?>"><button class="btn btn-white" type="button">Cancel</button></a>   <br><br>
               <a href="<?php echo base_url().'admin';?>"><small><b>Click here to login</b></small></a>  
            </form>
         </div>
      </div>
      <script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
      <script src="<?php echo base_url();?>admin_assets/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         function show_error(id,msg)
           { 
               //if(!$("#"+id).closest("div.form-margin").hasClass("has-error"))
               if(!$("#"+id).hasClass("has-error"))
               {
                 //$("#"+id).closest("div.form-margin").addClass("has-error");
                 $("#"+id).addClass("has-error");
                 $('<span for="'+id+'" class="text-danger">'+msg+'</span>').insertAfter($("#"+id));
               }
               else
               {
                 $("#"+id).next("span").html(msg);
               }
           }
           function remove_error(id)
           {
             //$("#"+id).closest("div.form-margin").removeClass("has-error");
             $("#"+id).removeClass("has-error");
             $("#"+id).next("span").remove();
           }
         $(document).on('click','#login_toggle',function(){
           
           var email = $("#email").val();
           var flag  = 0;
         
           if(email == ""){
              show_error("email_id","Please Enter Email id");
               flag=1;
             }
             else{
               remove_error("email_id");
             }
         
             if(flag==1)
           {
             return false;
           }
           else
           {
             var ths=$(this);
             $(this).button('loading')
               var link = site_url + 'admin/forgot_password/';
             $.ajax({
                   url: link,
                   type: "POST",
                   dataType: "html",
                   data: {email: email},
                   success: function(msg)   // A function to be called if request succeeds
                   {
                     var obj =jQuery.parseJSON( msg );
                     if(obj.code=="error")
                     {
                       ths.button('reset');
                       $("#alert").addClass("alert-danger").html(obj.msg).show();
                       return false;
                     }
                     else
                     {
                       ths.button('reset');
                        $("#alert").removeClass("alert-danger");
                        $("#alert").addClass("alert-success").html(obj.msg).show();
                        window.location.href = obj.url;
                     }
               return false;
                     
                   }
         
                 });
                 return false;
             
             return true;
           }
         
         });
         
      </script>
   </body>
</html>