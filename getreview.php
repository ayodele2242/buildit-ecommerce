<?php

			require_once 'config/config.php';
			require_once 'inc/fetch.php';
		function mrate($irate){
		    $stars = '';
		    for($i=0; $i<5; $i++){
		        if($irate <= $i){
		            $class = "fa-star-o empty";
		        }else{
		            $class = "fa-star star-filled";
		        }
		        $stars .= '<i class="fa '.$class.'"></i>';
		    }
		    return $stars;
		}

			$perPage = 2;

			if (isset($_GET["page"]) && isset($_GET["page"])) { 
				$page  = $_GET["page"]; 
			} else { 
				$page = 1; 
			};  
			
			$startFrom = ($page-1) * $perPage;  

			$pid   = $_SESSION['pid'];


			$sqlQuery = "SELECT id, name, review, rating, added_date
				FROM review_rating where product_id = '$pid' ORDER BY id DESC LIMIT $startFrom, $perPage";  
			$result = mysqli_query($mysqli, $sqlQuery); 
			$paginationHtml = '';
			while ($row = mysqli_fetch_assoc($result)) {  

				$img = '<img class="rounded-circle" width="50" src="'. $set['installUrl'].'assets/img/login.png" alt="'.$row["name"].'"/>';
                 $irate = $row['rating'];

                // echo mrate($irate);

                   

				$paginationHtml.='<div  class="product-review pb-4 mb-4 border-bottom">'; 
				$paginationHtml.='<div class="d-flex mb-3">';  
				$paginationHtml.='<div class="media media-ie-fix align-items-center mr-4 pr-2">'.$img;  
				$paginationHtml.='<div class="media-body pl-3"><h6 class="font-size-sm mb-0">'.$row["name"].'</h6>';
				$paginationHtml.='<span class="font-size-ms text-muted">'.$row['added_date'].'</span></div></div>';
				$paginationHtml.='<div><div class="star-rating">'.mrate($irate).'</div></div>'; 
				$paginationHtml.='</div>'; 
				$paginationHtml.='<p class="font-size-md mb-2">'.$row['review'].'</p>'; 
				$paginationHtml.='</div>';  
			} 
			$jsonData = array(
				"html"	=> $paginationHtml,	
			);
			echo json_encode($jsonData); 




            
            ?>