<?php
require_once('config/config.php');
require_once 'class/database.php';
require_once('inc/fetch.php');
require_once 'config/function.php';
require_once 'class/product.php';
require 'class/wishlist.php';  
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

     <div class="transactions row" id="post-list">
            
            <?php
           if (!empty($list[0]->product_id)) {
          $p_id =$list[0]->product_id;
          $pro_id = explode(',', $p_id); 

          $counter = 1;
          foreach($pro_id as $key => $id){

          $product_info = $product -> getProductById($id);
          //debugger($product_info,true);
          if ($product_info) {
             if($product_info[0]->images != "" && file_exists('upload/product/'.$product_info[0]->images)){
                        $thumbnail = 'upload/product/'.$product_info[0]->images;
              } else {
                $thumbnail = FRONT_IMAGES.'no-image.png';
              }
              $content = substr(stripcslashes($product_info[0]->title), 0, 30)."...";
            ?>
                <!-- item -->
                <div class="item post-item postid results col-lg-12 row mb-3 p-3" id="<?php echo $product_info[0]->id; ?>" style="background: #fff;"> 
                    <div class="detail col-12 row">
                      <div class="col-2">
                        <img src="<?php echo $thumbnail; ?>" alt="img" class="image-block imaged w48">
                      </div>
                       <div class="col-10">
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
                    <div class="right col-3">

                        


                       <?php 
                      
                    if(review($product_info[0]->id) ){
                        $stars = '';
                        for($i=0; $i<5; $i++){
                        if($irate <= $i){
                        $class = "fa-star-o empty";
                        }else{
                        $class = "fa-star star-filled";
                        }
                        $stars .= '<i class="fa '.$class.'"></i>';
                        }
                        echo $stars;

                       }


                      ?>

                         


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