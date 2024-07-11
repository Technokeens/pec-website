<div class="mb-5 pb-xl-5"></div>
<main style="padding-top: 10%;">
  <div class="mb-2 pb-xl-3"></div>
  <section class="shop-main container product-container d-flex">
    <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
      <form method="GET" action="" id="filterform">
        <div class="aside-header d-flex d-lg-none align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
          <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div><!-- /.aside-header -->

        <div class="pt-4 pt-lg-0"></div>
        <h5 class="filter_title mb-4">Parametric Filters</h5>
        <div id="product_single_details_accordion" class="product-single__details-accordion accordion mb-0">
            <div class="accordion-item">
              <h6 class="accordion-header" id="accordion-heading-11">
                <button class="accordion-button text-capitalize border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1" aria-expanded="true" aria-controls="accordion-collapse-1">
                  Applications <span class="primaryblue"> (<?=(!empty($appFilter['sum'])) ? $appFilter['sum'] : '0'; ?>)</span>
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h6>
              <div id="accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="accordion-heading-11" data-bs-parent="#product_single_details_accordion">
                <div class="multi-select accordion-body px-2 pb-0 filterscroll">
                  <?php
                    if(!empty($appFilter['application'])){
                      foreach ($appFilter['application'] as $key => $value) {
                        $checked = $value['checked'];
                  ?>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input form-check-input_fill" name="application" value="<?=$value['t_id'];?>" id="remember_checkbox_<?=$key;?>" <?=$checked;?> >
                          <label class="form-check-label" for="remember_checkbox_<?=$key;?>">
                           <?=$value['title']?> <span class="primaryblue">(<?=(!empty($value['product_count'])) ? $value['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>




                  <?php

                    if(!empty($applications)){
                      $checked ='';
                      $prodcount='0';
                      
                      foreach ($applications as $key => $value) 
                      { 
                        if(!empty($_GET['application'])){
                          $checked ='';
                          $prodcount='0';
                          
                          $expapplication = explode(',', $_GET['application']);
                            foreach ($expapplication as $apkey => $ap) 
                            {
                              if($ap == $value['t_id']){
                                $checked = 'checked';
                                $prodcount = $this->public_model->productCountFilter('application',$value['t_id'],$_GET);
                              }
                            }
                        }else{
                          $prodcount = $this->public_model->productCountFilter('application',$value['t_id'],$_GET);
                        }
                        
                  ?>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input form-check-input_fill" name="application" value="<?=$value['t_id'];?>" id="remember_checkbox_<?=$key;?>" <?=$checked;?> >
                          <label class="form-check-label" for="remember_checkbox_<?=$key;?>">
                           <?=$value['title']?> <span class="primaryblue">(<?=(!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>
              </div>
              </div>
            </div><!-- /.accordion-item -->

            <div class="accordion-item">
              <h6 class="accordion-header" id="accordion-heading-2">
                <button class="accordion-button collapsed text-capitalize border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2" aria-expanded="false" aria-controls="accordion-collapse-2">
                  Construction
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h6>
              <div id="accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="accordion-heading-2" data-bs-parent="#product_single_details_accordion">
                <div class="multi-select accordion-body px-2 pb-0">
                  <?php
                    if(!empty($constructions)){
                      $cchecked ='';
                      $prodcount='0';
                      foreach ($constructions as $ckey => $cvalue) 
                      { 
                        if(!empty($_GET['construction'])){
                          $cchecked ='';
                          $prodcount='0';
                          $expconstruction = explode(',', $_GET['construction']);
                            foreach ($expconstruction as $conskey => $cons) 
                            {
                              if($cons == $cvalue['c_id']){
                                $cchecked = 'checked';
                                $prodcount = $this->public_model->productCountFilter('construction',$cvalue['c_id'],$_GET);
                              }
                            }
                        }else{
                          $prodcount = $this->public_model->productCountFilter('construction',$cvalue['c_id'],$_GET);
                        }
                  ?>
                        <div class="form-check">
                          <input class="form-check-input form-check-input_fill" type="checkbox" name="construction" value="<?=$cvalue['c_id'];?>" id="construction_checkbox_<?=$ckey;?>" <?=$cchecked;?> >
                          <label class="form-check-label" for="construction_checkbox_<?=$ckey;?>">
                           <?=$cvalue['construction_title']?> <span class="primaryblue">(<?=(!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>
              </div>
              </div>
            </div><!-- /.accordion-item -->

            <div class="accordion-item">
              <h6 class="accordion-header" id="accordion-heading-3">
                <button class="accordion-button collapsed text-capitalize border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3" aria-expanded="false" aria-controls="accordion-collapse-3">
                  Power Rating
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h6>
              <div id="accordion-collapse-3" class="accordion-collapse collapse" aria-labelledby="accordion-heading-3" data-bs-parent="#product_single_details_accordion">
                <div class="multi-select accordion-body px-2 pb-0">
                  <?php
                    if(!empty($power_ratings)){
                      $pchecked ='';
                      $prodcount='0';
                      foreach ($power_ratings as $pkey => $pvalue) 
                      { 
                        if(!empty($_GET['power'])){
                          $pchecked ='';
                          $prodcount='0';
                          $exppower = explode(',', $_GET['power']);
                            foreach ($exppower as $ponskey => $pow) 
                            {
                              if($pow == $pvalue['pr_id']){
                                $pchecked = 'checked';
                                $prodcount = $this->public_model->productCountFilter('power_rating',$pvalue['pr_id'],$_GET);
                              }
                            }
                        }else{
                          $prodcount = $this->public_model->productCountFilter('power_rating',$pvalue['pr_id'],$_GET);
                        }
                  ?>
                        <div class="form-check">
                          <input class="form-check-input form-check-input_fill" type="checkbox" name="power" value="<?=$pvalue['pr_id'];?>" id="pr_checkbox_<?=$pkey;?>" <?=$pchecked;?> >
                          <label class="form-check-label" for="pr_checkbox_<?=$pkey;?>">
                           <?=$pvalue['power_rating'];?>W  <span class="primaryblue">(<?=(!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>
              </div>
              </div>
            </div><!-- /.accordion-item -->
          </div>
        <div class="inline-block text-center">
            <button type="button" class="btn btn-outline fs-base filterbtns btn1grey resetfilter">Reset Filter</button>
            <button type="submit" id="filtersubmitbtn" class="btn btn-outline fs-base btn-outline-primary mr-0 filterbtns btn2grey">Apply</button>
        </div>
      </form>
    </div><!-- /.shop-sidebar -->

    <div class="shop-list flex-grow-1">
      <div class="d-flex justify-content-between mb-4 pb-md-2">
        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
          <a href="#" class="menu-link menu-link_us-s text-capitalize fs-3 fw-large" ><b>All Products Series</b></a>
          <!-- <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
          <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium" >The Shop</a> -->
        </div><!-- /.breadcrumb -->

        <!-- <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1 mbblock">
          <div class="search-field__input_header-wrapper">
            <input type="text" name="search_text" class="search-field__input_header form-control form-control-sm border-light header_search header_search_inp poppins-medium w-100" placeholder="On Page Search">
          </div>
        </div> -->
      </div><!-- /.d-flex justify-content-between -->

      <div class="products-grid row row-cols-2 row-cols-md-4" id="products-grid" >
        <?php
          if(!empty($series)){
            foreach ($series as $skey => $svalue) 
            { 
              $productcount = $this->common->numberofrecord("*","tbl_product"," WHERE series_id='".$svalue['ps_id']."' AND status = '1' AND delete_status='0'");

              if(!empty($svalue['series_image'])){
                $image = base_url().'uploads/series/'.$svalue['series_image'];
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
                          <a href="<?=base_url().'product/'.$svalue['slug'];?>"><img loading="lazy" src="<?=$image;?>" alt="<?=(!empty($svalue['title'])) ? ucfirst($svalue['title']) : ''; ?>" class="pc__img"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pc__info position-relative">
                    <h6 class="pc__title"><a href="<?=base_url().'product/'.$svalue['slug'];?>"><?=(!empty($svalue['title'])) ? ucfirst($svalue['title']) : ''; ?>  <?=(!empty($svalue['product_name'])) ? '('.ucfirst($svalue['product_name']).')' : ''; ?><span class="primaryblue">(<?=(!empty($productcount)) ? $productcount : '0'; ?>)</span></a></h6>
                  </div>
                </div>
              </div>
              <?php
            }
          }else{ ?>
            <p class="text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">No data available </p>
          <?php } ?>
      </div><!-- /.products-grid row -->

      <nav class="shop-pages d-flex justify-content-right mt-3" aria-label="Page navigation" id="pagination">
        <?= !empty($links_pagination) ? $links_pagination : ''; ?>
        <!-- <a href="#" class="btn-link d-inline-flex align-items-center">
          <svg class="" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg>
        </a>
        <ul class="pagination mb-0">
          <li class="page-item"><a class="btn-link px-1 mx-2 btn-link_active" href="#">1</a></li>
          <li class="page-item"><a class="btn-link px-1 mx-2" href="#">2</a></li>
          <li class="page-item"><a class="btn-link px-1 mx-2" href="#">3</a></li>
          <li class="page-item"><a class="btn-link px-1 mx-2" href="#">4</a></li>
        </ul>
        <a href="#" class="btn-link d-inline-flex align-items-center">
          <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg>
        </a> -->
      </nav>
    </div>
  </section><!-- /.shop-main container -->
  <div class="mb-5 pb-xl-5"></div>
  <section class="collections-grid mb-md-4 pb-md-4 mb-xl-5 mbbottom">
    <div class="container">
      <div class="row cutomsolbg">
        <div class="col-lg-12">
            <h3 class="section-title text-capitalize text-left mb-3">Custom Solutions</h3>
            <p>PEC has been at the forefront of developing custom resistors solutions for our global and India customers.  In most critical applications, a degree of customization is required to handle field electrical & physical usage conditions.</p>
            <a href="<?=base_url();?>contact"><button class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45">
              Talk To Sales
            </button></a>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  // $("#pagination > a").each(function() {
   
  //     var g = window.location.href.slice(window.location.href.indexOf('?'));
  //     var href = $(this).attr('href');
  //     $(this).attr('href', href+g);
  // });
  // $(".pageClass").each(function() {
  //   $(this).attr("href", $(this).attr('href') + "?page=<?= $this->uri->segment(2) ?>");
  // });

  // $(".pageClass > a").each(function() {
  //     var g = window.location.href.slice(window.location.href.indexOf('?'));
  //     var href = $(this).attr('href');
  //     $(this).attr('href', href+g);
  // });
  // $(document).on('click','.pageClass',function()
  // {
  //   var gg = "<?php $this->uri->segment(1); ?>";
  //   alert(gg);

  // });
  // document.getElementById('filterform').addEventListener('submit', function(event) {
  //     event.preventDefault(); // Prevent the form from submitting the default way
  //     // Get all checked checkboxes
  //     const checkedBoxes = document.querySelectorAll('input[name="application"]:checked');
  //     const values = Array.from(checkedBoxes).map(checkbox => checkbox.value);

  //     // Create the comma-separated values string
  //     const csvValues = values.join(',');

  //     // Append the values to the form action URL as a query parameter
  //     // const actionUrl = this.action + '?application=' + encodeURIComponent(csvValues);
  //     const actionUrl = this.action + '?application=' + csvValues;

  //     // Redirect to the URL with the query parameter
  //     window.location.href = actionUrl;
  // });

//   var output = jQuery.map($(':checkbox[name=application\\[\\]]:checked'), function (n, i) {
//     return n.value;
// }).join(',');

// alert(output);
  var site_url = "<?=base_url();?>product?search=";
  $('#filterform').on('submit', function(e) { 
      e.preventDefault();
      let array = []; 
      let arrayconstr = [];
      let arraypower = [];
      let apptnurl = '';
      let construrl = '';
      let powerurl = '';
      $("input:checkbox[name=application]:checked").each(function() { 
          array.push($(this).val()); 
      });  
      $("input:checkbox[name=construction]:checked").each(function() { 
          arrayconstr.push($(this).val()); 
      });  
      $("input:checkbox[name=power]:checked").each(function() { 
          arraypower.push($(this).val()); 
      });           
      if(array.length){
            // const actionUrl = site_url + 'product?application=' + array;
            // window.location.href = actionUrl;
          apptnurl = '&application=' + array;
      }
      if(arrayconstr.length){
          construrl = '&construction=' + arrayconstr;
      }
      if(arraypower.length){
        powerurl = '&power=' + arraypower;
      }

      const actionUrl = site_url + apptnurl + construrl + powerurl;
      window.location.href = actionUrl;
  }); 

  
  $(document).on('click', '.resetfilter', function() {
    window.location.href = "<?=base_url();?>"+'product';
  });

</script>