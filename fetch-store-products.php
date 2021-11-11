<?php
require_once 'config/config.php'; //Database Connection
include 'inc/fetch.php';
require_once 'review_pagination.php';

$item_per_page    = 50; //item to display per page

//Get page number from Ajax
if(isset($_POST["page"])){
  $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
  if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
  $page_number = 1; //if there's no page number, set it to 1
}

//get total number of records from database
$results = mysqli_query($mysqli,"SELECT COUNT(*) as totalPro FROM product");
$get_total_row = mysqli_fetch_array($results); //hold total records in variable
//break records into pages
$get_total_rows = $get_total_row['totalPro'];

$total_pages = ceil($get_total_rows/$item_per_page);

//position of records
$page_position = (($page_number-1) * $item_per_page);

//echo $page_position;
//count rating and review
function review($id)
{
    global $mysqli;
    $sql = "SELECT COUNT(*) FROM review_rating where product_id='$id'";
    if ($result=mysqli_query($mysqli, $sql)){
        $row= mysqli_fetch_array($result);
        $rowcount = $row[0];
        mysqli_free_result($result);
    }
    return $rowcount;
}



//if (isset($_POST["action"])) {
    $gquery = "
  SELECT product.*, GROUP_CONCAT(product_colors.color) as colors, 
  GROUP_CONCAT(product_brands.brand) as brands, GROUP_CONCAT(product_sizes.size) as sizes  FROM product
  left join product_colors on product_colors.product_id = product.id
  left join product_brands on product_brands.product_id = product.id
  left join product_sizes on product_sizes.product_id = product.id
  WHERE product.availability = '1' 
 ";

 

    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) 
      && !empty($_POST["minimum_price"]) 
      && !empty($_POST["maximum_price"])) {
      $max = $mysqli->real_escape_string($_POST["minimum_price"]);
      $min = $mysqli->real_escape_string($_POST["maximum_price"]);

        $gquery .= "
     AND product.price BETWEEN '$max' 
     AND '$min' 
  ";

    }
    if (isset($_POST["brand"])) {

        $brand_filter = preg_replace("/'/", "", $_POST["brand"]);

        $brand_filter = implode("','", $brand_filter);
        
        $gquery .= "
   AND product_brands.brand IN('".$brand_filter."')
  ";
    }
    if (isset($_POST["size"])) {
        $size_filter = implode("','", $_POST["size"]);
        
        $gquery .= "
   AND product_sizes.size IN('" . $size_filter . "') 
  ";


    }
    if (isset($_POST["color"])) {
        $color_filter = implode("','", $_POST["color"]);
        $gquery .= "
   AND product_colors.color IN('" . $color_filter . "')
  ";
    }

    if(isset($_POST["sorting"]) && $_POST["sorting"] == "low_price"){
      $gquery .= "
      AND product.price = (SELECT MIN(price) FROM product)
       ";
    }

    if(isset($_POST["sorting"]) && $_POST["sorting"] == "high_price"){
      $gquery .= "
      AND product.price <= (SELECT MAX(price) FROM product)
       ";
    }

    if(isset($_POST["icategory"])){
    
     $catid  = implode("','", $_POST["icategory"]);
        
    // var_dump($catid);
      $gquery .= "
      AND product.cat_id IN('" . $catid . "')
       ";
    }
    

    $gquery .= "
        GROUP BY 
        product.id 
        
        ORDER BY product.id ASC LIMIT $page_position, $item_per_page
    ";



    
    $statement = mysqli_query($mysqli,$gquery);


    $total_row = mysqli_num_rows($statement);

    $output    = '';

    if ($total_row > 0) {
        while($row = mysqli_fetch_array($statement)) {
           if($row['images'] != "" && file_exists('upload/product/'.$row['images'])){
              $thumbnail = 'upload/product/'.$row['images'];
            } else {
              $thumbnail = FRONT_IMAGES.'no-image.png';
            }

            if($row['size_category'] == "different"){
                 $prices = $row['price'];
                 $amt = explode(",", $prices);
                 
                 //$min = min($amt);
                 $iprice = max($amt);

                
            }else{
             $iprice =  $row['price'];
             }
          ?>
            
    <div class="product-grid-item mode-view-item grid-item" >
            <div class="product-wrapper  effect-overlay">
              <div class="product-head">
                <div class="product-image">
                  <div class="product-group-vendor-name">
                  
                    <h5 class="product-name balance-row-1"><a href="detail?id=<?php echo $row['id']; ?>"><?php echo stripslashes($row['title']); ?></a></h5>
                  </div>
                  <div class="featured-img product-ratio-false">
                    <a href="detail?id=<?php echo $row['id']; ?>">
                      <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                        <!-- noscript pattern -->
                        <noscript>
                          <img class="img-lazy product-ratio-false featured-image front" src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" style="object-fit: unset" />
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

                                                             $prices = $row['price'];
                                                             $amt = explode(",", $prices);
                                                             $min = min($amt);
                                                             $max = max($amt);

                                                             $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                                             echo '<span class="price-sale col-black"><span class=money><small>'.$price.'</small></span></span>';
                                                             


                                                             }else{
                                                         $price =  $row['price'];
                                                         $discount =  $row['discount'];
                                                         if($discount > 0){
                                                             $price = $price-(($price*$discount)/100);
                                                         }

                                                         echo '<span class="price-sale col-black"><span class=money><small>'.$left_currency.number_format($price).$right_currency.'</small></span></span>';
                                                         if($discount > 0){

                                                             echo ' <span class="price-compare"><span class=money><small>'.$left_currency.number_format($row['price']).$right_currency.'</small></span></span>';
                                                         }

                                                         }

                                                         ?>
                    </div>
                    <div class="product-add-cart mobile-false">
                      <?php 
                        if($row['quantity'] > 0){
                      ?>
                       <a  href="detail?id=<?php echo $row['id']; ?>" class="btn-add-cart select-options col-white bg-blue" title="Add to Cart" id="<?php echo $row['id']; ?>" ><span class="demo-icon icon-electro-add-to-cart-icon"></span><span class="text">Add to Cart</span></a>

                        
                      <?php }else{ ?>
                         <small class="col-red mobile-false">Sold out</small>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="product-button">
                   
                    <div class="product-wishlist">
                  <a data-arn-action="add"  class='add-to-wishlist icon-2 ' href="javascript:;" onclick="addToWishlist(<?php echo $row['id'];?>);">
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


<?php


        }

echo '<div align="center" style="background: #fff;"><div class="navigation col-lg-12 fixed-bottom">';
// To generate links, we call the pagination function here. 
echo paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
echo '</div></div>';
       
    } else {
        echo '<h4>No Product Found</h4>' . $mysqli->error;
    }
    
// /}

?>


<div id="modal-container">
  <div class="modal-background">
    <div class="modal">
    <div id="product_contents"></div>
    <div class="close-div closeMe">X</div>
    </div>
    
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
  $(".loader-top").hide();

});
</script>
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