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

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo (isset($current_page)) ? ucwords(str_replace('_', ' ', $current_page)) : SITE_TITLE; ?></title>
    <!-- SEO Meta Tags-->
    <meta name="keywords" content="<?php echo KEYWORDS;?>">
    <meta name="description" content="<?php echo DESCRIPTION;?>">
    <meta name="author" content="<?php echo DESCRIPTION;?>">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">
    
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="css/vendor.min.css">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" id="main-styles" href="css/theme.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $set['installUrl']; ?>assets/main/css/color.css" />
    <link href="css/placeholder-loading.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $set['installUrl']; ?>assets/css/easy-responsive-tabs.css" rel="stylesheet">
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto.min.css">
<!--<script type="text/javascript" src="<?php //echo $set['installUrl']; ?>assets/js/jquery-1.11.1.min.js"></script>-->
  <!-- Slick -->
  <!--<link type="text/css" rel="stylesheet" href="<?php //echo FRONT_CSS;?>slick.css" />
  <link type="text/css" rel="stylesheet" href="<?php //echo FRONT_CSS;?>slick-theme.css" />

  <link type="text/css" rel="stylesheet" href="<?php// echo FRONT_CSS;?>nouislider.min.css" />-->
    <!-- Google Tag Manager-->
   
  <style type="text/css">
 body, html{
  background: #f1f1f1;
 }

 #cresults,#cresults p {
font-size: 12px;
 }


.readonly{
  background: transparent;
  border:none;
  font-size: 20px;
}

        #msgs {
         
          height: auto;
          width: auto;
          position: fixed;
          text-align: center;
          justify-content: center;
          align-items: center;
          left: 50%;
          margin-left: -37.5%;
                }
        #msgs {
          z-index: 30;
        }

        .ui-autocomplete-row
      {
        padding:8px;
        background-color: #f4f4f4;
        border-bottom:1px solid #ccc;
        font-weight:bold;
      }
      .ui-autocomplete-row:hover
      {
        background-color: #ddd;
      }

/*.breadcrumb .breadcrumb-item+.breadcrumb-item:before {
  padding: 8px;
  color: #fff;
  content: ">\00a0";
}*/


 .comp-hide{
  display: none;
 }

 .coursel-img-container{
  height: 500px;
 }

 .coursel-img-container img{
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  overflow: hidden;
    justify-content: center;
    align-items: center;
    text-align: center;
 }

 .icon-color{
  text-shadow:  0 -5px #ff8f00,0 -3px #ff8f00,0 -3px #ff8f00,0 -5px #ff8f00;
  
 }

 .menu-right{
  float: right;
 }

.mb-101{
  margin-bottom: 5px;
}
.product-old-price{
  color: #455a64;
}
.star-filled{
  color: #2196F3
}
.empty{
  text-shadow:  0 -1px #ff4444;
}
.sale-discount{
    color: #fff;
    background-color: #ff6d00 ;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 35px;
    height: 35px;
    width: 35px;
    border-radius: 50%;
    position: absolute;
    right: 10px;
    top: 10px;
     justify-content: center;
    align-items: center;
    text-align: center;
    transition: all .3s 
}
.wish{
  background: red;
  color: white;
  border:none;
  transition:color 0.25s ease-in-out;
   line-height: 36px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
}
.add-to-cart{
  border:none;
  color: white;
  transition:color 0.25s ease-in-out;
   line-height: 36px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
 
  
}
.wish,.add-to-cart{
  position: relative;  
  display: inline-block; 
    text-align:center;
    justify-content: center;
    align-items: center;
    border-radius: 2px;
    margin: 0 5px;
    transition: all .3s ease 0s 
}
.product-price{
 font-size:  12px;
}

.card-img-top{
  padding-bottom: 5px;
  padding-top: 5px;
}
.card-img-top img{
  height: 200px;
  width: 100%;
}




.card.product-card .product-btns {
  position: absolute;
  opacity: 0;
 
  visibility: hidden;
  -webkit-transition: 0.3s all;
  transition: 0.3s all;
   text-align:center;
    justify-content: center;
    align-items: center;


}

.card.product-card:hover{
   -webkit-box-shadow: inset 0px -50px 0px 0px rgba(229,229,229,0.8);
        -moz-box-shadow: inset 0px -50px 0px 0px rgba(229,229,229,0.8);
        box-shadow: inset 0px -50px 0px 0px rgba(229,229,229,0.8);
}

.card.product-card:hover .product-btns {
  opacity: 1;
  visibility: visible;
  width: 180px;
    padding: 0;
    margin: 0 auto;
    list-style: none;
    position: absolute;
    right: 0;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    transition: all .3s ease 0s 
     

}

