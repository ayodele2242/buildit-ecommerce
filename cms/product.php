
<?php include 'inc/header.php' ;
require 'inc/session.php';
require_once '../class/product.php';

$product_info = new Product();
$all_product = $product_info->getAllProducts();
//debugger($all_product,true);

      ?>
    <div class="container body">
      <div class="main_container">
<?php include 'inc/sidebar.php'; ?>
        <!-- /page content -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php getFlash();?>
            <div class="page-title">
              <div class="title_left">
                <h5>Product Page</h5>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
                   <div class="pull-right">
                     <a class="btn btn-success" href="product_add.php"><i class="fa fa-plus"></i>Add Product</a>
                   </div>
                    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                     <table class="table table_view">
                        <thead>
                          <th>S.N</th>
                          <th>Name</th>
                          <th>Sample </th>
                          <th>Price</th>
                          <th>Discount</th>
                          <th>Availability</th>
                          <th>Action</th>
                         </thead>
                         <tbody>
                          <?php 
                          if ($all_product) {
                            foreach ($all_product as $key => $pro_info) {
                              ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $pro_info->title; ?></td>
                                <td>
                                    <?php 
                                     $sample_image=explode(",", $pro_info->images);
                                    if ($pro_info->images !="" && file_exists(UPLOAD_DIR.'/product/'.$sample_image[0])) {
                                     
                                      ?>
                                      <div class="img img-responsive">
                                        <img src="<?php echo UPLOAD_URL.'product/'.$sample_image[0];?>" class="img img-thumbnail" style="width:150px;">
                                      </div>
                                      <?php
                                    } 
                                    ?>
                                  </td>
                                  <td><?php echo $pro_info->price; ?></td>
                                  <td><?php echo $pro_info->discount; ?></td>
                                  <td><?php if ($pro_info->status == 1) {
                                    echo "Approved";
                                  }elseif ($pro_info->status == 0) {
                                    echo '<a href="#orderModal" class="text-danger approveme" id="'.$pro_info->id.'" data-name="'.$pro_info->title.'" data-toggle="modal" data-backdrop="false" data-target="#orderModal">Waiting approval</a>';
                                  }else{
                                    echo "Stock not found";
                                  } ?>
                                  </td>
                                  <td>
                                     <?php 
                                  $vrl = "product_add?id=".$pro_info->id."&act=".substr(md5($_SESSION['session_id']."edit-product".$pro_info->id), 5,15);
                                   ?>
                                  <a href="<?php echo $vrl; ?>" class="btn-floating waves-effect waves-light gradient-45deg-amber-amber  btn-link"><i class="fa fa-pencil"></i></a>
                                  <?php 
                                  $url = "process/product?id=".$pro_info->id."&act=".substr(md5($_SESSION['session_id']."del-product".$pro_info->id), 5,15);
                                   ?>
                                  <a href="<?php echo $url; ?>" class="btn-floating waves-effect waves-light gradient-45deg-red-pink small btn-link" onclick = "return confirm('Are you sure you want to delete this product?');"><i class="fa fa-trash"></i>Delete</a></td>
                              </tr>
                              <?php
                            }
                          }
                           ?>
                          
                           
                         </tbody></table></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- footer content -->
        <?php include 'inc/copy.php'; ?>
        <!-- /footer content -->
      </div>
    </div>




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
                          <div id="contents">
                          
                          </div>
                        </div>
                      
                    </div>
                    </div>
                  </div>






<?php include 'inc/footer.php'; ?>
    <!-- jQuery -->
    
    <script type="text/javascript">
  $('.approveme').click(function(e){ 
  
  e.preventDefault(); 
 var id = $(this).attr("id");  
 var name = $(this).attr("data-name");

 $(".modal-title").html(name);
 
     $('#contents').html(''); 
     $('#modal-loader').show();  
     $.ajax({
          url: '../inc/approveVendorProduct.php',
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