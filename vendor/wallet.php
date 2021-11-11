 <?php
include("vheader.php");
include("nav.php");
include("left_menu.php");

			
 ?>
 

 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Wallet</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            
          </div>
        </div>
        <div class="content-body">
        	<section class="card">
	<div id="invoice-template" class="card-body">

		<div class="row">
            <div class="col-lg-12"><h4>Your sales / earnings</h4></div>


            <div class="col-lg-6 row mt-5 bg-info p-5">
                <div class="col-lg-12 text-center"><h3>Earnings (before charges)</h3></div>
                 <div class="col-lg-12 text-center">
                    <h1><?php  echo $left_currency.totalAmt($username).$right_currency;  ?></h1>
                 </div>
            </div>


            <div class="col-lg-6 row mt-5 bg-info p-5">
                <div class="col-lg-12 text-center"><h3>Your balance</h3></div>
                 <div class="col-lg-12 text-center">
                    <h1><?php  echo $left_currency.totalEarning($username).$right_currency;  ?></h1>
                 </div>
            </div>


		</div>

		

	

		

	

	</div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->



<?php include("vfooter.php"); ?>
