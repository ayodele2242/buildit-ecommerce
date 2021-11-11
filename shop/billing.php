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


 <div class="container pb-5 mb-2 mb-md-4">
      
    <div class="row">

       <section class="col-lg-8">
        <div class="rounded-lg box-shadow-lg ml-lg-auto pr-lg-4 pl-4 pb-5 bg-white pt-4 col-grey">
            <div class="widget mb-3">
              <h2 class="widget-title text-center col-blue">Order summary</h2>
               <?php 
          $total = 0;
            $carts = geCart($sessionId);
             $total_quantity = 0;
             $total_amount = 0;
             $total_amountd = 0;

             if($carts){
                  foreach($cart as $cart_item){
                    $total_quantity += $cart_item['quantity'];
                    $total_amount += $cart_item['price']*$cart_item['quantity'];
                   // $size += $cart_item['size'];
                    //$color += $cart_item['color'];
                  }
                }

         if($carts){
      $cartArray = array();
      $email = $_SESSION['email'];
      foreach($carts as $cart_product){
        $total_amountd += $cart_item['price']*$cart_item['quantity'];
           
               $cartArray[] = array('product_id' => $cart_product['product_id'], 'title' => $cart_product['title'], 'color'=>$cart_product['color'], 'size'=> $cart_product['size'],'price'=> $cart_product['price'], 'vendor'=> $cart_product['vendor'],'image'=> $cart_product['image'], 'sessionId'=> $cart_product['sessionId'],'quantity'=> $cart_product['quantity'], 'date_bought'=> $cart_product['added_date'], 'email'=> $_SESSION['email'], 'total_amt' => $total_amountd );

                 if($cart_product['image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$cart_product['image'])){
                    $thumbnail = UPLOAD_URL.'product/'.$cart_product['image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
                ?>

              <div class="media align-items-center pb-2 border-bottom mb-3"><a class="d-block mr-2" href="details?id=<?php echo $cart_product['product_id'];?>">
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
  //$items_array = print_r($cartArray, true);
  
      
      
    }else{
      echo '<div class="col-lg-8 col-sm-12 bg-white col-grey">No items in your cart yet.</div>';
    }
    ?>    
             
              
            
            </div>
           
            
          </div>

       </section>

 <aside class="col-lg-4 pt-4 pt-lg-0">

 <?php 
          if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = mysqli_query($mysqli,"select * from customer_login where email = '$email'");
            $udetails = mysqli_fetch_array($query);
            $uid = $udetails['id'];
            $_SESSION['uid'] = $udetails['id'];

            $addr = addresses($uid);

           ?>

           
            <div class="align-items-center bg-white">
             
              <div class="media-body pl-3">
                 <h2 class="h5 pt-3 pb-3 mb-3 col-grey">Payment Info</h2>
              </div>
            </div>


         

           <div class="col-sm-12 mb-lg-5 bg-white">
            
            <form id="paymentForm" class="">

                <?php
                foreach ($addr as $myaddr) {
                  $_SESSION['state'] = $myaddr['state'];
                ?>
                 <div class="row bg-white col-grey pt-3 pb-2 mb-3">
                <div class="col-sm-1 mb-3">
                  <?php  if($myaddr['default_address'] == 1){ ?>
                   <div class="radio  iradio-type-button2" style="background: #6a1b9a" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">
                   <?php }else{ ?>
                    <div class="radio  iradio-type-button2" style="background: #ffbb33" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">

                    <?php
                  }
                  ?>

                     <label class="checkLabel" >
                       <input type="radio" name="addr_id" id="addr_id" <?php  if($myaddr['default_address'] == 1){ echo 'checked'; } ?> class="colors" style="background: #9933CC"   value="<?php echo  $myaddr['user_id']; ?>" />
                       <span class="text">
                        
                       </span>
                     </label>
                   </div> 
                   </div>  

                    <div class="col-sm-10 mb-1">     

                  <?php  echo $myaddr['address1']; ?><br/>
                  <?php  echo $myaddr['mobile']; ?>
                </div>

                
                </div>
               

                <?php
                }
                
if(!empty($total )){

?>
<div class="mb-3 bg-white pt-3 pb-3 col-lg-12">
  <p class="col-grey pl-3">Select your payment method.</p>

  <div class="row bg-white col-grey pt-3 pb-2 mb-1">
   <div class="col-sm-1">
   <div class="radio  iradio-pay" style="border: solid 1px #0099CC;" data-toggle="tooltip" data-placement="top" title="">
   <label class="checkLabel" >
       <input type="radio" name="payment_method" class="colors" style="background: #9933CC"   value="pay_on_delivery" onclick="show1();"/>
       <span class="text">
                      
       </span>
     </label>
     </div> 
   </div>
   
   <div class="col-sm-9 ml-2">     
    Pay on Delivery
  </div>
 </div><!--On delivery #end-->

 <div class="row bg-white col-grey pt-3 pb-2 mb-3">
   <div class="col-sm-1">
   <div class="radio  iradio-pay" style="border: solid 1px #0099CC;" data-toggle="tooltip" data-placement="top" title="">
   <label class="checkLabel" >
       <input type="radio" name="payment_method" class="colors" style="background: #9933CC"   value="credit_card" onclick="cardPay();"/>
       <span class="text">
                      
       </span>
     </label>
     </div> 
   </div>
   
   <div class="col-sm-9 ml-2">     
    Credit or Debit Cards
  </div>
 </div>

<div id="cardPay" class="hide col-grey">

</div>


<div class="col-lg-12">
  <ul class="list-unstyled font-size-sm pb-2 border-bottom col-grey">
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Subtotal:</span><span class="text-right">
                <?php //echo $left_currency.number_format($total).$right_currency; ?>
                <input class="form-control readonly text-right" id="iprice" type="text" value="<?php echo number_format($total); ?>" name="total_amt_to_pay" readonly>
                <input type="hidden" name="mybonus" id="mybonus" value="">
                <input type="hidden" id="mtotal" name="mtotal" value="<?php echo $total; ?>">
                <input type="hidden" name="items_bought" id="items_bought" value="<?php error_reporting(0); echo htmlentities(serialize($cartArray));  ?>">
                <input type="hidden" name="cust_email" id="cust_email" value="<?php echo $_SESSION['email'];  ?>">
                <input type="hidden" name="trx_id" id="trx_id" value="<?php echo rand();  ?>">

              </span></li>
             <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Shipping:</span><span class="text-right">
               <?php
               if($_SESSION['state'] == "Lagos"){
                echo $left_currency.number_format("1500").$right_currency;
                ?>
                <input type="hidden" name="shipping" id="shipping" value="1500">
                <?php
               }else{
                echo $left_currency.number_format("2500").$right_currency;
                ?>
               <input type="hidden" name="shipping" id="shipping" value="2500">

                <?php
               }

               ?>

             </span>
           </li>
              
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Discount:</span><span class="text-right" id="result">—</span></li>

              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Total:</span><span class="text-right" id="total_result">—</span></li>

            </ul>
           
             <div class="form-group">
               <input id="coupon" class="form-control coupon" type="text" name="coupon_code" placeholder="Coupon code" autocomplete="off" auto-complete="off">       
              </div>

              <div class="form-group justify-content-between align-items-center">

                <button id="default_btn" class="btn btn-sm btn-info ">Pay</button>
                <button id="delivery_btn" class="btn btn-sm btn-info hide">Pay on Delivery</button>
                <button id="pay-now" class="btn btn-sm btn-info hide">Pay with Card</button>

              </div>
              <div class="form-group justify-content-between align-items-center col-grey">
                 <img src="<?php echo $set['installUrl'] ?>assets/img/paystack-wc.png">
              </div>
             
<?php// echo $PublicIP; ?>

</div>


</div>
<?php } ?>
</form>
</div>


<?php
           }
          ?>


          
  </aside>




    </div>
</div>









<?php 
include("footer.php");
 ?>

<script type="text/javascript">

function show1(){
  document.getElementById('cardPay').style.display ='block';
  $("#pay-now").hide();
  $("#delivery_btn").show();
  $("#default_btn").hide();
}
function cardPay(){
  document.getElementById('cardPay').style.display = 'block';
  $("#pay-now").show();
  $("#delivery_btn").hide();
  $("#default_btn").hide();
}







$(document).ready(function() {

$("#default_btn").click(function(e) {
      e.preventDefault();


        if($('input[name=payment_method]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">Please select your payment method to continue.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }

        if($('input[name=addr_id]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">We discovered your don\'t have a default address. Please select where you would want us to ship your items to.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }

  }); 





   $("#delivery_btn").click(function(e) {
      e.preventDefault();
     
     if($('input[name=addr_id]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">We discovered your don\'t have a default address. Please select where you would want us to ship your items to.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
        }else{
        
        var serializedData = $("#paymentForm").serialize();

        $.ajax({

            type : 'POST',
            url  : '../inc/payment/pay_on_delivery.php',
            data : serializedData,
            success :  function(res)
            {
                if(res.trim() == 1)
                {
                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Order Successfully Placed. Please check your order to see delivery date.</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         //$(".icart").load(location.href + " .icart");
         location.href = 'orders';
      }else{
        //console.log(res);
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
      }
            }
        });

          return false;
        }



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
			var coupon = $('#coupon').val();
			var price = $('#mtotal').val();

      



			if(coupon == ""){
				$("#msgs").html('<div class="alert alert-danger">Please enter a coupon code</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);


			}else{
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

                	$("#msgs").html('<div class="alert alert-danger">Invalid Coupon Code!</div>').show();
                    setTimeout(function() {
                    $("#msgs").fadeOut(1500);
                     }, 10000);
						
						//$('#result').html('');
          
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







$('#pay-now').click(function(e){ 
e.preventDefault(); 


  //function saveOrderThenPayWithPaystack(){
 if($('input[name=addr_id]:checked').length < 1){
          $("#msgs").html('<div class="alert alert-danger">We discovered your don\'t have a default address. Please select where you would want us to ship your items to.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
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
    var posting = $.post( '../inc/payment/pay_with_card.php', orderObj );

    posting.done(function( data ) {
      /* check result from the attempt */
      var jresponse = jQuery.parseJSON(data);

      var email = jresponse.email;
      //console.log(jresponse.amount);

      var handler = PaystackPop.setup({
     
      key: 'pk_test_485e53b3f0721b7729008cc000dec2dceded208a',


      name: jresponse.name,
      email: jresponse.email,
      amount: parseInt(jresponse.amount*100),
      



      metadata: {
        cartid: jresponse.transId,
        orderid: jresponse.transId,
        custom_fields: [
        {
            display_name: "Customer Name",
            variable_name: "customer_name",
            value: jresponse.name
          },
          {
            display_name: "Paid on",
            variable_name: "paid_on",
            value: 'Website'
          },
          {
            display_name: "Paid via",
            variable_name: "paid_via",
            value: 'Inline Popup'
          }
        ]
      },
      callback: function(response){
         var pay_res = response.reference;
         var amt = parseInt(jresponse.amount*100);

         document.location.href="payment_success.php?reference="+pay_res+"&transId="+jresponse.transId+"&email="+jresponse.email;

       //var message = 'Payment complete! Reference: ' + response.reference;
      //alert(message);
        /*$.ajax({
            url: 'payment_success.php',
            method: 'post',
            async:false,
            data:{reference: pay_res, transId: jresponse.transId, amount: amt},
            success: function (data) {
              alert(data);
            }
          });*/
      },
      onClose: function(){
        var pay_res = response.reference;
         var amt = parseInt(jresponse.amount*100);

         document.location.href="payment_failed.php?reference="+pay_res+"&transId="+jresponse.transId+"&email="+jresponse.email;

        //alert('Click "Pay now" to retry payment.');
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