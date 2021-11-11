 <?php
include("header.php");
//include("navs.php");

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


//for total count data
/*$countSql = "SELECT COUNT(id) FROM review_rating WHERE product_id = '$p_id'";  
$tot_result = mysqli_query($mysqli, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$sql = "SELECT * FROM review_rating WHERE product_id = '$p_id'  ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($mysqli, $sql); 
$_SESSION['pid'] = $p_id;*/
$_SESSION['pid'] = $p_id;
 ?>



 <!-- Page Title (Shop)-->
    <div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo $set['installUrl']; ?>"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item text-nowrap"><span class=""></span><a href="#">Products</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $product_detail[0]->title; ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0"><?php echo $product_detail[0]->title; ?></h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->

     <div class="container">
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
              <div class="product-details ml-auto pb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <a href="#reviews" data-scroll>
                    <div class="star-rating">
                     <?php
                     if(review($p_id) < 1){
                       $class = "fa-star-o empty"; 
                      for($i=0; $i<5; $i++){
                        if($product_detail[0]->rating <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      }
                      else{

                      $class = "fa-star star-filled"; 
                      for($i=0; $i<5; $i++){
                        if($product_detail[0]->rating <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      }

                       ?>
                    </div>

                    <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">

                    <?php 
                    if(review($p_id) < 2){
                    echo review($p_id) .' Review';
                    }else{
                    echo review($p_id). ' Reviews';
                  }
                  ?>

                  </span></a>
                  <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">
                    <?php if (isset($product_detail[0]->brand)) {?>
                 <strong>Brand:</strong> <?php echo stripcslashes($product_detail[0]->brand); ?>
            <?php } ?>
          </span>

                  <button class="btn-wishlist mr-0 mr-lg-n3" type="button" onclick="addToWishlist(<?php echo $children->id;?>);" data-toggle="tooltip" title="Add to wishlist">
                    <i class="fa fa-heart"></i>
                  </button>

                </div>
                <div class="mb-3">
                  <?php 
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
                  ?><!--<span class="badge badge-danger badge-shadow align-middle mt-n2">Sale</span>-->
                </div>



                

                <?php 
                 if (!empty($product_detail[0]->color)) {
                ?>
                
                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center pb-1">
                      <label class="font-weight-medium" for="product-color">Pick Color:</label>
                    </div>
                     <div class="d-flex flex-wrap">
                    <!--<select class="custom-select" id="product-color" name="program" style="width: 18rem;">
                      <option value="">Select color</option>-->
                     <?php

                     $colors = explode(",", $product_detail[0]->color);
                     foreach($colors as $icolor){
                      $icolors = str_replace(" ", "", $icolor);
                      ?>

                    <div class="custom-control custom-option text-center mb-2 mx-1" style="width: 4rem;">
                    <input class="custom-control-input filter_all color" type="radio" id="<?php echo $icolor;?>" name="color">
                    <label class="custom-option-label rounded-circle" for="<?php echo $icolor;  ?>"><span class="custom-option-color rounded-circle" style="background-color: <?php echo $icolors;  ?>;"></span></label>
                    <label class="d-block font-size-xs text-muted mt-n1" for="<?php echo $icolor;  ?>"><?php echo ucwords($icolor);  ?></label>
                  </div>

                    
                    <!--<option value='.$icolor.'>'.$icolor.'</option>--> 

                    <?php
                    }
                     ?>
                   </div>
                    <!--</select>
                  </div>-->

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
                 if (!empty($product_detail[0]->size)) {
                ?>
                  <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center pb-1">
                      <label class="font-weight-medium" for="product-size">Size:</label>
                    </div>


                    <select class="custom-select" required id="product-size" style="width: 18rem;">
                      <option value="">Select size</option>
                      <?php
                      $sizes = explode(",", $product_detail[0]->size);
                       foreach($sizes as $isize){
                    //your code to do something with the mark.
                      echo '<option value='.$isize.'>'.$isize.'</option>'; 

                  }

                      ?>
                    </select>
                  </div>
                <?php } ?>

                  <div class="form-group d-flex align-items-center">
                    <select class="custom-select mr-3" style="width: 5rem;">
                      <?php
                      for ($i=1; $i<=50; $i++)
                      {
                          ?>
                              <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php
                      }
                      ?>
                    </select>
                <?php 
                if($product_detail[0]->availability == 1){
                ?>
                    <button class="btn btn-primary btn-shadow btn-md" type="submit" onclick="addToCart(<?php echo $p_id;?>);"><i class="fa fa-cart font-size-lg mr-2"></i>Add to Cart</button>
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
                <!-- Sharing-->
                <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">Share:</h6><a class="share-btn sb-twitter mr-2 my-2" href="#"><i class="fa fa-twitter"></i>Twitter</a><a class="share-btn sb-instagram mr-2 my-2" href="#"><i class="fa fa-instagram"></i>Instagram</a><a class="share-btn sb-facebook my-2" href="#"><i class="fa fa-facebook"></i>Facebook</a>
              </div>
            </div>

</div>

 </div>
  </div>
             <hr class="mt-2 pb-4 mb-1">

              <!-- Product description section 1-->
      <div class="row align-items-center py-md-3">
       
        <div class="col-lg-12 col-md-12 ">
          <h4 class="h5 mb-4 pb-2">Product Details</h4>
          
        
          <div class="col-lg-12 font-size-sm" style="word-wrap: break-word; ">
            <?php echo html_entity_decode($product_detail[0]->description); ?>
          </div>

        
         
          </div>
      </div>





            
         
       
      </div>


 <hr class="mt-4 pb-4 mb-3 ">
 <div class="container  pb-4 pt-4">
        <div class="row">
          <!-- Reviews list-->
          <div class="col-md-7  pb-4 pt-4" style="background: #fff;">
            

            <div class="loading-div"><img src="../assets/img/loading.gif" ></div>
            <div id="cresults"><!-- content will be loaded here --></div>


            <!--<div id="result_para"></div> 
             <div id="pagination"></div>-->
            
           
            <div class="text-center">
            

               <input type="hidden" id="pid" value="<?php echo $p_id; ?>">
               <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
            </div>
          </div>
          <?php 
                      if (isset($_SESSION['review']) && $_SESSION[
                        'review'] == $p_id) {
                          ?>
                        <h4><?php getFlash(); ?></h4>
                        <?php
                      }else{ ?>
          <!-- Leave review form-->
          <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
            <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-lg">
              <?php getFlash(); ?>
              <h3 class="h4 pb-2">Write a review</h3>
              <form method="post" action="review_rating.php?p_id=<?php echo $p_id; ?>" class="needs-validation">
              
                <div class="form-group">
                  <label for="review-name">Your name<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" required id="review-name">
                  <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on the comment.</small>
                </div>
                <div class="form-group">
                  <label for="review-email">Your email<span class="text-danger">*</span></label>
                  <input class="form-control" type="email" required id="review-email">
                  <div class="invalid-feedback">Please provide valid email address!</div><small class="form-text text-muted">Authentication only - we won't spam you.</small>
                </div>
                <div class="form-group">
                  <label for="review-rating">Rating<span class="text-danger">*</span></label>
                  <select class="custom-select" required id="review-rating">
                    <option value="">Choose rating</option>
                    <option value="5">5 stars</option>
                    <option value="4">4 stars</option>
                    <option value="3">3 stars</option>
                    <option value="2">2 stars</option>
                    <option value="1">1 star</option>
                  </select>
                  <div class="invalid-feedback">Please choose rating!</div>
                </div>
                <div class="form-group">
                  <label for="review-text">Review<span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="6" required id="review-text"></textarea>
                  <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 50 characters.</small>
                </div>
                <div class="form-group">
                  <label for="review-pros">Pros</label>
                  <textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-pros"></textarea>
                </div>
                <div class="form-group mb-4">
                  <label for="review-cons">Cons</label>
                  <textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-cons"></textarea>
                </div>
                <button class="btn btn-primary btn-shadow btn-block" type="submit">Submit a Review</button>
              </form>
            </div>
          </div>

          <?php
              } 
          ?>


        </div>

    </div>

</div>
  <!-- Product carousel (You may also like)-->
  <div class="container bg-white">
    <div class="my-md-3 px-4 py-3">
      <h2 class="h3 text-center pb-4">You may also like</h2>
      <div class="cz-carousel cz-controls-static cz-controls-outside">
        <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
          <!-- Product-->

          <?php 
        foreach($picked_product as $key => $p_product){

         if($p_product->images != "" && file_exists(UPLOAD_DIR.'/product/'.$p_product->images)){
          $thumbnail = UPLOAD_URL.'product/'.$p_product->images;
        } else {
          $thumbnail = FRONT_IMAGES.'no-image.png';
        }
      ?>


      <div>
            <div class="card product-card card-static">
             
              <a class="card-img-top d-block overflow-hidden" href="#">
                <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($p_product->title); ?>">
              </a>
              <div class="card-body py-2">
                <h3 class="product-title font-size-sm">
                  <a href="details?id=<?php echo $p_product->id; ?>">
                  <?php echo stripslashes($p_product->title); ?>
                </a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price">
                    <?php 
                        $price = $p_product->price;
                        $discount = $p_product->discount;
                        if($discount > 0){
                          $price = $price-(($price*$discount)/100);
                        }
                        echo '<span class="text-accent">'.$left_currency.number_format($price).$right_currency.'</span>';
                        if($discount > 0){
                          echo ' <del class="product-old-price">'.$left_currency.number_format($p_product->price).$right_currency.'</del>';
                        }
                        ?>

                    
                  </div>
                  <div class="star-rating">

                  
                   <?php 
                   if(review($p_product->id) < 1){
                       $class = "fa-star-o empty"; 
                      for($i=0; $i<5; $i++){
                        if($p_product->rating <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      }
                      else{
                      $class = "fa-star star-filled";
                      for($i=0; $i<5; $i++){
                      if ($p_product->rating <= $i) {
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
                <button class="btn-wishlist btn-sm wish" onclick="addToWishlist(<?php echo $p_product->id;?>);" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                
                <button class="add-to-cart bg-blue"  onclick="addToCart(<?php echo $p_product->id;?>);" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>

              </div>
              
              <?php   
              if(!empty($p_product->discount)){
              ?>
                <span class="sale-discount">-<?php echo $p_product->discount; ?>%</span>

              <?php
               }
              ?>  
               <!--Loader placeholder-->

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

            </div>
          </div>



       <?php
        }
         ?>

        </div>
      </div>
    </div>
</div>









 <?php 
//include("footer.php");
 ?>