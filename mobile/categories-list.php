<?php
include("header.php");
$category = new Category();
  $product = new Product();
  $parent_id = null;
  $child_cat_id = null;

  if (isset($_GET['cid'])) {
    $parent_id = (int)$_GET['cid'];
     $cat = $category->getCategoryById($parent_id);
  }

  if (isset($_GET['child_id'])) {
    $child_cat_id = (int)$_GET['child_id'];
    $cat = $category->getCategoryById($child_cat_id);

  }

  $category_product = $product->getProductByCategory($parent_id, $child_cat_id);

?>
<div class="appHeader">
        <div class="left">
        <a href="#" class="headerButton goBack bolder" onclick="goBack()">
                <ion-icon name="chevron-back-outline"></ion-icon> 
            </a>
        </div>
        <div class="pageTitle">
            <?php echo $cat[0]->title; ?>
        </div>
</div>        
<style type="text/css">
     .nothing-here{
  position: relative;
  top: 200px;
  margin: 0 auto;
  z-index: 10;
}

.nothing-here p ion-icon{
  font-size: 56px;
  margin-bottom: 10px;
  font-weight: bolder;
  text-align: center;
  line-height: 5px;
}
.nothing-here p{
  font-size: 18px;
  text-align: center;
  line-height: 5px;
}
</style>

 <!-- App Capsule -->
    <div id="appCapsule">

     <!-- Categories -->
     <div class="section full mt-2 mb-0">
     	<div class="products">
           
        <?php 
            if($category_product){
               
              $i = 0;
               $counter = 1;
              foreach($category_product as $cat_product){
                if($cat_product->images != "" && file_exists('../upload/product/'.$cat_product->images)){
                        $thumbnail = '../upload/product/'.$cat_product->images;
                      } else {
                        $thumbnail = FRONT_IMAGES.'no-image.png';
                      }
                      $shortcontent = substr($cat_product->title, 0, 160)."...";
                  ?>
                    <!--  Products-list -->
    <div class="post product-items product-card animated fadeIn"  id="post_<?php echo $cat_product->id; ?>">

    <div class="product-image">
    <img src="<?php echo $thumbnail;?>" alt="<?php echo stripslashes($cat_product->title); ?>" class="imaged">
    </div>

    <div class="product-info">
    <a class="overflow-hidden" href="search.php?id=<?php echo $cat_product->id; ?>">
      <h5>  <?php echo stripslashes($shortcontent); ?></h5>
    </a>
      <div class="text-accent price">
      <?php 
      if($cat_product->size_category == "different"){

    $prices = $cat_product->price;
    $amt = explode(",", $prices);
    $min = min($amt);
    $max = max($amt);

    $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

    echo $price;
    


      }else{
  $price =  $cat_product->price;
  $discount =  $cat_product->discount;
  if($discount > 0){
    $price = $price-(($price*$discount)/100);
  }

  echo " ".$left_currency.number_format($price).$right_currency;
  if($discount > 0){

    echo ' <del class="product-old-price text-danger">  '.$left_currency.number_format($cat_product->price).$right_currency.'</del>';
  }

}

?>

      </div>
    </div>

    <div class="product-btns">
    <?php   
              if(!empty($cat_product->discount)){
              ?>
    <span class="sale-discount">-<?php echo  $cat_product->discount; ?>%</span>
              <?php } ?>
        <button class="add-to-cart btn-right"  onclick="addToWishlist(<?php echo  $cat_product->id;?>);"> <ion-icon name="heart"></ion-icon></button>

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
                <!-- * item -->
                <?php  
            }
           
        }else{
            ?>
         
         <div class="nothing-here mt-8">
             <p> <ion-icon name="sad"></ion-icon></p>
             <p>No product found for this category</p>

         </div>
         <?php
        }
             ?>
  
        </div>
        <!-- * Categories -->
    </div>
    </div>





<?php
include("footer.php");
?>