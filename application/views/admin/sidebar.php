<?php $admin_data=$admin_data=$this->common->fetchsingledata('*','admin',' WHERE id='.$this->session->userdata('user_id').'');?>
<?php $set=$this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid="1"');
   $user_data=$this->common->fetchsingledata('*','admin',' WHERE id='.$this->session->userdata('user_id').'');
   $user_details = $this->common->fetchsingledata('*',"tbl_user_master"," WHERE id='".$this->session->userdata('user_id')."'");
   $page=$this->uri->segment('2');    
   ?>

</style>
<style>
   
   .wrapper.wrapper-content {
      padding-top: 30px!important;
   }
   .navbar-fixed-top, .navbar-static-top {
       background: #ffffff!important;
   }
   /*.nav-header a {
       color: #1e73be;
   }
   .nav > li > a {
       color: #ffffff;
       font-weight: 600;
       padding: 14px 20px 14px 25px;
   }
   .nav > li.active {
        border-left: 4px solid #19aa8d;
        background: #446883;
    }*/
    .navbar-toggle {
      background-color: #ddd!important;
      color: #fff;
      padding: 9px 10px;
      font-size: 14px;
   }
    .nav-header img.img-rounded {
      background: white;
      padding:10px;
    }

   .bgmobile{
      background: #02417c;
   }

   .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {
       max-height: 500px;
   }
   .navbar-default .navbar-nav .open .dropdown-menu>li>a {
        color: #fff;
   }
   .navhtauto{
      min-height: auto;
      display: none;
   }
   .contentd{
      padding-top: 60px;
   }
   .pr-1{
      padding-right: 10px;
   }
   @media (max-width: 768px) {
      .navbar-headermb {
         display: unset!important;
         float: unset!important;
      }
      .navhtauto{
         min-height: auto;
         display: block;
      }
      .row.wrapper.border-bottom.white-bg.page-heading {
          margin-top: 40px;
      }
      .wrapper.wrapper-content {
         padding-top: 20px!important;
      }
   }
   @media (max-width: 767px) {
      .navbar-nav .open .dropdown-menu {
        background-color: #2b659b;
        padding-left: 24px;
     }

  }
</style>

