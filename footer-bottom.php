

 <div id="shopify-section-footer" class="shopify-section">
               <footer id="footer-content">
                  <div class="footer-container layout-boxed">
                  <?php include("newsletter.php"); ?>
                     <div class="footer-widget">
                        <div class="footer-inner container">
                           <div class="table-row">
                              <div class="row">
                                 <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="footer-block footer-logo">
                                       <div class="logo-footer">
                                          <a href="/" title="Electro" class="logo-site lazyload waiting">
                                             
                                          </a>
                                       </div>
                                       <div class="support-box-1">
                                          <i class="demo-icon icon-electro-support-icon"></i>
                                          <div class="text">
                                             <span>Got questions? Call us 24/7!</span>
                                             <span><?php echo $set['contactNum'] ?></span>
                                          </div>
                                       </div>
                                       <div class="support-box-2">
                                          <div class="text">
                                             <span>Contact info</span>
                                             <span><?php echo $set['address'] ?></span>
                                          </div>
                                       </div>
                                       <div class="widget-social">
                                          <ul class="widget-social-icons list-inline">
                                             <li>
                                                <a target="_blank" rel="noopener" href="https://www.facebook.com/<?php echo $set['facebook'] ?>/" title="Facebook">
                                                <i class="demo-icon icon-facebook"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a target="_blank" rel="noopener" href="https://www.twitter.com/<?php echo $set['twitter'] ?>/" title="Twitter">
                                                <i class="demo-icon icon-twitter-bird"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a target="_blank" rel="noopener" href="https://www.instagram.com/<?php echo $set['instagram'] ?>/" title="Instagram">
                                                <i class="demo-icon icon-instagram-1"></i>
                                                </a>
                                             </li>
                                            
                                             <!--<li>
                                                <a target="_blank" rel="noopener" href="https://www.youtube.com/shopify/" title="Youtube">
                                                <i class="demo-icon icon-youtube-play"></i>
                                                </a>
                                             </li>-->
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                    <div class="footer-block footer-menu">
                                       <h6>Find In Fast<span class="icon"></span></h6>
                                       <ul class="f-list">
                                             <?php 
                                               if(isset($parent_cats) && !empty($parent_cats)){
                                               $i = 0;
                                               foreach (array_slice($parent_cats, 0, 6) as $parents ) {
                                               $child_cats = $category->getChildByParentId($parents->id);
                                                 
                                             ?>
                                          <li><a href="category?cid=<?php echo $parents->id; ?>"><span><?php echo stripslashes($parents->title); ?> </span></a></li>
                                          <?php 
                                             }
                                          }
                                          ?>
                                       </ul>
                                    </div>
                                 </div>
                     <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="footer-block footer-menu">
                           <h6>Information<span class="icon"></span></h6>
                           <ul class="f-list">
                              <li><a href="vendor/index"><span> Sell on <?php echo $set['storeName'];  ?> </span></a></li>
                              <li><a href="advertising"><span> Advertise with Us </span></a></li>
                              
                             <li class="widget-list-item"><a class="widget-list-link" href="account-signin">My Orders</a></li>
                            <!--<li class="widget-list-item"><a class="widget-list-link" href="track-order">Track My Order</a></li>-->
                            <li class="widget-list-item"><a class="widget-list-link" href="return-policy">Return Policy</a></li>
                            <li class="widget-list-item"><a class="widget-list-link" href="returns_and_exchanges">Help Center</a></li>
                           </ul>
                        </div>
                     </div>
                                 
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="footer-bot">
                        <div class="container">
                           <div class="table-row">
                              <div class="copyright">
                                 <p>&copy; <strong><?php echo $set['storeName'];  ?></strong>. All Rights Reserved</p>
                              </div>
                              <div class="payment-icons">
                                 <ul class="list-inline">
                                    <li  class="lazyload waiting"> 
                                       <img  class="lazyload" data-srcset="assets/img/paystack.png 2x"
                                          alt="Payment"
                                          style="max-width: 324px;" />
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               
               </footer>
            </div>
         </div>
        
         
         <!--<script src="frontpage/currencies.js"></script>
         <script src="frontpage/jquery.currencies.min.js?v=14873190640512521766"></script>-->

        

     




