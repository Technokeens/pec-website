<div class="mb-5 pb-xl-5"></div>
<main style="padding-top: 10%;">
  <div class="mb-2 pb-xl-3"></div>
  <section class="shop-main container d-flex">
    <div class="flex-grow-1">
      <div class="d-flex justify-content-between mt-3">
        <div class="breadcrumb mb-0 d-md-block flex-grow-1 app_mb_center">
          <h3 class="section-title text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 pl-10">Applications</h3>
        </div>
      </div>

      <section class="service-promotion container">
        <div class="row application_blocks">
          <?php
            if(!empty($applications))
            {
              foreach ($applications as $key => $value) { ?>
                <div class="col-md-3 mb-5 mb-md-0 pr-0 pl-0">
                  <div class="col-md-12 p-3">
                    <a href="<?=base_url();?>view-application/<?=$value['slug'];?>"><div class="service-promotion__icon mb-4">
                        <?php
                        if(!empty($value['application_image'])){ ?>
                          <img src="<?=base_url();?>uploads/application/<?=$value['application_image']?>" class="hicon">
                        <?php } ?>
                    </div></a>
                    <a href="<?=base_url();?>view-application/<?=$value['slug'];?>"><h3 class="service-promotion__title h5 primaryblue"><?=(!empty($value['title'])) ? ucfirst($value['title']) : ''; ?></h3></a>
                    <p class="service-promotion__content text-secondary textminht_list"><?=(!empty($value['short_description'])) ? substr($value['short_description'],0,70) .' ...' : ''; ?></p>
                    <a href="<?=base_url();?>view-application/<?=$value['slug'];?>" class="primaryblue mb-4">Know More <i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </div>
                <?php
              }
            }else{ ?>
              <p class="text-capitalize text-left mb-1 mb-md-2 pb-xl-2 mb-xl-4 ">No data available </p>
              <?php
            }
          ?>
        </div>
      </section>
      
    </div>
  </section><!-- /.shop-main container -->
  <div class="mb-5 pb-xl-5"></div>

</main>
