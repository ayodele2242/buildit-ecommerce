<?php
require_once '../config/config.php';
require_once '../inc/fetch.php';
require_once '../review_pagination.php';


function mrate($irate){
$stars = '';
for($i=0; $i<5; $i++){
if($irate <= $i){
$class = "empty";
}else{
$class = "star-filled";
}
$stars .= '<ion-icon name="star" class="'.$class.'"></ion-icon>';
}
return $stars;
}

$pid   = $_POST['productid'];
$item_per_page 		= 12; //item to display per page



//Get page number from Ajax
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1; //if there's no page number, set it to 1
}

//get total number of records from database
$results = $mysqli->query("SELECT COUNT(*) FROM review_rating where product_id = '$pid'");
$get_total_rows = $results->fetch_row(); //hold total records in variable
//break records into pages

$total_pages = ceil($get_total_rows[0]/$item_per_page);

//position of records
$page_position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 
$results = $mysqli->prepare("SELECT id, name, review, rating, added_date
				FROM review_rating where product_id = '$pid'
				 ORDER BY id ASC LIMIT $page_position, $item_per_page");
$results->execute(); //Execute prepared Query



$results->bind_result($id, $name, $review, $rating, $added_date); //bind variables to prepared statement

//Display records fetched from database.
//echo $get_total_rows[0];
//echo $total_pages;

if($get_total_rows[0] < 1){
	echo '<div class="alert alert-default col-red text-danger"><h4 class="text-danger">No review yet for this product.</h4></div>';
}else{

while($results->fetch()){ //fetch values
	$img = '<img class="rounded-circle" width="50" src="'. $set['installUrl'].'assets/img/login.png" alt="'.$name.'"/>';
    $irate = $rating;

?>	
	
<div  class="product-review pb-2 mb-1 border-bottom">
<div class="d-flex mb-1"> 
<div class="media media-ie-fix align-items-center mr-2 pr-1"><?php echo $img; ?>
<div class="media-body pl-2"><h6 class="font-size-sm mb-0"><?php echo $name; ?></h6>
<span class="font-size-ms text-muted"><?php echo $added_date; ?></span>
</div>
</div>
<?php echo mrate($irate) ?>
</div> 
<p class="font-size-ms"><?php echo $review; ?></p>
</div> 




<?php	
}
}
echo '<div align="center" class="Page navigation">';
// To generate links, we call the pagination function here. 
echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
echo '</div>';

?>