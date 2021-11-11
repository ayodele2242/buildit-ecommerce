 <?php
include("header.php");
include("header-bottom.php");
error_reporting(0);

//if(isset($_GET['id'])){
$p_id = (int)$_GET['id'];
//debugger($p_id);
$product = new Product();
$product_detail = $product->getProductByIdForDetail($p_id);
//debugger($product_detail);
$category_id = $product_detail[0]->cat_id;
//debugger($product_detail[0]->cat_id,true);
$picked_product = $product->getProductByCatId($category_id, $p_id);
//debugger($product_detail);
$all_images =explode(',', $product_detail[0]->image);
//debugger($all_images);
//debugger($all_images,true); 

$perPage = 2;
$sqlQuery = "SELECT * FROM  review_rating WHERE product_id = '$p_id'";
$result = mysqli_query($mysqli, $sqlQuery);
$totalRecords = mysqli_num_rows($result);
$totalPages = ceil($totalRecords/$perPage);

$sqlQuery2 = mysqli_query($mysqli,"SELECT * FROM  product_sizes WHERE product_id = '$p_id' order by variant_price");

$_SESSION['pid'] = $p_id;
$ratings = avgRating($p_id);
 ?>

<style type="text/css">
  .btn-wishlist{
     
    width: 40px;
    height: 40px;
    border-radius: 100%;
    background-color: red;
    font-size: 24px;
    color: #fff;
    display: flex;
    transition:color 0.25s ease-in-out;
    border: none;
    justify-content: center;
    align-items: center;

  }
  .btn-wishlist:hover{
    background-color: rgb(192, 94, 94);
    transition: all .3s ease 0s 
  }
