<style>
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
</style>
<div class="mb-5 pb-xl-5"></div>
  <main style="padding-top: 10%;">
    <div class="mb-2 pb-xl-3"></div>
    <section class="shop-main container d-flex">
      <div class="flex-grow-1">
        <div class="d-flex justify-content-between mb-2 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="<?=base_url();?>product" class="menu-link menu-link_us-s text-capitalize fw-medium" >Products</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-capitalize fw-medium primaryblue"><b><?=(!empty($series_data['title'])) ? ucfirst($series_data['title']) : ''; ?></b></a>
          </div><!-- /.breadcrumb -->
        </div>


        <div class="row prod-box">
          <div class="col-lg-7 prodiimage">
            <?php
              if(!empty($series_data['series_image']) && file_exists('uploads/series/'.$series_data['series_image'])){
                $image = base_url().'uploads/series/'.$series_data['series_image'];
              }else{
                $image = base_url().'assets/images/no-image.jpg';
              }
            ?>
            <img src="<?=$image;?>" class="mb-4" alt="<?=(!empty($series_data['series_image_alt'])) ? $series_data['series_image_alt'] : ''; ?>">
          </div>
          <div class="col-lg-5 h-md-100">
              <h1 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4"><?=(!empty($series_data['title'])) ? ucfirst($series_data['title']) : ''; ?> </h1>
              <?=(!empty($series_data['description'])) ? $series_data['description'] : ''; ?>
              <?php
                if(!empty($series_data['file_folder']))
                {
                  if(!empty($datasheets)){
                    $arrnames = array();
                    foreach ($datasheets as $dskey => $ds) {
                      // $urldwn = base_url().$series_data['file_folder'].'/'.$ds['pdf_file'];
                      $arrnames[] = $ds['pdf_file'];
                    }
                    $implodename = implode(',', $arrnames); ?>
                    <button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-4 document_model" >Download Datasheet </button>
                    <?php }else{ ?>
                        <a href="<?=base_url();?>contact-us" title="Connect to Sales Team"><button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-4" > Connect to Sales Team </button></a>
                      <?php
                    }
                }else{ ?>
                    <a href="<?=base_url();?>contact-us" title="Connect to Sales Team"><button type="button" class="btn btn-outline-primary border-0 fs-base text-capitalize btn-45 mt-4" > Connect to Sales Team </button></a>
                <?php } ?>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <h2 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4">Product <span class="titlehighlight">Types</span></h2>
          </div>
        </div>

        <div class="products-grid row row-cols-1 row-cols-md-3" id="products-grid" >
          <?php
          if(!empty($product_types)){
            foreach ($product_types as $key => $value) {
          ?>
            <div class="product-card-wrapper">
              <div class="product-card prod-type-inner mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__info position-relative">
                  <div class="d-flex">
                    <h6 class="pt_title"><a href="<?=base_url().'product/'.$series_data['slug'].'/'.$value['slug'];?>"><?=(!empty($value['product_name'])) ? $value['product_name'] : '' ?></a></h6>
                    <a href="<?=base_url().'product/'.$series_data['slug'].'/'.$value['slug'];?>"><button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 primaryblue pt_btn_fs" title="View Details">View Details <i class="fa fa-arrow-right pt-icon"></i></button></a>
                  </div>
                  <hr class="pt_bor_btm">
                  <div class="d-flex">
                    <p class="pc__category mb-0">Power Rating</p>
                    <p class="position-absolute end-0 text-black">
                        <?php
                          $power_rating_array = array();
                          if(!empty($value['power_ids'])){
                            $explode = explode(',', $value['power_ids']);
                            rsort($explode);
                            foreach ($explode as $prkey => $prvalue) {
                                $power = $this->common->fetchsingledata('power_rating', 'tbl_power_rating',' WHERE pr_id="'.$prvalue.'"');
                                $power_rating_array[] = $power['power_rating'];
                            }
                          }
                        ?>
                        <?=(!empty($value['product_power_rating'])) ? implode(', ', $power_rating_array) : '0.00W'; ?>
                      </p>
                  </div>
                  <hr class="pt_bor_btm">
                  <div class="d-flex">
                    <p class="pc__category mb-0">Min Resistance Value Ohms</p>
                    <p class="position-absolute end-0 text-black"><?=(!empty($value['min_resistance'])) ? $value['min_resistance'] : '-'; ?></p>
                  </div>
                  <hr class="pt_bor_btm">
                  <div class="d-flex">
                    <p class="pc__category mb-0">Max Resistance Value Ohms</p>
                    <p class="position-absolute end-0 text-black"><?=(!empty($value['max_resistance'])) ? $value['max_resistance'] : '-'; ?></p>
                  </div>
                  <hr class="pt_bor_btm">
                  <div class="d-flex">
                    <p class="pc__category mb-0">Dimensions Body Length/Height</p>
                    <p class="position-absolute end-0 text-black"><?=(!empty($value['dimension_height'])) ? number_format($value['dimension_height'],2,'.','') : '0.00'; ?>mm</p>
                  </div>
                  <hr class="pt_bor_btm">
                  <div class="d-flex">
                    <p class="pc__category mb-0">Dimensions Body Diameter/Width</p>
                    <p class="position-absolute end-0 text-black"><?=(!empty($value['dimension_width'])) ? number_format($value['dimension_width'],2,'.','') : '0.00'; ?>mm</p>
                  </div>
                </div>
              </div>
            </div>
          <?php
            }
          }else{ ?>
            <p class="text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">No data available </p>
          <?php } ?>
        </div><!-- /.products-grid row -->

        <nav class="shop-pages d-flex justify-content-right mt-3" aria-label="Page navigation">
          <?= !empty($links_pagination) ? $links_pagination : ''; ?>
        </nav>
      </div>
    </section><!-- /.shop-main container -->
    <div class="mb-5 pb-xl-5"></div>

  </main>

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
    $(document).on('click', '.document_model', function() {
      $("#documentModel").modal("show");
    });
  </script>