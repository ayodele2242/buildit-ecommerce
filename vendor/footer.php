 
   <!-- <section class="container-fluid px-0">
      
    </section>-->
    <!-- Footer-->
    <footer class="bg-blue pt-5">
     



      <div class="bg-blue">
        <div class="container">
         
         
          <div class="pb-4 font-size-xs text-white opacity-50 text-center text-md-left">© All rights reserved. <a class="text-light" href="<?php echo $set['installUrl'];  ?>" target="_blank" rel="noopener"><?php echo $set['storeName'];  ?>.</a></div>
        </div>
      </div>
    </footer>
   
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Back to Top</span><i class="btn-scroll-top-icon fa fa-arrow-up">   </i></a>
    <!-- JavaScript libraries, plugins and custom scripts-->
    <script src="<?php echo FRONT_JS;?>jquery.min.js"></script>
    <script src="js/vendor.min.js"></script>
    <script src="js/theme.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="js/app.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    

    <script>
$(document).ready(function() {
       
$(document).on('shown.bs.modal', '.modal', function () {
    $('.modal-backdrop').before($(this));
});
//Add cart
$(document).ready(function() {

   $("#addToCart").click(function(e) {
      e.preventDefault();
        
        var serializedData = $("#productForm").serialize();
        var cat = $("#cat_type").val();
       
        var size = $("#product_size").val();

        if(cat == "single" && $('input[name=color]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">Select product color to continue.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }
        else if(cat == "single" && $('input[name=product_size]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">Select product size to continue.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }

        else if(cat == "different" && $('input[name=color]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">Select product color to continue.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }
      else if(cat == "different" && $('input[name=product_price]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">Select product size to continue.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }
        
 else{
       $.ajax({

            type : 'POST',
            url  : '../inc/createCart.php',
            data : serializedData,
            success :  function(res)
            {
                if(res.trim() == 1)
                {
                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Item added to cart Successfully</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         $(".icart").load(location.href + " .icart");
      }else{
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
      }
            }
        });
        
      }

  return false;
    });
});






  //makeActive();
   $( ".iradio-type-button2 input:radio" ).on( "change", function() {
   $('.iradio-type-button2 input:not(:checked)').parent().removeClass("color-active");
   $('.iradio-type-button2 input:checked').parent().addClass("color-active");
  });

   $( ".iradio-pay input:radio" ).on( "change", function() {
   $('.iradio-pay input:not(:checked)').parent().removeClass("color-active");
   $('.iradio-pay input:checked').parent().addClass("color-active");
  });


  $( "#input-option input:radio" ).on( "change", function() {
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$('#input-option input:not(:checked)').parent().removeClass("size-active");
$('#input-option input:checked').parent().addClass("size-active");

    var id = $("#input-option").find(":radio:checked").first().attr('id');
   var  price = $( 'input[name=product_price]:checked' ).val();
   $("#price-old").html(numberWithCommas(price));
   var data = 'id=' + id;
    $.ajax({
                type: "POST",
                url: "process.php",
                data: data,
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        for (var i = 0; i < data.length; i++) { //for each user in the json response
                            $("#product_id").val(data[i].product_id);
                            $("#size").val(data[i].size);
                            $("#prize").val(data[i].amount);
                            $("#imgy").val(data[i].image);
                        } // for

                    } // if
                } // success
            }); // ajax



});


  


 $(document).ready(function(){
    $(".btn-delete").click(function() {
       var pid = $(this).attr('id'); // get id of clicked row 
       var title = $(this).attr("datatitle");
       var color = $(this).attr("datacolor");
       
   if(confirm("Are you sure you want to delete "+title+ " with color "+color+"?")){
    
     //confirm("Are you sure you want to delete "+pid+"? There is no undo."); 
     $.post("../inc/deleteCart.php", {"id": pid, }, 
    function(res) {
        if(res.trim() == 1)
                {
                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Item deleted from cart successfully</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         $(".icart").load(location.href + " .icart");
          $(".refreshme").load(location.href + " .refreshme");
      }else{
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
      }
        
    });
   }else{
        return false;
    }



    });
  });











    

</script>
  </body>
</html>