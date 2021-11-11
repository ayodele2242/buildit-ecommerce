<?php
require_once("../inc/config.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $upload_dir = 'profile_img/'; // upload directory
  $email = $_POST['email'];


   $imgFile = $_FILES['photo']['name'];
   $tmp_dir = $_FILES['photo']['tmp_name'];
   $imgSize = $_FILES['photo']['size'];
   $imgType = $_FILES['photo']['type'];
  


  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

// valid image extensions
  $valid_extensions = array('jpeg', 'jpg', 'png'); // image extensions
  $vid_extensions = array('avi', 'mp4', 'wav','3gp','AAC','flv','wmv'); // video extensions
  $aud_extensions = array('mp3'); // audio extensions

   // rename uploading image
    $userpic = rand(1000,1000000).".".$imgExt;
    if(!empty($imgFile)){
    $pic = $userpic;
    }else{
        $pic = '';
    }
    
   if(!empty($imgFile) && in_array($imgExt, $valid_extensions)){
        move_uploaded_file($tmp_dir,$upload_dir.$pic);
    }
    if(!empty($imgFile) && in_array($imgExt, $vid_extensions)){
        move_uploaded_file($tmp_dir,$video.$pic);
    }
    if(!empty($imgFile) && in_array($imgExt, $aud_extensions)){
        move_uploaded_file($tmp_dir,$audio.$pic);
    }


$query = mysqli_query($mysqli,"UPDATE customer_login SET img = '$pic' WHERE email='$email'");
if($query){
  echo $tmp_dir;
  //move_uploaded_file($tmp_dir,$upload_dir.$pic);
}else{
  echo "Error occured: ".$mysqli->error;
}



   /* $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;

    $location = 'profile_img/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);

    echo '<img src="'.$location.'" height="100" width="100" />';*/
    //echo $message = $_POST['message'];
}
  

?>