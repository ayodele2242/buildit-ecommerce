
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
  header("Location: index");
}
?>
                      


<div class="login-wrapper">
  <div class="login-container">
    <div class="logn-col-left">
      <div class="login-text">
        <h2> 
        <!--<a href="<?php //echo $set['installUrl']; ?>" title="" class="logo-site logo-site-desktop d-none d-lg-block lazyload waiting">
           <img src="<?php //echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>" style="width: 100%; max-width: 150px; height: 100%; max-height: 100px;">
        </a></h2>-->
        <p class="col-white">
          Create your <?php echo $set['storeName']; ?> customer account in just a few clicks! You can register using your e-mail address.
        </p>
        <a class="btn bg-white col-blue" href="register">Register</a>
      </div>
    </div>
    <div class="logn-col-right">
      <div class="login-form">
        <h2>Login</h2>
        <form id="login-form">
          <p>
            <input type="text" placeholder="Username" id="logemail" name="email">
          </p>
          <p>
            <input type="password" placeholder="Password" id="logpassword" name="password">
          </p>
          <p>
            <button class="btn btn-primary btn-block btn-lg" id="logFormBtn">Sign In</button>
            <a href="register" class="btn btn-sm bg-white col-blue btn-block btn-lg mobile-btn"><i class="fa fa-user"></i>  Register</a>
           
          </p>
          <p>
            <a href="<?php echo $set['installUrl']; ?>"><i class="fa fa-arrow-left"></i> Back home</a>
             <a href="forgot-password" class="col-red">Forget password?</a>
          </p>
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