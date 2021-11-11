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
            My Wishlist
        </div>
</div>        


 <!-- App Capsule -->
    <div id="appCapsule">

     <!-- Categories -->
     <div class="section full mt-2 p-2" id="loadWishList">
      

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