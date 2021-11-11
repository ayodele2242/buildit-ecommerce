 <?php
include("header.php");
include("navs.php");
?>

 <div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="shop">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
      </div>
    </div>


  <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      

     
      <div class="row">
       
        
        <section class="col-lg-8">
         
          <?php 
          if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = mysqli_query($mysqli,"select * from customer_login where email = '$email'");
            $udetails = mysqli_fetch_array($query);
            $uid = $udetails['id'];
            $_SESSION['uid'] = $udetails['id'];

            $addr = addresses($uid);

            //get my address

            $select = mysqli_query($mysqli,"select address1 from customer_address where uid = '$uid'");
            $maddr  = mysqli_fetch_array($select);
            $mhaddr = $maddr['address1'];


           ?>

           <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-lg mb-grid-gutter">
            <div class="media align-items-center">
             
              <div class="media-body pl-3">
                 <h2 class="h3 pt-1 pb-3 mb-3">Shipping address   &nbsp;&nbsp; <?php if(!empty($addr)){ echo '<button type="button" class="btn bg-white col-blue btn-outline-info" data-toggle="modal" data-target="#modalXL">
  Change
</button>'; } ?></h2>
              </div>
            </div>


          </div>

           <div class="col-sm-12 mb-lg-5">
             <p>Select the address you are shipping to. The purple color indicates it is already checked as your default shipping address.  </p>
               

           
            <form id="payment">

                <?php
                foreach ($addr as $myaddr) {
                  
                ?>
                 <div class="row bg-white col-grey pt-3 pb-2 mb-3 mt-3">
                <div class="col-sm-1 mb-3">
                  <?php  if($myaddr['default_address'] == 1){ ?>
                   <div class="radio  iradio-type-button2" style="background: #6a1b9a" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">
                   <?php }else{ ?>
                    <div class="radio  iradio-type-button2" style="background: #ffbb33" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">

                    <?php
                  }
                  ?>

                     <label class="checkLabel" >
                       <input type="radio" name="addr_id" <?php  if($myaddr['default_address'] == 1){ echo 'checked'; } ?> class="colors" style="background: #9933CC"   value="<?php echo  $myaddr['user_id']; ?>" />
                       <span class="text">
                        
                       </span>
                     </label>
                   </div> 
                   </div>  

                    <div class="col-sm-10 mb-3">     

                  <?php  echo $myaddr['address1']; ?><br/>
                  <?php  echo $myaddr['mobile']; ?>
                </div>

                
                </div>
               

                <?php
                }
                ?>

                <!--<p>You will be able to add a coupon in the next step</p>-->
                <?php if(empty($addr)){
                  echo '<div class="alert alert-danger mt-3">You are yet to add your shipping address. Please go to <a href="my-account">Address Book</a> to add.</div>';
                }else{
               echo '<a href="billing" class="btn bg-blue payment mobile-hide mt-3">Continue to Payment</a>';
             }
             ?>
             
            </form>


           </div>


           <!-- Extra large modal-->
          <div class="modal fade" id="modalXL" tabindex="-1" role="dialog">
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


           <?php
           }else{
          ?>



          <form id="regForm">
          <!-- Autor info-->
          <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-lg mb-grid-gutter">
            <div class="media align-items-center">
             
              <div class="media-body pl-3">
                 <h2 class="h3 pt-1 pb-3 mb-3">Shipping address</h2>
              </div>
            </div>
          </div>
          <!-- Shipping address-->
         
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-fn">First Name</label>
                <input class="form-control" type="text" name="fname" id="fname">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-ln">Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-email">E-mail Address</label>
                <input class="form-control" type="email" id="email" name="email">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-phone">Phone Number</label>
                <input class="form-control" type="text" id="phone" name="phone">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-company">Company<small>(Optional)</small></label>
                <input class="form-control" type="text" id="company"  name="company">
              </div>
            </div>
            
              <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-zip">ZIP Code</label>
                <input class="form-control" type="text" id="zip"name="zip" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="checkout-country">Country</label>
                <select class="form-control custom-select" id="mcountry" name="country">
                  <option value="">Choose country</option>
                   <?php echo getCountry(); ?>
                </select>
              </div>
            </div>

            <div class="col-sm-5">
              <div class="form-group">
                <label for="checkout-city">State</label>
                <select id="mstates" class="form-control custom-select" name="state">
                  
                </select>
              </div>
            </div>

            <div class="col-lg-2">
              <div class="form-group">
                <label for="checkout-city">City</label>
                <input type="text" name="city" class="form-control" id="city">
              </div>
            </div>
          
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-1">Address 1</label>
                <input class="form-control" type="text" id="address1" name="address1">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-2">Address 2</label>
                <input class="form-control" type="text" id="address2" name="address2">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-1">Password</label>
                <div class="input-group-overlay form-group">
                  
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" name="password" autocomplete="off" auto-complete="off">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="fa fa-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-2">Confirm Password</label>
                <div class="input-group-overlay form-group">
                  
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" id="password2" name="password2" autocomplete="off" auto-complete="off">
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="fa fa-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <span>Used to contact you with delivery info (mobile preferred). &nbsp;|&nbsp;&nbsp; if you already have an account please <a href="account-signin" class="col-blue">Login here</a> </span>
          <!--<h6 class="mb-3 py-3 border-bottom">Billing address</h6>-->
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" name="default-address" value="1" type="checkbox" checked id="same-address">
            <label class="custom-control-label" for="same-address">Set as default shipping address</label>
          </div>
          <!-- Navigation (desktop)-->
          <div class="d-none d-lg-flex pt-4 mt-3">
            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="viewcart"><i class="fa fa-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>

            <div class="w-50 pl-2"><button class="btn btn-primary btn-block regFormBtn"><span class="d-none d-sm-inline">Save & Continue</span><span class="d-inline d-sm-none">Next</span><i class="fa fa-arrow-right mt-sm-0 ml-1"></i></button></div>
          </div>
           </form>

         <?php } ?>

        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            <div class="widget mb-3">
              <h2 class="widget-title text-center">Order summary</h2>
               <?php 
          $total = 0;
            $carts = geCart($sessionId);
             $total_quantity = 0;
             $total_amount = 0;

             if($carts){
                  foreach($cart as $cart_item){
                    $total_quantity += $cart_item['quantity'];
                    $total_amount += $cart_item['price']*$cart_item['quantity'];
                   // $size += $cart_item['size'];
                    //$color += $cart_item['color'];
                  }
                }

         if($carts){
			
			foreach($carts as $cart_product){


                 if($cart_product['image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$cart_product['image'])){
                    $thumbnail = UPLOAD_URL.'product/'.$cart_product['image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
                ?>

              <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="detail?id=<?php echo $cart_product['product_id'];?>">
              	<img width="64" src="<?php echo $thumbnail;?>" alt="<?php echo $cart_product['title'];?>"/></a>
                <div class="media-body">
                  <h6 class="widget-product-title"><a href="details?id=<?php echo $cart_product['product_id'];?>"><?php echo $cart_product['title'];?></a></h6>
                  <?php if($cart_product['size'] != ""){ ?><div class="font-size-sm"><span class="text-muted mr-2">Variation:</span><?php echo ucwords($cart_product['size']); ?></div><?php  } ?>
               <?php if($cart_product['color'] != ""){ ?> <div class="font-size-sm"><span class="text-muted mr-2">Color:</span><?php echo ucwords($cart_product['color']); ?></div> <?php } ?>
                  <div class="widget-product-meta"><span class="text-accent mr-2"><?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.<small>00</small></span><span class="text-muted">x <?php echo $cart_product['quantity'];?></span>

                  </div>
                </div>
              </div>

          	 <?php

			$total = $total_amount;
			}
		}else{
			echo '<div class="col-lg-8 col-sm-12 bg-white col-grey">No items in your cart yet.</div>';
		}
		?>    
             
              
            
            </div>
            <ul class="list-unstyled font-size-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Subtotal:</span><span class="text-right">
                <?php echo $left_currency.number_format($total).$right_currency; ?>
              	<!--<input class="form-control readonly text-right" id="iprice" type="text" value="" name="coupon-price" readonly>--?
                <input type="hidden" id="mtotal" value="<?php //echo $total; ?>">-->
              </span></li>
              <!--<li class="d-flex justify-content-between align-items-center"><span class="mr-2">Shipping:</span><span class="text-right">—</span></li>
              
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Discount:</span><span class="text-right" id="result">—</span></li>-->
            </ul>
           
              <!--<div class="form-group">
               <input id="coupon" class="form-control coupon" type="text" placeholder="Coupon code" autocomplete="off" auto-complete="off">
                      
              </div>-->
             
            
          </div>
        </aside>
      </div>
      <!-- Navigation (mobile)-->
      <div class="row d-lg-none">
        <div class="col-lg-8">
          <div class="d-flex pt-4 mt-3">
            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="viewcart"><i class="fa fa-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
            <div class="w-50 pl-2">

              <?php
              if(!empty($addr)){
              ?>
              <a href="billing" class="btn bg-blue btn-blocke payment"><span class="d-inline d-sm-none">Next</span><i class="fa fa-arrow-right mt-sm-0 ml-1"></i></a>
              <?php
            }
            ?>


            </div>
          </div>
        </div>
      </div>

     
    </div>










<?php 
include("footer.php");
 ?>

<script type="text/javascript">

$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		/*var price = row.find('.price').val();
		
		var size  = row.find(".size").val();
		var color  = row.find(".color").val();
		var price  = row.find(".price").val();
		var img  = row.find(".img").val();
		var vendor  = row.find(".vendor").val();

		var category  = row.find(".category").val();
		*/

		var qty = row.find('.qty').val();
		var id  = row.find(".id").val();

		$.ajax({

            type : 'POST',
            url  : '../inc/updateCart.php',
            data : { id: id, qty: qty},
            cache: false,
            success :  function(res)
            {
                if(res.trim() == 1)
                {


                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Cart updated successfully</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         $(".icart").load(location.href + " .icart");
          $(".refreshme").load(location.href + " .refreshme");
          
      }else{
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
          
      }
            }
        });

	});



$(document).ready(function(){
		$("body").delegate(".coupon","keyup",function(event){
     event.preventDefault();
			var coupon = $('#coupon').val();
			var price = $('#mtotal').val();

			if(coupon == ""){
				$("#msgs").html('<div class="alert alert-danger">Please enter a coupon code</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);


			}else{


		$.ajax({

            type : 'POST',
            url  : '../inc/get_coupon.php',
            data : { coupon: coupon, price: price},
            cache: false,
            success :  function(res)
            {
                if(res.trim() == "error")
                {

                	$("#msgs").html('<div class="alert alert-danger">Invalid Coupon Code!</div>').show();
                    setTimeout(function() {
                    $("#msgs").fadeOut(1500);
                     }, 10000);
						
						//$('#result').html('');
          
                    }else{

                        
         				var json = JSON.parse(res);
						$('#result').html("<h6 class='pull-right text-danger'>"+json.discount+"% Off</h6>");
						$('#iprice').val(json.price);
                    }
            }
        });





			}




		});
	});








$('.regFormBtn').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#regForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"../inc/user/addUser.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){
                   $("#msgs").html('<div class="alert alert-success">Successfully registered. You can Proceed with your shopping from your page. <br/>Thank you for shopping with us.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
 
                 // $('#productForm')[0].reset();  
                 location.href = 'checkout';
                 
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

$('#addAddrForm').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#newAddrForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"../inc/addShippingAddress.php",  
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

 </script>