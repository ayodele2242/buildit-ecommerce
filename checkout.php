<?php
include("header.php");
include("header-bottom.php");

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $query = mysqli_query($mysqli,"select * from customer_login where email = '$email'");
  $udetails = mysqli_fetch_array($query);
  $uid = $udetails['id'];
  $_SESSION['uid'] = $udetails['id'];

  $addr = addresses($uid);

  //get my address

  $select = mysqli_query($mysqli,"select address1, state from customer_address where uid = '$uid' and default_address = 1");
  $maddr  = mysqli_fetch_array($select);
  $mhaddr = $maddr['address1'];

}

?>
     
<link href="frontpage/login.css" rel="stylesheet" type="text/css" media="all">
      
         <div id="home-main-content" class="" style="background: #f0f0f0">

         	<div class="row">
		    <?php if(!isset($_SESSION['email'])){ ?>
 			<div class="col-lg-6 col-sm-12  p-5" id="registerDiv">
         
 				<span class="mb-4 mr-2" style="font-size: 26px; font-weight: bolder;">Shipping Address</span> - <span>Already have an account? <a href="#" type="button" class="col-red" id="loginform_id">Login here</a></span> 
 				
 				<form id="regForms" class="row mt-4">


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
                                <select class="form-control mselect select" id="mcountry" name="country">
                                <option value="">Choose country</option>
                                <?php echo getCountry(); ?>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic col-lg-4 col-sm-12">
                            <div class="input-wrapper">
                                <label class="label" for="select4">State</label>
                                <select class="form-control " id="mstates" name="state">
                                    
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
                    <button type="submit" class="btn btn-primary btn-block btn-lg regFormBtns">Register</button>
                  
                </div>

            </form>

 			</div>

 			<div class="col-lg-6 col-sm-12  p-5" id="loginDiv" style="display: none;">

 				<span class="mb-4 mr-2" style="font-size: 26px; font-weight: bolder;">Shipping Address</span>.  <span>Don't have an account yet? <a href="#" class="col-red" id="registerform_id">Register here</a></span> 

 <div class="login-wrapper">
  <div class="login-container">
    <div class="logn-col-left">
      <div class="login-text">
        <h2> 
        <!--<a href="<?php //echo $set['installUrl']; ?>" title="" class="logo-site logo-site-desktop d-none d-lg-block lazyload waiting">
           <img src="<?php //echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>" style="width: 100%; max-width: 150px; height: 100%; max-height: 100px;">
        </a></h2>-->
        <p >
         <h2 class="col-white">Login</h2>
        </p>
       
      </div>
    </div>
    <div class="logn-col-right">
      <div class="login-form">
        
        <form id="login-forms">
          <p>
            <input type="text" placeholder="Username" id="logemail" name="email">
          </p>
          <p>
            <input type="password" placeholder="Password" id="logpassword" name="password">
          </p>
          <p>
            <button class="btn btn-primary btn-block btn-lg" id="logFormBtns">Sign In</button>
            <a href="register" class="btn btn-sm bg-white col-blue btn-block btn-lg mobile-btn"><i class="fa fa-user"></i>  Register</a>
           
          </p>
          <p>
           
             <a href="forgot-password" class="col-red">Forget password?</a>
          </p>
        </form>
        </div>
    </div>
  </div>
  
</div>



 			</div>

 		    <?php }else{ ?>
 		    	<div class="col-lg-6 col-sm-12 p-5">
                  <form id="paymentForm">
 		    		  <div class="section-heading">
                  <h2 class="title">Address Info.</h2>
                  <a href="#" class="link col-orange bolder" data-toggle="modal" data-target="#modalXL">Add New Address</a>
              </div>

              <p class="pr-1 pl-1 pt-1 pb-1 alert-info">Select the address you are shipping to. The purple color indicates it is already checked as your default shipping address.  </p>
                <?php
                $istate = array();
                  foreach ($addr as $myaddr) {
                     $istate[] = $myaddr['state'];
                  ?>
            <div class="row bg-white col-grey pt-1 pb-1 mb-2">
                  <div class="col-1 mb-3">
                    <?php  if($myaddr['default_address'] == 1){ ?>
                      <div class="radio  iradio-type-button2" style="background: #6a1b9a" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">
                      <?php }else{ ?>
                      <div class="radio  iradio-type-button2" style="background: #ffbb33" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">

                      <?php
                    }
                    ?>
                    <label class="checkLabel" >
                          <input type="radio" name="addr_id" <?php  if($myaddr['default_address'] == 1){ echo 'checked="checked"'; } ?> class="colors" style="background: #9933CC"   value="<?php echo  $myaddr['user_id']; ?>" />
                          <span class="text">
                          
                          </span>
                        </label>
                      </div> 
                      </div>  

                      <div class="col-11 mb-3">     

                    <?php  echo ucwords($myaddr['address1']); ?> <?php  if($myaddr['default_address'] == 1){ ?><span class="align-middle badge bg-purple ml-1 bolder"><ion-icon name="checkmark"></ion-icon> Primary</span><?php } ?><br/>
                    <?php  echo $myaddr['mobile']; ?><a class="nav-link-style ml-3 edit text-danger bolder" type="button" data-toggle="modal" data-target="#umodal"  data-toggle="tooltip" title="Edit" id="<?php  echo $myaddr['user_id']; ?>">
                    <ion-icon big name="pencil"></ion-icon> Update
                    </a>
                  </div>

                  
                  </div>
                  <?php } ?>

 		    	</div>
 		    <?php } ?>	
 			<div class="col-lg-6 col-sm-12">

 			<div class="row p-5">
 			<div class="col-lg-12 mb-3"><h3>Order Summary</h3></div>
 			 
              <?php 
          $total = 0;
            $carts = geCart($sessionId);
             $total_quantity = 0;
             $total_amount = 0;

             if($carts){
                  foreach($carts as $cart_item){
                    $total_quantity += $cart_item['quantity'];
                    $total_amount += $cart_item['price']*$cart_item['quantity'];
                    $total_amountd = 0;
                   // $size += $cart_item['size'];
                    //$color += $cart_item['color'];
                  }
                }

         if($carts){
            $cartArray = array();

			
		   	foreach($carts as $cart_product){
          $total_amountd += $cart_item['price']*$cart_item['quantity'];

          $cartArray[] = array('product_id' => $cart_product['product_id'], 'title' => $cart_product['title'], 
          'color'=>$cart_product['color'], 'size'=> $cart_product['size'],'price'=> $cart_product['price'], 
          'vendor'=> $cart_product['vendor'],'image'=> $cart_product['image'], 'sessionId'=> $cart_product['sessionId'],
          'quantity'=> $cart_product['quantity'], 'date_bought'=> $cart_product['added_date'], 'email'=> $_SESSION['email'], 
          'total_amt' => $total_amountd );

                 if($cart_product['image'] != "" && file_exists('upload/product/'.$cart_product['image'])){
                    $thumbnail = 'upload/product/'.$cart_product['image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
                ?>
 			
			<div class="row mb-2 bg-white col-grey p-2"><!--row-->
			<div class="col-12"><!--first col-->
			<div class="row"><!--row-->
			<div class="col-2">
			<img src="<?php echo $thumbnail;?>" alt="<?php echo $cart_product['title'];?>" class="image-block imaged w48 h48">
			</div>
			<div class="col-10">
			<div class="row"><!--row-->
			<div class="col-12">
			<h5 class="mb-1"><a href="detail?id=<?php echo $cart_product['product_id'];?>" style="font-size: 14px;"><?php echo $cart_product['title'];?></a> x<?php echo number_format($cart_product['quantity']); ?></h5>
			</div>
			<div class="col-12 row">
			<?php if($cart_product['size'] != ""){ ?><div class="font-size-sm col-12"><span class="text-muted">Variation:</span> <?php echo ucwords($cart_product['size']); ?></div><?php  } ?>
			<?php if($cart_product['color'] != ""){ ?> 
			<div class="font-size-sm col-8 long-text"><span class="text-muted mr-2">Color:</span><small><?php echo ucwords($cart_product['color']); ?></small>
			</div> <?php } ?>
			</div>

			</div><!--* row-->
			</div>
			</div><!--* row-->
			</div><!--* first col-->
			<div class="col-12 row"><!--second col-->
			<div class="<?php if($cart_product['quantity'] < 2){ echo 'col-12'; }else{ echo 'col-6'; } ?> col-orange"><span class="mr-1 col-orange">Unit Price:</span> <?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.<small>00</small></div>
			<?php if($cart_product['quantity'] > 1){  ?>
			<div class="font-size-sm col-6 col-indigo">
			<span class="mr-2">Subtotal:</span> <?php echo $left_currency.number_format($cart_product['price']*$cart_product['quantity']).$right_currency; ?>.<small>00</small>
			</div>
			<?php } ?>
			</div><!--* second col-->


			</div><!--* row-->

             <?php
			$total = $total_amount;
			}
			?>


		       <div class="row mt-2">


		       <div class="col-lg-12 mb-3">
		          <input id="coupon" class="form-control coupon" type="text" name="coupon_code" placeholder="Coupon code" autocomplete="off" auto-complete="off">       
		        </div>

		        <div class="col-8 text-right mb-2 pt-3">Subtotal:</div>
         <input class=" col-4 readonly text-right no-background mb-2" id="iprice" type="text" value="<?php echo number_format($total); ?>" name="total_amt_to_pay" readonly style="background: transparent; border: none;">
        
         <div class="col-8 text-right mb-2">Shipping:</div>
         <div class="col-4 text-right mb-2">
           <?php
          //$mstate = explode(',',$istate);

               if($maddr['state'] == "Lagos"){
                echo number_format("1500");
                ?>
                <input type="hidden" name="shipping" id="shipping" value="1500">
                <?php
               }else{
                echo number_format("2500");
                ?>
               <input type="hidden" name="shipping" id="shipping" value="2500">

                <?php
               }

            ?>
         </div>

         <div class="col-8 text-right mb-2">Discount:</div>
         <div class="col-4 text-right pt-1 mb-2" id="result">---</div>

		       
 				<div class="col-lg-12 mb-4"><h5>Choose Payment Method</h5></div>

 			</div>
<?php if(isset($_SESSION['email'])){ ?> 
 	<div class="row col-lg-12 bg-white col-grey pt-2 pb-1 mb-2">
   <div class="col-1 mr-1">
   <div class="radio  iradio-pay" style="border: solid 1px #0099CC;" data-toggle="tooltip" data-placement="top" title="">
   <label class="checkLabel" >
   <input type="radio" name="payment_method" class="colors" style="background: #9933CC"   value="pay_on_delivery" onclick="show1();"/>
       <span class="text">
                      
       </span>
     </label>
     </div> 
   </div>
   
   <div class="col-10 pt-2">     
    Pay on Delivery
  </div>
 </div><!--On delivery #end-->

 <div class="row col-lg-12 bg-white col-grey pt-2 pb-1 mb-3">
   <div class="col-1 mr-1">
   <div class="radio  iradio-pay" style="border: solid 1px #0099CC;" data-toggle="tooltip" data-placement="top" title="">
   <label class="checkLabel" >
   <input type="radio" name="payment_method" class="colors" style="background: #9933CC"   value="credit_card" onclick="cardPay();"/>
       <span class="text">
                      
       </span>
     </label>
     </div> 
   </div>
   
   <div class="col-10 p-2 ml-2">     
    Credit or Debit Cards
  </div>
 </div>

<?php if(!empty($card['last4'])){ ?>
  <div class="row col-lg-12 bg-white col-grey pt-2 pb-1 mb-3"><!--Saved card-->
   <div class="col-1 mr-1">
   <div class="radio  iradio-pay" style="border: solid 1px #0099CC;" data-toggle="tooltip" data-placement="top" title="">
   <label class="checkLabel" >
   <input type="radio" name="payment_method" class="colors" style="background: #9933CC"   value="credit_card" onclick="savedCard();"/>
       <span class="text">
                      
       </span>
     </label>
     </div> 
   </div>
   
   <div class="col-10 p-2 ml-2">     
    <div class="credit-card visa selectable">
        <div class="credit-card-last4">
            <?php  echo $card['last4'];   ?>
        </div>
    </div>
  </div>
 </div><!--Saved card #end-->

<?php } ?>


 <div class="row col-lg-12">
<div id="cardPay" class="hide col-grey">

</div>
	 <div class="form-group justify-content-between align-items-center col-lg-12">
	<button id="default_btn" class="btn btn-sm btn-info ">Pay</button>
	<button id="delivery_btn" class="btn btn-sm btn-info" style="display: none;">Pay</button>
	<button id="pay-now" class="btn btn-sm btn-info" style="display: none;">Pay</button>
  <button id="CardPayment" class="btn btn-sm btn-info" style="display: none;">Pay</button>

	</div>
	<div class="form-group justify-content-between align-items-center col-grey col-lg-12">
	<img src="assets/img/paystack-wc.png">
	</div>
 
</div>





 			    <input type="hidden" name="mybonus" id="mybonus" value="">
                <input type="hidden" id="mtotal" name="mtotal" value="<?php echo $total; ?>">
                <input type="hidden" name="items_bought" id="items_bought" value="<?php error_reporting(0); echo htmlentities(serialize($cartArray));  ?>">
                <input type="hidden" name="cust_email" id="cust_email" value="<?php echo $_SESSION['email'];  ?>">
                <input type="hidden" name="trx_id" id="trx_id" value="<?php echo rand();  ?>">

<?php }else{ ?>

<div class="alert alert-danger col-lg-12">Login to continue to payment.</div>
<?php
}
}else{
?>
<div class="alert alert-danger col-lg-12" id="paymenFailed">No items in cart</div>

		<?php } ?>


 			</div>	


 			
 				


 			</div>

</form>



 			</div>
	       

	       </div>
  

        
         




         </div>
    


         <!-- Extra large modal-->
<div class="modal fade modalbox" id="modalXL" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add A New Address</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <?php  include "change_shipping_address.php";  ?>
                </div>
               
              </div>
            </div>
          </div>



          <div class="modal fade modalbox" id="umodal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Address</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <div id="warning"></div>
                  <div id="contents"></div>
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

<script src="https://js.paystack.co/v1/inline.js"></script>

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

<script type="text/javascript">
	function show1(){
  document.getElementById('cardPay').style.display ='block';
  $("#pay-now").hide();
  $("#delivery_btn").show();
  $("#default_btn").hide();
  $("#CardPayment").hide();
}

function cardPay(){
  document.getElementById('cardPay').style.display = 'block';
  $("#pay-now").show();
  $("#delivery_btn").hide();
  $("#default_btn").hide();
  $("#CardPayment").hide();
}

function savedCard(){
    document.getElementById('cardPay').style.display = 'block';
  $("#pay-now").hide();
  $("#delivery_btn").hide();
  $("#default_btn").hide();
  $("#CardPayment").show();
}

$(document).ready(function() {
  $('#loginform_id').click(function(e) {
  	e.preventDefault();
 
    $('#loginDiv').show();
    $('#registerDiv').hide();
    // Alternative animation for example
    // slideToggle("fast");
  });

  $('#registerform_id').click(function(e) {
  	e.preventDefault();
 
    $('#loginDiv').hide();
    $('#registerDiv').show();
    // Alternative animation for example
    // slideToggle("fast");
  });



  
});

</script>


<script type="text/javascript">
  $(document).ready(function() {


 $('#logFormBtns').click(function(e){ 
    e.preventDefault();
      var username = $("#logemail").val();
      var password = $("#logpassword").val();
      if(username=="")
      {

       $.toast({ 
        text : 'Please enter your email', 
        showHideTransition : 'fade',  
        bgColor : 'red',              
        textColor : '#fff',       
        allowToastClose : false,    
        hideAfter : 4000,
        loader: false,                               
        textAlign : 'center',           
        position : 'top-right'  
      });

      }else if(password=="")
      {
       $.toast({ 
        text : 'Please enter your password', 
        showHideTransition : 'fade',  
        bgColor : 'red',              
        textColor : '#fff',       
        allowToastClose : false,    
        hideAfter : 4000,
        loader: false,                               
        textAlign : 'center',           
        position : 'top-right'  
      });

         
      }
else
{
    $.ajax({
       type: "POST",
       url: 'inc/members/login.php',
       data: $("#login-forms").serialize(),
       success: function(data)
       {
          if (data.trim() == 'ok') {
             $.toast({ 
            text : 'Please wait while we log you in...', 
            showHideTransition : 'fade',  
            bgColor : 'green',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'center'  
          });
           setTimeout(' window.location.href = "checkout"; ',1000);

          }else if(data.trim() == "i"){

           
             $.toast({ 
            text : 'Your account is not yet activated at the moment. Please go to your email and confirm your email.', 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
          });

    }
    else if(data.trim() == "s"){

       $.toast({ 
            text : 'Your account is suspended.', 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
      });
    }
          else {

            $.toast({ 
            text : data, 
            showHideTransition : 'fade',  
            bgColor : 'red',              
            textColor : '#fff',       
            allowToastClose : false,    
            hideAfter : 4000,
            loader: false,                               
            textAlign : 'center',           
            position : 'top-right'  
           });

          }
       }
   });
}
 });













   $(".del").click(function() {
      //e.preventDefault();
        
        var id = $(this).attr("id");
        
       
        $.ajax({
            type : 'POST',
            url  : 'inc/user/delete_address.php',
            data : {'id':id},
            success :  function(res)
            {
                if(res.trim() == 1)
                {
                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Address Deleted Successfully</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         document.location.href = document.location.href;
      }else{
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
      }
            }
        });
        
      
  return false;
    });
});

$(document).ready(function() {
        $('.edit').click(function() {
          
            //e.preventDefault();
      var id = $(this).attr("id");
      
     $('#contents').html(''); // leave this div blank
     //$('#modal-loader').show();      // load ajax loader on button click
   
     $.ajax({
          url: 'get_address.php',
          type: 'POST',
          data: 'id='+ id,
          dataType: 'html'
     })
     .done(function(data){
          
          $('#contents').html(data); // load here
         /* $('#modal-loader').hide(); // hide loader  
          $('#umodal').modal('show');
          $(".showit").show();*/
          
     })
     .fail(function(){
          $('#contents').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

            
        });
    });


$('#addAddrForm').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#newAddrForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"inc/addShippingAddress.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){
                   $(".mymsg").html('<div class="alert alert-success">Successfully added.</div>').show();
          setTimeout(function() {
              $(".mymsg").fadeOut(1500);
          }, 10000);
 
                 // $('#productForm')[0].reset();  
                 //location.href = 'checkout';
                  document.location.href = document.location.href;
                 
                  }else{
                    $(".mymsg").html('<div class="alert alert-danger text-left">'+data+'</div>').show();
          setTimeout(function() {
              $(".mymsg").fadeOut(1500);
          }, 10000);
                  }
                     //alert(data);  
                     
                }  
           }); 


      }); 



