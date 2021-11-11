<?php
require_once("../../config/config.php");
require_once("../functions.php");

//if(isset($_POST)){
error_reporting(0);
if(!empty($_POST['name'])){
$name = safe_input($mysqli,$_POST['name']);
}else{
	echo "Name is required<br/>";
}
if(!empty($_POST['phone'])){
$phone = safe_input($mysqli,$_POST['phone']);
}else{
	echo "Contact number is required<br/>";
}

$email = safe_input($mysqli, $_POST['email']);

if(!empty($_POST['persin_in_charge'])){
$persin_in_charge = safe_input($mysqli,$_POST['persin_in_charge']);
}else{
	echo "Please provide the name of the person in charge of your store/shop";
}

if(!empty($_POST['city'])){
$city = safe_input($mysqli,$_POST['city']);
}else{
echo "Please enter your city.<br/>";
}

if(!empty($_POST['vendor_name'])){
$vendor_name = safe_input($mysqli,$_POST['vendor_name']);

$username = slug($vendor_name);

}else{
echo "Please enter your shop name.<br/>";
}

if(!empty($_POST['state'])){
$state  = safe_input($mysqli,$_POST['state']);
}else{
$state  = "";
}

if(!empty($_POST['country'])){
$country     = safe_input($mysqli,$_POST['country']);
}else{
	echo "Select your country<br/>";
}
if(!empty($_POST['address'])){
$address     = safe_input($mysqli,$_POST['address']);
}else{
	echo "Please enter your address<br/>";
}


if(!empty($_POST['bank_name'])){
$bank_name    = safe_input($mysqli,$_POST['bank_name']);
}else{
	echo "Please enter your bank name<br/>";
}

if(!empty($_POST['ac_name'])){
$ac_name    = safe_input($mysqli,$_POST['ac_name']);
}else{
	echo "Please enter your account name<br/>";
}

if(!empty($_POST['ac_num'])){
$ac_num    = safe_input($mysqli,$_POST['ac_num']);
}else{
	echo "Please enter your account number<br/>";
}


//Let's get passowrd from db
$query = mysqli_query($mysqli,"select password from vendors where email='$email'");
$row = mysqli_fetch_array($query);

$mypass = $row['password'];

if(!empty($_POST['password'])){
$oldPwd = encryptIt($_POST['password']);

if(!empty($_POST['new_password'])){
$password = encryptIt($_POST['new_password']);
}else{
	echo "Enter your new password.";
}
//check if old password and db password are equal
if($mypass != $oldPwd){
	echo "Your old password is wrong. Please try again.";
}

}else{
$password = $mypass;
}


   


if(!empty($_POST['name']) && !empty($_POST['vendor_name']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['city'])  && !empty($_POST['persin_in_charge']) && !empty($_POST['bank_name']) && !empty($_POST['ac_num']) && !empty($_POST['ac_name']) ){



//insert into db
$query = mysqli_query($mysqli,"update vendors set name='$name',phone='$phone',vendor_name='$vendor_name',username='$username',password='$password',address='$address',city='$city',country='$country',state='$state',persin_in_charge='$persin_in_charge',bank_name='$bank_name',ac_name='$ac_name',ac_num='$ac_num' where email='$email'");

if($query){
	echo 1;
	
	

}else{
	echo "Error occured ". $mysqli->error;
}


}







//}


?>