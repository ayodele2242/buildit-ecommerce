 <div id="shopify-section-1554699267962" class="shopify-section">
                           <div class="slideshow-01 slideshow-catalog-wrapper" data-section-type="slideshow" data-section-id="1554699267962">

                              <div class="bc-wrapper fix-height full" style="background-color: #ffffff;">
                                 <div class="bc-home-slideshow">
                                    <div class="home-slideshow-wrapper home-slideshow-wrapper-1554699267962 swiper-container swiper-container-1" data-autoplay="false" data-time="6" data-animation="slide">
                                       <div class="home-slideshow swiper-wrapper">
                                          <?php 
                                          if($banner_info){
                                            foreach(array_slice($banner_info, 0, 6) as $banner_data){
                                            ?>

                                          <div class="swiper-slide swiper-slide-1554699267962-0">
                                             <a href="">
                                                <span class="image-lazysize img-mobile" style="position:relative; padding-top:50.78219013237064%;">
                                                   <!-- noscript pattern -->
                                                   <noscript>
                                                      <img class="img-lazy img-mobile" src="<?php echo UPLOAD_URL.'banner/'.$banner_data->image;?>" alt=""/>
                                                   </noscript>
                                                   <img class="lazyload img-mobile img-lazy blur-up"
                                                      data-src="<?php echo UPLOAD_URL.'banner/'.$banner_data->image;?>"
                                                      data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                      data-aspectratio="1.9691943127962086"
                                                      data-sizes="auto"
                                                      data-parent-fit="cover"
                                                      alt=""/>
                                                </span>
                                                <span class="image-lazysize img-desk" style="position:relative;padding-top:36.61458333333334%;">
                                                   <!-- noscript pattern -->
                                                   <noscript>
                                                      <img class="img-lazy img-desk" src="<?php echo UPLOAD_URL.'banner/'.$banner_data->image;?>" alt=""/>
                                                   </noscript>
                                                   <img class="lazyload img-desk img-lazy blur-up"
                                                      data-src="<?php echo UPLOAD_URL.'banner/'.$banner_data->image;?>"
                                                      data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                      data-aspectratio="2.731152204836415"
                                                      data-sizes="auto"
                                                      data-parent-fit="cover"
                                                      alt=""/>
                                                </span>
                                             </a>
                                             <div class="swiper-content text-left slide-1 container" style="background: rgba(0,0,0,.5);">
                                                <div class="container-box" style="top: 20%; left: 40%;transform: translate(-40%, -20%);">
                                                   <div class="heading bold-false col-white">
                                                      <?php echo wordwrap($banner_data->title,10,"<br>\n"); ?>
                                                      
                                                   <div class="subheading bold-true col-white mt-3 mb-3"><?php echo $banner_data->summary;?></div>
                                                  <!-- <div class="cation bold-false">
                                                      <span class="title-price">From</span>
                                                      <p> <span class="small-size">N</span>749<span class="small-size">99</span></p>
                                                   </div>-->
                                                   <?php 
                                                       if($banner_data->link != ""){
                                                     ?>
                                                   <div class="caption-link">
                                                      <a class="slider-button btn btn-1" href="<?php echo $banner_data->link;?>">Start Buying</a>                
                                                   </div>
                                                   <?php
                                                    }
                                                   ?>
                                                   <style type="text/css">
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .heading {
                                                      color: #333e48; font-size: 58px; -webkit-animation-name: fadeIn; animation-name: fadeIn; -webkit-animation-delay: 1s; animation-delay: 1s;
                                                      }
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .subheading {
                                                      color: #333e48; font-size: 15px; -webkit-animation-name: moveFromRight; animation-name: moveFromRight; -webkit-animation-delay: 2s; animation-delay: 2s;
                                                      }
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .cation {
                                                      color: #333e48; font-size: 57px; -webkit-animation-name: fadeIn; animation-name: fadeIn; -webkit-animation-delay: 3s; animation-delay: 3s;
                                                      }
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .caption-link {
                                                      -webkit-animation-name: moveFromBottom; animation-name: moveFromBottom; -webkit-animation-delay: 4s; animation-delay: 4s;
                                                      }   
                                                      .swiper-slide-1554699267962-0 img{
                                                      object-position: center center;                    
                                                      }
                                                      @media (max-width: 767px){
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .heading {
                                                      font-size: 13px;
                                                      }
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .subheading {
                                                      font-size: 15px;
                                                      }
                                                      .swiper-slide-1554699267962-0.swiper-slide-active .cation {
                                                      font-size: 13px;
                                                      }
                                                      }
                                                   </style>
                                                </div>
                                                <!--<div class="image-layer-box" style="top: 0%; left: 100%; transform: translate(-100%, -0%);">
                                                   <div class="image-layer-slide">
                                                      <img class="lazyload" data-src="<?php //echo UPLOAD_URL.'banner/'.$banner_data->image;?>" alt=""/>
                                                   </div>
                                                </div>-->
                                                <style type="text/css">
                                                   .swiper-slide-1554699267962-0.swiper-slide-active .image-layer-slide {
                                                   -webkit-animation-name: fadeIn; animation-name: fadeIn; -webkit-animation-delay: 1s; animation-delay: 1s;
                                                   } 
                                                   @media (min-width: 1025px) {
                                                   .swiper-slide-1554699267962-0.swiper-slide-active .image-layer-box{
                                                   width: 520px;                    
                                                   }
                                                   }
                                                   @media (min-width: 768px) and (max-width: 1024px) {
                                                   .swiper-slide-1554699267962-0.swiper-slide-active .image-layer-box{
                                                   width: 400px;                    
                                                   }
                                                   }
                                                </style>
                                             </div>
                                          </div>

                                          </div>
                                          <?php
                                               }
                                             }
                                           ?>
                                          
                                         


                                       
                                    </div>
                                    <div class="btn-pagination">
                                       <div class="swiper-pagination swiper-pagination-01 swiper-pagination-white"></div>
                                       <div class="swiper-button-next swiper-button-next-01 swiper-button-white"></div>
                                       <div class="swiper-button-prev swiper-button-prev-01 swiper-button-white"></div>
                                    </div>
                                    <script>
                                       jQuery(document).ready(function($) {
                                         
                                         var _sections = new theme.Sections();
                                         _sections.register('slideshow',function(){
                                           if(jQuery('.slideshow-01 .home-slideshow-wrapper-1554699267962').length){
                                             jQuery('.slideshow-01 .home-slideshow-wrapper-1554699267962').each(function(index,value){
                                       
                                             let _delay_time = jQuery(value).data('time') * 1000;
                                               let _animation = jQuery(value).data('animation');
                                       
                                               let swiper = new Swiper('.swiper-container-1', {
                                                 
                                                 loop: true,
                                                 //autoplay: true,
                                                 //parallax: true,
                                                 
                                                 pagination: {
                                                   el: '.swiper-pagination-01',
                                                   clickable: true
                                                 },
                                                 navigation: {
                                                   nextEl: '.swiper-button-next-01',
                                                   prevEl: '.swiper-button-prev-01',
                                                 },
                                                 spaceBetween: 0,
                                                 speed: 400,
                                                 effect: _animation,
                                                 
                                                 
                                                 setWrapperSize: false,
                                                 on: {
                                                   imagesReady: function (swiper) {
                                                     $('.home-slideshow').find('.swiper-slide').each(function(){
                                                       let _this = $(this);
                                                       _this.find('.video-slide').show();
                                                       
                                                       if (!_this.find('.video-slide').data('full-height')) {
                                                         _this.find('.video-slide video').css({
                                                         });
                                                       }
                                                       else{
                                                         _this.find('.video-slide video').css({
                                                           left: '50%',
                                                           top: '50%',
                                                           transform: 'translate(-50%, -50%)'
                                                         });
                                                       }
                                                     });
                                                   } 
                                                 }
                                               });
                                             });
                                           }
                                         });
                                         
                                       });
                                    </script>
                                 </div>
                                 <style>
                                    @media (min-width: 1200px) {
                                    .fix-height .bc-home-slideshow {
                                    height: 370px;
                                    }
                                    }
                                 </style>
                              </div>
                           </div>
                        </div>