 <?php
include("header.php");
//include("navs.php");
if(isset($_SESSION['email'])){
	header("Location: my-account");
}
$result="";
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.validate.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<style type="text/css">

  .wrapper {
  position: relative;
}
  
.coverme{
  position: absolute;
  width: 100%;
  height: 80%;
  background: #f0f0f0;
  display: flex;
  justify-content: center;
  z-index: 100;
}

.coverme img {
  margin-left: auto;
  margin-right: auto;
  display: block;
}

#namen{
  font-weight: bolder;
  font-size: 18px;
}
</style>
<script type="text/javascript">
  $(window).load(function(){
$( "input" )
.keyup(function() {
var value = $( this ).val(),
dataViewId = $( this ).data( "view-id" );  // get your data-attribute value
// use this value as a selector:
$( dataViewId ).text( value );
})
.keyup();
});



// register jQuery extension
jQuery.extend(jQuery.expr[':'], {
focusable: function (el, index, selector) {
return $(el).is('a, button, :input, [tabindex]');
}
});
$(document).on('keypress', 'input,select', function (e) {
if (e.which == 13) {
e.preventDefault();
// Get all focusable elements on the page
var $canfocus = $(':focusable');
var index = $canfocus.index(this) + 1;
if (index >= $canfocus.length) index = 0;
$canfocus.eq(index).focus();
}
});
</script>



 <section class="pb-5 py-md-5" >
  
  <div class="container">

    <div class=" pull-right"><a href="account-signin" class="col-blue">Sign In</a></div>

<div id="msg"></div>

    <div class="mb-5 done">
      <h1><span class="bigger text-bolder col-blue">Vendor</span> <small>Center</small></h1>

    </div>


    <div class="text-bolder mobile-text done">
      <h3>Register and start selling today - create your account.</h3>
    </div>



    <div class="wrapper">

      <div class="coverme">
         
      </div>

       
<div class="navi">
<?php echo $result; ?> 

<form class="form-horizontal form"  id="regVForm" onsubmit="return submitUserForm();">
<div class="col-md-12">    

<div class="progress done">
<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div id="g-recaptcha-error"></div>
<div class="box row-fluid"> 
<br>
<div class="step">
<div class="form-group mb-3">
<h4 class="col-blue">Personal Information</h4>
</div>
<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="name" class="inner required">First and Last Name*</label>
</div>
<div class=" col-lg-6">
<input type="text" name="name" id="name" value="" class="form-control" data-view-id="#namen" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">Phone Number*</label>
</div>
<div class=" col-lg-6">
<input type="text" name="phone" id="phone" data-view-id="#phone" value="" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="vendor_name" class="inner required">Display Name / Shop Name*</label>
</div>
<div class=" col-lg-6">
<input type="text" name="vendor_name" id="vendor_name" data-view-id="#vendor_name" value="" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="email" class="inner required">Email Address*</label>
</div>
<div class=" col-lg-6">
<input type="email" name="email" id="email" data-view-id="#email" value="" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="Password" class="inner required">Password*</label>
</div>
<div class=" col-lg-6">
<input type="password" name="password" id="password" data-view-id="#password" value="" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="Password" class="inner required">Confirm Password*</label>
</div>
<div class=" col-lg-6">
<input type="password" name="cpassword" id="cpassword" data-view-id="#cpassword" value="" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

</div>








<div class="step">
  <div class="form-group mb-3">
<h4 class="col-blue">Add Business Information</h4>

  </div>
<div class="form-group mb-4">
<label for="institution" class="control-label">Okay, <span id="namen"></span>. Let's get to know your business details.</label>
</div>


