<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Reset-Password</title>
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
            <!-- <div>
               <h1 class="logo-name">IN+</h1>
            </div> -->
            <div>
               <a href="<?php echo base_url();?>">
                <?php
                  $setting = $this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid=1');
                  if(!empty($setting['logo']))
                  {
                ?>
                    <img src="<?=base_url()?>uploads/<?=$setting['logo'];?>" alt="PEC Logo" />
                <?php }else{ ?>
                    <h1 class="logo-name">PEC</h1>
                <?php } ?>
               </a>
            </div>
            <br>
            <h3>Reset Password</h3>
            <p>To activate your account</p>
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
            <form id="frm_reset" name="frm_reset" class="m-t" method="post" action="<?php echo base_url().'admin/update_password'?>">
               <div class="form-group">      
                  <input name="password" id="ppassword" type="password"  class="form-control" placeholder="Password">     
                  <?php echo form_error('phone', '<div class="error">', '</div>'); ?>
                  <input type="hidden" name="forgot_text"  value="<?php echo $this->uri->segment(3);?>"/>
               </div>
               <div class="form-group">
                  <input name="confirmpassword" id="confirmpassword" type="password"  class="form-control" placeholder="Confirm Password">
                  <?php echo form_error('confirmpassword', '<div class="error">', '</div>'); ?>                        
                  <input type="hidden" name="forgot_text"  value="<?php echo $this->uri->segment(3);?>"/>
               </div>
               <button type="submit" class="btn btn-w-m btn-primary" name="reset" value="reset">Reset</button>
               <a href="<?php echo base_url().'admin';?>"><button class="btn btn-white" type="button">Cancel</button></a>   
            </form>
         </div>
      </div>
      <script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
      <script src="<?php echo base_url();?>admin_assets/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function()
         {
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
         
           $("#frm_reset").on('submit',function()
           {    
             var ppassword= $('#ppassword').val();
             var confirmpassword= $('#confirmpassword').val();
             var pass_regx        =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;     
             var flag=0;   

             if(ppassword!=="")   
             {
               if(confirmpassword=="")   
               {
                 show_error("confirmpassword","Confirm Password");  
                 flag=1;
               }   
               else if (pass_regx.test(ppassword))
               {   
                 remove_error("ppassword");   
               } 
               else if (ppassword.length < 6 || ppassword.length > 10) 
               {
                 show_error("ppassword", "Password should be 6 to 10 ");
                 flag = 1;
               } 
               else   
               {
                 show_error("ppassword","The Password should have 1 Character 1 Lowercase 1 Uppercase and 1 Special Character ");   
                 flag=1;   
               }
        
            }else{
              show_error("ppassword","Please enter password");
              flag=1;
            }
         
             if(confirmpassword!=="")   
             {   
               if (confirmpassword != ppassword )   
               {  
                 show_error("confirmpassword","Passwords do not Match"); 
                 flag=1;
               }   
               else if (confirmpassword.length < 6 || confirmpassword.length > 10) 
               {
                 show_error("confirmpassword", "Password should be 6 to 10 ");
                 flag = 1;
               }    
               else   
               {  
                 remove_error("confirmpassword");
               }   
             }else{
              show_error("ppassword","Please enter confirm password");
              flag=1;
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
   </body>
</html>