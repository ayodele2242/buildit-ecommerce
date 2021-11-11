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
            To Be Review
        </div>
</div>        


 <!-- App Capsule -->
    <div id="appCapsule">

     <!-- Categories -->
     <div class="section full mt-2 p-2" id="loadReview">
      

    </div>





<?php
include("footer.php");
?>


<script>
$('#loadReview').addClass("loadingProducts");

//When the page has loaded.
$( document ).ready(function(){
    //Perform Ajax request.
    $.ajax({
        url: 'loadToBeReview.php',
        type: 'get',
        success: function(data){
            
            $('#loadReview').html(data).removeClass("loadingProducts");
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var errorMsg = 'Ajax request failed: ' + xhr.responseText;
            $('#loadReview').html(errorMsg).removeClass("loadingProducts");
          }
    });
});


</script>