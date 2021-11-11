
<?php
include("header.php");
include("header-bottom.php");
?>

<div id="body-content">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">
                       
                        <!-- BEGIN content_for_index -->
                       
                        <div id="shopify-section-1558341502241" class="shopify-section">
                           <div class="section-separator section-separator-1558341502241 section-separator-margin-top section-separator-margin-bottom" style="background: #ffffff;">
                           </div>
                        </div>

<div align="center">
        <div class="section mt-2 text-center">
            <h1>Forgot password</h1>
            <h4>Type your e-mail to reset your password</h4>
        </div>
        <div class="container mb-5 p-5 row">

            <div class="col-lg-3 col-sm-12"></div>
            <div class="col-lg-6 col-sm-12">
                
             <form id="forgotForm">
                <div id="msgs"></div>
                
               <div class="animated fadeInUp mt-2 mb-3">Please enter your email below. Your password will be forwarded to your registered email address.</div>
               
                        <div class="form-group basic animated fadeInUp">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" name="email" id="lemail"  placeholder="Enter your e-mail">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                   


                        <div align="center">
                    <button class="btn btn-primary btn-sm" id="forgotBtn">Recover</button>
                </div>
                </form>
            </div>
                 <div class="col-lg-3 col-sm-12"></div>
        </div>

                

</div>

</div>
</div>
</div>
</div>

  <?php
//include("footer-newsletter-section.php");
//include("footer-section-two.php");
//include("footer-partners.php");
include("footer-bottom.php");
?>

<script type="text/javascript">
    $('#forgotBtn').click(function(e) {
       
    e.preventDefault();
   
    $.ajax({
       type: "POST",
       url: 'inc/members/recoverPwd.php',
       data: $("#forgotForm").serialize(),
       success: function(data)
       {
           if(data.trim() == 1){

                   $("#msgs").html('<div class="alert alert-success">Password successfully sent to your email address.</div>').show();
                   setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 4000);
                   
                   $('#forgotForm')[0].reset();
                  
                  }else{
                    $("#msgs").html('<div class="alert alert-danger text-left">'+data+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(500);
          }, 4000);
                  }

       }
   });
 });

</script>