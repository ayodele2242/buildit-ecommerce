 <!-- Modal Basic -->
 <div class="modal fade modalbox" id="ModalLogin" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Account Login</h5>
                        <a href="javascript:;" data-dismiss="modal" class="text-danger close">X</a>
                    </div>
                    <div class="modal-body">
                       

                         <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                <!-- Begin # Login Form -->
                <form id="login-form" class="login-form animated fadeIn">
                          <p>
                            Login to your account to start shopping on <strong>Buildit</strong>
                        </p>
                        <div id="mymsgs"></div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="logemail" name="email" placeholder="Your e-mail">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="logpassword" name="password" placeholder="Your password">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                   


                <div class="form-links mt-2">
                    <div>
                         <!--<a href="#" class="" data-toggle="modal" data-target="#AddressModal"> <ion-icon name="user"></ion-icon> Register Now</a>-->
                    </div>
                    <div><a href="#" id="login_lost_btn" class="text-muted text-danger">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" id="logFormBtn" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

                </form>
                <!-- End # Login Form -->
                
                <!-- Begin | Lost Password Form -->
                <form id="lost-form" class="animated fadeIn" style="display:none;" >

                <div class="text-center"><div class="exp  animated fadeIn"><ion-icon name="key" class="key"></ion-icon></div></div>
		       <div class="alert alert-info animated fadeInUp mt-2 mb-3">Please enter your email below. Your password will be forwarded to your registered email address.</div>
               
                        <div class="form-group basic animated fadeInUp">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email1" placeholder="Enter your e-mail">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                   


                <div class="form-links mt-2">
                    <div>
                       
                    </div>
                    <div><a href="#" class="text-muted" id="lost_login_btn"> <ion-icon name="arrow-back" class="col-blue"></ion-icon>  Back to login</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Recover</button>
                </div>


                </form>
                <!-- End | Lost Password Form -->
                
                <!-- Begin | Register Form -->
                <!--<form id="register-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg">Register an account.</span>
                        </div>
                        <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
                    </div>
                </form>-->
                <!-- End | Register Form -->
                
            </div>
            <!-- End # DIV Form -->

                       
                    </div>
                </div>
            </div>
        </div>
        <!-- * Modal Basic -->



 
 
 
 
    <script src="js/jquery-3.4.1.min.js"></script> 
    <!-- Bootstrap-->
    <script src="js/lib/popper.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="mobile-skeleton/anime.min.js" type="text/javascript"></script>
    <script src="mobile-skeleton/main.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.toast.js"></script>
    <!-- Ionicons -->
    <script type="module" src="node_modules/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="node_modules/ionicons/dist/ionicons/ionicons.js"></script>
    

    <!--<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>-->
   
    
    <!-- Base Js File -->
    <script src="js/app.js"></script>
    <script src="custom.js"></script>
     <script src="js/placeholder.js"></script>
    <script src="js/form-wizard.js"></script>
    
 <script type='text/javascript'>
      /*if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/ndc/sw.js');
      }*/

$(document).ready(function() {

$(".loader-hide").hide();


function addToCart(product_id){

  $.post('../inc/api.php',{product_id:product_id, act:"<?php echo substr(md5('add-to-cart'), 3,15); ?>"},function(res){

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
       url: '../inc/members/login.php',
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
           setTimeout(' window.location.href = "app-setting"; ',1000);

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


 if('serviceWorker' in navigator){

        console.log("service workers supported");
         //alert("service workers supported");

        window.addEventListener('load', function(){

            // navigator.serviceWorker.register('/buildit/mobile/sw_offlinepage.js')
             navigator.serviceWorker.register('/buildit/mobile/sw_offlinesite.js')
            //navigator.serviceWorker.register('/buildit/mobile/sw_cachedsite.js')
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