.cat-holder{
 width: 100%;
  height: 100%;
  box-shadow:inset 0 0 0 2000px rgba(0, 0, 0,.5);
   display: flex; /*added*/
  flex-direction: column; /*added*/
  background-position: center;
}


#price_range {
    height: 6px;
}
.ui-slider-handle {
    height: 13px !important;
    width: 13px !important;
    background: #2196F3 !important;
    border-radius: 25px;
}
.ui-slider-range.ui-corner-all.ui-widget-header {
    background: #2196F3;
}


 .flex-wrap {
  flex-wrap:wrap;
}

.iradio-type-button2, .iradio-pay {
  margin:auto 11px auto 0px;
  display: inline-flex;
  width: 30px;
  height: 30px;
  border-radius: 50%;  
  border: 2px solid #f1f1f1;
 
  box-shadow: 0 0 3px #ddd;

 
}

.color-active{
  background: #0099CC;
  box-shadow: 0 0 3px #ddd;
  width: 30px;
  height: 30px;
  border-radius: 50%;  
}





.iradio-type-button2 label,  .iradio-pay label{
  padding:0px !important;
  margin:-2px !important;
  display:block;
  position:relative;
  border:none;
  cursor:pointer;

}
 .iradio-type-button2.active label {
  /*border:2px solid #06bec7;*/
  }

.iradio-type-button2 img,
.iradio-type-button2 span,  
.iradio-pay img,
.iradio-pay span{
display:block;
cursor:pointer;
vertical-align: middle;
}
.iradio-type-button2 img.text,
.iradio-type-button2 span.text,
.iradio-pay img.text,
.iradio-pay span.text {
color: #fff;
font-size:12px;
text-transform:uppercase;
font-weight:600;
padding:5px 12px;
}
.iradio-type-button2 input, .iradio-pay input{display:none;}

.hide {
  display: none;
}

.radio-type-button2 {
margin:auto 11px auto 0px;
display: inline-flex;
background: #ffab00;
}


#input-option .radio-type-button2:hover label,
#input-option .radio-type-button2:hover .text,
#input-option .radio-type-button2:active label,
#input-option .radio-type-button2:active .text {
   background-color: rgba(0, 0, 0, 0.5);
}

.size-active{
    background: #9933CC;

}

.radio-type-button2 input[type="radio"]:checked {
  border-color: orange;
}

.radio-type-button2 label {
  padding:0px !important;
  margin:-2px !important;
  display:block;
  position:relative;
  border:none;
  cursor:pointer;

}
 .radio-type-button2.active label {
  /*border:2px solid #06bec7;*/
  }

.radio-type-button2 img,
.radio-type-button2 span {
display:block;cursor:pointer;
}
.radio-type-button2 img.text,.radio-type-button2 span.text {
color: #fff;
font-size:12px;
text-transform:uppercase;
font-weight:600;
padding:5px 12px;
}
.radio-type-button2 input {display:none;}

.quantity {
width:155px;
padding-right:10px;
position:relative;
}


@media (max-width:767px) {
  .radio-type-button2:first-of-type {
  margin-left:auto;}.product-3.product-info .product-center .options-cart .options .radio-type-button2:last-of-type {margin-right:auto;}}