<div id="modal-container">
  <div class="modal-background">
    <div class="modal">
    <div id="product_contents"></div>
    <div class="close-div closeMe">X</div>
    </div>
    
  </div>
</div>








        
      
         <script src="frontpage/cookieconsent.min.js?v=14140752332596360258" defer></script>
         <script>
            window.addEventListener("load", function(){
              window.cookieconsent.initialise({
                "palette": {
                  "popup": {
                    "background": "#000000",
                    "text": "#ffffff"
                  },
                  "button": {
                    "background": "#fed700",
                    "text": "#000000"
                  }
                },
                "position": "bottom-right",
                "content": {
                  "message": "This website uses cookies to ensure you get the best experience on our website.",
                  "dismiss": "Got it!",
                  "link": "Learn more",
                  "href": "https://www.buildit.com.ng/cookie"
                },
                "location": false
            
              })});
         </script>
      </div>
      <div id="scroll-to-top" title="Back To Top"><a href="javascript:;"></a></div>
      <!--[if (gt IE 9)|!(IE)]><!-->
      
       <script crossorigin="anonymous" src="frontpage/theme-sections.min.js?v=5245451067658317120" defer="defer"></script>
      <script crossorigin="anonymous" src="frontpage/jquerry.plugin.min.js?v=16313301528351148022" defer></script>
     <!-- <script crossorigin="anonymous" src="frontpage/bc.ajax-search.js?v=2694909775249052833" defer></script>-->
      
      <script crossorigin="anonymous" src="frontpage/bc.script.js?v=6566657789158559389"></script>
     
       <script src="js/app.js"></script>
    <script src="<?php echo FRONT_JS;?>slick.min.js"></script>
    <script src="<?php echo FRONT_JS;?>nouislider.min.js"></script>
    <script src="<?php echo FRONT_JS;?>jquery.zoom.min.js"></script>
      <script src="frontpage/jquery-ui.js"></script>
      
      <script src="custom.js"></script>





<script type='text/javascript'>
      /*if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/ndc/sw.js');
      }*/
$(document).ready(function(){
  
    $("#searchmobile").keyup(function(){
       var query = $(this).val();
       $('.close-icon').addClass("input-icon").show();
       $('.search-icon').removeClass("input-icon").hide();
       if (query != "") {
         $.ajax({
           url: 'product-search.php',
          type:'GET',
           data: {query:query},
           success: function(data){
            $('.resultMoble-search').html(data).show();
              
            $(".resultMoble-search").css('background', '#f0f0f0');
           }
         });
       } else {
       $('#search-output').css('display', 'none');
     }
   });

});

$(document).ready(function(){
      $("#productSearch").keyup(function(){
         var query = $(this).val();
        
         if (query != "") {
           $.ajax({
             url: 'product-search.php',
            type:'GET',
             data: {query:query},
             success: function(data){
              $('.result-ajax-search').html(data).show();
              
                   $("#result-ajax-search").css('background', '#f0f0f0');
             }
           });
         } else {
         $('#result-ajax-search').css('display', 'none');
       }
     });

});

