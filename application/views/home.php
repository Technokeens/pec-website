<style>
   .disclaimer {
     font-size: 12px;
     color: #666;
     text-align: center;
     margin-top: 10px;
   }
   .slideshow-bg {
       position: relative;
       width: 100%;
       height: 100%;
   }

   .slideshow-overlay {
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background-color: rgb(0 0 0 / 50%); /* Adjust color and opacity */
       z-index: 1; /* Ensure overlay is above the image */
   }

   .slideshow-text {
       z-index: 2; /* Ensure text is above the overlay */
   }
</style>
<main>
   <section class="swiper-container js-swiper-slider slideshow type2 full-width"
      data-settings='{
      "autoplay": {
      "delay": 10000
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
      <div class="swiper-wrapper sliderhtmb">
         
         <?php
         if(!empty($sliders)){
           foreach ($sliders as $skey => $slider) 
           {
             if(!empty($slider['image']))
             {
               $image = base_url().'uploads/slider/'.$slider['image'];
             }else{
               $image = base_url().'assets/images/slider/slider1.png';
             }
         ?>
               <div class="swiper-slide">
                   <div class="overflow-hidden position-relative h-100">
                       <div class="slideshow-bg">
                           <img loading="lazy" src="<?=$image;?>" width="1903" height="896" alt="<?=(!empty($slider['slider_image_alt'])) ? $slider['slider_image_alt'] : ''; ?>" class="slideshow-bg__img object-fit-cover" style="object-position: 80% center;">
                           <!-- Overlay Div -->
                           <div class="slideshow-overlay"></div>
                       </div>
                       <div class="slideshow-text container position-absolute start-50 top-50 translate-middle ">
                           <div class="">
                               <h1 class="text-capitalize text-white fw-bold mb-0 animate animate_fade animate_btt animate_delay-4 fs-38 textmb mb-3">
                                   <?=(!empty($slider['title'])) ? ucfirst($slider['title']) : ''; ?>
                               </h1>
                               <div class="sliderfs mb-1 pb-1 text-white animate animate_fade animate_btt animate_delay-5 hidden-xs">
                                   <?=(!empty($slider['description'])) ? $slider['description'] : ''; ?>
                               </div>
                           </div>
                           <?php if(!empty($slider['url'])){ ?>
                           <a href="<?=$slider['url']?>">
                               <button class="btn btn-outline-primary border-0 fs-base text-capitalize animate animate_fade animate_btt animate_delay-7 btn-45 mt-1">
                                   <?php if(!empty($slider['url_button_label'])){
                                        echo $slider['url_button_label'];
                                   }else{
                                        echo "Explore Products";
                                   } ?>
                                   <i class="fa fa-long-arrow-right"></i>
                               </button>
                           </a>
                           <?php } ?>
                       </div>
                   </div>
               </div>

         <?php  
           }
         }
         ?>
      </div>
      <div class="slideshow-pagination position-left-center type2"></div>
      <a href="#section-grid-banner" class="slideshow-scroll d-none position-absolute end-0 bottom-3 text_dash text-uppercase fw-medium">Scroll</a> 
      <!-- d-xxl-block -->
   </section>
   <!-- /.slideshow -->
   <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
   <div class="pb-1"></div>
   <!-- Shop by collection -->
   <section class="collections-grid" >
      <div class="container ">
         <div class="row ">
            <div class="col-lg-6  pr-5 mbbottom aboutcontent">
               <h2 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4">Core <strong class="titlehighlight">Capabilities</strong></h2>
               <p>
                  Our extensive range of power resistance solutions caters to a global clientele, including several Fortune 100 companies. We design and deliver resistors engineered for the most demanding applications, blending decades of experience with cutting-edge design expertise to help our partners meet both existing and innovative product needs, all while adhering to stringent global industry standards.
               </p>
              
               <p>Certified to ISO 9001:2015, ISO 14001:2015, JSS 50402, IECQ, UL, and CE, we are fully equipped to meet the diverse requirements of our worldwide customers.</p>
                <a href="<?=base_url();?>about-us">
                  <button class="btn btn-outline-primary border-0 fs-base text-capitalize mt-4  btn-45">
                    Know More <i class="fa fa-long-arrow-right"></i>
                  </button>
                </a>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
               <div class="row">
                  <div class="col-lg-6 block1box mbcenter p-4">
                     <img src="<?=base_url();?>assets/images/ab3.png" alt="50+ Years Of Experience" class="abicon mb-4">
                     <h2 class="primaryblue">50<span class="black">+</span></h2>
                     <p class="mb-0"><b>Years of Experience</b></p>
                  </div>
                  <div class="col-lg-6 block2box mbcenter p-4">
                     <img src="<?=base_url();?>assets/images/ab5.png" class="abicon mb-4" alt="1 Billion Plus Resistors Sold">
                     <h2 class="primaryblue">1Bln <span class="black">+</span></h2>
                     <p class="mb-0"><b>Resistors Sold</b></p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6 block3box mbcenter p-4">
                     <img src="<?=base_url();?>assets/images/ab2.png" class="abicon mb-4" alt="100 Million Annual Capacity">
                     <h2 class="primaryblue">100Mln<span class="black"></span></h2>
                     <p class="mb-0"><b>Annual Capacity</b></p>
                  </div>
                  <div class="col-lg-6 block4box mbcenter p-4">
                     <img src="<?=base_url();?>assets/images/ab1.png" class="abicon mb-4" alt="1000 Plus Unique Designs">
                     <h2 class="primaryblue">1000<span class="black">+</span></h2>
                     <p class="mb-0"><b>Unique Designs</b></p>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
   </section>
   <!-- /.collections-grid collections-grid_masonry -->
   <div class="mb-4 pb-4 mb-xl-5 pb-xl-5"></div>
   <!-- <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div> -->
   <!-- <div class="mb-5 pb-1 pb-xl-4"></div> -->
   <section class="collections-grid mb-md-4 pb-md-4 mb-xl-5 mbbottom">
      <div class="container">
         <div class="row searchbg">
            <div class="col-lg-12">
               <h3 class="section-title text-capitalize text-center text-white mb-1 mb-md-2 pb-xl-2 mb-xl-4 font-normal">Search by <b class="titlehighlight">Application, Construction and Product Series </b></h3>
               <div class="header-tools__item hover-container">
                  <form action="" method="GET" class="search-field container findproductform" id="findproductform">
                     <div class="position-relative searchpopbox">
                        <div class="search-field__input_header-wrapper mb-md-2 mb-xl-4">
                           <input type="text" name="search_text" class="search-field__input_header form-control form-control-sm border-light header_search header_search_inp poppins-medium w-100" placeholder="Find Products" id="product_search_text" value="<?=(!empty($_GET['search'])) ? $_GET['search'] : '';?>" autocomplete="off">
                        </div>
                        <!-- js-hidden-content -->
                        <div class="search-popup " id="searchdiv" style="padding-right: 25px;padding-left: 25px;">
                              <div class="position-relative">
                                 <div class="row">
                                    <div class="col-lg-4 border-right">
                                       <h3 class="service-promotion__title h5 primaryblue">Select Application</h3>
                                       <input type="hidden" name="applicationfilter" class="appfilter">
                                       <select class="form-control applicat_select" id="applicationreset">
                                          <option value="">Select Application</option>
                                          <?php
                                            if(!empty($allapplications))
                                              {
                                                foreach ($allapplications as $app_val) 
                                                {
                                            ?>
                                                  <option value="<?=$app_val['t_id'];?>" data-name="<?=$app_val['title'];?>"><?php echo ucfirst($app_val['title']);?></option>
                                            <?php
                                                }
                                              }
                                            ?>
                                       </select>
                                       <div class="inline-block applicatdiv mt-3">
                                       </div>
                                    </div>
                                    <div class="col-lg-4 border-right">
                                       <h3 class="service-promotion__title h5 primaryblue">Select Construction</h3>
                                       <input type="hidden" name="constructionfilter" class="constrfilter">
                                       <select class="form-control const_select" id="constructionreset">
                                          <option value="">Select Construction</option>
                                          <?php
                                            if(!empty($allconstruction))
                                              {
                                                foreach ($allconstruction as $constr_val) 
                                                {
                                            ?>
                                                  <option value="<?=$constr_val['c_id'];?>" data-name="<?=$constr_val['construction_title'];?>"><?php echo ucfirst($constr_val['construction_title']);?></option>
                                            <?php
                                                }
                                              }
                                            ?>
                                       </select>
                                       <div class="inline-block constrdiv  mt-3">
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <h3 class="service-promotion__title h5 primaryblue">Power Rating</h3>
                                       <input type="hidden" name="powerfilter" class="powerfilter">
                                       <select class="form-control power_select" id="powerreset">
                                          <option value="">Select Power Rating</option>
                                          <?php
                                            if(!empty($allpower_ratings))
                                              {
                                                foreach ($allpower_ratings as $power_val) 
                                                {
                                            ?>
                                                  <option value="<?=$power_val['pr_id'];?>" data-name="<?=$power_val['power_rating'];?>"><?php echo $power_val['power_rating'];?></option>
                                            <?php
                                                }
                                              }
                                            ?>
                                       </select>
                                       <div class="inline-block powerdiv mt-3">
                                       </div>
                                    </div>
                                 </div>
                                 
                              </div>
                              <div id="filter_err"></div>
                              <div class="inline-block text-right">
                                 <button type="button" class="btn btn-outline fs-base btn-45 clearall">Clear All</button>
                                 <button type="submit" class="btn btn-outline fs-base btn-outline-primary" class="saveapply">Apply</button>
                              </div>
                        </div>
                        <!-- /.search-popup -->
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="service-promotion container mb-md-4 pb-md-4 mb-xl-5">
      <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">Discover Products by <strong class="titlehighlight">Applications</strong>
         <a href="<?=base_url();?>applications" class="mbhidden"><button class="btn btn-outline-primary border-0 fs-base text-capitalize  btn-45 appright">
         Explore All Application <i class="fa fa-long-arrow-right"></i>
         </button></a>
      </h3>
      
      <div class="row application_blocks">
        <?php 
          if(!empty($applications)){
            foreach ($applications as $akey => $app_val) 
            { ?>
              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-4 pb-1 mb-md-0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-3">
                   <div class="service-promotion__icon mb-4">
                    <?php
                    if(!empty($app_val['application_image']))
                    { ?>
                      <img src="<?=base_url();?>uploads/application/<?=$app_val['application_image']?>" class="hicon">
                    <?php } ?>
                      
                   </div>
                   <h3 class="service-promotion__title h5 primaryblue"><?=(!empty($app_val['title'])) ? ucfirst($app_val['title']) : ''; ?></h3>
                   <p class="service-promotion__content text-secondary textminht"><?=(!empty($app_val['short_description'])) ? substr($app_val['short_description'],0,124).' ...' : ''; ?></p>
                   <a href="<?=(!empty($app_val['slug'])) ? 'view-application/'.$app_val['slug'] : 'javascript:;'; ?>" class="primaryblue">Know More <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
            <?php 
            }
          }else{
            echo '<p class="text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">No application available </p>';
          }
        ?>
         
        <a href="<?=base_url();?>applications" class=""><button class="btn btn-outline-primary border-0 fs-base text-capitalize  btn-45 mt-4 mb-5">
         Explore All Application <i class="fa fa-long-arrow-right"></i>
         </button></a>
      </div>
   </section>
   <section class="products-carousel pt-5 pb-4" style="background: rgba(250, 249, 249, 1)">
      <!-- <h2 class="section-title text-uppercase text-center mb-4 pb-xl-2 mb-xl-4">Featured <strong>Products</strong></h2> -->
      <div class="container">
         <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">Featured <strong class="titlehighlight">Products</strong></h3>
         <div id="product_carousel" class="position-relative">
            <div class="swiper-container js-swiper-slider"
               data-settings='{
               "autoplay": {
               "delay": 5000
               },
               "slidesPerView": 2,
               "slidesPerGroup": 2,
               "effect": "none",
               "loop": false,
               "pagination": {
               "el": "#product_carousel .products-pagination",
               "type": "bullets",
               "clickable": true
               },
               "navigation": {
               "nextEl": "#product_carousel .products-carousel__next",
               "prevEl": "#product_carousel .products-carousel__prev"
               },
               "breakpoints": {
               "320": {
               "slidesPerView": 2,
               "slidesPerGroup": 2,
               "spaceBetween": 14
               },
               "768": {
               "slidesPerView": 3,
               "slidesPerGroup": 3,
               "spaceBetween": 24
               },
               "992": {
               "slidesPerView": 4,
               "slidesPerGroup": 1,
               "spaceBetween": 30
               }
               }
               }'>
               <div class="swiper-wrapper">
                  <?php $check_product = '';
                  if(!empty($featured_series)){
                     foreach ($featured_series as $feakey => $featured) 
                     {
                        $productcount = $this->common->numberofrecord("*","tbl_product"," WHERE series_id='".$featured['ps_id']."' AND status = '1' AND delete_status='0'");
                        if(!empty($featured['series_image'])){
                           $image = base_url().'uploads/series/'.$featured['series_image'];
                        }else{
                           $image = base_url().'assets/images/no-image.jpg';
                        }
                        if(!empty($productcount) && $productcount > 0){
                           $check_product = '';
                  ?>
                        <div class="swiper-slide product-card ">
                           <div class="pc__img-wrapper">
                              <a href="<?=base_url().'product/'.$featured['slug'];?>"><img loading="lazy" src="<?=$image;?>">
                              <img loading="lazy" src="<?=$image;?>" width="100%" height="100%" alt="Cropped Faux leather Jacket" class="pc__img">
                              </a>
                           </div>
                           <div class="pc__info position-relative">
                              <h6 class="pc__title"><a href="<?=base_url().'product/'.$featured['slug'];?>"><?=(!empty($featured['title'])) ? ucfirst($featured['title']) : ''; ?> <span class="primaryblue">(<?=(!empty($productcount)) ? $productcount : '0'; ?>)</span></a></h6>
                           </div>
                        </div>

                     <?php }else{
                           // $check_product = '1';
                        }
                     }
                  }else{
                     $check_product = '1';
                  }
                  ?>
               </div>
               <!-- /.swiper-wrapper -->
            </div>
            <?php if(!empty($check_product) && $check_product == 1){
               echo '<p class="text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">No featured product available </p>';
            }else{ ?>

               <!-- /.swiper-container js-swiper-slider -->
            <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
               <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_prev_md" />
               </svg>
            </div>
            <!-- /.products-carousel__prev -->
            <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
               <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_next_md" />
               </svg>
            </div>
            <!-- /.products-carousel__next -->
            <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
            <!-- /.products-pagination -->

            <?php } ?>
            
         </div>
         <!-- /.position-relative -->
      </div>
   </section>
   <!-- /.products-carousel container -->
   <div class="mb-4 pb-4 pb-xl-5 mb-xl-5"></div>
   <section class="service-promotion container mb-md-4 pb-md-4 mb-xl-5">
      <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">Why <strong class="titlehighlight">Us?</strong></h3>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 pb-1 ">
               <p class="why_p">At PEC, we blend unmatched experience with relentless innovation, constantly evolving to meet the ever-changing demands of our industry. We design and deliver resistors built for the most challenging applications, driven by a commitment to excellence and a dedication to creating a more sustainable world.</p>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-4 pb-1 mb-md-0">
            <div class="col-md-12 p-3 cardicon">
               <div class="service-promotion__icon mb-4">
                  <img src="<?=base_url();?>assets/images/icon4.png" class="hicon whyicon" alt="PEC- Global Quality Certifications">
               </div>
               <h3 class="service-promotion__title h5 primaryblue why_title">Global Quality Certifications</h3>
               <p class="service-promotion__content text-secondary">Worldwide</p>
            </div>
         </div>
         <!-- /.col-md-4-->
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-4 pb-1 mb-md-0">
            <div class="col-md-12 p-3 cardicon">
               <div class="service-promotion__icon mb-4">
                  <img src="<?=base_url();?>assets/images/icon1.png" class="hicon whyicon" alt="PEC- Design to Delivery">
               </div>
               <h3 class="service-promotion__title h5 primaryblue why_title">Design to Delivery</h3>
               <p class="service-promotion__content text-secondary">Under One Roof</p>
            </div>
         </div>
         <!-- /.col-md-4-->
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-4 pb-1 mb-md-0">
            <div class="col-md-12 p-3 cardicon">
               <div class="service-promotion__icon mb-4">
                  <img src="<?=base_url();?>assets/images/icon2.png" class="hicon whyicon" alt="PEC- Premium Grade Components">
               </div>
               <h3 class="service-promotion__title h5 primaryblue why_title">Premium Grade Components</h3>
               <p class="service-promotion__content text-secondary">Committed to Quality</p>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-4 pb-1 mb-md-0">
            <div class="col-md-12 p-3 cardicon">
               <div class="service-promotion__icon mb-4">
                  <img src="<?=base_url();?>assets/images/why_icon6.png" class="hicon whyicon" alt="PEC- Long Term Partnerships">
               </div>
               <h3 class="service-promotion__title h5 primaryblue why_title">Long Term Partnerships</h3>
               <p class="service-promotion__content text-secondary">Value based Relationships</p>
            </div>
         </div>
         <!-- /.col-md-4 text-center-->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.service-promotion container -->
   
   <section class="blog-carousel container mb-md-4 pb-md-4 mb-xl-5 ">
      <div class="d-flex align-items-center justify-content-between flex-wrap mb-3 pb-xl-2 mb-xl-4" style="display: block!important;">
         <h3 class="section-title text-capitalize"> Events <b class="titlehighlight"> & Newsletters </b></h3>
      </div>
      <div class="position-relative eventinnercontainer">
         <div class="swiper-container js-swiper-slider"
            data-settings='{
            "autoplay": {
            "delay": 5000
            },
            "slidesPerView": 2,
            "slidesPerGroup": 2,
            "effect": "none",
            "loop": true,
            "navigation": {
                 "nextEl": ".swiper-button-next",
                 "prevEl": ".swiper-button-prev"
            },
            "pagination": {
                 "el": ".swiper-pagination",
                 "clickable": true
              },
            "breakpoints": {
            "320": {
                "slidesPerView": 1,
                "slidesPerGroup": 1,
                "spaceBetween": 14
            },
            "768": {
                "slidesPerView": 1,
                "slidesPerGroup": 1,
                "spaceBetween": 24
            },
            "992": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 30
            }
            }
            }'>
            <div class="swiper-wrapper blog-grid row-cols-xl-3">
               <?php
                if(!empty($events)){
                  foreach ($events as $ekey => $e_val) 
                  { ?>
                      <div class="swiper-slide swiper-slide_event blog-grid__item mb-4 ">
                        <div class="blog-grid__item-image eventimgdiv1">
                           <img loading="lazy" class="" src="<?=base_url();?>uploads/events/<?=$e_val['event_image'];?>" style="height: 100%; width: 100%" alt="<?=(!empty($e_val['event_image_alt'])) ? $e_val['event_image_alt'] : ''; ?>">
                        </div>
                        <div class="blog-grid__item-detail eventimgdiv2 eventScrolldiv">
                           <div class="">
                              <h5><?=(!empty($e_val['title'])) ? ucfirst($e_val['title']) : ''; ?></h5>
                           </div>
                           <div class="mb-0 eventtextfs">
                              <?=(!empty($e_val['description'])) ? $e_val['description'] : ''; ?>
                           </div>
                        </div>
                      </div>
                <?php } } ?>
            </div>
            <!-- Add Arrows -->
             <!-- <div class="swiper-button-next event-next"></div>
             <div class="swiper-button-prev event-prev"></div> -->
             <!-- Add Pagination -->
             <br>
             <div class="swiper-pagination"></div>
         </div>
         
      </div>
   </section>
   <section class="collections-grid mb-md-4 pb-md-4 mb-xl-5 mbbottom">
      <div class="container">
         <div class="row">
            <div class="col-lg-7">
               <img src="<?=base_url();?>assets/images/worldmap.png" class="mb-4" alt="World Map">
            </div>
            <div class="col-lg-5 pr-5">
               <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4">Our Global <strong class="titlehighlight">Footprint</strong></h3>
               <p class="fs-16">
                  PEC has designed, manufactured, and delivered resistors to global customers for 50 years. We have a comprehensive range of power resistors for use in Industrial, Automotive, Traction, Power Systems, Medical Equipment, Renewable Energy, Electric Vehicles, Aviation and Military applications. 
               </p>
               <a href="<?=base_url();?>contact-us"><button class="btn btn-outline-primary border-0 fs-base text-capitalize mt-4  btn-45">
               Get in touch
               </button></a>
            </div>
            <!-- /.col-md-6 -->
         </div>
      </div>
   </section>
   <section class="brands-carousel container mb-md-4 pb-md-4 mb-xl-5">
      <h2 class="section-title text-capitalize text-center mb-1 mb-md-2 pb-xl-2 mb-xl-4">Our <strong class="titlehighlight">Clients</strong></h2>
      <div id="client_carousel" class="position-relative">
         <div class="swiper-container js-swiper-slider"
            data-settings='{
            "autoplay": {
            "delay": 5000
            },
            "pagination": {
               "el": "#client_carousel .client-pagination",
               "type": "bullets",
               "clickable": true
            },
            "navigation": {
               "nextEl": "#client_carousel .products-carousel__next",
               "prevEl": "#client_carousel .products-carousel__prev"
               },
            "slidesPerView": 7,
            "slidesPerGroup": 7,
            "effect": "none",
            "loop": true,
            "breakpoints": {
            "320": {
            "slidesPerView": 2,
            "slidesPerGroup": 2,
            "spaceBetween": 14
            },
            "768": {
            "slidesPerView": 1,
            "slidesPerGroup": 1,
            "spaceBetween": 24
            },
            "992": {
            "slidesPerView": 6,
            "slidesPerGroup": 1,
            "spaceBetween": 30,
            "pagination": false
            }
            }
            }'>
            <div class="swiper-wrapper">
               <?php if(!empty($clients)){ 
                  foreach ($clients as $clientkey => $client) { ?>
                     <div class="swiper-slide">
                        <img loading="lazy" src="<?=base_url();?>uploads/client/<?=$client['image']?>" class="imgclientslider" alt="<?=(!empty($client['image_alt'])) ? $client['image_alt'] : ''; ?>">
                     </div>
                     <?php
                  }
               }
               ?>
            </div>
            <p class="disclaimer">
              Logos used for Representation only. Logos belong to respective companies only.
            </p>
            <!-- /.swiper-wrapper -->
         </div>
          <!-- /.swiper-container js-swiper-slider -->
            <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center cllientarrow">
               <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_prev_md" />
               </svg>
            </div>
            <!-- /.products-carousel__prev -->
            <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center cllientarrow">
               <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_next_md" />
               </svg>
            </div>
            <!-- /.products-carousel__next -->
            <!-- <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div> -->
            <!-- /.products-pagination -->
         <!-- /.swiper-container js-swiper-slider -->
      </div>
      <!-- /.position-relative -->
   </section>
   <!-- /.products-carousel container -->
