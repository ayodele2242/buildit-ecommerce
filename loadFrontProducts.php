<?php
require_once('../config/config.php');
require_once('../inc/fetch.php');
 //$email = $_SESSION['email'];
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


  ?>


<?php

$rowperpage = 50;

// counting total number of posts
$allcount_query = "SELECT count(*) as allcount FROM product";
$allcount_result = mysqli_query($mysqli,$allcount_query);
$allcount_fetch = mysqli_fetch_array($allcount_result);
$allcount = $allcount_fetch['allcount'];

// select first 3 posts
$query = "SELECT product.*, GROUP_CONCAT(product_colors.color) as colors, 
GROUP_CONCAT(product_brands.brand) as brands, GROUP_CONCAT(product_sizes.size) as sizes  FROM product
left join product_colors on product_colors.product_id = product.id
left join product_brands on product_brands.product_id = product.id
left join product_sizes on product_sizes.product_id = product.id GROUP BY 
        product.id  order by product.id desc limit 0,$rowperpage ";
$result = mysqli_query($mysqli,$query);

while($row = mysqli_fetch_array($result)){

    if($row['images'] != "" && file_exists(UPLOAD_DIR.'/product/'.$row['images'])){
        $thumbnail = UPLOAD_URL.'product/'.$row['images'];
      } else {
        $thumbnail = FRONT_IMAGES.'no-image.png';
      }

    $id = $row['id'];
    $content = $row['title'];
    $shortcontent = substr($content, 0, 160)."...";

?>
    <!--  Products-list -->
    <div class="post product-items product-card animated fadeIn"  id="post_<?php echo $id; ?>">

    <div class="product-image">
    <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" class="imaged">
    </div>

    <div class="product-info">
    <a class="overflow-hidden" href="search.php?id=<?php echo $row['id']; ?>">
      <h5>  <?php echo stripslashes($shortcontent); ?></h5>
    </a>
      <div class="text-accent price">
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

    echo ' <del class="product-old-price text-danger">  '.$left_currency.number_format($row['price']).$right_currency.'</del>';
  }

}

?>

      </div>
    </div>

    <div class="product-btns">
    <?php   
              if(!empty($row['discount'])){
              ?>
    <span class="sale-discount">-<?php echo  $row['discount']; ?>%</span>
              <?php } ?>
        <button class="add-to-cart btn-right"  onclick="addToWishlist(<?php echo  $row['id'];?>);"> <ion-icon name="heart"></ion-icon></button>

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
?>



<script>
//When the page has loaded.
$( document ).ready(function(){
   $('.loader-top').hide();
});
</script>