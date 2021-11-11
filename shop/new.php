 <?php
include("header.php");
include("navs.php");
include("slider.php");
 ?>

   

    <!-- Category (Women)-->
    <section class="container pt-lg-3 mb-4 mb-sm-5">
      <?php 
            if(isset($parent_cats) && !empty($parent_cats)){
              $i = 0;
              foreach (array_slice($parent_cats, 0, 15) as $parents ) {
                
                $child_cats = $category->getChildByParentId($parents->id);

                $category_product = $product->getProductByCategory($parents->id);
                //if ($child_cats) {
                  ?>
         <div class="row mb-3 bg-white pt-3 pb-3">
        <!-- Banner with controls-->

        <div class="col-md-4">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg cat-holder" style="background: #0288d1  url('<?php echo UPLOAD_URL.'category/'.$parents->featured_image; ?>') no-repeat center center/cover;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div>
                <h3 class="mb-1 text-white"><?php echo stripslashes($parents->title);?> </h3><a class="font-size-md text-white" href="category?cid=<?php echo $parents->id; ?>">Shop for <?php echo stripslashes($parents->title); ?> <i class="fa fa-arrow-right font-size-xs align-middle ml-1"></i></a>
              </div>
              <div class="cz-custom-controls" id="for-women">
                <button type="button"><i class="fa fa-arrow-left"></i></button>
                <button type="button"><i class="fa fa-arrow-right"></i></button>
              </div>
            </div>
            <?php 
            if (isset($parents->featured_image) && $parents->featured_image != "" && file_exists(UPLOAD_DIR.'/category/'.$parents->featured_image))  {
              ?>
            <!--<a class="d-none d-md-block mt-auto" href="category?cid=<?php echo $parents->id; ?>">
              <img class="d-block w-100" src="<?php //echo UPLOAD_URL.'category/'.$parents->featured_image; ?>" alt="For Women">
            </a>-->
            <?php  
            }
             ?>
          </div>
        </div>


        <!-- Product grid (carousel)-->
        <div class="col-md-8 pt-4 pt-md-0">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women&quot;}">
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                <?php 

                  foreach (array_slice($category_product, 0, 6) as $children) {
                   
                    ?>
                
                  <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                    <div class="card product-card card-static">
                     <!-- <button class="btn-wishlist btn-sm comp-hide" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="fa fa-heart"></i></button>-->
                      <?php 
                      if(isset($children->images) && $children->images != "" && file_exists(UPLOAD_DIR.'/product/'.$children->images)){
                        $thumbnail = UPLOAD_URL.'product/'.$children->images;
                      } else {
                        $thumbnail = FRONT_IMAGES.'no-image.png';
                      }
                    ?>

                      <a class="card-img-top d-block overflow-hidden" href="details?id=<?php echo $children->id; ?>">
                        <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($children->title); ?>" class="">
                      </a>

                      <div class="card-body py-2">
                        <h5 class="product-title font-size-xs"><a  href="details?id=<?php echo $children->id; ?>">
                          
                            <?php echo stripcslashes(mb_strimwidth($children->title, 0, 25, "...")); ?>
                          </a></h5>
                        <div class="d-flex justify-content-between price-star">
                          <div class="product-price">
                            <span class="text-accent">
                            <?php 
                        

                        if($children->size_category == "different"){
                         $prices = $children->price;
                         $amt = explode(",", $prices);
                         $min = min($amt);
                         $max = max($amt);

                         $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                         echo $price;
                         

                        }else{
                          $price = $children->price;
                        $discount = $children->discount;
                        if($discount > 0){
                          $price = $price-(($price*$discount)/100);
                        }

                        echo " ".$left_currency.number_format($price).$right_currency;
                        if($discount > 0){

                          echo ' <del class="product-old-price">  '.$left_currency.number_format($children->price).$right_currency.'</del>';
                        }
                      }



                      ?>

                          </span>
                        </div>
                          <div class="star-rating">


                    <?php 
                      if(review($children->id) < 1){
                       $class = "fa-star-o empty"; 
                      for($i=0; $i<5; $i++){
                        if($children->rating <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      }
                      else{
                      $class = "fa-star star-filled";
                      for($i=0; $i<5; $i++){
                      if ($children->rating <= $i) {
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
                if($children->size_category == "different" || $children->size_category == "single"){

                } else{ 
                ?>
                <button class="btn-wishlist btn-sm wish" onclick="addToWishlist(<?php echo $children->id;?>);" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                
                <button class="add-to-cart bg-blue"  onclick="addToCart(<?php echo $children->id;?>);" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>
             
              <?php  
            }
             echo '</div>';

              if(!empty($children->discount)){
              ?>
               <span class="sale-discount">-<?php echo  $children->discount; ?>%</span>
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
                              }
                               ?>

                     </div>

              </div>
              <!-- Carousel item-->
             
            </div>
          </div>
        </div>

 </div>
<?php 
               // }
              }
            }
             ?>
            


     
    </section>


    </section>
    <?php
//include("brands.php");
include("footer.php");

?>