<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
   <div class="sidebar-collapse" >
      <ul class="nav metismenu" id="side-menu">
         <li class="nav-header">
            <div class="dropdown profile-element text-center">
               <span>
               <?php
                  if($admin_data['profile_image']!="" && $this->session->userdata("user_type")=="admin")
                  {
                  ?>
               <img alt="image" class="img-rounded" src="<?php echo base_url(); ?>uploads/user/<?php echo $admin_data['profile_image']?>" data-src="<?php  echo $admin_data['profile_image'];?>" data-src-retina="<?php  echo $admin_data['profile_image'];?>" width="80" height="80" onerror="this.src='<?php echo base_url()."uploads/user/user_default.png";?>'"/>
               <?php       
                  }
                  else
                  {
                  ?>
               <img alt="image" class="img-rounded" src="<?php echo base_url()."uploads/user/user_default.png";?>" width="69" height="69"/>
               <?php
                  }
                  ?>
               </span>
               <a data-toggle="dropdown" class="dropdown-toggle text-left" href="">
               <span class="clear"> 
               <span class="block m-t-xs">
               <?php
                  if ($this->session->userdata('user_type') != '' && $this->session->userdata('user_type') == 'admin') {
                  ?>
               <strong class="font-bold"><?php echo $admin_data['first_name'].' '.$admin_data['last_name'];?> <i class="fa fa-sort-desc" aria-hidden="true" style="float: right;"></i> </strong>
               <?php } ?>
               </span> 
               </span> 
               </a>
               <ul class="dropdown-menu animated fadeInRight m-t-xs">
                  <?php
                     if($this->session->userdata("user_type")=="admin")
                     {
                     ?>
                  <li><a href="<?php echo base_url().'admin/update_profile';?>"><i class="fa fa-user"></i>  Profile</a></li>
                  <?php
                     }
                     ?>
                     <li><a href="<?php echo base_url().'admin/logout/';?>"><i class="fa fa-sign-out"></i>  Log Out</a></li> 
               </ul>
            </div>
            <div class="logo-element">
               <?=(!empty($set['title'])) ? $set['title'] : '';?>
            </div>
         </li>
         <li class="<?php if($this->uri->segment(2)=='dashboard'){ echo "active"; }?>">
            <a href="<?php echo base_url().'admin/dashboard';?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>                
         </li>
         
         <?php if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin') { ?>
         
         <li class="<?php if($this->uri->segment(2)=='add-application' || $this->uri->segment(2)=='manage-application' || $this->uri->segment(2)=='edit-application' || $this->uri->segment(2)=='manage-archive-application' ){ echo "active"; }?>">
            <a href=""><i class="fa fa-files-o" aria-hidden="true"></i> <span class="nav-label">Application</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-application' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-application';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Application</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-application' || $this->uri->segment(1)=='edit-application' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-application';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Application</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-archive-application' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-archive-application';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Archives</a></li>
            </ul>
         </li>
         <li class="<?php if($this->uri->segment(2)=='add-construction' || $this->uri->segment(2)=='manage-construction' || $this->uri->segment(2)=='edit-construction'){ echo "active"; }?>">
            <a href=""><i class="fa fa-files-o" aria-hidden="true"></i> <span class="nav-label">Construction</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-construction' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-construction';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Construction</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-construction' || $this->uri->segment(1)=='edit-construction' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-construction';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Construction</a></li>
            </ul>
         </li>
         <li class="<?php if($this->uri->segment(2)=='add-power-rating' || $this->uri->segment(2)=='manage-power-rating' || $this->uri->segment(2)=='edit-power-rating'){ echo "active"; }?>">
            <a href=""><i class="fa fa-plug" aria-hidden="true"></i> <span class="nav-label">Power Rating</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-power-rating' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-power-rating';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Power Rating</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-power-rating' || $this->uri->segment(1)=='edit-power-rating' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-power-rating';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Power Rating</a></li>
            </ul>
         </li>

         <li class="<?php if($this->uri->segment(2)=='add-product-series' || $this->uri->segment(2)=='manage-product-series' || $this->uri->segment(2)=='edit-product-series'){ echo "active"; }?>">
            <a href=""><i class="fa fa-files-o" aria-hidden="true"></i> <span class="nav-label">Series</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-product-series' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-product-series';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Series</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-product-series' || $this->uri->segment(1)=='edit-product-series' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-product-series';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Series</a></li>
            </ul>
         </li>

         <li class="<?php if($this->uri->segment(2)=='add-product' || $this->uri->segment(2)=='manage-product' || $this->uri->segment(2)=='edit-product' || $this->uri->segment(2)=='manage-archive-product' ){ echo "active"; }?>">
            <a href=""><i class="fa fa-product-hunt" aria-hidden="true"></i> <span class="nav-label">Product</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-product' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-product';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Product</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-product' || $this->uri->segment(1)=='edit-product' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-product';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Product</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-archive-product' || $this->uri->segment(1)=='edit-archive-product' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-archive-product';?>" data-ajax="true"><i class="fa fa-files-o"></i>Archive Product</a></li>
            </ul>
         </li>

         <li class="<?php if($this->uri->segment(2)=='add-event' || $this->uri->segment(2)=='manage-event' || $this->uri->segment(2)=='edit-event'){ echo "active"; }?>">
            <a href=""><i class="fa fa-calendar" aria-hidden="true"></i> <span class="nav-label">Event</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-event' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-event';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Event</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-event' || $this->uri->segment(1)=='edit-event' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-event';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Event</a></li>
            </ul>
         </li>

         <li class="<?php if($this->uri->segment(2)=='add-slider' || $this->uri->segment(2)=='manage-slider' || $this->uri->segment(2)=='edit-slider'){ echo "active"; }?>">
            <a href=""><i class="fa fa-image" aria-hidden="true"></i> <span class="nav-label">Slider</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-slider' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-slider';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Slider</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-slider' || $this->uri->segment(1)=='edit-slider' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-slider';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Slider</a></li>
            </ul>
         </li>

         <li class="<?php if($this->uri->segment(2)=='manage-lead'){ echo "active"; }?>">
            <a href="<?php echo base_url().'admin/manage-lead';?>"><i class="fa fa-user"></i> <span class="nav-label">Contact Leads</span></a>                
         </li>

         <li class="<?php if($this->uri->segment(2)=='manage-quotation'){ echo "active"; }?>">
            <a href="<?php echo base_url().'admin/manage-quotation';?>"><i class="fa fa-user"></i> <span class="nav-label">Quotations</span></a>                
         </li>

         <li class="<?php if($this->uri->segment(2)=='add-client' || $this->uri->segment(2)=='manage-client' || $this->uri->segment(2)=='edit-client'){ echo "active"; }?>">
            <a href=""><i class="fa fa-plus-circle" aria-hidden="true"></i> <span class="nav-label">Client</span></a>
            <ul class="nav nav-second-level collapse">
               <li class="<?php if($this->uri->segment(2)=='add-client' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-client';?>" data-ajax="true"><i class="fa fa-plus-circle"></i>Add Client</a></li>
               <li class="<?php if($this->uri->segment(2)=='manage-client' || $this->uri->segment(1)=='edit-client' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-client';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Client</a></li>
            </ul>
         </li>
         <li class="<?php if($this->uri->segment(2)=='update_settings' || $this->uri->segment(2)=='update_email_settings' || $this->uri->segment(2)=='media_settings' || $this->uri->segment(2)=='social' || $this->uri->segment(2)=='contact_us'){ echo "active"; }?>">
            <a href=""><i class="fa fa-cogs" aria-hidden="true"></i> <span class="nav-label">Settings</span></a>
            <ul class="nav nav-second-level collapse">
              <li class="<?php if($this->uri->segment(2)=='update_settings'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/update_settings';?>"><i class="fa fa-cogs" aria-hidden="true"></i><span class="nav-label">Website Settings</span></a>
               </li>
               <li class="<?php if($this->uri->segment(2)=='update_email_settings'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/update_email_settings';?>"><i class="fa fa-envelope" aria-hidden="true"></i><span class="nav-label">Email Settings</span></a>
               </li>
               <li class="<?php if($this->uri->segment(2)=='media_settings'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/media_settings';?>"><i class="fa fa-image" aria-hidden="true"></i><span class="nav-label">Media Settings</span></a>
               </li>
                <li class="<?php if($this->uri->segment(2)=='contact_us'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/contact_us';?>"><i class="fa fa-phone" aria-hidden="true"></i><span class="nav-label">Contact Us</span></a>
               </li>
               <li class="<?php if($this->uri->segment(2)=='social'){ echo "active"; }?>"><a href="<?php echo base_url().'admin/social';?>"><i class="fa fa-share-square" aria-hidden="true"></i> <span class="nav-label">Manage Social media</span></a></li>

            </ul>
         </li>
         <?php } ?>
      </ul>
   </div>
