<?php 
include("header.php"); 
//include("header-bottom.php"); 
?>

<!--<link rel="stylesheet" href="css/slider.css">-->
<div class="appHeader">
        <div class="left">
        <!--<a href="#" class="headerButton goBack" onclick="window.history.go(-1); return false;">
             <i class="material-icons icon">arrow_back_ios</i>
            </a>-->
        </div>
        <div class="pageTitle">Settings</div>
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline" class="icon"></ion-icon>
            </a>
            <a href="cart" class="headerButton icart">
            <ion-icon class="icon" name="cart"></ion-icon>
              <span class="badge badge-danger">
              <?php 
                $total_quantity = 0;
                $total_amount = 0;
                $cart = geCart($sessionId);
               // $size = "";
                //$color = "";
                if($cart){
                  foreach($cart as $cart_item){
                    $total_quantity += $cart_item['quantity'];
                    $total_amount += $cart_item['price']*$cart_item['quantity'];
                   // $size += $cart_item['size'];
                    //$color += $cart_item['color'];
                  }
                }
                echo $total_quantity;
              ?>

              </span>
            </a>

        </div>
</div>

<!-- Search Component -->
    <div id="search" class="appHeader">
       
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search BuildIt" id="searchme">
                <i class="input-icon search-icon">
                   <span class="material-icons">search</span>
                </i>
                <i class="close-icon animated fadeInLeft">
                        <ion-icon name="arrow-back"></ion-icon>
                </i>   
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
            <div id="search-output"></div>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <form id="profileForm" enctype="multipart/form-data">
        <?php
if(isset($_SESSION['email'])){
?>
        
        <div class="section mt-3 text-center">
            <input type="hidden" id="myEmail" name="email" value="<?php echo $_SESSION['email']; ?>">
            <!--<form id="form1" enctype="multipart/form-data" method="post">-->
            <div class="avatar-upload imaged w120">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept="image/*" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview rounded">
                    <?php 
                    if(!empty($urow['img'])){
                        ?>
                         <div id="imagePreview" style="background-image: url(profile_img/<?php echo $urow['img'];  ?>);"> </div>
                     <?php   
                    }else{
                    ?>
                    <div id="imagePreview" style="background-image: url(img/profile.jpg);"> </div>
                     <?php } ?>   
                   
                </div>
            </div>
            <!--</form>-->


            <!--<div class="avatar-section">
               <a href="#">
                    <img src="img/profile.jpg" alt="avatar" class="imaged w100 rounded">
                    <span class="button">
                        <span class="material-icons">local_see</span>
                    </span>
                </a>
            </div>-->
            <p class="mt-2"><h3><?php echo ucwords($urow['last_name']).' '. ucwords($urow['first_name']);?></h3></p>
            <div id="details"></div>
            <div align="center">
        <div id="progress"></div>        
        <p class="mt-0"><a href="logout" class="btn bg-def btn-warning btn-md" data-toggle="modal" data-target="#DialogLogout"> <span class="material-icons icon">lock</span>&nbsp;  LOG OUT</a></p>
    </div>
        </div>

        <div class="listview-title mt-1">Orders</div>
        <ul class="listview image-listview text inset">
      
            <li>
                <a href="unpaid_orders" class="item">
                    <div class="in">
                        <div>Unpaid</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="to_be_shipped" class="item">
                    <div class="in">
                        <div>My Orders</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
           
            <li>
                <a href="to_be_review" class="item">
                    <div class="in">
                        <div>To be reviewed</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="wishlist" class="item">
                    <div class="in">
                        <div>Saved Items</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
             <li>
                <a href="return" class="item">
                    <div class="in">
                        <div>Return/Repair</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>

        </ul>

        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="my-profile" class="item">
                    <div class="in">
                        <div>My Details</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="password-update" class="item">
                    <div class="in">
                        <div>Update Password</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="address-book" class="item">
                    <div class="in">
                        <div>Address Book</div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
          
        </ul>




         <!-- Dialog Basic -->
        <div class="modal fade dialogbox" id="DialogLogout" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Logout Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to logout of your account?
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inlines right">
                            <a href="logout" class="btn btn-text-primary">YES</a>
                            <a href="#" class="btn btn-text-warning" data-dismiss="modal">NO</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3 " style="height: 30px;"></div>
        <div class="listview-title mt-1"></div>
       
        <?php }else{ ?>


             <div class="section mt-3 text-center">
                 <div class="avatar-upload imaged w120">
                <!--<div class="avatar-edit" >
                   
                    <label for="imageUpload"></label>
                </div>-->
                <div class="avatar-preview   rounded">
                    <div id="imagePreview" style="background-image: url(img/profile.jpg);">
                    </div>
                </div>
            </div>
            <!--<div class="avatar-section">
                <a href="#">
                    <img src="img/profile.jpg" alt="avatar" class="imaged w100 rounded">
                    <span class="button">
                       <span class="material-icons">local_see</span>
                    </span>
                </a>
            </div>-->
            <p class="mt-0"> <a href="#" class="btn bg-def btn-sm btn-danger" data-toggle="modal" data-target="#AddressModal"> <span class="material-icons icon">account_circle</span>&nbsp; REGISTER</a>  
            <a href="#" class="btn bg-def btn-sm" data-toggle="modal" data-target="#ModalLogin"> <span class="material-icons icon">lock</span>&nbsp;  LOG IN</a></p>
        </div>

        <div class="listview-title mt-1">Orders</div>
        <ul class="listview image-listview text inset">
      
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Unpaid</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
             <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>To be shipped</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Shipped</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>To be reviewed</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Saved Items</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>
             <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Return/Repair</div>
                        <span class="text-primary"></span>
                    </div>
                </a>
            </li>

        </ul>

        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>My Details</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Address Book</div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
          
        </ul>
         <div class="mt-3 mb-3 "></div>
       
        <?php } ?>
        
