 
   <!-- <section class="container-fluid px-0">
      
    </section>-->
    <!-- Footer-->
    <footer class="bg-light-blue pt-5">
      <div class="container">
        <div class="row pb-2">
         
          <div class="col-md-6 col-sm-6 row">
            <div class="widget widget-links widget-light pb-2 mb-4 col-md-6">
              <h3 class="widget-title text-light">Account &amp; shipping info</h3>
              <ul class="widget-list">
                <li class="widget-list-item"><a class="widget-list-link" href="#">Your account</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Shipping rates &amp; policies</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Refunds &amp; replacements</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Order tracking</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Delivery info</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Taxes &amp; fees</a></li>
              </ul>
            </div>
            <div class="widget widget-links widget-light pb-2 mb-4 col-md-6">
              <h3 class="widget-title text-light">About us</h3>
              <ul class="widget-list">
                <li class="widget-list-item"><a class="widget-list-link" href="#">About company</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Our team</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">Careers</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="#">News</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1">Stay informed</h3>
              <form class="validate" action="" method="get" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form">
                <div class="input-group input-group-overlay flex-nowrap">
                  <div class="input-group-prepend-overlay"><span class="input-group-text text-muted font-size-base"><i class="fa fa-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Your email" required>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="subscribe" id="mc-embedded-subscribe">Subscribe*</button>
                  </div>
                </div>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input type="text" name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
                </div><small class="form-text text-light opacity-50" id="mc-helper">*Subscribe to our newsletter to receive early discount offers, updates and new products info.</small>
                <div class="subscribe-status"></div>
              </form>
            </div>
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1">Download our app</h3>
              <div class="d-flex flex-wrap">
                <div class="mr-2 mb-2"><a class="btn-market btn-apple" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">App Store</span></a></div>
                <div class="mb-2"><a class="btn-market btn-google" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">Google Play</span></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="pt-5 bg-blue">
        <div class="container">
         
          <hr class="hr-light pb-4 mb-3">
          <div class="row pb-2">
            <div class="col-md-6 text-center text-md-left mb-4">
             
              <div class="widget widget-links widget-light">
                <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Outlets</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Affiliates</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Support</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Privacy</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Terms of use</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-right mb-4">
              <div class="mb-3">
                <?php 
                if(!empty($set['facebook'])){
                  echo '<a class="social-btn sb-light sb-facebook ml-2 mb-2" href="https://www.facebook.com/'.$set['facebook'].'"><i class="fa fa-facebook"></i></a>';
                }
                if(!empty($set['twitter'])){
                  echo '<a class="social-btn sb-light sb-facebook ml-2 mb-2" href="https://www.twitter.com/'.$set['twitter'].'"><i class="fa fa-twitter"></i></a>';
                }
                if(!empty($set['instagram'])){
                  echo '<a class="social-btn sb-light  ml-2 mb-2" href="https://www.instagram.com/'.$set['instagram'].'"><i class="fa fa-instagram"></i></a>';
                }
                if(!empty($set['youtube'])){
                  echo '<a class="social-btn sb-light  ml-2 mb-2" href="https://www.youtube.com/'.$set['youtube'].'"><i class="fa fa-youtube"></i></a>';
                }


                ?>
                
               
              </div>

              <img class="d-inline-block" width="267" src="img/method.png" alt="Payment methods"/>
            </div>




          </div>
          <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">© All rights reserved. <a class="text-light" href="<?php echo $set['installUrl'];  ?>" target="_blank" rel="noopener"><?php echo $set['storeName'];  ?>.</a></div>
        </div>
      </div>
    </footer>
    <!-- Toolbar for handheld devices-->
   <!-- <div class="cz-handheld-toolbar">
      <div class="d-table table-fixed w-100">
        <?php
        //if($current_page == "store"){
        ?>
        <a class="d-table-cell cz-handheld-toolbar-item" href="#shop-sidebar" data-toggle="sidebar"><span class="cz-handheld-toolbar-icon"><i class="fa fa-bars"></i></span><span class="cz-handheld-toolbar-label">Filters</span>
        </a>
        <?php
      //}
        ?>

        <a class="d-table-cell cz-handheld-toolbar-item" href="account-wishlist.html"><span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span><span class="cz-handheld-toolbar-label">Wishlist</span>
        </a>

        <a class="d-table-cell cz-handheld-toolbar-item" href="store"><span class="cz-handheld-toolbar-icon"><i class="fa fa-shopping-bag"></i></span><span class="cz-handheld-toolbar-label">Store</span>
        </a>

        <a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.html"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">4</span></span><span class="cz-handheld-toolbar-label">$265.00</span></a>
      </div>
    </div>-->
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Back to Top</span><i class="btn-scroll-top-icon fa fa-arrow-up">   </i></a>
    <!-- JavaScript libraries, plugins and custom scripts-->
    <script src="<?php echo FRONT_JS;?>jquery.min.js"></script>
    <script src="js/vendor.min.js"></script>
    <script src="js/theme.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
     <script src="js/app.js"></script>
    <script src="<?php echo FRONT_JS;?>slick.min.js"></script>
    <script src="<?php echo FRONT_JS;?>nouislider.min.js"></script>
    <script src="<?php echo FRONT_JS;?>jquery.zoom.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script src="<?php echo FRONT_JS;?>main.js"></script>
    <script src="<?php echo FRONT_JS;?>easyResponsiveTabs.js"></script>

    <script>


