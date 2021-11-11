 <?php
include("header.php");
include("navs.php");
?>


 <!-- Page Title (Shop)-->
    <div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo $set['installUrl'];  ?>"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="store">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0"></h1>
        </div>
      </div>
    </div>

 <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 refreshme">
      <div class="row">
        <!-- List of items-->
        <section class="col-lg-9">

        

          <div class="d-flex justify-content-between align-items-center pt-3 pb-2 pb-sm-5 mt-1">
            <h2 class="h4 text-light mb-0">Your cart</h2><a class="btn bg-white btn-sm pl-2 col-blue" href="store"><i class="fa fa-arrow-left mr-2"></i>Continue shopping</a>
          </div>

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
			?>


          <?php //include("cart_loader.php"); ?>
          

          <!-- Item-->
          <div class="d-sm-flex justify-content-between align-items-center my-2 pb-2 pr-3 border-bottom bg-white col-grey">
            <div class="media media-ie-fix d-block d-sm-flex align-items-center text-center text-sm-left">
            	<?php 

                 if($cart_product['image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$cart_product['image'])){
                    $thumbnail = UPLOAD_URL.'product/'.$cart_product['image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
                ?>
            	<a class="d-inline-block mx-auto mr-sm-4" href="detail?id=<?php echo $cart_product['product_id'];?>" style="width: 10rem;">
            		<img src="<?php echo $thumbnail;?>" alt="<?php echo $cart_product['title'];?>">
            	</a>
            	
              <div class="media-body pt-2">
                <h3 class="product-title font-size-base mb-2"><a href="detail?id=<?php echo $cart_product['product_id'];?>"><?php echo $cart_product['title'];?></a></h3>
                <?php if($cart_product['size'] != ""){ ?><div class="font-size-sm"><span class="text-muted mr-2">Variation:</span><?php echo ucwords($cart_product['size']); ?></div><?php  } ?>
               <?php if($cart_product['color'] != ""){ ?> <div class="font-size-sm"><span class="text-muted mr-2">Color:</span><?php echo ucwords($cart_product['color']); ?></div> <?php } ?>

                <div class="font-size-sm text-accent pt-2">
                	<span class="text-muted mr-2">Unit Price:</span> <?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.<small>00</small><br/>
                	<?php if($cart_product['quantity'] > 1){  ?>
                	<span class="text-muted mr-2">Subtotal:</span> <?php echo $left_currency.number_format($cart_product['price']*$cart_product['quantity']).$right_currency; ?>.<small>00</small>
                	<?php
                }
                ?>
                </div>
              </div>
          

            </div>
            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left">
              <div class="form-group mb-0">
                <label class="font-weight-medium" for="quantity1">Quantity</label>
                
               <!-- <input type="hidden" name="size" class="size"  value="<?php //echo $cart_product['size']; ?>">
                 <input type="hidden" name="color" class="color" value="<?php //echo $cart_product['color']; ?>">-->
                 
                  <!--<input type="hidden" name="cat_type" class="category"  value="<?php //echo $cart_product['cat_type']; ?>">
                   <input type="hidden" name="price"  class="price" value="<?php //echo $cart_product['price']; ?>">
                    <input type="hidden" name="img" class="img"  value="<?php //if(!empty($cart_product['image'])){ echo $cart_product['image']; } ?>">
                    <input type="hidden" name="vendor" class="vendor"  value="<?php //if(!empty($cart_product['vendor'])){ echo $cart_product['vendor']; } ?>">-->

                 <input type="hidden" name="id" class="id"  value="<?php echo $cart_product['id']; ?>">
                  <input type="text" name="quantity" class="qty" value="<?php echo $cart_product['quantity'] ?>" autocomplete="off" auto-complete="off" size="2"/>
                 
                
              
                
              </div>
              <button class="btn btn-link px-0 text-danger btn-delete" type="button" id="<?php echo $cart_product['id'];?>" datacolor="<?php echo $cart_product['color'];?>" datatitle="<?php echo $cart_product['title'];?>"><i class="fa fa-trash mr-2"></i><span class="font-size-sm">Remove</span></button>
            </div>
          </div>
          <!-- Item-->



          <?php

			$total = $total_amount;
			}
		}else{
			echo '<div class="col-lg-8 col-sm-12 bg-white col-grey">No items in your cart yet.</div>';
		}
		?>
         
       
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-3 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            <div class="text-center mb-4 pb-3 border-bottom">

              <h2 class="h6 mb-3 pb-1">Total</h2>
              <h3 class="font-weight-normal"><input class="form-control readonly" id="iprice" type="text" value="<?php echo number_format($total); ?>" readonly></h3>
            </div>
          
            <div class="accordion" id="order-options">
            	<p class="col-blue"><i class="fa fa-info-circle"></i> Shipping fees not included yet</p>
             <!-- <div class="card">

                <div id="promo-code" data-parent="#order-options">
                 
                    <div class="form-group">
                     <input class="form-control" type="hidden" value="<?php //echo $total; ?>">	
                      <input id="coupon" class="form-control" type="text" placeholder="Promo code" autocomplete="off" auto-complete="off">
                      <div id="result" class=""></div>
                    </div>
                    <button id="activate" class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
                  
                </div>
              </div>-->

              

            </div>
            <a class="btn btn-primary btn-shadow btn-block mt-4" href="checkout"><i class="fa fa-card font-size-lg mr-2"></i>Proceed to Checkout</a>
          </div>
        </aside>
      </div>
    </div>

<?php 
include("footer.php");
 ?>

<script type="text/javascript">


 </script>