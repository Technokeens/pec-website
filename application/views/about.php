<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "About Us",
  "url": "https://peccomponents.com/about-us",
  "description": "Since 1972, PEC has been crafting innovative, certified resistors with unmatched quality and reliability for industries worldwide."
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
  background-color:  rgb(0 0 0 / 60%); /* Adjust the color and opacity as needed */
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
              <img loading="lazy" src="<?=base_url();?>assets/images/slider/about_slider.png" width="1903" height="896" alt="Pattern" class="slideshow-bg__img object-fit-cover" style="object-position: 80% center;">
            </div>
            <div class="slideshow-text container text-center  position-absolute start-50 top-50 translate-middle">
              <h1 class="text-capitalize text-center text-white fw-bold mb-0 animate animate_fade animate_btt animate_delay-4 fs-30 textmb mbbottom mb-4 pb-2 ">To be a trusted partner in our industry, leveraging decades of experience and deep expertise, driven by a passion for innovation and growth.</h1>
              <!-- <p class="sliderfs mb-4 pb-2 text-center text-white animate animate_fade animate_btt animate_delay-5 hidden-xs abtsliderp">PEC boasts over 50 years of unique insight into the global resistor markets, enriched by extensive collaboration with worldwide circuit designers and a history of manufacturing and supplying resistors to an international clientele.</p> -->
              <a href ="<?=base_url();?>product"><button class="btn btn-outline-primary border-0 fs-base text-capitalize animate animate_fade animate_btt animate_delay-7 btn-45">
                  Explore Products <i class="fa fa-long-arrow-right"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="slideshow-pagination position-left-center type2"></div>
      <a href="#section-grid-banner" class="slideshow-scroll d-none position-absolute end-0 bottom-3 text_dash text-uppercase fw-medium">Scroll</a>
    </section><!-- /.slideshow -->

    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <div class="pb-1"></div>

    <!-- Shop by collection -->
    <section class="collections-grid mbcenter mb-md-4 pb-md-4 mb-xl-5 pb-xl-5">
      <div class="container ">
        <div class="row ">
          <div class="col-lg-6 mbbottom pr-5 mb-right0 aboutcontent">
              <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 mbbottom">About <strong class="titlehighlight">Us</strong></h3>
              <p>
                Backed by over 50 years of expertise in global resistor markets, PEC has earned a strong reputation through close collaboration with circuit designers worldwide and a long-standing history of manufacturing and supplying resistors to clients across the globe. 
              </p>
              <p>With a strong foundation and a clear vision for the future, we remain focused on delivering innovative solutions to address the evolving challenges faced by the industry.</p>
          </div><!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6 block1box mbcenter p-4">
                <img src="<?=base_url();?>assets/images/ab3.png" class="abicon mb-4" alt="50+ Years Of Experience">
                <h2 class="primaryblue">50<span class="black">+</span></h2>
                <p class="mb-0"><b>Years of Experience</b></p>
              </div>
              <div class="col-lg-6 block2box mbcenter p-4">
                <img src="<?=base_url();?>assets/images/ab5.png" class="abicon mb-4" alt="1 Billion Plus Resistors Sold">
                <h2 class="primaryblue">1Bln<span class="black">+</span></h2>
                <p class="mb-0"><b>Resistors Sold</b></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 block3box mbcenter p-4">
                <img src="<?=base_url();?>assets/images/ab2.png" class="abicon mb-4" alt="100 Million Annual Capacity">
                <h2 class="primaryblue">100Mln <span class="black"></span></h2>
                <p class="mb-0"><b>Annual Capacity</b></p>
              </div>
              <div class="col-lg-6 block4box mbcenter p-4">
                <img src="<?=base_url();?>assets/images/ab1.png" class="abicon mb-4" alt="1000 Plus Unique Designs">
                <h2 class="primaryblue">1000<span class="black">+</span></h2>
                <p class="mb-0"><b>Unique Designs</b></p>
              </div>
            </div>
          </div>
          
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.collections-grid collections-grid_masonry -->

    <section class="service-promotion container-fluid mb-md-4 pb-md-4 mb-xl-5 greybg">


      <div class="container pt-5 pb-5">
        <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">PEC <strong class="titlehighlight">Mission</strong></h3>
        <div class="row pt-5 pb-5">
          <div class="col-md-1 mb-3 text-center">
            <img src="<?=base_url();?>assets/images/comma1.png" style="height: 25px;">
          </div>
          <div class="col-md-10 mb-3 text-center pt-3 pb-3">
            <p class="quotetext">At PEC, we are dedicated to maintaining the highest standards of quality and reliability in our products. Our mission is to provide our clients with unparalleled design and manufacturing solutions, backed by decades of expertise and a relentless pursuit of excellence.</p>
          </div>
          <div class="col-md-1 mb-3 text-center">
            <img src="<?=base_url();?>assets/images/comma2.png" style="height: 25px;">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="col-md-12 p-3 cardicon-abt">
              <div class="service-promotion__icon mb-4">
                 <img src="<?=base_url();?>assets/images/icon/abt_icon2.png" class="hicon hticon" alt="PEC History">
              </div>
              <h3 class="service-promotion__title primaryblue">History</h3>
              <p class="service-promotion__content text-secondary">Founded in 1972 by the visionary Mr. R. Venkatraman, Precision Electronics Components Manufacturing Co. (PEC) has been a leader in innovation and excellence within the electronics components industry. As a pioneer of the #MakeInIndia initiative, Mr. Venkatraman established PEC to deliver high-quality electronic components and drive industrial growth in India. Today, under next-generation leadership, PEC has evolved into a cutting-edge organization, offering advanced solutions across sectors like defense, renewable energy, transport, and automotive industries.</p>
            </div>
          </div>

          <!-- <div class="col-md-6 mb-3">
            <div class="col-md-12 p-3 cardicon-abt">
              <div class="service-promotion__icon mb-4">
                <img src="<?=base_url();?>assets/images/icon/abt_icon5.png" class="hicon hticon">
              </div>
              <h3 class="service-promotion__title primaryblue">Accreditations</h3>
              <p class="service-promotion__content text-secondary">PEC is certified to ISO 9001-2015 and ISO 14001-2015 and can support all your quality requirements now and into the future. Talk to us about your requirements and we will be there to support you through your development, qualification and production phases. PEC is today the largest manufacturer and exporter of Power Resistors in India, supporting customers across Industrial, Automotive, Traction and Telecom sectors.</p>
            </div>
          </div> -->

          <div class="col-md-6 mb-3">
            <div class="col-md-12 p-3 cardicon-abt">
              <div class="service-promotion__icon mb-4">
                <img src="<?=base_url();?>assets/images/icon/abt_icon6.png" class="hicon hticon" alt="Facilities Of PEC">
              </div>
              <h3 class="service-promotion__title primaryblue">Facilities</h3>
              <p class="service-promotion__content text-secondary">PEC, certified to ISO 9001:2015 and ISO 14001:2015, UL508 & UL499 is India’s largest manufacturer and exporter of Power Resistors, serving the Industrial, Automotive, Traction, Renewable Energy, Transmission & Distribution and Telecom sectors. Our state-of-the-art manufacturing facilities in Hyderabad feature advanced technology, including a clean room, and an extensive built space staffed by skilled professionals. We are committed to supporting your quality requirements through every phase of development, qualification, production & logistics.</p>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="col-md-12 p-3 cardicon-abt">
              <div class="service-promotion__icon mb-4">
                 <img src="<?=base_url();?>assets/images/icon/abt_icon3.png" class="hicon hticon" alt="PEC Research & Innovation">
              </div>
              <h3 class="service-promotion__title primaryblue">Research  and Innovation</h3>
              <p class="service-promotion__content text-secondary">With over 50 years of excellence, PEC has established itself as a leader in specialized power resistor design and manufacturing. Our internal R&D team drives innovation, constantly developing new products for emerging industries. We support the growing renewable power sector, electric vehicles, charging infrastructure, power-efficient drives, and global smart metering networks. We are also a global leader in high-voltage impulse withstanding resistors for low power applications, ensuring we remain at the forefront of the electronics components industry.</p>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="col-md-12 p-3 cardicon-abt">
              <div class="service-promotion__icon mb-4">
                <img src="<?=base_url();?>assets/images/icon/abt_icon1.png" class="hicon hticon" alt="Global Presence Of PEC">
              </div>
              <h3 class="service-promotion__title primaryblue">Global Presence</h3>
              <p class="service-promotion__content text-secondary">PEC built a strong brand and rock-solid reputation for high-quality resistors by serving quality-conscious industries in India and abroad throughout the 1970s, 80s and 90’s. Under the leadership of the next generation, driven by innovation and expertise, PEC continues to expand its presence in both domestic and global markets. Today, our dedicated Europe desk in Germany handles major inquiries from Europe, while our regional offices in India cater to the needs of the domestic market.</p>
            </div>
          </div>
          
        </div>
      </div>


      <div class="container pt-5 pb-5">
        <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">Our  <strong class="titlehighlight">Certifications</strong></h3>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="col-md-12">
              <div class="service-promotion__icon">
                 <img src="<?=base_url();?>assets/images/certificate1.png" height="100%" width="100%">
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="col-md-12 ">
              <div class="service-promotion__icon">
                <img src="<?=base_url();?>assets/images/certificate2.png" height="100%" width="100%">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container pt-5">
        <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 mbbottom">Our   <strong class="titlehighlight">Leadership</strong></h3>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 pb-1 ">
               <p class="why_p">With extensive expertise in running a global component business, we lead a strong team of 400+ associates in production, engineering, R & D, Sales & Marketing.</p>
         </div>
          <!-- "pagination": {
            "el": "#product_carousel .products-pagination",
            "type": "bullets",
            "clickable": true
          }, -->
          <!-- <div id="product_carousel" class="position-relative team_slider_div"> -->
            <!-- <div class="swiper-container js-swiper-slider"
              data-settings='{
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "effect": "none",
                "loop": false,
                "navigation": {
                  "nextEl": "#product_carousel .products-carousel__next",
                  "prevEl": "#product_carousel .products-carousel__prev"
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 1,
                    "slidesPerGroup": 1,
                    "spaceBetween": 14
                  },
                  "768": {
                    "slidesPerView": 3,
                    "slidesPerGroup": 3,
                    "spaceBetween": 24
                  },
                  "992": {
                    "slidesPerView": 2,
                    "slidesPerGroup": 1,
                    "spaceBetween": 30
                  }
                }
              }'>
              <div class="swiper-wrapper">
                <div class="swiper-slide product-card">
                  <div class="pc__img-wrapper team_img-wrapper">
                    <a href="javascript:;">
                      <img loading="lazy" src="<?=base_url();?>assets/images/rajiv_profile.jpg" width="100%" height="100%" alt="Rajiv Venkatraman- Director Of PEC" class="pc__img teamimg">
                    </a>
                  </div>

                  <div class="pc__info position-relative text-center">
                    <h5>Rajiv Venkatraman</h5>
                    <h6 class="pc__title"><a href="javascript:;">Managing Director</a></h6>
                    <a href="https://www.linkedin.com/in/rajiv-v-07577b5/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true" style="color:#1e73be"></i></a>
                  </div>
                </div>

                <div class="swiper-slide product-card">
                  <div class="pc__img-wrapper team_img-wrapper">
                    <a href="javascript:;">
                      <img loading="lazy" src="<?=base_url();?>assets/images/team_img2.jpg" width="100%" height="100%" alt="V Chandrashekhar - Vice President Of PEC" class="pc__img teamimg">
                    </a>
                  </div>

                  <div class="pc__info position-relative text-center">
                    <h5>V. Chandrasekhar</h5>
                    <h6 class="pc__title"><a href="javascript:;">Vice President</a></h6>
                    <a href="javascript:;">
                      <i class="fa fa-linkedin" aria-hidden="true" style="color:#1e73be"></i>
                    </a>
                  </div>
                </div>

                <div class="swiper-slide product-card">
                  <div class="pc__img-wrapper team_img-wrapper">
                    <a href="javascript:;">
                      <img loading="lazy" src="<?=base_url();?>assets/images/team_img.png" width="100%" height="100%"  alt="Cropped Faux leather Jacket" class="pc__img">
                    </a>
                  </div>

                  <div class="pc__info position-relative text-center">
                    <h5>Full Name</h5>
                    <h6 class="pc__title"><a href="#">Designation</a></h6>
                  </div>
                </div>

                <div class="swiper-slide product-card">
                  <div class="pc__img-wrapper team_img-wrapper">
                    <a href="javascript:;">
                      <img loading="lazy" src="<?=base_url();?>assets/images/team_img.png" width="100%" height="100%"  alt="Cropped Faux leather Jacket" class="pc__img">
                    </a>
                  </div>

                  <div class="pc__info position-relative text-center">
                    <h5>Full Name</h5>
                    <h6 class="pc__title"><a href="#">Designation</a></h6>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
              <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
            </div> --><!-- /.products-carousel__prev -->
            <!-- <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
              <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
            </div> --><!-- /.products-carousel__next -->
            <!-- <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div> -->
            <!-- /.products-pagination -->
          <!-- </div> -->
        </div>
      </div>
    </section>

  </main>