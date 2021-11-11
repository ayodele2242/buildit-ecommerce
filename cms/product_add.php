
<?php 
error_reporting(0);
include 'inc/header.php' ;
require 'inc/session.php';
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
        $imgs = getProductsImages($id);
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

      <style type="text/css">
        #preview_file_div ul li{
          list-style-type: none;
          
        }

        #preview_file_div ul li{
          display: inline-flex;
          margin: 10px;
        }

        #preview_file_div ul li .ic-sing-file{
        padding-left: 10px;
          overflow: hidden; 
           position: relative;
        }
        #preview_file_div ul li .ic-sing-file img{
          width: 130px;
          height: 100px;

      
        }

        #preview_file_div ul li .ic-sing-file p.close{
          color: white;
          font-weight: bolder;
          position: absolute;
          top: 0px;
          right: 0px;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 50%;
          width: 25px;
          height: 25px;
          background: red;

      
        }
        
       .control-label{
        font-weight: bolder;
       font-size: 14px;
       }
      </style>
    <div class="container body">
      <div class="main_container">
<?php include 'inc/sidebar.php'; ?>
        <!-- /page content -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h5>Product <?php echo ucfirst($act); ?> Page</h5>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row refresh">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                     <form  id="<?php if(isset($product_info[0]->title)){ echo 'editProForm'; }else{ echo 'productForm'; } ?>" class="form form-horizontal">



                       <div class="form-group">
                         <label class="col-sm-3 control-label">Product Name:</label>
                         <div class="col-sm-8">
                           <input class="form-control title" type="text" name="title" placeholder="Enter the title of the product..." value="<?php echo (isset($product_info[0]->title)) ? $product_info[0]->title :''; ?>">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-sm-3 control-label">Summary:</label>
                         <div class="col-sm-8">
                           <textarea  class="form-control summary" id="summary" style="resize: none;" rows ="6" type="text" name="summary"  value=""><?php echo (isset($product_info[0]->summary)) ? $product_info[0]->summary :'';?></textarea>
                           </div>
                       </div>

                       <div class="form-group">
                         <label class="col-sm-3 control-label">Description:</label>
                         <div class="col-sm-8">
                           <textarea  class="form-control description" style="resize: none;" rows ="6" type="text" name="description" id="description"  value=""><?php echo (isset($product_info[0]->description)) ? html_entity_decode($product_info[0]->description) :'';?></textarea>
                         </div>
                       </div>

                       <div class="form-group">
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

                        <div class="form-group <?php echo (isset($product_info[0]->child_cat_id) && !empty($product_info[0]->child_cat_id))? '' :'hidden'; ?>" id="child_cat_div">
                          <label for="" class="col-sm-3 control-label">Child Category:</label>
                          <div class="col-sm-8">
                            <select name="child_cat_id" id="child_cat_id" class="form-control">
                              <option value="<?php echo isset($child_info)? $child_info[0]->id :''; ?>" selected > <?php echo $child_info[0]->title; ?></option>
                            </select>
                          </div>
                        </div>

                        

                        <div class="form-group">
                         <label class="col-sm-3 control-label">Discount:</label>
                         <div class="col-sm-8">
                           <input class="form-control" type="number" name="discount" id="discount" placeholder="Enter the discount of the product..." value="<?php echo (isset($product_info[0]->discount)) ? $product_info[0]->discount :'';?>">
                         </div>
                       </div>
                       
                        <div class="form-group">
                         <label class="col-sm-3 control-label">Brand:</label>
                         <div class="col-sm-8">
                           <input class="form-control brand" type="text" name="brand" id="brand" placeholder="Enter the brand of the product..." value="<?php echo (isset($product_info[0]->brand)) ? $product_info[0]->brand :'';?>">
                         </div>
                       </div>


                       <div class="form-group">
                         <label class="col-sm-3 control-label">Vendor Name:</label>
                         <div class="col-sm-8">
                           <input class="form-control vendor_name" type="text" name="vendor_name"  placeholder="" value="">
                         </div>
                       </div>

                       <div class="form-group">
                        <label class="col-sm-3 control-label">Size Variance Type:</label>
                         <div class="col-sm-8">
                          <select name="size_cat" class="form-control size_cat" id="selector">
                            <option value="">Select Size Variance</option>
                            <option value="single" <?php if($product_info[0]->size_category == 'single'){ echo "selected"; }  ?>>Product with same price</option>
                            <option value="different" <?php if($product_info[0]->size_category == 'different'){ echo "selected"; }  ?>>Product size with different prices</option>
                          </select>

                         </div>



                       </div>
                       
                       
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Product Approval Status:</label>
                         <div class="col-sm-8">
                          <select name="pro_status" class="form-control size_cat" id="selector">
                            <option value="">Select Product Approval Status</option>
                            <option value="1" <?php if($product_info[0]->status == 1){ echo "selected"; }  ?>><?php if($product_info[0]->status == 1){ echo "Approved"; }else{ echo "Approve"; }  ?></option>
                            <option value="0" <?php if($product_info[0]->status == 0){ echo "selected"; } ?>>Waiting Approval</option>
                          </select>

                         </div>
                       </div>





                       <div class="form-group row colors" id="single" style="display: <?php if($product_info[0]->size_category == 'single'){ echo "block"; }else{  echo "none;"; }  ?> " >

                        <div class="form-group">
                         <label class="col-sm-3 control-label">Size:</label>
                         <div class="col-sm-8">
                           <input class="form-control single-size" type="text" name="size" id="size" placeholder="Enter the size of the product, comma separated (l,xl,xxl)..." value="<?php echo (isset($product_info[0]->size)) ? $product_info[0]->size :'';?>">
                         </div>
                       </div>
                    

                       <div class="form-group">
                         <label class="col-sm-3 control-label">Price:</label>
                         <div class="col-sm-8">
                           <input class="form-control v-price" type="number" name="price" id="price" placeholder="Enter the price of the product..." value="<?php echo (isset($product_info[0]->price)) ? $product_info[0]->price :'';?>">
                         </div>
                       </div>

                        </div>


                     <div class="form-group colors" id="different" style="display: none; padding-left: 180px;">
                      <div class="alert-info" style="overflow: hidden; padding: 8px; font-weight: bolder; font-size: 18px;">Click on <button type="button" class="btn-floating small sm gradient-45deg-green-teal"><i class="fa fa-plus"></i></button> to add more.
                      </div>
                      <table class="table table_view" id="dynamic_field">  
                                    <tr>  
                                  <td>Size/Type/Material:</td>    
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

                                  <button type="button" name="add" id="add" class="btn-floating small sm gradient-45deg-green-teal"><i class="fa fa-plus"></i></button>
                                </td>  
                                    </tr>  
                               </table>  

                     </div>






                       <div class="form-group">
                        <div class="alert alert-info">
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

                       <div class="form-group">
                         <label class="col-sm-3 control-label">Product Quantities:</label>
                         <div class="col-sm-8">
                           <input class="form-control quantity" type="text" name="quantity" id="quantity" placeholder="Enter the quantity of the product..." value="<?php echo (isset($product_info[0]->quantity)) ? $product_info[0]->quantity :'';?>">
                         </div>
                       </div>


                       <div class="form-group">
                         <label class="col-sm-3 control-label">Availability:</label>
                         <div class="col-sm-8">
                          <select class="form-control" name="status" id="status" > 
                          <option value="1" <?php if($product_info[0]->availability == 1){ echo "selected"; }  ?>>Available</option>
                          <option value="0" <?php if($product_info[0]->availability == 0){ echo "selected"; } ?>>Unavailable</option>
                          <option value="2" <?php if($product_info[0]->availability == 2){ echo "selected"; } ?>>Stock not found</option>
                          </select>
                         </div>
                       </div>

                        <div class="form-group">
                           <label class="col-sm-3 control-label">Feature Image:</label>
                           <div style="padding-left: 260px;padding-right: 100px;">
                           <input type="file" name="feature_img" id="input-file-max-fs" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpg png psd gif">
                         </div>
                        </div>  

                       <div class="form-group">
                         <label class="col-sm-3 control-label">Product Images(Select multiple images for this product if availabe):</label>
                         <div class="col-sm-8">
                          <input type="file" name="upload_files[]" id="upload_files" class="form-control product-imgs" value="Upload" multiple="multiple"> 

                          <div class="col-lg-12 text-center" id="preview_file_div"><ul></ul></div>
                         </div>
                         


                       <div class="col-sm-4">
                            <img src="" id="thumbnail_img" alt="" class="img img-thumbnail">
                            <input type="hidden" name="default_img" id="default_img" value="<?php if(isset($product_info[0]->images)){echo $product_info[0]->images; } ?>">
                         </div>
                         
                         <?php if($product_info[0]->images != ""){ ?>
                         <div class="col-lg-4">
                             <img src="<?php echo UPLOAD_URL.'product/'.$product_info[0]->images;   ?>" class="" width="300px; height="300px;">
                         </div>
                         <?php } ?>
                         
                            
                          <?php 
                         
                         if ($imgs)  {
                            
                             $pre_images=explode(",", $imgs);
                             // print_r($pre_images);
                           
                            foreach($pre_images as $img){
                                 
                              ?>
                              <div class="col-sm-4 img_responsive">
                              <img src="<?php echo UPLOAD_URL.'product/'.$img['image']; ?>" class="img img-thumbnail">
                              </div>
                              <?php
                              //$i++;
                            }
                          
                          } ?>
                         
                         
                       </div>

                       <div class="form-group">
                       <label class="col-sm-3 control-label"></label>
                       <a href="product.php" type="reset" class="btn btn-danger btn-sm"><i class="fa fa-chevron-left"></i> Cancel</a>
                       <?php if(isset($product_info[0]->title)){ ?>
                       <button id="updateFormBtn" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Update</button>
                       <?php }else{ ?>
                       <button id="submitForm" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit</button>
                       <?php } ?>
                      <input type="hidden" name="pro_id" value="<?php echo (isset($product_info[0]->id))?$product_info[0]->id:''; ?>">
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
     <script type="text/javascript" src="<?php echo CMS_TINYMCE.'tinymce.min.js'; ?>"> </script>
     <script type="text/javascript">
       tinymce.init({
        selector:'#description',
        theme: 'modern',
  plugins: 'print preview  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
        });
     
  $('#cat_id').change(function(){
    var cat_id = $('#cat_id').val();
    $.post('inc/api', {category_id: cat_id, act: "<?php echo substr(md5('get-child-cat-'.$_SESSION['session_id']), 5, 15); ?>"}, function(data){
      var option_tag = '<option value="" selected disabled>-- Select Any One--</option>';
      if (data != 0) {
        var child_data = $.parseJSON(data);//converts json string to javascript's object array
        $.each(child_data, function(key, value){
          option_tag += '<option value ="'+value.id+'">'+value.title+'</option>';
        });
        $('#child_cat_id').html(option_tag);
        $('#child_cat_div').removeClass('hidden');

      }else{
        $('#child_cat_id').html(option_tag);
        $('#child_cat_div').addClass('hidden');
      }
    });



  });


 $(function() {
        $('#selector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
    });

$(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"> <td>Size/Type:</td><td><input class="form-control" type="text" name="variance_size[]" id="variance_size" placeholder="Enter the size of the product" value=""></td><td>Price:</td><td><input class="form-control" type="number" name="variance_price[]" id="variance_price" placeholder="Enter variant price of the product..." value=""></td><td><div class="imgr"><input type="file" name="fimgs[]"></div></td><td> <button type="button" name="remove" id="'+i+'" class="btn-floating small waves-effect waves-light gradient-45deg-red-pink btn_remove">X</button></td></tr>');  
      });  
