<?php
include("header.php");
?>
<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="#" class="headerButton goBack" onclick="goBack()">
           <span class="material-icons">arrow_back_ios</span>
        </a>
    </div>
    <div class="pageTitle">Cart</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->


<!-- App Capsule -->
<div id="appCapsule">

<?php 
$total = 0;
$carts = geCart($sessionId);
$cart = geCart($sessionId);
$total_quantity = 0;
$total_amount = 0;

if($cart){
    foreach($cart as $cart_item){
    $total_quantity += $cart_item['quantity'];
    $total_amount += $cart_item['price']*$cart_item['quantity'];
    // $size += $cart_item['size'];
    //$color += $cart_item['color'];
    }
}

if($carts){
echo '<div class="section mt-2">';
foreach($carts as $cart_product){
  if($cart_product['image'] != "" && file_exists('upload/product/'.$cart_product['image'])){
    $thumbnail = 'upload/product/'.$cart_product['image'];
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
<div class="font-size-sm col-8"><span class="text-muted mr-2">Color:</span><?php echo ucwords($cart_product['color']); ?>
</div> <?php } ?>
</div>

</div><!--* row-->
</div>
</div><!--* row-->
</div><!--* first col-->
<div class="col-12 row"><!--second col-->
<div class="col-6 col-orange"><span class="mr-2 col-orange">Unit Price:</span> <?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.<small>00</small></div>
<?php if($cart_product['quantity'] > 1){  ?>
<div class="font-size-sm col-6 col-indigo">
<span class="mr-2">Subtotal:</span> <?php echo $left_currency.number_format($cart_product['price']*$cart_product['quantity']).$right_currency; ?>.<small>00</small>
</div>
<?php } ?>
</div><!--* second col-->
<div class="col-12 row"><!--third col-->
<div class="col-6 pt-2">
<button type="button" class="btn btn-icon bg-red mr-0" onclick="addToWishlist(<?php echo  $cart_product['id'];?>);">
     <span class="material-icons">favorite</span>
</button>

<button type="button" class="btn btn-icon btn-danger mr-1 delete">
   <span class="material-icons">delete</span>
</button>


<!--Modal for delete-->
 <!-- Panel Left -->
 <div class="modal fade panelbox panelbox-left" id="PanelLeft-delete" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Delete Item</h5>
        <a href="javascript:;" data-dismiss="modal">Close</a>
    </div>
    <div class="modal-body">
    Are you sure you want to delete  <b class="col-blue"><?php echo $cart_product['title'];?> </b>?
    </div>
    <div class="modal-footer">
    <button class="btn bg-red btn-delete col-white" id="<?php echo $cart_product['id'];?>" datacolor="<?php echo $cart_product['color'];?>" datatitle="<?php echo $cart_product['title'];?>"> 
<span class="material-icons">delete</span>
</button>
</div>
</div>
</div>
</div>
        <!-- * Panel Left -->
<!-- * Modal for delete -->





</div>
<div class="col-6">
<!-- skin 2 -->
<div class="num-block skin-2">
<input type="hidden" name="id" class="mid"  value="<?php echo $cart_product['id']; ?>">
  <div class="num-in">
    <span class="minus dis" id=""></span>
    <input type="text" class="in-num qty" value="<?php echo $cart_product['quantity'] ?>" readonly="">
    <span class="plus"></span>
  </div>
</div>
<!-- / skin 2 -->
</div>


</div><!--* third col-->

</div><!--* row-->
<?php

$total = $total_amount;
}
echo '</div>';
}else{
?>

<div class="empty-cart">
    <div class="empty-results">
      <h3 class="text-center">
          <ion-icon name="cart"></ion-icon>
      </h3>
      <p class="text-center">
        Your cart is empty
      </p>
    </div>
  </div>

<?php
}
?>
</div>




<?php if($cart){ ?>
  <!-- App Bottom Menu -->
<div class="appBottomMenu bg-def">
<?php
if(isset($_SESSION['email'])){
?>
<a href="checkout.php" class="btn bg-def btn-lg btn-block col-lg-12"> <ion-icon name="cart"></ion-icon> Checkout</a>
<?php }else{ ?>
  <a href="#" class="btn bg-def btn-lg btn-block col-lg-12" data-toggle="modal" data-target="#AddressModal"> <ion-icon name="cart"></ion-icon> Checkout</a>
<?php } ?>            
     </div>
     <!-- * App Bottom Menu -->

<?php } ?>





     <!-- Modal Address -->
     <div class="modal fade modalbox" id="AddressModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Shipping Address</h5>
                        <a href="javascript:;" data-dismiss="modal" class="text-danger">X Close</a>
                    </div>
                    <div class="modal-body">
                        <p class="alert alert-info">
                            You are yet to log in. If you are an existing customer please <a href="#" data-toggle="modal" data-target="#ModalLogin" class="bolder">Login here</a>
                        </p>

                        <div class="section mt-1 p-0 ">
            <form id="regForm">

                       <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="firstname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

               
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your e-mail">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Phone No.</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone No.">
                            </div>
                        </div>
        
                        

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="zipcode">ZIP Code</label>
                                <input type="number" class="form-control" id="zip" name="zip" placeholder="ZIP Code">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="country">Country</label>
                                <select class="form-control custom-select mselect select" id="mcountry" name="country">
                                <option value="">Choose country</option>
                                <?php echo getCountry(); ?>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="select4">State</label>
                                <select class="form-control custom-select" id="mstates" name="state">
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="select4">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="City">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Address 1</label>
                                <textarea id="address1" rows="2" class="form-control"
                                    placeholder="Address 1" name="address1"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Address 2</label>
                                <textarea id="address2" rows="2" class="form-control"
                                    placeholder="Address 2"  name="address2"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                            </div>
                        </div>
        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password2">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Type password again">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="default-address" value="1" type="checkbox" checked id="same-address">
                            <label class="custom-control-label" for="same-address">Set as default shipping address</label>
                        </div>
                        </div>
                        
                        <div class="form-group basic">
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                           
                            <label class="custom-control-label" for="customChecka1">
                               
                            </label>
                        </div>
                        </div>
        
                    


                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg regFormBtn">Register</button>
                </div>

            </form>
        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- * Modal Address -->










<?php
include("footer.php");
?>
