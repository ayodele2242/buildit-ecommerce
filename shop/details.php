 <?php
include("header.php");
include("navs.php");
error_reporting(0);

if(isset($_GET['id'])){
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
              <form id="productForm">
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

                         echo $prices;
                         

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
             
            <span class="price-new mb-4"><span id="price-old"><?php echo " ".$left_currency.number_format($price).$right_currency; ?></span></span>
             
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

                    <div class="btn-toolbar" role="toolbar">


                    </div> 
                    <div id="input-option" class="d-flex flex-wrap">
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
                <!-- Sharing-->
                <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">Share:</h6><a class="share-btn sb-twitter mr-2 my-2" href="#"><i class="fa fa-twitter"></i>Twitter</a><a class="share-btn sb-instagram mr-2 my-2" href="#"><i class="fa fa-instagram"></i>Instagram</a><a class="share-btn sb-facebook my-2" href="#"><i class="fa fa-facebook"></i>Facebook</a>
              </div>
            </div>
</form>
</div>

 </div>
  </div>
           

 <div id="parentHorizontalTab" class="mb-4">
            <ul class="resp-tabs-list hor_1">
                <li>Product Details</li>
                <li>Reviews</li>
               
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                    <p>
                      <div class="col-lg-12 font-size-sm" style="word-wrap: break-word; ">
                      <?php echo html_entity_decode($product_detail[0]->description); ?>
                    </div>

                        
                    </p>
                   
                </div>
                <div>
                   
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
              
              
                <div class="form-group" style="display: none;">
                 
                  <input class="form-control" type="hidden" name="name" required id="review-name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }  ?>">
                  
                </div>
                <div class="form-group">
                  
                  <input class="form-control" type="hidden" required id="review-email" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }  ?>">
                 
                </div>
                <div class="form-group">
                  <label for="review-rating">Rating<span class="text-danger">*</span></label>
                  <select class="custom-select" required id="review-rating" name="rating">
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
                  <textarea class="form-control" rows="6" required id="review-text" name="review"></textarea>
                  <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 50 characters.</small>
                </div>
               
                <?php if(isset($_SESSION['name'])){   ?>
                <button class="btn btn-primary btn-shadow btn-block" type="submit">Submit a Review</button>
              <?php }else{ ?>

                <div class="alert alert-info text-center">Log in to add review</div>
              <?php } ?>

              </form>
            </div>
          </div>

          <?php
              } 
          ?>


        </div>
                </div>
            
            </div>
        </div>



      </div>


 
<!--tab here-->

</div>
  <!-- Product carousel (You may also like)-->
  <?php
  if($picked_product){
    ?>
  <div class="container bg-white">
    <div class="my-md-3 px-4 py-3">
      <h2 class="h3 text-center pb-4">Related Products</h2>
      <div class="cz-carousel cz-controls-static cz-controls-outside">
        <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;autoHeight&quot;: true,&quot;autoplay&quot;: true,&quot;speed&quot;: 200, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
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

                     if($p_product->size_category == "different"){
                         $prices = $p_product->price;
                         $amt = explode(",", $prices);
                         $min = min($amt);
                         $max = max($amt);

                         $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                         echo '<span class="text-accent">'.$price.'</span>';

                         }else{    

                        $price = $p_product->price;
                        $discount = $p_product->discount;
                        if($discount > 0){
                          $price = $price-(($price*$discount)/100);
                        }
                        echo '<span class="text-accent">'.$left_currency.number_format($price).$right_currency.'</span>';
                        if($discount > 0){
                          echo ' <del class="product-old-price">'.$left_currency.number_format($p_product->price).$right_currency.'</del>';
                        }

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
                <?php
                if($p_product->size_category == "different" || $p_product->size_category == "single"){

                } else{ 
                ?>
                <button class="btn-wishlist btn-sm wish" onclick="addToWishlist(<?php echo $p_product->id;?>);" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                
                <button class="add-to-cart bg-blue"  onclick="addToCart(<?php echo $p_product->id;?>);" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>
              <?php } ?>
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
}
}else{
  echo '<div class="alert alert-default text-danger">Nothing here. Please try again.</div>';
}


?>







 <?php 
include("footer.php");
 ?>