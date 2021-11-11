<?php
include("header.php");
include("header-bottom.php");
?>



        
<div id="body-content">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">
                       
                        <!-- BEGIN content_for_index -->
                       <?php include("slider.php"); ?>
                       
                        <div class="section mobile_show">
                           <div class="section-separator section-separator-1558341502241 section-separator-margin-top section-separator-margin-bottom pl-3" style="background: #f0f0f0;" >
                           <a class='col-orange' href="vendor/index">
                                <i class="fa fa-money"></i> Sell on Buildit
                            </a>
                           </div>
                        </div>
                       
                        <div id="shopify-section-1531902587175" class="shopify-section pt-3 mb-3" style="background: #f0f0f0">
                           <div id="home-banner-1531902587175" class="home-banner effect-2 layout-boxed" data-section-type="image-gallery" data-section-id="1531902587175">
                              <div class="container">
                                 <div class="home-banner-items" data-type="row" data-nav		= "false"
                                    data-bullet 	= "false"
                                    data-item-desk	= "4"
                                    data-item-tab	= "2"
                                    data-item-mob	= "2"
                                    data-pad		= "15"
                                    data-autoplay 	= "false"
                                    data-loop		= "false">
                                    <div class="row justify-content-center" id="loadCategories">

                                    </div>
                                 </div>
                                 <style>
                                    #home-banner-1531902587175 .home-banner-items .row{
                                    margin:-15px;
                                    }
                                    #home-banner-1531902587175 .home-banner-items .row>div{
                                    padding:15px;
                                    }  
                                 </style>
                                 <script>
                                    jQuery(document).ready(function($) {
                                      
                                      var _sections = new theme.Sections();
                                      _sections.register('image-gallery',function(){
                                        
                                        var _type = $('#home-banner-1531902587175 .home-banner-items').attr('data-type');           
                                                      
                                        if(_type == 'carousel'){
                                          var _item_desk = $('#home-banner-1531902587175 .home-banner-items').attr('data-item-desk'),
                                        	_item_tab = $('#home-banner-1531902587175 .home-banner-items').attr('data-item-tab'),
                                        	_item_mob = $('#home-banner-1531902587175 .home-banner-items').attr('data-item-mob'),
                                          _pad = Number($('#home-banner-1531902587175 .home-banner-items').attr('data-pad')),
                                          _nav = $('#home-banner-1531902587175 .home-banner-items').attr('data-nav'),
                                          _bullet = $('#home-banner-1531902587175 .home-banner-items').attr('data-bullet'),
                                          _nav_carousel = false,
                                          _bul_carousel = false;
                                                             
                                          if(_bullet == 'true'){ var _bul_carousel = true;}   
                                          if(_nav == 'true'){ var _nav_carousel = true;}
                                          
                                          jQuery(".home-banner-carousel-1531902587175").length && jQuery('.home-banner-carousel-1531902587175').owlCarousel({
                                              nav			: _nav_carousel
                                              ,dots 		: _bul_carousel
                                             	,items		: _item_desk
                                             	,rtl		: jQuery('body').data('rtl')
                                          	,margin		: _pad
                                              ,responsive : {
                                                0:{
                                                  items: 1
                                                }
                                                ,375:{
                                                   items: _item_mob
                                                }
                                                ,768:{
                                                   items: _item_tab
                                                }
                                                ,1024:{
                                                  items: _item_desk
                                                }
                                              }
                                              ,navText : ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                          });
                                        }
                                                
                                        else if(_type == 'masonry'){
                                          let muuri_1531902587175 = (e,grid)=>{
                                            e = new Muuri(grid, {
                                              items: '.banner-item'
                                              ,visibleStyles: {}
                                              ,layout: {
                                                fillGaps: true,
                                                rounding: false
                                              }
                                            })
                                          }
                                    
                                          jQuery(document).ready(function($) {
                                            $('.bc-masonry').each(function(){
                                               let $module = $(this);
                                               let update = function(){
                                                  muuri_1531902587175($module,'.bc-masonry-1531902587175');
                                               }
                                               this.addEventListener('load', update, true);
                                    
                                               muuri_1531902587175($module,'.bc-masonry-1531902587175');
                                            })
                                          });
                                        }
                                        
                                        else{
                                          return;
                                        }
                                            
                                      })
                                    })
                                 </script>
                              </div>
                           </div>
                        </div>

                        <div id="shopify-section-1554262718585" class="shopify-section mt-2">
                           <div role="tabpanel" id="hp-tabs-1554262718585" class="hp-tabs-section layout-boxed tab-style-v2  no-padding"  data-section-type="products-tabs-v2" data-section-id="1554262718585">
                              <div class="container">
                                 <div class="wrap-tab-content" data-type="">

                                   

                                    <div class="tab-content">

                                       <div  id="hp-tabs-1554262718585-1">
                                          <div class="hp-tabs-content">



                                            <!-- <div class="hp-tabs-special-product">
                                                <div class="block-special-product-v2">
                                                   <?php 
                                                 /*  $single = getLatestSingleProduct(); 
                                                   foreach ($single as $product_value) {
                                                      # code...
                                                       if($product_value['images'] != "" && file_exists('upload/product/'.$product_value['images'])){
                                                           $thumbnail = 'upload/product/'.$product_value['images'];
                                                         } else {
                                                           $thumbnail = FRONT_IMAGES.'no-image.png';
                                                         }

                                                       $id = $product_value['id'];
                                                       $content = $product_value['title'];
                                                       $shortcontent = substr($content, 0, 260)."...";
                                                    */
                                                    ?>


                                                   <div class="product-wrapper mt-5 border-grey">


                                                      <div class="product-head">
                                                         <div class="product-image">
                                                            <div class="image product-ratio-false">
                                                               
                                                               <a href="detail?id=<?php //echo $product_value['id']; ?>">
                                                                  <span class="image-lazysize"  style="position:relative;padding-top:91.66666666666667%;">
                                                                    
                                                                     <noscript>
                                                                        <img class="img-lazy product-ratio-false " src="<?php //echo $thumbnail;?>" alt="Black Fashion Zapda" style="object-fit: unset" />
                                                                     </noscript>
                                                                     <img class="lazyload  img-lazy blur-up auto-crop-false"
                                                                        data-src="<?php //echo $thumbnail;?>"
                                                                        data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                                        data-aspectratio="1.0909090909090908"
                                                                        data-expand="auto"
                                                                        data-sizes="auto"
                                                                        data-parent-fit="cover"
                                                                        alt="Black Fashion Zapda"
                                                                        style="object-fit: unset"
                                                                        />
                                                                  </span>
                                                               </a>
                                                               <?php   
                                                                 //if(!empty($product_value['discount'])){
                                                                 ?>
                                                               <span class="special-product-label bg-red">
                                                               <span class="percent col-white "><?php //echo  $product_value['discount']; ?>%</span>
                                                               </span>
                                                            <?php //} ?>
                                                            </div>


                                                         </div>
                                                      </div>
                                                      <div class="product-content">
                                                         <div class="pc-inner">
                                                            <h5 class="product-name"><a href="detail?id=<?php //echo $product_value['id']; ?>"><?php //echo stripslashes($content); ?></a></h5>

                                                            <div class="product-price notranslate">

                                                               <?php 
                                                           /* if($product_value['size_category'] == "different"){

                                                          $prices = $product_value['price'];
                                                          $amt = explode(",", $prices);
                                                          $min = min($amt);
                                                          $max = max($amt);

                                                          $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                          echo '<span class="price-sale"><span class=money>'.$price.'</span></span>';
                                                          


                                                            }else{
                                                        $price =  $product_value['price'];
                                                        $discount =  $product_value['discount'];
                                                        if($discount > 0){
                                                          $price = $price-(($price*$discount)/100);
                                                        }

                                                        echo '<span class="price-sale"><span class=money>'.$left_currency.number_format($price).$right_currency.'</span></span>';
                                                        if($discount > 0){

                                                          echo ' <span class="price-compare"><span class=money>  '.$left_currency.number_format($row['price']).$right_currency.'</span></span>';
                                                        }

                                                      }*/

                                                      ?>
                                                            </div>
                                                            <div class="deal-progress">
                                                               <div class="deal-stock">
                                                                  <span class="stock-sold">Already Sold: <strong>6</strong></span>
                                                                  <span class="stock-available">Available: <strong>39</strong></span>
                                                               </div>
                                                               <div class="progress">
                                                                  <span class="progress-bar" style="width:13%"></span>
                                                               </div>
                                                            </div>
                                                            <div class="wrapper-countdown">
                                                               <span class="offer-text">Hurry Up! Offer ends in</span>
                                                               <div class="countdown_1554262718585-0"></div>
                                                            </div>
                                                            <script type="text/javascript">
                                                               jQuery(document).ready(function($){
                                                               
                                                                 var currentDate = new Date();
                                                                 var dueDate = new Date( 2021, 3 - 1, 14 );
                                                               
                                                                 if(currentDate < dueDate){
                                                                   $('.countdown_1554262718585-0').countdown({until: dueDate, format: 'HMS', padZeroes: true });
                                                                 }
                                                                 else{
                                                                   $('.countdown_1554262718585-0').parents('.wrapper-countdown').hide();
                                                                 }
                                                               
                                                               });
                                                            </script>
                                                         </div>
                                                      </div>
                                                   </div>

                                                <?php //} ?>
                                                </div>
                                             </div>-->




                                             <div class="hp-tabs-lists tabs-list-rows">
                                                <div class="row">
                                                 <?php  
                                                $rowperpage = 12;

                                                 // counting total number of posts
                                                $allcount_query = "SELECT count(*) as allcount FROM product";
                                                $allcount_result = mysqli_query($mysqli,$allcount_query);
                                                $allcount_fetch = mysqli_fetch_array($allcount_result);
                                                $allcount = $allcount_fetch['allcount'];


                                                 $products = getAllProducts($rowperpage); 
                                                 foreach ($products as $row) {
                                                     if($row['images'] != "" && file_exists('upload/product/'.$row['images'])){
                                                     $thumbnail = 'upload/product/'.$row['images'];
                                                   } else {
                                                     $thumbnail = FRONT_IMAGES.'no-image.png';
                                                   }

                                                 $id = $row['id'];
                                                 $content = $row['title'];
                                                 $shortcontent = substr($content, 0, 160)."...";
                                                  
                                                 ?>

                                                   <div class="product-grid-item col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6">
                                                      <div class="product-wrapper  effect-overlay">
                                                         <div class="product-head">
                                                            <div class="product-image">
                                                               <div class="product-group-vendor-name">
                                                                  
                                                                  <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $row['id']; ?>" class="col-grey"><?php echo stripslashes($row['title']); ?></a></h5>
                                                               </div>
                                                               <div class="featured-img product-ratio-false">
                                                                  <a href="detail?id=<?php echo $row['id']; ?>">
                                                                     <span class="image-lazysize"  style="position:relative;padding-top:91.66666666666667%;">
                                                                        <!-- noscript pattern -->
                                                                        <noscript>
                                                                           <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" style="object-fit: unset" />
                                                                        </noscript>
                                                                        <img class="lazyload featured-image front img-lazy blur-up auto-crop-false"
                                                                           data-src="<?php echo $thumbnail;?>"
                                                                           data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                                           data-aspectratio="1.0909090909090908"
                                                                           data-expand="auto"
                                                                           data-sizes="auto"
                                                                           data-parent-fit="cover"
                                                                           alt="<?php echo stripslashes($row['title']); ?>"
                                                                           style="object-fit: unset"
                                                                           />
                                                                     </span>
                                                                      <?php   
                                                                 if(!empty($row['discount'])){
                                                                 ?>

                                                                  <span class="product-label">
                                                                     <span class="label-sale type-number bg-red">
                                                                     <span class="sale-text col-white">-<?php echo  $row['discount']; ?><sup>%</sup></span>
                                                                     </span>
                                                                     </span>

                                                              
                                                            <?php } ?>

                                                                    
                                                                  </a>
                                                               </div>
                                                               
                                                            </div>
                                                         </div>
                                                         <div class="product-content">
                                                            <div class="pc-inner">
                                                               <div class="price-cart-wrapper">
                                                                  <div class="product-price notranslate">
                                                            <?php 
                                                             if($row['size_category'] == "different"){

                                                             $prices = $row['price'];
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $row['price'];
                                                         $discount =  $row['discount'];
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($row['price']).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                                                                  </div>
                                                            <div class="product-add-cart mobile-true">
                                                            <?php 
                                                              if($row['quantity'] > 0){
                                                            ?>
                                                             <a  href="#" class="btn-add-cart select-options col-white bg-blue quickShop" title="Add to Cart" id="<?php echo $row['id']; ?>" ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                                                              
                                                            <?php }else{ ?>
                                                               <small class="col-red mobile-false">Sold out</small>
                                                            <?php } ?>
                                                            </div>
                                                               
                                                               </div>
                                                               <div class="product-button">
                                                                  <!--<div data-target="#quick-shop-popup" class="quick_shop" data-handle="faxtex-product-sample" data-toggle="modal" title="View">
                                                                     <i class="demo-icon icon-view-1"></i>
                                                                     View
                                                                  </div>-->
                                                                  <div class="product-wishlist">
                                                                     <a data-arn-action="add"  class='add-to-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo  $row['id'];?>);">
                                                                        <svg width="16" height="16" class="arn_icon arn_icon-add-wishlist">
                                                                           <use xlink:href="#arn_icon-add-wishlist"></use>
                                                                        </svg>
                                                                        <svg width="16" height="16" class="arn_icon arn_icon-preloader">
                                                                           <use xlink:href="#arn_icon-preloader"></use>
                                                                        </svg>
                                                                        Add to Wishlist
                                                                     </a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   
                                                   <?php } ?>
                                                   
                                                   
                                                  
                                                 

                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                    

                                      


                                 </div>
                              </div>
                           </div>
                        </div>


                               <?php 
                           $bathroom = getBathroomCategory();
                           if(isset($bathroom) && !empty($bathroom)){
                             $i = 0;
                             $mid = $bathroom['id'];
                             $list = getBathroomCategoryProduct($mid);
                            
                               //if ($child_cats) {
                        ?>

                        <div class="section" style="background-color: #f0f0f0;">
                           <div id="product-grid-1583317122999" class="product-grid-section layout-boxed" data-section-type="product-grid" data-section-id="1583317122999" style="background-color: #fff;">
                              <div class="product-grid-inner navigator-position-1" data-type="carousel">
                                 <div class="product-grid-content block-type-product" >
                                    
                                    <div class="container">
                                       <div class="title-wrapper ">
                                          <h3><?php echo stripslashes($bathroom['title']);?></h3>
                                       </div>
                                       <div class="product-grid-inner">
                                          <div class="product-grid-carousel">

                                             
                                             <?php  

                                             foreach ($list as $row) {
                                                if($row['images'] != "" && file_exists('upload/product/'.$row['images'])){
                                                     $thumbnail = 'upload/product/'.$row['images'];
                                                   } else {
                                                     $thumbnail = FRONT_IMAGES.'no-image.png';
                                                   }

                                                 $id = $row['id'];
                                                 $content = $row['title'];
                                             
                                             ?>
                                            
                                             <div class="product-grid-item">
                                                <div class="product-wrapper  effect-overlay">
                                                   <div class="product-head">
                                                      <div class="product-image">
                                                         <div class="product-group-vendor-name">
                                                            
                                                            <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $row['id']; ?>" class="col-grey"><?php echo stripslashes($row['title']); ?></a></h5>
                                                         </div>
                                                         <div class="featured-img product-ratio-false">
                                                            <a href="detail?id=<?php echo $row['id']; ?>">
                                                               <span class="image-lazysize"  style="position:relative;padding-top:91.66666666666667%;">
                                                                  <!-- noscript pattern -->
                                                                  <noscript>
                                                                     <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" style="object-fit: unset" />
                                                                  </noscript>
                                                                  <img class="lazyload featured-image front img-lazy blur-up auto-crop-false"
                                                                     data-src="<?php echo $thumbnail;?>"
                                                                     data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                                     data-aspectratio="1.0909090909090908"
                                                                     data-expand="auto"
                                                                     data-sizes="auto"
                                                                     data-parent-fit="cover"
                                                                     alt="Kinla Product Sample"
                                                                     style="object-fit: unset"
                                                                     />
                                                               </span>
                                                               <?php   
                                                                 if(!empty($row['discount'])){
                                                                 ?>

                                                                  <span class="product-label">
                                                                     <span class="label-sale type-number bg-red">
                                                                     <span class="sale-text col-white">-<?php echo  $row['discount']; ?><sup>%</sup></span>
                                                                     </span>
                                                                     </span>

                                                              
                                                            <?php } ?>
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="product-content">
                                                      <div class="pc-inner">
                                                         <div class="price-cart-wrapper">
                                                            <div class="product-price notranslate">
                                                               <?php 
                                                             if($row['size_category'] == "different"){

                                                             $prices = $row['price'];
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $row['price'];
                                                         $discount =  $row['discount'];
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($row['price']).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                                                            </div>
                                                            <div class="product-add-cart mobile-false">
                                                              <?php 
                                                              if($row['quantity'] > 0){
                                                            ?>
                                                             <a  href="#" class="btn-add-cart select-options col-white bg-blue quickShop" title="Add to Cart" id="<?php echo $row['id']; ?>" ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                                                              
                                                            <?php }else{ ?>
                                                               <small class="col-red mobile-false">Sold out</small>
                                                            <?php } ?>
                                                            </div>
                                                         </div>
                                                         <div class="product-button">
                                                            <!--<div data-target="#quick-shop-popups" class="quick_shop" data-handle="condimentum-turpis" data-toggle="modal" title="View">
                                                               <i class="demo-icon icon-view-1"></i>
                                                               View
                                                            </div>-->
                                                            <div class="product-wishlist">
                                                                <a data-arn-action="add"  class='add-to-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo  $row['id'];?>);">
                                                                        <svg width="16" height="16" class="arn_icon demo-icon arn_icon-add-wishlist">
                                                                           <use xlink:href="#arn_icon-add-wishlist"></use>
                                                                        </svg>
                                                                        <svg width="16" height="16" class="arn_icon arn_icon-preloader">
                                                                           <use xlink:href="#arn_icon-preloader"></use>
                                                                        </svg>
                                                                        Add to Wishlist
                                                                     </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                         
                                          <?php } ?>

                                             
                                            
                                             

                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <script>
                                 jQuery(document).ready(function($) {
                                   var _sections = new theme.Sections();
                                   _sections.register('product-grid',function(){
                                         
                                     var _type = $('#product-grid-1583317122999 .product-grid-inner').attr('data-type');
                                 
                                     if(_type == 'carousel'){
                                       if($('#product-grid-1583317122999 .product-grid-content').hasClass('block-type-product-listing')){
                                         var _item = $('.block-type-product-listing .product-grid-inner').attr('data-item-per-row');
                                         
                                         if( typeof _item == 'undefined' ){
                                              _item = 2;
                                         }
                                         
                                         jQuery("#product-grid-1583317122999 .product-listing-carousel").on('initialize.owl.carousel initialized.owl.carousel change.owl.carousel changed.owl.carousel', function(e) {
                                             var current = e.relatedTarget.current()
                                             var items = $(this).find('.owl-stage').children()
                                             var add = e.type == 'changed' || e.type == 'initialized'
                                 
                                             items.eq(e.relatedTarget.normalize(current )).toggleClass('current', add)
                                           }).owlCarousel({
                                             nav         : true
                                             ,dots       : true
                                             ,items      : _item
                                             ,rtl        : jQuery('body').data('rtl')
                                             ,margin     : 0
                                             ,responsive : {
                                               0:{
                                                   items: 1
                                               }
                                               ,576:{
                                                   items: 2
                                               }
                                               ,992:{
                                                   items: _item
                                               }                                                                
                                             }
                                             ,navText : ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                         });
                                       }
                                     
                                       else{
                                         jQuery("#product-grid-1583317122999 .product-grid-carousel").on('initialize.owl.carousel initialized.owl.carousel change.owl.carousel changed.owl.carousel', function(e) {
                                             var current = e.relatedTarget.current()
                                             var items = $(this).find('.owl-stage').children()
                                             var add = e.type == 'changed' || e.type == 'initialized'
                                 
                                             items.eq(e.relatedTarget.normalize(current )).toggleClass('current', add)
                                           }).owlCarousel({
                                             nav         : true
                                             ,dots       : true
                                             ,items      : 6
                                             ,rtl        : jQuery('body').data('rtl')
                                             ,margin     : 0
                                             ,responsive    : {
                                                 0:{
                                                     items: 1
                                                 }
                                                 ,375:{
                                                     items: 2
                                                 }
                                                 ,768:{
                                                     items: 4
                                                 }
                                                 ,1024:{
                                                     items: 6
                                                 }                                                                
                                             }
                                             ,navText : ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                         });
                                       }
                                     }              
                                                      
                                   });        
                                 })
                              </script>
                              <style type="text/css">
                                 #product-grid-1583317122999 .product-grid-content .row {
                                 margin: 0;
                                 }
                                 #product-grid-1583317122999 .product-grid-content .row .product-grid-item {
                                 padding: 0;
                                 }  
                                 #product-grid-1583317122999 .product-grid-content.block-type-product-listing .product-listing-carousel .product-wrapper {
                                 margin-bottom: 0px;
                                 }
                                 #product-grid-1583317122999 .product-grid-content.block-type-product-listing-hw .product-grid-carousel .product-wrapper {
                                 margin-bottom: 0px;
                                 }
                              </style>
                           </div>
                        </div>
                        <!-- END content_for_index -->
                        <?php 
                            
                           }
                        ?>
                        
                       



                      
                        <?php 
                           $machine = getMachineCategory();
                           if(isset($machine) && !empty($machine)){
                             $i = 0;
                             $mid = $machine['id'];
                             $list = getMachineCategoryProduct($mid);
                            
                               //if ($child_cats) {
                        ?>
                        <div id="shopify-section-1583317122999" class="shopify-section">
                           <div id="product-grid-1583317122999" class="product-grid-section layout-boxed" data-section-type="product-grid" data-section-id="1583317122999">
                              <div class="product-grid-inner navigator-position-1" data-type="carousel">
                                 <div class="product-grid-content block-type-product" style="background-color: #fff;">
                                    
                                    <div class="container">
                                       <div class="title-wrapper ">
                                          <h3><?php echo stripslashes($machine['title']);?></h3>
                                       </div>
                                       <div class="product-grid-inner">
                                          <div class="product-grid-carousel">

                                             
                                             <?php  

                                             foreach ($list as $row) {
                                                if($row['images'] != "" && file_exists('upload/product/'.$row['images'])){
                                                     $thumbnail = 'upload/product/'.$row['images'];
                                                   } else {
                                                     $thumbnail = FRONT_IMAGES.'no-image.png';
                                                   }

                                                 $id = $row['id'];
                                                 $content = $row['title'];
                                             
                                             ?>
                                            
                                             <div class="product-grid-item">
                                                <div class="product-wrapper  effect-overlay">
                                                   <div class="product-head">
                                                      <div class="product-image">
                                                         <div class="product-group-vendor-name">
                                                            
                                                            <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $row['id']; ?>" class="col-grey"><?php echo stripslashes($row['title']); ?></a></h5>
                                                         </div>
                                                         <div class="featured-img product-ratio-false">
                                                            <a href="detail?id=<?php echo $row['id']; ?>">
                                                               <span class="image-lazysize"  style="position:relative;padding-top:91.66666666666667%;">
                                                                  <!-- noscript pattern -->
                                                                  <noscript>
                                                                     <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" style="object-fit: unset" />
                                                                  </noscript>
                                                                  <img class="lazyload featured-image front img-lazy blur-up auto-crop-false"
                                                                     data-src="<?php echo $thumbnail;?>"
                                                                     data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                                     data-aspectratio="1.0909090909090908"
                                                                     data-expand="auto"
                                                                     data-sizes="auto"
                                                                     data-parent-fit="cover"
                                                                     alt="Kinla Product Sample"
                                                                     style="object-fit: unset"
                                                                     />
                                                               </span>
                                                               <?php   
                                                                 if(!empty($row['discount'])){
                                                                 ?>

                                                                  <span class="product-label">
                                                                     <span class="label-sale type-number bg-red">
                                                                     <span class="sale-text col-white">-<?php echo  $row['discount']; ?><sup>%</sup></span>
                                                                     </span>
                                                                     </span>

                                                              
                                                            <?php } ?>
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="product-content">
                                                      <div class="pc-inner">
                                                         <div class="price-cart-wrapper">
                                                            <div class="product-price notranslate">
                                                               <?php 
                                                             if($row['size_category'] == "different"){

                                                             $prices = $row['price'];
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $row['price'];
                                                         $discount =  $row['discount'];
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($row['price']).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                                                            </div>
                                                            <div class="product-add-cart mobile-false">
                                                               <?php 
                                                              if($row['quantity'] > 0){
                                                            ?>
                                                             <a  href="#" class="btn-add-cart select-options col-white bg-blue quickShop" title="Add to Cart" id="<?php echo $row['id']; ?>" ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                                                              
                                                            <?php }else{ ?>
                                                               <small class="col-red mobile-false">Sold out</small>
                                                            <?php } ?>
                                                            </div>
                                                         </div>
                                                         <div class="product-button">
                                                          
                                                            <div class="product-wishlist">
                                                              <a data-arn-action="add"  class='add-to-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo  $row['id'];?>);">
                                                                        <svg width="16" height="16" class="arn_icon demo-icon arn_icon-add-wishlist">
                                                                           <use xlink:href="#arn_icon-add-wishlist"></use>
                                                                        </svg>
                                                                        <svg width="16" height="16" class="arn_icon arn_icon-preloader">
                                                                           <use xlink:href="#arn_icon-preloader"></use>
                                                                        </svg>
                                                                        Add to Wishlist
                                                                     </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                         
                                          <?php } ?>

                                             
                                            
                                             

                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <script>
                                 jQuery(document).ready(function($) {
                                   var _sections = new theme.Sections();
                                   _sections.register('product-grid',function(){
                                         
                                     var _type = $('#product-grid-1583317122999 .product-grid-inner').attr('data-type');
                                 
                                     if(_type == 'carousel'){
                                       if($('#product-grid-1583317122999 .product-grid-content').hasClass('block-type-product-listing')){
                                         var _item = $('.block-type-product-listing .product-grid-inner').attr('data-item-per-row');
                                         
                                         if( typeof _item == 'undefined' ){
                                          	 _item = 2;
                                         }
                                         
                                         jQuery("#product-grid-1583317122999 .product-listing-carousel").on('initialize.owl.carousel initialized.owl.carousel change.owl.carousel changed.owl.carousel', function(e) {
                                             var current = e.relatedTarget.current()
                                             var items = $(this).find('.owl-stage').children()
                                             var add = e.type == 'changed' || e.type == 'initialized'
                                 
                                             items.eq(e.relatedTarget.normalize(current )).toggleClass('current', add)
                                           }).owlCarousel({
                                             nav			: true
                                             ,dots 		: true
                                             ,items		: _item
                                             ,rtl			: jQuery('body').data('rtl')
                                             ,margin		: 0
                                             ,responsive : {
                                               0:{
                                                   items: 1
                                               }
                                               ,576:{
                                                   items: 2
                                               }
                                               ,992:{
                                                   items: _item
                                               }                                                                
                                             }
                                             ,navText	: ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                         });
                                       }
                                     
                                       else{
                                         jQuery("#product-grid-1583317122999 .product-grid-carousel").on('initialize.owl.carousel initialized.owl.carousel change.owl.carousel changed.owl.carousel', function(e) {
                                             var current = e.relatedTarget.current()
                                             var items = $(this).find('.owl-stage').children()
                                             var add = e.type == 'changed' || e.type == 'initialized'
                                 
                                             items.eq(e.relatedTarget.normalize(current )).toggleClass('current', add)
                                           }).owlCarousel({
                                             nav			: true
                                             ,dots 		: true
                                             ,items		: 6
                                             ,rtl			: jQuery('body').data('rtl')
                                             ,margin		: 0
                                             ,responsive 	: {
                                                 0:{
                                                     items: 1
                                                 }
                                                 ,375:{
                                                     items: 2
                                                 }
                                                 ,768:{
                                                     items: 4
                                                 }
                                                 ,1024:{
                                                     items: 6
                                                 }                                                                
                                             }
                                             ,navText	: ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                         });
                                       }
                                     }              
                                                      
                                   });        
                                 })
                              </script>
                              <style type="text/css">
                                 #product-grid-1583317122999 .product-grid-content .row {
                                 margin: 0;
                                 }
                                 #product-grid-1583317122999 .product-grid-content .row .product-grid-item {
                                 padding: 0;
                                 }	
                                 #product-grid-1583317122999 .product-grid-content.block-type-product-listing .product-listing-carousel .product-wrapper {
                                 margin-bottom: 0px;
                                 }
                                 #product-grid-1583317122999 .product-grid-content.block-type-product-listing-hw .product-grid-carousel .product-wrapper {
                                 margin-bottom: 0px;
                                 }
                              </style>
                           </div>
                        </div>
                        <!-- END content_for_index -->
                        <?php 
                            
                           }
                        ?>



                         <?php 
                           $kitchen = getKitchenCategory();
                           if(isset($kitchen) && !empty($kitchen)){
                             $i = 0;
                             $mid = $kitchen['id'];
                             $list = getKitchenCategoryProduct($mid);
                            
                               //if ($child_cats) {
                        ?>
                        <div id="shopify-section-1583317122999" class="shopify-section">
                           <div id="product-grid-1583317122999" class="product-grid-section layout-boxed" data-section-type="product-grid" data-section-id="1583317122999">
                              <div class="product-grid-inner navigator-position-1" data-type="carousel">
                                 <div class="product-grid-content block-type-product" style="background-color: #ffffff;">
                                    
                                    <div class="container">
                                       <div class="title-wrapper ">
                                          <h3><?php echo stripslashes($kitchen['title']);?></h3>
                                       </div>
                                       <div class="product-grid-inner">
                                          <div class="product-grid-carousel">

                                             
                                             <?php  

                                             foreach ($list as $row) {
                                                if($row['images'] != "" && file_exists('upload/product/'.$row['images'])){
                                                     $thumbnail = 'upload/product/'.$row['images'];
                                                   } else {
                                                     $thumbnail = FRONT_IMAGES.'no-image.png';
                                                   }

                                                 $id = $row['id'];
                                                 $content = $row['title'];
                                             
                                             ?>
                                            
                                             <div class="product-grid-item">
                                                <div class="product-wrapper  effect-overlay">
                                                   <div class="product-head">
                                                      <div class="product-image">
                                                         <div class="product-group-vendor-name">
                                                            
                                                            <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $row['id']; ?>" class="col-grey"><?php echo stripslashes($row['title']); ?></a></h5>
                                                         </div>
                                                         <div class="featured-img product-ratio-false">
                                                            <a href="detail?id=<?php echo $row['id']; ?>">
                                                               <span class="image-lazysize"  style="position:relative;padding-top:91.66666666666667%;">
                                                                  <!-- noscript pattern -->
                                                                  <noscript>
                                                                     <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" style="object-fit: unset" />
                                                                  </noscript>
                                                                  <img class="lazyload featured-image front img-lazy blur-up auto-crop-false"
                                                                     data-src="<?php echo $thumbnail;?>"
                                                                     data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                                                                     data-aspectratio="1.0909090909090908"
                                                                     data-expand="auto"
                                                                     data-sizes="auto"
                                                                     data-parent-fit="cover"
                                                                     alt="Kinla Product Sample"
                                                                     style="object-fit: unset"
                                                                     />
                                                               </span>
                                                               <?php   
                                                                 if(!empty($row['discount'])){
                                                                 ?>

                                                                  <span class="product-label">
                                                                     <span class="label-sale type-number bg-red">
                                                                     <span class="sale-text col-white">-<?php echo  $row['discount']; ?><sup>%</sup></span>
                                                                     </span>
                                                                     </span>

                                                              
                                                            <?php } ?>
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="product-content">
                                                      <div class="pc-inner">
                                                         <div class="price-cart-wrapper">
                                                            <div class="product-price notranslate">
                                                               <?php 
                                                             if($row['size_category'] == "different"){

                                                             $prices = $row['price'];
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $row['price'];
                                                         $discount =  $row['discount'];
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($row['price']).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                                                            </div>
                                                            <div class="product-add-cart mobile-false">
                                                              <?php 
                                                              if($row['quantity'] > 0){
                                                            ?>
                                                             <a  href="#" class="btn-add-cart select-options col-white bg-blue quickShop" title="Add to Cart" id="<?php echo $row['id']; ?>" ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                                                              
                                                            <?php }else{ ?>
                                                               <small class="col-red mobile-false">Sold out</small>
                                                            <?php } ?>
                                                            </div>
                                                         </div>
                                                         <div class="product-button">
                                                            
                                                            <div class="product-wishlist">
                                                               <a data-arn-action="add"  class='add-to-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo  $row['id'];?>);">
                                                                        <svg width="16" height="16" class="arn_icon demo-icon arn_icon-add-wishlist">
                                                                           <use xlink:href="#arn_icon-add-wishlist"></use>
                                                                        </svg>
                                                                        <svg width="16" height="16" class="arn_icon arn_icon-preloader">
                                                                           <use xlink:href="#arn_icon-preloader"></use>
                                                                        </svg>
                                                                        Add to Wishlist
                                                                     </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                         
                                          <?php } ?>

                                             
                                            
                                             

                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <script>
                                 jQuery(document).ready(function($) {
                                   var _sections = new theme.Sections();
                                   _sections.register('product-grid',function(){
                                         
                                     var _type = $('#product-grid-1583317122999 .product-grid-inner').attr('data-type');
                                 
                                     if(_type == 'carousel'){
                                       if($('#product-grid-1583317122999 .product-grid-content').hasClass('block-type-product-listing')){
                                         var _item = $('.block-type-product-listing .product-grid-inner').attr('data-item-per-row');
                                         
                                         if( typeof _item == 'undefined' ){
                                              _item = 2;
                                         }
                                         
                                         jQuery("#product-grid-1583317122999 .product-listing-carousel").on('initialize.owl.carousel initialized.owl.carousel change.owl.carousel changed.owl.carousel', function(e) {
                                             var current = e.relatedTarget.current()
                                             var items = $(this).find('.owl-stage').children()
                                             var add = e.type == 'changed' || e.type == 'initialized'
                                 
                                             items.eq(e.relatedTarget.normalize(current )).toggleClass('current', add)
                                           }).owlCarousel({
                                             nav         : true
                                             ,dots       : true
                                             ,items      : _item
                                             ,rtl        : jQuery('body').data('rtl')
                                             ,margin     : 0
                                             ,responsive : {
                                               0:{
                                                   items: 1
                                               }
                                               ,576:{
                                                   items: 2
                                               }
                                               ,992:{
                                                   items: _item
                                               }                                                                
                                             }
                                             ,navText : ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                         });
                                       }
                                     
                                       else{
                                         jQuery("#product-grid-1583317122999 .product-grid-carousel").on('initialize.owl.carousel initialized.owl.carousel change.owl.carousel changed.owl.carousel', function(e) {
                                             var current = e.relatedTarget.current()
                                             var items = $(this).find('.owl-stage').children()
                                             var add = e.type == 'changed' || e.type == 'initialized'
                                 
                                             items.eq(e.relatedTarget.normalize(current )).toggleClass('current', add)
                                           }).owlCarousel({
                                             nav         : true
                                             ,dots       : true
                                             ,items      : 6
                                             ,rtl        : jQuery('body').data('rtl')
                                             ,margin     : 0
                                             ,responsive    : {
                                                 0:{
                                                     items: 1
                                                 }
                                                 ,375:{
                                                     items: 2
                                                 }
                                                 ,768:{
                                                     items: 4
                                                 }
                                                 ,1024:{
                                                     items: 6
                                                 }                                                                
                                             }
                                             ,navText : ['<span class="button-prev"></span>', '<span class="button-next"></span>']
                                         });
                                       }
                                     }              
                                                      
                                   });        
                                 })
                              </script>
                              <style type="text/css">
                                 #product-grid-1583317122999 .product-grid-content .row {
                                 margin: 0;
                                 }
                                 #product-grid-1583317122999 .product-grid-content .row .product-grid-item {
                                 padding: 0;
                                 }  
                                 #product-grid-1583317122999 .product-grid-content.block-type-product-listing .product-listing-carousel .product-wrapper {
                                 margin-bottom: 0px;
                                 }
                                 #product-grid-1583317122999 .product-grid-content.block-type-product-listing-hw .product-grid-carousel .product-wrapper {
                                 margin-bottom: 0px;
                                 }
                              </style>
                           </div>
                        </div>
                        <!-- END content_for_index -->
                        <?php 
                            
                           }
                        ?>





                     </div>
                  </div>
               </div>
            </div>

           