<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">Shop/Store Address *</label>
</div>
<div class=" col-lg-6">
<textarea class="form-control" rows="5" name="address" id="address" data-view-id="#address"></textarea>
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">City / Town *</label>
</div>
<div class=" col-lg-6">
<input type="text" name="city" id="city" data-view-id="#city" value="" class="form-control" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">Country *</label>
</div>
<div class=" col-lg-6">
  <select class="form-control custom-select" id="mcountry"  name="country" data-view-id="#country">
                  <option value="">Choose country</option>
                   <?php echo getCountry(); ?>
                </select>

</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">State *</label>
</div>
<div class=" col-lg-6">
 <select id="mstates" class="form-control custom-select" name="state" data-view-id="#state"></select>
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">Person in Charge *</label>
</div>
<div class=" col-lg-6">

<input type="text" name="persin_in_charge" id="persin_in_charge" data-view-id="#persin_in_charge" value="" class="form-control" autocomplete="off">

</div>
</div><!--row #end-->


</div>

<div class="step">
 <div class="form-group mb-3">
<h4 class="col-blue">Bank Account Information</h4>
</div>

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">Bank Name *</label>
</div>
<div class=" col-lg-6">
 <input type="text" id="bank_name" class="form-control" name="bank_name" value="" data-view-id="#bank_name" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="phone" class="inner required">Account Name *</label>
</div>
<div class=" col-lg-6">
  <input type="text" id="ac_name" class="form-control" value="" name="ac_name" data-view-id="#ac_name" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mb-3"><!--row-->
<div id="name-label" class="control-label col-lg-3">
  <label for="ac_num" class="inner required">Account Number *</label>
</div>
<div class=" col-lg-6">
  <input type="number" id="ac_num" class="form-control" value="" name="ac_num" data-view-id="#ac_num" autocomplete="off">
</div>
</div><!--row #end-->

<div class="row mt-5">
 <div class="d-flex flex-wrap justify-content-between">
  <div class="custom-control custom-checkbox">
    <input class="custom-control-input" type="checkbox" id="agreement" name="agreement" >
    <label class="custom-control-label" for="agreement">By checking this box you are agreeing to BuildiT <a href="vendor_agreement">E-Contract</a></label>
  </div>
  
</div>



 </div> 

</div>


<div class="step display done">
<h4 style="text-align:center;     font-size: 45px;
text-decoration: underline;" class="col-blue">Confirm Details </h4>
<div class="row">
<label class="col-sm-3 control-label sanq">Name :</label>
<label class="col-md-6 control-label lbl sana" data-id="name"></label>
</div>
<div class="row">
<label class="col-sm-3 control-label sanq">Phone Number :</label>
<label class="col-md-6 control-label lbl sana" data-id="phone"></label>
</div>

<div class="row">
<label class="col-sm-3 control-label sanq">Vendor Name :</label>
<label class="col-md-6 control-label lbl sana" data-id="vendor_name"></label>
</div>

<div class="row">
<label class="col-sm-3 control-label sanq">Email :</label>
<label class="col-md-6 control-label lbl sana" data-id="email"></label>
</div>  
<div class="row">
<label class="col-sm-3 control-label sanq">Store/Shop Address :</label>
<label class="col-md-6 control-label lbl sana" data-id="address"></label>
</div>        
<div class="row">
<label class="col-sm-3 control-label sanq">City :</label>
<label class="col-md-6 control-label lbl sana" data-id="city"></label>
</div>
<div class="row">
<label class="col-sm-3 control-label sanq">Country :</label>
<label class="col-md-6 control-label lbl sana" data-id="mcountry"></label>
</div>
<div class="row">
<label class="col-sm-3 control-label sanq">State :</label>
<label class="col-md-6 control-label lbl sana" data-id="mstates"></label>
</div>

<div class="row">
<h4 class="col-blue">Bank Details</h4>
</div>

<div class="row">
<label class="col-sm-3 control-label sanq">Account Name :</label>
<label class="col-md-6 control-label lbl sana" data-id="ac_name"></label>
</div>
<div class="row">
<label class="col-sm-3 control-label sanq">Account Number :</label>
<label class="col-md-6 control-label lbl sana" data-id="ac_num"></label>
</div>
<div class="row">
<label class="col-sm-3 control-label sanq">Bank Name :</label>
<label class="col-md-6 control-label lbl sana" data-id="bank_name"></label>
</div>

