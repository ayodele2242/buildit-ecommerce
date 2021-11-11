<?php
require_once '../config/config.php';

$query = mysqli_query($mysqli, "select id, size from product where id not in(SELECT product_id from product_sizes) AND size != ''");

while($row = mysqli_fetch_array($query)){
$brand = explode(",", $row['size']);

foreach ($brand as $brands) {
	//echo $row['id'] .' '.$colors.'<br/>';
	//insert into database

	$querys =  mysqli_query($mysqli,"INSERT INTO product_sizes(product_id,size) 
                VALUES('".$row['id']."', '$brands')");

	if($querys){
	echo "Done";
}else{
	echo $mysqli->error;
}
}

}




?>