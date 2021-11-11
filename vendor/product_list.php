 <?php
include("vheader.php");
include("nav.php");
include("left_menu.php");

$myproduct = vendorAvailabileProducts($username);
?>



 <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Products</h3>
          </div>
        
        </div>
        <div class="content-body">
        	<section class="card">
	<div class="card-body">

		<div class="table-responsive">
		<table class="table">

			<thead>
                          <th>S.N</th>
                          <th>Name</th>
                          <th>Sample </th>
                          <th>Price</th>
                          <th>Quantity Left</th>
                          <th>Availability</th>
                          <th>Action</th>
                         </thead>
                         <tbody>
                          <?php 
                          if ($myproduct) {
                          	$key = 1;
                            foreach ($myproduct as $pro_info) {
                              ?>
                              <tr>
                                <td><?php echo $key; ?></td>
                                <td><?php echo $pro_info['title']; ?></td>
                                <td>
                                    <?php 
                                     $sample_image=explode(",", $pro_info['images']);
                                    if ($pro_info['images'] !="" && file_exists(UPLOAD_DIR.'/product/'.$sample_image[0])) {
                                     
                                      ?>
                                      <div class="img img-responsive">
                                        <img src="<?php echo UPLOAD_URL.'product/'.$sample_image[0];?>" class="img img-thumbnail" style="width:150px;">
                                      </div>
                                      <?php
                                    } 
                                    ?>
                                  </td>
                                  <td>
                                  	<?php 
                                  	

                                  	if($pro_info['size_category'] == "different"){
			                         $prices = $pro_info['price'];
			                         $amt = explode(",", $prices);
			                         $min = min($amt);
			                         $max = max($amt);

			                          $price = " ".$left_currency.number_format($min).$right_currency.' - '." ".$left_currency.number_format($max).$right_currency; 

                                 echo $price;
                         

			                        }else{
			                         echo number_format($pro_info['price']);
			                      }

                                  	?>
                                  		
                                  	</td>
                                  <td><?php echo $pro_info['quantity']; ?></td>
                                  <td><?php if ($pro_info['availability'] == 1) {
                                    echo '<span class="text-success">Available</span>';
                                  }elseif ($pro_info['availability'] == 0) {
                                    echo '<span class="text-danger">Out of Stock</span>';
                                  }else{
                                    echo "Stock not found";
                                  } ?>
                                  </td>
                                  <td>
                                    
                                  <a href="product_edit?id=<?php echo $pro_info['id']; ?>" class="btn-floating text-info waves-effect waves-light gradient-45deg-amber-amber"><i class="fa fa-pencil"></i></a> &nbsp;
                                 

                                  <a type="button" id="<?php echo $pro_info['id']; ?>" class="btn-floating waves-effect waves-light gradient-45deg-red-pink small text-danger" onclick = "return confirm('Are you sure you want to delete this product?');"><i class="fa fa-trash"></i></a>

                              </td>
                              </tr>
                              <?php
                              $key++;
                            }

                          }
                           ?>
                          
                           
                         </tbody>



		</table>
	</div>


	</div>
</section>
</div>
</div>
</div>















<?php include("vfooter.php"); ?>



