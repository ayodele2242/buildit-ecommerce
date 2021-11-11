 <?php
include("header.php");
include("navs.php");

if(!isset($_SESSION['email'])){
    header('Location: account-signin');
}else{

$email = $_SESSION['email'];
$query = mysqli_query($mysqli,"select * from customer_login where email = '$email'");
$udetails = mysqli_fetch_array($query);
$uid = $udetails['id'];
$_SESSION['login_id'] = $uid;


$orders = orderbyTransId($email);

?>


<div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="new"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">My Orders</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Orders</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
      <div class="row">
        <!-- Sidebar-->
        <?php
        include("left-nav.php");
        ?>
        <!-- Content  -->
        <section class="col-lg-8">
           <div class="rounded-lg box-shadow-lg ml-lg-auto pr-lg-4 pl-4 pb-5 bg-white pt-4 col-grey">
            <div class="widget mb-3">
          
          
           
              	<?php
                if($orders){
              	foreach ($orders as $order) {
                   if($order['product_image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$order['product_image'])){
                    $thumbnail = UPLOAD_URL.'product/'.$order['product_image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
              	?>
                <!-- Addresses list-->
          <div class="row  border-bottom pb-3 pt-4 pr-2">

                 <div class="media align-items-center pb-2 mb-3 col-lg-8">
                  <a class="d-block mr-2" href="details?id=<?php echo $order['product_id'];?>">
                <img width="64" src="<?php echo $thumbnail;?>" alt="<?php echo $order['product_name'];?>"/></a>
                <div class="media-body">
                  <h6 class="widget-product-title"><a href="details?id=<?php echo $order['product_id'];?>"><?php echo $order['product_name'];?></a></h6>
                  <?php if($order['size'] != ""){ ?><div class="font-size-sm"><span class="text-muted mr-2">Variation:</span><?php echo ucwords($order['size']); ?></div><?php  } ?>
               <?php if($order['color'] != ""){ ?> <div class="font-size-sm"><span class="text-muted mr-2">Color:</span><?php echo ucwords($order['color']); ?></div> <?php } ?>
                  <div class="widget-product-meta"><span class="text-accent mr-2"><?php echo $left_currency.number_format($order['product_price']).$right_currency; ?>.<small>00</small></span><span class="text-muted">x <?php echo $order['quantity'];?></span>

                  </div>
                  <div class="widget-product-meta">
                    <span class="text-accent mr-2">
                      <span class="text-muted">Total Amount: </span>
                      <?php echo $left_currency.number_format($order['total_amount']).$right_currency; ?>.<small>00</small></span>
                  </div>
                   <div class="widget-product-meta">
                  <small class="col-grey">
                      <span class="text-muted">Date Placed: </span>
                      <?php echo $order['added_date']; ?>
                </small>
                </div>

                 <div class="widget-product-meta">
                  <small class="col-grey">
                   <?php
                     if($order['delivery_status'] != "Delivered" && $order['delivery_date'] == ''){
                  echo 'Thanks for making your order with us. We will get in touch with you for the delivery of your item(s).';
                  }

                  else if($order['delivery_status'] == 'Fulfilled' && $order['delivery_date'] != ''){
                  echo 'Your order has been fulfilled and will be delivered on '.$order['delivery_date'];
                  }

                  else if($order['delivery_status'] == "Delivered"){
                  echo '<span class="text-success">Your order was delivered on '.$order['delivery_date'].'</span>';
                  }
                  else if($order['delivery_status'] == "Cancelled"){
                  echo '<span class="text-danger h6">Cancelled</span>';
                  }elseif($order['status'] == "Refunded" && $order['delivery_status'] == "Returned"){
                  echo '<span class="text-danger h6">Returned</span>';
                  }


                  ?>
                </small>
                </div>

                </div>
              </div>

               <div class="align-items-center pb-2 col-lg-3">
                <div class="col-lg-12">
                  <?php 
                  if($order['status'] == "Pending"){
                  echo '<span class="col-orange">'.$order['status'].'</span>';
                  }else if($order['status'] == "Cancelled"){
                  echo '<span class="col-grey">'.$order['status'].'</span>';
                  }else if($order['status'] == "Paid"){
                  echo '<span class="text-success"><i class="fa fa-check-circle"></i> '.$order['status'].'</span>';
                  }else{
                    echo '<span class="text-info">'.$order['status'].'</span>';
                  }

                  ?>
                </div>
                <div class="col-lg-12">
                  <div class="widget-product-meta">
                  <small class="col-grey">
                      <span class="text-muted">Order No: </span>
                      <?php echo $order['transId']; ?>
                </small>
                </div>

                 <!--<a type="button" class="btn btn-sm bg-blue col-white" id="<?php //echo $order['transId'];  ?>">Details</a>-->
                </div>


               </div>


             </div>
               

                <?php
                }
              }else{
                echo '<div class="text-danger">You have not made any order.</div>';
              }
                ?>
              
                
             
          </div>
        </div>
      </div>
          
        </section>
      </div>
    </div>











<?php 
}
include("footer.php");
 ?>
