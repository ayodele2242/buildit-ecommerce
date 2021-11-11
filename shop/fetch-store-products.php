<?php
require_once '../config/config.php'; //Database Connection
include '../inc/fetch.php';
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
  SELECT product.id, product.title,product.price,product.discount,
  product.rating,product.images, product.size,product.color,product.size_category, GROUP_CONCAT(product_colors.color) as colors, 
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
        product.id, 
        product.title,
        product.price,
        product.discount,
        product.rating,
        product.images,
        product.size,
        product.color

        ORDER BY product.id ASC LIMIT $page_position, $item_per_page
    ";



    
    $statement = mysqli_query($mysqli,$gquery);


    $total_row = mysqli_num_rows($statement);

    $output    = '';

    if ($total_row > 0) {
        while($row = mysqli_fetch_array($statement)) {
           if($row['images'] != "" && file_exists(UPLOAD_DIR.'/product/'.$row['images'])){
              $thumbnail = UPLOAD_URL.'product/'.$row['images'];
            } else {
              $thumbnail = FRONT_IMAGES.'no-image.png';
            }
          ?>
            
          <div class="col-lg-3 col-6 px-0 px-sm-2 mb-sm-4">
            <div class="card product-card card-static">

              <a class="card-img-top d-block overflow-hidden" href="details?id=<?php echo $row['id']; ?>">
                <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" class="">
              </a>

              <div class="card-body py-2">
                        <h5 class="product-title font-size-xs"><a  href="details?id=<?php echo $row['id']; ?>"><?php echo stripcslashes($row['title']); ?></a></h5>
                        <div class="d-flex justify-content-between price-star">
                          <div class="product-price">
                            <span class="text-accent">

                            <?php 
                            if($row['size_category'] == "different"){

                          $prices = $row['price'];
                         $amt = explode(",", $prices);
                         $min = min($amt);
                         $max = max($amt);

                         $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                         echo $price;
                         


                            }else{
                        $price =  $row['price'];
                        $discount =  $row['discount'];
                        if($discount > 0){
                          $price = $price-(($price*$discount)/100);
                        }

                        echo " ".$left_currency.number_format($price).$right_currency;
                        if($discount > 0){

                          echo ' <del class="product-old-price">  '.$left_currency.number_format($row['price']).$right_currency.'</del>';
                        }

                      }

                      ?>

                          </span>
                        </div>
                          <div class="star-rating">

                             
                            <?php 

                             if(review($row['id']) < 1){
                             $class = "fa-star-o empty"; 
                            for($i=0; $i<5; $i++){
                              if($row['rating'] <= $i){
                                $class = "fa-star-o empty";
                              }
                              echo '<i class="fa '.$class.'"></i>';
                            }
                            }else{
                            $class="fa-star star-filled";
                            for($i=0;$i<5;$i++){
                              if($row['rating'] <= $i){
                                $class = "fa-star-o empty";
                              }
                              echo '<i class="fa '.$class.'"></i>';
                            }

                          }
                             ?>

                          </div>
                        </div>
                      </div>

                   <?php
                if($row['size_category'] == "different" || $row['size_category'] == "single"){

                } else{ 
                ?>   

                <div class="product-btns">
                <button class="btn-wishlist btn-sm wish" onclick="addToWishlist(<?php echo  $row['id'];?>);" title="Add to wishlist"><i class="fa fa-heart"></i></button>
                 <button class="add-to-cart bg-blue"  onclick="addToCart(<?php echo  $row['id'];?>);" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>

              </div>
                
                <?php
              }
                $size_count = count(explode(',',$row['size']));
                $color_count = count(explode(',',$row['color']));
                //if($row['id'])

                ?>
               
              <?php   
              if(!empty($row['discount'])){
              ?>
               <span class="sale-discount">-<?php echo  $row['discount']; ?>%</span>
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

echo '<div class="col-lg-12"><div  align="center"><div class="Page navigation">';
// To generate links, we call the pagination function here. 
echo paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
echo '</div></div></div>';
       
    } else {
        echo '<h4>No Product Found</h4>' . $mysqli->error;
    }
    
// /}

?>

<script type="text/javascript">
  $(document).ready(function () {
  $(".loader-top").hide();

});
</script>