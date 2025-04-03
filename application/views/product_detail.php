<style>
  .namewrap{
/*    white-space: nowrap!important;*/
  width: auto!important;
  }
  .newsletter-popup {
      width: 45.25rem;
      max-width: calc(100% - -7rem);
  }
  .table > :not(caption) > tr > th  {
      padding: 10px 10px 10px 10px;
      background-color: #1e73be!important;
  }
  .table > :not(caption) > tr > td {
    padding: 10px 10px 10px 10px;
  }
  .brands-carousel .swiper-slide {
     margin: unset; 
  }
  .newsletter-popup {
    width: 70.25rem;
    max-width: calc(100% - 1rem);
  }

</style>
<div class="mb-5 pb-xl-5"></div>
  <main style="padding-top: 10%;">
    <div class="mb-2 pb-xl-3"></div>
    <section class="shop-main container">
      <div class="flex-grow-1">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success p-1 green white-text"><?= $this->session->flashdata('success') ?></div>
            <?= $this->session->unset_userdata('success');?>
        <?php }else if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger p-1 red white-text"><?= $this->session->flashdata('error') ?></div>
            <?= $this->session->unset_userdata('error');?>
        <?php } ?>
        <div class="d-flex justify-content-between mb-2 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="<?=base_url();?>product" class="menu-link menu-link_us-s text-capitalize fw-medium" >Products</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="<?=base_url();?>product/<?=$product_data['series_slug']?>" class="menu-link menu-link_us-s text-capitalize fw-medium" ><?=(!empty($product_data['title'])) ? ucfirst($product_data['title']) : ''; ?></a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-capitalize fw-medium primaryblue" ><b><?=(!empty($product_data['product_name'])) ? ucfirst($product_data['product_name']) : ''; ?></b></a>
          </div><!-- /.breadcrumb -->
        </div>
        
        <!-- <div class="brands-carousel container mb-3">
          <div class="position-relative">
            <div class="swiper-container js-swiper-slider"
              data-settings='{
                "slidesPerView": 7,
                "slidesPerGroup": 7,
                "effect": "none",
                "loop": false,
                "breakpoints": {
                  "320": {
                    "slidesPerView": 4,
                    "slidesPerGroup": 2,
                    "spaceBetween": 14
                  },
                  "768": {
                    "slidesPerView": 3,
                    "slidesPerGroup": 4,
                    "spaceBetween": 24
                  },
                  "992": {
                    "slidesPerView": 10,
                    "slidesPerGroup": 1,
                    "spaceBetween": 30,
                    "pagination": false
                  }
                }
              }'>
              <div class="swiper-wrapper">
                <?php
                if(!empty($getproducts)){
                  foreach ($getproducts as $prodkey => $prod) { 
                    $tabactive ='';
                    if($product_data['slug'] == $prod['slug']){
                      $tabactive = 'active';
                    }
                ?>
                    <div class="swiper-slide prod-slider namewrap">
                      <a href="<?=base_url();?>product/<?=$product_data['series_slug']?>/<?=$prod['slug']?>"><h6 class="prodslidertab <?=$tabactive;?>"><?=(!empty($prod['product_name'])) ? ucfirst($prod['product_name']) : ''; ?></h6></a>
                    </div>
                    <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div> -->
        <div class="row mb-4">
          <div class="col-lg-12">
            <?php
              if(!empty($getproducts)){
                foreach ($getproducts as $prodkey => $prod) { 
                  $tabactive ='';
                  if($product_data['slug'] == $prod['slug']){
                    $tabactive = 'active';
                  }
              ?>
                  <div class="series_product_divs" style="">
                    <a href="<?=base_url();?>product/<?=$product_data['series_slug']?>/<?=$prod['slug']?>"><h6 class="prodslidertab <?=$tabactive;?>"><?=(!empty($prod['product_name'])) ? ucfirst($prod['product_name']) : ''; ?></h6></a>
                  </div>
                  <?php
                }
              }
            ?>
          </div>
        </div>

        <?php 
          if(!empty($product_data['series_image']) && file_exists('uploads/series/'.$product_data['series_image']))
          {
            $serieimage = base_url().'uploads/series/'.$product_data['series_image'];
          }else{
            $serieimage = base_url().'assets/images/no-image.jpg';
          }
        ?>
        <?php
          $power_rating_array = array();
          if(!empty($product_data['power_ids'])){
            $explode = explode(',', $product_data['power_ids']);
            rsort($explode);
            foreach ($explode as $prkey => $prvalue) {
                $power = $this->common->fetchsingledata('power_rating', 'tbl_power_rating',' WHERE pr_id="'.$prvalue.'"');
                $power_rating_array[] = $power['power_rating'];
            }
          }
        ?>
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mbbottom marginmb">
            <div class="d-block prodDetailiimage">
              <img src="<?=$serieimage;?>" class="mb-4" alt="<?=(!empty($product_data['series_image_alt'])) ? $product_data['series_image_alt'] : ''; ?>">
              <h3 class="product-single__name"><?=(!empty($product_data['product_name'])) ? $product_data['product_name'] : ''; ?></h3>
              <h3 class="product-single__name"><?=(!empty($product_data['title'])) ? $product_data['title'] : ''; ?></h3>
            </div>

            <div class="d-flex">
              <?php 
                $check_cmpproduct_exist = 'no';
                if(!empty($_SESSION['compare']['cmpproduct'])){ 
                    foreach ($_SESSION['compare']['cmpproduct'] as $cmpproduct) {
                      if ($cmpproduct['product_id'] == $product_data['p_id']) {
                          $check_cmpproduct_exist = 'yes';
                      }
                  }
                }
                if($check_cmpproduct_exist == 'yes'){
                ?>
                <button class="btn btn-outline-planbtn border-0 fs-base text-capitalize btn-45 align-right mt-2 mr-1 mr14 compare_model">Check Compare</button>
                <?php }else{ ?>
                  <button class="btn btn-outline-planbtn border-0 fs-base text-capitalize btn-45 align-right mt-2 mr-1 mr14 compare_btn">Compare</button>
                <?php }?>

                <?php
                  $constructionimplode = '';
                  if(!empty($product_data['construction_id'])){
                    $construction_ids = explode(',', $product_data['construction_id']);
                    if(!empty($construction_ids)){
                      foreach ($construction_ids as $ckey => $cvalue) 
                      {
                        $getconstruction = $this->common->fetchsingledata('construction_title','tbl_construction',' where c_id = "'.$cvalue.'" ');

                          if(!empty($getconstruction['construction_title'])){
                            $constructionimplode .= ucfirst($getconstruction['construction_title']);
                          }
                
                          if(count($construction_ids)-1 !=  $ckey){
                            $constructionimplode .= ', ';
                          }
                      }
                    }
                  }
                 
                ?>

              <form method="POST" action="<?=base_url();?>quote/add_to_quote">
                <input type="hidden" name="product_id" id="product_id" value="<?=(!empty($product_data['p_id'])) ? $product_data['p_id'] : ''; ?>">
                <input type="hidden" name="product_name" id="product_name" value="<?=(!empty($product_data['product_name'])) ? $product_data['product_name'] : ''; ?>">
                <input type="hidden" name="series_id" id="series_id" value="<?=(!empty($product_data['series_id'])) ? $product_data['series_id'] : ''; ?>">
                <input type="hidden" name="series_name" id="series_name" value="<?=(!empty($product_data['title'])) ? $product_data['title'] : ''; ?>">
                <input type="hidden" name="application_id" id="application_id" value="<?=(!empty($product_data['application_id'])) ? $product_data['application_id'] : ''; ?>">
                <input type="hidden" name="redirecturl" id="redirecturl" value="<?=base_url().'product/'.$this->uri->segment(2).'/'.$this->uri->segment(3);?>">
                
                <input type="hidden" id="product_image" name="product_image" value="<?=$serieimage;?>">

                <input type="hidden" id="construction_title" name="construction_title" value="<?=(!empty($constructionimplode)) ? $constructionimplode : ''; ?>">
                <!-- <input type="hidden" id="product_power_rating" name="product_power_rating" value="<?=$product_data['product_power_rating'];?>"> -->

                
                <input type="hidden" id="product_power_rating" name="product_power_rating" value="<?=(!empty($product_data['product_power_rating'])) ? implode(', ', $power_rating_array) : '0.00W'; ?>">
                

                <?php 
                $check_product_exist = 'no';
                if(!empty($_SESSION['quotecart']['product'])){ 
                    foreach ($_SESSION['quotecart']['product'] as $product) {
                      if ($product['product_id'] == $product_data['p_id']) {
                          $check_product_exist = 'yes';
                      }
                  }
                }

                if($check_product_exist == 'yes'){
                ?>
                  <a href="<?=base_url();?>request-quote"><button type="button" class="btn btn-outline-planbtn border-0 fs-base text-capitalize btn-45 mt-2 mr-1">Go to Quote List</button></a>
                <?php }else{ ?>
                  <button type="submit" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-2 mr-1" id="addtoquote">Add to Quote</button>
                <?php } ?>
                <?php
                  if(!empty($product_data['file_folder']))
                  {
                    if(!empty($datasheets)){
                      $arrnames = array();
                      foreach ($datasheets as $dskey => $ds) {
                        $arrnames[] = $ds['pdf_file'];
                      }
                      $implodename = implode(',', $arrnames); ?>
                      <button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-2 mr14 document_model">Download Datasheet</button>

                      <?php }else{ ?>
                        <a href="<?=base_url();?>contact-us" title="Connect to Sales Team"><button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-4" > Connect to Sales Team </button></a>
                      <?php
                    }
                    }else{ ?>
                      <a href="<?=base_url();?>contact-us" title="Connect to Sales Team"><button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-4" > Connect to Sales Team </button></a>
                  <?php } ?>
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 h-md-100 prod-box">
              <h1 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4">Additional Information</h1>
              
              <?php if(!empty($product_data['short_description'])){ ?>
                <!-- <div class="row">
                  <div class="col-lg-6 proddetail_left">
                    <p>Description</p>
                  </div>
                  <div class="col-lg-6 proddetail_right">
                    <p></p>
                  </div>
                </div> -->
              <?php } ?>
              
              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Resistor Construction</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <!-- <p><?=(!empty($product_data['construction_title'])) ? ucfirst($product_data['construction_title']) : ''; ?></p> -->
                  <p>
                  <?php
                  if(!empty($product_data['construction_id'])){
                    $construction_ids = explode(',', $product_data['construction_id']);
                      if(!empty($construction_ids)){
                        foreach ($construction_ids as $ckey => $cvalue) {
                          $getconstruction = $this->common->fetchsingledata('construction_title','tbl_construction',' where c_id = "'.$cvalue.'" ');
                  ?>
                          <?=(!empty($getconstruction['construction_title'])) ? ucfirst($getconstruction['construction_title']) : ''; ?>

                        <?php
                        if(count($construction_ids)-1 !=  $ckey){
                          echo ',';
                        }
                      }
                    }
                  }
                  ?>
                </p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Termination Type</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['termination_type'])) ? $product_data['termination_type'] : ''; ?></p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Power Rating</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <!-- <p><?=(!empty($product_data['product_power_rating'])) ? $product_data['product_power_rating'] : ''; ?></p> -->
                  <p>
                    
                    <?=(!empty($product_data['product_power_rating'])) ? implode(', ', $power_rating_array) : '0.00W'; ?>
                  </p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Min Resistance Value Ohms</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['min_resistance'])) ? $product_data['min_resistance'] : '-'; ?></p>
                  
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Max Resistance Value Ohms</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['max_resistance'])) ? $product_data['max_resistance'] : '-'; ?></p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Resistor Tolerance</p>
                  
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['resistor_tolerance'])) ? $product_data['resistor_tolerance'] : '0.00'; ?></p>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>TCR PPM C</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['tcr_ppm_c'])) ? $product_data['tcr_ppm_c'] : ''; ?></p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Dimensions Body Diameter - Width</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['dimension_width'])) ? number_format($product_data['dimension_width'],2,'.','') : '0.00'; ?>mm</p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 proddetail_left">
                  <p>Dimensions Body Length - Height</p>
                </div>
                <div class="col-lg-6 proddetail_right">
                  <p><?=(!empty($product_data['dimension_height'])) ? number_format($product_data['dimension_height'],2,'.','') : '0.00'; ?>mm</p>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-lg-12 proddetail_left">
                  <?php
                  if(!empty($product_data['file_folder']))
                  {
                    if(!empty($datasheets)){
                      $arrnames = array();
                      foreach ($datasheets as $dskey => $ds) {
                        $arrnames[] = $ds['pdf_file'];
                      }
                      $implodename = implode(',', $arrnames); ?>
                      <button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-4 document_model" >Download Datasheet </button>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div> -->

              <?php
              if(!empty($_SESSION['compare']['cmpproduct'])){
              ?>
              <button class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 align-right mt-4 mr14 compare_model">Compare (<?=(!empty($_SESSION['compare']['cmpproduct'])) ? count($_SESSION['compare']['cmpproduct']) : '0'; ?>)</button>
              <?php } ?>
          </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-lg-12 mt-2">
              <p class="showunderline">
                <b>Applications:</b> 

                <?php
                if(!empty($product_data['application_id'])){
                  $app_ids = explode(',', $product_data['application_id']);
                    if(!empty($app_ids)){
                      foreach ($app_ids as $appkey => $appvalue) {
                        $applications = $this->common->fetchsingledata('title,slug','tbl_application',' where t_id = "'.$appvalue.'" ');
                ?>
                        <a href="<?=base_url();?>view-application/<?=$applications['slug'];?>"><?=ucfirst($applications['title']);?> </a>

                      <?php
                      if(count($app_ids)-1 !=  $appkey){
                        echo ',';
                      }
                    }
                  }
                }
                ?>
              </p>
            </div>
            <?php //if(!empty($product_data['cross_reference'])){ ?>
              <br>
              <br>
              <br>
              <br>
            <div class="col-lg-12 mt-3" style="display:none">
              <div class="accordion" id="construction-filters">
                <div class="accordion-item mb-2 pb-1">
                  <h5 class="accordion-header filtertab_inactive" id="accordion-heading-1">
                    <button class="accordion-button border-0 text-capitalize p-0 fw-bold fs-12" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true" aria-controls="accordion-filter-2">
                      Cross Reference
                      <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                        <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                          <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"/>
                        </g>
                      </svg>
                    </button>
                  </h5>
                  <div id="accordion-filter-2" class="accordion-collapse collapse border-0" aria-labelledby="accordion-heading-1" data-bs-parent="#construction-filters">
                    <div class="multi-select accordion-body px-2 pb-0">
                      <ul class="" style="list-style-type: disclosure-closed;"> <!-- d-flex -->
                        <?php
                          if($product_data['cross_reference']){
                            $cross_reference = explode(',', $product_data['cross_reference']);
                            foreach ($cross_reference as $crkey => $crvalue) { ?>
                              <li class="pr-5"><?=$crvalue;?></li>
                              <?php
                            }
                          }else{
                            echo "No Data Available";
                          }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div><!-- /.accordion-item -->
              </div>
            </div>
            <?php //} ?>
        </div>

        

        <!-- <div class="d-flex justify-content-between">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4">Related <span class="titlehighlight">Product Series</span></h3>
          </div>
        </div>

        <section class="products-carousel pb-4">
          <div class="container pr-0 pl-0">
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
                    
                    <?php 
                        $check_empty = '';
                        if(!empty($product_data['related_series'])){
                          $related_series = explode(',', $product_data['related_series']);
                          foreach ($related_series as $rskey => $rsvalue) {
                            $series_data = $this->common->fetchsingledata('title,slug,series_image','tbl_product_series',' where ps_id = "'.$rsvalue.'" ');
                            $productcount = $this->common->numberofrecord("*","tbl_product"," WHERE series_id='".$rsvalue."' AND status = '1' AND delete_status='0'");
                            if(!empty($series_data['series_image']) && file_exists('uploads/series/'.$series_data['series_image'])){
                              $image = base_url().'uploads/series/'.$series_data['series_image'];
                            }else{
                              $image = base_url().'assets/images/no-image.jpg';
                            }
                          ?>

                            <div class="swiper-slide product-card">
                              <div class="pc__img-wrapper">
                                <a href="<?=base_url();?>product/<?=$series_data['slug'];?>">
                                  <img loading="lazy" src="<?=$image;?>" width="100%" height="100%" alt="Cropped Faux leather Jacket" class="pc__img">
                                </a>
                              </div>

                              <div class="pc__info position-relative">
                                <h6 class="pc__title">
                                  <?php if(!empty($series_data['slug'])){ ?>
                                    <a href="<?=base_url();?>product/<?=$series_data['slug'];?>"><?=(!empty($series_data['title'])) ? ucfirst($series_data['title']) : ''; ?> <span class="primaryblue">(<?=(!empty($productcount)) ? $productcount : '0'; ?>)</span></a>
                                  <?php }else{ ?>
                                    <a href="javascript:;"><?=(!empty($series_data['title'])) ? ucfirst($series_data['title']) : ''; ?> <span class="primaryblue">(<?=(!empty($productcount)) ? $productcount : '0'; ?>)</span></a>
                                  <?php } ?>
                                  
                                </h6>
                              </div>
                            </div>

                            <?php
                          }
                        }else{
                          
                          $series_data = $this->common->fetchdata('ps_id,title,slug,series_image','tbl_product_series',' where ps_id = "'.$product_data['series_id'].'" LIMIT 5');
                          
                          if(!empty($series_data)){
                            foreach ($series_data as $relkey => $rel) 
                            {
                              $productcount = $this->common->numberofrecord("*","tbl_product"," WHERE series_id='".$rel['ps_id']."' AND status = '1' AND delete_status='0'");

                              if(!empty($rel['series_image']) && file_exists('uploads/series/'.$rel['series_image'])){
                                $image = base_url().'uploads/series/'.$rel['series_image'];
                              }else{
                                $image = base_url().'assets/images/no-image.jpg';
                              }
                          ?>
                              <div class="swiper-slide product-card">
                                <div class="pc__img-wrapper">
                                  <a href="<?=base_url();?>product/<?=$rel['slug'];?>">
                                    <img loading="lazy" src="<?=$image;?>" width="100%" height="100%" alt="Cropped Faux leather Jacket" class="pc__img">
                                  </a>
                                </div>

                                <div class="pc__info position-relative">
                                  <h6 class="pc__title"><a href="<?=base_url();?>product/<?=$rel['slug'];?>"><?=(!empty($rel['title'])) ? ucfirst($rel['title']) : ''; ?> <span class="primaryblue">(<?=(!empty($productcount)) ? $productcount : '0'; ?>)</span></a></h6>
                                </div>
                              </div>
                              <?php
                            }
                          }else{
                            $check_empty = 'yes';
                          }

                        }
                      ?>
                    
                  </div>
                </div>

                <?php if(!empty($check_empty) && $check_empty == 'yes'){
                  echo '<p class="text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">No data available </p>';
                }else{ ?>

                  <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
                  </div>
                  <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
                  </div>

                  <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
                <?php } ?>
                
              </div>
          </div>
        </section> -->
        
      </div>
    </section>
  </main>

  <div id="divid">
    <input type="hidden" id="popup_cmp_count" name="popup_cmp_count" value="<?=(!empty($_SESSION['compare']['cmpproduct'])) ? count($_SESSION['compare']['cmpproduct']) : '0'; ?>">
  </div>

  <!-- COMPARE POPUP -->
  <div class="modal fade" id="compareModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog newsletter-popup modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close close_refresh" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row p-4 m-0">
          <h3 class="block__title p-0">Products Comparison</h3>
          
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0 table-responsive">
              <table class="" style="width:100%">
                <!-- <thead></thead> -->
                <tbody>
                  <tr>
                    <th width="33.33%">
                      <div class="newsletter-popup__bg w-100 imgtopspace">
                        <h5>Parameters</h5>
                      </div>
                    </th>
                    <?php 
                      if(!empty($_SESSION['compare']['cmpproduct'])){
                        foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      ?>
                    <td width="16.66%" class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <div class="newsletter-popup__bg cmp_img">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <a href="#" class="remove_cmp_icon" onclick="javascript:deletecompareproduct('<?=$cmp['product_id']?>')">
                            <i class="fa fa-trash delete-quote-icon fs-6" aria-hidden="true"></i>
                          </a>
                        </div>
                        <div class="col-lg-12 cmpimgcenter">
                          <?php
                          if(!empty($cmp['product_image']))
                          {
                            $cmp_image = $cmp['product_image'];
                          }else{
                            $cmp_image = base_url().'assets/images/no-image.jpg';
                          }
                          ?>
                          <img loading="lazy" src="<?=$cmp_image;?>" class="h-100 d-block" alt="">
                        </div>
                      </div>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey fw-normal">Product Name</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p><b><?=(!empty($cmp['product_name'])) ? $cmp['product_name'] : ''; ?></b></p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Resistor Construction</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p class="textgrey"><?=(!empty($cmp['construction_title'])) ? $cmp['construction_title'] : ''; ?></p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Termination Type</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                        $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"');
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p class="textgrey"><?=(!empty($prod_detail['termination_type'])) ? $prod_detail['termination_type'] : ''; ?></p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Power Rating</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                       <p class="textgrey">
                          <?=(!empty($cmp['power_rating'])) ? $cmp['power_rating'] : ''; ?>
                          <!-- <?=(!empty($product_data['product_power_rating'])) ? implode(', ', $power_rating_array) : '0.00W'; ?> -->
                            
                      </p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Min Resistance Value Ohms</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                       <p class="textgrey"><?=(!empty($prod_detail['min_resistance'])) ? $prod_detail['min_resistance'] : '-'; ?></p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Max Resistance Value Ohms</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                       <p class="textgrey"><?=(!empty($prod_detail['max_resistance'])) ? $prod_detail['max_resistance'] : '-'; ?></p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Resistor Tolerance</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p class="textgrey"><?=(!empty($prod_detail['resistor_tolerance'])) ? $prod_detail['resistor_tolerance'] : ''; ?></p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">TCR PPM C</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p class="textgrey"><?=(!empty($prod_detail['tcr_ppm_c'])) ? $prod_detail['tcr_ppm_c'] : ''; ?>KΩ</p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Dimensions Body Diameter - Width</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p class="textgrey"><?=(!empty($prod_detail['dimension_width'])) ? $prod_detail['dimension_width'] : ''; ?>mm</p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th><p class="textgrey">Dimensions Body Length - Height</p></th>
                    <?php 
                    if(!empty($_SESSION['compare']['cmpproduct'])){
                      foreach ($_SESSION['compare']['cmpproduct'] as $cmpkey => $cmp) { 
                      $prod_detail = $this->common->fetchsingledata('*','tbl_product',' where p_id="'.$cmp['product_id'].'"'); 
                    ?>
                    <td class="pdcmp remove_cmp_<?=$cmp['product_id']?>">
                      <p class="textgrey"><?=(!empty($prod_detail['dimension_height'])) ? $prod_detail['dimension_height'] : ''; ?>mm</p>
                    </td>
                    <?php
                      }
                    }
                    ?>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="compareAlertModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog newsletter-popup modal-dialog-centered" style="width:400px">
      <div class="modal-content">
        <button type="button" class="btn-close close_refresh" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row p-4 m-0">
          <h3 class="block__title">Products Comparison</h3>
          <p>Cannot compare product more than four.</p>
          <button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 align-right mt-2 close_refresh" id="addtoquote" style="padding:6px 10px ;" data-bs-dismiss="modal" aria-label="Close">Okay</button>
        </div>
      </div>
    </div>
  </div>

  <!-- COMPARE POPUP -->
  <div class="modal fade" id="documentModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog newsletter-popup modal-dialog-centered docmodel">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row p-4 m-0">
          <h3 class="block__title mb-3">Download Documents</h3>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0 table-responsive">
              <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Download Link</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(!empty($datasheets)){
                    $i=1;
                    foreach ($datasheets as $key => $value) { 
                  ?>
                      <tr>
                        <td>Document <?=$i;?></td>
                        <td><?=(!empty($value['pdf_detail'])) ? $value['pdf_detail'] : '-'; ?></td>
                        <td><?=(!empty($value['pdf_file'])) ? $value['pdf_file'] : ''; ?> </td>
                        <td><?=(!empty($value['pdf_file'])) ? '<a class="primaryblue" href="'.base_url().'uploads/series_pdf/'.$value['folder'].'/'.$value['pdf_file'].'" download title="'.$value['pdf_file'].'"> <i class="fa fa-download"></i></a>' : ''; ?> </td>
                      </tr>
                      <?php $i++;
                    }
                  }
                  ?>
                  
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <script>

    var site_url = "<?=base_url();?>";
    $(document).on('click', '.compare_btn', function() {
      // $("#compareModel").modal("show");
      var countamp = "<?=(!empty($_SESSION['compare']['cmpproduct'])) ? count($_SESSION['compare']['cmpproduct']) : '0'; ?>";
     
      if(countamp >= 4){
        // alert("Cannot compare product more than four.");
        $("#compareAlertModel").modal("show");
      }else{
        var product_name = $('#product_name').val();
        var product_id = $('#product_id').val();
        var product_image = $('#product_image').val();
        var construction_title = $('#construction_title').val();
        var power_rating = $('#product_power_rating').val();
        $.ajax({
          url: site_url + 'quote/compare', 
          type: "POST",
          dataType: "html",
          data: {product_id:product_id,product_image:product_image,product_name:product_name,construction_title:construction_title,power_rating:power_rating},
          success: function(data)  
          { 
             window.location.reload();
          }
        });
      }
    });
    $(document).on('click', '.compare_model', function() {
      $("#compareModel").modal("show");
      // var product_id = $('#product_id').val();
      // var product_image = $('#product_image').val();
      // var product_name = $('#product_name').val();
      // $.ajax({
      //   url: site_url + 'quote/compare', 
      //   type: "POST",
      //   dataType: "html",
      //   data: {product_id:product_id,product_image:product_image,product_name:product_name,redirecturl:redirecturl;},
      //   success: function(data)  
      //   { 
      //     var obj = jQuery.parseJSON(data)      ;
      //     obj.status == "Success";
      //   }
      // });
    });

    function deletecompareproduct(product_id) {
      var answer = confirm("Are you sure you want to remove this product from list ?");
      // var countamp = "<?=(!empty($_SESSION['compare']['cmpproduct'])) ? count($_SESSION['compare']['cmpproduct']) : '0'; ?>";
      var countamp = $('#popup_cmp_count').val();
      if (answer) {
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('quote/remove_compared_product');?>",
              data: {
                  product_id: product_id,
              },
              success: function(response) {
                  $(".remove_cmp_" + product_id).remove(".remove_cmp_" + product_id);
                  $("#divid").load(" #divid");
                  if(countamp == '1'){
                    window.location.reload();
                  }
                  
              }
          });
      }
  }

  $(document).on('click', '.close_refresh', function() {
    window.location.reload();
  });
  $(document).on('click', '.document_model', function() {
    $("#documentModel").modal("show");
  });
  </script>