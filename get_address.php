<?php
require_once("config/config.php");
require_once("inc/functions.php");
require_once("config/function.php");

if(isset($_POST['id'])){

	$id= $_POST['id'];

	$query = mysqli_query($mysqli,"select * from customer_address where user_id='$id'");

    $row = mysqli_fetch_array($query);

?>

<style>

.fancy-blue{position:relative; }
.fancy-blue span:before {
    content: ' ';
    width: 20px;
    position: absolute;
    left: 0;
    height: 20px;
    border: 1px solid #2196F3;
    border-radius: 50%;
    top: -1px;
  background:#fff;
}
.iradio.fancy-blue label input[type="radio"]:checked ~ span:before {
    border: 1px solid #03A9F4;
}
.iradio.fancy-blue label input[type="radio"]:checked ~ span:after {
    content: ' ';
    width: 8px;
    height: 8px;
    position: absolute;
    border-radius: 50%;
    left: 6px;
    top: 5px;
    background: #03A9F4;
    /* z-index: 9; */
}

</style>



<form id="UpdateAddrForm">
         
<div class="mymsg"></div>
          <div class="row">
            
                <input class="form-control" type="hidden" id="email" value="<?php echo $_SESSION['email'];  ?>" name="email">
                <input class="form-control" type="hidden" value="<?php echo $row['user_id'];  ?>" name="user_id">
                <input class="form-control" type="hidden" value="<?php echo $row['uid'];  ?>" name="uid">
            
            <div class="col-sm-12">
              <div class="form-group">
                <label for="checkout-phone">Phone Number</label>
                <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $row['mobile']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-company">Company<small>(Optional)</small></label>
                <input class="form-control" type="text" id="company"  name="company" value="<?php echo $row['company']; ?>">
              </div>
            </div>
            
              <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-zip">ZIP Code</label>
                <input class="form-control" type="text" id="zip" name="zip" value="<?php echo $row['zip']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-country">Country</label>
                <select class="form-control custom-select" id="micountry" name="country">
                  <option value="">Choose country</option>
                   <?php 
                    $ccsql="SELECT id,name,iso2 FROM countries";
			        $ccsql_run = mysqli_query($mysqli, $ccsql);

			        while ($rows=mysqli_fetch_array($ccsql_run)) {
			       if($row["country"] == $rows["id"]){
			        $selected = "selected";
			       }else{
			        $selected = "";
			       }

			            echo '<option value="'.$rows["id"].'" '.$selected.'>'.$rows["name"].'</option>';
			    }

                    ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-city">State</label>
                <select id="mistates" class="form-control custom-select" name="state">
                  <?php
                  $sql = "SELECT * FROM  states WHERE country_id = '".$row["country"]."'"; 
				   $result = mysqli_query($mysqli,$sql);
				   $count = mysqli_num_rows($result);

				   //$json = [];
				   if($count > 0){
				   	echo '<option value="*">*</option>';
				   while($crow = mysqli_fetch_assoc($result)){

				   	   if($crow['name'] == $row['state']){
				        $selected = "selected";
				    }else{
				        $selected = "";
				    }
				    echo '<option value="'.$crow['name'].'" '.$selected.'>'.$crow['name'].'</option>';
				        //$json[$row['id']] = $row['name'];

				   }
				}else{
				  echo '<option value="*">*</option>';
					//echo $mysqli->error;
				   //echo json_encode($json);
				}



                  ?>
                </select>
              </div>
            </div>
          
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-1">Address 1</label>
                <input class="form-control" type="text" id="address1" name="address1" value="<?php echo $row['address1']; ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address-2">Address 2</label>
                <input class="form-control" type="text" id="address2" name="address2" value="<?php echo $row['address2']; ?>">
              </div>
            </div>
          </div>

          <div class="row mb-2">
          <div class="col-11">
          <div class="iradio fancy-blue">
          <label>
          <input type="radio"  name="default-address" value="1" <?php if($row['default_address'] == "1"){ echo 'checked="checked"'; } ?>  id="same-address">
           
            <span class="ml-1">Set as default shipping address</span>
          </label>
        </div>
          </div><!--#col-3-->


          </div>

         

           <div class="modal-footer">
                  <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                  <button class="btn btn-primary btn-shadow btn-sm" id="updateAddrForm" type="button">Update</button>
                </div>
         
           </form>



<?php
}
?>



<script type="text/javascript">
	$(document).ready(function()
{
$("#mcountry").change(function()
{
var country_id=$(this).val();
var post_id = 'country_id='+ country_id;
//alert(post_id);
 
$.ajax
({
type: "POST",
url: "inc/country.php",
data: post_id,
cache: false,
success: function(cities)
{
$("#mstates").html(cities);
} 
});
 
}).trigger('change');
});

//Get tax state from the selected country
$(document).ready(function()
{
$("#taxcountry").change(function()
{
var country_id=$(this).val();
var post_id = 'country_id='+ country_id;
 
$.ajax
({
type: "POST",
url: "inc/tax/states.php",
data: post_id,
cache: false,
success: function(cities)
{
$('#mstates').empty();
$("#taxstates").html(cities);
} 
});
 
}).trigger('change');
});




$('#updateAddrForm').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#UpdateAddrForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"inc/updateShippingAddress.php",  
                method:"POST",  
                data: $("#UpdateAddrForm").serialize(), 
                //processData: false,
                //contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){
                   $(".mymsg").html('<div class="text-success">Successfully updated.</div>').show();
          setTimeout(function() {
              $(".mymsg").fadeOut(1500);
          }, 10000);
 
                 // $('#productForm')[0].reset();  
                //location.href = 'checkout.php';
                  document.location.href = document.location.href;
                 
                  }else{
                    $(".mymsg").html('<div class="warning">'+data+'</div>').show();
          setTimeout(function() {
              $(".mymsg").fadeOut(1500);
          }, 10000);
                  }
                     //alert(data);  
                     
                }  
           }); 


      }); 

</script>