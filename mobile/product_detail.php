<?php
require_once '../config/config.php';
$id = $_POST['detailid'];

$sql = mysqli_query($mysqli, "select description, summary from product where id='$id'");
$row = mysqli_fetch_array($sql);
$desc = $row['description'];
$summary = $row['summary'];
?>

 <div class="col-lg-12 font-size-sm" style="word-wrap: break-word; ">
    <?php 
    if(!empty($desc)){
    echo html_entity_decode($desc); 
    }else{
    echo $summary;
    }
    ?>
</div>