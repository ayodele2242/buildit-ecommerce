
<?php include 'inc/header.php' ;
require 'inc/session.php'; 
require '../class/login_register.php';
require '../class/customer_info.php';
require '../class/customer_order.php';

$cus_login = new LoginRegister();
$customer_login = $cus_login->getAllLoginInfo();
//debugger($customer_login);
$login_id=$customer_login[0]->id;
$cus_info = new Customer_info();
$customer_cus_info = $cus_info->getCustomerById($login_id);
//debugger($customer_c_info);
//$customer_info = $cus_info->getAllInfo();
//debugger($customer_info,true);

$cus_order = new Customer_order();
//$customer_cus_order = $cus_order->getAllOrderByCInfoId($customer_cus_info[0]->id);
//debugger($customer_c_order,true);
//$customer_order = $cus_order->getAllOrderByCInfoId($customer_info[1]->id);
//debugger($_SESSION,true);

$myproduct = adminPaidOrder();
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
                <h5>Order Management Page</h5>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
          <div class="x_content">

                   <div class="table-responsive">
    <table class="table table-striped file-export">

      <thead>
                          <th>S.N</th>
                          <th></th>
                          <th>Buyers Name</th>
                          <th>Product Name</th>
                          <th>Payment Method</th>
                          <th>Payment Status</th>
                          <th>Color</th>
                          <th>Size</th>
                          <th>Image </th>
                          <th>Price</th>
                          <th>Quantity Bought</th>
                           <th>Shipping Address</th>
                          <th>Total Amount</th>

                          
                         </thead>
                         <tbody>
                          <?php 
                          if ($myproduct) {
                            $key = 1;
                            foreach ($myproduct as $pro_info) {
                              $email = $pro_info['c_email'];
                              $transid = $pro_info['transId'];
                              ?>
                              <tr>
                                <td><?php echo $key; ?></td>
                                <td>

                                    <a href="#orderModal" class="btn btn-info delivery_status"  id="<?php echo $pro_info['id']; ?>" data-toggle="modal" data-backdrop="false" data-name="<?php echo $pro_info['product_name']; ?>" data-target="#orderModal">Update Delivery Status</a> 
                                
                              </td>
                                <td><?php echo getBuyerInfo($email); ?></td>
                                <td><?php echo $pro_info['product_name']; ?></td>
                                 <td><?php echo $pro_info['payment']; ?></td>
                                 <td><?php if($pro_info['status'] == "Paid"){ echo '<span class="text-success">Paid</span>'; }else{ echo '<span class="text-warning">Payment Pending</span>'; }  ?></td>
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
                                  <td><?php echo shippingTo($transid); ?></td>
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
                          <div class="container-fluid bd-example-row" id="contents">
                          
                          </div>
                        </div>
                      
                    </div>
                    </div>
                  </div>

<script src="<?php echo CMS_VENDORS;?>jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo CMS_VENDORS;?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo CMS_VENDORS;?>fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo CMS_VENDORS;?>nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo CMS_JS;?>custom.min.js"></script>
    
     <script src="<?php echo CMS_JS;?>jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    // $('.table').DataTable();
    // $('.table_prop').DataTable();
    function removeAll(cusinfo_id){
      $.post('inc/api1.php',{customer_id:cusinfo_id, act:"<?php echo substr(md5('remove-all-order'), 3,15); ?>"},function(res){
        
        document.location.href = document.location.href;
      });
    }

    function delivered(pro_order_id){
      $.post('inc/api1.php',{order_id:pro_order_id, act:"<?php echo substr(md5('deliverd-this-order'), 3,15); ?>"},function(res){
        //alert(res);
        document.location.href = document.location.href;
      });
    }

    function removeOrder(order_id){
      $.post('inc/api.php',{order_id:order_id, act:"<?php echo substr(md5('remove-this-order'), 3,15); ?>"},function(res){
       // alert(res);
        document.location.href = document.location.href;
      });
    }

  setTimeout(function(){
    $('.alert').slideUp('slow');
    }, 5000);
   function viewThumbnail(input, thumbnail_id = 'thumbnail_img'){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#'+thumbnail_id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
   }
 </script>


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

  </body>
</html>

    <!-- jQuery -->
    