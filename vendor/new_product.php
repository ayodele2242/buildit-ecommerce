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
//debugger($_GET,true);
$act = "add";
if (isset($_GET['id'],$_GET['act']) && $_GET['id'] ==!"" && $_GET['act'] == !"") {
  if ($_GET['act'] == substr(md5($_SESSION['session_id']."edit-product".$_GET['id']), 5,15)) {
    $act= "edit";
    $id = (int)$_GET['id'];
     $product = new Product();
      $product_info = $product->getProductById($id);
        $cat_id = $product_info[0]->cat_id;
       $category_info = $cat_info -> getCategoryById($cat_id); 
       $pc_id = $category_info[0]->id;

       $child_info = $cat_info-> getChildByParentId($pc_id);
       $gc_info = $child_info[0]->id;
      $grand_child_info = $child_info-> getChildByParentId($gc_info);

      // debugger($child_info,true);
     // debugger($product_info[0]->cat_id,true);
     // debugger($product_info,true);
      if (!$product_info) {
        setFlash("error","Invalid product Id.");
        @header('location:product');
        exit;
      }
    
  }else{
    setFlash("error","Invalid token number!");
    @header('location:product');
    exit;
  }
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
                           <input class="form-control title" type="text" name="title" placeholder="Enter the title of the product..." value="<?php echo (isset($product_info[0]->title)) ? $product_info[0]->title :''; ?>">
                         </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Summary:</label>
                         <div class="col-sm-8">
                           <textarea  class="form-control summary" id="summary" style="resize: none;" rows ="6" type="text" name="summary"  value=""><?php echo (isset($product_info[0]->summary)) ? $product_info[0]->summary :'';?></textarea>
                           </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Description:</label>
                         <div class="col-sm-8">
                           <textarea  class="form-control description" style="resize: none;" rows ="6" type="text" name="description" id="description"  value=""><?php echo (isset($product_info[0]->description)) ? html_entity_decode($product_info[0]->description) :'';?></textarea>
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

                        <div class="form-group row <?php echo (isset($product_info[0]->child_cat_id) && !empty($product_info[0]->child_cat_id))? '' :'hidden'; ?>" id="child_cat_div">
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
                           <input class="form-control" type="number" name="discount" id="discount" placeholder="Enter the discount of the product..." value="<?php echo (isset($product_info[0]->discount)) ? $product_info[0]->discount :'';?>">
                         </div>
                       </div>
                       
                        <div class="form-group row">
                         <label class="col-sm-3 control-label">Brand:</label>
                         <div class="col-sm-8">
                           <input class="form-control brand" type="text" name="brand" id="brand" placeholder="Enter the brand of the product..." value="<?php echo (isset($product_info[0]->brand)) ? $product_info[0]->brand :'';?>">
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
                            <option value="single">Product with same price</option>
                            <option value="different">Product size with different prices</option>
                          </select>

                         </div>
                       </div>




                       <div class="form-group colors" id="single" style="display: none;">

                        <div class="row mb-2">
                         <label class="col-sm-3 control-label">Size:</label>
                         <div class="col-sm-8">
                           <input class="form-control single-size" type="text" name="size" id="size" placeholder="Enter the size of the product, comma separated (l,xl,xxl)..." value="<?php echo (isset($product_info[0]->size)) ? $product_info[0]->size :'';?>">
                         </div>
                       </div>
                    

                       <div class="row">
                         <label class="col-sm-3 control-label">Price:</label>
                         <div class="col-sm-8">
                           <input class="form-control v-price" type="number" name="price" id="price" placeholder="Enter the price of the product..." value="<?php echo (isset($product_info[0]->price)) ? $product_info[0]->price :'';?>">
                         </div>
                       </div>

                        </div>
                        
                        <div class="form-group row">
                         <label class="col-sm-3 control-label">Product Weight:</label>
                         <div class="col-sm-8">
                           <input class="form-control weight" type="text" name="weight" placeholder="Enter product weight..." value="<?php echo (isset($product_info[0]->weight)) ? $product_info[0]->weight :''; ?>">
                         </div>
                       </div>


                     <div class="form-group colors " id="different" style="display: none;">
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
                           <input class="form-control icolor" type="text" name="color" id="color" placeholder="" value="<?php echo (isset($product_info[0]->color)) ? $product_info[0]->color :'';?>">
                         </div>
                       </div>

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Product Quantities:</label>
                         <div class="col-sm-8">
                           <input class="form-control quantity" type="text" name="quantity" id="quantity" placeholder="Enter the quantity of the product..." value="<?php echo (isset($product_info[0]->quantity)) ? $product_info[0]->quantity :'';?>">
                         </div>
                       </div>


                       <div class="form-group row" style="display: none;">
                         <label class="col-sm-3 control-label">Availability:</label>
                         <div class="col-sm-8">
                          <select class="form-control" name="status" id="status" > 
                          <option value="0" selected>Available</option>
                         
                          </select>
                         </div>
                       </div>

                        <div class="form-group row">
                           <label class="col-sm-3 control-label">Feature Image:</label>
                           <div style="padding-left: 260px;padding-right: 100px;">
                           <input type="file" name="feature_img" id="input-file-max-fs" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpg png psd gif">
                         </div>
                        </div>  

                       <div class="form-group row">
                         <label class="col-sm-3 control-label">Product Images(Select multiple images for this product if availabe):</label>
                         <div class="col-sm-8">
                          <input type="file" name="upload_files[]" id="upload_files" class="form-control product-imgs" value="Upload" multiple="multiple"> 

                          <div class="col-lg-12 text-center" id="preview_file_div"><ul></ul></div>
                         </div>
                         


                        <!-- <div class="col-sm-4">
                            <img src="" id="thumbnail_img" alt="" class="img img-thumbnail">
                            <input type="hidden" name="default_img" id="default_img" value="<?php if(isset($product_info[0]->images)){echo $product_info[0]->images; } ?>">
                         </div>-->
                         
                       
                          <?php 
                         
                         if (isset($product_info[0]->images) && $product_info[0]->images !="")  {
                             $pre_images=explode(",", $product_info[0]->images);
                             //print_r($pre_images);
                              //echo file_exists(UPLOAD_URL.'product/'.$pre_images[0]);
                            //if(file_exists(UPLOAD_URL.'product/'.$pre_images[0])){
                            //echo UPLOAD_URL.'product/'.$pre_images[0];
                            $i=0;

                            while($i<1){
                              ?>
                             <!-- <div class="col-sm-3 img_responsive">
                              
                              <img src="<?php echo UPLOAD_URL.'product/'.$pre_images[$i]; ?>" class="img img-thumbnail">
                              </div>-->
                              <?php
                              $i++;
                            }
                          
                          } ?>
                         
                         
                       </div>

                       <div class="form-group">
                       <label class="col-sm-3 control-label"></label>
                       <a href="product_list.php" type="reset" class="btn btn-danger btn-sm"><i class="fa fa-chevron-left"></i> Cancel</a>
                       <button id="submitForm" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit</button>
                      <!-- <input type="hidden" name="pro_id" value="<?php //echo (isset($product_info[0]->id))?$product_info[0]->id:''; ?>">-->
                       </div>

                     </form>

		

	</div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->



<?php include("vfooter.php"); ?>



 