</nav>
<div id="page-wrapper" class="gray-bg">
<!-- <div class="row border-bottom">
   <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
    <br>
    <br>
      <ul class="nav navbar-top-links navbar-right">
         <li>
            <?php if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin'){?>
            <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $user_data['first_name'].' '.$user_data['last_name'];?></span>
            <?php } elseif($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='user'){ ?>
            <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $user_details['name']?></span>
            <?php }?>
         </li>
         
         <li>
         
         </li>
      </ul>
      <br><br>
   </nav>
</div> -->




<nav class="navbar navbar-default navbar-fixed-top navhtauto">
   <div class="container">
     <div class="navbar-header navbar-headermb">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <!-- <a class="navbar-brand" href="#">Nate's Testing Place</a> -->
     </div>
     <div id="navbar" class="navbar-collapse collapse bgmobile">
       <ul class="nav navbar-nav">
         <div class="sidebar-collapse" >
            <ul class="nav metismenu" id="side-menu">
               <li class="nav-header">
                  <div class="dropdown profile-element text-center">
                     <span>
                     <?php
                        if($admin_data['profile_image']!="" && $this->session->userdata("user_type")=="admin")
                        {
                        ?>
                     <img alt="image" class="img-rounded" src="<?php echo base_url(); ?>uploads/user/<?php echo $admin_data['profile_image']?>" data-src="<?php  echo $admin_data['profile_image'];?>" data-src-retina="<?php  echo $admin_data['profile_image'];?>" width="80" height="80" onerror="this.src='<?php echo base_url()."uploads/user/user_default.png";?>'"/>
                     <?php       
                        }
                        else
                        {
                        ?>
                     <img alt="image" class="img-rounded" src="<?php echo base_url()."uploads/user/user_default.png";?>" width="69" height="69"/>
                     <?php
                        }
                        ?>
                     </span>
                     <a data-toggle="dropdown" class="dropdown-toggle text-left" href="">
                     <span class="clear"> 
                     <span class="block m-t-xs">
                     <?php
                        if ($this->session->userdata('user_type') != '' && $this->session->userdata('user_type') == 'admin') {
                        ?>
                     <strong class="font-bold"><?php echo $admin_data['first_name'].' '.$admin_data['last_name'];?> <i class="fa fa-sort-desc" aria-hidden="true" style="float: right;"></i> </strong>
                     <?php } ?>
                     </span> 
                     </span> 
                     </a>
                     <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <?php
                           if($this->session->userdata("user_type")=="admin")
                           {
                           ?>
                        <li><a href="<?php echo base_url().'admin/update_profile';?>"><i class="fa fa-user"></i>  Profile</a></li>
                        <?php
                           }
                           ?>
                           <li><a href="<?php echo base_url().'admin/logout/';?>"><i class="fa fa-sign-out"></i>  Log Out</a></li> 
                     </ul>
                  </div>
                  <div class="logo-element">
                     <?=(!empty($set['title'])) ? $set['title'] : '';?>
                  </div>
               </li>
               <li class="<?php if($this->uri->segment(2)=='dashboard'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/dashboard';?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>                
               </li>


               
               <?php if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin') { ?>
               

               <li class="dropdown <?php if($this->uri->segment(2)=='add-application' || $this->uri->segment(2)=='manage-application' || $this->uri->segment(2)=='edit-application' || $this->uri->segment(2)=='manage-archive-application' ){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-files-o"></i> <span class="nav-label">Application</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li class="<?php if($this->uri->segment(2)=='add-application' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-application';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i> Add Application</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-application' || $this->uri->segment(1)=='edit-application' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-application';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Application</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-archive-application' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-archive-application';?>" data-ajax="true"><i class="fa fa-files-o  pr-1"></i>Manage Archives</a></li>
                 </ul>
               </li>


               <li class="dropdown <?php if($this->uri->segment(2)=='add-construction' || $this->uri->segment(2)=='manage-construction' || $this->uri->segment(2)=='edit-construction'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-files-o" aria-hidden="true"></i> <span class="nav-label">Construction</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                     <li class="<?php if($this->uri->segment(2)=='add-construction' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-construction';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Construction</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-construction' || $this->uri->segment(1)=='edit-construction' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-construction';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Construction</a></li>
                 </ul>
               </li>

               <li class="dropdown <?php if($this->uri->segment(2)=='add-power-rating' || $this->uri->segment(2)=='manage-power-rating' || $this->uri->segment(2)=='edit-power-rating'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plug" aria-hidden="true"></i> <span class="nav-label">Power Rating</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                     <li class="<?php if($this->uri->segment(2)=='add-power-rating' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-power-rating';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Power Rating</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-power-rating' || $this->uri->segment(1)=='edit-power-rating' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-power-rating';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Power Rating</a></li>
                 </ul>
               </li>

               <li class="dropdown <?php if($this->uri->segment(2)=='add-product-series' || $this->uri->segment(2)=='manage-product-series' || $this->uri->segment(2)=='edit-product-series'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-files-o" aria-hidden="true"></i> <span class="nav-label">Series</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li class="<?php if($this->uri->segment(2)=='add-product-series' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-product-series';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Series</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-product-series' || $this->uri->segment(1)=='edit-product-series' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-product-series';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Series</a></li>
                 </ul>
               </li>


               <li class="dropdown <?php if($this->uri->segment(2)=='add-product' || $this->uri->segment(2)=='manage-product' || $this->uri->segment(2)=='edit-product' || $this->uri->segment(2)=='manage-archive-product' ){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-product-hunt" aria-hidden="true"></i> <span class="nav-label">Product</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li class="<?php if($this->uri->segment(2)=='add-product' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-product';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Product</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-product' || $this->uri->segment(1)=='edit-product' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-product';?>" data-ajax="true"><i class="fa fa-files-o"></i>Manage Product</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-archive-product' || $this->uri->segment(1)=='edit-archive-product' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-archive-product';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Archive Product</a></li>
                 </ul>
               </li>

               <li class="dropdown<?php if($this->uri->segment(2)=='add-event' || $this->uri->segment(2)=='manage-event' || $this->uri->segment(2)=='edit-event'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="nav-label">Event</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li class="<?php if($this->uri->segment(2)=='add-event' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-event';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Event</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-event' || $this->uri->segment(1)=='edit-event' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-event';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Event</a></li>
                 </ul>
               </li>


               <li class="dropdown <?php if($this->uri->segment(2)=='add-slider' || $this->uri->segment(2)=='manage-slider' || $this->uri->segment(2)=='edit-slider'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-image" aria-hidden="true"></i> <span class="nav-label">Slider</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li class="<?php if($this->uri->segment(2)=='add-slider' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-slider';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Slider</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-slider' || $this->uri->segment(1)=='edit-slider' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-slider';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Slider</a></li>
                 </ul>
               </li>
               <li class="<?php if($this->uri->segment(2)=='manage-lead'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/manage-lead';?>"><i class="fa fa-user"></i> <span class="nav-label">Contact Leads</span></a>                
               </li>

               <li class="<?php if($this->uri->segment(2)=='manage-quotation'){ echo "active"; }?>">
                  <a href="<?php echo base_url().'admin/manage-quotation';?>"><i class="fa fa-user"></i> <span class="nav-label">Quotations</span></a>                
               </li>
              
               <li class="dropdown <?php if($this->uri->segment(2)=='add-client' || $this->uri->segment(2)=='manage-client' || $this->uri->segment(2)=='edit-client'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span class="nav-label">Client</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li class="<?php if($this->uri->segment(2)=='add-client' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/add-client';?>" data-ajax="true"><i class="fa fa-plus-circle pr-1"></i>Add Client</a></li>
                     <li class="<?php if($this->uri->segment(2)=='manage-client' || $this->uri->segment(1)=='edit-client' ){ echo "active"; }?>"><a href="<?php echo base_url().'admin/manage-client';?>" data-ajax="true"><i class="fa fa-files-o pr-1"></i>Manage Client</a></li>
                 </ul>
               </li>


               <li class="dropdown <?php if($this->uri->segment(2)=='update_settings' || $this->uri->segment(2)=='update_email_settings' || $this->uri->segment(2)=='media_settings' || $this->uri->segment(2)=='social' || $this->uri->segment(2)=='contact_us'){ echo "active"; }?>">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i> <span class="nav-label">Settings</span> <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li class="<?php if($this->uri->segment(2)=='update_settings'){ echo "active"; }?>">
                        <a href="<?php echo base_url().'admin/update_settings';?>"><i class="fa fa-cogs pr-1" aria-hidden="true"></i><span class="nav-label">Website Settings</span></a>
                     </li>
                     <li class="<?php if($this->uri->segment(2)=='update_email_settings'){ echo "active"; }?>">
                        <a href="<?php echo base_url().'admin/update_email_settings';?>"><i class="fa fa-envelope pr-1" aria-hidden="true"></i><span class="nav-label">Email Settings</span></a>
                     </li>
                     <li class="<?php if($this->uri->segment(2)=='media_settings'){ echo "active"; }?>">
                        <a href="<?php echo base_url().'admin/media_settings';?>"><i class="fa fa-image pr-1" aria-hidden="true"></i><span class="nav-label">Media Settings</span></a>
                     </li>
                      <li class="<?php if($this->uri->segment(2)=='contact_us'){ echo "active"; }?>">
                        <a href="<?php echo base_url().'admin/contact_us';?>"><i class="fa fa-phone pr-1" aria-hidden="true"></i><span class="nav-label">Contact Us</span></a>
                     </li>
                     <li class="<?php if($this->uri->segment(2)=='social'){ echo "active"; }?>"><a href="<?php echo base_url().'admin/social';?>"><i class="fa fa-share-square pr-1" aria-hidden="true"></i> <span class="nav-label">Manage Social media</span></a></li>
                 </ul>
               </li>
               <?php } ?>
            </ul>
         </div>
       </ul>
     </div><!--/.nav-collapse -->
   </div>
 </nav>












<!-- <script src="<?php echo base_url();?>admin_assets/js/jquery-2.1.1.js"></script> -->
<script>
   $(document).ready(function()
    {
     //    $("#side-menu").on('click', 'li', function () {
     //    $("#side-menu li.active").removeClass("active");
     //    // adding classname 'active' to current click li 
     //    $(this).addClass("active");
     // });
        
    });
    
</script>