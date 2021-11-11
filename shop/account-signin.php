 <?php
include("header.php");
include("navs.php");
if(isset($_SESSION['email'])){
	header("Location: my-account");
}
?>



 <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-3">Sign in</h2>

              <?php
              if(isset($_POST['signin'])){
              	if(empty($_POST['email']) || empty($_POST['password'])){
              		echo '<div class="">Please enter your username and password</div>';
              	}else{
              		$email = $mysqli->real_escape_string($_POST['email']);
              		$pass = encryptIt($_POST['password']);
              		$query = mysqli_query($mysqli,"select * from customer_login where email = '$email' and password = '$pass'");
              		$count = mysqli_num_rows($query);
                  $row = mysqli_fetch_array($query);

              		if($count > 0){
              			header("Location: my-account");
              			$_SESSION['email'] = $email;
                    $_SESSION['name'] = $row['last_name'].' '.$row['first_name'];
                    
              		}else{
              			echo '<div class="alert-danger mb-3 pb-2 pt-2 pl-2">Invalid user details entered. Please check and try again.</div>';
              		}


              	}



              }



              ?>
             <!-- <div class="py-3">
                <h3 class="d-inline-block align-middle font-size-base font-weight-semibold mb-2 mr-2">With social account:</h3>
                <div class="d-inline-block align-middle">
                	<a class="social-btn sb-google mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Google"><i class="fa fa-google"></i></a>
                	<a class="social-btn sb-facebook mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Facebook"><i class="fa fa-facebook"></i></a>
                	<a class="social-btn sb-twitter mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Twitter"><i class="fa fa-twitter"></i></a></div>
              </div>-->
              <hr>
              <!--<h3 class="font-size-base pt-4 pb-2">Or using form below</h3>-->
              <form  class="needs-validation" novalidate method="post">
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                  <input class="form-control prepended-form-control" type="email" name="email" placeholder="Email" required autocomplete="off" auto-complete="off">
                </div>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fa fa-key"></i></span></div>
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" name="password" placeholder="Password" autocomplete="off" autocomplete="off" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="fa fa-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                    </label>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" checked id="remember_me">
                    <label class="custom-control-label" for="remember_me">Remember me</label>
                  </div>
                  <a class="nav-link-inline font-size-sm" href="password-recovery">Forgot password?</a>
                </div>
                <hr class="mt-4">
                <div class="text-right pt-4">
                  <button class="btn btn-primary" type="submit" name="signin"><i class="fa fa-sign-in mr-2 ml-n21"></i>Sign In</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-4 mt-3 mt-md-0">
          <h2 class="h4 mb-3">No account? Sign up</h2>
          <p class="font-size-sm text-muted mb-4">By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
          <form id="regUForm" >
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">First Name</label>
                  <input class="form-control" type="text"  name="fname" id="reg-fn" >
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Last Name</label>
                  <input class="form-control" type="text" name="lname" id="reg-ln" >
                 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">E-mail Address</label>
                  <input class="form-control" type="email" name="email"  id="reg-email" >
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Gender</label>
                  <select class="form-control select">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-password">Password</label>
                  <input class="form-control" type="password" name="password" id="reg-password" >
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-password-confirm">Confirm Password</label>
                  <input class="form-control" type="password" name="password2" id="reg-password-confirm" >
                  
                </div>
              </div>
            </div>
            <div class="text-right">
              <button class="btn btn-primary regFormBt" type="submit"><i class="fa fa-user mr-2 ml-n1"></i>Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>





<?php 
include("footer.php");
 ?>


 <script type="text/javascript">
   $('.regFormBt').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#regUForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"../inc/user/addNewUser.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){
                   $("#msgs").html('<div class="alert alert-success">Successfully registered.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
 
                 // $('#productForm')[0].reset();  
                 location.href = 'my-account';
                 
                  }else{
                    $("#msgs").html('<div class="alert alert-danger text-left">'+data+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
                  }
                     //alert(data);  
                     
                }  
           }); 


      }); 
 </script>