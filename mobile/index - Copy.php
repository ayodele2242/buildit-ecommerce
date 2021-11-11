<?php 
include("header.php"); 
include("header-bottom.php"); 
?>
  <!-- App Capsule -->
    <div id="appCapsule">

     <!-- Categories -->
     <div class="section full mt-4 mb-3">
            <div class="section-heading padding">
                <h4 class="title">Categories</h4>
                <a href="categories.php" class="link">View All</a>
            </div>
        <?php 
            if(isset($parent_cats) && !empty($parent_cats)){
                echo '<div class="islide">';
              $i = 0;
              foreach (array_slice($parent_cats, 0, 10) as $parents ) {
                  ?>
                <!-- item -->
                <div class="item animated fadeInUp item-main">
                    <a href="category?cid=<?php echo $parents->id; ?>">
                        <div class="blog-card">
                            <img src="<?php echo UPLOAD_URL.'category/'.$parents->featured_image; ?>" alt="image" class="imaged">
                            <div class="text">
                                <h4 class="title"><?php echo stripslashes($parents->title);?></h4>
                            </div>
                        </div>
                    </a>


                     <!-- loader -->
              <div class="loader-top">
                 <div class="ph-item"> 
                   <div class="ph-col-12">
                  <div class="ph-picture"></div>
                  <div class="ph-row p-2">
                     <div class="ph-col-12 small mb-3"></div>
                  </div>
                </div>
                 </div>
               </div>
                <!-- loader ends -->


                </div>
                <!-- * item -->
                <?php  
            }
            echo '</div>';
        }
             ?>
  
        </div>
        <!-- * Categories -->


         <!-- Products -->
     <div class="section full mt-4 mb-3">
            <div class="section-heading padding">
                <h4 class="title">Products</h4>
               
            </div>

            <div class="products">
            <?php

$rowperpage = 20;

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
    <div class="post product-items product-card animated fadeInUp"  id="post_<?php echo $id; ?>">

    <div class="product-image">
    <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($row['title']); ?>" class="imaged">
    </div>

    <div class="product-info">
    <a class="overflow-hidden" href="details?id=<?php echo $row['id']; ?>">
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
        <button class="add-to-cart bg-blue btn-right"  onclick="addToWishlist(<?php echo  $row['id'];?>);"> <ion-icon name="heart"></ion-icon></button>

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
</div>
<div align="center" class="mt-1 mb-3">
<h5 class="load-more">Load More</h5>
</div>
<input type="hidden" id="row" value="0">
<input type="hidden" id="all" value="<?php echo $allcount; ?>">

             

        </div>
        <!-- * Products -->

        

    </div>
    <!-- * App Capsule -->


<?php include("bottom-menu.php"); ?>       
<?php include("sidebar.php"); ?>
<?php include("footer.php"); ?>