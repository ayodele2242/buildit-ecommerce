 <?php
include("vheader.php");
include("nav.php");
include("left_menu.php");

require_once '../config/function.php';
require_once '../class/database.php';
require_once '../class/category.php';
require_once '../class/product.php';

$cat_info = new Category();
  $all_category_info = $cat_info -> getAllParentCats(); 
 //


if (isset($_GET['id'])) {
 
    $id = (int)$_GET['id'];
    $product = editProducts($id);

    foreach ($product as $product_info) {


      
    }
       $id = $product_info['id'];
       $cat_id = $product_info['cat_id'];
       $category_info = $cat_info -> getCategoryById($cat_id); 
       $pc_id = $category_info[0]->id;
       $child_info = $cat_info-> getChildByParentId($pc_id);
    
  }else{
    
    @header('location:product_list');
    exit;
  }

 ?>


 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">New Product</h3>
          </div>
        
        </div>
        <div class="content-body">
        	<section class="card">
	<div class="card-body">
		
		 <form  id="productForm" class="form form-horizontal">



                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Product Name:</label>
                         <div class="col-sm-8">
                           <input class="form-control title" type="text" name="title" placeholder="Enter the title of the product..." value="<?php echo $product_info['title']; ?>">
                         </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Summary:</label>
                         <div class="col-sm-8">
                           <textarea  class="form-control summary" id="summary" style="resize: none;" rows ="6" type="text" name="summary"  value=""><?php echo $product_info['summary'];?></textarea>
                           </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Description:</label>
                         <div class="col-sm-8">
                           <textarea  class="form-control description" style="resize: none;" rows ="6" type="text" name="description" id="description"  value=""><?php echo html_entity_decode($product_info['description']);?></textarea>
                         </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Category:</label>
                         <div class="col-sm-8">
                           <select class="form-control cat_id" name="cat_id" id="cat_id">

                             
                             <?php 
                            // if($product_info){
                             
                             if ($category_info) {
                               
                                 ?>
                                 <option selected value="<?php echo $category_info[0]->id; ?>"><?php echo $category_info[0]->title; ?></option>
                                 <?php
                                 }else{
                                  ?>
                                  <option selected value="">--Select Parent Category--</option>
                                  <?php }

                                  if($all_category_info){
                                  foreach($all_category_info as $parent){
                                  ?>
                                  <option value="<?php echo $parent->id;?>"><?php echo ($parent->title); ?></option>
                                  <?php
                                  }
                                }
                            ?>

                           </select>
                         </div>
                       </div>

                        <div class="form-group row <?php echo (isset($product_info['child_cat_id']) && !empty($product_info['child_cat_id']))? '' :'hidden'; ?>" id="child_cat_div">
                          <label for="" class="col-sm-3 control-label">Child Category:</label>
                          <div class="col-sm-8">
                            <select name="child_cat_id" id="child_cat_id" class="form-control">
                              <option value="<?php echo isset($child_info)? $child_info[0]->id :''; ?>" selected > <?php echo $child_info[0]->title; ?></option>
                            </select>
                          </div>
                        </div>

                        

                        <div class="form-group row">
                         <label class="col-sm-3 control-label">Discount:</label>
                         <div class="col-sm-8">
                           <input class="form-control" type="number" name="discount" id="discount" placeholder="Enter the discount of the product..." value="<?php echo (isset($product_info['discount'])) ? $product_info['discount'] :'';?>">
                         </div>
                       </div>
                       
                        <div class="form-group row">
                         <label class="col-sm-3 control-label">Brand:</label>
                         <div class="col-sm-8">
                           <input class="form-control brand" type="text" name="brand" id="brand" placeholder="Enter the brand of the product..." value="<?php echo (isset($product_info['brand'])) ? $product_info['brand'] :'';?>">
                         </div>
                       </div>


                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Vendor Name:</label>
                         <div class="col-sm-8">
                           <input class="form-control vendor_name" type="text" name="vendor_name"  placeholder="" value="<?php echo $username ?>" readonly>
                         </div>
                       </div>

                       <div class="form-group row">
                        <label class="col-sm-3 control-label">Size Variance Type:</label>
                         <div class="col-sm-8">
                          <select name="size_cat" class="form-control size_cat" id="selector">
                            <option value="">Select Size Variance</option>
                            <option value="single" <?php if($product_info['size_category'] == "single"){ echo "selected"; } ?> >Product with same price</option>
                            <option value="different" <?php if($product_info['size_category'] == "different"){ echo "selected"; } ?>>Product size with different prices</option>
                          </select>

                         </div>
                       </div>



                        
                       <div class="form-group row colors" id="single" <?php if($product_info['size_category'] == "single"){ ?> style="display: block;" <?php }else{?>   style="display: none;"   <?php } ?>>
                       
                        <div class="form-group row">
                         <label class="col-sm-3 control-label">Size:</label>
                         <div class="col-sm-8">
                           <input class="form-control single-size" type="text" name="size" id="size" placeholder="Enter the size of the product, comma separated (l,xl,xxl)..." value="<?php echo (isset($product_info['size'])) ? $product_info['size'] :'';?>">
                         </div>
                       </div>
                    

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Price:</label>
                         <div class="col-sm-8">
                           <input class="form-control v-price" type="number" name="price" id="price" placeholder="Enter the price of the product..." value="<?php echo (isset($product_info['price'])) ? $product_info['price'] :'';?>">
                         </div>
                       </div>

                     

                        </div>
                        


                     <div class="form-group colors " id="different" <?php if($product_info['size_category'] == "different"){ ?> style="display: block;" <?php }else{?>   style="display: none;"   <?php } ?>>
                      <div class="alert-info" style="overflow: hidden; padding: 8px; font-weight: bolder; font-size: 18px;">Click on <button type="button" class="btn-floating small sm gradient-45deg-green-teal"><i class="fa fa-plus"></i></button> to add more.
                      </div>
                      <table class="table table_view" id="dynamic_field">

                        <tr>  
                                  <td>Size/Type:</td>    
                                 <td> 
                                  <input class="form-control variance_size" type="text" name="variance_size[]" id="variance_size" placeholder="Enter the size of the product" value="">
                                 </td>  
                                 <td>Price:</td>  
                                 <td>
                                  <input class="form-control variance_price" type="number" name="variance_price[]" id="variance_price" placeholder="Enter variant price of the product..." value="">

                                 </td>
                                 <td>
                                  <div class="imgr">
                                   <input type="file" name="fimgs[]" >
                                    
                                 </div>
                                 </td>
                                 <td>

                                  <button type="button" name="add" id="add" class="btn btn-info btn-sm sm gradient-45deg-green-teal"><i class="fa fa-plus"></i></button>
                                </td>  
                                    </tr> 

                          <?php if($product_info['size_category'] == "different"){ 
                           
                            $size = getProductSize($id);

                            foreach($size as $psize){

                            ?>
                                    <tr>  
                                  <td>Size/Type:</td>    
                                 <td> 
                                  <input class="form-control variance_size" type="text" name="evariance_size[]" id="variance_size" placeholder="Enter the size of the product" value="<?php echo $psize['size']; ?>">
                                 </td>  
                                 <td>Price:</td>  
                                 <td>
                                  <input class="form-control variance_price" type="number" name="evariance_price[]" id="variance_price" placeholder="Enter variant price of the product..." value="<?php echo $psize['variant_price']; ?>">

                                 </td>
                                 <td>
                                  <div class="imgr">
                                   <!--<input type="file" name="fimgs[]" >-->
                                    <div id="prodfourid" class="prodcls">
                                      <input type="hidden" name="efimgs[]" value="<?php echo $psize['image']; ?>">
                                    <img type="file" src="<?php echo $set['installUrl'].'upload/product/'.$psize['image']; ?>" alt="<?php echo $psize['size']; ?>"  width="60" height="50" />
                                    </div>

                                    <input type="hidden" name="eid[]" value="<?php echo $psize['id']; ?>">
                                   


                                 </div>
                                 </td>
                                 <td>

                                  <button type="button" id="<?php echo $psize['id']; ?>" data-vendor="<?php echo $product_info['vendor_name']; ?>" class="btn btn-danger btn-sm sm gradient-45deg-green-teal deleteme" ><i class="fa fa-trash"></i></button>
                                </td>  
                                    </tr> 

                                    <?php } } ?>

                               </table>  

                     </div>






                       <div class="form-group row">
                        <div class="alert alert-info col-lg-12">
                          <h6>To add product colors is as simple as abc. Please follow this instructions:</h6>

                          <p>For single color use comma separated(red,black,white). </p>

                          <p>For multiple colors combination use white&gold, yellow&green&purple e.t.c, without space.</p>

                          <p>Note: if you are to add single and multiple colors together, do the following: black, yello, yellow&green&purple e.t.c.</p>


                        </div>
                         <label class="col-sm-3 control-label">Color:</label>
                         <div class="col-sm-8">
                          <?php if($product_info['size_category'] == "single"){ ?>
                           <input class="form-control icolor" type="text" name="color" id="color" placeholder="" value="<?php echo (isset($product_info['color'])) ? $product_info['color'] :'';?>">
                         <?php }else{ 
                          $colors = getProductColor($id);
                          $resultstr = array();
                          
                          foreach ($colors as $result) {
                            $resultstr[] = $result['color'];
                           
                          }
                          $mcolor = implode(",",$resultstr);
                          
                          ?>
                          <input class="form-control icolor" type="text" name="color" id="color" placeholder="" value="<?php echo $mcolor;?>">

                           


                         <?php } ?>


                         </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Product Quantities:</label>
                         <div class="col-sm-8">
                           <input class="form-control quantity" type="text" name="quantity" id="quantity" placeholder="Enter the quantity of the product..." value="<?php echo (isset($product_info['quantity'])) ? $product_info['quantity'] :'';?>">
                         </div>
                       </div>


                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Availability:</label>
                         <div class="col-sm-8">
                          <select class="form-control" name="status" id="status" >
                          <?php
                          if($product_info['availability'] == '1' && $product_info['status'] == '0' ){

                          ?> 
                          <option value="0" selected>Available</option>
                        <?php }else{ ?>
                          <option value="1" <?php if($product_info['status'] == '1'){ echo 'selected'; } ?> >Available</option>
                           <option value="0" <?php if($product_info['status'] == '0'){ echo 'selected'; } ?> >Out of Stock</option>
                          <?php
                        }

                          ?>

                         
                          </select>
                         </div>
                       </div>

                        <div class="form-group row">
                           <label class="col-sm-3 control-label">Feature Image:</label>
                           <div class="col-sm-6">
                           <input type="file" name="feature_img" id="input-file-max-fs" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpg png psd gif">
                         </div>

                          <div class="col-sm-3">
                            <img src="<?php echo $set['installUrl'].'upload/product/'.$product_info['images'] ?>" width="100" height="100">
                          <input type="hidden" name="pre_feature" value="<?php echo $product_info['images'] ?>">
                         </div>
                         
                        </div>  

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Product Images(Select multiple images for this product if availabe):</label>
                         <div class="col-sm-6">
                          <input type="file" name="upload_files[]" id="upload_files" class="form-control product-imgs" value="Upload" multiple="multiple"> 

                          <div class="col-lg-12 text-center" id="preview_file_div"><ul></ul></div>
                          <?php
                          $m = 1;
                          $imgs = getProductImages($id);

                          foreach ($imgs as $value) {
                            //$im = $itemImg['image'];
                            //$exImg = explode(", ", $im);
                            //foreach ($exImg as $value) {
                             
                           
                            ?>
                           <div class="col-lg-12 text-center">
                            <ul>
                             <li id=''><div class='ic-sing-filesas'><img id="<?php echo $m; ?>" src="<?php echo $set['installUrl'].'upload/product/'.$value['image'] ?>" width="100" height="100">
                             </div>
                           </li>

                           </ul>
                         </div>


                           <?php
                           $m++;
                        // }
                          }
                          ?>


                         </div>




                         
                       </div>

                       <div class="form-group">
                       <label class="col-sm-3 control-label"></label>
                       <a href="product_list.php" type="reset" class="btn btn-danger btn-sm"><i class="fa fa-chevron-left"></i> Cancel</a>
                       <button id="submitFormUpdate" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Update</button>
                      <input type="hidden" name="pro_id" value="<?php echo $product_info['id']; ?>">
                       </div>

                     </form>

		

	</div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->



