<?php
include("header.php");
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

  $shortcontent = substr($product_detail[0]->title, 0, 17)."...";
  $ratings = avgRating($p_id);
 ?>
<link rel="stylesheet" href="css/slider.css">
<style type="text/css">
    .stars {
    color: #ff7501;
    font-size: 1.2em;
}
</style>
<div class="appHeader">
        <div class="left">
        <a href="#" class="headerButton goBack" onclick="goBack()">
            <span class="material-icons icon">arrow_back</span>
        </a>
        </div>
        <div class="pageTitle">Details</div>
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
            <a href="cart.php" class="headerButton icart">
            <ion-icon class="icon" name="cart"></ion-icon>
              <span class="badge badge-danger">
              <?php 
                $total_quantity = 0;
                $total_amount = 0;
                $cart = geCart($sessionId);
               // $size = "";
                //$color = "";
                if($cart){
                  foreach($cart as $cart_item){
                    $total_quantity += $cart_item['quantity'];
                    $total_amount += $cart_item['price']*$cart_item['quantity'];
                   // $size += $cart_item['size'];
                    //$color += $cart_item['color'];
                  }
                }
                echo $total_quantity;
              ?>

              </span>
            </a>

        </div>
    </div>
    
      <!--<div class="mobile-nav appHeader  no-border relative loader-hide" style="background-color: rgb(224, 224, 224);">
        <div class="nav-ops">
             <div class="left">
            <div class="circle"></div>
            </div>
          
           <div class="pageTitle">Details</div>
            
             <div class="right">
             <div class="icons">
              <a href="" class="headerButton icart">
                <div class="circle"></div>
                <span class="badge badge-danger">0</span>
              </a>
             </div>
            </div>
            
        </div>
    </div>-->

<!-- Search Component -->
    <div id="search" class="appHeader">
       
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search BuildIt" id="searchme">
                <i class="input-icon search-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <i class="close-icon animated fadeIn">
                        <ion-icon name="arrow-back"></ion-icon>
                </i>   
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
            <div id="search-output"></div>
    </div>
    <!-- * Search Component -->



 <!-- App Capsule -->
 <div id="appCapsule">
<!--Slider-->
 <div class="section full">

 <div class="slideshow-container">
    <?php 

   
    $j = 1; 
    foreach ($all_images as $key => $img) { 
        
        $item_class = ($j == 1) ? 'active' : '';

    ?>
    <div class="mySlides <?php echo $item_class; ?>">
    <img src="<?php echo '../upload/product/'.$img;?>" style="width:100%">
    <div class="text"><?php $product_detail[0]->title; ?></div>
    </div>
    <?php 
    $j++; 
   } 

?>
    <a class="prev-icon" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next-icon" onclick="plusSlides(1)">&#10095;</a>

      <!-- loader -->
      <div class="loader-top">
                 <div class="ph-item"> 
                   <div class="ph-col-12 larger">
                  <div class="ph-picture"></div>
                </div>
                 </div>
               </div>
                <!-- loader ends -->

    </div>

</div>
<!--* Slider-->

<!--Details-->
<div class="section full mb-3 bg-white col-grey pr-1 pl-1 mt-2">
<div>    
<strong><?php echo $product_detail[0]->title; ?></strong>
</div>
<div class="">
<strong class="text-sm">Brand: <?php if (!empty($product_detail[0]->brand)) { echo stripcslashes($product_detail[0]->brand); }else { echo '<span class="text-danger">Not Available.</span>'; }?></strong> 
</div>
<div class="">
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

<span class="h5 font-weight-bolder text-accent mr-1"><?php echo $left_currency.number_format($price).$right_currency; ?></span>
<?php
if($discount > 0){
    echo ' <del class="text-muted font-size-lg text-danger mr-3">'.$left_currency.number_format($product_detail[0]->price).$right_currency.'</del>';
}
}
?>
</div>
<div class="row pb-1">
                <div class="col-10" >
                <a href="#" data-id="<?php echo $p_id; ?>"  class="productinfo" data-toggle="modal" data-target="#PanelLeft">
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
                     </a>
                </div>
                <div class="col-2">
                <button class="add-to-cart btn-right"  onclick="addToWishlist(<?php echo  $product_detail[0]->id;?>);"> <ion-icon name="heart"></ion-icon></button>
                <input type="hidden" id="ireviews" value="<?php ucwords($product_detail[0]->title); ?>">
                </div>
            </div>


