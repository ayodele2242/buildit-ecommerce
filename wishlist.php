<?php
include("header.php");
include("header-bottom.php");
if(!isset($_SESSION['email'])){
    header("LOcation: index");
}
?>

        
 <div id="body-content bg-light box-shadow-lg" style="background: #f0f0f0;">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">
                       
                        <!-- BEGIN content_for_index -->
                       
                        <div id="shopify-section-1558341502241" class="shopify-section pl-5 pr-5">
                           <div class="section-separator section-separator-1558341502241 section-separator-margin-top section-separator-margin-bottom"> <h3>Wishlist</h3>
                           </div>
                        </div>
     <!-- Categories -->
     <div class="section full mt-2 p-5" id="loadWishList">
      

    </div>


</div>
</div>
</div>
</div>


<?php
include("footer.php");
?>


<script>
$('#loadWishList').addClass("loadingProducts");

//When the page has loaded.
$( document ).ready(function(){
    //Perform Ajax request.
    $.ajax({
        url: 'loadWishList.php',
        type: 'get',
        success: function(data){
            //If the success function is execute,
            //then the Ajax request was successful.
            //Add the data we received in our Ajax
            //request to the "content" div.
            $('#loadWishList').html(data).removeClass("loadingProducts");
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var errorMsg = 'Ajax request failed: ' + xhr.responseText;
            $('#loadWishList').html(errorMsg).removeClass("loadingProducts");
          }
    });
});


</script>