$(document).ready(function() {
   window.setTimeout("fadeMyDiv();", 1000); //call fade in 3 seconds
 });

function fadeMyDiv() {
   $("#preloader").fadeOut('slow');
}




$(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        // Child Tab
        $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });

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


  //$(document).ready(function() {
      /* Quatity buttons */
$('#q_up').click(function(){
    var q_val_up=parseInt($("#quantity_wanted").val());
    if(isNaN(q_val_up)) {
      q_val_up=0;
    }
    $("#quantity_wanted").val(q_val_up+1).keyup(); 
    return false; 
  });
  
  $('#q_down').click(function(){
    var q_val_up=parseInt($("#quantity_wanted").val());
    if(isNaN(q_val_up)) {
      q_val_up=0;
    }
    
    if(q_val_up>1) {
      $("#quantity_wanted").val(q_val_up-1).keyup();
    } 
    return false; 
  });

  //});


        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data');
                
               
                var action = 'fetch-store-products.php';
                var minimum_price = $('#min_price_hide').val();
                var maximum_price = $('#max_price_hide').val();
                var sorting = $('#sorting').val();


                var brand = get_filter('brand');
                var size = get_filter('size');
                var color = get_filter('color');
                var icategory = get_filter('icategory');

                


                

                //console.log(icategory);
                $.ajax({
                    url: "fetch-store-products.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        size: size,
                        color: color,
                        sorting: sorting,
                        icategory: icategory                  



                        
                    },
                 
                    success: function(data) {
                        $('.filter_data').html(data);
                         $('.loading-overlay').fadeOut("slow");
                    }
                });
            }

            //executes code below when user click on pagination links
            $(".filter_data").on( "click", ".pagination a", function (e){
              e.preventDefault();
              //
              $(".loading-div").show(); //show loading element
              var page = $(this).attr("data-page"); //get page number from link

              $(".filter_data").load("fetch-store-products.php",{"page":page}, function(){ //get content from PHP page
                $(".loading-div").hide(); //once done, hide loading element
              });
              
            });

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.filter_all').click(function() {
                filter_data();
            });

            $('#price_range').slider({
                range: true,
                min: 10,
                max: 1000000<?php //echo $maxamt; ?>,
                values: [10, 1000000<?php //echo $maxamt; ?>],
                step: 10,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#min_price_hide').val(ui.values[0]);
                    $('#max_price_hide').val(ui.values[1]);
                    filter_data();
                }
            });

        });
    

