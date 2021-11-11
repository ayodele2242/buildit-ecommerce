 <?php
include("header.php");
if(isset($_SESSION['email'])){
	header("Location: dashboard");
}
?>
<style type="text/css">
  .register_icon{
    width: 150px;
    height: 150px;
    border-radius: 50%;
  }
</style>


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
              		echo '<div class="alert alert-danger mb-3 pb-2 pt-2 pl-2">Please enter your username and password</div>';
              	}else{
              		$email = $mysqli->real_escape_string($_POST['email']);
              		$pass = encryptIt($_POST['password']);
              		$query = mysqli_query($mysqli,"select * from vendors where email = '$email' and password = '$pass' and status=1 and token=''");
              		$count = mysqli_num_rows($query);
                  $row = mysqli_fetch_array($query);



              		if($count > 0){
              			header("Location: dashboard");
              			$_SESSION['aemail'] = $email;
                    
              		}else if($row['status'] == 0){
                    echo '<div class="alert-danger mb-3 pb-2 pt-2 pl-2">Your account is not yet activated. Please check your email to activate your account.</div>';
                  }else{
              			echo '<div class="alert-danger mb-3 pb-2 pt-2 pl-2">Invalid user details entered. Please check and try again.</div>';
              		}


              	}



              }



              ?>
            
            
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
        <div class="col-md-6 pt-2 mt-3 mt-md-0">
          <h2 class="h4 mb-3"> <h1><span class="bigger text-bolder col-blue">Vendor</span> <small>Center</small></h1></h2>
          <p class="font-size-md text-muted mb-4">If you are yet to create an account, you can <a href="register">here</a> | <a href="activation-link"><b></b>Resend activation link</b></a>.</p>

          <div>
                     <div class="h5 d-flex align-items-center mb-5 mt-lg-4">
             
            Need help? call <?php echo $set['contactNum']; ?> to have
                our agent assist you. 9am to 6pm, Monday - Friday

            </div>


           
        </div>
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