.price {
  font-size: 20px;
  color: #000;
  font-weight: 600;
  padding: 15px 0px 0px 0px;
}
 .price .price-old {
  color: #808080;
  font-weight: normal;
  text-decoration: line-through;
  padding-right: 4px;
}
.price .price-new {
  color: #06bec7;
}
.product-list.type-2 .product-2 .center .left {
  padding-right: 11px;
  font-size: 12px;
  line-height: 20px;
  text-transform: uppercase;
  padding-top: 26px;
}
@media (max-width: 767px) {
  .product-list.type-2 .product-2 .center .left {
    padding-top: 17px;
  }
}
.product-list.type-2 .product-2 .center .right {
  font-size: 12px;
  line-height: 20px;
  text-transform: uppercase;
  font-weight: 600;
  padding-top: 26px;
}
@media (max-width: 767px) {
  .product-list.type-2 .product-2 .center .right {
    padding-top: 17px;
  }
}
.product-list.type-2 .product-2 .center .description {
  font-size: 14px;
  line-height: 20px;
  padding: 15px 0px 0px 0px;
}
.product-list.type-2 .product-2 .right.align-self-center {
  padding-left: 30px;
  text-align: center;
  width: 250px;
}
@media (max-width: 991px) {
  .product-list.type-2 .product-2 .right.align-self-center {
    width: 100%;
    padding-left: 0px;
    padding-top: 30px;
  }
}
@media (max-width: 767px) {
  .product-list.type-2 .product-2 .right.align-self-center {
    padding-top: 25px;
  }
}
.product-list.type-2 .product-2 .right.align-self-center .add-to-cart {
  padding: 7px 0px 0px 0px;
}
.product-list.type-2 .product-2 .right.align-self-center .add-to-cart .button {
  display: block;
  width: 100%;
  text-align: center;
  padding-top: 13px;
  padding-bottom: 12px;
}
.product-list.type-2 .product-2 .right.align-self-center .action {
  padding: 6px 0px 0px 0px;
  margin: 0px;
  list-style: none;
}
@media (max-width: 1098px) {
  .product-list.type-2 .product-2 .right.align-self-center .action {
    padding: 0px 0px 0px 0px;
  }
}
.product-list.type-2 .product-2 .right.align-self-center .action li {
  display: flex;
  padding: 11px 0px 0px 0px;
}
.product-list.type-2 .product-2 .right.align-self-center .action li a {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  text-decoration: underline;
  display: block;
  position: relative;
  margin: 0px auto;
}
@media (max-width: 767px) {
  .product-list.type-2 .product-2 .right.align-self-center .action li a {
    font-size: 11px;
  }
}
.product-list.type-2 .product-2 .right.align-self-center .action li a span {
  position: absolute;
  top: 50%;
  left: -28px;
  transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  font-size: 15px;
  padding-right: 15px;
}
@media (max-width: 767px) {
  .product-list.type-2 .product-2 .right.align-self-center .action li a span {
    font-size: 14px;
  }
}
.product-list .product {
  margin: 0px 0px 20px 0px;
}
@media (max-width: 767px) {
  .product-list .product {
    margin: 0px 0px 30px 0px;
  }
  .product-list .product .d-flex {
    -ms-flex-align: flex-start !important;
    align-items: flex-start !important;
  }
}
.product-list .product .left {
  width: 42%;
  min-width: 42%;
}
.product-list .product .right {
  width: 58%;
  padding: 0px 0px 0px 30px;
  max-width: 354px;
}
@media (max-width: 767px) {
  .product-list .product .right {
    padding: 0px 0px 0px 20px;
  }
}
.product-list .product .right .brand a,
.product-list .product .right .brand {
  font-size: 12px;
  text-transform: uppercase;
}
@media (max-width: 767px) {
  .product-list .product .right .brand a,
  .product-list .product .right .brand {
    font-size: 11px;
  }
}
.product-list .product .right .name {
  padding: 7px 0px 0px 0px;
}
.product-list .product .right .name a {
  font-size: 25px;
  line-height: 30px;
}
@media (max-width: 1098px) {
  .product-list .product .right .name a {
    font-size: 21px;
    line-height: 1.2;
  }
}
@media (max-width: 767px) {
  .product-list .product .right .name a {
    font-size: 18px;
  }
}
.product-list .product .right .rating-reviews {
  padding: 8px 0px 0px 0px;
}
.product-list .product .right .price {
  font-size: 30px;
  font-weight: 600;
  padding: 23px 0px 0px 0px;
}
@media (max-width: 1098px) {
  .product-list .product .right .price {
    font-size: 24px;
  }
}
@media (max-width: 767px) {
  .product-list .product .right .price {
    font-size: 20px;
    padding: 15px 0px 0px 0px;
  }
}
.product-list .product .right .price .price-old {
  font-size: 20px;
  color: #808080;
  font-weight: 400;
  text-decoration: line-through;
  padding-right: 5px;
}
@media (max-width: 1098px) {
  .product-list .product .right .price .price-old {
    font-size: 18px;
  }
}
@media (max-width: 767px) {
  .product-list .product .right .price .price-old {
    font-size: 15px;
  }
}
.product-list .product .right .price .price-new {
  color: #06bec7;
}
.product-list .product .right .add-to-cart {
  padding: 7px 0px 0px 0px;
}
.product-list .product .right .add-to-cart .button {
  display: block;
  width: 100%;
  text-align: center;
}
.product-list .product .right .action {
  display: flex;
  flex-wrap: wrap;
  padding: 25px 0px 0px 0px;
  margin: 0px;
  list-style: none;
}
@media (max-width: 1098px) {
  .product-list .product .right .action {
    padding: 20px 0px 0px 0px;
  }
}
.product-list .product .right .action li {
  margin-left: 40px;
}
@media (max-width: 1098px) {
  .product-list .product .right .action li {
    width: 100%;
    margin-left: 0px;
    margin-bottom: 4px;
    margin-top: 4px;
  }
}
.product-list .product .right .action li:first-child {
  margin-left: 0px;
}
.product-list .product .right .action li a {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  text-decoration: underline;
  display: block;
  margin-left: 28px;
  position: relative;
}
@media (max-width: 767px) {
  .product-list .product .right .action li a {
    font-size: 11px;
  }
}
.product-list .product .right .action li a span {
  position: absolute;
  top: 50%;
  left: -28px;
  transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  font-size: 15px;
  padding-right: 15px;
}
@media (max-width: 767px) {
  .product-list .product .right .action li a span {
    font-size: 14px;
  }
}  

