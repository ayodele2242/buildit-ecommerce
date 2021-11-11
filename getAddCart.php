<?php
require_once 'config/config.php';
require_once 'config/function.php';
require_once 'class/database.php';
require_once 'class/category.php';
require_once 'class/product.php';
require_once  'inc/functions.php';
require_once 'inc/fetch.php';
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

$p_id = (int)$_POST['id'];
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
$ratings = avgRating($p_id);
?>
<style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap");
body {
  overflow-x: hidden;
  background-color: #000;
  margin: 0 auto;
}
body * {
  font-family: Arial, sans-serif;
}
body p, body h1, body h2, body h3, body h4, body h5, body h6 {
  margin: 0;
}
body a {
  color: #666;
  text-decoration: none;
}
body ul, body li {
  padding: 0;
  margin: 0;
  list-style-type: none;
}

  .stars {
    color: #ff7501;
    font-size: 1.2em;
}

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
  /*.wish,.btn-wishlist{
    position: relative;  
    display: inline-block; 
    text-align:center;
    justify-content: center;
    align-items: center;
    border-radius: 2px;
    margin: 0 5px;
    transition: all .3s ease 0s 
  }*/

.noScroll {
  overflow: hidden !important;
}

.productCard {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 100%;
  min-height: 100vh;
  position: relative;
  perspective: 100px;
}
.productCard.morph .container .colorLayer {
  width: 70%;
  transform: none;
  transition-delay: 0s;
}
.productCard.morph .container .colorLayer:after {
  opacity: 1;
  transition-delay: 0.2s;
}
.productCard.morph .container .preview {
  width: 70%;
}
.productCard.morph .container .preview .brand {
  top: 50px;
}
.productCard.morph .container .preview .zoomControl {
  opacity: 0;
  pointer-events: none;
  transition-delay: 0s;
}
.productCard.morph .container .preview .closePreview {
  opacity: 1;
  pointer-events: all;
  transition-delay: 0.3s;
}
.productCard .container {
  width: 90%;
  margin: 0 auto;
  padding: 50px;
  background-color: #fff;
  box-sizing: border-box;
}
.productCard .container .info {
  width: calc(50% - 50px);
}
.productCard .container .info .name {
  color: darkgray;
  font-size: 16px;
  text-transform: uppercase;
}
.productCard .container .info .slogan {
  margin: 10px 0;
  font-size: 30px;
}
.productCard .container .info .price {
  font-size: 25px;
  font-weight: 900;
}
.productCard .container .info .attribs .attrib {
  margin-top: 40px;
}
.productCard .container .info .attribs .attrib.size .options .option.activ {
  color: #fff;
  border-color: #2196F3;
  background-color: #2196F3;
}
.productCard .container .info .attribs .attrib.color .options .option {
  width: 25px;
  height: 25px;
  position: relative;
  border: 3px solid currentColor;
}
.productCard .container .info .attribs .attrib.color .options .option:before {
  content: "";
  position: absolute;
  width: 60%;
  height: 60%;
  border-radius: 2px;
  background-color: currentColor;
  transform: scale(0);
  transition: cubic-bezier(0.68, -0.55, 0.27, 1.55) all 0.3s;
}
.productCard .container .info .attribs .attrib.color .options .option.activ:before {
  transform: scale(1);
}
.productCard .container .info .attribs .attrib .header {
  margin-bottom: 10px;
  color: darkgray;
  font-weight: 600;
}
.productCard .container .info .attribs .attrib .options {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: center;
  justify-content: flex-start;
  align-content: center;
}
.productCard .container .info .attribs .attrib .options .option {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 35px;
  height: 35px;
  margin: 10px 10px 0 0;
  font-size: 14px;
  font-weight: 600;
  color: darkgray;
  border-radius: 5px;
  border: 1px solid darkgray;
  cursor: pointer;
  user-select: none;
  transition: ease all 0.3s;
}
.productCard .container .info .attribs .attrib .options .option:hover {
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
}
.productCard .container .info .buttons {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: center;
  justify-content: flex-start;
  align-content: center;
  margin-top: 50px;
}
.productCard .container .info .buttons .button {
  margin: 20px 20px 0 0;
  min-width: 120px;
  padding: 15px;
  border-radius: 5px;
  color: #fff;
  font-weight: 600;
  text-align: center;
  letter-spacing: 1px;
  text-transform: uppercase;
  background-color: #3a3a31;
  user-select: none;
  cursor: pointer;
  transition: ease all 0.3s;
}
.productCard .container .info .buttons .button:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.5);
}
.productCard .container .info .buttons .button.colored {
  background-color: #ff5263;
}
.productCard .container .colorLayer {
  position: absolute;
  top: 0;
  right: 0;
  width: 50%;
  height: 100%;
  background-color: #2196F3;
  transform: rotateY(-8deg);
  transform-origin: right;
  perspective: 100px;
  transition: ease all 0.3s 0.2s;
}
.productCard .container .colorLayer:after {
  content: "";
  position: absolute;
  top: 0;
  right: 100%;
  width: 50%;
  height: 100%;
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.7);
  transition: ease all 0.3s;
}
.productCard .container .preview {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  position: absolute;
  top: 0;
  right: 0;
  width: 50%;
  height: 100%;
  user-select: none;
  overflow: hidden;
  transition: ease all 0.3s;
}
.productCard .container .preview .brand {
  position: absolute;
  top: 150px;
  width: 90%;
  height: 200px;
  font-size: 200px;
  text-align: center;
  color: rgba(255, 255, 255, 0.2);
  text-transform: uppercase;
  overflow: hidden;
  transition: ease all 0.3s;
}
.productCard .container .preview .imgs {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 100%;
  height: 100%;
}
.productCard .container .preview .imgs img {
  position: absolute;
  top: 0;
  width: 70%;
  height: 100%;
  object-fit: contain;
  transform: translate(50%, -10%) rotate(-20deg);
  opacity: 0;
  pointer-events: none;
  transition: ease all 0.3s;
}
.productCard .container .preview .imgs img.activ {
  opacity: 1;
  transform: none;
}
.productCard .container .preview .zoomControl {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  position: absolute;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border: 3px solid #fff;
  background-color: rgba(0, 0, 0, 0.3);
  cursor: pointer;
  transition: ease all 0.3s 0.5s;
}
.productCard .container .preview .zoomControl:before, .productCard .container .preview .zoomControl:after {
  content: "";
  position: absolute;
}
.productCard .container .preview .zoomControl:before {
  top: 20%;
  left: 20%;
  width: 40%;
  height: 40%;
  border-radius: 50%;
  border: 2px solid #fff;
}
.productCard .container .preview .zoomControl:after {
  bottom: 20%;
  right: 20%;
  width: 2px;
  height: 30%;
  background-color: #fff;
  transform: rotate(-45deg);
  transform-origin: bottom left;
}
.productCard .container .preview .closePreview {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  position: absolute;
  top: 20px;
  right: 20px;
  width: 40px;
  height: 40px;
  opacity: 0;
  cursor: pointer;
  pointer-events: none;
  transition: ease all 0.3s;
}
.productCard .container .preview .closePreview:before, .productCard .container .preview .closePreview:after {
  content: "";
  position: absolute;
  width: 1px;
  height: 100%;
  background-color: #fff;
  transform: rotate(45deg);
}
.productCard .container .preview .closePreview:after {
  transform: rotate(-45deg);
}
.productCard .container .preview .movControls {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  position: absolute;
  bottom: 150px;
}
.productCard .container .preview .movControls .movControl {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: flex-end;
  align-content: center;
  width: 40px;
  height: 30px;
  margin: 0 15px;
  position: relative;
  cursor: pointer;
}
.productCard .container .preview .movControls .movControl.left {
  transform: rotateY(180deg);
}
.productCard .container .preview .movControls .movControl:before {
  content: "";
  position: absolute;
  left: 0;
  width: 100%;
  height: 2px;
  background-color: #fff;
}
.productCard .container .preview .movControls .movControl:after {
  content: "";
  width: 10px;
  height: 10px;
  border: 2px solid #fff;
  border-left: 0;
  border-bottom: 0;
  transform: rotate(45deg);
}

