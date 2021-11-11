 <?php
include("header.php");
//include("navs.php");
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
 <section class="bg-position-center-top bg-no-repeat pt-3 pb-5 py-md-5" style="background:  #1c2a48;">

 
      <div class="container pt-lg-5 mt-lg-1 mb-3 mb-lg-0">
  
    <div class="pull-right"><a href="account-signin" class="btn bg-white col-blue">Sign In</a></div>
 


        <div class="row">
          <div class="col-lg-5 col-md-6 col-sm-8 offset-lg-1">
            <h1 class="text-strong font-weight-normal col-blue">Make Money</h1>
            <h3 class="text-light mb-5">sell to customers</h13>
           

            <div class="h5 col-white d-flex align-items-center mb-5 mt-lg-4">
             
            Need help? call <?php echo $set['contactNum']; ?> to have
                our agent assist you. 9am to 6pm, Monday - Friday

            </div>


            <ul class="list-unstyled text-light mb-0">
              <li class="d-flex">How it works</li>
            </ul>

          </div>
        </div>
      </div>
<div class="container">
 <div class="row">
      <div class="col-lg-6 align-items-center">
         
        <div align="center">
      <div class="register_icon" style="background:  url(<?php echo $set['installUrl'] ?>assets/img/register.png) no-repeat center center/cover;">
      </div>
      </div>  
      <div class="text-center mt-3 col-white">
         <h5 class="col-white"> Register under 5 minutes</h5>
         <p class="">
         fill the registration form and
        submit the required documents
        </p>
        <ul class="list-unstyled text-light mb-0 text-center">
              <li class=""><i class="fa fa-arrow-right mr-2"></i> business registration</li>
              <li class=""><i class="fa fa-arrow-right mr-2"></i> bank account details</li>
        </ul>
        
      </div>

      </div>

      <div class="col-lg-6 align-items-center">
        <div align="center">
      <div class="register_icon" style="background:  url(<?php echo $set['installUrl'] ?>assets/img/items.png) no-repeat center center/cover;">
      </div>
      </div>  
      <div class="text-center mt-3 col-white">
         <h5 class="col-white"> List your products and sell</h5>
         <p class="">
         Upload your products and start selling
        </p>
       
        
      </div>

      </div>

 <div class="col-lg-12 align-items-center mt-3">
  <div align="center">
<a class="btn btn-primary mr-grid-gutter" href="register">
              <i class="fa fa-money font-size-lg mr-2"></i> Start selling</a>

 </div>
</div>

  </div>

</div>
    </section>

 
<?php 
include("footer.php");
 ?>


 