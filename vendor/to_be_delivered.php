 <?php
include("vheader.php");
include("nav.php");
include("left_menu.php");

$myproduct = productNotDelivered($username);
?>



 <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Products Awaiting Delivery</h3>
          </div>
        
        </div>
        <div class="content-body">
        	<section class="card">
	<div class="card-body">

		<div class="table-responsive">
		<table class="table table-striped file-export">

			<thead>
                          <th>S.N</th>
                          <th></th>
                          <th>Buyers Name</th>
                          <th>Product Name</th>
                          <th>Color</th>
                          <th>Size</th>
                          <th>Image </th>
                          <th>Price</th>
                          <th>Quantity Bought</th>
                          <th>Total Amount</th>
                          
                          
                         </thead>
                         <tbody>
                          <?php 
                          if ($myproduct) {
                          	$key = 1;
                            foreach ($myproduct as $pro_info) {
                              $email = $pro_info['c_email'];
                              ?>
                              <tr>
                                <td><?php echo $key; ?></td>
                                <td>

                                    <a href="#orderModal" class="btn btn-info delivery_status"  id="<?php echo $pro_info['id']; ?>" data-toggle="modal" data-backdrop="false" data-name="<?php echo $pro_info['product_name']; ?>" data-target="#orderModal">Update Delivery Status</a> 
                                
                              </td>
                                <td><?php echo getBuyerInfo($email); ?></td>
                                <td><?php echo $pro_info['product_name']; ?></td>
                                <td><?php echo $pro_info['color']; ?></td>
                                <td><?php echo $pro_info['size']; ?></td>
                                <td>
                                    <?php 
                                     $sample_image=explode(",", $pro_info['product_image']);
                                    if ($pro_info['product_image'] !="" && file_exists(UPLOAD_DIR.'/product/'.$sample_image[0])) {
                                     
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
                                  	

			                         echo number_format($pro_info['product_price']);
			                      

                                  	?>
                                  		
                                  	</td>
                                  <td><?php echo $pro_info['quantity']; ?></td>
                                  <td><?php  echo number_format($pro_info['total_amount']); ?></td>
                                  
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








<!-- Modal -->
                  <div class="modal fade text-left" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel4" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" id="basicModalLabel4"></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                          <div class="container-fluid bd-example-row" id="contents">
                          
                          </div>
                        </div>
                      
                    </div>
                    </div>
                  </div>
                           













<?php include("vfooter.php"); ?>



<script type="text/javascript">
  $('.delivery_status').click(function(e){ 
  
  e.preventDefault(); 
 var id = $(this).attr("id");  
 var name = $(this).attr("data-name");

 $(".modal-title").html(name);
 
     $('#contents').html(''); 
     $('#modal-loader').show();  
     $.ajax({
          url: '../inc/updateOrder.php',
          type: 'POST',
          data: 'id='+id,
          dataType: 'html'
     })
     .done(function(data){
          $('#contents').html(data); // load here
          $('#modal-loader').hide(); // hide loader  
           $('#orderModal').show();
     })
     .fail(function(){
          $('contents').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

});
</script>