</div>
<div class="row done">
<div class="col-sm-12">


<div class="pull-right">
<button type="button" class="action btn-sky text-capitalize back btn">Back</button>
<button type="button" class="action bg-blue text-capitalize next btn">Next</button>
<button class="action btn-hot text-capitalize submit btn vregFormBt">Submit Your Data</button>

</div>
</div>
</div> 


</div>



</div> 
</form> 
</div>


</div>

  </div>
</section>

 
<?php 
include("footer.php");
 ?>








 <script type="text/javascript">
   $('.vregFormBt').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#regVForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"../inc/sellers/addSeller.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){

                   $("#msg").html('<div class="alert alert-success">Successfully registered.<br/> Please check your email to activate your account</div>').show();
          
                  $(".done").hide()
                 // $('#productForm')[0].reset();  
                 //location.href = 'my-account';
                 
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












$(document).ready(function(){
var current = 1;
widget      = $(".step");
btnnext     = $(".next");
btnback     = $(".back"); 
btnsubmit   = $(".submit");
// Init buttons and UI
widget.not(':eq(0)').hide();
hideButtons(current);
setProgress(current);
// Next button click action
btnnext.click(function(){
if(current < widget.length){
// Check validation
if($(".form").valid()){
widget.show();
widget.not(':eq('+(current++)+')').hide();
setProgress(current);
}
}
hideButtons(current);
})
// Back button click action
btnback.click(function(){
if(current > 1){
current = current - 2;
if(current < widget.length){
widget.show();
widget.not(':eq('+(current++)+')').hide();
setProgress(current);
}
}
hideButtons(current);
})
$('.form').validate({ // initialize plugin
ignore:":not(:visible)",      
rules: {
name     : "required",
phone   : {required : true, minlength:10, maxlength:11},
email    : {required : true, email:true},
institution : "required",
vendor_name : "required",
password: {
      required: true,
      minlength: 8,
    },
cpassword: {
    required: true,
    equalTo: "#password"
}, 
address : "required",   
city : "required",
persin_in_charge: "required",
agreement : "required",
bank_name : "required",
ac_name : "required",
ac_num: "required",
},
messages: {
      name: "Please enter your full name",
      phone: "Please enter a valid phone number",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      cpassword: {
        required: "Please enter confirm password",
        equalTo: "Both password must be equal"
      },
      //cpassword: "Enter Confirm Password Same as Password",
      email: "Please enter a valid email address",
      vendor_name: "Please specify the name of your shop",
      address: "Please enter your shop address",
      city: "Your city is require",
      bank_name: "Please enter your bank name",
      ac_name: "Please enter your account name",
      ac_num: "Your account number is required",
      agreement: "You need to agree to BuildiT E-Contract agreement"

    },
});
});
// Change progress bar action
setProgress = function(currstep){
var percent = parseFloat(100 / widget.length) * currstep;
percent = percent.toFixed();
$(".progress-bar").css("width",percent+"%").html(percent+"%");    
}
// Hide buttons according to the current step
hideButtons = function(current){
var limit = parseInt(widget.length); 
$(".action").hide();
if(current < limit) btnnext.show();
if(current > 1) btnback.show();
if (current == limit) { 
// Show entered values
$(".display label.lbl").each(function(){
$(this).html($("#"+$(this).data("id")).val());  
});
btnnext.hide(); 
btnsubmit.show();
}
}






$(document).ready(function() {
   window.setTimeout("fadeMyD();", 300); //call fade in 3 seconds
   $(".coverme").fadeOut('slow');
 });

function fadeMyD() {
   $(".coverme").fadeOut('slow');
}




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