</form>
    </div>
    <!-- * App Capsule -->



<!-- Alert Success Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetAlertSuccess" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <div class="iconbox text-success">
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </div>
                            <div class="text-center p-2">
                                <h3>Success</h3>
                                <p>Profile Image updated.</p>
                            </div>
                            <a href="#" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Alert Success Action Sheet -->
        
        
        
        
  <!-- Modal Address -->
     <div class="modal fade modalbox" id="AddressModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Shipping Address</h5>
                        <a href="javascript:;" data-dismiss="modal" class="text-danger">X Close</a>
                    </div>
                    <div class="modal-body">
                        <p class="alert alert-info">
                            You are yet to log in. If you are an existing customer please <a href="#" data-toggle="modal" data-target="#ModalLogin" class="bolder">Login here</a>
                        </p>

                        <div class="section mt-1 p-0 ">
            <form id="regForm">

                       <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="firstname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

               
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your e-mail">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Phone No.</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone No.">
                            </div>
                        </div>
        
                        

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="zipcode">ZIP Code</label>
                                <input type="number" class="form-control" id="zip" name="zip" placeholder="ZIP Code">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="country">Country</label>
                                <select class="form-control custom-select mselect select" id="mcountry" name="country">
                                <option value="">Choose country</option>
                                <?php echo getCountry(); ?>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="select4">State</label>
                                <select class="form-control custom-select" id="mstates" name="state">
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="select4">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="City">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Address 1</label>
                                <textarea id="address1" rows="2" class="form-control"
                                    placeholder="Address 1" name="address1"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Address 2</label>
                                <textarea id="address2" rows="2" class="form-control"
                                    placeholder="Address 2"  name="address2"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                            </div>
                        </div>
        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password2">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Type password again">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="default-address" value="1" type="checkbox" checked id="same-address">
                            <label class="custom-control-label" for="same-address">Set as default shipping address</label>
                        </div>
                        </div>
                        
                        <div class="form-group basic">
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                           
                            <label class="custom-control-label" for="customChecka1">
                               
                            </label>
                        </div>
                        </div>
        
                    


                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg regFormBtn">Register</button>
                </div>

            </form>
        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- * Modal Address -->


<?php include("bottom-menu.php"); ?>       
<?php include("sidebar.php"); ?>
<?php include("footer.php"); ?>


<script type="text/javascript">
  $(document).ready(function() {

 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
 
   //send to server
   //console.log(input.files[0]);
     var property = document.getElementById('imageUpload').files[0];
    var image_name = input.files[0].name;    
    var myEmail = $("#myEmail").val(); 

    var form_data = new FormData();  

    var image_extension = image_name.split('.').pop().toLowerCase();
     console.log("Image Details: "+property);
    if(jQuery.inArray(image_extension,['png','jpg','jpeg']) == -1){
      alert("Invalid image file");
    }  else{
    //var json_params = JSON.stringify(file_data); 

     // form_data = new FormData();
    form_data.append("photo",property);
    form_data.append('email', myEmail);
    
    $(".avatar-upload").addClass('gradient-border');

    //console.log(file_data);                             
    $.ajax({
        url: 'image_upload.php', // point to server-side PHP script 
        method: 'POST',
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        success: function(response){
            if(response == 1){
                $("#actionSheetAlertSuccess").modal("show");
                $(".avatar-upload").removeClass('gradient-border');
                //location.reload(true);
            }else{
                $(".avatar-upload").removeClass('gradient-border');
               $.toast({ 
                        text : '<b><ion-icon name="sad"></ion-icon> &nbsp;'+response+'</b>', 
                        showHideTransition : 'fade',
                        bgColor : 'red',            
                        textColor : '#fff',
                        allowToastClose : false,
                        hideAfter : 4000,
                        loader: false,            
                        stack : 5,                     
                        textAlign : 'center', 
                        position : 'top-right'  
                      });
            }
            //alert(response); // display response from the PHP script, if any
        }
     });

}


    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
 });


</script>