$(document).ready(function() {
$("#default_btn").click(function(e) {
      e.preventDefault();

      $.toast({ 
                text : '<b>Please select your payment method to continue.</b>', 
                showHideTransition : 'fade',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });
        

        if($('input[name=addr_id]:checked').length < 1){
          $.toast({ 
                text : '<b>>We discovered you don\'t have a default address. Please select where you would want us to ship your items to.</b>', 
                showHideTransition : 'fade',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });

        }

  }); 





   $("#delivery_btn").click(function(e) {
      e.preventDefault();
     
     if($('input[name=addr_id]:checked').length < 1){

      $.toast({ 
                text : '<b>>We discovered your don\'t have a default address. Please select where you would want us to ship your items to.</b>', 
                showHideTransition : 'slide',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });

        
        }else{
        
        //var serializedData = $("#paymentForm").serialize();
        $.ajax({

            type : 'POST',
            url  : 'inc/payment/pay_on_delivery.php',
            data: $("#paymentForm").serialize(),
            success :  function(res)
            {
                if(res.trim() == 1)
                {

                  $.toast({ 
                text : '<i class="fa fa-check"></i> &nbsp;Order Successfully Placed. Please check your order to see delivery date.', 
                showHideTransition : 'slide',
                bgColor : 'green',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });


         //$(".icart").load(location.href + " .icart");
         location.href = 'orders';
      }else{

        $.toast({ 
                text : res, 
                showHideTransition : 'slide',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });
      }
            }
        });

          return false;
        }



 });




$("#CardPayment").click(function(e) {
      e.preventDefault();
      $("#CardPayment").html("Processing payment");
       var serializedData = $("#paymentForm").serialize();
       $.ajax({
            type : 'POST',
            url  : 'inc/payment/cardPayment.php',
            data : serializedData,
            success: function (data) {
             
            var datas = JSON.parse(data);

            if(datas.success == true){

              document.location.href="payment_done?reference="+datas.ref+"&transId="+datas.transId+"&email="+datas.email;

               $('#CardPayment').html("Finalizing Payment");

            }else{
              $('#pay-now').html("Pay with Card");
               $.toast({ 
              text : '<b><ion-icon name="sad"></ion-icon> &nbsp;'+datas.response+'</b>', 
              showHideTransition : 'fade',
              bgColor : 'red',            
              textColor : '#fff',
              allowToastClose : false,
              hideAfter : 4000,
              loader: false,            
              stack : 5,                     
              textAlign : 'center', 
              position : 'top-right'  
            });
            }


            }
        });
        return false;
      
      
 });






});       

