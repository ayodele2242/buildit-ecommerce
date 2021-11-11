<?php 
include('../config.php');



	//$name = $mysqli->real_escape_string($_POST['name']);
	$url = $mysqli->real_escape_string($_POST['url']); 
    
    if($url == ""){
    $urlf = "";
    }else{
    $urlf = $url;
    }

	//$desc = $mysqli->real_escape_string($_POST['description']);
	
	$fileName = $_FILES['slidderImg']['name'];

	$type = explode('.', $fileName);
	$type = $type[count($type) - 1];

	$imgUrl = '../../assets/uploads/' . uniqid(rand()) . '.' . $type;

	if(empty($fileName)){
		echo "You can't upload empty image";
	}


	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['slidderImg']['tmp_name'])) {
			if(move_uploaded_file($_FILES['slidderImg']['tmp_name'], $imgUrl)) {

				// insert into database
				$sql = "INSERT INTO slidder (img_name, url) VALUES ('$imgUrl', '$urlf')";

				
				if ($mysqli->query($sql) === TRUE) {

					$last_id = $mysqli->insert_id;

				 if(!empty($_POST['slider_text'])){

					$rowCount = count($_POST['slider_text']);

					for($i = 0; $i < $rowCount; $i++)
					 { 		
					$stext 	  = $_POST['slider_text'][$i];	
					$atype    = $_POST['animation_type'][$i];
					$position = $_POST['text_position'][$i];
					                $sql = "INSERT INTO slidder_animation(slidder_id,slider_text,animation_type,	text_position) 
					                VALUES('$last_id', '$stext','$atype','$position')";

					              $suc =  mysqli_query($mysqli, $sql);  
					            
					 }
				 }

				 if( $suc){
				 	echo "saved";
				 }else if(! $suc){
				 	echo "saved";
				 }else{
				 	echo $mysqli->error;
				 }


					
				} 
				else {
				echo "Query could not execute.! " . $mysqli->error;
				}



			}
			else {
				echo "Error uploading image";
			}
		}
	}

