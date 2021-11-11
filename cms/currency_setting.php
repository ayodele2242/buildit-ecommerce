
<?php include 'inc/header.php' ;
require 'inc/session.php';
//debugger($_SESSION,true);
      ?>
    <div class="container body">
      <div class="main_container">
<?php include 'inc/sidebar.php';?>
        <!-- /page content -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php getFlash();?>
            <div class="page-title">
              <div class="title_left">
                <h5>Currency Setting </h5>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                     
                     <p>
The following options affect how prices are displayed on the frontend of your store.

  </p>     
    <form id="currencyupdateForm" class="refresh">
      <div class="col s12">
      
        <div class="card-contents">
        
            <div class="row">
               <div class="input-field col s12 m2">
                <label for="currency">Currency</label>
              </div>
              <div class="input-field col s12 m7">
                <select id="currency" class="browser-default mselect" name="currency">
                  <?php echo currency(); ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 m2">
                <label for="currency">Currency Position</label>
              </div>
              <div class="input-field col s12 m7">
                <select id="currency_position" class="browser-default mselect" name="currency_position">
                  <option value="left" <?php if($cpost == "left"){ echo "selected";} ?>>Left</option>
                  <option value="right" <?php if($cpost == "right"){ echo "selected";} ?>>Right</option>
                  <option value="left-space" <?php if($cpost == "left-space"){ echo "selected";} ?>>Left with a space</option>
                   <option value="right-space" <?php if($cpost == "right-space"){ echo "selected";} ?>>Right with a space</option>
                </select>
              </div>
            </div>


              <div class="row">
                <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="submit" id="updateCurrency">Update</button>
               
              </div>
            </div>
          </form>

                     
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
    