$(document).ready(function(){
  function format(n, sep, decimals) {
    sep = sep || "."; // Default to period as decimal separator
    decimals = decimals || 2; // Default to 2 decimals

    return n.toLocaleString().split(sep)[0]
        + sep
        + n.toFixed(decimals).split(sep)[1];
}
     
      var shipping =  parseInt($('#shipping').val());
      var mainPrice =  parseInt($('#iprice').val().split(",").join(""));
      var mytotal = mainPrice + shipping;

      $("#total_result").html(format(mytotal));

		$("body").delegate(".coupon","keyup",function(event){
     event.preventDefault();
			var coupon = $("#coupon").val();
			var myprice = $("#mtotal").val();

            alert(myprice);



			if(coupon == ""){

        $.toast({ 
                text : '<b><ion-icon name="sad"></ion-icon> &nbsp;Please enter a coupon code.</b>', 
                showHideTransition : 'slide',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });


			}else{
        if(coupon.length > 9){
        var shipping =  parseInt($('#shipping').val());

		$.ajax({

            type : 'POST',
            url  : 'inc/get_coupon.php',
            data : { coupon: coupon, price: myprice },
            cache: false,
            success :  function(res)
            {
                if(res.trim() == "error")
                {

                $.toast({ 
                text : '<b><ion-icon name="sad"></ion-icon> &nbsp;Invalid Coupon Code</b>', 
                showHideTransition : 'fade',
                bgColor : 'red',            
                textColor : '#fff',
                allowToastClose : false,
                hideAfter : 4000,
                loader: false,            
                stack : 5,                     
                textAlign : 'center', 
                position : 'top-right'  
              });

                
          
                    }else{

              

         				var json = JSON.parse(res);
         				 $.toast({ 
			                text : json.discount+' <b>% Off</b>', 
			                showHideTransition : 'fade',
			                bgColor : 'green',            
			                textColor : '#fff',
			                allowToastClose : false,
			                hideAfter : 4000,
			                loader: false,            
			                stack : 5,                     
			                textAlign : 'center', 
			                position : 'top-right'  
			              });

						//$('#result').html("<h6 class='pull-right text-danger'>"+json.discount+"% Off</h6>");


						$('#iprice').val(json.price);
            $('#mybonus').val(json.price);

            var mainPrice =  parseInt((json.price).split(",").join(""));
            var mytotal = mainPrice + shipping;

            $("#total_result").html(format(mytotal));


                    }
            }
        });


      }//#if


			}//else




		});
	});