//  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
  $('#newslatter').click(function(e){
    $('#notify').html("");
//    $('#notify').removeClass('hidden');
    e.preventDefault();
    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email = $('#entered_email').val();
    if (email.match(mailFormat)) {
      $('#notify').html('You will get Notification of our latest Products.');
      $('#notify').removeClass('hidden');
      $('#entered_email').val('');

    }else{
      $('#notify').html('You need to enter valid email.');
      $('#notify').removeClass('hidden');
      
    }

  //var email_address = $('#entered_email').val()
  });


  /*  setTimeout(function(){
    $('.alert').slideUp('slow');
    $('alert').addClass('hidden');
    }, 5000);
*/
$(document).ready(function () {
  $(".loader-top").hide();

});

  function addToWishlist(product_id){
    $.post('../inc/api.php',{product_id:product_id, act:"<?php echo substr(md5('add-to-wishlist'), 3,15); ?>"},
      function(res){
      if(res.trim() == "Done"){
        $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Item successfully added to your wishlist</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);

      }else if(res.trim() == "failed"){
        $("#msgs").html('<div class="alert alert-warning"><i class="fa fa-info-circle"></i> &nbsp;Unable to add to your wishlist.</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);

      }
      else{

         $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
      }

  });
  }

  function deleteFromWishlist(product_id){
  
    $.post('../inc/api2.php',{product_id:product_id, act:"<?php echo substr(md5('delete-from-wishlist'), 3,15); ?>"},function(res){
      if(res){
        document.location.href = document.location.href;
      }

  });
  }
    
  function addToCart(product_id){

    $.post('../inc/api.php',{product_id:product_id, act:"<?php echo substr(md5('add-to-cart'), 3,15); ?>"},function(res){

      if (res == 1) {

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
    });
}
  function deleteCartItem(cart_index){
    $.post('../inc/api.php', {cart_index:cart_index, act:"<?php echo substr(md5('delete-from-cart'),3,15); ?>"}, function(res){
       if (res == 1) {

        $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Item Successfully deleted from cart</div>').show();
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
  }
  
   




$(document).ready(function() {
  $("#cresults").load( "fetch_reviews.php"); //load initial records
  $(".loading-div").hide();
  //executes code below when user click on pagination links
  $("#cresults").on( "click", ".pagination a", function (e){
    e.preventDefault();
    //
    $(".loading-div").show(); //show loading element
    var page = $(this).attr("data-page"); //get page number from link

    $("#cresults").load("fetch_reviews.php",{"page":page}, function(){ //get content from PHP page
      $(".loading-div").hide(); //once done, hide loading element
    });
    
  });
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













$("body").delegate(".qty","keyup",function(event){
    event.preventDefault();
    var row = $(this).parent().parent();
    /*var price = row.find('.price').val();
    
    var size  = row.find(".size").val();
    var color  = row.find(".color").val();
    var price  = row.find(".price").val();
    var img  = row.find(".img").val();
    var vendor  = row.find(".vendor").val();

    var category  = row.find(".category").val();
    */

    var qty = row.find('.qty').val();
    var id  = row.find(".id").val();

    $.ajax({

            type : 'POST',
            url  : '../inc/updateCart.php',
            data : { id: id, qty: qty},
            cache: false,
            success :  function(res)
            {
                if(res.trim() == 1)
                {


                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Cart updated successfully</div>').show();
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
            }
        });

  });



$(document).ready(function(){
    $('#activate').on('click', function(){
      var coupon = $('#coupon').val();
      var price = $('#iprice').val();

      if(coupon == ""){
        $("#msgs").html('<div class="alert alert-danger">Please enter a coupon code</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);


      }else{


    $.ajax({

            type : 'POST',
            url  : '../inc/get_coupon.php',
            data : { coupon: coupon, price: price},
            cache: false,
            success :  function(res)
            {
                if(res.trim() == "error")
                {

                  $("#msgs").html('<div class="alert alert-danger">Invalid Coupon Code!</div>').show();
                    setTimeout(function() {
                    $("#msgs").fadeOut(1500);
                     }, 10000);
            
            //$('#result').html('');
          
                    }else{

                      /*if (res) {
                        for (var i = 0; i < res.length; i++) { //for each user in the json response
                            $("#result").html("<h4 class='pull-right text-danger'>"+res[i].discount+"% Off</h4>");
                            //$(".feename").val(data[i].fee_name);
                            $(".amount").val(res[i].price);
                        } // for

                    } // if*/
      
                var json = JSON.parse(res);
            $('#result').html("<h6 class='text-danger'>"+json.discount+"% Off</h6>");
            $('#iprice').val(json.price);
                    }
            }
        });





      }




    });
  });


$(document).ready(function()
{
$("#mcountry").change(function()
{
var country_id=$(this).val();
var post_id = 'country_id='+ country_id;
//alert(post_id);
 
$.ajax
({
type: "POST",
url: "../inc/country.php",
data: post_id,
cache: false,
success: function(cities)
{
$("#mstates").html(cities);
} 
});
 
}).trigger('change');
});

//Get tax state from the selected country
$(document).ready(function()
{
$("#taxcountry").change(function()
{
var country_id=$(this).val();
var post_id = 'country_id='+ country_id;
 
$.ajax
({
type: "POST",
url: "../inc/tax/states.php",
data: post_id,
cache: false,
success: function(cities)
{
$('#mstates').empty();
$("#taxstates").html(cities);
} 
});
 
}).trigger('change');
});




</script>
<script type="text/javascript">


/*$(document).ready(function() {
   window.setTimeout("fadeMyDiv();", 3000); //call fade in 3 seconds
 }
)

function fadeMyDiv() {
   $("#mpreloader").fadeOut('slow');
}*/

$(window).load(function(){
    $('#splash').fadeOut(800);
    $('body').css('overflow','auto');
});


var cexists = $.cookie('cookie');

if (!cexists) {
    alert('will create cookie');

    $('#splash').fadeOut(2000); // fade the other
    $.cookie('cookie', 'true', {
        expires: 1 // day
    });
} else {
    alert('cookie exists');
    $('#splash').fadeOut(2000); // fade the other
}



    

</script>
  </body>
</html>