.hurry-up {
  padding: 0px 0px 0px 0px;
  margin: -5px 0px 15px 0px;
  position: relative;
}
@media (max-width: 767px) {
  .product-info .product-center .hurry-up {
    margin-top: 0px;
  }
}
.hurry-up .heading {
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
}
@media (max-width: 767px) {
.hurry-up .heading {
    font-size: 14px;
  }
}
.hurry-up .heading span {
  color: #06bec7;
}
 .hurry-up .line {
  height: 10px;
  background: #e6e6e6;
  margin-top: 3px;
}

 .quantity {
  min-width: 100px;
  width: 155px;
  padding-right: 10px;
  position: relative;
}
@media (max-width: 991px) {
   .quantity {
    width: 200px;
  }
}
.quantity input {
  margin: 0px;
  width: 100%;
  height: 50px;
  text-align: center;
  font-size: 18px;
  text-transform: uppercase;
  font-weight: 600;
}
@media (max-width: 767px) {
  .quantity input {
    font-size: 14px;
  }
}
.quantity #q_up,
.quantity #q_down {
  display: block;
  position: absolute;
  right: 10px;
  top: 0;
  bottom: 0;
  border-left: 1px solid rgba(0, 0, 0, 0.1);
  width: 31px;
  line-height: 50px;
  text-align: center;
  font-size: 12px;
}
.quantity #q_down {
  right: auto;
  left: 0;
  border-left: none;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
}

@media screen and (max-width:1000px){


 .sale-discount{
    color: #fff;
    background-color: #ff6d00 ;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    line-height: 35px;
    height: 35px;
    width: 35px;
    border-radius: 50%;
    position: absolute;
    right: 10px;
    top: 10px;
     justify-content: center;
    align-items: center;
    text-align: center;
    transition: all .3s 
}  

.card.product-card .product-btns {
 opacity: 1;
  /*visibility: visible;*/
  display: none;
  width: 100%;
    padding: 0;
    margin: 0 auto;
    list-style: none;
    position: absolute;
    right: 0;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    transition: all .3s ease 0s 
}
  
.mobile-hide{
  display: none;
}

.comp-hide{
display: block;
 }



.coursel-img-container{
  height: 100%;
  max-width: 100%;
 }

 .card-img-top img{
  height: 150px;
  width: 100%;
}



 .coursel-img-container img{
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
    justify-content: center;
    align-items: center;
    text-align: center;
 }

 .product-old-price{
  display: none;
 }

 .star-rating, .product-title a, .text-accent{
  font-size: 10px;
 }



    }


#splash {

    position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>') 50% 50% no-repeat rgb(249, 249, 249);
  opacity: .9;

  
}


    #preloader {
      position: fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      z-index:99999; /* makes sure it stays on top */
      opacity: .9;
    }
    #prstatus {
      width:350px;
      height:300px;
      position:absolute;
      left:40%; /* centers the loading animation horizontally one the screen */
      top:30%; /* centers the loading animation vertically one the screen */
      background-image:url("<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>");
      z-index:9999; /* path to your loading animation */
      background-repeat:no-repeat;
      background-position:center;
      margin:-10px 0 0 -36px; /* is width and height divided by two */
      animation-name: heartbeat;
      animation-duration: 1.3s;
      animation-iteration-count: infinite;
      animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

@keyframes heartbeat {
  0%   { transform: scale(1);    }
  30%  { transform: scale(1);    }
  40%  { transform: scale(1.12); }
  50%  { transform: scale(1);    }
  60%  { transform: scale(1);    }
  70%  { transform: scale(1.08); }
  80%  { transform: scale(1);    }
  100% { transform: scale(1);    }
}


  </style> 
    



  </head>
  <!-- Body-->
  <body class="toolbar-enabled">

    <div id="msgs"></div>

     <div id="preloader"> 
      <div id="prstatus">
      </div> 
    </div>