$('#pay-now').click(function(e){ 
e.preventDefault(); 

 
$('#pay-now').html("Initializing");

  //function saveOrderThenPayWithPaystack(){
 if($('input[name=addr_id]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">We discovered your don\'t have a default address. Please select where you would want us to ship your items to.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
$('#pay-now').html("Pay with Card");

        }else{   


var addr_id = $("#addr_id").val();
var total_amt_to_pay = $("#iprice").val();
var items_bought = $("#items_bought").val();
var cust_email = $("#cust_email").val();
var shipping = $("#shipping").val();
var coupon = $("#coupon").val();
var trx_id = $("#trx_id").val();

var globalData;
//var email;


var orderObj = {
    addr_id: addr_id,
    cust_email:  cust_email,
    total_amt_to_pay: total_amt_to_pay,
    items_bought: items_bought,
    shipping: shipping,
    coupon_code: coupon,
    trx_id: trx_id

  };
    // Send the data to save using post
    var posting = $.post( 'inc/payment/pay_with_card.php', orderObj );

    posting.done(function( data ) {

      $('#pay-now').html("Processing...");
      /* check result from the attempt */
      var jresponse =  JSON.parse(data);

      var email = jresponse.email;
      var name = jresponse.name;
      var amount = jresponse.amount;
      var transId = jresponse.transId;
      console.log(email);

      let handler = PaystackPop.setup({
    key: 'pk_test_485e53b3f0721b7729008cc000dec2dceded208a',
    email: email,
    display_name: name,
    amount: amount * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1),
     metadata: {
         custom_fields: [
            {
                display_name: name,
            }
         ]
      },
    onClose: function(){
       alert('Payment cancelled');
       $('#pay-now').html("Try agin");
       $('#paymenFailed').html("Order placed but your payment failed").show();
    },
    callback: function(response){
     $('#pay-now').html("Please wait...");
       /* var queryString = "?reference=" + response.reference + "&email=" + email + "&transId=" + transId;
          window.location.href = "payment-verify" + queryString;*/
          
          jQuery.ajax({
            url: 'payment-verify.php',
            method: 'post',
            async:false,
            data:{reference: response.reference, transId: transId, email: email},
            success: function (data) {
             
            var datas = JSON.parse(data);

            if(datas.success == true){

              document.location.href="payment_done.php?reference="+datas.ref+"&transId="+datas.transId+"&email="+datas.email;

               $('#pay-now').html("Finalizing Payment");

            }else{
              $('#pay-now').html("Pay with Card");
               $.toast({ 
              text : '<b><ion-icon name="sad"></ion-icon> &nbsp;'+data+'</b>', 
              showHideTransition : 'fade',
              bgColor : 'red',            
              textColor : '#fff',
              allowToastClose : false,
              hideAfter : 4000,
              loader: false,            
              stack : 5,                     
              textAlign : 'center', 
              position : 'top-right'  
            });
            }


            }
          });


    }
  });
  handler.openIframe();
       
       
     // console.log(response[0].email);
    });
    posting.fail(function( data ) { /* and if it failed... */ });

  }
  //}
  });




 </script>