</div>
<!--* Details-->
<div class="section full  col-grey mb-3">
<div class="row pr-1 pl-1">
<div class="col-11">Product Details</div>
<span class="col-1 right-nav">
<a href="#" class="text-primary p_detail" data-id="<?php echo $p_id; ?>" data-toggle="modal" data-target="#ModalBasic"><ion-icon name="chevron-forward-outline"></ion-icon></a>
</span>
</div>

<div class="wide-block pt-1 pb-1 full">
<p class="text-details">  
<?php echo $product_detail[0]->summary;?>
</p>
</div>

</div>


<div class="section full  col-grey mb-3">
<div class="row pr-1 pl-1">
<div class="col-12">Related Products</div>
</div>

<div class="wide-block pt-1 pb-1 products full">
<?php
  if($picked_product){
    foreach($picked_product as $key => $p_product){

      if($p_product->images != "" && file_exists('../upload/product/'.$p_product->images)){
       $thumbnail = '../upload/product/'.$p_product->images;
     } else {
       $thumbnail = FRONT_IMAGES.'no-image.png';
     }
?>
<!--  Products-list -->
<div class="post product-items product-card animated fadeInRight">

<div class="product-image">
<img src="<?php echo $thumbnail;?>" class="imaged">
</div>

<div class="product-info">
<a class="overflow-hidden" href="search.php?id=<?php echo $p_product->id; ?>">
  <h5>  <?php echo stripslashes($p_product->title); ?></h5>
</a>
  <div class="text-accent price">
  <?php 
  if($p_product->size_category == "different"){

$prices = $p_product->price;
$amt = explode(",", $prices);
$min = min($amt);
$max = max($amt);

$price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

echo $price;

  }else{
$price =  $p_product->price;
$discount =  $p_product->discount;
if($discount > 0){
$price = $price-(($price*$discount)/100);
}

echo " ".$left_currency.number_format($price).$right_currency;
if($discount > 0){

echo ' <del class="product-old-price text-danger">  '.$left_currency.number_format($p_product->price).$right_currency.'</del>';
}

}

?>

  </div>
</div>

<div class="product-btns">
<?php   
          if(!empty($p_product->discount)){
          ?>
<span class="sale-discount">-<?php echo  $p_product->discount; ?>%</span>
          <?php } ?>
    <button class="add-to-cart btn-right"  onclick="addToWishlist(<?php echo  $p_product->id;?>);"> <ion-icon name="heart"></ion-icon></button>

</div>   

  
<!-- loader -->
<div class="loader-top">
<div class="ph-item"> 
<div class="ph-col-12">
<div class="ph-picture"></div>
<div class="ph-row p-2">
<div class="ph-col-12 big mb-3"></div>
<div class="ph-col-12 big mb-3"></div>
</div>
</div>
</div>
</div>
<!-- loader ends -->


</div><!-- Products-list -->
<?php
    }
  }
?>
</div>

</div>


 </div>
    <!-- * App Capsule -->


      <!-- App Bottom Menu -->
      <div class="appBottomMenu bg-warning" data-toggle="modal" data-target="#actionSheetForm">
            
           <button class="btn btn-warning btn-lg btn-block col-lg-12"> <ion-icon name="cart"></ion-icon> Add to Cart</button>
         
        
    </div>
    <!-- * App Bottom Menu -->







<!-- Panel Left for rating -->
<div class="modal fade panelbox panelbox-left" id="PanelLeft" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="review-title"> Reviews</h5>
              <a href="javascript:;" data-dismiss="modal" ><ion-icon class="text-danger closeme" name="close-outline"></ion-icon></a>
          </div>
          <div class="modal-body">
          <div class="review_detail"></div>
          </div>
      </div>
  </div>
</div>
<!-- * Panel Left for rating -->


<!-- Product Detail Modal Basic -->
<div class="modal fade modalbox" id="ModalBasic" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Details</h5>
                <a href="javascript:;" data-dismiss="modal">Close</a>
            </div>
            <div class="modal-body">
                <div class="product_detail"></div>
                
            </div>
        </div>
    </div>
</div>
<!-- * Product Detail Modal Basic -->


