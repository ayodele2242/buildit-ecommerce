 <?php
include("header.php");
include("navs.php");
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



    <div class="bg-blue pt-4 pb-5">
      <div class="container pt-2 pb-3 pt-lg-2 pb-lg-2">
        <div class="d-lg-flex justify-content-between pb-2">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo $set['installUrl'];  ?>"><i class="fa fa-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="#">Products</a>
                </li>
                <li class="breadcrumb-item text-nowrap"><a href="#">Categories</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $cat[0]->title; ?></li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
            <h1 class="h3 text-light mb-0"><?php echo $cat[0]->title; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-4">
     
     <div class="row">
              <?php 
                if($category_product){
                  $counter = 1;
                  foreach($category_product as $cat_product){
                  ?>

                    <div class="col-lg-3 col-6 px-0 px-sm-2 mb-sm-4">
                    <div class="card product-card card-static">
                     <!-- <button class="btn-wishlist btn-sm comp-hide" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="fa fa-heart"></i></button>-->
                      <?php 
                     if($cat_product->images != "" && file_exists(UPLOAD_DIR.'/product/'.$cat_product->images)){
                        $thumbnail = UPLOAD_URL.'product/'.$cat_product->images;
                      } else {
                        $thumbnail = FRONT_IMAGES.'no-image.png';
                      }
                    ?>

                      <a class="card-img-top d-block overflow-hidden" href="details?id=<?php echo $cat_product->id; ?>">
                        <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($cat_product->title); ?>" class="">
                      </a>

                      <div class="card-body py-2">
                        <h3 class="product-title font-size-sm"><a  href="details?id=<?php echo $cat_product->id; ?>"><?php echo stripcslashes($cat_product->title); ?></a></h3>
                        <div class="d-flex justify-content-between price-star">
                          <div class="product-price">
                            <span class="text-accent">
                            <?php 

                         if($cat_product->size_category == "different"){
                           $prices = $cat_product->price;
                         $amt = explode(",", $prices);
                         $min = min($amt);
                         $max = max($amt);

                         $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                         echo $price;

                         }else{    

                        $price =  $cat_product->price;
                        $discount =  $cat_product->discount;
                        if($discount > 0){
                          $price = $price-(($price*$discount)/100);
                        }

                        echo " ".$left_currency.number_format($price).$right_currency;
                        if($discount > 0){

                          echo ' <del class="product-old-price">  '.$left_currency.number_format( $cat_product->price).$right_currency.'</del>';
                        }

                      }

                      ?>

                          </span>
                        </div>
                          <div class="star-rating">


                       <?php 
                      if(review($cat_product->id) < 1){
                       $class = "fa-star-o empty"; 
                      for($i=0; $i<5; $i++){
                       if($cat_product->rating <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      }
                      else{
                      $class = "fa-star star-filled";
                      for($i=0; $i<5; $i++){
                      if($cat_product->rating <= $i){
                            $class = "fa-star-o empty";
                      }
                    echo '<i class="fa '.$class.'"></i>';
                       
                      }
                    }
                      ?>

                          </div>
                        </div>
                      </div>
                  
                  <div class="product-btns">
                    <?php
                if($cat_product->size_category == "different" || $cat_product->size_category == "single"){

                } else{ 
                ?>
                <button class="btn-wishlist btn-sm wish" onclick="addToWishlist(<?php echo  $cat_product->id;?>);" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                
                <button class="add-to-cart bg-blue"  onclick="addToCart(<?php echo  $cat_product->id;?>);" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>
              <?php } ?>
              </div>

              <?php   
              if(!empty($cat_product->discount)){
              ?>
               <span class="sale-discount">-<?php echo  $cat_product->discount; ?>%</span>
               <!--Loader placeholder-->
               <?php
               }
               ?>

              

               <div class="loader-top">
                 <div class="ph-item">
                <div class="ph-col-12">
                  <div class="ph-picture"></div>
                  <div class="ph-row">
                     <div class="ph-col-6 big mb-3"></div>
                     <div class="ph-col-6 empty big"></div>
                    <div class="ph-col-6 small"></div>
                    <div class="ph-col-4 empty big"></div>
                    <div class="ph-col-2 small"></div>
                  </div>
                </div>
              </div>

               </div>
        
      <!--Loader placeholder #END-->



                    </div>
                  </div>








                  <?php

              if($counter%4 == 0){
                echo '<div class="clearfix"></div>';
              }
              $counter++;
               }
               }else{
                echo "No product found.";
               }
               ?>
              <!-- /Product Single -->



  </div>
  

</div>

















 <?php
include("footer.php");
 ?>