@media only screen and (max-width: 768px) {
  body * {
    cursor: default !important;
  }

  .productCard.morph .container .colorLayer {
    width: 100%;
    height: 80vh;
  }
  .productCard.morph .container .preview {
    width: 100%;
    height: calc(80vh - 100px);
  }
  .productCard.morph .container .preview .brand {
    top: 0;
  }
  .productCard .container {
    width: 100%;
  }
  .productCard .container .info {
    width: 100%;
    margin-bottom: 450px;
    text-align: center;
  }
  .productCard .container .info .attribs .attrib .options {
    justify-content: center;
  }
  .productCard .container .info .attribs .attrib .options .option {
    margin: 10px;
  }
  .productCard .container .info .buttons {
    justify-content: center;
    margin-top: 10px;
  }
  .productCard .container .info .buttons .button {
    margin: 20px;
  }
  .productCard .container .colorLayer {
    top: auto;
    bottom: 0;
    width: 100%;
    height: 300px;
    transform: none;
  }
  .productCard .container .colorLayer:after {
    top: -20vh;
    right: 0;
    width: 100%;
    height: 20vh;
  }
  .productCard .container .preview {
    top: auto;
    bottom: 50px;
    width: 100%;
    height: 400px;
  }
  .productCard .container .preview .brand {
    top: 0;
    left: 0;
    text-align: left;
    -webkit-text-stroke: 3px #2196F3;
  }
  .productCard .container .preview .closePreview {
    top: 0;
  }
  .productCard .container .preview .movControls {
    bottom: 0;
  }
}
@media only screen and (max-width: 500px) {
  .productCard .container .info {
    margin-bottom: 300px;
  }
  .productCard .container .info .buttons .button {
    width: 100%;
    margin: 20px 0 0 0;
  }
  .productCard .container .colorLayer {
    height: 200px;
  }
  .productCard .container .preview {
    height: 250px;
  }
  .productCard .container .preview .brand {
    height: 150px;
    font-size: 150px;
  }
}
</style>



