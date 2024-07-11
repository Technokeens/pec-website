<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>admin_assets/css/jquery.cropbox.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .wrapper.wrapper-content {
    padding-top: 90px !important;
  }
   div.cropbox .btn-file {
   position: relative;
   overflow: hidden;
   }
   div.cropbox .btn-file input[type=file] {
   position: absolute;
   top: 0;
   right: 0;
   min-width: 100%;
   min-height: 100%;
   font-size: 100px;
   text-align: right;
   filter: alpha(opacity=0);
   opacity: 0;
   outline: none;
   background: white;
   cursor: inherit;
   display: block;
   }
   div.cropbox .cropped {
   margin-top: 10px;
   }
   .syntaxhighlighter table .container:before {
   display: none !important;
   }
   footer {
   margin-top: 10px;
   border-top: #cdcdcd 1px solid;
   }
   .mb-none{
    display: block;
  }

   @media (max-width: 768px) {
    .mb-none{
      display: none;
     }
   }
   
/*   .container { margin:150px auto 30px auto;}*/
</style>
<style type="text/css">
   .error{color:red !important;}
</style>

<div id="main-page-content">
   <div class="site-min-height">
      <div class="row wrapper border-bottom white-bg page-heading mb-none">
         <div class="col-lg-10">
            <h2>Update Profile</h2>
            <ol class="breadcrumb">
               <li>
                  <a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
               </li>
               <li class="active">
                  <strong>Update Profile</strong>
               </li>
            </ol>
         </div>
         <div class="col-lg-2">
         </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
         <?php if($this->session->flashdata('success')!=''){ ?>
         <div class="alert alert-success">
            <button data-dismiss="alert" class="close"></button>
            <?php echo $this->session->flashdata('success');?>
            <?= $this->session->unset_userdata('success');?>
         </div>
         <?php } ?>
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
                     <form action="<?=base_url().'admin/update_profile/'?>" method="post" class="form-horizontal" name="frm_update_user" id="frm_update_user" enctype="multipart/form-data">
                        <div class="form-group">
                           <label class="col-sm-2 control-label">First Name</label>
                           <div class="col-sm-6">
                              <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $user['first_name'];?>">
                              <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Last Name</label>
                           <div class="col-sm-6">
                              <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $user['last_name'];?>">
                              <?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Profile Image</label>                        
                           <div class="col-sm-6">
                              <!-- <div class="jquery-script-center">
                                 <div class="jquery-script-clear"></div>
                              </div>
                              <div id="message" class="alert alert-info"></div>
                              <div id="plugin" class="cropbox">
                                 <div class="workarea-cropbox">
                                    <div class="bg-cropbox">
                                       <img class="image-cropbox">
                                       <div class="membrane-cropbox"></div>
                                    </div>
                                    <div class="frame-cropbox">
                                       <div class="resize-cropbox"></div>
                                    </div>
                                 </div>
                                 <div class="btn-group">
                                    <span class="btn btn-primary btn-file">
                                    <i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i>
                                    Browse <input type="file" accept="image" name="profile" id="profile">
                                    </span>
                                    <button type="button" class="btn btn-success btn-crop">
                                    <i class="fa fa-crop fa-2x" aria-hidden="true"></i> Crop
                                    </button>
                                    <button type="button" class="btn btn-warning btn-reset">
                                    <i class="fa fa-repeat fa-2x" aria-hidden="true"></i> Reset
                                    </button>
                                 </div>
                                 <div class="cropped panel panel-default" id="image_error">
                                    <div class="panel-heading">
                                       <h3 class="panel-title">Image View</h3>
                                    </div>
                                    <div class="panel-body">
                                       

                                       <img src="<?php echo base_url().'uploads/user/'.$user['profile_image'];?>" width="200" style="margin:0 0 0 18px;"  >
                                       
                                    </div>
                                 </div>                                 
                                 <div class="form-group">
                                    <textarea class="data form-control" rows="5" name="profile_img" style="display:none;"></textarea>
                                 </div>
                              </div> -->
                              <input name="profile" id="profile" type="file" style="" multiple=false>
                              <label class="col-sm-2 control-label"></label><div id="img_error"></div>

                              <input type="hidden" name="hidden_image" value="<?php echo $user['profile_image'];?>">
                              <br>
                              <?php
                                if($user['profile_image']!="")
                                {
                              ?>
                                  <img src="<?php echo base_url().'uploads/user/'.$user['profile_image'];?>" width="100" style="margin:0 0 0 18px;"  >
                              <?php
                                }
                              ?>
                              
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Email id</label>
                           <div class="col-sm-6">
                              <input type="text" id="email" name="email" class="form-control" value="<?php if($this->session->userdata('user_type')=="admin"){echo $user['user_name'];}else{echo $user['email'];}?>">
                              <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Current Password</label>
                           <div class="col-sm-6">
                              <input type="password" id="currentpwd" name="currentpwd" class="form-control" autocomplete="new-password">
                              <p style="color:#8a6d3b;">It appears only after entering the current password . </p>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Password</label>
                           <div class="col-sm-6">
                              <input type="password" id="propassword" name="password" class="form-control">  
                              <input type="hidden" value="<?php echo $user['password'];?>" id="hidden_pass" name="hidden_pass" />                        
                              <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Confirm Password</label>
                           <div class="col-sm-6">
                              <input type="password" id="conformpassword" name="conformpassword" class="form-control"> 
                              <?php echo form_error('conformpassword', '<div class="error">', '</div>'); ?>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <div class="col-sm-4 col-sm-offset-2">
                              <button class="btn btn-w-m btn-primary" id="btn_update_user" name="btn_update_user" type="submit" value="submit"><i class="icon-ok"></i> Save</button>
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
 $(document).ready(function ()

  {

    $("#propassword").prop("disabled", true);

    $("#conformpassword").prop("disabled", true);

    function show_error(id, msg)

    {

      if (!$("#" + id).hasClass("has-error"))

      {

        $("#" + id).addClass("has-error");

        $('<span for="' + id + '" class="text-danger">' + msg + '</span>').insertAfter($("#" + id));

      }

      else

      {

        $("#" + id).next("span.text-danger").html(msg);

      }

    }

    function remove_error(id)

    {

      $("#" + id).removeClass("has-error");

      $("#" + id).next("span.text-danger").remove();

    }

    $("#profile").on('change', function ()
    {
      var profile = $('#profile').val();
      var extension = profile.split('.').pop().toUpperCase();

      if (extension != "PNG" && extension != "JPG" && extension != "JPEG")
      {
        show_error("image_error", "This is not an image.You can upload files like (.jpeg,.png,.jpg) only.");
        $("#profile").val("");
        flag = 1;
      }
      else
      {
        remove_error("image_error");

      }
    });

    $("#frm_update_user").on('submit', function ()

      {

        var first_name = $('#first_name').val();
        var profile = $('#profile').val();
        var last_name = $('#last_name').val();

        var email = $('#email').val();

        var propassword = $('#propassword').val();

        var conformpassword = $('#conformpassword').val();

        var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        //var pass_regx       = /([a-zA-Z0-9@*#]{6,25})$/;   
        var pass_regx = /^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/;

        var character = /^[a-zA-Z\s]+$/;

        var flag = 0;


        if (first_name == "")

        {

          show_error("first_name", "Please enter First Name");

          flag = 1;

        }

        else

        {

          if (character.test(first_name))

          {

            remove_error("first_name");

          }

          else

          {

            show_error("first_name", "Please enter character only");

            flag = 1;

          }

        }


        if (last_name == "")

        {

          show_error("last_name", "Please enter Last Name");

          flag = 1;

        }

        else

        {

          if (character.test(last_name))

          {

            remove_error("last_name");

          }

          else

          {

            show_error("last_name", "Please enter character only");

            flag = 1;

          }

        }


        if (email == "")

        {

          show_error("email", "Please enter email");

          flag = 1;

        }

        else

        {

          if (pattern.test(email))

          {

            remove_error("email");

          }

          else

          {

            show_error("email", "Please enter valid email");

            flag = 1;

          }

        }


        if (propassword !== "")

        {
          if (pass_regx.test(propassword))
          {
            remove_error("propassword");
          }
          else
          {
            show_error("propassword", "Password should requires at least 1 lower case, 1 upper case, 1 numeric, 1 non-word and no whitespace.");
            flag = 1;
          }


          if (conformpassword == "")
          {
            show_error("conformpassword", "enter confirm password");
            flag = 1;
          }
          else 
          {
            remove_error("conformpassword");
          }

        }else{
          show_error("propassword", "Please enter password");
            flag = 1;
        }


        if (conformpassword !== "")
        {

          if (conformpassword != propassword)

          {

            show_error("conformpassword", "passwords do not match");

            flag = 1;

          }

          else if (conformpassword.length < 6 || conformpassword.length > 10)
          {
            show_error("conformpassword", "Password should be 6 to 10 ");
            flag = 1;
          }

          else

          {

            remove_error("conformpassword");

          }

        }else{
          show_error("conformpassword", "Please enter confirm password");
            flag = 1;
        }


        if (flag == 1)

        {

          return false;

        }

        else

        {

          return true;

        }

      });


    // $(document).on('keyup', 'input[name=currentpwd]', function(e) {
    $(document).on('change', 'input[name=currentpwd]', function (e)
    {
      var oldpassword = $(this).val();

      if (this.value.length < 6) return;

      var link = site_url + 'admin/old_password/';

      $.ajax(
        {

          url: link,

          type: "POST",

          dataType: "html",

          data:
          {
            oldpassword: oldpassword
          }

        })

        .done(function (msg)

          {

            if (msg == "success")

            {

              $("#propassword").prop("disabled", false);

              $("#conformpassword").prop("disabled", false);

              toastr.success('Password', 'Password match successfully.');

            }

            else

            {

              toastr.error('Current Password', 'please enter correct password.');

            }

          });

    });


    // $(document).on('change', 'input:file[name=profile_img]', function(e) {

    //       var sub_image=$(this).val();

    //       var extension = sub_image.split('.').pop().toUpperCase();

    //       var file = this.files[0];

    //       var name = file.name;

    //       var size = file.size;

    //       var type = file.type;

    //         var reader = new FileReader();

    //         //Read the contents of Image File.

    //         reader.readAsDataURL(file);
    //         if (extension != "PNG" && extension != "JPG" && extension != "JPEG") {
    //             show_error("img_error", "Please select only jpg or png image type");
    //             flag = 1;
    //         } else {

    //         reader.onload = function (e) {

    //             //Initiate the JavaScript Image object.

    //             var image = new Image();

    //             //Set the Base64 string return from FileReader as source.

    //             image.src = e.target.result;

    //             image.onload = function () {

    //                 //Determine the Height and Width.

    //                 var height = this.height;

    //                 var width = this.width;

    //                 if (height != 150 || width != 150) {

    //                     show_error("img_error","Height and Width must be 150px.");

    //                     $("#profile_img").val("");

    //                     flag=1;

    //                     return false;

    //                 }

    //                 remove_error("img_error");

    //                 return true;

    //             };

    //         }
    //       }
    //     });


  });
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>admin_assets/js/jquery.cropbox.js"></script>
<script>
   $('#plugin').cropbox({
       selectors: {
           inputInfo: '#plugin textarea.data',
           inputFile: '#plugin input[type="file"]',
           btnCrop: '#plugin .btn-crop',
           btnReset: '#plugin .btn-reset',
           resultContainer: '#plugin .cropped .panel-body',
           messageBlock: '#message'
       },
       imageOptions: {
           class: 'img-thumbnail',
           style: 'margin-right: 5px; margin-bottom: 5px'
       },
       variants: [
           {
               width: 200,
               height: 200,
               maxWidth: 350,
               maxHeight: 350
           }
       ]
   });
</script>