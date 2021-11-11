<?php
include("header.php");
include("header-bottom.php");
 $category = new Category();
  $product = new Product();
  $parent_id = null;
  $child_cat_id = null;

  if (isset($_GET['cid'])) {
    $parent_id = (int)$_GET['cid'];
     $cat = $category->getCategoryById($parent_id);
  }

  if (isset($_GET['child_id'])) {
    $child_cat_id = (int)$_GET['child_id'];
    $cat = $category->getCategoryById($child_cat_id);

  }

  $category_product = $product->getProductByCategory($parent_id, $child_cat_id);


?>



    <!--<div class="pt-2 pb-2">
      <div class="container pt-2 pb-3 pt-lg-2 pb-lg-2">
        <div class="d-lg-flex justify-content-between pb-2">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo $set['installUrl'];  ?>"><i class="fa fa-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="#" style="background: transparent;">Products</a>
                </li>
                <li class="breadcrumb-item text-nowrap"><a href="#" style="background: transparent;">Categories</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $cat[0]->title; ?></li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
            <h1 class="h3 text-light mb-0 col-blue"><?php echo $cat[0]->title; ?></h1>
          </div>
        </div>
      </div>
    </div>-->



    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-1 shopify-section">
      <div class="main-content">

          <div id="breadcrumb" class="breadcrumb-holder container">

        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="<?php echo $set['installUrl'];  ?>">
              <span itemprop="name" class="d-none"><?php echo $set['storeName'];  ?></span>Home
              <meta itemprop="position" content="1"> 
            </a>
          </li>
              <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="d-none">
                <a href="/collections/gadgets" itemprop="item">
                  <span itemprop="name"><?php echo $cat[0]->title; ?></span>
                  <meta itemprop="position" content="2">
                </a>
              </li>
              <li class="active"><?php echo $cat[0]->title; ?></li>
        </ul>
  </div>
</div>


