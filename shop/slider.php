  <!-- Hero slider-->
   <section class="container-fluid px-0">
      <div class="row no-gutters">
    <div class="cz-carousel icarousel cz-controls-lg mb-4 mb-lg-5 col-lg-9 col-sm-9 cz-dots-inside">
      <div class="cz-carousel-inner"  data-carousel-options='{"mode": "gallery","autoplay": true, "speed": 300, "responsive": {"0":{"nav":true, "controls": true},"992":{"nav":false,"controls": true }}}'>
            <?php 
            if($banner_info){
              foreach($banner_info as $banner_data){
              ?>
      
        <!-- Item-->
        <div class="px-lg-5 coursel-img-container" style="background-color: #f5b1b0;">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4">
            <img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="<?php echo UPLOAD_URL.'banner/'.$banner_data->image;?>" alt="<?php echo $banner_data->title;?>">

            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 72rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-lg-left text-md-nowrap">
                
                <h3 class="text-light display-4 from-bottom delay-1 "><?php echo $banner_data->title;?></h3>
                <p class="font-size-ms text-light pb-3 from-bottom delay-2 "><?php echo $banner_data->summary;?></p>
                <?php 
                      if($banner_data->link != ""){
                    ?>
                <a class="btn btn-primary scale-up delay-4" href="<?php echo $banner_data->link;?>">Shop Now<i class="fa fa-arrow-right ml-2 mr-n1"></i></a>
                <?php
                      }
                    ?>
              </div>
            </div>
          </div>
        </div>
        
        
<?php
              }
            }
          ?>


      </div>
    </div>
<div class="col-md-3 col-sm-12 bg-blue  mb-4 mb-lg-5 pl-3 pr-3">

          <div class="col-md-12 col-sm-6 mb-3 pt-3">
              <div class="media"><i class="fa fa-money text-white icon-color" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1"><a class="col-white text-lg-nowrap" href="<?php echo ucfirst($set['installUrl']);  ?>vendor/index">Sell on <?php echo ucfirst($set['storeName']);  ?></a></h6>
                  <p class="mb-0 font-size-ms text-light opacity-30">Sell your products to the right consumers</p>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-sm-6 mb-3 pt-3">
              <div class="media"><i class="fa fa-rocket text-white icon-color" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Fast delivery</h6>
                  <p class="mb-0 font-size-ms text-light opacity-30">Orders don't wait after purchase</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-6 mb-3">
              <div class="media"><i class="fa fa-exchange text-white icon-color" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Money back guarantee</h6>
                  <p class="mb-0 font-size-ms text-light opacity-30">We return money within 30 days</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-6 mb-3">
              <div class="media"><i class="fa fa-question-circle text-white icon-color" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">24/7 customer support</h6>
                  <p class="mb-0 font-size-ms text-light opacity-30">Friendly 24/7 customer support</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-6 pb-3">
              <div class="media"><i class="fa fa-credit-card text-white icon-color" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Secure online payment</h6>
                  <p class="mb-0 font-size-ms text-light opacity-30">We possess SSL / Secure сertificate</p>
                </div>
              </div>
            </div>
         

</div>
  </div>

</section>