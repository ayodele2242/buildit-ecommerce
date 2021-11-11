<?php
require_once '../functions.php';

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password'])){


$name = safe_input($mysqli,$_POST['name']);
$phone = safe_input($mysqli,$_POST['phone']);
$pass = encryptIt($_POST['password']);
$dob  = safe_input($mysqli,$_POST['dob']);
$ac_no = safe_input($mysqli,$_POST['bank_account_number']);
$acname = safe_input($mysqli,$_POST['bank_account_name']);
$bank = safe_input($mysqli,$_POST['bank_name']);


if($_POST['password'] != $_POST['cpassword']){
	echo "Password and confirm password are not equal";
}


//Check for valid email
$email = safe_input($mysqli, $_POST['email']);
$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($emailB, FILTER_VALIDATE_EMAIL) === false ||
    $emailB != $email
) {
    echo "This email adress isn't valid<br/>";
}



//get if email already exist in db
$getU = "SELECT email from members WHERE email ='$email'";

$ok = mysqli_query($mysqli, $getU);
$countIt = mysqli_num_rows($ok);

if($countIt > 0){
	echo "That email address already exist. If it belongs to you please log in.";
}else{
if ($_POST['password'] == $_POST['cpassword']) {
	# code...

$email_activation_key = md5($email . $name);

$sql = mysqli_query($mysqli,"insert into members(name,email,phone,dob,password,account_name,account_number,bank_name,token)values('$name','$email','$phone','$dob','$pass','$acname','$ac_no','$bank','$email_activation_key')");


if($sql){
	echo 1;
    

}else{
	echo "Error occured: ".$mysqli->error;
}

}
}


}else{
	echo "Check for empty values in your inputs.";
}















?>