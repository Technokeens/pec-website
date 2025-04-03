
<?php
  $filtera1 = "";
  $filtersearch = "?search=";
  $filterc2 = "";
  $filterp3 = "";
  $product_filter_url="";
  $filtersearch_cr="";
  if(!empty($_GET['application'])){
     $filtera1 = '&application='.$_GET['application'];
  }
  if(!empty($_GET['construction'])){
     $filterc2 = '&construction='.$_GET['construction'];
  }
  if(!empty($_GET['power'])){
     $filterp3 = '&power='.$_GET['power'];
  }
  if(!empty($_GET['search_cr'])){
     $filtersearch_cr = '&search_cr='.$_GET['search_cr'];
  }
  if(!empty($_GET['search'])){
     $filtersearch = '?search='.$_GET['search'];
  }

  $product_filter_url = $filtersearch.$filtersearch_cr.$filtera1.$filterc2.$filterp3;
?>
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
        <h5 class="filter_title mb-4">Cross Reference Search</h5>

        <div class="form-floating my-2 mb-4 d-flex mbcrossDiv">
          <input type="text" class="form-control cross_search_btn" name="search_cr" id="search_cr" placeholder="Enter Part Number " autocomplete="off" value="<?=(!empty($_GET['search_cr'])) ? $_GET['search_cr'] : ''; ?>">
          <!-- minlength="3" -->
          <button type="button" class="btn btn-outline-planbtn border-0 fs-base btn-45 align-right cross_model cross_info_icon" title="Cross Reference Search Guidelines">i</button>
        </div>

        <!-- <div class="form-floating my-2 mb-4 d-flex">
          <input type="text" class="form-control" name="search_cr" id="search_cr" placeholder="Enter Product Type" autocomplete="off" minlength="3" value="<?=(!empty($_GET['search_cr'])) ? $_GET['search_cr'] : ''; ?>" style="border-radius: 16px;">
          <button type="button" class="btn  border-0 fs-base align-right cross_model " title="Cross Reference Search" style="padding: 0px 10px;background: #1e73be;height: 24px;line-height: 2px;color: white;float: left;margin: 10px 0px 0px 10px;">i</button>
        </div> -->
        <h5 class="filter_title mb-4">Parametric Filters</h5>
        <div id="product_single_details_accordion" class="product-single__details-accordion accordion mb-0">
            <div class="accordion-item">
              <h6 class="accordion-header" id="accordion-heading-11">
                <button class="accordion-button text-capitalize border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1" aria-expanded="true" aria-controls="accordion-collapse-1">
                  Applications <span class="primaryblue" id="application_count_onchange" style="padding-left: 5px;"> <?=(!empty($appFilter['cnnt'])) ? '('.$appFilter['cnnt'].')' : ''; ?></span>
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h6>
              <div id="accordion-collapse-1" class="accordion-collapse collapse <?=($_GET && empty($_GET['application'])) ? '' : 'show'; ?>" aria-labelledby="accordion-heading-11" data-bs-parent="#product_single_details_accordion">
                <div class="multi-select accordion-body px-2 pb-0 filterscroll">
                  <?php
                    if(!empty($appFilter['application'])){
                      foreach ($appFilter['application'] as $key => $value) {
                        $checked = $value['checked'];
                  ?>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input form-check-input_fill applicat_checkbox" name="application" value="<?=$value['t_id'];?>" id="remember_checkbox_<?=$key;?>" <?=$checked;?> >
                          <label class="form-check-label" for="remember_checkbox_<?=$key;?>">
                           <?=$value['title']?> <span class="primaryblue">(<?=(!empty($value['product_count'])) ? $value['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>
                  <?php

                    // if(!empty($applications)){
                    //   $checked ='';
                    //   $prodcount='0';
                      
                    //   foreach ($applications as $key => $value) 
                    //   { 
                    //     if(!empty($_GET['application'])){
                    //       $checked ='';
                    //       $prodcount='0';
                          
                    //       $expapplication = explode(',', $_GET['application']);
                    //         foreach ($expapplication as $apkey => $ap) 
                    //         {
                    //           if($ap == $value['t_id']){
                    //             $checked = 'checked';
                    //             $prodcount = $this->public_model->productCountFilter('application',$value['t_id'],$_GET);
                    //           }
                    //         }
                    //     }else{
                    //       $prodcount = $this->public_model->productCountFilter('application',$value['t_id'],$_GET);
                    //     }
                        
                  ?>
                        <!-- <div class="form-check">
                          <input type="checkbox" class="form-check-input form-check-input_fill" name="application" value="<?=$value['t_id'];?>" id="remember_checkbox_<?=$key;?>" <?=$checked;?> >
                          <label class="form-check-label" for="remember_checkbox_<?=$key;?>">
                           <?=$value['title']?> <span class="primaryblue">(<?=(!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0';?>)</span>
                          </label>
                        </div> -->
                        <?php
                    //   }
                    // }
                  ?>
              </div>
              </div>
            </div><!-- /.accordion-item -->

            <div class="accordion-item">
              <h6 class="accordion-header" id="accordion-heading-2">
                <button class="accordion-button collapsed text-capitalize border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2" aria-expanded="false" aria-controls="accordion-collapse-2">
                  Construction  <span class="primaryblue" id="constr_count_onchange" style="padding-left: 5px;"> <?=(!empty($constructionFilter['cnnt'])) ? '('.$constructionFilter['cnnt'].')' : ''; ?></span>
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h6>
              <div id="accordion-collapse-2" class="accordion-collapse collapse <?=(!empty($_GET['construction'])) ? 'show' : ''; ?>" aria-labelledby="accordion-heading-2" data-bs-parent="#product_single_details_accordion">
                <div class="multi-select accordion-body px-2 pb-0 filterscroll">
                  
                  <?php
                    if(!empty($constructionFilter['constructions'])){
                      foreach ($constructionFilter['constructions'] as $ckey => $cvalue) {
                        $cchecked = $cvalue['cchecked'];
                  ?>
                        <div class="form-check">
                          <input class="form-check-input form-check-input_fill constr_checkbox" type="checkbox" name="construction" value="<?=$cvalue['c_id'];?>" id="construction_checkbox_<?=$ckey;?>" <?=$cchecked;?> >
                          <label class="form-check-label" for="construction_checkbox_<?=$ckey;?>">
                           <?=$cvalue['construction_title']?> <span class="primaryblue">(<?=(!empty($cvalue['product_count'])) ? $cvalue['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>


                  <?php
                    // if(!empty($constructions)){
                    //   $cchecked ='';
                    //   $prodcount='0';
                    //   foreach ($constructions as $ckey => $cvalue) 
                    //   { 
                    //     if(!empty($_GET['construction'])){
                    //       $cchecked ='';
                    //       $prodcount='0';
                    //       $expconstruction = explode(',', $_GET['construction']);
                    //         foreach ($expconstruction as $conskey => $cons) 
                    //         {
                    //           if($cons == $cvalue['c_id']){
                    //             $cchecked = 'checked';
                    //             $prodcount = $this->public_model->productCountFilter('construction',$cvalue['c_id'],$_GET);
                    //           }
                    //         }
                    //     }else{
                    //       $prodcount = $this->public_model->productCountFilter('construction',$cvalue['c_id'],$_GET);
                    //     }
                  ?>
                        <!-- <div class="form-check">
                          <input class="form-check-input form-check-input_fill" type="checkbox" name="construction" value="<?=$cvalue['c_id'];?>" id="construction_checkbox_<?=$ckey;?>" <?=$cchecked;?> >
                          <label class="form-check-label" for="construction_checkbox_<?=$ckey;?>">
                           <?=$cvalue['construction_title']?> <span class="primaryblue">(<?=(!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0';?>)</span>
                          </label>
                        </div> -->
                        <?php
                    //   }
                    // }
                  ?>
              </div>
              </div>
            </div><!-- /.accordion-item -->

            <div class="accordion-item">
              <h6 class="accordion-header" id="accordion-heading-3">
                <button class="accordion-button collapsed text-capitalize border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3" aria-expanded="false" aria-controls="accordion-collapse-3">
                  Power Rating <span class="primaryblue" id="power_count_onchange" style="padding-left: 5px;"> <?=(!empty($powerFilter['cnnt'])) ? '('.$powerFilter['cnnt'].')' : ''; ?></span>
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h6>
              <div id="accordion-collapse-3" class="accordion-collapse collapse <?=(!empty($_GET['power'])) ? 'show' : ''; ?>" aria-labelledby="accordion-heading-3" data-bs-parent="#product_single_details_accordion">
                <div class="multi-select accordion-body px-2 pb-0 filterscroll">
                  <?php
                    if(!empty($powerFilter['powerratings'])){
                      foreach ($powerFilter['powerratings'] as $pkey => $pvalue) {
                        $pchecked = $pvalue['pchecked'];
                  ?>
                        <div class="form-check">
                          <input class="form-check-input form-check-input_fill power_checkbox" type="checkbox" name="power" value="<?=$pvalue['pr_id'];?>" id="pr_checkbox_<?=$pkey;?>" <?=$pchecked;?> >
                          <label class="form-check-label" for="pr_checkbox_<?=$pkey;?>">
                           <?=$pvalue['power_rating'];?> <span class="primaryblue">(<?=(!empty($pvalue['product_count'])) ? $pvalue['product_count'] : '0';?>)</span>
                          </label>
                        </div>
                        <?php
                      }
                    }
                  ?>

                  <?php
                    // if(!empty($power_ratings)){
                    //   $pchecked ='';
                    //   $prodcount='0';
                    //   foreach ($power_ratings as $pkey => $pvalue) 
                    //   { 
                    //     if(!empty($_GET['power'])){
                    //       $pchecked ='';
                    //       $prodcount='0';
                    //       $exppower = explode(',', $_GET['power']);
                    //         foreach ($exppower as $ponskey => $pow) 
                    //         {
                    //           if($pow == $pvalue['pr_id']){
                    //             $pchecked = 'checked';
                    //             $prodcount = $this->public_model->productCountFilter('power_rating',$pvalue['pr_id'],$_GET);
                    //           }
                    //         }
                    //     }else{
                    //       $prodcount = $this->public_model->productCountFilter('power_rating',$pvalue['pr_id'],$_GET);
                    //     }
                  ?>
                        <!-- <div class="form-check">
                          <input class="form-check-input form-check-input_fill" type="checkbox" name="power" value="<?=$pvalue['pr_id'];?>" id="pr_checkbox_<?=$pkey;?>" <?=$pchecked;?> >
                          <label class="form-check-label" for="pr_checkbox_<?=$pkey;?>">
                           <?=$pvalue['power_rating'];?>W  <span class="primaryblue">(<?=(!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0';?>)</span>
                          </label>
                        </div> -->
                        <?php
                    //   }
                    // }
                  ?>
              </div>
              </div>
            </div><!-- /.accordion-item -->
          </div>
        <div class="inline-block text-center">
            <button type="button" class="btn btn-outline fs-base filterbtns btn1grey resetfilter resetbbtn">Reset Filter</button>
            <button type="submit" id="filtersubmitbtn" class="btn btn-outline fs-base btn-outline-primary mr-0 filterbtns btn2grey applybbtn">Apply</button>
        </div>
      </form>
    </div><!-- /.shop-sidebar -->

    <div class="shop-list flex-grow-1">
      <?php if ($this->session->flashdata('success')) { ?>
          <div class="alert alert-success p-1 green white-text"><?= $this->session->flashdata('success') ?></div>
          <?= $this->session->unset_userdata('success');?>
      <?php }else if($this->session->flashdata('error')){ ?>
          <div class="alert alert-danger p-1 red white-text"><?= $this->session->flashdata('error') ?></div>
          <?= $this->session->unset_userdata('error');?>
      <?php } ?>
      <div class="d-flex justify-content-between mb-4 pb-md-2">
        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
          <a href="#" class="menu-link menu-link_us-s text-capitalize fs-3 fw-large" ><b>All Products Series</b></a>
          <!-- <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
          <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium" >The Shop</a> -->
        </div><!-- /.breadcrumb -->


        <div class="shop-acs align-items-center justify-content-between justify-content-md-end flex-grow-1">
            <div class="shop-filter align-items-center order-0 order-md-3 d-lg-none">
              <button class="d-flex align-items-center ps-0 js-open-aside btn-outline-planbtn order-0 fs-base text-capitalize btn-45 filterbuttonmb" data-aside="shopFilter">
                <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_filter" /></svg>
              <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
              </button>
            </div><!-- /.col-size d-flex align-items-center ms-auto ms-md-3 -->
          </div><!-- /.shop-acs -->

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
              // $productcount = $this->common->numberofrecord("*","tbl_product"," WHERE series_id='".$svalue['ps_id']."' AND status = '1' AND delete_status='0'");

              if(!empty($svalue['series_image']) && file_exists('uploads/series/'.$svalue['series_image'])){
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
                          <a href="<?=base_url().'product/'.$svalue['slug'];?><?=$product_filter_url;?>"><img loading="lazy" src="<?=$image;?>" alt="<?=(!empty($svalue['series_image_alt'])) ? ucfirst($svalue['series_image_alt']) : ''; ?>" class="pc__img"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pc__info position-relative">
                    <h6 class="pc__title"><a href="<?=base_url().'product/'.$svalue['slug'];?><?=$product_filter_url;?>"><?=(!empty($svalue['title'])) ? ucfirst($svalue['title']) : ''; ?>  <?=(!empty($svalue['product_name'])) ? '('.ucfirst($svalue['product_name']).')' : ''; ?><span class="primaryblue">(<?=(!empty($svalue['product_count'])) ? $svalue['product_count'] : '0'; ?>)</span></a></h6>
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
            <h1 class="section-title text-capitalize text-left mb-3">Custom Solutions</h1>
            <p>PEC has been at the forefront of developing custom resistors solutions for our global and India customers.  In most critical applications, a degree of customization is required to handle field electrical & physical usage conditions.</p>
            <a href="<?=base_url();?>contact-us"><button class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45">
              Talk To Sales
            </button></a>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Cross Reference Note POPUP -->
<div class="modal fade" id="crossModel" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog newsletter-popup crossref_popup modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close close_refresh" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="row p-4 m-0">
        <h5 class="">Cross Reference Search Guidelines</h5>
        <hr/>
        <div class="row pt-3 fs-16">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pfs-16">
            <h6>How to Search for Equivalent Resistor Types?</h6>
            <ol>
              <p> Please enter the product type of the resistor you would like to find an equivalent for into the search box: </p>

              <li style="padding-left: 10px;" class="mb-2"> If you would like to find an equivalent for the following part – <b>VHPR60 H UL 10R K 300 </b>, please enter only the product type <b> VHPR60 </b> into the search box without extra spaces at the beginning or the end to get the required results. </li>
              <li style="padding-left: 10px;" class="mb-2"> If you are looking for <b> Z304-C 3 270R 5 % AC G53 C04 </b> equivalent, please type in <b>Z304-C</b> in the search box to get our closest equivalent PEC product type. </li>
            </ol>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#search_cr').change(function() {
      $('#filterform').submit();
      // let count = $('input[name=application]:checked').length;
      // $('#application_count_onchange').html('('+count+')');
      checkboxallcount();
    });
    $('.applicat_checkbox').change(function() {
      let count = $('input[name=application]:checked').length;
      $('#application_count_onchange').html('('+count+')');
      checkboxallcount();
      $('#filterform').submit();
    });

    $('.constr_checkbox').change(function() {
      let ccount = $('input[name=construction]:checked').length;
      $('#constr_count_onchange').html('('+ccount+')');
      checkboxallcount();
      $('#filterform').submit();
    });

    $('.power_checkbox').change(function() {
      let pcount = $('input[name=power]:checked').length;
      $('#power_count_onchange').html('('+pcount+')');
      checkboxallcount();
      $('#filterform').submit();
    });

    function checkboxallcount(){
      let allcountc = $('input[type=checkbox]:checked').length;
      if(allcountc == 0){
        $(".applybbtn").removeClass("primarybluefilter");
        $(".resetbbtn").removeClass("resetbluefilter");
      }else{
        $(".applybbtn").addClass("primarybluefilter");
        $(".resetbbtn").addClass("resetbluefilter");
      }
    }
    

});
  var checksearch = "<?=(!empty($_GET['search'])) ? $_GET['search'] : '';?>";
  var site_url = "<?=base_url();?>product?search="+checksearch;
  $('#filterform').on('submit', function(e) { 
      e.preventDefault();
      let array = []; 
      let arrayconstr = [];
      let arraypower = [];
      let apptnurl = '';
      let construrl = '';
      let powerurl = '';
      let search_cr_url = $('#search_cr').val();

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

      if(search_cr_url){
        search_cr_url = '&search_cr=' + search_cr_url;
      }

      const actionUrl = site_url + apptnurl + construrl + powerurl + search_cr_url;
      window.location.href = actionUrl;
  }); 

  $(document).on('click', '.resetfilter', function() {
    window.location.href = "<?=base_url();?>"+'product';
  });

  $(document).on('click', '.cross_model', function() {
    $("#crossModel").modal("show");
  });

</script>