 <?php
include("vheader.php");
include("nav.php");
include("left_menu.php");

	$query = mysqli_query($mysqli,"select * from vendors where username='$username'");
  $row = mysqli_fetch_array($query);		
 ?>
 

 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">My Profile</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            
          </div>
        </div>
        <div class="content-body">
        	<section class="card">
	<div id="invoice-template" class="card-body">

		<div class="row">
           
         <form class="form-horizontal form"  id="regVForm">
<div class="col-md-12">    


<div id="g-recaptcha-error"></div>
<div class="box row-fluid"> 
<br>
<div class="step">
<div class="form-group mb-2">
<h4 class="col-blue">Personal Information</h4>
</div>
<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="name" class="inner required">First and Last Name*</label>
</div>
<div class=" col-lg-7">
<input type="text" name="name" id="name" value="<?php  echo $row['name']; ?>" class="form-control" data-view-id="#namen" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">Phone Number*</label>
</div>
<div class=" col-lg-7">
<input type="text" name="phone" id="phone" data-view-id="#phone" value="<?php  echo $row['phone']; ?>" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="vendor_name" class="inner required">Display Name / Shop Name*</label>
</div>
<div class=" col-lg-7">
<input type="text" name="vendor_name" id="vendor_name" data-view-id="#vendor_name" value="<?php  echo $row['vendor_name']; ?>" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="vendor_name" class="inner required">Your Unique Name*</label>
</div>
<div class=" col-lg-7">
<input type="text" name="uname"   value="<?php  echo $row['username']; ?>" class="form-control" autocomplete="off" readonly>
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="email" class="inner required">Email Address*</label>
</div>
<div class=" col-lg-7">
<input type="email" name="email" id="email" data-view-id="#email" value="<?php  echo $row['email']; ?>" class="form-control" autocomplete="off" readonly>
</div>
</div><!--row #end-->
</div>


<div class="step">
  <div class="form-group mb-3">
<h4 class="col-blue">Business Information</h4>

  </div>



<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">Shop/Store Address *</label>
</div>
<div class=" col-lg-7">
<textarea class="form-control" rows="5" name="address" id="address" data-view-id="#address"><?php  echo $row['address']; ?></textarea>
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">City / Town *</label>
</div>
<div class=" col-lg-7">
<input type="text" name="city" id="city" data-view-id="#city" value="<?php  echo $row['city']; ?>" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">Country *</label>
</div>
<div class=" col-lg-7">
  <select class="form-control custom-select" id="mcountry"  name="country" data-view-id="#country">
                  <option value="">Choose country</option>
                   <?php echo getCountry(); ?>
                </select>

</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">State *</label>
</div>
<div class=" col-lg-7">
 <select id="mstates" class="form-control custom-select" name="state" data-view-id="#state"></select>
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">Person in Charge *</label>
</div>
<div class=" col-lg-7">

<input type="text" name="persin_in_charge" id="persin_in_charge" data-view-id="#persin_in_charge" value="<?php  echo $row['persin_in_charge']; ?>" class="form-control" autocomplete="off">

</div>
</div><!--row #end-->


</div>

<div class="step">
 <div class="form-group mb-3">
<h4 class="col-blue">Bank Account Information</h4>
</div>

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">Bank Name *</label>
</div>
<div class=" col-lg-7">
 <input type="text" id="bank_name" class="form-control" name="bank_name" value="<?php  echo $row['bank_name']; ?>" data-view-id="#bank_name" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="phone" class="inner required">Account Name *</label>
</div>
<div class=" col-lg-7">
  <input type="text" id="ac_name" class="form-control" value="<?php  echo $row['ac_name']; ?>" name="ac_name" data-view-id="#ac_name" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-2"><!--row-->
<div id="name-label" class="control-label col-lg-5">
  <label for="ac_num" class="inner required">Account Number *</label>
</div>
<div class=" col-lg-7">
  <input type="number" id="ac_num" class="form-control" value="<?php  echo $row['ac_num']; ?>" name="ac_num" data-view-id="#ac_num" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mt-5">
<div class="col-md-12"><h4>Password Update</h4></div>
<div class="col-md-12 alert alert-info">Leave password empty if you are not unpdating</div>

<div id="name-label" class="control-label col-lg-5 mb-2">
  <label for="Password" class="inner required">Old Password*</label>
</div>
<div class=" col-lg-7 mb-2">
<input type="password" name="password" id="password" data-view-id="#password" value="" class="form-control" autocomplete="off">
</div>




<div id="name-label" class="control-label col-lg-5">
  <label for="Password" class="inner required">New Password*</label>
</div>
<div class=" col-lg-7">
<input type="password" name="new_password" value="" class="form-control" autocomplete="off">
</div>



<div class="col-md-12 mt-4"><button class="action btn-hot text-capitalize submit btn vregFormBt">Update Your Data</button>
</div>
 </div> 

</div>




</div>



</div> 


</form> 


		</div>

		

	

		

	

	</div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->



<?php include("vfooter.php"); ?>
<script type="text/javascript">

  $('.vregFormBt').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#regVForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"../inc/sellers/updateSeller.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){

                   $("#msg").html('<div class="alert alert-success">Successfully Updated.</div>').show();
          
                  
                 // $('#productForm')[0].reset();  
                  location.href = 'user-profile';
                 
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









  $(document).ready(function()
{
$("#mcountry").change(function()
{
var country_id=$(this).val();
var post_id = 'country_id='+ country_id;
//alert(post_id);
 
$.ajax
({
type: "POST",
url: "../inc/country.php",
data: post_id,
cache: false,
success: function(cities)
{
$("#mstates").html(cities);
} 
});
 
}).trigger('change');
});

//Get tax state from the selected country
$(document).ready(function()
{
$("#taxcountry").change(function()
{
var country_id=$(this).val();
var post_id = 'country_id='+ country_id;
 
$.ajax
({
type: "POST",
url: "../inc/tax/states.php",
data: post_id,
cache: false,
success: function(cities)
{
$('#mstates').empty();
$("#taxstates").html(cities);
} 
});
 
}).trigger('change');
});

</script>