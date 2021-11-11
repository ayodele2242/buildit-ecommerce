<?php
include("header.php");
include("header-bottom.php");
?>
     


 <div id="body-content bg-light box-shadow-lg" style="background: #f0f0f0;">
   <div id="main-content">
      <div class="main-content">
         <div id="home-main-content" class="">
   <div id="shopify-section-1558341502241" class="shopify-section pl-5 pr-5">
                           <div class="section-separator section-separator-1558341502241 section-separator-margin-top section-separator-margin-bottom"> <h3>My Failed Orders</h3>
                           </div>
                        </div>
     <!-- Categories -->
     <div class="container full mt-2 p-2 " id="loadProducts">
      

    </div>
</div>
</div>
</div>
</div>




<?php
include("footer-bottom.php");
?>


<script>
$('#loadProducts').addClass("loadingProducts");

//When the page has loaded.
$( document ).ready(function(){
    //Perform Ajax request.
    $.ajax({
        url: 'loadUnpaidOrder.php',
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


</script>