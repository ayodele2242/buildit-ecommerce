
<?php
include("header.php");
include("header-bottom.php");
?>
<link href="frontpage/login.css" rel="stylesheet" type="text/css" media="all">
        
<div id="body-content">
               <div id="main-content">
                  <div class="main-content">
                     <div id="home-main-content" class="">
                       
<!-- BEGIN content_for_index -->
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


?>
                      


<section class="wrapper p-5">


      <div id="shopify-section-cart-template" class="shopify-section">
        <div class="wrap-breadcrumb bw-color ">
          <div id="breadcrumb" class="breadcrumb-holder container">
            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
              <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo $set['storeName']; ?>">
                  <span itemprop="name" class="d-none">Electro</span>Home
                  <meta itemprop="position" content="1">
                </a>
              </li>
              <li class="active">Your Shopping Cart</li>
            </ul>
          </div>
        </div>

          <div id="col-main" class="page-cart">
          <div class="container">  
         
          


           <div class="cart-table">


                
                <table>
                  <thead>
                    <tr>
                      <th class="remove">&nbsp;</th>
                      <th class="item">Product</th>
                      <th class="price">Price</th>
                      <th class="qty">Quantity</th>
                      <th class="total-price">Cart Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($carts){
                   
                    foreach($carts as $cart_product){
                      if($cart_product['image'] != "" && file_exists('upload/product/'.$cart_product['image'])){
                        $thumbnail = 'upload/product/'.$cart_product['image'];
                      }
                      else {
                        $thumbnail = FRONT_IMAGES.'no-image.png';
                      }

                    ?>
                    <tr class="cart-item">
                      <td class="action">

                        <a href="#" class="cart-remove-btn delete" type="button" title="Remove" data-toggle="modal" data-target="#delmodal_<?php echo $cart_product['product_id'];?>">
                        <span class="cart-remove-icon col-red"><i class="demo-icon icon-cancel-2" aria-hidden="true"></i></span>
                        </a>
                      </td>
                      <td class="item-name">
                        <div class="item-image">
                          <a href="detail?id=<?php echo $cart_product['product_id'];?>">
                          <img src="<?php echo $thumbnail;?>" alt="<?php echo $cart_product['title'];?>" class="imaged w48 h48">
                          </a>
                        </div>
                        <div class="item-title">
                          <a href="detail?id=<?php echo $cart_product['product_id'];?>">
                          <span class="item-name"><?php echo $cart_product['title'];?></span>
                          </a>
                          <div class="wrap-item-variant">
                            <span class="item-variant">Variant/Size: <span class="variant-title"><?php echo ucwords($cart_product['size']); ?></span></span>
                            <span class="item-variant">Color: <span class="variant-title"><?php echo ucwords($cart_product['color']); ?></span></span>
                          </div>
                          <div class="item-price"><span class="money"><?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.00</span></div>
                        </div>
                      </td>
                      <td class="item-price"><span class="money" ><?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.00</span></td>
                      <td class="item-qty">

                        
                          <div class="num-block skin-1">
                        <input type="hidden" name="id" class="mid"  value="<?php echo $cart_product['id']; ?>">
                          <div class="num-in">
                            <span class="minus dis" id=""></span>
                            <input type="text" class="in-num qty" value="<?php echo $cart_product['quantity'] ?>" readonly="">
                            <span class="plus"></span>
                          </div>
                        </div>
                       


                        <div class="mobile-remove-action">
                          <a href="#" class="cart-remove-btn delete" type="button" title="Remove">
                          Remove
                          </a>
                        </div>
                      </td>
                      <td class="item-total"><span class="money"><?php echo $left_currency.number_format($cart_product['price']*$cart_product['quantity']).$right_currency; ?>.00</span></td>

                         <!--Modal for delete-->
                         <!-- Panel Left -->
                         <div class="modal fade panelbox panelbox-left" id="delmodal_<?php echo $cart_product['product_id'];?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Item</h5>
                                <a href="javascript:;" data-dismiss="modal">Close</a>
                            </div>
                            <div class="modal-body">
                            Are you sure you want to delete  <b class="col-blue"><?php echo $cart_product['title'];?> </b>?
                            </div>
                            <div class="modal-footer">
                            <button class="btn-delete" id="<?php echo $cart_product['id'];?>" datacolor="<?php echo $cart_product['color'];?>" datatitle="<?php echo $cart_product['title'];?>"> 
                        <span class="fa fa-trash ion-2x"></span>
                        </button>
                        </div>
                        </div>
                        </div>
                        </div>
                                <!-- * Panel Left -->
                        <!-- * Modal for delete -->
                                            

                    </tr>

                    
                    <?php }

                     ?>
                     <tr class="last">
                       <td colspan="5" class="pb-4">
                       <h4><strong>Cart Total &nbsp;<?php echo $left_currency.number_format($total_amount).$right_currency; ?>.00</strong></h4>
                        
                       </td>

                     </tr>
                    <tr class="last">
                      <td colspan="5">
                        <a href="store" class="btn btn-2 btn-continue">Continue Shopping</a>
                        <a class="btn btn-1 btn-clear" href="checkout">Proceed to Checkout</a>
                      </td>
                    </tr>

                  <?php }else{ ?>

                    <tbody>
                      <tr>
                        <td colspan="5"><div class="alert alert-danger">Nothing in your cart</div></td>
                      </tr>
                    </tbody>



                    <?php } ?>
                  </tbody>
                </table>
              </div>



        </div>


</div>






      </div>

  
</section>



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



$(document).ready(function(){

  $('.delete').click(function () {
    var row = $(this).closest("tr");
     row.find(".me").show().html("Hello");
     //row.find('.modal').modal('show');
  });
});
</script>