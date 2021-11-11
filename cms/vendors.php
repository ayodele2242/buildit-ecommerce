
<?php include 'inc/header.php' ;
require 'inc/session.php';
require '../class/login_register.php';
$login = new LoginRegister();
$vendors = allvendor();
//debugger($_SESSION,true);
      ?>
    <div class="container body">
      <div class="main_container">
<?php include 'inc/sidebar.php'; ?>
        <!-- /page content -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="page-title">
              <div class="title_left">
                <h5>Sellers Management Page</h5>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content table-responsive">
                     <table class="table table_view">
                      <thead>
                        <th> Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Shop Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Bank Name</th>
                        <th>A/c Name</th>
                        <th>A/c Number</th>
                        
                      </thead>
                       <tbody>
                        <?php foreach($vendors as $ivendor){ 
                          
                          ?>
                           <tr>
                           <td><?php echo $ivendor['name']; ?></td>
                           <td><?php echo $ivendor['phone']; ?></td>
                           <td><?php echo $ivendor['email']; ?></td>
                           <td><?php echo $ivendor['vendor_name']; ?></td>
                           <td><?php echo $ivendor['address']; ?></td>
                           <td><?php echo $ivendor['city']; ?></td>
                           <td><?php echo $ivendor['bank_name']; ?></td>
                           <td><?php echo $ivendor['ac_name']; ?></td>
                           <td><?php echo $ivendor['ac_num']; ?></td>
                          
                         </tr>
                       <?php } ?>
                        
                       </tbody>
                     </table>
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
<?php include 'inc/footer.php'; ?>
    <!-- jQuery -->
    