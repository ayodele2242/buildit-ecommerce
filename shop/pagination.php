<?php
require_once '../config/config.php';
require_once '../inc/fetch.php';

$limit = 2;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

$pid = $_SESSION['pid'];
  
$sql = "SELECT * FROM review_rating where product_id = '$pid'  ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($mysqli, $sql); 
?>

<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
             <!-- Review-->
            <div  class="product-review pb-4 mb-4 border-bottom">
              <div class="d-flex mb-3">
                <div class="media media-ie-fix align-items-center mr-4 pr-2"><img class="rounded-circle" width="50" src="<?php echo $set['installUrl'];  ?>/assets/img/login.png" alt="Rafael Marquez"/>
                  <div class="media-body pl-3">
                    <h6 class="font-size-sm mb-0"><?php echo $row['name'];  ?></h6><span class="font-size-ms text-muted"><?php echo $row['added_date'];  ?></span>
                  </div>
                </div>
                <div>
                  <div class="star-rating">
                   <?php 
                      $class = "fa-star star-filled";
                      for($i=0; $i<5; $i++){
                        if($row['rating'] <= $i){
                          $class = "fa-star-o empty";
                        }
                        echo '<i class="fa '.$class.'"></i>';
                      }
                      
                    ?>
                  </div>
                  
                </div>
              </div>
              <p class="font-size-md mb-2"><?php echo $row['review'];  ?></p>
             
             
            </div>
<?php  
};  
?>