$(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
});  


$('#submitForm').click(function(e){ 
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

if($('.size_cat').val() == "single" && $(".v-price").val() == ""){
var count = 1;
error += "<p>Enter the price of the product.</p>";
count = count + 1;
}; 

if($('.size_cat').val() == "different" && $(".variance_size").val() == ""){
var count = 1;
error += "<p>Enter the variant size of the product.</p>";
count = count + 1;
};  

if($('.size_cat').val() == "different" && $(".variance_price").val() == ""){
var count = 1;
error += "<p>Enter the variant price of the product.</p>";
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


if($('.dropify').val() == ""){
var count = 1;
error += "<p>Product feature image is required.</p>";
count = count + 1;
};

 $('.product-imgs').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
         error += "<p>Upload product images.</p>";
         return false;
        }
        count = count + 1;
       });


  if(error == '')
  {


      var formElem = $("#productForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"process/add_product.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == "Done"){
                   $("#msgs").html('<div class="alert alert-success">Added to the database</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
 
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
      
      
      
   //Update form   
      
      
$('#updateFormBtn').click(function(e){ 
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

if($('.size_cat').val() == "single" && $(".v-price").val() == ""){
var count = 1;
error += "<p>Enter the price of the product.</p>";
count = count + 1;
}; 

if($('.size_cat').val() == "different" && $(".variance_size").val() == ""){
var count = 1;
error += "<p>Enter the variant size of the product.</p>";
count = count + 1;
};  

if($('.size_cat').val() == "different" && $(".variance_price").val() == ""){
var count = 1;
error += "<p>Enter the variant price of the product.</p>";
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


      var formElem = $("#editProForm");
      var formdata = new FormData(formElem[0]);


           $.ajax({  
                url:"process/update_product.php",  
                method:"POST",  
                data: formdata, 
                processData: false,
                contentType: false, 
                success:function(data)  
                {  

                  if(data.trim() == "Done"){
                   $("#msgs").html('<div class="alert alert-success">Updated the database</div>').show();
          setTimeout(function() {
              $("#msgs").fadeOut(1500);
          }, 10000);
 
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



























$(function () {
    var input_file = document.getElementById('upload_files');
    var deleted_file_ids = [];
    var dynm_id = 0;
    $("#upload_files").change(function (event) {
        var len = input_file.files.length;
        $('#preview_file_div ul').html("");
        
        for(var j=0; j<len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if(mime_type[0] == "image") {
              src = URL.createObjectURL(event.target.files[j]);
            } else if(mime_type[0] == "video") {
              src = 'icons/video.png';
            } else {
              src = 'icons/file.png';
            }
            $('#preview_file_div ul').append("<li id='" + dynm_id + "'><div class='ic-sing-file'><img id='" + dynm_id + "' src='"+src+"' title='"+name+"'><p class='close' id='" + dynm_id + "'>X</p></div></li>");
            dynm_id++;
        }
    });
    $(document).on('click','p.close', function() {
        var id = $(this).attr('id');
        deleted_file_ids.push(id);
        $('li#'+id).remove();
        if(("li").length == 0) document.getElementById('upload_files').value="";
    });
    $("form#form-upload-file").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("deleted_file_ids", deleted_file_ids);
        $.ajax({
              url: 'upload.php',
              type: 'POST',
              data: formData,
              processData: false, 
              contentType: false,
              
              success: function(data) {
                 $('#preview_file_div ul').html("<li class='text-success'>Files uploaded successfully!</li>");
                 $('#upload_files').val("");
              },
              error: function(e) {
                  $('#preview_file_div ul').html("<li class='text-danger'>Something wrong! Please try again.</li>");                    
              }    
        });
    });
});

     </script>

