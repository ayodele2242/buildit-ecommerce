<!DOCTYPE html>
<?php


require_once '../config/config.php';

require_once '../class/database.php';
require_once '../inc/fetch.php';
require_once '../config/function.php';
require_once '../inc/functions.php';

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

$current_page = getCurrentPage();

 $PublicIP = get_client_ip();
 //$a = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$PublicIP));  

if(!isset($_SESSION['aemail'])){
  header("Location: account-signin");
}else{
  $email = $_SESSION['aemail'];
  $vinfo = vendorInfo($email);
  foreach($vinfo as $info){
  $name = $info['name'];
  $username = $info['username'];
$_SESSION['session_id'] = $info['id'];
$_SESSION['login_id'] = $info['id'];
$_SESSION['state'] = $info['state'];
}
}

?>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">
  <link rel="icon" type="image/png" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">
   

    <title><?php echo (isset($current_page)) ? ucwords(str_replace('_', ' ', $current_page)) : SITE_TITLE; ?></title>
    <link rel="apple-touch-icon" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>">

    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">

   
   
  <!--<link rel="stylesheet" type="text/css" href="<?php //echo FRONT_ASSETS;?>main/css/materialize.css">-->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="css/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="css/switch.min.css">
    <link rel="stylesheet" type="text/css" href="css/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/default.date.css">
    <link rel="stylesheet" type="text/css" href="css/default.time.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="css/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="css/invoice.min.css">
    <!-- END: Page CSS-->

     <link rel="stylesheet" href="<?php echo FRONT_ASSETS;?>dropify/dist/css/dropify.min.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- END: Custom CSS-->

     <link rel="stylesheet" href="<?php echo FRONT_ASSETS;?>main/css/jquery-ui.min.css">


    <style type="text/css">
       #preview_file_div ul li{
          list-style-type: none;
          
        }

        #preview_file_div ul li{
          display: inline-flex;
          margin: 10px;
        }

        #preview_file_div ul li .ic-sing-file{
        padding-left: 10px;
          overflow: hidden; 
           position: relative;
        }
        #preview_file_div ul li .ic-sing-file img{
          width: 130px;
          height: 100px;

      
        }

        #preview_file_div ul li .ic-sing-file p.close{
          color: white;
          font-weight: bolder;
          position: absolute;
          top: 0px;
          right: 0px;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 50%;
          width: 25px;
          height: 25px;
          background: red;

      
        }
        
       .control-label{
        font-weight: bolder;
       font-size: 14px;
       }

        #msgs {
         
          height: auto;
          width: auto;
          position: fixed;
          text-align: center;
          justify-content: center;
          align-items: center;
          right: 0%;
          /*margin-left: -37.5%;*/
                }
        #msgs {
          z-index: 30;
        }
         #msgs p{
          text-align: left;
         }
    </style>


  <script type="text/javascript" src="<?php echo $set['installUrl']; ?>assets/js/jquery-1.11.1.min.js"></script>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

     <div id="msgs"></div>
