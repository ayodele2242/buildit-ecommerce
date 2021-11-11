 <?php
include("header.php");
?>


 <div class="container py-4 py-lg-5 my-4">
      <div class="row justify-content-center">
        
        <div class="col-lg-8 col-md-10">
          <h2 class="h3 mb-4">Forgot your password?</h2>
          <p class="font-size-md">Please enter your registered email below. We will send your password to your mailbox.</p>
          
          <div class="card py-2 mt-4">
            <form class="card-body" id="form_reset_pwd">
              <div id="error_result"></div>
              <div class="form-group">
                <label for="recover-email">Enter your email address</label>
                <input class="form-control" type="email" id="recover-email" name="email">
                <div class="invalid-feedback">Please provide your email address.</div>
              </div>
              <button class="btn btn-primary forgot_password" type="submit">Retrieve</button>  -or-  <a href="account-signin" class="col-blue">Sign In</a>
            </form>
          </div>
        </div>
      </div>
    </div>


<?php 
include("footer.php");
 ?>

<script type="text/javascript">
  $(document).ready(function() {

   $(".forgot_password").click(function(e) {
      e.preventDefault();

  var url = "../inc/sellers/reset_password.php";       
  //if($('#form_reset_pwd').valid()){ 
    $.ajax({
    type: "POST",
    url: url,
    data: $("#form_reset_pwd").serialize(), // serializes the form's elements.
    success: function(data) {                    
      if(data==1)
      {
        $('#error_result').html('<div class="text-success">Email sent. Check your inbox.</div>');
      } 
      else
      {
        $('#error_result').html('<div class="text-danger">'+data+'</div>');
      }
    }
    });
  //}
  return false;
});
   });
</script>