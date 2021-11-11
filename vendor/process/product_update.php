<?php 

require '../../config/config.php';
require '../../inc/functions.php';




/*for ($i = 0; $i < count($_FILES['upload_files']['name']); $i++) {
// Loop to get individual element from the array
$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
$ext = explode('.', basename($_FILES['upload_files']['name'][$i]));   // Explode file name from dot(.)
$file_extension = end($ext); // Store extensions in the variable.
$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
if (($_FILES["upload_files"]["size"][$i] < 200000)     // Approx. 200kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if (move_uploaded_file($_FILES['upload_files']['tmp_name'][$i], $target_path)) {
// If file moved to uploads folder.
 mysqli_query($mysqli,"insert into product_images(product_id, image )values('$product_id','')")

echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
} else {     //  If File Was Not Moved.
echo $j. ').<span id="error">please try again!.</span><br/><br/>';
}
} else {     //   If File Size And File Type Was Incorrect.
echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
}
}*/

if(isset($_POST)){
$title           = $mysqli->real_escape_string($_POST['title']);
$summary         = $mysqli->real_escape_string($_POST['summary']);
$description     = $mysqli->real_escape_string($_POST['description']);
$cat_id          = (int)$_POST['cat_id'];
$child_cat_id    = isset($_POST['child_cat_id']) ? (int)$_POST['child_cat_id'] : 0;
$discount        = $mysqli->real_escape_string($_POST['discount']);
$brand           = $mysqli->real_escape_string($_POST['brand']);
$size_cat        = $mysqli->real_escape_string($_POST['size_cat']);
$size            = $mysqli->real_escape_string($_POST['size']);


$color           = $mysqli->real_escape_string($_POST['color']);
$quantity        = $mysqli->real_escape_string($_POST['quantity']);
$status          = $mysqli->real_escape_string($_POST['status']);

$vendor_name     = $_POST['vendor_name'];


if($size_cat == "different"){
if(!empty($_POST['variance_price'])){  
$price  = implode(',', $_POST['variance_price']);
}
}else{
$price = $mysqli->real_escape_string($_POST['price']);	
}


$iproduct_id = $_POST['pro_id'];


//Product Images
$j = 0;     // Variable for indexing uploaded image.
$upload_dir = '../../upload/product/'; // upload directory
//Featured Image

$imgFile = $_FILES['feature_img']['name'];
$tmp_dir = $_FILES['feature_img']['tmp_name'];
$imgSize = $_FILES['feature_img']['size'];



$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

// valid image extensions
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

// rename uploading image
$userpic = "Feature-".rand(1000,1000000).".".$imgExt;


if(!empty($_POST['pre_feature'])){
	$pic = $_POST['pre_feature'];
}
else if(!empty($imgFile)){
$pic = $userpic;
move_uploaded_file($tmp_dir,$upload_dir.$pic);
}else{
    $pic = '';
}


  $deleted_file_ids = array();
  if(isset($_POST['deleted_file_ids']) && !empty($_POST['deleted_file_ids'])) {
    $deleted_file_ids = explode(",", $_POST['deleted_file_ids']);
  }


$query = mysqli_query($mysqli, "update product set title = '$title',summary='$summary',description = '$description',cat_id='$cat_id',child_cat_id='$child_cat_id',price = '$price',discount='$discount',brand='$brand',availability='$status',size='$size',color='$color',quantity='$quantity',images = '$pic',size_category='$size_cat' where id = '$iproduct_id'");

if($query){

echo "Done";

if(!empty($_POST['evariance_price'])){  
$price  = implode(',', $_POST['evariance_price']);

mysqli_query($mysqli,"update product set price = '$price' where id = '$iproduct_id'");

}

//color
$colorCount = explode(',', $_POST['color']);
foreach ($colorCount as $color)
 {    
   mysqli_query($mysqli,"INSERT INTO product_colors(product_id,color) 
    VALUES('$iproduct_id', '$color')");            
}
//Brands
$brandCount = explode(',', $_POST['brand']);
foreach ($brandCount  as $brand)
 {    
   mysqli_query($mysqli,"INSERT INTO product_brands(product_id,brand) 
    VALUES('$iproduct_id', '$brand')");            
}

//Check for variant category, we need to insert appropriately
if($size_cat == "single"){
	
//Sizes
$sizeCount = explode(',', $_POST['size']);
foreach ($sizeCount as $size)
 { 		
   mysqli_query($mysqli,"UPDATE product_sizes SET size = '$size' where product_id = '$iproduct_id'");            
}
            
}

if($size_cat == "different"){



if(!empty($_POST['evariance_size'])){
$evar = count($_POST['evariance_size']);
for($i = 0; $i < $evar; $i++)
{

$pic = $_POST['efimgs'][$i];
$variance_size   = $_POST['evariance_size'][$i];
$variance_price  = $_POST['evariance_price'][$i];
$eid  = $_POST['eid'][$i];

 $ins = mysqli_query($mysqli,"UPDATE product_sizes SET size = '$variance_size', variant_price='$variance_price', image='$pic', vendor_name='$vendor_name' where id='$eid'");      

}//for

}else{



$var = count($_POST['variance_size']);	
for($i = 0; $i < $var; $i++)
{

$imgFile = $_FILES['fimgs']['name'][$i];
$tmp_dir = $_FILES['fimgs']['tmp_name'][$i];
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
$userpic = rand(1000,1000000).".".$imgExt;
if(!empty($imgFile)){
$pic = $userpic;
 move_uploaded_file($tmp_dir,$upload_dir.$pic);
}else{
    $pic = '';
}


$variance_size   = $_POST['variance_size'][$i];
$variance_price  = $_POST['variance_price'][$i];

 $ins = mysqli_query($mysqli,"INSERT INTO product_sizes(product_id, size, variant_price, image, vendor_name) 
                VALUES('$product_id', '$variance_size', '$variance_price','$pic','$vendor_name')");      



}//for

if(!$ins){
echo "Error occured: ".$mysqli->error;	
}
}


}//different





//Let upload product images
/*$temp = array();
for($i=0; $i<sizeof($_FILES['upload_files']['name']); $i++) {
    if(!in_array($i, $deleted_file_ids)) {
      if($_FILES['upload_files']['name'][$i] != "") {
        $location = $upload_dir.$_FILES['upload_files']['name'][$i];
        copy($_FILES['upload_files']['tmp_name'][$i], $location); 
        $iname = $_FILES['upload_files']['name'][$i];
        $temp[] = $iname;

      }
    }
  }

//Implode the images and save
$imgs = implode(",", $temp);  
mysqli_query($mysqli,"insert into product_images(product_id, image )values('$product_id','$imgs')");
*/

}else
{
	echo "Error occured: ". $mysqli->error;
}




// Close connection
mysqli_close($mysqli);


}











?>