<section class="productCard">
  <div class="container">
        <div class="colorLayer"></div>
    <div class="preview">
      <h1 class="brand"><?php echo $product_detail[0]->title; ?></h1>
      <div class="imgs">

        <?php 
          $j = 1;
           foreach ($all_images as $key => $img) {  
            $item_class = ($j == 1) ? 'class="activ"' : "";
        ?>
        <img <?php echo $item_class; ?>  src="<?php echo 'upload/product/'.$img; ?>?alt=media" alt="image-<?php echo $j; ?>">

        <?php $j++; } ?>

      </div>
      <div class="zoomControl"></div>
      <div class="closePreview"></div>
      <div class="movControls">
        <div class="movControl left"></div>
        <div class="movControl right"></div>
      </div>
    </div>


    <div class="info">
      <form id="productForm">
      <h3 class="name"></h3>
      <h1 class="slogan"><?php echo $product_detail[0]->title; ?></h1>
      <p>




       
                    <div class="star-rating">
                      <?php 

                      '<span style="font-size: 18px;">' .$ratings. "</span> <span class='stars'>";
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

                   
      </p>
      <p class="price mt-3">
        
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
                  ?>

      </p>

<div id="price-old"></div>
      <div class="attribs">
        <div class="attrib size">
          <p class="header">Select Size</p>
          <?php 
   if ($product_detail[0]->size_category == "single" && !empty($product_detail[0]->size)) {
    $price = $product_detail[0]->price;
    $discount = $product_detail[0]->discount;
    if($discount > 0){
        $price = $price-(($price*$discount)/100);
    }
  ?>
  <div class="form-group basic">
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


        </div>
<div align="center">
        <div class="attrib color">
          <p class="header">Select Color</p>
          <div class="options">

             <?php 
                 if (!empty($product_detail[0]->color)) {
                ?>
                
              <div class="form-group">
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

                <?php } ?>

          </div>
        </div>
      </div>
</div>


<div class="form-group d-flex align-items-center mt-3 mb-3">
        <!-- skin 1 -->
<div class="num-block skin-1">
  <div class="num-in">
    <span class="minus dis"></span>
    <input type="text" class="in-num" value="1" name="quantity" readonly="">
    <span class="plus"></span>
  </div>
</div>
<!-- / skin 1 -->
</div>

      <div class="form-group d-flex align-items-center">

                <!--<div class="quantity mr-3">
                  <input type="text" name="quantity" id="quantity_wanted" size="2" value="1" />
                  <a type="button" id="q_up" class="bg-blue qup"><i class="fa fa-plus col-white"></i></a>
                  <a type="button" id="q_down" class="bg-red"><i class="fa fa-minus col-white"></i></a>
                </div>-->

                <?php 
                if($product_detail[0]->quantity > 0){
                ?>
              <button class="btn btn-primary btn-shadow btn-sm" type="submit" id="addToCarts">Add to Cart</button>
                 <?php
                 }else{
                  ?>

                   <button class="btn bg-dark btn-shadow btn-md inactive disabled" type="submit" ><i class="fa fa-cart font-size-lg mr-2"></i>Sold out</button>

                  <?php
                  }   
                  ?>

                  <button class="btn-wishlist mr-0 ml-3 mr-lg-n3" type="button" onclick="addToWishlist(<?php echo $product_detail[0]->id;?>);" data-toggle="tooltip" title="Add to wishlist">
                    <i class="fa fa-heart"></i>
                  </button>
                  </div>




    </div>
</form>
  </div>
</section>
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




<script type="text/javascript">

//Fetch product detail
$(document).ready(function(){
//Watch for checkbutton clicked
$( ".iradio-type-button2 input:radio" ).on( "change", function() {
  $('.iradio-type-button2 input:not(:checked)').parent().removeClass("color-active");
  $('.iradio-type-button2 input:checked').parent().addClass("color-active");
 });


  $( ".iradio-pay input:radio" ).on( "change", function() {
  $('.iradio-pay input:not(:checked)').parent().removeClass("color-active");
  $('.iradio-pay input:checked').parent().addClass("color-active");
 });

 $( "#input-option input:radio" ).on( "change", function() {
  function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$('#input-option input:not(:checked)').parent().removeClass("size-active");
$('#input-option input:checked').parent().addClass("size-active");

var id = $("#input-option").find(":radio:checked").first().attr('id');
var  price = $( 'input[name=product_price]:checked' ).val();
$("#price-old").html("Amount for this variant is: <strong>"+numberWithCommas(price)+"</strong>").addClass('mt-3 mb-3 col-cyan');
var data = 'id=' + id;
$.ajax({
    type: "POST",
    url: "process.php",
    data: data,
    dataType: 'json',
    success: function (data) {
        if (data) {
            for (var i = 0; i < data.length; i++) { //for each user in the json response
                $("#product_id").val(data[i].product_id);
                $("#size").val(data[i].size);
                $("#prize").val(data[i].amount);
                $("#imgy").val(data[i].image);
            } // for

        } // if
    } // success
}); // ajax



});


}); 








  $(function(){
  $('.attrib .option').click(function(){
    $(this).siblings().removeClass('activ');
    $(this).addClass('activ');
  })
  $('.zoomControl').click(function(){
    $(this).parents('.productCard').addClass('morph');
    $('body').addClass('noScroll');
  })
  $('.closePreview').click(function(){
    $(this).parents('.productCard').removeClass('morph');
    $('body').removeClass('noScroll');
  })
  $('.movControl').click(function(){
    let imgActiv = $(this).parents('.preview').find('.imgs img.activ');
    if ($(this).hasClass('left')) {
      imgActiv.index() == 0 ? $('.imgs img').last().addClass('activ') : $('.imgs img.activ').prev().addClass('activ');
    } else {
      imgActiv.index() == ($('.imgs img').length - 1) ? $('.imgs img').first().addClass('activ') : $('.imgs img.activ').next().addClass('activ');
    }
    imgActiv.removeClass('activ');
  })
});




//Add cart
$(document).ready(function() {

  $("#addToCarts").click(function(e) {
     e.preventDefault();
      
     $("#addToCarts").html('Processing Item...');
       var serializedData = $("#productForm").serialize();
       var cat = $("#cat_type").val();
      
       var size = $("#product_size").val();

       if(cat == "single" && $('input[name=color]:checked').length < 1){

        $.toast({ 
          text : '<b><ion-icon name="sad"></ion-icon> &nbsp;Select product color to continue.</b>', 
          showHideTransition : 'fade',
          bgColor : 'red',            
          textColor : '#fff',
          allowToastClose : false,
          hideAfter : 4000,
          loader: false,            
          stack : 5,                     
          textAlign : 'center', 
          position : 'top-right'  
        });
        
        $("#addToCarts").html('Add to Cart');
        location.reload(true);

       }
       else if(cat == "single" && $('input[name=product_size]:checked').length < 1){

        $.toast({ 
          text : '<b><ion-icon name="sad"></ion-icon> &nbsp;Select product size to continue.</b>', 
          showHideTransition : 'fade',
          bgColor : 'red',            
          textColor : '#fff',
          allowToastClose : false,
          hideAfter : 4000,
          loader: false,            
          stack : 5,                     
          textAlign : 'center', 
          position : 'top-right'  
        });
        $("#addToCarts").html('Add to Cart');
       }

       else if(cat == "different" && $('input[name=color]:checked').length < 1){
        $.toast({ 
          text : '<b><ion-icon name="sad"></ion-icon> &nbsp;Select product color to continue.</b>', 
          showHideTransition : 'fade',
          bgColor : 'red',            
          textColor : '#fff',
          allowToastClose : false,
          hideAfter : 4000,
          loader: false,            
          stack : 5,                     
          textAlign : 'center', 
          position : 'top-right'  
        });
        $("#addToCarts").html('Add to Cart');
       
       }
     else if(cat == "different" && $('input[name=product_price]:checked').length < 1){

      $.toast({ 
        text : '<b><ion-icon name="sad"></ion-icon> &nbsp;Select product size to continue.</b>', 
        showHideTransition : 'fade',
        bgColor : 'red',            
        textColor : '#fff',
        allowToastClose : false,
        hideAfter : 4000,
        loader: false,            
        stack : 5,                     
        textAlign : 'center', 
        position : 'top-right'  
      });
      $("#addToCarts").html('Add to Cart');
       }
       
else{
  $("#addToCarts").html('Adding Item...');
      $.ajax({

           type : 'POST',
           url  : 'inc/createCart.php',
           data : serializedData,
           success :  function(res)
           {
               if(res.trim() == 1)
               {
                $.toast({ 
                  text : '<b><ion-icon name="checkmark-circle"></ion-icon> &nbsp;Item added to cart Successfully</b>', 
                  showHideTransition : 'fade',  
                  bgColor : 'green',              
                  textColor : '#fff',       
                  allowToastClose : false,    
                  hideAfter : 4000,
                  loader: false,                               
                  textAlign : 'center',           
                  position : 'top-right'  
                });
                 $(".icart").load(location.href + " .icart");
                 $("#addToCarts").html('<i class="fa fa-check"></i> Added to Cart').addClass('btn-md bg-green col-white');
                 //$("#PanelLeft").modal('hide');
                 $("#actionSheetForm").modal("hide");
                 //$("#actionSheetForm").modal('hide');
                 //$('.modal').modal('toggle');
                 // $('.modal-backdrop').removeClass('modal-backdrop');
                  //$('.action-sheet').removeClass('action-sheet');
          
     }else{
              $.toast({ 
                text : '<b><ion-icon name="sad"></ion-icon> &nbsp;'+res+'</b>', 
                showHideTransition : 'fade',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });

              $("#addToCarts").html('Try again').addClass('btn-md bg-red col-white');

     }
           }
       });
       
     }

 return false;
   });
});




$(document).ready(function() {

$("body").delegate(".qty","keyup",function(event){
    event.preventDefault();
    var row = $(this).parent().parent();
    var qty = row.find('.qty').val();
    var id  = row.find(".id").val();

    $.ajax({

            type : 'POST',
            url  : 'inc/updateCart.php',
            data : { id: id, qty: qty},
            cache: false,
            success :  function(res)
            {
                if(res.trim() == 1)
                {


                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Cart updated successfully</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         $(".icart").load(location.href + " .icart");
          $(".refreshme").load(location.href + " .refreshme");
          
      }else{
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
          
      }
            }
        });

  });




  $('.num-in span').click(function () {
      var $input = $(this).parents('.num-block').find('input.in-num');
    if($(this).hasClass('minus')) {
      var count = parseFloat($input.val()) - 1;
      count = count < 1 ? 1 : count;
      if (count < 2) {
        $(this).addClass('dis');
      }
      else {
        $(this).removeClass('dis');
      }
      $input.val(count);
    }
    else {
      var count = parseFloat($input.val()) + 1
      $input.val(count);
      if (count > 1) {
        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
      }
    }
    
    $input.change();
    return false;
  });
  
});
// product +/-
</script>


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