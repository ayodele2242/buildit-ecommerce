<?php
include("header.php");

?>
<div class="appHeader">
        <div class="left">
        <a href="#" class="headerButton goBack bolder" onclick="goBack()">
                <i class="material-icons icon">arrow_back_ios</i>
            </a>
        </div>
        <div class="pageTitle">
            All Categories
        </div>
</div>        


 <!-- App Capsule -->
    <div id="appCapsule">

     <!-- Categories -->
     <div class="section full mt-2 mb-0">
     	<div class="products">
           
        <?php 
            if(isset($parent_cats) && !empty($parent_cats)){
               
              $i = 0;
              foreach ($parent_cats as $parents ) {
                  ?>
                <!-- item -->
                <a href="categories-list?cid=<?php echo $parents->id; ?>" class="post product-items product-card animated fadeIn p-1">

            	<div class="product-image">
			    <img src="<?php echo '../upload/category/'.$parents->featured_image; ?>" alt="image" class="imaged">
			    </div>

			     <div class="product-info">
			     	<div class="text">
                     <h4 class="title"><?php echo stripslashes($parents->title);?></h4>
                    </div>
			     </div>



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


                </a>
                <!-- * item -->
                <?php  
            }
           
        }
             ?>
  
        </div>
        <!-- * Categories -->
    </div>
    </div>





<?php
include("footer.php");
?>