<?php
require 'config/config.php';
require 'inc/functions.php';

if(isset($_POST['id']) && isset($_POST['email']) && isset($_GET['trxId'])){
    $id = safe_input($mysqli,$_POST['id']);
    $iemail = safe_input($mysqli,$_POST['email']);
    $trxid = safe_input($mysqli,$_GET['trxId']);
    
    $myqli = mysqli_query($mysqli,"update orders set cust_cancel_status = 'cancelled' where id = '$id' and c_email='$iemail' and transId = '$trxid'");
    if($myqli){
        echo 1;
    }else{
        echo "Error occured while cancelling. Please try again.";
       
    }
}


?>