</style>

 <!-- Page Title (Shop)-->
 <div id="body-content">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">

    <div class="page-title-overlap pt-0" style="background: transparent;">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo $set['installUrl']; ?>"><i class="fa fa-home"></i> Home</a></li>
              
              <li class="breadcrumb-item text-nowrap active" aria-current="page col-blue"><?php echo $product_detail[0]->title; ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0 col-blue" ><?php echo $product_detail[0]->title; ?></h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->

     <div class="containers bg-light">
      <!-- Gallery + details-->
      <div class="bg-light box-shadow-lg  px-4 py-3 mb-3">
        <div class="px-lg-3">
          <div class="row">

             <div class="col-lg-7 pr-lg-0 pt-lg-4">
              <div class="cz-product-gallery">
                  <div class="cz-preview order-sm-2">
                  <?php 
                  $j = 1;
                   foreach ($all_images as $key => $img) {  
                    $item_class = ($j == 1) ? 'cz-preview-item active' : 'cz-preview-item';
                    ?>

                    <div class="<?php echo $item_class; ?>" id="image-<?php echo $j; ?>"><img class="cz-image-zoom" src="<?php echo UPLOAD_URL.'product/'.$img;?>" data-zoom="<?php echo UPLOAD_URL.'product/'.$img;?>" alt="<?php echo $product_detail[0]->title; ?>">
                    <div class="cz-image-zoom-pane"></div>
                  </div>

                    <?php $j++; } ?>

                  </div>
                  <div class="cz-thumblist order-sm-1">
                     <?php 
                  $i = 1;
                  foreach ($all_images as $key => $img) {  
                  $item_class = ($i == 1) ? 'cz-thumblist-item active' : 'cz-thumblist-item';
                    ?>
                <a class="<?php echo $item_class; ?>" href="#image-<?php echo$i; ?>"><img src="<?php echo UPLOAD_URL.'product/'.$img;?>" alt="<?php echo $product_detail[0]->title; ?>"></a>

                  <?php $i++; } ?>


                  </div>




              </div>
            </div>
             <!-- Product details-->
            <div class="col-lg-5 pt-4 pt-lg-0">
              <form id="productForm">
              <div class="product-details ml-auto pb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <a href="#reviews" data-scroll>
                    <div class="star-rating">
                      <?php 

                      echo '<span style="font-size: 18px;">' .$ratings. "</span> <span class='stars'>";
                          for ( $i = 1; $i <= 5; $i++ ) {
                              if ( round( $ratings - .25 ) >= $i ) {
                                  echo "<i class='fa fa-star'></i>"; //fas fa-star for v5
                              } elseif ( round( $ratings + .25 ) >= $i ) {
                                  echo "<i class='fa fa-star-half-o'></i>"; //fas fa-star-half-alt for v5
                              } else {
                                  echo "<i class='fa fa-star-o'></i>"; //far fa-star for v5
                              }
                          }
                          echo '</span>';


                      /*$rate = isset($ratings) ? $ratings : 0 ;
                      for ($i=1; $i<=5; $i++) {
                        $class = $i<=$rate ? "fa-star star-filled" : "fa-star-o empty" ;
                        echo '<i class="fa '.$class.'"></i>';
                      }*/
                      ?> 
                      (<?php 
                    if(review($p_id) < 2){
                    echo review($p_id) .' Review';
                    }else{
                    echo review($p_id). ' Reviews';
                  }
                  ?>)
                    </div>

                    <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">

                    

                  </span></a>
                  <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">
                    <?php if (isset($product_detail[0]->brand)) {?>
                 <strong>Brand:</strong> <?php echo stripcslashes($product_detail[0]->brand); ?>
            <?php } ?>
          </span>

                  <button class="btn-wishlist mr-0 mr-lg-n3" type="button" onclick="addToWishlist(<?php echo $product_detail[0]->id;?>);" data-toggle="tooltip" title="Add to wishlist">
                    <i class="fa fa-heart"></i>
                  </button>

                </div>

                



                <div class="mb-3">

                  <?php 
                   if($product_detail[0]->size_category == "different"){
                         $prices = $product_detail[0]->price;
                         $amt = explode(",", $prices);
                         $min = min($amt);
                         $max = max($amt);

                         $price = $min;

                         $prices = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                         echo '<h3>'.$prices.'</h3>';
                         

                        }else{
                        $price = $product_detail[0]->price;
                        $discount = $product_detail[0]->discount;
                        if($discount > 0){
                          $price = $price-(($price*$discount)/100);
                        }
                    ?>

                  <span class="h3 font-weight-normal text-accent mr-1"><?php echo $left_currency.number_format($price).$right_currency; ?></span>
                  <?php
                  if($discount > 0){
                        echo ' <del class="text-muted font-size-lg mr-3">'.$left_currency.number_format($product_detail[0]->price).$right_currency.'</del>';
                    }
                  }
                  ?><!--<span class="badge badge-danger badge-shadow align-middle mt-n2">Sale</span>-->

                </div>

                <div class="price">
             
            <span class="price-new mb-4"><span id="price-old"><?php //echo " ".$left_currency.number_format($price).$right_currency; ?></span></span>
             
            <br />
            <br />

             
              <div class="hurry-up">
                <div class="heading">
                  Hurry! <span>Only <b class="col-red"><?php echo $product_detail[0]->quantity  ?></b> left in stock!</span> 
                </div>
                <div class="line"><div class="line2"></div></div>
              </div>
                       
            <!--<span class="price-tax">Ex Tax: <span id="price-tax">$2,000.00</span></span><br />-->
             
             
             
          </div>



                

                <?php 
                 if (!empty($product_detail[0]->color)) {
                ?>
                
              <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center pb-1">
                      <label class="font-weight-medium" for="product-color">Pick Color:</label>
                    </div>

                    <div id="input-options" class="d-flex flex-wrap input-options">

                  <?php
                   $colors = explode(",", $product_detail[0]->color);
                     foreach($colors as $icolor){
                      $icolors = str_replace(" ", "", $icolor);
                      if( preg_match("/_|&|%/", $icolors) )
                       {
                        $names_array = array_map('trim',explode('&', $icolors));
                        $grad = array();
                        foreach($names_array as $gradient){
                        //echo $names_array[2];
                          
                          $grad[] = $gradient;

                          }
                          $grad = implode(",", $grad);  
                          


                  ?>
                   <div class="radio  iradio-type-button2" style="background-image: linear-gradient(to right, <?php echo  $grad; ?>
    );"  data-toggle="tooltip" data-placement="top" title="<?php echo $icolors; ?>">
                    <?php
                   

                 }else{
                   ?>
                   <div class="radio  iradio-type-button2" style="background: <?php  echo $icolors; ?>"  data-toggle="tooltip" data-placement="top" title="<?php  echo $icolors; ?>">
                   <?php
                   }
                  ?>

                     <label class="checkLabel">
                       <input type="radio" name="color" class="colors"  data-size="<?php echo  $icolors;  ?>" value="<?php echo  $icolors ?>" />

                       <span class="text">
                       
                       </span>

                     </label>

                   </div>                   
                   <?php
                     }
                   ?>

                

                 </div>




                     <div class="d-flex flex-wrap">
                    
                   </div>
                   
                  </div>

                <?php } 

                if($product_detail[0]->availability == 1){
                ?>

                 <div class="position-relative mr-n4 mb-3">                
                  <div class="product-badge product-available mt-n1"><i class="fa fa-check-square-o"></i>Product available</div>
                </div>

                <?php
              }else{
                ?>
                <div class="position-relative mr-n4 mb-3 mt-n0">                
                  <div class="product-badge product-available bg-red mt-n1"><i class="fa fa-info-circle"></i>Product Unavailable</div>
                </div>
              <?php
              }
              ?>
                 <?php 
                 if ($product_detail[0]->size_category == "single" && !empty($product_detail[0]->size)) {
                ?>
                  <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center pb-1">
                      <label class="font-weight-medium" for="product-size">Pick Size:</label>
                    </div>

                  
                    <div id="input-option" class="radios">
                       <?php
                      $sizes = explode(",", $product_detail[0]->size);
                       foreach($sizes as $isize){
                        ?>

                       <div class="radio  radio-type-button2" data-toggle="tooltip" data-placement="top" title="<?php echo $isize; ?>">
                     <label>
                       <input type="radio" name="product_size" value="<?php echo  $isize;  ?>" />
                       <span class="text"><?php echo  $isize;  ?>
                        
                       </span>
                     </label>
                   </div> 
                   <?php
                   }

                      ?>        

                       <input type="hidden" name="sprice" id="prize" value="<?php echo  $price; ?>" >
                       <input type="hidden" name="sseller" value="<?php echo $product_detail[0]->vendor_name; ?>">
                       <input type="hidden" name="product_id" value="<?php echo $product_detail[0]->id; ?>">
                       <input type="hidden" name="cat_type" id="cat_type" value="single">

                    </div> 

                  </div>
                <?php 
              }
                 if ($product_detail[0]->size_category == "different") {
               
                //get item size variance with price


                  ?>


            <div id="product">
               <div class="options">
                 <div class="form-group">
                  <div class="d-flex justify-content-between align-items-center pb-1">
                      <label class="font-weight-medium" for="product-size">Pick Size:</label>
                    </div>
                 <div id="input-option" class="d-flex flex-wrap">

                  <?php
                  $color_arrar = array('#9933CC','#4285F4','#880e4f','#01579b','#e65100');
                  //$size_of_array = sizeof($color_arrar);
                  $x=0;
                  while($result = mysqli_fetch_array($sqlQuery2)){
                    $x++;
                    //$n = rand(0,$size_of_array-1);
                    //$color = $color_arrar[$n%5];
                    $color = $color_arrar[$x%5];
                  ?>
                   <div class="radio  radio-type-button2" style="background: <?php  echo $color; ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $left_currency.number_format($result['variant_price']).$right_currency; ?>">
                     <label>
                       <input type="radio" name="product_price" id="<?php echo  $result['id'];  ?>" data-size="<?php echo  $result['size'];  ?>" value="<?php echo  $result['variant_price']  ?>" />
                       <span class="text"><?php echo  $result['size'];  ?>
                        
                       </span>
                     </label>
                   </div>                   
                   <?php
                     }
                   ?>

                   <input type="hidden" name="dproduct_id" id="product_id">
                   <input type="hidden" name="dsize" id="size">
                   <input type="hidden" name="dprice" id="prize">
                   <input type="hidden" name="dseller" value="<?php echo $product_detail[0]->vendor_name; ?>">
                   <input type="hidden" name="cat_type" id="cat_type" value="different">
                   <input type="hidden" name="img" id="imgy">

                 </div>

               </div>
           
                </div>

            </div>



                <?php
                } 
                ?>

                <div class="form-group d-flex align-items-center">
                <div class="quantity">
                  <input type="text" name="quantity" id="quantity_wanted" size="2" value="1" />
                  <a type="button" id="q_up" class="bg-blue qup"><i class="fa fa-plus col-white"></i></a>
                  <a type="button" id="q_down" class="bg-red"><i class="fa fa-minus col-white"></i></a>
                </div>



                   <!-- <select class="custom-select mr-3" style="width: 5rem;">
                      <?php
                      for ($i=1; $i<=50; $i++)
                      {
                          ?>
                              <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php
                      }
                      ?>
                    </select>-->
                <?php 
                if($product_detail[0]->quantity > 0){
                ?>
                    <button class="btn btn-primary btn-shadow btn-md" type="submit" id="addToCart"><i class="fa fa-cart font-size-lg mr-2"></i>Add to Cart</button>
                 <?php
                 }else{
                  ?>

                   <button class="btn bg-dark btn-shadow btn-md inactive disabled" type="submit" ><i class="fa fa-cart font-size-lg mr-2"></i>Sold out</button>

                  <?php
                  }   
                  ?>
                  </div>
              



                <!-- Product panels-->
                <div class="accordion mb-4" id="productPanels">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading"><a href="#productInfo" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="czi-announcement text-muted font-size-lg align-middle mt-n1 mr-2"></i>Product summary<span class="accordion-indicator"><i data-feather="chevron-up"></i></span></a></h3>
                    </div>
                    <div class="collapse show" id="productInfo" data-parent="#productPanels">
                      <div class="card-body font-size-ms">
                      <?php echo $product_detail[0]->summary;?>
                      </div>

                    </div>
                  </div>
                 
              
                </div>
              
              </div>
            </div>
