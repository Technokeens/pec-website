<!-- Footer Type 1 -->
<?php 
   $website      = $this->common->fetchsingledata('*','tbl_website_setting',' where wid="1"'); 
   if(!empty($website['logo'])){
      $logo = base_url().'uploads/'.$website['logo'];
   }else{
      $logo = base_url().'assets/images/peclogo.png';
   }

   $mainaddress = $this->common->fetchsingledata('*','tbl_contact_us',' where id="1"');
   $socials = $this->common->fetchsingledata('*','social',' where id="1"');
?>
      <footer class="footer footer_type_1 dark">
         <div class="footer-middle footer-outerspace container">
            <div class="row row-cols-lg-5 row-cols-2">
               <div class="footer-column footer-store-info col-12 mb-4 mb-lg-0">
                  <div class="logo mb-md-4">
                     <a href="<?=base_url();?>">
                     <img src="<?=base_url();?>assets/images/peclogo_white.png" alt="PEC Logo White" class="logo__image footer_logo d-block">
                     </a>
                  </div>
                  <!-- /.logo -->
                  <p class="footer-address footertext">Committed to Quality <br> Since - 1972</p>
                  <ul class="social-links list-unstyled d-flex flex-wrap mb-0">
                     <?php if(!empty($socials['instagram'])){ ?>
                        <li class="social_icons">
                           <a href="<?=$socials['instagram']?>" class="footer__social-link d-block">
                           <i class="fa fa-instagram fasize" aria-hidden="true"></i>
                           </a>
                        </li>
                     <?php } ?>
                     <?php if(!empty($socials['googleplus'])){ ?>
                     <li class="social_icons">
                        <a href="<?=$socials['googleplus']?>" class="footer__social-link d-block">
                        <i class="fa fa-globe fasize" aria-hidden="true"></i>
                        </a>
                     </li>
                     <?php } ?>
                     <?php if(!empty($socials['twitter'])){ ?>
                     <li class="social_icons">
                        <a href="<?=$socials['twitter'];?>" class="footer__social-link d-block">
                        <i class="fa fa-twitter fasize" aria-hidden="true"></i>
                        </a>
                     </li>
                     <?php } ?>
                     <?php if(!empty($socials['youtube'])){ ?>
                     <li class="social_icons">
                        <a href="<?=$socials['youtube']?>" class="footer__social-link d-block">
                        <i class="fa fa-youtube-play fasize" aria-hidden="true"></i>
                        </a>
                     </li>
                     <?php } ?>
                  </ul>
               </div>
               <!-- /.footer-column -->
               <div class="footer-column footer-menu mb-4 mb-lg-0">
                  <h4 class="sub-menu__title text-capitalize fw-bold">Explore</h4>
                  <ul class="sub-menu__list list-unstyled">
                     <li class="sub-menu__item"><a href="<?=base_url();?>" class="menu-link menu-link_us-s">Home</a></li>
                     <li class="sub-menu__item"><a href="<?=base_url();?>product" class="menu-link menu-link_us-s">Products</a></li>
                     <li class="sub-menu__item"><a href="<?=base_url();?>applications" class="menu-link menu-link_us-s">Applications</a></li>
                     <li class="sub-menu__item"><a href="<?=base_url();?>about-us" class="menu-link menu-link_us-s">About Us</a></li>
                  </ul>
               </div>
               <!-- /.footer-column -->
               <div class="footer-column footer-menu mb-4 mb-lg-0">
                  <h4 class="sub-menu__title text-capitalize fw-bold">Support</h4>
                  <ul class="sub-menu__list list-unstyled">
                     <li class="sub-menu__item"><a href="<?=base_url();?>contact-us" class="menu-link menu-link_us-s">Contact Us</a></li>
                     <li class="sub-menu__item"><a href="<?=base_url();?>request-quote" class="menu-link menu-link_us-s">Request a Quote</a></li>
                     <li class="sub-menu__item"><a href="<?=base_url();?>terms" class="menu-link menu-link_us-s">Terms of service</a></li>
                     <li class="sub-menu__item"><a href="<?=base_url();?>privacy-policy" class="menu-link menu-link_us-s">Privacy Policy</a></li>
                  </ul>
               </div>
               <!-- /.footer-column -->
               <div class="footer-column footer-newsletter col-12 mb-4 mb-lg-0">
                  <div class="row mb-lg-3">
                     <div class="col-2 mb-4 mb-lg-0 text-center no_footer_padding">
                        <!-- <i class="fa fa-map-marker fs-icon-footer" aria-hidden="true"></i> -->
                        <img src="<?=base_url();?>assets/images/location.png">
                     </div>
                     <div class="col-10 mb-4 mb-lg-0 footertext"><?=(!empty($mainaddress['address'])) ? $mainaddress['address'] : '';?>
                     </div>
                  </div>
                  <div class="row mb-lg-3">
                     <div class="col-2 mb-4 mb-lg-0 text-center no_footer_padding">
                        <img src="<?=base_url();?>assets/images/email.png">
                     </div>
                     <div class="col-10 mb-4 mb-lg-0 footertext"><a class="footertext" href="mailto:<?=(!empty($mainaddress['email'])) ? $mainaddress['email'] : ''; ?>"><?=(!empty($mainaddress['email'])) ? 'Send Email' : '';?></a>
                     </div>
                  </div>
                  <div class="row mb-lg-3">
                     <div class="col-2 mb-4 mb-lg-0 text-center no_footer_padding">
                        <img src="<?=base_url();?>assets/images/phone.png">
                     </div>
                     <div class="col-10 mb-4 mb-lg-0 footertext"><a class="footertext" href="tel:<?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?>"><?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : '';?></a>
                     </div>
                  </div>
                  <div class="row mb-lg-3">
                     <div class="col-2 mb-4 mb-lg-0 text-center no_footer_padding">
                        <img src="<?=base_url();?>assets/images/telephone.png">
                     </div>
                     <div class="col-10 mb-4 mb-lg-0 footertext"><a class="footertext" href="tel:<?=(!empty($mainaddress['telephone'])) ? $mainaddress['telephone'] : ''; ?>"><?=(!empty($mainaddress['telephone'])) ? $mainaddress['telephone'] : '';?></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom container-fluid">
            <div class=" align-items-center text-center">
               <span class="footer-copyright me-auto">Copyright © 2024 PEC Components. | All rights reserved</span>
            </div>
         </div>
      </footer>
      <!-- End Footer Type 1 -->
      <!-- Go To Top -->
      <div id="scrollTop" class="visually-hidden end-0"></div>
      <!-- Page Overlay -->
      <div class="page-overlay"></div>
      <!-- External JavaScripts -->




      <!-- <script src="<?=base_url();?>assets/js/plugins/jquery.min.js"></script> -->
      <script src="<?=base_url();?>assets/js/plugins/bootstrap.bundle.min.js"></script>
      <script src="<?=base_url();?>assets/js/plugins/bootstrap-slider.min.js"></script>
      <!-- <script src="js/plugins/jquery.waypoints.min.js"></script> -->
      <!-- <script src="js/plugins/sticky.min.js"></script> -->
      <script src="<?=base_url();?>assets/js/plugins/swiper.min.js"></script>
      <script src="<?=base_url();?>assets/js/plugins/countdown.js"></script>
      <!-- Footer Scripts -->
      <script src="<?=base_url();?>assets/js/theme.js"></script>
      <script>
         function show_error(id,msg)
         { 
          if(!$("#"+id).hasClass("has-error"))
          {
            $("#"+id).addClass("has-error");
            $('<div class="error text-danger">'+msg+'</div>').insertAfter($("#"+id));
          }
          else
          {
            $("#"+id).next("div.error").html(msg);
          }
          if (!$("input").is(":focus")) 
          {      
            $("#"+id).focus();
          }

         }
         
         function remove_error(id)
         {
           $("#"+id).removeClass("has-error");
           $("#"+id).next("div.error").remove();
         }

         $(".alert").fadeOut(8000);
    </script>
   </body>
</html>