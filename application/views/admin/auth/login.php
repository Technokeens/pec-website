<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <center>
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
                </center>
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

            
                    
            <form id="frm_login" name="frm_login" class="m-t" method="post" action="<?php echo base_url().'admin/go_login/'?>" >
              <p>Login in. To see it in action.</p> 
                <div class="form-group">
                    <input name="login_username" id="login_username" type="text"  class="form-control" placeholder="Email id" value="<?php if(get_cookie('username') != null) { echo get_cookie('username'); } ?>"> 
                    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                    <div id="usererr"></div> 
                </div>
                <div class="form-group">
                    <input name="login_pass" id="login_pass" type="password"  class="form-control" placeholder="Password" value="<?php if(get_cookie('password') != null) { echo get_cookie('password'); } ?>"> 
                    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>      
                    <div id="passerr"></div>              
                </div>
                <div class="form-group">
                    <input id="check1" type="checkbox" name="remember_me" id ="remember_me" value="check1" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?>>
                    <label for="check1">Remember Me</label>        
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" id="login_toggle" name="login" value="submit">Login</button>
                <a href="<?php echo base_url().'admin/forgotpassword';?>"><small><b>Forgot Password?</b></small></a>
                
            </form>            
        </div>
    </div>
    <!-- Mainly scripts -->
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

     $(document).on('submit','#frm_login',function(){
          var username = $("#login_username").val();
          var password = $("#login_pass").val();
          var expr     = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
          var flag     = 0;
          
          if(username == ""){
            show_error("usererr","Please Enter Email id");
            flag=1;
            }
            else if(!username.match(expr) )
            {
                show_error("usererr","Please Enter Valid Email id");
                flag=1;
            }
            else{
              remove_error("usererr");
            }

          if(password == ""){
            show_error("passerr","Please Enter Password");
            flag=1;
          }
          else{
            remove_error("passerr");
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
</script>
</body>
</html>
