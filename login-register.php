
<?php
include("header.php");
include("header-bottom.php");
?>

        
<div id="body-content">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">
                       
                        <!-- BEGIN content_for_index -->
                       <?php include("slider.php"); ?>
                        <div id="shopify-section-1558341502241" class="shopify-section">
                           <div class="section-separator section-separator-1558341502241 section-separator-margin-top section-separator-margin-bottom" style="background: #ffffff;">
                           </div>
                        </div>


<section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container"> 
    <div class="form"> 
      <h2>LOGIN to CodePen</h2>
      <form action="">
        <div class="inputBx">
          <input type="text" required="required">
          <span>Login</span>
          <img src="https://www.flaticon.com/svg/static/icons/svg/709/709699.svg" alt="user">
        </div>
        <div class="inputBx password">
          <input id="password-input" type="password" name="password" required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <img src="https://www.flaticon.com/svg/static/icons/svg/1828/1828471.svg" alt="lock">
        </div>
        <label class="remember"><input type="checkbox">
          Remember</label>
        <div class="inputBx">
          <input type="submit" value="Log in" disabled> 
        </div>
      </form>
      <p>Forgot password? <a href="#">Click Here</a></p>
      <p>Don't have an account <a href="#">Sign up</a></p>
    </div>
  </div>
    
  </div>
</section>



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