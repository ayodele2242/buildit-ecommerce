<?php
require_once '../config/config.php';
require_once '../config/function.php';
require_once '../class/database.php';
require_once '../class/category.php';
require_once '../inc/fetch.php';
require_once("../inc/functions.php");

$category = new Category();
$parent_cats = $category->getAllParentCats();


if(isset($parent_cats) && !empty($parent_cats)){
    echo '<div class="islide">';
  $i = 0;
  foreach (array_slice($parent_cats, 0, 10) as $parents ) {
      ?>
    <!-- item -->
    <div class="item bg-white animated fadeIn item-main" style="border-radius: 10px;">
        <a href="categories-list?cid=<?php echo $parents->id; ?>">
            <div class="blog-card" style="background: none; height: 100%; max-height: 160px; border: none;">
                <img src="<?php echo '../upload/category/'.$parents->featured_image; ?>" alt="image" class="imaged rounded-circle">
                <div class="text">
                    <h4 class="title"><?php echo substr($parents->title, 0, 30)."...";?></h4>
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
  



<script>
//When the page has loaded.
$( document ).ready(function(){
   $('.loader-top').hide();
});
</script>  