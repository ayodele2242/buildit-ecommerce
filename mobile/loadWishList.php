<?php
require_once('../config/config.php');
require_once '../class/database.php';
require_once('../inc/fetch.php');
require_once '../config/function.php';
require_once '../class/product.php';
require '../class/wishlist.php';  
$wishlist = new Wishlist();
$product = new Product();

 $email = $_SESSION['email'];
  if(!empty($right_currency)){
    $right_currency = $right_currency;
  }else{
    $right_currency='';
  }
  if(!empty($left_currency)){
    $left_currency = $left_currency;
  }else{
    $left_currency='';
  }
  $list = $wishlist->getWishlist($_SESSION['login_id']);
  ?>

     <div class="transactions" id="post-list">
            
            <?php
           if (!empty($list[0]->product_id)) {
          $p_id =$list[0]->product_id;
          $pro_id = explode(',', $p_id); 

          $counter = 1;
          foreach($pro_id as $key => $id){

          $product_info = $product -> getProductById($id);
          //debugger($product_info,true);
          if ($product_info) {
             if($product_info[0]->images != "" && file_exists(UPLOAD_DIR.'/product/'.$product_info[0]->images)){
                        $thumbnail = UPLOAD_URL.'product/'.$product_info[0]->images;
              } else {
                $thumbnail = FRONT_IMAGES.'no-image.png';
              }
              $content = substr(stripcslashes($product_info[0]->title), 0, 30)."...";
            ?>
                <!-- item -->
                <div class="item post-item postid results" id="<?php echo $product_info[0]->id; ?>">
                    <div class="detail">
                        <img src="<?php echo $thumbnail; ?>" alt="img" class="image-block imaged w48">
                        <div>
                            <small><strong><a  href="search.php?id=<?php echo $product_info[0]->id; ?>"><?php echo $content; ?></a></strong></small>
                            <p><small>Price: <?php 
                             if($product_info[0]->size_category == "different"){
                             $prices = $product_info[0]->price;
                             $amt = explode(",", $prices);
                             $min = min($amt);
                             $max = max($amt);

                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                             echo $price;

                             }else{    

                            $price =  $product_info[0]->price;
                            $discount =  $product_info[0]->discount;
                            if($discount > 0){
                              $price = $price-(($price*$discount)/100);
                            }

                            echo " ".$left_currency.number_format($price).$right_currency;
                            if($discount > 0){

                              echo ' <del class="product-old-price">  '.$left_currency.number_format( $product_info[0]->price).$right_currency.'</del>';
                            }

                          }

                             ?></small></p>

                           
                           
                        </div>
                    </div>
                    <div class="right">

                        <div class="star-rating">


                       <?php 
                      if(review($product_info[0]->id) < 1){
                       $class = "empty"; 
                      for($i=0; $i<5; $i++){
                       if($product_info[0]->rating <= $i){
                          $class = "empty_star";
                        }
                        echo '<ion-icon name="star-outline" class="'.$class.'"></ion-icon>';
                      }
                      }
                      else{
                      $class = "star-filled";
                       $name = "star";
                      for($i=0; $i<5; $i++){
                      if($product_info[0]->rating <= $i){
                         $class = "empty_star";
                         $name = "star-outline";
                           
                      }
                    echo '<ion-icon name="'.$name.'" class="'.$class.'"></ion-icon>';
                       
                      }
                    }
                      ?>

                          </div>


                        <div class="price"> <?php //echo $left_currency.number_format($row['total_amount']).$right_currency ?></div>
                    </div>

                </div>
                <!-- * item -->

               
                <?php
                }
              }
            }else{
              ?>
  <div class="empty-cart">
    <div class="empty-results">
      <h3 class="text-center">
          <ion-icon name="heart"></ion-icon>
      </h3>
      <p class="text-center">
       No items added to your wishlist.
      </p>
    </div>
  </div>

                  <?php
                }
                ?>
            </div>
            <div class="aloader text-center">
               <div class="ME">
                <img src="gif/loading.gif">
               </div>
            </div>
      
        <!-- * Categories -->
  


 <script type="text/javascript">
$(document).ready(function(){
    $('.aloader').hide();


});


</script>