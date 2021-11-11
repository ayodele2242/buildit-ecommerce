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


$customer = customerInfo($email);
$addr = alladdresses($uid);
?>


<div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="new"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Account Profile</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Account Profile</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
      <div class="row ">
        <!-- Sidebar-->
        <?php
        include("left-nav.php");
        ?>
        <!-- Content  -->
        <section class="col-lg-8 bg-white col-grey">
         <div class="row pt-4 pb-3">
          
          <?php
          foreach ($customer as $cust) {
            ?>
           <div class="col-lg-7 col-grey row mb-4">
          
            <div class="col-lg-12 ">
            <h3 class="col-grey"><?php  echo  $cust['last_name'].' '. $cust['first_name']; ?>    <a type="button" data-toggle="modal" data-target="#accountModal" class="text-info profileUpdate" id="<?php echo $cust['id']; ?>"> <i class="fa fa-edit"></i></a></h3> 
            <br/>
            <hr>
            <small> <?php echo $cust['email']; ?></small>
          </div>
         
         
           </div>

            <div class="col-lg-5 border text-left ">
              <div class="col-lg-12"><h3>Address Book</h3></div>
             <?php
                foreach ($addr as $myaddr) {
                ?>
                 <div class="row bg-white col-grey pt-3 pb-2 mb-3">
                <div class="col-sm-1 mb-3">
                  <?php  if($myaddr['default_address'] == 1){ ?>
                   <div class="radio  iradio-type-button2" style="background: #6a1b9a" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">
                   <?php }else{ ?>
                    <div class="radio  iradio-type-button2" style="background: #ffbb33" data-toggle="tooltip" data-placement="top" title="<?php  echo $myaddr['address1']; ?>">

                    <?php
                  }
                  ?>

                     <label class="checkLabel" >
                       <input type="radio" name="addr_id" <?php  if($myaddr['default_address'] == 1){ echo 'checked'; } ?> class="colors" style="background: #9933CC"   value="<?php echo  $myaddr['user_id']; ?>" />
                       <span class="text">
                        
                       </span>
                     </label>
                   </div> 
                   </div>  

                    <div class="col-sm-10 mb-3">     

                  <?php  echo $myaddr['address1']; ?> 
                  <?php  if($myaddr['default_address'] == 1){ ?><span class="align-middle badge bg-purple ml-2">Primary</span><?php } ?>&nbsp;&nbsp;
                   <a type="button" data-toggle="modal" data-target="#umodal" class="edit" id="<?php  echo $myaddr['user_id']; ?>"> <i class="fa fa-pencil"></i></a>  &nbsp;&nbsp;  
                  <a type="button" class="del text-danger" id="<?php  echo $myaddr['user_id']; ?>"> <i class="fa fa-trash"></i></a><br/>
                  <?php  echo $myaddr['mobile']; ?>
                </div>

                
                </div>
               

                <?php
                }
                ?>

             </div> 


           <?php
          }

          ?>

         </div>
        </section>

        


      </div>
    </div>



 <!-- Extra large modal-->
          <div class="modal fade" id="accountModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Account</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div id="pcontents"></div>
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




$(document).ready(function() {
        $('.profileUpdate').click(function() {
          
            //e.preventDefault();
      var id = $(this).attr("id");
      
     $('#pcontents').html(''); // leave this div blank
     //$('#modal-loader').show();      // load ajax loader on button click
   
     $.ajax({
          url: '../inc/user/get_user_details.php',
          type: 'POST',
          data: 'id='+ id,
          dataType: 'html'
     })
     .done(function(data){
          
          $('#pcontents').html(data); // load here
          /*$('#modal-loader').hide(); // hide loader  
          $('#umodal').modal('show');
          $(".showit").show();*/
          
     })
     .fail(function(){
          $('contents').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

            
        });
    });


</script>