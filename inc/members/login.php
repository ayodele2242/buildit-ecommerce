<?php
//require_once '../config.php';
require_once '../functions.php';


$email = safe_input($mysqli,$_POST['email']);
$password = encryptIt($_POST['password']);
$sql = "
SELECT 
id, 
email, 
password,
status
FROM 
customer_login 
WHERE 
email = '$email' 
AND password='$password'";


$resultset = mysqli_query($mysqli, $sql) or die("database error:". mysqli_error($mysqli));

$row = mysqli_fetch_array($resultset);



if($row['password']==$password AND $row['email']==$email AND $row['status']=='1'){
echo "ok";

$_SESSION['login_id'] = $row['id'];
$_SESSION['email'] = $row['email'];

}else if($row['password']==$password AND  $row['email']==$email AND $row['status'] == '0' ){
echo "i";
}	
else if($row['password']==$password AND  $row['email']==$email AND $row['status'] == '2'){
echo "s";
}else {
echo " Invalid login details entered"; // wrong details
}


?>