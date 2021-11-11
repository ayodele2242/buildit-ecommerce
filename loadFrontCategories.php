<?php
require_once 'config/config.php';
require_once 'config/function.php';
require_once 'class/database.php';
require_once 'class/category.php';
require_once 'inc/fetch.php';
require_once "inc/functions.php";

$category = new Category();
$parent_cats = $category->getAllParentCats();


if(isset($parent_cats) && !empty($parent_cats)){
    
  $i = 0;
  foreach (array_slice($parent_cats, 0, 4) as $parents ) {
      ?>
    <!-- item -->
 
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
    <div class="banner-item text-box-overlay center-center">
       <div class="image relative">
          <a href="category?cid=<?php echo $parents->id; ?>">
             <span class="image-lazysize" style="position:relative;padding-top:46.75675675675676%;">
                <!-- noscript pattern -->
                <noscript>
                   <img class="img-lazy " src="<?php echo UPLOAD_URL.'category/'.$parents->featured_image; ?>" alt=""/>
                </noscript>
                <img class="lazyload  img-lazy blur-up"
                   data-src="<?php echo UPLOAD_URL.'category/'.$parents->featured_image; ?>"
                   data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] "
                   data-aspectratio="2.138728323699422"
                   data-sizes="auto"
                   data-parent-fit="cover"
                   alt=""/>
             </span>
          </a>
       </div>
       <a href="category?cid=<?php echo $parents->id; ?>" class="text absolute product_item" style="font-size: 23px font-weight: bolder; background: rgba(0,0,0,.5); width: 100%; height: 100%; color: #fff;display: flex; align-items: center; justify-content: center;">
       
        <?php echo $parents->title; ?>
       
     </a>
    </div>
 </div>

    <!-- * item -->
    <?php  
}
}
 ?>
  



<script>
//When the page has loaded.
$(".product_item").addClass("loadingCategories");  
$( document ).ready(function(){
   $('.loader-top').hide();
   $(".product_item").removeClass("loadingCategories");
});
</script>  