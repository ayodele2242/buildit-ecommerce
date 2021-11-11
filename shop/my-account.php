 <?php
include("header.php");
include("navs.php");

if(!isset($_SESSION['email'])){
    header('Location: account-signin');
}else{

$email = $_SESSION['email'];
$query = mysqli_query($mysqli,"select * from customer_login where email = '$email'");
$udetails = mysqli_fetch_array($query);
$uid = $udetails['id'];
$_SESSION['login_id'] = $uid;


$addr = addresses($uid);

?>


<div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="new"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Addresses</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Account Overview</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
      <div class="row">
        <!-- Sidebar-->
        <?php
        include("left-nav.php");
        ?>
        <!-- Content  -->
        <section class="col-lg-8 bg-white pb-4 pt-4">
         
          <!-- Addresses list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Address</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

              	<?php
                if($addr){
              	foreach ($addr as $myaddr) {
              	?>

                <tr>
                  <td class="py-3 align-middle"><?php  echo $myaddr['address1'] ?>   <?php  if($myaddr['default_address'] == 1){ ?><span class="align-middle badge bg-purple ml-2">Primary</span><?php } ?></td>
                  <td class="py-3 align-middle">
                    <a class="nav-link-style mr-2 edit" type="button" data-toggle="modal" data-target="#umodal"  data-toggle="tooltip" title="Edit" id="<?php  echo $myaddr['user_id']; ?>"><i class="fa fa-edit"></i></a>

                  	<a type="button" class="nav-link-style text-danger del" id="<?php  echo $myaddr['user_id']; ?>" ata-toggle="tooltip" title="Remove">
                      <div class="fa fa-trash"></div></a></td>
                </tr>

                <?php
                }
              }else{
                ?>
                <tr>
                <td colspan="4"><span class="text-danger"><i class="fa fa-frown"></i> You are yet to add shipping address</span></td>

                </tr>


                <?php
              }
              ?>
                
              </tbody>
            </table>
          </div>
          <hr class="pb-4">
          <div class="text-sm-right"><a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalXL" >Add new address</a></div>

        </section>
      </div>
    </div>



 <!-- Extra large modal-->
          <div class="modal fade" id="modalXL" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add A New Address</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <?php  include "change_shipping_address.php";  ?>
                </div>
               
              </div>
            </div>
          </div>



<!-- Extra large modal-->
          <div class="modal fade" id="umodal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Address</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div id="contents"></div>
                </div>
               
              </div>
            </div>
          </div>



<?php 
}
include("footer.php");
 ?>
<script type="text/javascript">
  $(document).ready(function() {

   $(".del").click(function() {
      //e.preventDefault();
        
        var id = $(this).attr("id");
        
       
        $.ajax({
            type : 'POST',
            url  : '../inc/user/delete_address.php',
            data : {'id':id},
            success :  function(res)
            {
                if(res.trim() == 1)
                {
                   $("#msgs").html('<div class="alert alert-success"><i class="fa fa-check"></i> &nbsp;Address Deleted Successfully</div>').show();
        setTimeout(function() {
            $("#msgs").fadeOut(1500);
        }, 4000);
         document.location.href = document.location.href;
      }else{
        $("#msgs").html('<div class="alert alert-danger">'+res+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
      }
            }
        });
        
      
  return false;
    });
});

$(document).ready(function() {
        $('.edit').click(function() {
          
            //e.preventDefault();
      var id = $(this).attr("id");
      
     $('#contents').html(''); // leave this div blank
     //$('#modal-loader').show();      // load ajax loader on button click
   
     $.ajax({
          url: '../inc/user/get_address.php',
          type: 'POST',
          data: 'id='+ id,
          dataType: 'html'
     })
     .done(function(data){
          
          $('#contents').html(data); // load here
         /* $('#modal-loader').hide(); // hide loader  
          $('#umodal').modal('show');
          $(".showit").show();*/
          
     })
     .fail(function(){
          $('contents').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

            
        });
    });


$('#addAddrForm').click(function(e){ 
e.preventDefault(); 

      var formElem = $("#newAddrForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"../inc/addShippingAddress.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == 1){
                   $(".mymsg").html('<div class="alert alert-success">Successfully added.</div>').show();
          setTimeout(function() {
              $(".mymsg").fadeOut(1500);
          }, 10000);
 
                 // $('#productForm')[0].reset();  
                 //location.href = 'checkout';
                  document.location.href = document.location.href;
                 
                  }else{
                    $(".mymsg").html('<div class="alert alert-danger text-left">'+data+'</div>').show();
          setTimeout(function() {
              $(".mymsg").fadeOut(1500);
          }, 10000);
                  }
                     //alert(data);  
                     
                }  
           }); 


      }); 


</script>