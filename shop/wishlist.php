 <?php
include("header.php");
include("navs.php");

require '../class/wishlist.php';  
$wishlist = new Wishlist();
$product = new Product();


if(!isset($_SESSION['email'])){
    header('Location: account-signin');
}else{


$email = $_SESSION['email'];
$query = mysqli_query($mysqli,"select * from customer_login where email = '$email'");
$udetails = mysqli_fetch_array($query);
$uid = $udetails['id'];
$_SESSION['login_id'] = $uid;

$addr = addresses($uid);


?>


<div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="new"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Wishlist</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Wishlist</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
      <div class="row">
        <!-- Sidebar-->
        <?php
        include("left-nav.php");
        ?>
        <!-- Content  -->
        <section class="col-lg-8 bg-white">
          <!-- Toolbar-->
          
          <!-- Addresses list-->
          <div class="font-size-md">
           <!-- row -->
      <div class="row">
        <?php 
        if (isset($_SESSION['login_id'])) {
          $list = $wishlist->getWishlist($_SESSION['login_id']);
        }
        
        if (!empty($list[0]->product_id)) {
          $p_id =$list[0]->product_id;
          $pro_id = explode(',', $p_id); 

          $counter = 1;
          foreach($pro_id as $key => $id){

          $product_info = $product -> getProductById($id);
          //debugger($product_info,true);
          if ($product_info) {
            ?>

             <div class="col-lg-3 col-6 px-0 px-sm-2 mb-sm-4">
                    <div class="card product-card card-static">

                       <?php 
                     if($product_info[0]->images != "" && file_exists(UPLOAD_DIR.'/product/'.$product_info[0]->images)){
                        $thumbnail = UPLOAD_URL.'product/'.$product_info[0]->images;
                      } else {
                        $thumbnail = FRONT_IMAGES.'no-image.png';
                      }
                    ?>


           
             <a class="card-img-top d-block overflow-hidden" href="details?id=<?php echo $product_info[0]->id; ?>">
                        <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($product_info[0]->title); ?>" class="">
                      </a>

                      <div class="card-body py-2">
                        <h3 class="product-title font-size-sm"><a  href="details?id=<?php echo $product_info[0]->id; ?>"><?php echo stripcslashes($product_info[0]->title); ?></a></h3>
                        <div class="d-flex justify-content-between price-star">
                          <div class="product-price">
                            <span class="text-accent">
                            <?php 

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

                      ?>

                          </span>
                        </div>
                          <div class="star-rating">


                       <?php 
                      if(review($product_info[0]->id) < 1){
                       $class = "fa-star-o empty"; 
                      for($i=0; $i<5; $i++){
                       if($product_info[0]->rating <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      }
                      else{
                      $class = "fa-star star-filled";
                      for($i=0; $i<5; $i++){
                      if($product_info[0]->rating <= $i){
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
                if($product_info[0]->size_category == "different" || $product_info[0]->size_category == "single"){

                } else{ 
                ?>
                <button class="btn-wishlist btn-sm wish" onclick="addToWishlist(<?php echo  $product_info[0]->id;?>);" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                
                <button class="add-to-cart bg-blue"  onclick="addToCart(<?php echo  $product_info[0]->id;?>);" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>
              <?php } ?>
              </div>

              <?php   
              if(!empty($product_info[0]->discount)){
              ?>
               <span class="sale-discount">-<?php echo  $product_info[0]->discount; ?>%</span>
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

          }else{
            echo 'No items added to your wishlist.';
          }
          if($counter%4 == 0){
                echo '<div class="clearfix"></div>';
              }
              $counter++;
          }

        }else{
          echo 'No items added to your wishlist.';
        }
        ?>

        
      </div>
      <!-- /row -->
          </div>
          
        </section>
      </div>
    </div>











<?php 
}
include("footer.php");
 ?>
