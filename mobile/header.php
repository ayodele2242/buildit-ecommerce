<?php
 
  require_once '../config/config.php';
  require_once '../config/function.php';
  require_once '../class/database.php';
  require_once '../class/category.php';
  require_once '../class/banner.php';
  require_once '../class/product.php';

  require_once '../class/ads.php';
  require_once '../class/login_register.php';
  require_once '../inc/fetch.php';
  require_once("../inc/functions.php");
  require_once 'functions.php';

  if(!empty($right_currency)){
    $right_currency = $right_currency;
  }else{
    $right_currency='';
  }
  if(!empty($left_currency)){
    $left_currency = $left_currency;
  }else{
    $left_currency='';
  }

  //$category = new Category();
  //$product = new Product();
  
  //session_start();
  $login_in = new LoginRegister();
  if (isset($_SESSION['customer'])) {
    $login_in_fo = $login_in->getCustomerInfo($_SESSION['customer']);
  }
  
  //debugger($login_in_fo,true);
  $current_page = getCurrentPage();
//debugger($current_page);
//exit;
  $category = new Category();
  $parent_cats = $category->getAllParentCats();

  $product = new Product();

$latest_product = $product->getLatestProduct();

/**/
$banner = new Banner();

$banner_info = $banner->getBannerForHome(5);

$ads = new Ads();
$ads_info = $ads->getAdsForHome(3);


//$category->getCategoryById($parent_id);
 $PublicIP = get_client_ip();
 //$a = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$PublicIP));

 if(isset($_SESSION['email'])){
 $email = $_SESSION['email'];
 $query = mysqli_query($mysqli,"SELECT * FROM customer_login WHERE email='$email'");
 $urow = mysqli_fetch_array($query);


 }

 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BuildIt</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/avatar.css">
    <link rel="stylesheet" href="css/placeholder-loading.css">
    <link rel="stylesheet" href="mobile-skeleton/style.css">
    
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <link href="vendor/materializeicon/material-icons.css" rel="stylesheet">
     <!--<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>-->
<style>
  .long-text { 
  word-wrap    : break-word;
overflow-wrap: break-word;
}
  .exp{
    width:80px;
    height:80px;
    background-color: #0099CC;
    color: #fff;
    border-radius:100%;
    line-height:90px;
    text-align:center;
    vertical-align:middle;
    display:inline-block;
     font-size: 38px;
     font-weight: bolder;
}

.key{
   line-height: inherit;
}

 .rounded-circle {
    border-radius: 50% !important;
  }

.aloader {
      position: fixed;
     bottom:0;
}

.displayMe{
  display: none;
}

.aloader > .ME > img {
     margin: auto;  /* Magic! */
}
.aloader > .ME{
  text-align: center;
}
.hide{
display: none;
  }

.background-wrapper {
  margin: 0 auto;
}

.loadingCategories{
  font-weight: bold;
  padding: 10px;
  height: 100%;
  min-height: 200px;
  margin: 0 auto;
  margin-bottom: 10px;
  background: url(gif/categories-loading-unscreen.gif) no-repeat center center;  
  text-align: center;
  display: block;
}

.loadingProducts {
  font-weight: bold;
  padding: 10px;
  margin: 0 auto;
  height: 100%;
  min-height: 200px;
  margin-bottom: 10px;
  background: url(gif/cart-loading-unscreen.gif) no-repeat center center;  
  text-align: center;
  display: block;
}


#backgroundBlock {
  position: relative;
}

#backgroundBlock span {
  color: #fff;
  font-weight: bold;
  margin: 0 auto;
  text-align: center;
  display: block;
}

#backgroundBlock img {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}  

.round{
  border-radius: 15px;
  padding: 5px;
  margin-top: 6px;
  font-size: 10px;
  }
  
.gradient-border {
  --borderWidth: 3px;
  background: #1D1F20;
  position: relative;
  border-radius: 10px;;
}
.gradient-border:after {
  content: '';
  position: absolute;
  top: calc(-1 * var(--borderWidth));
  left: calc(-1 * var(--borderWidth));
  height: calc(100% + var(--borderWidth) * 2);
  width: calc(100% + var(--borderWidth) * 2);
  background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
  border-radius: calc(2 * var(--borderWidth));
  z-index: -1;
  -webkit-animation: animatedgradient 3s ease alternate infinite;
          animation: animatedgradient 3s ease alternate infinite;
  background-size: 300% 300%;
}


@-webkit-keyframes animatedgradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}


@keyframes animatedgradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}


  
 </style> 


 
</head>


<body>
