<?php

function orderTransactions($email){
    global $mysqli;
    $query = "SELECT * FROM transactions WHERE payer_email = '$email' order by order_date desc";
    $result = mysqli_query($mysqli,$query);
    $resArr = array(); //create the result array
    while($row = mysqli_fetch_assoc($result)) { //loop the rows returned from db
      $resArr[] = $row; //add row to array
    }
    return $resArr;   
    } 

function is_valid($d) {
   if (strtotime($d) < strtotime('+7 day')) {
      return true;
   }
   else 
      return false;
}
    

?>