<!-- Form Action Sheet -->
<div class="modal fade action-sheet" id="actionSheetForm" role="dialog">
<div class="modal-dialog" role="document">
<form id="productForm">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Select Variation</h5>
</div>
<div class="modal-body">
<div class="action-sheet-content">


<div class="form-group basic">

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
<span class="text"></span>
</label>
</div>                   
<?php
}
?>
</div>
<div class="d-flex flex-wrap">
</div>
</div>
<?php } ?>
        
    </div>



<?php 
   if ($product_detail[0]->size_category == "single" && !empty($product_detail[0]->size)) {
    $price = $product_detail[0]->price;
    $discount = $product_detail[0]->discount;
    if($discount > 0){
        $price = $price-(($price*$discount)/100);
    }
  ?>
  <div class="form-group basic">
<div class="d-flex justify-content-between align-items-center pb-1">
<label class="font-weight-medium" for="product-color">Pick Size:</label>
</div>
<div id="input-options" class="radios">
  <?php
$sizes = explode(",", $product_detail[0]->size);
foreach($sizes as $isize){
?>
<label>
<input type="radio" name="product_size" value="<?php echo  $isize;  ?>"/>
 <span><?php echo  $isize;  ?></span>
 </label>
<?php } ?>
</div>
<input type="hidden" name="sprice"  value="<?php echo  $price; ?>" >
<input type="hidden" name="sseller" value="<?php echo $product_detail[0]->vendor_name; ?>">
<input type="hidden" name="product_id" value="<?php echo $product_detail[0]->id; ?>">
<input type="hidden" name="mysession" value="<?php echo session_id(); ?>">
<input type="hidden" name="cat_type"  value="single">
</div>
<?php } if ($product_detail[0]->size_category == "different") { ?>
  <div class="form-group basic">

<div class="d-flex justify-content-between align-items-center pb-1">
<label class="font-weight-medium" for="product-color">Pick Size:</label>
</div>

<div id="input-option" class="radios">
  <?php
  $color_arrar = array('#9933CC','#4285F4','#880e4f','#01579b','#e65100');
  $x=0;
  while($result = mysqli_fetch_array($sqlQuery2)){
    $x++;
    //$n = rand(0,$size_of_array-1);
    //$color = $color_arrar[$n%5];
    $color = $color_arrar[$x%5];
  ?>
  
  <label>
  <input type="radio" name="product_price" id="<?php echo  $result['id'];  ?>" data-size="<?php echo  $result['size'];  ?>" value="<?php echo  $result['variant_price']  ?>" />
  <span><?php echo  ucwords($result['size']);  ?></span>
 </label>
   
    <?php
      }
    ?>
</div>
<input type="hidden" name="dproduct_id" id="product_id">
<input type="hidden" name="dsize" id="size">
<input type="hidden" name="dprice" id="prize">
<input type="hidden" name="dseller" value="<?php echo $product_detail[0]->vendor_name; ?>">
<input type="hidden" name="cat_type" id="cat_type" value="different">
<input type="hidden" name="mysession" value="<?php echo session_id(); ?>">
<input type="hidden" name="img" id="imgy">
</div>
<?php } ?>

<div class="form-group basic row">
<div class="col-4">
<div class="number-spinner">
  <span class="ns-btn">
		  <a data-dir="dwn" id="q_down"><span class="icon-minus"></span></a>
  </span>
  <input type="text" class="pl-ns-value" name="quantity" id="quantity_wanted" value="1" maxlength=2>
  <span class="ns-btn">
		  <a data-dir="up" id="q_up"><span class="icon-plus"></span></a>
  </span>
</div>
</div>
<div class="col-8" >
<div class="mt-1" id="price-old"></div>
</div>

</div>

<div class="form-group basic">
  <?php 
  if($product_detail[0]->quantity > 0){
  ?>
      <button class="btn btn-warning btn-shadow  btn-block btn-lg" type="submit" id="addToCart"><ion-icon name="cart"></ion-icon> Add to Cart</button>
    <?php
    }else{
    ?>

      <button class="btn bg-dark btn-shadow btn-md inactive disabled" type="submit" ><ion-icon name="cart"></ion-icon> Sold  Out</button>

    <?php
    }   
?>

</div>


</div>
</div>
</div>
</form>
</div>
</div>
<!-- * Form Action Sheet -->




<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<script>


</script>

<?php
}else{
    header("Location: index.php");
}
include("footer.php");
?>