</main>

<script>
   $(document).ready(function()
   {
      $('#searchdiv').hide();
   });
   $(document).on('click', '#product_search_text', function() 
   {
      $('#searchdiv').show();
   });
   $(document).on('submit', '#findproductform', function(e) 
   {
      // $('#searchdiv').hide();
      e.preventDefault();
      var search = $('#product_search_text').val();
      var appfilter = $('.appfilter').val();
      var constrfilter = $('.constrfilter').val();
      var powerfilter = $('.powerfilter').val();
      var clink = '';
      var plink = '';
      var alink = '';
      var flag="0";

      if(appfilter == "" && constrfilter == "" &&  powerfilter == "" && search==""){
         show_error("filter_err","Please select atleast one filter.");
         flag = 1;
      }else{
         remove_error('filter_err');
      }

      if (flag == 1) 
      {
          return false;
      }else{ 
          
         if(appfilter != ''){
            alink = '&application='+appfilter;
         }
         if(constrfilter != ''){
            clink = '&construction='+constrfilter;
         }
         if(powerfilter != ''){
            plink = '&power='+powerfilter;
         }

         var link = "<?=base_url();?>product?search="+search+alink+clink+plink;
         window.location.href = link;
           // $('#send_quotation_form').submit();
      }


   });

   $(document).on('change', '.applicat_select', function() 
   {
      var selected = $(this).val();
      var title = $('option:selected', this).attr('data-name');
      
      if($('.appfilter').val() == ''){
         $('.appfilter').val(selected);
      }else{
         $('.appfilter').val($('.appfilter').val()+','+selected);
      }
      if(selected != ''){
         $( ".applicatdiv" ).append( '<div class="btn btn-outline fs-base m-0 mb-1 app_id_'+$(this).val()+'">'+title+' <a href="javascript:;" class="removeapp" data-rem_id="'+$(this).val()+'"><i class="fa fa-times-circle"></i></a></div>');
      }
      
   });
  
   $(document).on('click', '.removeapp', function() 
   {
      var selected = $(this).val();
      var rem_id = $(this).attr('data-rem_id');
      $( ".app_id_"+rem_id).remove();

      if($('.appfilter').val() == ''){
         // $('.appfilter').val(selected);
      }else{
         $('.appfilter').val($('.appfilter').val()+','+selected);
         var list = $('.appfilter').val();
         updated = removeValue(list, rem_id);
         $('.appfilter').val(updated);
      }

   });

   // function removeValue(list, value) {
   //   list = list.split(',');
   //   list.splice(list.indexOf(value), 1);
   //   // return list.join(',');
   //   return list;
   // }
   function removeValue(list, value) {
     return list.replace(new RegExp(",?" + value + ",?"), function(match) {
         var first_comma = match.charAt(0) === ',',
             second_comma;

         if (first_comma &&
             (second_comma = match.charAt(match.length - 1) === ',')) {
           return ',';
         }
         return '';
       });
   };

   $(document).on('change', '.const_select', function() 
   {
      var selected = $(this).val();
      var title = $('option:selected', this).attr('data-name');
      if(selected != ''){
      $( ".constrdiv" ).append( '<div class="btn btn-outline fs-base m-0 mb-1 const_id_'+$(this).val()+'">'+title+' <a href="javascript:;" class="removeconstr" data-rem_id="'+$(this).val()+'"><i class="fa fa-times-circle"></i></a></div>');
      }
      if($('.constrfilter').val() == ''){
         $('.constrfilter').val(selected);
      }else{
         $('.constrfilter').val($('.constrfilter').val()+','+selected);
      }
   });
  
   $(document).on('click', '.removeconstr', function() 
   {
      var selected = $(this).val();
      var rem_id = $(this).attr('data-rem_id');
      $( ".const_id_"+rem_id).remove();

      if($('.constrfilter').val() == ''){
      }else{
         $('.constrfilter').val($('.constrfilter').val()+','+selected);
         var list = $('.constrfilter').val();
         updated = removeValue(list, rem_id);
         $('.constrfilter').val(updated);
      }
   });


   $(document).on('change', '.power_select', function() 
   {
      var selected = $(this).val();
      var title = $('option:selected', this).attr('data-name');
      if($('.powerfilter').val() == ''){
         $('.powerfilter').val(selected);
      }else{
         $('.powerfilter').val($('.powerfilter').val()+','+selected);
      }      
      if(selected != ''){
         $( ".powerdiv" ).append( '<div class="btn btn-outline fs-base m-0 mb-1 power_id_'+$(this).val()+'">'+title+' <a href="javascript:;" class="removepower" data-rem_id="'+$(this).val()+'"><i class="fa fa-times-circle"></i></a></div>');
      }
   });
  
   $(document).on('click', '.removepower', function() 
   {
      var selected = $(this).val();
      var rem_id = $(this).attr('data-rem_id');
      $( ".power_id_"+rem_id).remove();

      if($('.powerfilter').val() == ''){
      }else{
         $('.powerfilter').val($('.powerfilter').val()+','+selected);
         var list = $('.powerfilter').val();
         updated = removeValue(list, rem_id);
         $('.powerfilter').val(updated);
      }
   });

   $(document).on('click', '.clearall', function() 
   {
      if($('.applicat_select').find('option:selected').val() != ''){
         // $('.applicat_select').refresh();
         $("#applicationreset" ).val('');
         $('.appfilter').val("");
         $('.applicatdiv').html("");
         $("#applicationreset" ).val('');
         $("#product_search_text" ).val('');
      }
      

      //construction
      if($('.const_select').find('option:selected').val() != ''){
         // $('.const_select').refresh();
         $("#constructionreset" ).val('');
         $('.constrfilter').val("");
         $('.constrdiv').html("");
      }

      //power
      if($('.power_select').find('option:selected').val() != ''){
         $('#powerreset').val("");
         $('.powerfilter').val("");
         $('.powerdiv').html("");
      }
   });
</script>
      