<?php include("vfooter.php"); ?>



 <script type="text/javascript">
$(document).ready(function(){  
$('.deleteme').click(function(e){ 
e.preventDefault(); 

 var id = $(this).attr("id"); 
 var vendor = $(this).attr("data-vendor"); 


 $.ajax({  
                url:"process/deleteItemImg.php",  
                method:"POST",  
                data: {id : id, vendor : vendor}, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == "Done"){
                   $("#msgs").html('<div class="alert alert-success">Added to the database. Your product will be display after review</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 30000);
 
                 //$('#productForm')[0].reset();  
                  //$(".refresh").load(location.href + " .refresh");
                  document.location.href = document.location.href;
                  }else{
                    $("#msgs").html('<div class="alert alert-danger">'+data+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
                  }
                     //alert(data);  
                     
                }  
           }); 



});






$('#submitFormUpdate').click(function(e){ 
e.preventDefault(); 

var error = '';
//ar glno = $(".gl_no").val();
//var 
 tinyMCE.triggerSave('description');

if($('.title').val() == ''){
var count = 1;
error += "<p>Enter product name.</p>";
count = count + 1;
}; 
if($('.cat_id').val() == ""){
var count = 1;
error += "<p>Select product category.</p>";
count = count + 1;
}; 
  
if($('.summary').val() == ""){
var count = 1;
error += "<p>Product summary is required.</p>";
count = count + 1;
}; 



if($('.size_cat').val() == ""){
var count = 1;
error += "<p>Product variant type is required.</p>";
count = count + 1;
};



if($('.size_cat').val() == "single" && $(".single-size").val() == ""){
var count = 1;
error += "<p>Enter the size of the product.</p>";
count = count + 1;
};  


if($('.icolor').val() == ""){
var count = 1;
error += "<p>Product color is required.</p>";
count = count + 1;
};

if($('.quantity').val() == ""){
var count = 1;
error += "<p>Product quantity is required.</p>";
count = count + 1;
};





  if(error == '')
  {


      var formElem = $("#productForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"process/product_update.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == "Done"){
                   $("#msgs").html('<div class="alert alert-success">Updated successfully.</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 30000);
 
                 //$('#productForm')[0].reset();  
                  //$(".refresh").load(location.href + " .refresh");
                  document.location.href = document.location.href;
                  }else{
                    $("#msgs").html('<div class="alert alert-danger">'+data+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
                  }
                     //alert(data);  
                     
                }  
           }); 


           } else{

   $("#msgs").html('<div class="alert alert-danger">'+error+'</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);

  }
      });












});
 </script>