<?php 

require '../../config/config.php';
require '../../inc/functions.php';


if(isset($_POST['id']) && isset($_POST['vendor'])){

$id = $mysqli->real_escape_string($_POST['id']);
$vendor = $mysqli->real_escape_string($_POST['vendor']);


$query = mysqli_query($mysqli,"delete from product_sizes where id='$id' and vendor_name ='$vendor'");

if($query){
	echo "Done";
}else{
	echo "Error deleting. Please try again.";
}




}


?>