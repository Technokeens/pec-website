<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contact Us",
  "url": "https://peccomponents.com/contact-us",
  "description": "Get in touch with PEC for precise and reliable power resistors manufacturer. Call or email us today to discuss your needs and explore our solutions"
}
</script>

<style>
  .slideshow-bg {
    position: relative;
  }

.slideshow-bg::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color:  rgb(0 0 0 / 10%); /* Adjust the color and opacity as needed */
  z-index: 1;
}

.slideshow-bg__img {
  position: relative;
  z-index: 0;
}

.slideshow-text {
  z-index: 2; /* Ensures text is above the overlay */
}

</style>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<main>
   <section class="swiper-container js-swiper-slider slideshow type2 full-width"
      data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true,
        "pagination": {
          "el": ".slideshow-pagination",
          "type": "bullets",
          "clickable": true
        }
      }'>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-bg">
              <img loading="lazy" src="<?=base_url()?>assets/images/contactbg.png" width="1903" height="896" alt="Pattern" class="slideshow-bg__img object-fit-cover" style="object-position: 80% center;">
            </div>
            <div class="slideshow-text container position-absolute start-50 top-60 translate-middle">
              <div class="row">
                <div class="col-lg-5">
                  <h1 class="text-capitalize text-white fw-bold mb-0 animate animate_fade animate_btt animate_delay-4 fs-38 mbfonth">Contact Us</h1>
                  <p class="mb-4 pb-2 text-white animate animate_fade animate_btt animate_delay-5 mbfontp contfs-16">Discover how Precision Electronics Components Manufacturing Co. can meet your specific needs with precision and reliability. Contact us today to learn more about our products and services.</p>
                  <a href="mailto:<?=(!empty($mainaddress['email'])) ? $mainaddress['email'] : ''; ?>"><p class="text-white mbfontp"><img src="<?=base_url()?>assets/images/email.png" class="contact_banner_icon"> <?=(!empty($mainaddress['email'])) ? 'Send Email' : ''; ?></p></a>
                  <a href="tel:<?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?>"><p class="text-white mbfontp"><img src="<?=base_url()?>assets/images/phone.png" class="contact_banner_icon"> <?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?></p></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slideshow-pagination position-left-center type2"></div>
      <a href="#section-grid-banner" class="slideshow-scroll d-none d-xxl-block position-absolute end-0 bottom-3 text_dash text-uppercase fw-medium">Scroll</a>
    </section><!-- /.slideshow -->

    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <div class="pb-1"></div>

    <!-- <div class="row">
      <div class="container">
        <div class="col-lg-12">
          <h2 class="text-capitalize fw-bold mb-0 animate animate_fade animate_btt animate_delay-4 fs-38 text-black">Contact Us</h2>
          <p class="fs-6 mb-4 pb-2 animate animate_fade animate_btt animate_delay-5">Got a project in mind? We're all ears! Fill out the form and tell us all about your project.</p>
          <p><img src="<?=base_url()?>assets/images/email.png" style="width: 25px;"> sales@peccomponents.com</p>
          <p><img src="<?=base_url()?>assets/images/email.png" style="width: 25px;"> +91 40-27126228, 27120283</p>
        </div>
      </div>
    </div> -->
   
    <div class="row formabsolute">
      <div class="col-lg-12 form2">
        <div class="contact-us__form ">
          <?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success p-20 green white-text"><?= $this->session->flashdata('success') ?></div>
              <?= $this->session->unset_userdata('success');?>
          <?php }else if($this->session->flashdata('error')){ ?>
              <div class="alert alert-danger p-20 red white-text"><?= $this->session->flashdata('error') ?></div>
              <?= $this->session->unset_userdata('error');?>
          <?php } ?>
          <form method="POST" action="<?=base_url();?>home/save_contact" id="contacts">
            <div class="form-floating my-2">
              <label for="contact_us_name">Name *</label>
              <input type="text" class="form-control" name="lead_name" id="lead_name" id="contact_us_name" placeholder="John" required>
              
            </div>
            <div class="form-floating my-2">
              <label for="contact_us_name">Email *</label>
              <input type="email" class="form-control" name="lead_email" id="lead_email" placeholder="Email@example.com" required>
            </div>
            <div class="form-floating my-4">
              <label for="lead_phone">Mobile Number *</label>
              <input type="number" class="form-control" name="lead_phone" id="lead_phone" placeholder="98********" required>
            </div>
            <div class="form-floating my-2">
              <label for="contact_us_name">Subject*</label>
              <div class=" d-flex mb-block">
                <div class="form-check pr-2">
                  <input class="form-check-input form-check-input_fill" type="radio" name="lead_subject" id="lead_subject_1" value="General Inquiry" checked>
                  <label class="form-check-label" for="lead_subject_1">
                    General Inquiry
                  </label>
                </div>
                <div class="form-check pr-2">
                  <input class="form-check-input form-check-input_fill" type="radio" name="lead_subject" id="lead_subject_2" value="Custom Solutions">
                  <label class="form-check-label" for="lead_subject_2">
                    Custom Solutions
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="lead_subject" id="lead_subject_3" value="Careers">
                  <label class="form-check-label" for="lead_subject_3">
                    Careers
                  </label>
                </div>
              </div>
            </div>
            <div class="my-2">
              <label>Any Specific Instruction</label>
              <textarea class="form-control form-control_gray" id="lead_message" name="lead_message" placeholder="Hello" cols="30" rows="5" required></textarea>
            </div>
            <div class="my-4">
                <button type="submit" id="save" class="btn btn-outline-primary text-capitalize border-0 fs-base btn-45"> Send Email </button>
                <button type="button" id="save_hidden" class="btn btn-outline-primary text-capitalize border-0 fs-base btn-45" style="display: none;"> Send Email </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- <section class="collections-grid mb-md-4 pb-md-4 mb-xl-5 mbbottom">
      <div class="container  pt-5">
        <div class="row cutomsolbg">
          <div class="col-lg-12">
              <h3 class="section-title text-capitalize text-left mb-3">Looking for <span class="primaryblue"> customized solutions ?</span></h3>
              <p>PEC has consistently led the way in creating customized resistor solutions for our customers both globally and in India. Customization is often essential in critical applications to address specific electrical and physical conditions in the field.</p>

              <p>We are happy to partner with you to develop customized solutions tailored to your specific needs and applications. Please contact us with your details to get started.
              </p>
              <?php $website = $this->common->fetchsingledata('*','tbl_website_setting',' where wid="1"'); ?>
              <a href="<?=(!empty($website['webemail'])) ? 'mailto:'.$website['webemail'] : 'javascript:;';?>"><button class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45">
                Talk To Sales
              </button></a>
          </div>
        </div>
      </div>
    </section> -->
    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <div class="pb-1"></div>
    <!-- Shop by collection -->
    <section class="collections-grid mb-md-4 pb-md-4 mb-xl-5 mbbottom" >
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mbbottom">
            <div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3805.612309117447!2d78.56765787357998!3d17.478260500914878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9c80c0000001%3A0xa4b72a119a79a064!2sPrecision%20Electronic%20Components%20Manufacturing%20Company!5e0!3m2!1sen!2sin!4v1715777487214!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <!-- <?=(!empty($mainaddress['embedded_url'])) ? $mainaddress['embedded_url'] : ''; ?> -->
            </div>
          </div>
          <div class="col-lg-5 paddingl-5">
             <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ctitle1"><?=(!empty($mainaddress['address_title'])) ? $mainaddress['address_title'] : ''; ?></h3>
              <div class="row mb-lg-3 mbpdcontact">
                <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                  <img src="<?=base_url()?>assets/images/contact_location.png" class="cont_img">
                </div>
                <div class="col-10 mb-4 mb-lg-0"><?=(!empty($mainaddress['address'])) ? $mainaddress['address'] : ''; ?>
                </div>
              </div>
              <div class="row mb-lg-3">
                <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                  <img src="<?=base_url()?>assets/images/contact_email.png" class="cont_img">
                </div>
                <div class="col-10 mb-4 mb-lg-0"><a href="mailto:<?=(!empty($mainaddress['email'])) ? $mainaddress['email'] : ''; ?>"><?=(!empty($mainaddress['email'])) ? 'Send Email' : ''; ?></a>
                </div>
              </div>
              <div class="row mb-lg-3">
                <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                  <img src="<?=base_url()?>assets/images/contact_phone.png" class="cont_img">
                </div>
                <div class="col-10 mb-4 mb-lg-0"><a href="tel:<?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?>"><?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?></a>
                </div>
              </div>
              <div class="row mb-lg-3">
                <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                  <img src="<?=base_url()?>assets/images/contact_telephone.png" class="cont_img">
                </div>
                <div class="col-10 mb-4 mb-lg-0"><a href="tel:<?=(!empty($mainaddress['telephone'])) ? $mainaddress['telephone'] : ''; ?>"><?=(!empty($mainaddress['telephone'])) ? $mainaddress['telephone'] : ''; ?></a>
                </div>
              </div>
              <div class="row mb-lg-3">
                <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                  <img src="<?=base_url()?>assets/images/contact_globe.png" class="cont_img">
                </div>
                <div class="col-10 mb-4 mb-lg-0"><?=(!empty($mainaddress['fax'])) ? $mainaddress['fax'] : ''; ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section class="service-promotion container-fluid mb-md-4 pb-md-4 mb-xl-5">
      <div class="container">
        <div class="row">
          <?php
            if(!empty($address)){
              foreach ($address as $key => $addr) { 
                // if($addr['address_title'] != 'Application Engineering'){ ?>

                  <div class="col-lg-4 paddingl-5">
                    <h5 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ctitle"><?=(!empty($addr['address_title'])) ? $addr['address_title'] : ''; ?></h5>
                    
                    <?php if(!empty($addr['company_name'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_flag.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><?=(!empty($addr['company_name'])) ? $addr['company_name'] : ''; ?></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($addr['person_name'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_user.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><?=(!empty($addr['person_name'])) ? $addr['person_name'] : ''; ?></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($addr['address'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_location.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><?=(!empty($addr['address'])) ? $addr['address'] : ''; ?></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($addr['phone'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_phone.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><a href="tel:<?=(!empty($addr['phone'])) ? $addr['phone'] : ''; ?>"><?=(!empty($addr['phone'])) ? $addr['phone'] : ''; ?></a></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($addr['email'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_email.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><a href="mailto:<?=(!empty($addr['email'])) ? $addr['email'] : ''; ?>"><?=(!empty($addr['email'])) ? 'Send Email' : ''; ?></a></div>
                    </div>
                    <?php } ?>
                  </div>

                <?php //}else{ ?>
                  <!-- <div class="col-lg-4 paddingl-5">
                    <h5 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ctitle"><?=(!empty($mainaddress['address_title'])) ? $mainaddress['address_title'] : ''; ?></h5>
                    
                    <?php if(!empty($mainaddress['address'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_location.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><?=(!empty($mainaddress['address'])) ? $mainaddress['address'] : ''; ?>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($mainaddress['email'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_email.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><a href="mailto:<?=(!empty($mainaddress['email'])) ? $mainaddress['email'] : ''; ?>"><?=(!empty($mainaddress['email'])) ? $mainaddress['email'] : ''; ?></a></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($mainaddress['phone'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_phone.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><a href="tel:<?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?>"><?=(!empty($mainaddress['phone'])) ? $mainaddress['phone'] : ''; ?></a></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($mainaddress['telephone'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_telephone.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><a href="tel:<?=(!empty($mainaddress['telephone'])) ? $mainaddress['telephone'] : ''; ?>"><?=(!empty($mainaddress['telephone'])) ? $mainaddress['telephone'] : ''; ?></a></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($mainaddress['fax'])){ ?>
                    <div class="row mb-lg-3">
                      <div class="col-2 mb-4 mb-lg-0 text-right no_footer_padding">
                        <img src="<?=base_url()?>assets/images/contact_globe.png" class="cont_img">
                      </div>
                      <div class="col-10 mb-4 mb-lg-0"><?=(!empty($mainaddress['fax'])) ? $mainaddress['fax'] : ''; ?></div>
                    </div>
                    <?php } ?>
                  </div>  -->
                <?php //} ?>
                
                <?php
              }
            }
          ?>
        </div>
      </div>
    </section>

  </main>

  <script type="text/javascript">
    $(document).on('click','#save',function(){
        var lead_name      = $('#lead_name').val();
        var lead_email     = $('#lead_email').val();
        var lead_phone     = $('#lead_phone').val();
        var lead_message   = $('#lead_message').val();
        var name_regex = /^[a-zA-Z ]+$/;
        var flag    = 0;
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var phonenumber = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        var mobileregexExp = /^[6-9]\d{9}$/gi;

        // if (grecaptcha.getResponse() == '') 
        // {
        //    show_error("hiddenRecaptcha","Please check Recaptcha.");
        //    flag = 1;
        // } else {
        //     remove_error("hiddenRecaptcha");
        // }
        
        if(lead_name=="")
        {
           show_error("lead_name","Please enter first name.");
           flag = 1;
        }else
        {
           remove_error("lead_name");
        }

        if(lead_email=="")
        {
           show_error("lead_email","Please enter email.");
           flag = 1;
        }else
        {
            if(!filter.test(lead_email)){
              show_error('lead_email', 'Please enter valid email address.');
              flag = 1;
            }else{
              remove_error('lead_email');
            }
        }

        if (lead_phone == "" || !lead_phone.trim())
        {
            show_error("lead_phone","Please enter mobile number.");
            flag = 1;
        } 
        else if(!/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(lead_phone))
        {
            show_error("lead_phone","Please enter correct mobile number.");
            flag = 1;
        } 
        else
        {     
            remove_error("lead_phone");
        } 

        if(lead_message=="")
        {
           show_error("lead_message","Please enter message.");
           flag = 1;
        }else
        {
           remove_error('lead_message');
        }
        
        
        if (flag == 1) 
        {
           return false;
        }else{ 
           // return true; 
            $('#save').hide();
            $('#save_hidden').show(); 
            $('#contacts').submit();
        }
     });
  </script>