</form>
</div>

 </div>
  </div>
           

<section class="p-4">
<div class="borntabs wrapper theme-plum ">
  <div class="ui-tabgroup">
    <input class="ui-tab1" type="radio" id="tgroup_a_tab1" name="tgroup_a" checked />
    <input class="ui-tab2" type="radio" id="tgroup_a_tab2" name="tgroup_a" />
    <!--<input class="ui-tab3" type="radio" id="tgroup_a_tab3" name="tgroup_a" />-->
    <div class="ui-tabs">
      <label class="ui-tab1" for="tgroup_a_tab1"><i class="fa fa-info-circle"></i>Product Details</label>
      <label class="ui-tab2" for="tgroup_a_tab2"><i class="fa fa-star"></i>Reviews</label>
      <!--<label class="ui-tab3" for="tgroup_a_tab3"><i class="fa fa-info-circle"></i></label>-->
    </div>
    <div class="ui-panels">
      <div class="ui-tab1 col-black">
       <?php echo html_entity_decode($product_detail[0]->description); ?>
      </div>
      <div class="ui-tab2">
        <div class="loading-div"><img src="assets/img/loading.gif" ></div>
        <div id="cresults"><!-- content will be loaded here --></div>

      </div>
      <!--<div class="ui-tab3">
        
      </div>-->
    </div>
  </div>