<?php
//include("footer-newsletter-section.php");
//include("footer-section-two.php");
include("footer-partners.php");
include("footer-bottom.php");
?>

<script>
$('#loadProducts').addClass("loadingProducts");
  $('#loadCategories').addClass("loadingCategories");
  $('.featured-image').addClass("loadingOverlay");
        //When the page has loaded.
        $( document ).ready(function(){
         $('.featured-image').removeClass("loadingOverlay");
          $("#loader").hide();
            //Perform Ajax request.
            $.ajax({
                url: 'loadFrontProducts.php',
                type: 'get',
                success: function(data){
                    //If the success function is execute,
                    //then the Ajax request was successful.
                    //Add the data we received in our Ajax
                    //request to the "content" div.
                    $('#loadProducts').html(data).removeClass("loadingProducts");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Ajax request failed: ' + xhr.responseText;
                    $('#loadProducts').html(errorMsg).removeClass("loadingProducts");
                  }
            });
        });


        $( document ).ready(function(){

            //Perform Ajax request.
            $.ajax({
                url: 'loadFrontCategories.php',
                type: 'get',
                success: function(data){
                    //If the success function is execute,
                    //then the Ajax request was successful.
                    //Add the data we received in our Ajax
                    //request to the "content" div.
                    $('#loadCategories').html(data).removeClass("loadingCategories");
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Request failed: ' + xhr.responseText;
                    $('#loadCategories').html(errorMsg).removeClass("loadingCategories");
                    $(".product_item").removeClass("loadingCategories");
                  }
            });
        });
        </script>