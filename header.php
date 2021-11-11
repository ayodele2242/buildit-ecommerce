<?php
 
  require_once 'config/config.php';
  require_once 'config/function.php';
  require_once 'class/database.php';
  require_once 'class/category.php';
  require_once 'class/banner.php';
  require_once 'class/product.php';

  require_once 'class/ads.php';
  require_once 'class/login_register.php';
  require_once 'inc/fetch.php';
  require_once  'inc/functions.php';


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

$banner_info = $banner->getBannerForHome(25);

$ads = new Ads();
$ads_info = $ads->getAdsForHome(3);


//$category->getCategoryById($parent_id);
// $PublicIP = get_client_ip();
 //$a = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$PublicIP));
 if(isset($_SESSION['email'])){
 $email = $_SESSION['email'];
 $query = mysqli_query($mysqli,"SELECT * FROM customer_login WHERE email='$email'");
 $urow = mysqli_fetch_array($query);

//get user saved card

$cquery = mysqli_query($mysqli,"SELECT * FROM card_details WHERE email='$email'");
$card = mysqli_fetch_array($query);
 }
 ?>


<!doctype html>
<html lang="en" class="js templateIndex">
   <head>
      <link rel="shortcut icon" href="<?php echo $set['installUrl'].'assets/img/icon.png'; ?>" type="image/png">
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
      <meta name='HandheldFriendly' content='True'>
      <meta name='MobileOptimized' content='375'>
      <meta http-equiv="cleartype" content="on">
      <meta name="theme-color" content="#00abc5">
      <link rel="canonical" href="<?php echo $set['installUrl']; ?>" />
      <title><?php 
    if((isset($current_page)) && $current_page == 'index'){ echo "Buildit - No 1 online store for anything home and office"; }else{
    echo (isset($current_page)) ? ucwords(str_replace('_', ' ', $current_page)) : SITE_TITLE;
    } ?></title>
      <!-- /snippets/social-meta-tags.liquid -->
      <meta property="og:site_name" content="<?php echo $set['storeName'] ?>">
      <meta property="og:url" content="">
      <meta property="og:title" content="<?php echo $set['storeName'] ?>">
      <meta property="og:type" content="website">
      <meta property="og:description" content="<?php echo $set['storeName'] ?>">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="<?php echo $set['storeName'] ?>">
      <meta name="twitter:description" content="<?php echo $set['storeName'] ?>">
      <link rel="preconnect dns-prefetch" href="https://cdn.shopify.com">
      <link rel="preconnect dns-prefetch" href="https://v.shopify.com">
      <link rel="preconnect dns-prefetch" href="https://cdn.shopifycloud.com">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700&display=swap">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preload" href="frontpage/header-footer.scss.css?v=11657389665201175369" as="style">
      <link rel="preload" href="frontpage/global.scss.css?v=6652880004485786530" as="style">
      <link rel="preload" href="frontpage/themes.scss.css?v=13487968514205442436" as="style" >
      <link rel="preload" href="frontpage/vendor.css?v=1276759423633857822" as="style">
      <link rel="preload" href="frontpage/arenafont.css?v=6949287796738838281" as="style">
      <link rel="preload" href="frontpage/change_color.scss.css?v=7432777923311899086" as="style" >
      <link rel="stylesheet" href="frontpage/card.css">
      <!-- header-css-file  ================================================== -->
      
      <?php 
        //if($current_page == 'index'){
       ?>
      <link href="frontpage/vendor.css?v=1276759423633857822" rel="stylesheet" type="text/css" media="all"> 
      <link href="frontpage/header-footer.scss.css?v=11657389665201175369" rel="stylesheet" type="text/css" media="all">
      <link href="frontpage/global.scss.css?v=6652880004485786530" rel="stylesheet" type="text/css" media="all">
      <link href="frontpage/themes.scss.css?v=13487968514205442436" rel="stylesheet" type="text/css" media="all">
   <?php //}else{ ?>
     
      
      <link href="frontpage/arenafont.css?v=6949287796738838281" rel="stylesheet" type="text/css" media="all">
      <link href="frontpage/change_color.scss.css?v=7432777923311899086" rel="stylesheet" type="text/css" media="all">
      <link href="frontpage/rating.css" rel="stylesheet" type="text/css" media="all">
      <link href="frontpage/custom.css" rel="stylesheet" type="text/css" media="all">
      <script crossorigin="anonymous" async src="frontpage/lazysizes.min.js?v=1994455175960804149"></script>
      <link type="text/css" rel="stylesheet" href="<?php echo $set['installUrl']; ?>assets/main/css/color.css" />
      <link href="css/placeholder-loading.css" rel="stylesheet">
      
      <link href="assets/css/modal.css" rel="stylesheet" type="text/css" media="all">
      <link href="frontpage/scrollbar.css" rel="stylesheet" type="text/css" media="all">
      <link href="styles.scss.css?v=1380377356575221082" rel="stylesheet" type="text/css" media="all">
       <link href="frontpage/styles-2.scss.css?v=1380377356575221082" rel="stylesheet" type="text/css" media="all">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" rel="stylesheet" type="text/css" media="all"> 
       <link href="frontpage/jquery-ui.css" rel="stylesheet">
      <link href="<?php echo $set['installUrl']; ?>assets/css/easy-responsive-tabs.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" defer></script>
      <script>var loox_global_hash = '1615380474526';</script>
      <script>var loox_widgeton_caret = {"visible":true};</script>
      <style>
      .loox-reviews-default { max-width: 1200px; margin: 0 auto; }
      .loox-rating .loox-icon { color:#00abc5; }
      .loox-rating .loox-icon.loox-caret { color:#333; cursor: pointer; }
      </style>
      
     
      <style type="text/css">
         :root {
         --arn-add-wishlist-icon-color: #878787;
         --arn-add-wishlist-icon-active-color: #00abc5;
         --arn-show-wishlist-icon-color: #333e48;
         --arn-remove-wishlist-icon-color: #000000;
         --arn-add-compare-icon-color: #878787;
         --arn-add-compare-icon-active-color: #00abc5;
         --arn-show-compare-icon-color: #333e48;
         --arn-remove-compare-icon-color: #000000;
         --arn-preloader-icon-color: #43467F;
         --arn-outstock-color: #ff0000;
         --arn-instock-color: #2D882D;
         --arn-table-heading-bkg: #cecece;
         --arn-table-text-color-1: #000000;
         --arn-table-text-color-2: #ffffff;
         --arn-table-btn-border-color: #000000;
         --arn-table-btn-color: #ffffff;
         --arn-table-btn-active-color: #000000;
         --arn-table-product-heading: "Product Name";
         --arn-table-price-heading: "Price";
         --arn-table-image-heading: "Image";
         --arn-table-price-heading: "Price";
         --arn-table-available-heading: "Available";
         --arn-table-delete-heading: "Delete";
         --bg-sidenav: #fff;
         --link-color: #000;
         --font-size-title: 15px;
         --button-add-bg: #00abc5;
         --button-add-cl: #fff;
         --button-add-br: #00abc5;
         --button-add-hover-bg: #00abc5;
         --button-add-hover-cl: #fff;
         --button-add-hover-br: #00abc5;
         --button-remove-bg: #000;
         --button-remove-cl: #fff;
         --button-remove-br: #000;
         --button-remove-hover-bg: #000;
         --button-remove-hover-cl: #fff;
         --button-remove-hover-br: #000;
         --button-border-radius: 20px;
         }
         @-webkit-keyframes arn_rotating {
         from {
         -webkit-transform: rotate(0deg);
         -o-transform: rotate(0deg);
         transform: rotate(0deg);
         }
         to {
         -webkit-transform: rotate(360deg);
         -o-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
         @keyframes arn_rotating {
         from {
         -ms-transform: rotate(0deg);
         -moz-transform: rotate(0deg);
         -webkit-transform: rotate(0deg);
         -o-transform: rotate(0deg);
         transform: rotate(0deg);
         }
         to {
         -ms-transform: rotate(360deg);
         -moz-transform: rotate(360deg);
         -webkit-transform: rotate(360deg);
         -o-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
         *[data-arn-action] {
         display: inline-block;
         position: relative;
         z-index: 10;
         }
         *[data-arn-action] .arn_icon-add-wishlist {
         fill: var(--arn-add-wishlist-icon-color);
         }
         *[data-arn-action] .arn_icon-show-wishlist {
         fill: var(--arn-show-wishlist-icon-color);
         }
         *[data-arn-action] .arn_icon-remove-wishlist {
         fill: var(--arn-remove-wishlist-icon-color);
         }
         *[data-arn-action] .arn_icon-add-compare {
         fill: var(--arn-add-compare-icon-color);
         }
         *[data-arn-action] .arn_icon-show-compare {
         fill: var(--arn-show-compare-icon-color);
         }
         *[data-arn-action] .arn_icon-remove-compare {
         fill: var(--arn-remove-compare-icon-color);
         }
         *[data-arn-action].arn_added .arn_icon-add-wishlist {
         fill: var(--arn-add-wishlist-icon-active-color);
         }
         *[data-arn-action].arn_added .arn_icon-add-compare {
         fill: var(--arn-add-compare-icon-active-color);
         }
         *[data-arn-action].icon-4 .arn_icon-add-wishlist {
         fill: none;
         stroke: var(--arn-add-wishlist-icon-color);
         }
         *[data-arn-action].icon-4 .arn_icon-show-wishlist {
         fill: none;
         stroke: var(--arn-show-wishlist-icon-color);
         }
         *[data-arn-action].icon-4.arn_added .arn_icon-add-wishlist {
         fill: none;
         stroke: var(--arn-add-wishlist-icon-active-color);
         }
         *[data-arn-action].icon-9 .arn_icon-add-compare {
         fill: none;
         stroke: var(--arn-add-compare-icon-color);
         }
         *[data-arn-action].icon-9 .arn_icon-show-compare {
         fill: none;
         stroke: var(--arn-show-compare-icon-color);
         }
         *[data-arn-action].icon-9.arn_added .arn_icon-add-compare {
         fill: none;
         stroke: var(--arn-add-compare-icon-active-color);
         }
         *[data-arn-action] .arn_icon-preloader {
         display: none;
         -webkit-animation: arn_rotating 2s linear infinite;
         -moz-animation: arn_rotating 2s linear infinite;
         -ms-animation: arn_rotating 2s linear infinite;
         -o-animation: arn_rotating 2s linear infinite;
         animation: arn_rotating 2s linear infinite;
         }
         *[data-arn-action].disabled {
         opacity: 0.5;
         }
         *[data-arn-action].arn_pending {
         pointer-events: none;
         }
         *[data-arn-action].arn_pending .arn_icon,
         *[data-arn-action].arn_pending .number {
         display: none;
         }
         *[data-arn-action].arn_pending .arn_icon.arn_icon-preloader {
         display: block;
         }
         .arn_icon-preloader {
         fill: var(--arn-preloader-icon-color);
         }
         .arn-wishlist-page {
         overflow-x: auto;
         }
         .arn-wishlist-page.arn_wl_pending .no-wishlist-msg {
         display: none;
         }
         .arn-wishlist-page .page-title {
         margin: 30px 0;
         }
         .arn-wishlist-page table + .arn_icon-preloader {
         display: none;
         position: absolute;
         left: 50%;
         top: 50%;
         margin-left: -32px;
         margin-top: -16px;
         -webkit-animation: arn_rotating 2s linear infinite;
         -moz-animation: arn_rotating 2s linear infinite;
         -ms-animation: arn_rotating 2s linear infinite;
         -o-animation: arn_rotating 2s linear infinite;
         animation: arn_rotating 2s linear infinite;
         }
         .arn-wishlist-page table.arn_pending {
         display: block;
         position: relative;
         height: 150px;
         overflow: hidden;
         }
         .arn-wishlist-page table.arn_pending thead,
         .arn-wishlist-page table.arn_pending tbody {
         visibility: hidden;
         }
         .arn-wishlist-page table.arn_pending + .arn_icon-preloader {
         display: block;
         }
         .arn-wishlist-page table th,
         .arn-wishlist-page table td {
         text-align: left;
         white-space: normal;
         padding: 15px 20px;
         border-color: var(--arn-table-heading-bkg);
         }
         .arn-wishlist-page table th.product-image,
         .arn-wishlist-page table td.product-image {
         min-width: 100px;
         }
         .arn-wishlist-page table th.product-title,
         .arn-wishlist-page table td.product-title {
         color: var(--arn-table-text-color-1);
         }
         .arn-wishlist-page table th.product-price,
         .arn-wishlist-page table td.product-price {
         color: var(--arn-table-text-color-1);
         }
         .arn-wishlist-page table th.product-available .instock,
         .arn-wishlist-page table td.product-available .instock {
         color: var(--arn-instock-color);
         }
         .arn-wishlist-page table th.product-available .outstock,
         .arn-wishlist-page table td.product-available .outstock {
         color: var(--arn-outestock-color);
         }
         .arn-wishlist-page table th.product-remove-btn,
         .arn-wishlist-page table td.product-remove-btn {
         padding-left: 0;
         padding-right: 0;
         }
         .arn-wishlist-page table th.product-detail .view-btn,
         .arn-wishlist-page table td.product-detail .view-btn {
         display: inline-block;
         padding: 10px 15px;
         line-height: 1;
         border: 1px solid var(--arn-table-btn-border-color);
         background: var(--arn-table-btn-color);
         font-size: 15px;
         color: var(--arn-table-text-color-1);
         }
         .arn-wishlist-page table th.product-detail .view-btn:hover,
         .arn-wishlist-page table td.product-detail .view-btn:hover {
         color: var(--arn-table-text-color-2);
         background: var(--arn-table-btn-active-color);
         }
         .arn-wishlist-page table th {
         background: var(--arn-table-heading-bkg);
         font-weight: bold;
         color: var(--arn-table-text-color-2);
         }
         .arn-wishlist-page table .wishlist-item {
         position: relative;
         }
         .arn-wishlist-page table .wishlist-item:last-child td {
         border-bottom: none;
         }
         .arn-wishlist-page .wishlist-paginator {
         text-align: center;
         font-size: 0;
         margin-top: 15px;
         }
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item {
         display: inline-block;
         width: 30px;
         height: 30px;
         line-height: 30px;
         background: #cecece;
         margin: 0 3px;
         font-size: 1rem;
         }
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item > a,
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item > span {
         color: #fff;
         user-select: none;
         display: block;
         width: 100%;
         height: 100%;
         }
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item > a:hover,
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item > span:hover,
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item > a:active,
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item > span:active {
         text-decoration: none;
         }
         .arn-wishlist-page .wishlist-paginator .wishlist-paging--item.active {
         background: #000;
         }
         @media (max-width: 767px) {
         .arn-wishlist-page table,
         .arn-wishlist-page thead,
         .arn-wishlist-page tbody,
         .arn-wishlist-page th,
         .arn-wishlist-page td,
         .arn-wishlist-page tr {
         display: block;
         border: none;
         }
         .arn-wishlist-page table tr {
         padding: 10px 0;
         border-bottom: 1px solid var(--arn-table-heading-bkg);
         }
         .arn-wishlist-page table tr:last-child {
         border: none;
         }
         .arn-wishlist-page table thead tr {
         display: none;
         }
         .arn-wishlist-page table td {
         position: relative;
         padding: 10px 10px 10px 25% !important;
         text-align: center;
         }
         .arn-wishlist-page table td:before {
         position: absolute;
         top: 50%;
         left: 0;
         width: 25%;
         padding-right: 10px;
         white-space: normal;
         font-weight: bold;
         font-size: 15px;
         color: var(--arn-table-heading-bkg);
         transform: translate(0, -50%);
         }
         .arn-wishlist-page table td.product-title:before {
         content: var(--arn-table-product-heading);
         }
         .arn-wishlist-page table td.product-image:before {
         content: var(--arn-table-image-heading);
         }
         .arn-wishlist-page table td.product-remove-btn:before {
         content: var(--arn-table-delete-heading);
         }
         .arn-wishlist-page table td.product-price:before {
         content: var(--arn-table-price-heading);
         }
         .arn-wishlist-page table td.product-available:before {
         content: var(--arn-table-available-heading);
         }
         }
         /*== COMPARE PAGE ==*/
         .page-arn-compare .page-title {
         margin: 30px 0 30px;
         }
         .page-arn-compare .no-compare-msg {
         display: none;
         }
         .page-arn-compare .compare-table .product-comparison-template-wrapper {
         padding-top: 0;
         }
         .page-arn-compare .compare-table + .arn_icon-preloader {
         display: none;
         position: absolute;
         left: 50%;
         top: 50%;
         margin-left: -32px;
         margin-top: -16px;
         -webkit-animation: arn_rotating 2s linear infinite;
         -moz-animation: arn_rotating 2s linear infinite;
         -ms-animation: arn_rotating 2s linear infinite;
         -o-animation: arn_rotating 2s linear infinite;
         animation: arn_rotating 2s linear infinite;
         }
         .page-arn-compare .compare-table.arn_pending {
         display: block;
         position: relative;
         min-height: 300px;
         overflow: hidden;
         background-color: #f2f2f2;
         }
         .page-arn-compare .compare-table.arn_pending + .arn_icon-preloader {
         display: block;
         }
         .arn_cp_pending .page-arn-compare {
         position: relative;
         min-height: 150px;
         }
         .arn_cp_pending .page-arn-compare .arn_icon-preloader {
         display: block;
         }
         table.product_comparison_template {
         border: none;
         border-collapse: collapse;
         border-spacing: 0;
         background: #fff;
         margin-bottom: 0;
         }
         table.product_comparison_template tr {
         display: flex;
         flex-wrap: wrap;
         justify-content: flex-end;
         }
         table.product_comparison_template tr td {
         padding: 10px 15px;
         border: 1px solid var(--arn-table-heading-bkg);
         position: static;
         flex: 1 0 0;
         }
         table.product_comparison_template tr td.heading-col {
         flex: 0 0 15%;
         word-break: break-all;
         }
         @media (max-width: 1023px) {
         table.product_comparison_template.cols_4 tr td:not(.heading-col) {
         position: relative;
         flex: 0 0 42.5%;
         }
         }
         @media (max-width: 767px) {
         table.product_comparison_template tr td {
         position: relative;
         flex: 0 0 100% !important;
         border: none;
         }
         }
         table.product_comparison_template tr td.comparison_options,
         table.product_comparison_template tr td.wishlist_options {
         word-break: break-all;
         }
         table.product_comparison_template tr td.comparison_options .line,
         table.product_comparison_template tr td.wishlist_options .line {
         display: block;
         padding: 0 0 5px;
         }
         table.product_comparison_template tr td.comparison_options .line > label,
         table.product_comparison_template tr td.wishlist_options .line > label {
         margin: 0;
         display: inline-block;
         padding: 0 15px 0 0;
         position: relative;
         color: var(--arn-table-text-color-2);
         }
         table.product_comparison_template tr td.comparison_options .line > label:after,
         table.product_comparison_template tr td.wishlist_options .line > label:after {
         content: ":";
         }
         table.product_comparison_template tr .spr-header-title {
         display: none;
         }
         table.product_comparison_template tr .spr-summary-starrating,
         table.product_comparison_template tr .spr-summary-caption {
         display: block;
         }
         table.product_comparison_template tr .spr-summary-actions {
         display: inline-block;
         margin-top: 5px;
         }
         table.product_comparison_template tr .view-btn {
         display: inline-block;
         padding: 10px 15px;
         line-height: 1;
         border: 1px solid var(--arn-table-btn-border-color);
         background: var(--arn-table-btn-color);
         font-size: 15px;
         color: var(--arn-table-text-color-1);
         }
         table.product_comparison_template tr .view-btn:hover {
         color: var(--arn-table-text-color-2);
         background: var(--arn-table-btn-active-color);
         }
         table.product_comparison_template .heading-col {
         text-align: left;
         background: var(--arn-table-heading-bkg);
         color: var(--arn-table-text-color-2);
         font-size: 15px;
         text-transform: uppercase;
         font-weight: bold;
         }
         table.product_comparison_template .product-col {
         text-align: center;
         position: relative;
         }
         table.product_comparison_template .product-col .spr-icon {
         top: -3px;
         }
         table.product_comparison_template .product-col .remove {
         position: absolute;
         left: 10px;
         top: 10px a;
         top-font-size: 18px;
         }
         table.product_comparison_template .product-col .product-price {
         padding: 0;
         }
         table.product_comparison_template .product-col .product-image-block {
         margin: 0px auto;
         width: 135px;
         }
         table.product_comparison_template .product-col .product-name {
         margin: 15px auto 10px;
         text-transform: none;
         letter-spacing: 0;
         font-size: 15px;
         }
         table.product_comparison_template .product-col .product-price .price-compare {
         margin: 0 15px 0 0;
         }
         table.product_comparison_template .product-col .comparison_product_infos,
         table.product_comparison_template .product-col .wishlist_product_infos {
         padding: 0 0 10px;
         }
         table.product_comparison_template .product-col .comparison_product_infos .btn,
         table.product_comparison_template .product-col .wishlist_product_infos .btn {
         margin: 10px auto 0;
         padding: 6px 20px;
         min-width: 155px;
         }
         table.product_comparison_template .product-col .comparison_availability_statut {
         margin: 0px;
         }
         table.product_comparison_template .product-col.comparison_collection {
         word-break: break-word;
         }
         table.product_comparison_template .product-col.comparison_collection > a:last-child .separator {
         display: none;
         }
         .arn-compare-md {
         z-index: 9999;
         }
         /*== CANVAS PAGE ==*/
         @-webkit-keyframes spin {
         0% {
         -webkit-transform: rotate(0deg);
         }
         100% {
         -webkit-transform: rotate(360deg);
         }
         }
         @keyframes spin {
         0% {
         transform: rotate(0deg);
         }
         100% {
         transform: rotate(360deg);
         }
         }
         @keyframes fadeInDown {
         0% {
         opacity: 0;
         transform: translateY(30px);
         }
         100% {
         opacity: 1;
         transform: translateY(0);
         }
         }
         body.wishlist-opened {
         overflow: hidden;
         }
         .wl_sidebar .sidenav {
         position: fixed;
         top: 0;
         right: 0;
         height: 100%;
         padding: 0;
         opacity: 0;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
         z-index: 99992;
         visibility: hidden;
         transform: translateX(400px);
         transition: all 0.45s ease-in-out;
         background: var(--bg-sidenav);
         }
         .wl_sidebar.active .sidenav {
         opacity: 1;
         visibility: visible;
         transform: translateX(0);
         }
         .wl_sidebar.active .bg_slidebar {
         position: fixed;
         top: 0;
         right: 0;
         width: 100vw;
         height: 100vh;
         z-index: 99990;
         background: rgba(0, 0, 0, 0.6);
         transition: all 0.45s ease-in-out 0s;
         }
         .wl_sidebar .bg {
         display: none;
         }
         .wishlist-content {
         position: relative;
         }
         .wl_sidebar .loader {
         border: 5px solid #f3f3f3;
         border-radius: 50%;
         border-top: 5px solid #000;
         width: 30px;
         height: 30px;
         position: absolute;
         left: 50%;
         top: 35%;
         transform: translate(-50%, 0);
         -webkit-animation: spin 2s linear infinite;
         animation: spin 2s linear infinite;
         }
         .wl_sidebar .wl-cart-head {
         padding: 10px 0 10px 15px;
         display: flex;
         align-items: center;
         justify-content: space-between;
         }
         .wl_sidebar .closebtn {
         position: static;
         width: 40px;
         height: 40px;
         display: flex;
         align-items: center;
         justify-content: center;
         }
         .wl_sidebar .closebtn svg {
         fill: var(--link-color);
         width: 13px;
         height: 13px;
         }
         .wl_sidebar .wl-cart-head h3 a {
         position: relative;
         display: flex;
         justify-content: center;
         color: inherit;
         text-transform: uppercase;
         font-size: var(--font-size-title);
         }
         .wl_sidebar .wl-cart-head .number_wl {
         display: block;
         line-height: 15px;
         text-align: center;
         font-size: 11px;
         font-weight: 700;
         margin-left: 5px;
         }
         .wl_sidebar .wl-cart-body {
         overflow: hidden;
         overflow-y: auto;
         max-height: calc(100vh - 100px);
         }
         .wl_sidebar .wl-cart-body .text {
         display: flex;
         justify-content: center;
         }
         .wl_sidebar .wl-cart-body::-webkit-scrollbar {
         width: 2px;
         background: #eee;
         }
         .wl_sidebar .wl-cart-body::-webkit-scrollbar-thumb {
         background: #000000;
         }
         .wl_sidebar .wl-cart-body-inner {
         padding: 0 10px;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:not(:last-child) {
         margin-bottom: 25px;
         padding-bottom: 20px;
         border-bottom: 1px solid #eee;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block {
         animation: fadeInDown 0.4s both;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block .wishlist-content {
         display: flex;
         flex-wrap: nowrap;
         margin: 0;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block .wishlist-image {
         flex: 0 0 80px;
         max-width: 80px;
         padding: 0;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block .wishlist-info {
         flex: 1;
         max-width: none;
         padding: 0;
         }
         .wl_sidebar .featured_product__item-info {
         margin: 0 !important;
         padding-left: 10px;
         }
         .wl_sidebar .image__style {
         padding-bottom: 100%;
         position: relative;
         display: block;
         }
         .wl_sidebar .image__style img {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         object-fit: contain;
         }
         .wl_sidebar .featured_product__item-info h6 {
         margin-bottom: 15px;
         display: block;
         line-height: 1.3;
         font-size: var(--font-size-title);
         }
         .wl_sidebar .featured_product__item-info .qty-select {
         height: 30px;
         max-width: 105px;
         padding: 0 10px;
         margin-bottom: 15px;
         display: flex;
         align-items: center;
         justify-content: space-between;
         border: 1px solid #eee;
         border-radius: var(--button-border-radius);
         }
         .wl_sidebar .featured_product__item-info .qty-minus,
         .wl_sidebar .featured_product__item-info .qty-plus {
         height: 100%;
         width: 15px;
         display: flex;
         align-items: center;
         justify-content: center;
         flex-direction: column;
         position: static;
         }
         .wl_sidebar .featured_product__item-info input {
         height: 100%;
         text-align: center;
         overflow: hidden;
         max-width: calc(100% - 30px);
         padding: 0 7px;
         display: block;
         border: none;
         margin: 0;
         background: transparent;
         }
         .wl_sidebar .featured_product__item-info select {
         height: 30px;
         line-height: 1.3;
         padding-left: 15px;
         margin-bottom: 15px;
         text-align: center;
         min-width: 105px;
         max-width: calc(100% - 10px);
         border-radius: var(--button-border-radius);
         }
         .wl_sidebar .featured_product__item-info .instock {
         margin: 0 0 10px;
         }
         .wl_sidebar .featured_product__item-info .general-button {
         display: flex;
         justify-content: space-between;
         align-items: center;
         flex-wrap: wrap;
         margin: 0 -5px;
         width: calc(100% - 5px);
         }
         .wl_sidebar .featured_product__item-info button,
         .wl_sidebar .featured_product__item-info .wl-remove-item {
         line-height: 1.3;
         padding: 10px 15px;
         margin: 5px 5px;
         flex: 1;
         text-align: center;
         border-radius: var(--button-border-radius);
         }
         .wl_sidebar .featured_product__item-info button {
         background: var(--button-add-bg);
         color: var(--button-add-cl);
         border: 1px solid var(--button-add-br);
         }
         .wl_sidebar .featured_product__item-info button:hover {
         background: var(--button-add-hover-bg);
         color: var(--button-add-hover-cl);
         border: 1px solid var(--button-add-hover-br);
         }
         .wl_sidebar .featured_product__item-info .wl-remove-item {
         background: var(--button-remove-bg);
         color: var(--button-remove-cl);
         border: 1px solid var(--button-remove-br);
         }
         .wl_sidebar .featured_product__item-info .wl-remove-item:hover {
         background: var(--button-remove-hover-bg);
         color: var(--button-remove-hover-cl);
         border: 1px solid var(--button-remove-hover-br);
         }
         .wl_sidebar .featured_product__item-info input:focus {
         background: transparent;
         border: none;
         box-shadow: none;
         }
         .wl_sidebar .wishlist-content + .arn_icon-preloader {
         display: none;
         position: absolute;
         left: 50%;
         top: 50%;
         margin-left: -32px;
         margin-top: -16px;
         -webkit-animation: arn_rotating 2s linear infinite;
         -moz-animation: arn_rotating 2s linear infinite;
         -ms-animation: arn_rotating 2s linear infinite;
         -o-animation: arn_rotating 2s linear infinite;
         animation: arn_rotating 2s linear infinite;
         }
         .wl_sidebar .wishlist-content.arn_pending {
         display: none;
         position: relative;
         height: 150px;
         overflow: hidden;
         }
         .wl_sidebar .wishlist-content.arn_pending + .arn_icon-preloader {
         display: block;
         }
         .btn-clear-unavailable{
         margin-bottom: 10px;
         margin-left: 10px;
         }
         /*=== Mobile ==*/
         @media (max-width: 767px) {
         .wl_sidebar.active .sidenav {
         width: 90% !important;
         }
         }
         /*=== Animation block ===*/
         .wl_sidebar .wl-cart-body-inner .cart-item-block:first-child {
         animation-delay: 0.1s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(2) {
         animation-delay: 0.2s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(3) {
         animation-delay: 0.3s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(4) {
         animation-delay: 0.4s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(5) {
         animation-delay: 0.5s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(6) {
         animation-delay: 0.6s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(7) {
         animation-delay: 0.7s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(8) {
         animation-delay: 0.8s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(9) {
         animation-delay: 0.9s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(10) {
         animation-delay: 1s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(11) {
         animation-delay: 1.1s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(12) {
         animation-delay: 1.2s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(13) {
         animation-delay: 1.3s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(14) {
         animation-delay: 1.4s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(15) {
         animation-delay: 1.5s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(16) {
         animation-delay: 1.6s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(17) {
         animation-delay: 1.7s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(18) {
         animation-delay: 1.8s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(19) {
         animation-delay: 1.9s;
         }
         .wl_sidebar .wl-cart-body-inner .cart-item-block:nth-child(20) {
         animation-delay: 2s;
         }

         .loadingCategories{
        font-weight: bold;
        padding: 10px;
        height: 100%;
        min-height: 200px;
        margin: 0 auto;
        margin-bottom: 10px;
        background: url(gif/load-sm.gif) no-repeat center center;  
        text-align: center;
        display: block;
      }

      .loadingOverlay{
        font-weight: bold;
        padding: 10px;
        height: 100%;
        max-height: 500px;
        width: 100%
        max-width: 500px;
        margin: 0 auto;
        margin-bottom: 10px;
        background: url(gif/load-sm.gif) no-repeat center center;  
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


      .pagination {
  margin-bottom: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  }
  
  .page-link {
  position: relative;
  transition: color 0.25s ease-in-out, border-color 0.25s ease-in-out, background-color 0.25s ease-in-out;
  }
  
  .page-link.page-link-static:hover {
  border-color: transparent;
  background-color: transparent;
  color: #4b566b;
  }
  
  .page-link > i {
  margin-top: -.125rem;
  vertical-align: middle;
  }
  
  .page-item {
  margin: .15rem;
  }
  
  .page-item.active {
  position: relative;
  z-index: 5;
  cursor: default;
  }
  
  .page-item.active > .page-link {
  box-shadow: 0 0.5rem 1.125rem -0.425rem rgba(254, 105, 106, 0.9);
  }

  
.page-item:first-child .page-link {
  margin-left: 0;
  border-top-left-radius: 0.3125rem;
  border-bottom-left-radius: 0.3125rem;
  }
  
  .page-item:last-child .page-link {
  border-top-right-radius: 0.3125rem;
  border-bottom-right-radius: 0.3125rem;
  }
  
  .page-item.active .page-link {
  z-index: 3;
  color: #fff;
  background-color: #2196F3;
  border-color: transparent;
  }
  
  .page-item.disabled .page-link {
  color: #7d879c;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
  border-color: #e3e9ef;
  }
  
  .pagination-lg .page-link {
  padding: 0.425rem 1rem;
  font-size: 1.125rem;
  line-height: 1.5;
  }
  
  .pagination-lg .page-item:first-child .page-link {
  border-top-left-radius: 0.4375rem;
  border-bottom-left-radius: 0.4375rem;
  }
  
  .pagination-lg .page-item:last-child .page-link {
  border-top-right-radius: 0.4375rem;
  border-bottom-right-radius: 0.4375rem;
  }
  
  .pagination .page-link {
  border-radius: 0.3125rem;
  font-size: 0.9375rem;
  }
  
  .pagination-sm .page-link {
  border-radius: 0.1875rem;
  font-size: 0.8125rem;
  }
  
  .pagination-lg .page-link {
  border-radius: 0.4375rem;
  font-size: 1rem;
  }
  
      </style>
      <svg xmlnsXlink="http://www.w3.org/2000/svg" style="display: none;"">
         <symbol id="arn_icon-add-wishlist" viewBox="0 0 26 22">
            <title>add wishlist</title>
            <path d="M23.8185 6.71922C23.8185 5.93296 23.716 5.24926 23.5109 4.66811C23.3058 4.08696 23.0408 3.61691 22.7161 3.25797C22.3913 2.89902 21.9982 2.617 21.5367 2.41189C21.0752 2.20678 20.6308 2.05294 20.2034 1.95039C19.7761 1.84783 19.3061 1.81365 18.7933 1.84783C18.2805 1.88202 17.7507 2.00166 17.2037 2.20677C16.6567 2.41189 16.1269 2.71955 15.6141 3.12978C15.1013 3.54 14.6911 3.88185 14.3834 4.15533C14.0758 4.42881 13.7852 4.71939 13.5117 5.02705C13.3408 5.24926 13.11 5.36036 12.8194 5.36036C12.5289 5.36036 12.2981 5.24926 12.1272 5.02705C11.8879 4.77066 11.5973 4.48009 11.2555 4.15533C10.9136 3.83057 10.5034 3.48872 10.0248 3.12978C9.54622 2.77083 9.01634 2.46316 8.4352 2.20677C7.85405 1.95039 7.32418 1.83074 6.84558 1.84783C6.36699 1.86492 5.89695 1.89911 5.43545 1.95039C4.97395 2.00166 4.52954 2.1555 4.10222 2.41189C3.67491 2.66828 3.28178 2.9503 2.92283 3.25797C2.56389 3.56564 2.29895 4.03568 2.12803 4.66811C1.9571 5.30054 1.85455 5.98424 1.82036 6.71922C1.82036 8.30883 2.71772 10.001 4.51245 11.7957L12.8194 19.7951L21.1264 11.7957C22.9212 10.001 23.8185 8.30883 23.8185 6.71922ZM25.6389 6.71922C25.6389 8.82161 24.545 10.9667 22.3571 13.1546L13.4604 21.7436C13.2895 21.9145 13.0758 22 12.8194 22C12.5631 22 12.3494 21.9145 12.1785 21.7436L3.25614 13.1289L2.87156 12.7444C2.70063 12.5734 2.43569 12.2572 2.07675 11.7957C1.71781 11.3342 1.39305 10.8727 1.10247 10.4112C0.811898 9.94972 0.555509 9.37712 0.333306 8.69341C0.111102 8.00971 0 7.35164 0 6.71922C0 4.61683 0.606787 2.97594 1.82036 1.79655C3.03394 0.617164 4.70901 0.018924 6.84558 0.00183139C7.42673 0.00183139 8.02497 0.104384 8.64031 0.309495C9.25564 0.514607 9.82824 0.796636 10.3581 1.15558C10.888 1.51452 11.3495 1.83928 11.7426 2.12986C12.1357 2.42043 12.4947 2.74519 12.8194 3.10414C13.1613 2.76228 13.5202 2.43752 13.8963 2.12986C14.2723 1.82219 14.7338 1.49743 15.2808 1.15558C15.8277 0.813728 16.4003 0.531699 16.9986 0.309495C17.5968 0.0872916 18.1951 -0.0152612 18.7933 0.00183139C20.9299 0.00183139 22.605 0.600071 23.8185 1.79655C25.0321 2.99303 25.6389 4.63392 25.6389 6.71922Z" />
         </symbol>
         <symbol id="arn_icon-show-wishlist" viewBox="0 0 26 22">
            <title>show wishlist</title>
            <path d="M23.8185 6.71922C23.8185 5.93296 23.716 5.24926 23.5109 4.66811C23.3058 4.08696 23.0408 3.61691 22.7161 3.25797C22.3913 2.89902 21.9982 2.617 21.5367 2.41189C21.0752 2.20678 20.6308 2.05294 20.2034 1.95039C19.7761 1.84783 19.3061 1.81365 18.7933 1.84783C18.2805 1.88202 17.7507 2.00166 17.2037 2.20677C16.6567 2.41189 16.1269 2.71955 15.6141 3.12978C15.1013 3.54 14.6911 3.88185 14.3834 4.15533C14.0758 4.42881 13.7852 4.71939 13.5117 5.02705C13.3408 5.24926 13.11 5.36036 12.8194 5.36036C12.5289 5.36036 12.2981 5.24926 12.1272 5.02705C11.8879 4.77066 11.5973 4.48009 11.2555 4.15533C10.9136 3.83057 10.5034 3.48872 10.0248 3.12978C9.54622 2.77083 9.01634 2.46316 8.4352 2.20677C7.85405 1.95039 7.32418 1.83074 6.84558 1.84783C6.36699 1.86492 5.89695 1.89911 5.43545 1.95039C4.97395 2.00166 4.52954 2.1555 4.10222 2.41189C3.67491 2.66828 3.28178 2.9503 2.92283 3.25797C2.56389 3.56564 2.29895 4.03568 2.12803 4.66811C1.9571 5.30054 1.85455 5.98424 1.82036 6.71922C1.82036 8.30883 2.71772 10.001 4.51245 11.7957L12.8194 19.7951L21.1264 11.7957C22.9212 10.001 23.8185 8.30883 23.8185 6.71922ZM25.6389 6.71922C25.6389 8.82161 24.545 10.9667 22.3571 13.1546L13.4604 21.7436C13.2895 21.9145 13.0758 22 12.8194 22C12.5631 22 12.3494 21.9145 12.1785 21.7436L3.25614 13.1289L2.87156 12.7444C2.70063 12.5734 2.43569 12.2572 2.07675 11.7957C1.71781 11.3342 1.39305 10.8727 1.10247 10.4112C0.811898 9.94972 0.555509 9.37712 0.333306 8.69341C0.111102 8.00971 0 7.35164 0 6.71922C0 4.61683 0.606787 2.97594 1.82036 1.79655C3.03394 0.617164 4.70901 0.018924 6.84558 0.00183139C7.42673 0.00183139 8.02497 0.104384 8.64031 0.309495C9.25564 0.514607 9.82824 0.796636 10.3581 1.15558C10.888 1.51452 11.3495 1.83928 11.7426 2.12986C12.1357 2.42043 12.4947 2.74519 12.8194 3.10414C13.1613 2.76228 13.5202 2.43752 13.8963 2.12986C14.2723 1.82219 14.7338 1.49743 15.2808 1.15558C15.8277 0.813728 16.4003 0.531699 16.9986 0.309495C17.5968 0.0872916 18.1951 -0.0152612 18.7933 0.00183139C20.9299 0.00183139 22.605 0.600071 23.8185 1.79655C25.0321 2.99303 25.6389 4.63392 25.6389 6.71922Z" />
         </symbol>
         <symbol id="arn_icon-remove-wishlist" viewBox="0 0 32 32">
            <title>Delete</title>
            <path d="M6 32h20l2-22h-24zM20 4v-4h-8v4h-10v6l2-2h24l2 2v-6h-10zM18 4h-4v-2h4v2z"></path>
         </symbol>
         <symbol id="arn_icon-add-compare" viewBox="3.857 -48.75 22.7255 22.5">
            <title>add compare</title>
            <path d="M11.4258,-43.1836q2.02148,-0.117188 4.29199,-0.0146484q2.27051,0.102539 4.55566,0.0146484v2.98828q0.996094,-0.908203 2.02148,-2.05078q1.02539,-1.14258 2.13867,-2.16797q-0.996094,-1.08398 -2.00684,-2.19727q-1.01074,-1.11328 -2.03613,-2.13867q0,0.644531 0,1.47949q0,0.834961 0,1.50879q-2.37305,0.117188 -4.57031,0.0146484q-2.19727,-0.102539 -4.10156,-0.0146484q-1.78711,0 -3.2373,0.688477q-1.4502,0.688477 -2.3291,1.71387q-0.673828,0.673828 -1.23047,1.69922q-0.556641,1.02539 -0.834961,2.25586q-0.27832,1.23047 -0.219727,2.54883q0.0585938,1.34766 0.644531,2.63672q0.556641,-0.439453 1.04004,-0.981445q0.483398,-0.541992 1.06934,-1.12793q-0.292969,-1.40625 0,-2.63672q0.292969,-1.23047 0.981445,-2.15332q0.688477,-0.922852 1.68457,-1.47949q0.996094,-0.527344 2.13867,-0.585938Zm14.5312,2.51953q-0.351562,0.351562 -1.14258,1.05469q-0.791016,0.703125 -0.791016,1.05469q0,0.205078 0.0585938,0.424805q0.0585938,0.219727 0.0585938,0.454102q0,2.37305 -1.4209,4.07227q-1.4209,1.69922 -3.67676,1.78711q-0.9375,0.0585938 -2.02148,0.0585938q-1.08398,0 -2.22656,-0.0292969q-1.14258,-0.0292969 -2.31445,-0.0585938q-1.17188,0 -2.28516,0.0292969v-2.98828q-0.996094,0.996094 -2.09473,2.10938q-1.09863,1.11328 -2.12402,2.22656q0.908203,0.908203 1.88965,1.88965q0.981445,0.981445 1.86035,1.86035q0.117188,0.117188 0.249023,0.292969q0.131836,0.175781 0.219727,0.175781q0,-0.644531 0,-1.47949q0,-0.834961 0,-1.50879q2.37305,-0.117188 4.58496,-0.0146484q2.21191,0.102539 4.14551,0.0146484q1.66992,-0.117188 3.01758,-0.834961q1.34766,-0.717773 2.37305,-1.74316q0.644531,-0.615234 1.20117,-1.58203q0.556641,-0.966797 0.834961,-2.15332q0.27832,-1.18652 0.219727,-2.50488q-0.0585938,-1.31836 -0.615234,-2.60742Z" ></path>
         </symbol>
         <symbol id="arn_icon-show-compare" viewBox="3.857 -48.75 22.7255 22.5">
            <title>show compare</title>
            <path d="M11.4258,-43.1836q2.02148,-0.117188 4.29199,-0.0146484q2.27051,0.102539 4.55566,0.0146484v2.98828q0.996094,-0.908203 2.02148,-2.05078q1.02539,-1.14258 2.13867,-2.16797q-0.996094,-1.08398 -2.00684,-2.19727q-1.01074,-1.11328 -2.03613,-2.13867q0,0.644531 0,1.47949q0,0.834961 0,1.50879q-2.37305,0.117188 -4.57031,0.0146484q-2.19727,-0.102539 -4.10156,-0.0146484q-1.78711,0 -3.2373,0.688477q-1.4502,0.688477 -2.3291,1.71387q-0.673828,0.673828 -1.23047,1.69922q-0.556641,1.02539 -0.834961,2.25586q-0.27832,1.23047 -0.219727,2.54883q0.0585938,1.34766 0.644531,2.63672q0.556641,-0.439453 1.04004,-0.981445q0.483398,-0.541992 1.06934,-1.12793q-0.292969,-1.40625 0,-2.63672q0.292969,-1.23047 0.981445,-2.15332q0.688477,-0.922852 1.68457,-1.47949q0.996094,-0.527344 2.13867,-0.585938Zm14.5312,2.51953q-0.351562,0.351562 -1.14258,1.05469q-0.791016,0.703125 -0.791016,1.05469q0,0.205078 0.0585938,0.424805q0.0585938,0.219727 0.0585938,0.454102q0,2.37305 -1.4209,4.07227q-1.4209,1.69922 -3.67676,1.78711q-0.9375,0.0585938 -2.02148,0.0585938q-1.08398,0 -2.22656,-0.0292969q-1.14258,-0.0292969 -2.31445,-0.0585938q-1.17188,0 -2.28516,0.0292969v-2.98828q-0.996094,0.996094 -2.09473,2.10938q-1.09863,1.11328 -2.12402,2.22656q0.908203,0.908203 1.88965,1.88965q0.981445,0.981445 1.86035,1.86035q0.117188,0.117188 0.249023,0.292969q0.131836,0.175781 0.219727,0.175781q0,-0.644531 0,-1.47949q0,-0.834961 0,-1.50879q2.37305,-0.117188 4.58496,-0.0146484q2.21191,0.102539 4.14551,0.0146484q1.66992,-0.117188 3.01758,-0.834961q1.34766,-0.717773 2.37305,-1.74316q0.644531,-0.615234 1.20117,-1.58203q0.556641,-0.966797 0.834961,-2.15332q0.27832,-1.18652 0.219727,-2.50488q-0.0585938,-1.31836 -0.615234,-2.60742Z" ></path>
         </symbol>
         <symbol id="arn_icon-remove-compare" viewBox="0 0 32 32">
            <title>Delete</title>
            <path d="M6 32h20l2-22h-24zM20 4v-4h-8v4h-10v6l2-2h24l2 2v-6h-10zM18 4h-4v-2h4v2z"></path>
         </symbol>
         <symbol id="arn_icon-preloader" viewBox="0 0 32 32">
            <title>preloader</title>
            <path d="M0.001 16.051l-0.001 0c0 0 0 0.003 0.001 0.007 0.003 0.121 0.017 0.24 0.041 0.355 0.006 0.055 0.013 0.114 0.021 0.18 0.007 0.059 0.014 0.122 0.022 0.19 0.012 0.080 0.024 0.165 0.037 0.256 0.027 0.18 0.056 0.379 0.091 0.592 0.042 0.201 0.088 0.419 0.136 0.652 0.022 0.116 0.055 0.235 0.087 0.356s0.065 0.247 0.099 0.375c0.018 0.064 0.032 0.129 0.053 0.194s0.041 0.131 0.062 0.197 0.085 0.268 0.129 0.406c0.011 0.035 0.022 0.069 0.033 0.104 0.013 0.034 0.025 0.069 0.038 0.104 0.026 0.069 0.052 0.139 0.078 0.21 0.053 0.14 0.107 0.284 0.162 0.429 0.061 0.143 0.124 0.288 0.188 0.435 0.032 0.073 0.064 0.147 0.096 0.222s0.071 0.147 0.107 0.221c0.073 0.147 0.146 0.297 0.221 0.448 0.077 0.15 0.163 0.297 0.245 0.448 0.042 0.075 0.084 0.15 0.126 0.226s0.091 0.148 0.136 0.223c0.092 0.148 0.185 0.298 0.279 0.448 0.395 0.59 0.834 1.174 1.319 1.727 0.491 0.549 1.023 1.070 1.584 1.55 0.568 0.473 1.165 0.903 1.773 1.285 0.613 0.376 1.239 0.697 1.856 0.973 0.156 0.064 0.311 0.127 0.465 0.19 0.077 0.030 0.152 0.064 0.229 0.091s0.154 0.054 0.23 0.081 0.302 0.108 0.453 0.156c0.151 0.045 0.3 0.089 0.447 0.133 0.074 0.021 0.146 0.045 0.219 0.063s0.146 0.036 0.218 0.053c0.144 0.035 0.286 0.069 0.425 0.103 0.141 0.027 0.279 0.054 0.415 0.080 0.068 0.013 0.135 0.026 0.201 0.038 0.033 0.006 0.066 0.012 0.099 0.019 0.033 0.005 0.066 0.009 0.099 0.014 0.131 0.018 0.259 0.036 0.384 0.053 0.062 0.009 0.124 0.017 0.185 0.026s0.122 0.012 0.182 0.018c0.119 0.011 0.236 0.021 0.349 0.031s0.222 0.021 0.329 0.023c0.007 0 0.014 0 0.021 0.001 0.019 1.088 0.906 1.964 1.999 1.964 0.017 0 0.034-0.001 0.051-0.001v0.001c0 0 0.003-0 0.007-0.001 0.121-0.003 0.24-0.017 0.355-0.041 0.055-0.006 0.114-0.013 0.18-0.021 0.059-0.007 0.122-0.014 0.19-0.022 0.080-0.012 0.165-0.024 0.256-0.037 0.18-0.027 0.379-0.056 0.592-0.091 0.201-0.042 0.419-0.088 0.652-0.136 0.116-0.022 0.235-0.056 0.356-0.087s0.247-0.065 0.375-0.099c0.064-0.018 0.129-0.032 0.194-0.053s0.13-0.041 0.197-0.062 0.268-0.085 0.406-0.129c0.035-0.011 0.069-0.022 0.104-0.033 0.034-0.013 0.069-0.025 0.104-0.038 0.069-0.026 0.139-0.052 0.21-0.078 0.14-0.053 0.284-0.107 0.429-0.162 0.143-0.061 0.288-0.124 0.436-0.188 0.073-0.032 0.147-0.064 0.222-0.096s0.147-0.071 0.221-0.107c0.147-0.073 0.297-0.146 0.448-0.221 0.15-0.077 0.297-0.163 0.448-0.245 0.075-0.042 0.15-0.084 0.226-0.126s0.148-0.091 0.223-0.136c0.148-0.092 0.298-0.185 0.448-0.279 0.59-0.395 1.174-0.834 1.727-1.319 0.549-0.491 1.070-1.023 1.55-1.584 0.473-0.568 0.903-1.165 1.285-1.773 0.376-0.613 0.697-1.239 0.973-1.855 0.064-0.156 0.127-0.311 0.19-0.465 0.030-0.077 0.064-0.152 0.091-0.229s0.054-0.154 0.081-0.23 0.108-0.302 0.156-0.453c0.045-0.151 0.089-0.3 0.133-0.447 0.021-0.074 0.045-0.146 0.063-0.219s0.036-0.146 0.053-0.218c0.035-0.144 0.069-0.286 0.103-0.425 0.027-0.141 0.054-0.279 0.080-0.415 0.013-0.068 0.026-0.135 0.038-0.201 0.006-0.033 0.012-0.066 0.019-0.099 0.005-0.033 0.009-0.066 0.014-0.099 0.018-0.131 0.036-0.259 0.053-0.384 0.009-0.062 0.017-0.124 0.026-0.185s0.012-0.122 0.018-0.182c0.011-0.119 0.021-0.236 0.031-0.349s0.021-0.222 0.023-0.329c0.001-0.017 0.001-0.033 0.002-0.049 1.101-0.005 1.992-0.898 1.992-2 0-0.017-0.001-0.034-0.001-0.051h0.001c0 0-0-0.003-0.001-0.007-0.003-0.121-0.017-0.24-0.041-0.355-0.006-0.055-0.013-0.114-0.021-0.181-0.007-0.059-0.014-0.122-0.022-0.19-0.012-0.080-0.024-0.165-0.037-0.255-0.027-0.18-0.056-0.379-0.091-0.592-0.042-0.201-0.088-0.419-0.136-0.652-0.022-0.116-0.055-0.235-0.087-0.357s-0.065-0.247-0.099-0.375c-0.018-0.064-0.032-0.129-0.053-0.194s-0.041-0.13-0.062-0.197-0.085-0.268-0.129-0.406c-0.011-0.034-0.022-0.069-0.033-0.104-0.013-0.034-0.025-0.069-0.038-0.104-0.026-0.069-0.052-0.139-0.078-0.21-0.053-0.141-0.107-0.284-0.162-0.429-0.061-0.143-0.124-0.288-0.188-0.435-0.032-0.073-0.064-0.147-0.096-0.222s-0.071-0.147-0.107-0.221c-0.073-0.147-0.146-0.297-0.221-0.448-0.077-0.15-0.163-0.297-0.245-0.448-0.042-0.075-0.084-0.15-0.126-0.226s-0.091-0.148-0.136-0.223c-0.092-0.148-0.185-0.298-0.279-0.448-0.395-0.59-0.834-1.174-1.319-1.727-0.491-0.549-1.023-1.070-1.584-1.55-0.568-0.473-1.165-0.903-1.773-1.285-0.613-0.376-1.239-0.697-1.855-0.973-0.156-0.064-0.311-0.127-0.465-0.19-0.077-0.030-0.152-0.063-0.229-0.091s-0.154-0.054-0.23-0.081-0.302-0.108-0.453-0.156c-0.151-0.045-0.3-0.089-0.447-0.133-0.074-0.021-0.146-0.045-0.219-0.063s-0.146-0.036-0.218-0.053c-0.144-0.035-0.286-0.069-0.425-0.103-0.141-0.027-0.279-0.054-0.415-0.080-0.068-0.013-0.135-0.026-0.201-0.038-0.033-0.006-0.066-0.012-0.099-0.019-0.033-0.005-0.066-0.009-0.099-0.014-0.131-0.018-0.259-0.036-0.384-0.053-0.062-0.009-0.124-0.017-0.185-0.026s-0.122-0.012-0.182-0.018c-0.119-0.010-0.236-0.021-0.349-0.031s-0.222-0.021-0.329-0.023c-0.027-0.001-0.052-0.002-0.078-0.003-0.020-1.087-0.907-1.962-1.999-1.962-0.017 0-0.034 0.001-0.051 0.001l-0-0.001c0 0-0.003 0-0.007 0.001-0.121 0.003-0.24 0.017-0.355 0.041-0.055 0.006-0.114 0.013-0.181 0.021-0.059 0.007-0.122 0.014-0.19 0.022-0.080 0.012-0.165 0.024-0.255 0.037-0.18 0.027-0.379 0.056-0.592 0.091-0.201 0.042-0.419 0.088-0.652 0.136-0.116 0.022-0.235 0.056-0.356 0.087s-0.247 0.065-0.375 0.099c-0.064 0.018-0.129 0.032-0.194 0.053s-0.13 0.041-0.197 0.062-0.268 0.085-0.406 0.129c-0.034 0.011-0.069 0.022-0.104 0.033-0.034 0.013-0.069 0.025-0.104 0.038-0.069 0.026-0.139 0.052-0.21 0.078-0.14 0.053-0.284 0.107-0.429 0.162-0.143 0.061-0.288 0.124-0.435 0.188-0.073 0.032-0.147 0.064-0.222 0.096s-0.147 0.071-0.221 0.107c-0.147 0.073-0.297 0.146-0.448 0.221-0.15 0.077-0.297 0.163-0.448 0.245-0.075 0.042-0.15 0.084-0.226 0.126s-0.148 0.091-0.223 0.136c-0.148 0.092-0.298 0.185-0.448 0.279-0.59 0.395-1.174 0.834-1.727 1.319-0.549 0.491-1.070 1.023-1.55 1.584-0.473 0.568-0.903 1.165-1.285 1.773-0.376 0.613-0.697 1.239-0.973 1.855-0.064 0.156-0.127 0.311-0.19 0.465-0.030 0.077-0.063 0.152-0.091 0.229s-0.054 0.154-0.081 0.23-0.108 0.302-0.156 0.453c-0.045 0.151-0.089 0.3-0.132 0.447-0.021 0.074-0.045 0.146-0.063 0.219s-0.036 0.146-0.053 0.218c-0.035 0.144-0.069 0.286-0.103 0.425-0.027 0.141-0.054 0.279-0.080 0.415-0.013 0.068-0.026 0.135-0.038 0.201-0.006 0.033-0.012 0.066-0.019 0.099-0.005 0.033-0.009 0.066-0.014 0.099-0.018 0.131-0.036 0.259-0.053 0.384-0.009 0.062-0.017 0.124-0.026 0.185s-0.012 0.122-0.018 0.182c-0.010 0.119-0.021 0.236-0.031 0.349s-0.021 0.222-0.023 0.329c-0.001 0.017-0.001 0.034-0.002 0.051-1.074 0.035-1.934 0.916-1.934 1.998 0 0.017 0.001 0.034 0.001 0.051zM2.297 14.022c0.001-0.006 0.003-0.012 0.004-0.018 0.020-0.101 0.051-0.204 0.080-0.311s0.059-0.215 0.090-0.327c0.016-0.056 0.029-0.113 0.048-0.169s0.038-0.113 0.057-0.171 0.077-0.233 0.117-0.353c0.010-0.030 0.020-0.060 0.030-0.090 0.012-0.030 0.023-0.060 0.035-0.090 0.023-0.060 0.047-0.121 0.071-0.182 0.047-0.122 0.096-0.246 0.145-0.373 0.055-0.124 0.111-0.25 0.168-0.377 0.028-0.064 0.057-0.128 0.086-0.192s0.064-0.127 0.095-0.191c0.065-0.128 0.13-0.257 0.197-0.388 0.069-0.129 0.145-0.257 0.219-0.387 0.037-0.065 0.074-0.13 0.112-0.195s0.081-0.128 0.121-0.193c0.082-0.128 0.164-0.257 0.247-0.388 0.351-0.509 0.739-1.012 1.167-1.489 0.434-0.472 0.901-0.919 1.394-1.33 0.499-0.404 1.021-0.77 1.552-1.094 0.535-0.319 1.081-0.589 1.617-0.821 0.136-0.053 0.271-0.106 0.404-0.158 0.067-0.025 0.132-0.053 0.199-0.076s0.134-0.045 0.2-0.067 0.262-0.090 0.392-0.129c0.131-0.037 0.26-0.073 0.387-0.109 0.064-0.017 0.126-0.037 0.189-0.052s0.126-0.029 0.189-0.043c0.124-0.028 0.247-0.056 0.367-0.084 0.121-0.021 0.241-0.043 0.358-0.063 0.058-0.010 0.116-0.021 0.173-0.031 0.029-0.005 0.057-0.010 0.085-0.015 0.029-0.003 0.057-0.007 0.085-0.010 0.113-0.014 0.223-0.028 0.331-0.041 0.054-0.007 0.107-0.013 0.159-0.020s0.105-0.008 0.157-0.013c0.103-0.007 0.203-0.015 0.3-0.022s0.191-0.016 0.283-0.016c0.183-0.004 0.354-0.008 0.512-0.012 0.146 0.005 0.28 0.010 0.401 0.014 0.060 0.002 0.116 0.003 0.17 0.005 0.066 0.004 0.128 0.008 0.186 0.012 0.067 0.004 0.127 0.008 0.182 0.012 0.102 0.016 0.206 0.024 0.312 0.024 0.015 0 0.029-0.001 0.044-0.001 0.004 0 0.007 0 0.007 0v-0.001c0.973-0.024 1.773-0.743 1.924-1.68 0.017 0.004 0.033 0.007 0.050 0.011 0.101 0.020 0.204 0.051 0.311 0.080s0.215 0.059 0.327 0.090c0.056 0.016 0.113 0.029 0.169 0.048s0.113 0.038 0.171 0.057 0.233 0.077 0.353 0.117c0.030 0.010 0.060 0.020 0.090 0.030 0.030 0.012 0.060 0.023 0.090 0.035 0.060 0.023 0.121 0.047 0.182 0.071 0.122 0.047 0.246 0.096 0.373 0.145 0.124 0.055 0.25 0.111 0.378 0.168 0.064 0.028 0.128 0.057 0.192 0.086s0.127 0.064 0.191 0.095c0.128 0.065 0.257 0.13 0.388 0.197 0.13 0.069 0.257 0.145 0.387 0.219 0.065 0.037 0.13 0.074 0.195 0.112s0.128 0.081 0.193 0.121c0.128 0.082 0.257 0.164 0.388 0.247 0.509 0.351 1.012 0.739 1.489 1.167 0.472 0.434 0.919 0.901 1.33 1.394 0.404 0.499 0.77 1.021 1.094 1.552 0.319 0.535 0.589 1.081 0.821 1.617 0.053 0.136 0.106 0.271 0.158 0.404 0.025 0.067 0.053 0.132 0.076 0.199s0.045 0.134 0.067 0.2 0.090 0.262 0.129 0.392c0.037 0.131 0.073 0.26 0.109 0.387 0.017 0.064 0.037 0.126 0.052 0.189s0.029 0.126 0.043 0.189c0.028 0.124 0.056 0.247 0.084 0.367 0.021 0.121 0.043 0.241 0.063 0.358 0.010 0.058 0.020 0.116 0.031 0.173 0.005 0.029 0.010 0.057 0.015 0.085 0.003 0.029 0.007 0.057 0.010 0.085 0.014 0.113 0.028 0.223 0.041 0.331 0.007 0.054 0.014 0.107 0.020 0.159s0.008 0.105 0.013 0.157c0.007 0.103 0.015 0.203 0.022 0.3s0.016 0.191 0.016 0.283c0.004 0.183 0.008 0.354 0.012 0.512-0.005 0.146-0.010 0.28-0.014 0.401-0.002 0.060-0.003 0.116-0.005 0.17-0.004 0.066-0.008 0.128-0.012 0.186-0.004 0.067-0.008 0.127-0.012 0.182-0.016 0.102-0.024 0.206-0.024 0.312 0 0.015 0.001 0.029 0.001 0.044-0 0.004-0 0.007-0 0.007h0.001c0.024 0.961 0.726 1.754 1.646 1.918-0.002 0.009-0.004 0.018-0.006 0.028-0.020 0.102-0.051 0.204-0.080 0.311s-0.059 0.215-0.090 0.327c-0.016 0.056-0.029 0.113-0.048 0.169s-0.038 0.113-0.057 0.171-0.077 0.233-0.117 0.353c-0.010 0.030-0.020 0.060-0.030 0.090-0.012 0.030-0.023 0.060-0.035 0.090-0.023 0.060-0.047 0.121-0.071 0.182-0.047 0.122-0.096 0.246-0.145 0.373-0.055 0.124-0.111 0.25-0.169 0.378-0.028 0.064-0.057 0.128-0.086 0.192s-0.064 0.127-0.095 0.191c-0.065 0.128-0.13 0.257-0.197 0.388-0.069 0.129-0.145 0.257-0.219 0.387-0.037 0.065-0.074 0.13-0.112 0.195s-0.081 0.128-0.121 0.193c-0.082 0.128-0.164 0.257-0.247 0.388-0.351 0.509-0.738 1.012-1.167 1.489-0.434 0.472-0.901 0.919-1.394 1.33-0.499 0.404-1.021 0.77-1.552 1.094-0.535 0.319-1.081 0.589-1.617 0.821-0.136 0.053-0.271 0.106-0.404 0.158-0.067 0.025-0.132 0.053-0.199 0.076s-0.134 0.045-0.2 0.067-0.262 0.090-0.392 0.129c-0.131 0.037-0.26 0.073-0.387 0.109-0.064 0.017-0.126 0.037-0.189 0.052s-0.126 0.029-0.189 0.043c-0.124 0.028-0.247 0.056-0.367 0.084-0.122 0.021-0.241 0.043-0.358 0.063-0.058 0.010-0.116 0.021-0.173 0.031-0.029 0.005-0.057 0.010-0.085 0.015-0.029 0.003-0.057 0.007-0.085 0.010-0.113 0.014-0.223 0.028-0.331 0.041-0.054 0.007-0.107 0.014-0.159 0.020s-0.105 0.008-0.157 0.013c-0.103 0.007-0.203 0.015-0.3 0.022s-0.191 0.016-0.283 0.016c-0.183 0.004-0.354 0.008-0.512 0.012-0.146-0.005-0.28-0.010-0.401-0.014-0.060-0.002-0.116-0.003-0.17-0.005-0.066-0.004-0.128-0.008-0.186-0.012-0.067-0.004-0.127-0.008-0.182-0.012-0.102-0.016-0.206-0.024-0.312-0.024-0.015 0-0.029 0.001-0.044 0.001-0.004-0-0.007-0-0.007-0v0.001c-0.969 0.024-1.766 0.737-1.921 1.668-0.1-0.020-0.201-0.050-0.306-0.079-0.106-0.029-0.215-0.059-0.327-0.090-0.056-0.016-0.113-0.029-0.169-0.048s-0.113-0.038-0.171-0.057-0.233-0.077-0.353-0.117c-0.030-0.010-0.060-0.020-0.090-0.030-0.030-0.012-0.060-0.023-0.090-0.035-0.060-0.023-0.121-0.047-0.182-0.071-0.122-0.048-0.246-0.096-0.373-0.145-0.124-0.055-0.25-0.111-0.377-0.168-0.064-0.028-0.128-0.057-0.192-0.086s-0.127-0.064-0.191-0.095c-0.128-0.065-0.257-0.13-0.388-0.197-0.13-0.069-0.257-0.145-0.387-0.219-0.065-0.037-0.13-0.074-0.195-0.112s-0.128-0.081-0.193-0.121c-0.128-0.082-0.257-0.164-0.388-0.247-0.509-0.351-1.012-0.738-1.489-1.166-0.472-0.434-0.919-0.901-1.33-1.394-0.404-0.499-0.77-1.021-1.094-1.552-0.319-0.535-0.589-1.081-0.821-1.617-0.053-0.136-0.106-0.271-0.158-0.404-0.025-0.067-0.053-0.132-0.076-0.199s-0.045-0.134-0.067-0.2-0.090-0.262-0.129-0.392c-0.037-0.131-0.073-0.26-0.109-0.387-0.017-0.064-0.037-0.126-0.052-0.189s-0.029-0.126-0.043-0.189c-0.028-0.124-0.056-0.247-0.084-0.367-0.021-0.121-0.043-0.241-0.063-0.358-0.010-0.058-0.021-0.116-0.031-0.173-0.005-0.029-0.010-0.057-0.015-0.085-0.003-0.029-0.007-0.057-0.010-0.085-0.014-0.113-0.028-0.223-0.041-0.331-0.007-0.054-0.013-0.107-0.020-0.159s-0.008-0.105-0.013-0.157c-0.007-0.103-0.015-0.203-0.022-0.3s-0.016-0.191-0.016-0.283c-0.004-0.183-0.008-0.354-0.012-0.512 0.005-0.146 0.010-0.28 0.014-0.401 0.002-0.060 0.003-0.116 0.005-0.17 0.004-0.066 0.008-0.128 0.012-0.186 0.004-0.067 0.008-0.127 0.012-0.182 0.015-0.102 0.024-0.206 0.024-0.312 0-0.015-0.001-0.029-0.001-0.044 0-0.004 0.001-0.007 0.001-0.007h-0.001c-0.024-0.981-0.754-1.786-1.701-1.927z"></path>
         </symbol>
      </svg>
      <script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');</script>
     
      <link rel="alternate" hreflang="x-default" href="https://buildit.com.ng/">


      
     
 
   
  
     
      <style id="shopify-dynamic-checkout-cart">@media screen and (min-width: 750px) {
         #dynamic-checkout-cart {
         min-height: 50px;
         }
         }
         @media screen and (max-width: 750px) {
         #dynamic-checkout-cart {
         min-height: 120px;
         }
         }
      </style>
      <script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>
   </head>
   <body data-rtl="false" class="templateIndex mobile-bar-inside as-default-theme category-mode-false cata-grid-4 lazy-loading-img">
      <script crossorigin="anonymous" src="frontpage/jquery-3.5.min.js?v=1527375811596437937"></script>
      <script crossorigin="anonymous" src="frontpage/jquery.swiper.js?v=4806171965010309890" defer></script>
      <script crossorigin="anonymous" src="frontpage/muuri.min.js?v=4152941292202938587" defer></script>
      <script crossorigin="anonymous" src="frontpage/bootstrap.4x.min.js?v=5577575955751714421" defer></script>
     
      
      
      <div class="boxed-wrapper mode-color" data-cart-style="dropdown" data-redirect="false" data-ajax-cart="false">

         <div class="new-loading"></div>
         <script type="text/javascript">
            var _bc_config = {
                "money_format" : '<span class=money>${{amount}}</span>'
            };
            
            
            
                jQuery(document).ready(function($) {   
                    var languages = [
                        { country: 'Afghanistan', country_code : 'AF', lang_name : 'Persian', lang_code : 'fa' },
                        { country: 'Albania', country_code : 'AL', lang_name : 'Albanian', lang_code : 'sq' },
                        { country: 'Algeria', country_code : 'DZ', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Andorra', country_code : 'AD', lang_name : 'Catalan', lang_code : 'ca' },
                        { country: 'Angola', country_code : 'AO', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Antigua and Barbuda', country_code : 'AG', lang_name : 'English', lang_code : 'en' },
                        { country: 'Argentina', country_code : 'AR', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Armenia', country_code : 'AM', lang_name : 'Armenian', lang_code : 'hy' },
                        { country: 'Australia', country_code : 'AU', lang_name : 'English', lang_code : 'en' },
                        { country: 'Austria', country_code : 'AT', lang_name : 'German', lang_code : 'de' },
                        { country: 'Azerbaijan', country_code : 'AZ', lang_name : 'Azerbaijani', lang_code : 'az' },
                        { country: 'Bahamas', country_code : 'BS', lang_name : 'English', lang_code : 'en' },
                        { country: 'Bahrain', country_code : 'BH', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Bangladesh', country_code : 'BD', lang_name : 'Bangla', lang_code : 'bn' },
                        { country: 'Barbados', country_code : 'BB', lang_name : 'English', lang_code : 'en' },
                        { country: 'Belarus', country_code : 'BY', lang_name : 'Russian', lang_code : 'ru' },
                        { country: 'Belgium', country_code : 'BE', lang_name : 'Dutch', lang_code : 'nl' },
                        { country: 'Belize', country_code : 'BZ', lang_name : 'English', lang_code : 'en' },
                        { country: 'Benin', country_code : 'BJ', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Bhutan', country_code : 'BT', lang_name : 'Dzongkha', lang_code : 'dz' },
                        { country: 'Bolivia', country_code : 'BO', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Bosnia and Herzegovina', country_code : 'BA', lang_name : 'Bosnian', lang_code : 'bs' },
                        { country: 'Botswana', country_code : 'BW', lang_name : 'English', lang_code : 'en' },
                        { country: 'Brazil', country_code : 'BR', lang_name : 'Portuguese (Brazil)', lang_code : 'pt-BR' },
                        { country: 'Brunei', country_code : 'BN', lang_name : 'Malay', lang_code : 'ms' },
                        { country: 'Bulgaria', country_code : 'BG', lang_name : 'Bulgarian', lang_code : 'bg' },
                        { country: 'Burkina Faso', country_code : 'BF', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Burundi', country_code : 'BI', lang_name : 'Rundi', lang_code : 'rn' },
                        { country: 'Cabo Verde', country_code : 'CV', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Cambodia', country_code : 'KH', lang_name : 'Khmer', lang_code : 'km' },
                        { country: 'Cameroon', country_code : 'CM', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Canada', country_code : 'CA', lang_name : 'English', lang_code : 'en' },
                        { country: 'Central African Republic', country_code : 'CF', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Chad', country_code : 'TD', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Chile', country_code : 'CL', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'China', country_code : 'CN', lang_name : 'Chinese (Simplified)', lang_code : 'zh-CN' },
                        { country: 'Colombia', country_code : 'CO', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Comoros', country_code : 'KM', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Congo (the Democratic Republic of the)', country_code : 'CD', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Congo', country_code : 'CG', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Costa Rica', country_code : 'CR', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Croatia', country_code : 'HR', lang_name : 'Croatian', lang_code : 'hr' },
                        { country: 'Cuba', country_code : 'CU', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Cyprus', country_code : 'CY', lang_name : 'Greek', lang_code : 'el' },
                        { country: 'Czechia', country_code : 'CZ', lang_name : 'Czech', lang_code : 'cs' },
                        { country: 'Côte dIvoire', country_code : 'CI', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Denmark', country_code : 'DK', lang_name : 'Danish', lang_code : 'da' },
                        { country: 'Djibouti', country_code : 'DJ', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Dominica', country_code : 'DM', lang_name : 'English', lang_code : 'en' },
                        { country: 'Dominican Republic', country_code : 'DO', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Ecuador', country_code : 'EC', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Egypt', country_code : 'EG', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'El Salvador', country_code : 'SV', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Equatorial Guinea', country_code : 'GQ', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Eritrea', country_code : 'ER', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Estonia', country_code : 'EE', lang_name : 'Estonian', lang_code : 'et' },
                        { country: 'Ethiopia', country_code : 'ET', lang_name : 'Amharic', lang_code : 'am' },
                        { country: 'Equatorial Guinea', country_code : 'GQ', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Fiji', country_code : 'FJ', lang_name : 'English', lang_code : 'en' },
                        { country: 'Finland', country_code : 'FI', lang_name : 'Finnish', lang_code : 'fi' },
                        { country: 'France', country_code : 'FR', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Gabon', country_code : 'GA', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Gambia', country_code : 'GM', lang_name : 'English', lang_code : 'en' },
                        { country: 'Georgia', country_code : 'GE', lang_name : 'Georgian', lang_code : 'ka' },
                        { country: 'Germany', country_code : 'DE', lang_name : 'German', lang_code : 'de' },
                        { country: 'Ghana', country_code : 'GH', lang_name : 'English', lang_code : 'en' },
                        { country: 'Greece', country_code : 'GR', lang_name : 'Greek', lang_code : 'el' },
                        { country: 'Grenada', country_code : 'GD', lang_name : 'English', lang_code : 'en' },
                        { country: 'Guatemala', country_code : 'GT', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Guinea', country_code : 'GN', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Guinea-Bissau', country_code : 'GW', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Guyana', country_code : 'GY', lang_name : 'English', lang_code : 'en' },
                        { country: 'Haiti', country_code : 'HT', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Holy See', country_code : 'VA', lang_name : 'Italian', lang_code : 'it' },
                        { country: 'Honduras', country_code : 'HN', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Hungary', country_code : 'HU', lang_name : 'Hungarian', lang_code : 'hu' },
                        { country: 'Iceland', country_code : 'IS', lang_name : 'Icelandic', lang_code : 'is' },
                        { country: 'India', country_code : 'IN', lang_name : 'Hindi', lang_code : 'hi' },
                        { country: 'Indonesia', country_code : 'ID', lang_name : 'Indonesian', lang_code : 'id' },
                        { country: 'Iran', country_code : 'IR', lang_name : 'Persian', lang_code : 'fa' },
                        { country: 'Iraq', country_code : 'IQ', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Ireland', country_code : 'IE', lang_name : 'English', lang_code : 'en' },
                        { country: 'Israel', country_code : 'IL', lang_name : 'Hebrew', lang_code : 'he' },
                        { country: 'Italy', country_code : 'IT', lang_name : 'Italian', lang_code : 'it' },
                        { country: 'Jamaica', country_code : 'JM', lang_name : 'English', lang_code : 'en' },
                        { country: 'Japan', country_code : 'JP', lang_name : 'Japanese', lang_code : 'ja' },
                        { country: 'Jordan', country_code : 'JO', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Kazakhstan', country_code : 'KZ', lang_name : 'Kazakh', lang_code : 'kk' },
                        { country: 'Kenya', country_code : 'KE', lang_name : 'English', lang_code : 'en' },
                        { country: 'Kiribati', country_code : 'KI', lang_name : 'English', lang_code : 'en' },
                        { country: 'North Korea', country_code : 'KP', lang_name : 'Korean', lang_code : 'ko' },
                        { country: 'South Korea', country_code : 'KR', lang_name : 'Korean', lang_code : 'ko' },
                        { country: 'Kuwait', country_code : 'KW', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Kyrgyzstan', country_code : 'KG', lang_name : 'Kyrgyz', lang_code : 'ky' },
                        { country: 'Laos', country_code : 'LA', lang_name : 'Lao', lang_code : 'lo' },
                        { country: 'Latvia', country_code : 'LV', lang_name : 'Latvian', lang_code : 'lv' },
                        { country: 'Lebanon', country_code : 'LB', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Lesotho', country_code : 'LS', lang_name : 'English', lang_code : 'en' },
                        { country: 'Liberia', country_code : 'LR', lang_name : 'English', lang_code : 'en' },
                        { country: 'Libya', country_code : 'LY', lang_name : 'English', lang_code : 'en' },
                        { country: 'Liechtenstein', country_code : 'LI', lang_name : 'German', lang_code : 'de' },
                        { country: 'Lithuania', country_code : 'LT', lang_name : 'Lithuanian', lang_code : 'lt' },
                        { country: 'Luxembourg', country_code : 'LU', lang_name : 'Luxembourgish', lang_code : 'lb' },
                        { country: 'Madagascar', country_code : 'MG', lang_name : 'Malagasy', lang_code : 'mg' },
                        { country: 'Malawi', country_code : 'MW', lang_name : 'English', lang_code : 'en' },
                        { country: 'Malaysia', country_code : 'MY', lang_name : 'Malay', lang_code : 'ms' },
                        { country: 'Maldives', country_code : 'MV', lang_name : 'English ', lang_code : 'en' },
                        { country: 'Mali', country_code : 'ML', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Malta', country_code : 'MT', lang_name : 'Maltese', lang_code : 'mt' },
                        { country: 'Marshall Islands', country_code : 'MH', lang_name : 'English', lang_code : 'en' },
                        { country: 'Mauritania', country_code : 'MR', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Mauritius', country_code : 'MU', lang_name : 'English', lang_code : 'en' },
                        { country: 'Mexico', country_code : 'MX', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Micronesia', country_code : 'FM', lang_name : 'English', lang_code : 'en' },
                        { country: 'Moldova', country_code : 'MD', lang_name : 'Romanian', lang_code : 'ro' },
                        { country: 'Monaco', country_code : 'MC', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Mongolia', country_code : 'MN', lang_name : 'Mongolian', lang_code : 'mn' },
                        { country: 'Montenegro', country_code : 'ME', lang_name : 'Serbian', lang_code : 'sr' },
                        { country: 'Morocco', country_code : 'MA', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Mozambique', country_code : 'MZ', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Myanmar', country_code : 'MM', lang_name : 'Burmese', lang_code : 'my' },
                        { country: 'Namibia', country_code : 'NA', lang_name : 'Afrikaans', lang_code : 'af' },
                        { country: 'Nauru', country_code : 'NR', lang_name : 'English', lang_code : 'en' },
                        { country: 'Nepal', country_code : 'NP', lang_name : 'Nepali', lang_code : 'ne' },
                        { country: 'Netherlands', country_code : 'NL', lang_name : 'Dutch', lang_code : 'nl' },
                        { country: 'New Zealand', country_code : 'NZ', lang_name : 'English', lang_code : 'en' },
                        { country: 'Nicaragua', country_code : 'NI', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Niger', country_code : 'NE', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Nigeria', country_code : 'NG', lang_name : 'English', lang_code : 'en' },
                        { country: 'Norway', country_code : 'NO', lang_name : 'Norwegian Nynorsk', lang_code : 'nn' },
                        { country: 'Oman', country_code : 'OM', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Pakistan', country_code : 'PK', lang_name : 'Punjabi', lang_code : 'pa' },
                        { country: 'Palau', country_code : 'PW', lang_name : 'English', lang_code : 'en' },
                        { country: 'Palestine State', country_code : 'PS', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Panama', country_code : 'PA', lang_name : 'Spanish', lang_code : 'ar' },
                        { country: 'Papua New Guinea', country_code : 'PG', lang_name : 'English', lang_code : 'en' },
                        { country: 'Paraguay', country_code : 'PI', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Peru', country_code : 'PE', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Philippines', country_code : 'PH', lang_name : 'English', lang_code : 'en' },
                        { country: 'Poland', country_code : 'PL', lang_name : 'Polish', lang_code : 'pl' },
                        { country: 'Portugal', country_code : 'PT', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Puerto Rico', country_code : 'PR', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Qatar', country_code : 'QA', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Macedonia', country_code : 'MK', lang_name : 'Macedonian', lang_code : 'mk' },
                        { country: 'Romania', country_code : 'RO', lang_name : 'Romanian', lang_code : 'ro' },
                        { country: 'Russia', country_code : 'RU', lang_name : 'Russian', lang_code : 'ru' },
                        { country: 'Rwanda', country_code : 'RW', lang_name : 'Kinyarwanda', lang_code : 'rw' },
                        { country: 'Saint Kitts and Nevis', country_code : 'KN', lang_name : 'English', lang_code : 'en' },
                        { country: 'Saint Lucia', country_code : 'LC', lang_name : 'English', lang_code : 'en' },
                        { country: 'Saint Vincent and the Grenadines', country_code : 'VC', lang_name : 'English', lang_code : 'en' },
                        { country: 'Samoa', country_code : 'WS', lang_name : 'English', lang_code : 'en' },
                        { country: 'San Marino', country_code : 'SM', lang_name : 'Italian', lang_code : 'it' },
                        { country: 'Sao Tome and Principe', country_code : 'ST', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Saudi Arabia', country_code : 'SA', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Senegal', country_code : 'SN', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Serbia', country_code : 'RS', lang_name : 'Serbian', lang_code : 'sr' },
                        { country: 'Seychelles', country_code : 'SC', lang_name : 'English', lang_code : 'en' },
                        { country: 'Sierra Leone', country_code : 'SL', lang_name : 'English', lang_code : 'en' },
                        { country: 'Singapore', country_code : 'SG', lang_name : 'English', lang_code : 'en' },
                        { country: 'Slovakia', country_code : 'SK', lang_name : 'Slovak', lang_code : 'sk' },
                        { country: 'Slovenia', country_code : 'SI', lang_name : 'Slovenian', lang_code : 'sl' },
                        { country: 'Solomon Islands', country_code : 'SB', lang_name : 'English', lang_code : 'en' },
                        { country: 'Somalia', country_code : 'SO', lang_name : 'Somali', lang_code : 'so' },
                        { country: 'South Africa', country_code : 'ZA', lang_name : 'Zulu', lang_code : 'zu' },
                        { country: 'South Sudan', country_code : 'SS', lang_name : 'English', lang_code : 'en' },
                        { country: 'Spain', country_code : 'ES', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Sri Lanka', country_code : 'LK', lang_name : 'Sinhala', lang_code : 'si' },
                        { country: 'Sudan', country_code : 'SD', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Suriname', country_code : 'SR', lang_name : 'Dutch', lang_code : 'nl' },
                        { country: 'Sweden', country_code : 'SE', lang_name : 'Swedish', lang_code : 'sv' },
                        { country: 'Switzerland', country_code : 'CH', lang_name : 'German', lang_code : 'de' },
                        { country: 'Syria', country_code : 'SY', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Taiwan', country_code : 'TW', lang_name : 'Chinese (Traditional)', lang_code : 'zh-TW' },
                        { country: 'Tajikistan', country_code : 'TJ', lang_name : 'Tajik', lang_code : 'tg' },
                        { country: 'Tanzania', country_code : 'TZ', lang_name : 'Swahili', lang_code : 'sw' },
                        { country: 'Thailand', country_code : 'TH', lang_name : 'Thai', lang_code : 'th' },
                        { country: 'Timor-Leste', country_code : 'TL', lang_name : 'Portuguese (Portugal)', lang_code : 'pt-PT' },
                        { country: 'Togo', country_code : 'TG', lang_name : 'French', lang_code : 'fr' },
                        { country: 'Tonga', country_code : 'TO', lang_name : 'Tongan', lang_code : 'to' },
                        { country: 'Trinidad and Tobago', country_code : 'TT', lang_name : 'English', lang_code : 'en' },
                        { country: 'Tunisia', country_code : 'TN', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Turkey', country_code : 'TR', lang_name : 'Turkish', lang_code : 'tr' },
                        { country: 'Turkmenistan', country_code : 'TM', lang_name : 'Turkmen', lang_code : 'tk' },
                        { country: 'Tuvalu', country_code : 'TV', lang_name : 'English', lang_code : 'en' },
                        { country: 'Uganda', country_code : 'UG', lang_name : 'English', lang_code : 'en' },
                        { country: 'Ukraine', country_code : 'UA', lang_name : 'Ukrainian', lang_code : 'uk' },
                        { country: 'United Arab Emirates', country_code : 'AE', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'United Kingdom', country_code : 'GB', lang_name : 'English', lang_code : 'en' },
                        { country: 'United States of America', country_code : 'US', lang_name : 'English', lang_code : 'en' },
                        { country: 'Uruguay', country_code : 'UY', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Uzbekistan', country_code : 'UZ', lang_name : 'Uzbek', lang_code : 'uz' },
                        { country: 'Vanuatu', country_code : 'VU', lang_name : 'English', lang_code : 'en' },
                        { country: 'Venezuela', country_code : 'VE', lang_name : 'Spanish', lang_code : 'es' },
                        { country: 'Viet Nam', country_code : 'VN', lang_name : 'Vietnamese', lang_code : 'vi' },
                        { country: 'Western Sahara', country_code : 'EH', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Yemen', country_code : 'YE', lang_name : 'Arabic', lang_code : 'ar' },
                        { country: 'Zambia', country_code : 'ZM', lang_name : 'English', lang_code : 'en' },
                        { country: 'Zimbabwe', country_code : 'ZW', lang_name : 'English', lang_code : 'en' }
                    ];
            
                    if (jQuery.cookie('langcookie')) {
                        //it hasn't been one days yet
                    }
                    else {
                        jQuery.ajax({
                          url: 'https://get.geojs.io/v1/ip/geo.js',
                          type: 'POST',
                          dataType: 'jsonp',
                          success: function(location) {
                            for(var i=0; i<languages.length; i++)
                              if(languages[i].country_code == location.country_code){
                                jQuery('.disclosure-list__option').each(function(index) {
                                  var _lang_option = $(this).attr('lang');
                                  if(languages[i].lang_code == _lang_option){
                                    jQuery.cookie('langcookie', 'true', { expires: 7 });
                                    $(this).trigger('click');
                                  }
                                });
                              }
                          }
                        });
                    }
            
                })
            
         </script>
    

         <div id="page-body" class="electro-v-72 wide">