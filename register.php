
<?php
include("header.php");
echo '<div class="boxed-wrapper mode-color" data-cart-style="dropdown" data-redirect="false" data-ajax-cart="false">';
include("header-bottom.php");
?>
<link href="frontpage/login.css" rel="stylesheet" type="text/css" media="all">
        
<div id="body-content">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">
                       
<!-- BEGIN content_for_index -->
<?php 
 if(isset($_SESSION['email'])){
  header("Location: dashboard");
}
?>
                      


<div class="login-wrapper">
  <div class="login-container">
    <div class="logn-col-left">
      <div class="login-text">
        
        <p>
          <h2 class="col-white">No account? Sign up</h2>
        </p>
        <p>
          By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.
        </p>
        <p></p>

        <p>Already have an account?  <a href="login" class="btn btn-sm bg-white col-blue"><i class="fa fa-lock"></i> Login here</a></p>
        
      </div>
    </div>
    <div class="logn-col-right">
      <div class="login-form">
        
        <form id="regForm" class="row">

                       <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="firstname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

               
                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your e-mail">
                            </div>
                        </div>

                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Phone No.</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone No.">
                            </div>
                        </div>
        
                        

                        <div class="form-group basic col-12">
                            <div class="input-wrapper">
                                <label class="label" for="zipcode">ZIP Code</label>
                                <input type="number" class="form-control" id="zip" name="zip" placeholder="ZIP Code">
                            </div>
                        </div>

                        <div class="form-group basic col-lg-4 col-sm-12 ">
                            <div class="input-wrapper">
                                <label class="label" for="country">Country</label>
                                <select class="form-control custom-select mselect select" id="mcountry" name="country">
                                <option value="">Choose country</option>
                                <?php echo getCountry(); ?>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic col-lg-4 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="select4">State</label>
                                <select class="form-control custom-select" id="mstates" name="state">
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic col-lg-4 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="select4">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="City">
                            </div>
                        </div>

                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Address 1</label>
                                <textarea id="address1" rows="2" class="form-control"
                                    placeholder="Address 1" name="address1"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Address 2</label>
                                <textarea id="address2" rows="2" class="form-control"
                                    placeholder="Address 2"  name="address2"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                            </div>
                        </div>
        
                        <div class="form-group basic col-lg-6 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="password2">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Type password again">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic col-lg-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="default-address" value="1" type="checkbox" checked id="same-address">
                            <label class="custom-control-label" for="same-address">Set as default shipping address</label>
                        </div>
                        </div>
                        
                        <!--<div class="form-group basic">
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                           
                            <label class="custom-control-label" for="customChecka1">
                               
                            </label>
                        </div>
                        </div>-->
        
                    


                <div class="form-button-group col-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg regFormBtn">Register</button>
                    <a href="login" class="btn btn-sm bg-white col-blue btn-block btn-lg mobile-btn"><i class="fa fa-lock"></i>  Login here</a>
                </div>

            </form>
        </div>
    </div>
  </div>
  
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
  function show_hide_password(target){
  var input = document.getElementById('password-input');
  if (input.getAttribute('type') == 'password') {
    target.classList.add('view');
    input.setAttribute('type', 'text');
  } else {
    target.classList.remove('view');
    input.setAttribute('type', 'password');
  }
  return false;
}
</script>