<div class="container">
  <div class="row">

   
    <div class="main-cata-page col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="wrap-cata-title">
        <h2><?php echo $cat[0]->title; ?></h2>
      </div>
      <div class="cata-toolbar">
        <div class="group-toolbar">
         

          <div class="grid-list">
            <span class="text">View</span>
            <span class="grid grid-4 active" title="Grid" data-grid="grid-4">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th fa-w-16 fa-2x">
                <path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z" class=""></path>
              </svg>
            </span>
            <span class="grid grid-3" title="Large" data-grid="grid-3">
              <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="th-large" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th-large fa-w-16 fa-2x">
                <g class="fa-group">
                  <path fill="currentColor" d="M488 272H296a24 24 0 0 0-24 24v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V296a24 24 0 0 0-24-24zm-272 0H24a24 24 0 0 0-24 24v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V296a24 24 0 0 0-24-24z" class="fa-secondary"></path>
                  <path fill="currentColor" d="M488 32H296a24 24 0 0 0-24 24v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V56a24 24 0 0 0-24-24zm-272 0H24A24 24 0 0 0 0 56v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V56a24 24 0 0 0-24-24z" class="fa-primary"></path>
                </g>
              </svg>
            </span>
            <span class="grid grid-2" title="List" data-grid="grid-2">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-list fa-w-16 fa-2x">
                <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" class=""></path>
              </svg>
            </span>
            <span class="grid grid-1" title="List Small" data-grid="grid-1">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th-list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th-list fa-w-16 fa-2x">
                <path fill="currentColor" d="M149.333 216v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-80c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zM125.333 32H24C10.745 32 0 42.745 0 56v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24zm80 448H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm-24-424v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24zm24 264H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24z" class=""></path>
              </svg>
            </span>
          </div>
          <div class="sort-by bc-toggle">
            <div class="sort-by-inner">
              <label class="d-none d-md-block">Sort by</label>
              <div id="cata_sort_by">
                <button id="sort_by_button">
                <span class="name"><a href="javascript:;"></a></span>
                <i class="demo-icon icon-down-dir"></i>
                </button>
              </div>
              <ul id="sort_by_box" class="bc-dropdown">
                <!--<li class="sort-action title-ascending" data-sort="title-ascending"><a href="javascript:;">Name, A-Z</a></li>
                <li class="sort-action title-descending" data-sort="title-descending"><a href="javascript:;">Name, Z-A</a></li>-->
                <li class="sort-action price-ascending" data-sort="price-ascending"><a href="javascript:;">Price, Low To High</a></li>
                <li class="sort-action price-descending" data-sort="price-descending"><a href="javascript:;">Price, High To Low</a></li>
                
               
              </ul>
            </div>
           
          </div>
         
        </div>
      </div>
      <div id="col-main">
        <div class="cata-product cp-grid isotope-grid">

          <?php 
                if($category_product){
                  $counter = 1;
                  foreach($category_product as $cat_product){
                     if($cat_product->images != "" && file_exists('upload/product/'.$cat_product->images)){
                        $thumbnail = 'upload/product/'.$cat_product->images;
                      } else {
                        $thumbnail = FRONT_IMAGES.'no-image.png';
                      }

                       if($row['size_category'] == "different"){

                             $prices = $cat_product->price;
                             $amt = explode(",", $prices);
                             
                             //$min = min($amt);
                             $iprice = max($amt);

                            
                        }else{
                         $iprice =  $cat_product->price;
                         }
                  ?>
          
            <div class="product-grid-item mode-view-item grid-item" >
            <div class="product-wrapper  effect-overlay">
              <div class="product-head">
                <div class="product-image">
                  <div class="product-group-vendor-name">
                  
                    <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $cat_product->id; ?>"><?php echo stripslashes($cat_product->title); ?></a></h5>
                  </div>
                  <div class="featured-img product-ratio-false">
                    <a href="detail?id=<?php echo $cat_product->id; ?>">
                      <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                        <!-- noscript pattern -->
                        <noscript>
                          <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($cat_product->title); ?>" style="object-fit: unset" />
                        </noscript>
                        <img class="featured-image front img-lazy blur-up auto-crop-false lazyautosizes lazyloaded" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-expand="auto" data-sizes="auto" data-parent-fit="cover" alt="Soltone Product Sample" style="object-fit: unset" data-srcset="<?php echo $thumbnail;?> 320w, <?php echo $thumbnail;?> 720w, <?php echo $thumbnail;?> 1080w, <?php echo $thumbnail;?> 1366w, <?php echo $thumbnail;?> 1920w, <?php echo $thumbnail;?> 2048w" sizes="146.18181818181816px" srcset="<?php echo $thumbnail;?> 320w, <?php echo $thumbnail;?> 540w, <?php echo $thumbnail;?> 720w, <?php echo $thumbnail;?> 1080w, <?php echo $thumbnail;?> 1366w, <?php echo $thumbnail;?> 1920w, <?php echo $thumbnail;?> 2048w">
                      </span>
                    </a>
                  </div>
                 
                </div>
              </div>
              <div class="product-content">
                <div class="pc-inner">
                  <div class="price-cart-wrapper">
                    <div class="product-price notranslate product-card" data-price="<?php echo $iprice; ?>">
                     <?php 
                                                             if($row['size_category'] == "different"){

                                                             $prices = $cat_product->price;
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $cat_product->price;
                                                         $discount =  $cat_product->discount;
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($cat_product->price).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                    </div>
                    <div class="product-add-cart mobile-false">
                      <?php 
                        if($cat_product->quantity > 0){
                      ?>
                       <a  href="#" class="btn-add-cart select-options col-white bg-blue quickShop" title="Add to Cart" id="<?php echo $cat_product->id; ?>" ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                        
                      <?php }else{ ?>
                         <small class="col-red mobile-false">Sold out</small>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="product-button">
                   
                    <div class="product-wishlist">
                  <a data-arn-action="add"  class='add-to-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo $cat_product->id;?>);">
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

            <?php } }else{
            echo "Nothing here";
            }

            ?>


        </div>
      </div>
    </div>
  </div>
</div>




</div>


</div>


<?php
//include("footer-newsletter-section.php");
//include("footer-section-two.php");
//include("footer-partners.php");
include("footer-bottom.php");
?>

<script type="text/javascript">
   $( document ).ready(function(){
   $(".loader-top").hide();


    $('.sort-action').click(function(){  // add event any time the sort box changes
      var sortingMethod = jQuery(this).attr('data-sort');
      //alert(value);
        
      if(sortingMethod == 'price-ascending') {
        sortProductsPriceAscending();
      } else if (sortingMethod == 'price-descending') {
        sortProductsPriceDescending();
      }
      
      });

    function sortProductsPriceAscending() {
  var gridItems = $('.grid-item');

  gridItems.sort(function(a, b) {
    return $('.product-card', a).data("price") - $('.product-card', b).data("price");
  });

  $(".isotope-grid").append(gridItems);
}

function sortProductsPriceDescending() {
  var gridItems = $('.grid-item');

  gridItems.sort(function(a, b) {
    return $('.product-card', b).data("price") - $('.product-card', a).data("price");
  });

  $(".isotope-grid").append(gridItems);
}

   });


</script>