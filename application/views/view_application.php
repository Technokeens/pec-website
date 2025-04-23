<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Application",
  "name": "<?=(!empty($application['title'])) ? ucfirst($application['title']) : ''; ?>",
  "description": "<?=(!empty($application['description'])) ? $application['description'] : ''; ?>",
  "sku": "",
  "brand": {
    "@type": "Brand",
    "name": "ABC Resistors"
  },
  "manufacturer": {
    "@type": "Organization",
    "name": "PEC Components-Power & Precision Resistors for Every Industry"
  }
}
</script>

<style>
.banner_data h1 {
    font-size: 30px;
}
</style>
<main>
    <section class="top-banner position-relative full-screen pt-5 pb-3 pb-xl-5 d-flex align-items-center justify-content-left banner-height">
      <?php if(!empty($application['banner_image'])) { ?>
        <img loading="lazy" src="<?=base_url();?>uploads/application_banner/<?=$application['banner_image']?>" alt="<?=(!empty($application['banner_image_alt'])) ? $application['banner_image_alt'] : ''; ?>" class="position-absolute w-100 h-100 left-0 top-0 object-fit-cover">
        <?php }else{ ?>
          <img loading="lazy" src="<?=base_url();?>assets/images/slider/banner1.png" alt="" class="position-absolute w-100 h-100 left-0 top-0 object-fit-cover">
        <?php } ?>
      
       <div class="image-box__overlay"></div>
      <div class="my-3 my-xl-5 py-3 py-xl-5 px-3 px-xl-5 position-relative banner_data">
        <div class="service-promotion__icon mb-4 hidden-xs">
          <?php if(!empty($application['application_icon_white'])) { ?>
            <img src="<?=base_url();?>uploads/application/white/<?=$application['application_icon_white']?>" class="hicon" alt="<?=(!empty($application['application_icon_white_alt'])) ? $application['application_icon_white_alt'] : ''; ?>">
          <?php } ?>
        </div>
        <h1 class="fs-80 fw-semi-bold text-capitalize text-white text-left"><?=(!empty($application['title'])) ? ucfirst($application['title']) : ''; ?></h1>
        <div class="d-flex align-items-left justify-content-left">
          <p class="mbtextlimit mb-0 hidden-xs"><?=(!empty($application['short_description'])) ? $application['short_description'] : ''; ?></p>
        </div>
      </div>
    </section>

    <div class="mb-3 pb-3 mb-md-2 pb-md-4 mb-xl-3 pb-xl-3"></div>
    
    <section class="collections-grid  mb-md-4 pb-md-4 mb-xl-5">
      <div class="container">
        <div class="d-flex justify-content-between mb-2 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="<?=base_url();?>applications" class="menu-link menu-link_us-s text-capitalize fw-medium" >Application</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-capitalize fw-medium primaryblue" ><b><?=(!empty($application['title'])) ? ucfirst($application['title']) : ''; ?></b></a>
          </div><!-- /.breadcrumb -->
        </div>
        <div class="row">
          <div class="col-lg-12">
            <?=(!empty($application['description'])) ? $application['description'] : ''; ?>
            <!-- <p class=" ">
            PEC has resistors for different automotive applications like Blower Motor Speed Control, Radiator Motor step down speed, EMI Suppression in spark plugs and spark plug caps, and current sensing in various car systems like wipers, automatic windows, engine control units, battery management systems & electronic power steering.</p>

            <p class=" fs-14"> In almost all automotive applications the resistor has to be customised to meet the space and functional requirements of the system and PEC has been adept at engineering customised products at affordable prices.</p>

            <p class=" fs-14">Talk to us and we will work with you through the design cycle or provide you with an alternate vendor option to meet your volume requirements or to reduce the risk of your supply chain.
            </p> -->
          </div><!-- /.col-md-6 -->
         
          
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
    
    <!-- <div class="mb-3 pb-3 mb-md-2 pb-md-4 mb-xl-3 pb-xl-3"></div> -->
    
    <section class="service-promotion container mb-md-4 pb-md-4 mb-xl-5 mbbottom">
      <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">Related <strong class="titlehighlight">Products</strong>
      </h3>
        
      <div class="products-grid row row-cols-2 row-cols-md-4" id="products-grid" >
        
        <?php
        if(!empty($application_related_series)){
          foreach ($application_related_series as $key => $value) { 
            if(!empty($value['series_image'])){
              $image = base_url().'uploads/series/'.$value['series_image'];
            }else{
              $image = base_url().'assets/images/no-image.jpg';
            }
        ?>
            <div class="product-card-wrapper">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <a href="<?=base_url().'product/'.$value['slug'];?>"><img loading="lazy" src="<?=$image;?>" alt="<?=(!empty($value['product_name'])) ? '('.ucfirst($value['product_name']).')' : ''; ?>" class="pc__img"></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pc__info position-relative">
                  <h6 class="pc__title"><a href="<?=base_url().'product/'.$value['slug'];?>"><?=(!empty($value['title'])) ? ucfirst($value['title']) : ''; ?> <?=(!empty($value['product_name'])) ? '('.ucfirst($value['product_name']).')' : ''; ?> <?=(!empty($value['product_count'])) ? '<span class="primaryblue">('.$value['product_count'].')</span>' : ''; ?></a></h6>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </section>

    <section class="collections-grid mb-md-4 pb-md-4 mb-xl-5 mbbottom">
      <div class="container">
        <div class="row cutomsolbg">
          <div class="col-lg-12">
              <h3 class="section-title text-capitalize text-left mb-3">Still looking for the <span class="primaryblue"> right product ?</span></h3>
              <p>PEC has consistently led the way in creating customized resistor solutions for our customers both globally and in India. Customization is often essential in critical applications to address specific electrical and physical conditions in the field.</p>

              <p>We are happy to partner with you to develop customized solutions tailored to your specific needs and applications. Please contact us with your details to get started.
              </p>

              <?php $website = $this->common->fetchsingledata('*','tbl_website_setting',' where wid="1"'); ?>
              <a href="<?=base_url();?>contact-us"><button class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45">
                Talk To Sales
              </button></a>
          </div>
        </div>
      </div>
    </section>
  </main>