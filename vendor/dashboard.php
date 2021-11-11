 <?php
include("vheader.php");
include("nav.php");
include("left_menu.php");

 
$chart_data="";
$sell = getVendorSale($username);
    foreach($sell as $row){
	
	        $productname[]  = $row['product_name']  ;
            $sales[] = $row['quantity'];
}

			
 ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Dashboard</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            
          </div>
        </div>
        <div class="content-body">
        	<section class="card">
	<div id="invoice-template" class="card-body">

		<div class="row">

			        <div style="width:100%;hieght:40%;text-align:center">
            <h2 class="page-header" >Analytic Sales Report </h2>
            <div>Product </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    


		</div>

		<div class="row">

			<h5>Daily Orders</h5>
			<div class="col-lg-12 table-responsive responsive-table">
				<table class="table table-striped">
					<thead>
							<th>ID</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Total Amount</th>
							<th>Date</th>
					</thead>

					<tbody>
						
						<?php
						$i = 1;
						$dSale = dailySale($username);
						foreach ($dSale as $value) {
						?>

						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['product_name'];  ?></td>
							<td><?php echo $value['quantity'];  ?></td>
							<td><?php echo number_format($value['price']);  ?></td>
							<td><?php echo $value['year'].'/'.$value['month'].'/'.$value['day'];  ?></td>


						</tr>		

						<?php
						$i++;
						}


						?>

					</tbody>

				</table>


			</div>	




		</div>

	

		

	

	</div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->



<?php include("vfooter.php"); ?>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>