</div>
</section>

 
 <?php
  if($picked_product){
    ?>

<div id="shopify-section-1583317122999" class="shopify-section">
                           <div id="product-grid-1583317122999" class="product-grid-section layout-boxed" data-section-type="product-grid" data-section-id="1583317122999">
                              <div class="product-grid-inner navigator-position-1" data-type="carousel">
                                 <div class="product-grid-content block-type-product">
                                    
                                    <div class="container">
                                       <div class="title-wrapper ">
                                          <h3>Related Products</h3>
                                       </div>
                                       <div class="product-grid-inner">
                                          <div class="product-grid-carousel">

                                             
                                             <?php  

                                             foreach ($picked_product as $key => $row) {
                                                if($row->images != "" && file_exists('upload/product/'.$row->images)){
                                                     $thumbnail = 'upload/product/'.$row->images;
                                                   } else {
                                                     $thumbnail = FRONT_IMAGES.'no-image.png';
                                                   }

                                                 $id = $row->id;
                                                 $content = $row->title;
                                             
                                             ?>
                                            
                                             <div class="product-grid-item">
                                                <div class="product-wrapper  effect-overlay">
                                                   <div class="product-head">
                                                      <div class="product-image">
                                                         <div class="product-group-vendor-name">
                                                            
                                                            <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $row->id; ?>" class="col-grey"><?php echo stripslashes($row->title); ?></a></h5>
                                                         </div>
                                                         <div class="featured-img product-ratio-false">
                                                            <a href="detail?id=<?php echo $row->id; ?>">
                                                               <span class="image-lazysize"  style="position:relative;padding-top:91.66666666666667%;">
                                                                  <!-- noscript pattern -->
                                                                  <noscript>
                                                                     <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row->title); ?>" style="object-fit: unset" />
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
                                                                 if(!empty($row->discount)){
                                                                 ?>

                                                                  <span class="product-label">
                                                                     <span class="label-sale type-number bg-red">
                                                                     <span class="sale-text col-white">-<?php echo  $row->discount; ?><sup>%</sup></span>
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
                                                             if($row->size_category == "different"){

                                                             $prices = $row->price;
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $row->price;
                                                         $discount =  $row->discount;
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($row->price).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                                                            </div>
                                                            <div class="product-add-cart mobile-false">
                                                               <?php 
                                                              if($row->quantity > 0){
                                                            ?>
                                                             <a  href="detail?id=<?php echo $row->id; ?>" class="btn-add-cart select-options col-white bg-blue "  ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                                                              
                                                            <?php }else{ ?>
                                                               <small class="col-red mobile-false">Sold out</small>
                                                            <?php } ?>
                                                            </div>
                                                         </div>
                                                         <div class="product-button">
                                                          
                                                            <div class="product-wishlist">
                                                              <a data-arn-action="add"  class='add-to-wishlist btn-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo  $row->id;?>);">
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
                                             nav      : true
                                             ,dots    : true
                                             ,items   : _item
                                             ,rtl     : jQuery('body').data('rtl')
                                             ,margin    : 0
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
                                             nav      : true
                                             ,dots    : true
                                             ,items   : 6
                                             ,rtl     : jQuery('body').data('rtl')
                                             ,margin    : 0
                                             ,responsive  : {
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
  

<?php
}else{
  echo '<div class="alert alert-default text-danger">No related products found for this item.</div>';
}


?>


    






</div>



      </div>


 
<!--tab here-->

</div>
  <!-- Product carousel (You may also like)-->



</div>
</div>
</div>




 <script src="js/vendor.min.js"></script>
      <script src="js/theme.min.js"></script>
 <?php 
include("footer-bottom.php");
 ?>

 <script type="text/javascript">
   $(document).ready(function() {
  $("#cresults").load( "fetch_reviews.php"); //load initial records
  $(".loading-div").hide();
  //executes code below when user click on pagination links
  $("#cresults").on( "click", ".pagination a", function (e){
    e.preventDefault();
    //
    $(".loading-div").show(); //show loading element
    var page = $(this).attr("data-page"); //get page number from link

    $("#cresults").load("fetch_reviews.php",{"page":page}, function(){ //get content from PHP page
      $(".loading-div").hide(); //once done, hide loading element
    });
    
  });
});
 </script>