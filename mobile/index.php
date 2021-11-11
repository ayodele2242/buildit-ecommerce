<?php 
include("header.php"); 
include("header-bottom.php"); 
?>
 
  <!-- App Capsule -->
    <div id="appCapsule">

     <!-- Categories -->
     <div class="section full mt-2 mb-0">
            <div class="section-heading padding">
                <h4 class="title">Categories</h4>
                <a href="categories.php" class="link">View All</a>
            </div>
            <div id="loadCategories">
       
            </div>

        </div>
        <!-- * Categories -->


         <!-- Products -->
<div class="section full mb-3">
  <div class="section-heading padding">
      <h4 class="title">Products</h4>
  </div>

  <div class="products" id="loadProducts">

    
<!--<div align="center" class="mt-1 mb-3">
<h5 class="load-more">Load More</h5>
<div class="no-more" style="display:none">No more products available</div>
</div>
<input type="hidden" id="row" value="0">
<input type="hidden" id="all" value="<?php //echo $allcount; ?>">-->

             
  </div>
</div><!-- * Products -->
        

        

    </div>
    <!-- * App Capsule -->


<?php include("bottom-menu.php"); ?>       
<?php include("sidebar.php"); ?>
<?php include("footer.php") ?>


<script>
$('#loadProducts').addClass("loadingProducts");
  $('#loadCategories').addClass("loadingCategories");
        //When the page has loaded.
        $( document ).ready(function(){

          $("#loader").hide();
            //Perform Ajax request.
            $.ajax({
                url: 'loadFrontProducts.php',
                type: 'get',
                success: function(data){
                    //If the success function is execute,
                    //then the Ajax request was successful.
                    //Add the data we received in our Ajax
                    //request to the "content" div.
                    $('#loadProducts').html(data).removeClass("loadingProducts");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Ajax request failed: ' + xhr.responseText;
                    $('#loadProducts').html(errorMsg).removeClass("loadingProducts");
                  }
            });
        });


        $( document ).ready(function(){

            //Perform Ajax request.
            $.ajax({
                url: 'loadFrontCategories.php',
                type: 'get',
                success: function(data){
                    //If the success function is execute,
                    //then the Ajax request was successful.
                    //Add the data we received in our Ajax
                    //request to the "content" div.
                    $('#loadCategories').html(data).removeClass("loadingCategories");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Request failed: ' + xhr.responseText;
                    $('#loadCategories').html(errorMsg).removeClass("loadingCategories");
                  }
            });
        });
        </script>