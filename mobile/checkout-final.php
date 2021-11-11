<?php
include("header.php");
?>
<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->

<style>
.no-background{
  background: transparent;
  border: none;
}
.ibtn{
  width: 80px;
  height: 35px;
  background: #fff;
  color: #506690;
  border: none;
}
.font-bolder{
    font-weight: bolder;
}

.input {
	display: inline-block;
	border: none;
	width: 35%;
}



  </style>
<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack bolder" onclick="goBack()">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>Card Payment
    </div>
    <!--<div class="pageTitle">Chechout</div>-->
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

     

<?php 
//if(isset($_SESSION['email'])){
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


  ?>
  <form id="checkout-form">
     <div class="section mt-2 mb-2 text-center">
            <h4>Find below summary of what you are paying for</h4>
        </div>
 <div class="form-wizard form-header-classic form-body-classic" >
   

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

                 if($cart_product['image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$cart_product['image'])){
                    $thumbnail = UPLOAD_URL.'product/'.$cart_product['image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
                ?>


<div class="row mb-2 bg-white col-grey pt-1 pb-1"><!--row-->
<div class="col-12"><!--first col-->
<div class="row"><!--row-->
<div class="col-2">
<img src="<?php echo $thumbnail;?>" alt="<?php echo $cart_product['title'];?>" class="image-block imaged w48">
</div>
<div class="col-10">
<div class="row"><!--row-->
<div class="col-12">
<h5 class="product-title font-size-base mb-1"><a href="search.php?id=<?php echo $cart_product['product_id'];?>"><?php echo $cart_product['title'];?></a> x<?php echo number_format($cart_product['quantity']); ?></h5>
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
        }if($carts){
        ?>

 <div class="row mb-2">
       <div class="form-group">
          <input id="coupon" class="form-control coupon" type="text" name="coupon_code" placeholder="Coupon code" autocomplete="off" auto-complete="off">       
        </div>

       </div>

        <div class="row mb-3">

         <div class="col-8 text-right ">Subtotal:</div>
         <input class=" col-4 readonly text-right no-background" id="iprice" type="text" value="<?php echo number_format($total); ?>" name="total_amt_to_pay" readonly>
        
         <div class="col-8 text-right ">Shipping:</div>
         <div class="col-4 text-right">
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

         <div class="col-8 text-right ">Discount:</div>
         <div class="col-4 text-right pt-1" id="result">---</div>
        

         </div>

                <input type="hidden" name="mybonus" id="mybonus" value="">
                <input type="hidden" id="mtotal" name="mtotal" value="<?php echo $total; ?>">
                <input type="hidden" name="items_bought" id="items_bought" value="<?php error_reporting(0); echo htmlentities(serialize($cartArray));  ?>">
                <input type="hidden" name="cust_email" id="cust_email" value="<?php echo $_SESSION['email'];  ?>">
                <input type="hidden" name="trx_id" id="trx_id" value="<?php echo rand();  ?>">

                <button type="submit" class="btn btn-info" data-paystack="submit">Next</button>
                </div><!--first div-->
              </form>

            <div id="processing" style="display:none">
                Please wait...
            </div>

             <form id="card-form" style="display:none">
             <div class="form-wizard form-header-classic form-body-classic" >
                 <div class="section mt-1">
            <div class="section-title">Enter credit card details to make payment. </div>
             </div>
                 
              <div id="error" class="section mt-2 mb-2 text-center"><div id="error-message"></div><div id="error-errors"></div></div>
              

                <div class="row card-body bg-white">
                <div class="col-12 mb-2">   
               <input type="text" id="number" class="form-control" data-paystack="number" placeholder="0000 0000 0000 0000">
               </div> 
               <div class="col-8 d-flex">
               <div class="input">
               <input type="text" id="expiryMonth" class="form-control formInput text-center" data-paystack="expiryMonth" placeholder="MM">
              </div>
             
              <div class="input">
                <input type="text" id="expiryYear" class="form-control formInput text-center" data-paystack="expiryYear" placeholder="YY">
                </div>
                </div>
                <div class="col-4 mb-2">
                <input type="text" id="cvv" class="form-control" data-paystack="cvv" placeholder="CVV">
                </div>
                 <div class="col-12 mt-2"> 
                <button type="submit" class="btn btn-info" data-paystack="submit">Pay</button>
                </div>
                </div>

             </div>
            </form>
            
            
            <form id="pin-form" style="display:none">
                <div class="section-title">To confirm you're the owner of this card, please enter your card pin</div>
                  <div class="form-wizard form-header-classic form-body-classic row" >
            <div class="col-12 mb-2">   
            <input type="password" id="pin" data-paystack="pin" placeholder="pin">
            </div>
             <div class="col-12 mb-2">   
            <button type="submit" class="btn btn-info" data-paystack="submit">Continue</button>
            </div>
            </div>
           </form>

            <form id="otp-form" style="display:none" class="row">
            <div id="otp-message" class="section-title col-12"></div>
            <input type="text" id="otp" class="form-control col-12 b-3" data-paystack="otp" placeholder="otp">
            <button type="submit" data-paystack="submit" class="btn btn-info">Continue</button>
            </form>
            
            <form id="3ds-form" style="display:none" class="row">
                <div id="3ds-message" class="section-title col-12"></div>
                <button type="submit" data-paystack="submit" class="btn btn-info">Continue</button>
            </form>
            
            <form id="phone-form" style="display:none" class="row">
                <div id="phone-message" class="section-title col-12"></div>
                <input type="text" id="phone" class="form-control col-12 b-3" data-paystack="phone" placeholder="phone">
                <button type="submit" data-paystack="submit" class="btn btn-info">Continue</button>
            </form>
            
            <div id="timeout" style="display:none">
                <div id="timeout-message" class="section-title col-12"></div>
            </div>
            
            <div id="success" style="display:none">
                <div id="success-message" class="section-title col-12"></div>
                <div id="success-reference" class="section-title col-12"></div>
                <div id="success-gateway-response" class="section-title col-12"></div>
                <div id="verify-error" class="section-title col-12"></div>
            </div>


                <?php }else{ ?> 

                   <div style="height: 100%; max-height: 150px; padding: 10px;">
                    You don't have any items in your cart.

                   </div>

                <?php } ?>



              

</div><!-- * App Capsule -->









<?php
include("footer.php");
?>
<script src="https://js.paystack.co/v1/paystack.js"></script>
<script src="js/paystack-main.js"></script>
<script src="js/paystack-app.js"></script>

<script type="text/javascript">



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
      var coupon = $('#coupon').val();
      var price = $('#mtotal').val();

      



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
            url  : '../inc/get_coupon.php',
            data : { coupon: coupon, price: price},
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
            $('#result').html("<h6 class='pull-right text-danger'>"+json.discount+"% Off</h6>");
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
  
  
  
  

 </script>