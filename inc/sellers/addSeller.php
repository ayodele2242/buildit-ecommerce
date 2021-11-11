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
if(!empty($_POST['email'])){
$email = safe_input($mysqli, $_POST['email']);
$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($emailB, FILTER_VALIDATE_EMAIL) === false ||
    $emailB != $email
) {
    echo "This email adress isn't valid<br/>";
}

}else{
	echo "Email address is required<br/>";
}

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


if(!empty($_POST['password'])){
$pass = encryptIt($_POST['password']);
}else{
	echo "Enter password<br/>";
}
if(!empty($_POST['cpassword'])){
$pass2 = encryptIt($_POST['cpassword']);
}else{
	echo "Enter confirm password<br/>";
}

if($pass != $pass2){
	echo "Password and confirm password are not the same<br/>";
}

if(!empty($_POST['agreement'])){
$agreement = $_POST['agreement'];
}else{
	echo "You need to agree to BuildiT E-Contract agreement";
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



//get if email already exist in db
$getU = "SELECT email from vendors WHERE email ='$email'";

   $ok = mysqli_query($mysqli, $getU);
   $countIt = mysqli_num_rows($ok);

$vgetU = "SELECT vendor_name from vendors WHERE vendor_name ='$vendor_name'";

   $vok = mysqli_query($mysqli, $vgetU);
   $vcountIt = mysqli_num_rows($vok);

   
if($countIt > 0){
	echo "That email address already exist. If it belong to you please log in.";
}else if($vcountIt > 0){
echo "The Store name already exist in our system. You can add a unique numbers to it to make it uniqid to only you.";
}else{

if(!empty($_POST['name']) && !empty($_POST['vendor_name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['password'])  && $_POST['password'] == $_POST['cpassword'] && !empty($_POST['persin_in_charge']) && !empty($_POST['bank_name']) && !empty($_POST['ac_num']) && !empty($_POST['ac_name']) ){

$email_activation_key = md5($email . $name . $username);	

//insert into db
$query = mysqli_query($mysqli,"insert into vendors(name,phone,vendor_name,username,password,email,address,city,country,state,persin_in_charge,bank_name,ac_name,ac_num,token)
	values('$name','$phone','$vendor_name','$username', '$pass','$email','$address','$city','$country', '$state',
	'$persin_in_charge','$bank_name','$ac_name','$ac_num','$email_activation_key')");
if($query === true){
	echo 1;
	
	$udi = mysqli_insert_id($mysqli);
	
	// create account verification link
        $link = 'https://' . $_SERVER['SERVER_NAME'] . '/vendor/activation?key=' . $email_activation_key;
        $to      = $email;
        $from = 'buildit@buildit.com.ng'; 
$fromName = 'Buildit'; 
 
$subject = "Verify Your Email Address.";

$htmlContent = '
<html> 
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
          <title>Verify Your Email Address</title> 
    </head> 
    <body> 

<div style=" text-align:center"><img src="'.$set['installUrl'].'logo/'.$set['logo']. '" width="120" height="80"/></div>    

<p>Hello ' .$name.',</p>
<p>Thank you for registering on BuildiT. To gain access to your account you need to verify your email address. </p>
<p>
Please follow the link below to verify your email address
</p>

<p></p>
<p></p>
<p></p>
<p>'.$link.'</p>
<p></p>
<p></p>
<p></p>
<p></p>
<p>Buildit Team.</p>
</body> 
</html>';


// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

//$headers  ="From: billing@homeawayfromhomelagos.com";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to, $subject, $htmlContent, $headers);   


}else{
	echo "Error occured ". $mysqli->error;
}


}



}



//}


?>