$(document).ready(function() {

$(".loader-hide").hide();

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
/*function addToCart(product_id){

  $.post('inc/api.php',{product_id:product_id, act:"<?php //echo substr(md5('add-to-cart'), 3,15); ?>"},function(res){

    if (res == 1) {

      $.toast({ 
        text : '<b><ion-icon name="checkmark-circle"></ion-icon> &nbsp;Item successfully added to cart </b>', 
        showHideTransition : 'fade',  
        bgColor : 'green',              
        textColor : '#fff',       
        allowToastClose : false,    
        hideAfter : 4000,
        loader: false,                               
        textAlign : 'center',           
        position : 'top-right'  
      });
       $(".icart").load(location.href + " .icart");
       $("#actionSheetForm").modal("hide");
       //$("#actionSheetForm").modal('hide');
       $('.modal').modal('toggle');
        $('.modal-backdrop').removeClass('modal-backdrop');
        $('.action-sheet').removeClass('action-sheet');

        location.reload(true);
 
    }else{

      $.toast({ 
        text : '<b><ion-icon name="sad"></ion-icon> &nbsp;'+res+'</b>', 
        showHideTransition : 'fade',
        bgColor : 'red',            
        textColor : '#fff',
        allowToastClose : false,
        hideAfter : 4000,
        loader: false,            
        stack : 5,                     
        textAlign : 'center', 
        position : 'top-right'  
      });

    }
  });
}*/
function deleteCartItem(cart_index){
  $.post('inc/api.php', {cart_index:cart_index, act:"<?php echo substr(md5('delete-from-cart'),3,15); ?>"}, function(res){
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


    $('#logFormBtn').click(function(e){ 
    e.preventDefault();
      var username = $("#logemail").val();
      var password = $("#logpassword").val();
      if(username=="")
      {

       $.toast({ 
        text : 'Please enter your email', 
        showHideTransition : 'fade',  
        bgColor : 'red',              
        textColor : '#fff',       
        allowToastClose : false,    
        hideAfter : 4000,
        loader: false,                               
        textAlign : 'center',           
        position : 'top-right'  
      });

      }else if(password=="")
      {
       $.toast({ 
        text : 'Please enter your password', 
        showHideTransition : 'fade',  
        bgColor : 'red',              
        textColor : '#fff',       
        allowToastClose : false,    
        hideAfter : 4000,
        loader: false,                               
        textAlign : 'center',           
        position : 'top-right'  
      });

         
      }
else
{
    $.ajax({
       type: "POST",
       url: 'inc/members/login.php',
       data: $("#login-form").serialize(),
       success: function(data)
       {
          if (data.trim() == 'ok') {
             $.toast({ 
            text : 'Please wait while we log you in...', 
            showHideTransition : 'fade',  
            bgColor : 'green',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'center'  
          });
           setTimeout(' window.location.href = "index"; ',1000);

          }else if(data.trim() == "i"){

           
             $.toast({ 
            text : 'Your account is not yet activated at the moment. Please go to your email and confirm your email.', 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
          });

    }
    else if(data.trim() == "s"){

       $.toast({ 
            text : 'Your account is suspended.', 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
      });
    }
          else {

            $.toast({ 
            text : data, 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
           });

          }
       }
   });
}
 });
    
});

$(document).ready(function() {
  $('#registerform').submit(function(e) {
    e.preventDefault();
     
    $.ajax({
       type: "POST",
       url: '../inc/members/register.php',
       data: $(this).serialize(),
       success: function(data)
       {
           if(data.trim() == 1){

             $.toast({ 
            text : 'Successfully registered. Proceed to login.', 
            showHideTransition : 'fade',  
            bgColor : 'green',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
           });

                   
                   
                   $('#registerform')[0].reset();
                   $('.login-section').addClass('section-open');
                 $('.login-section').removeClass('section-close');
                 $('.signup-section').addClass('section-close');
                 $('.signup-section').removeClass('section-open');
                  }else{
                    $.toast({ 
            text : data, 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
           });
                  }

       }
   });
 });
});


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
                max: 1000000,
                values: [10, 1000000],
                step: 10,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#min_price_hide').val(ui.values[0]);
                    $('#max_price_hide').val(ui.values[1]);
                    filter_data();
                }
            });

        });

if('serviceWorker' in navigator){

        console.log("service workers supported");
         //alert("service workers supported");

        window.addEventListener('load', function(){
             navigator.serviceWorker.register('sw_offlinesite.js')
            .then(function(registration){

                console.log('Service worker has registered successfully');
                console.log('Scope: ' + registration.scope)

            }, function(error){

                console.log('Service worker registration failed');
                console.log(error)
                ///alert('Service worker registration failed');

            });

        });

    }


</script>















   </body>
</html>
