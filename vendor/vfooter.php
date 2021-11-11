
    



    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019  &copy; Copyright <a class="text-bold-800 grey darken-2" href="#" target="_blank"><?php echo $set['storeName']; ?></a></span>
        
      </div>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="js/vendors.min.js" type="text/javascript"></script>
    <script src="js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="js/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="js/datatables.min.js" type="text/javascript"></script>
    <script src="js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="js/jszip.min.js" type="text/javascript"></script>
    <script src="js/pdfmake.min.js" type="text/javascript"></script>
    <script src="js/vfs_fonts.js" type="text/javascript"></script>
    <script src="js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="js/buttons.print.min.js" type="text/javascript"></script>

     <script src="js/picker.js" type="text/javascript"></script>
    <script src="js/picker.date.js" type="text/javascript"></script>
    <script src="js/picker.time.js" type="text/javascript"></script>
    <script src="js/legacy.js" type="text/javascript"></script>
    <script src="js/moment-with-locales.min.js" type="text/javascript"></script>
    <script src="js/daterangepicker.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="js/app-menu.min.js" type="text/javascript"></script>
    <script src="js/app.min.js" type="text/javascript"></script>
    <script src="js/customizer.min.js" type="text/javascript"></script>
    <script src="js/jquery.sharrre.js" type="text/javascript"></script>
     <script src="<?php echo $set['installUrl']; ?>assets/dropify/dist/js/dropify.min.js"></script>
    <!-- END: Theme JS-->

    <script src="js/datatable-advanced.min.js" type="text/javascript"></script>

    <script src="js/pick-a-datetime.min.js" type="text/javascript"></script>
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
    $.post('../cms/inc/api', {category_id: cat_id, act: "<?php echo substr(md5('get-child-cat-'.$_SESSION['session_id']), 5, 15); ?>"}, function(data){
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
           $('#dynamic_field').append('<tr id="row'+i+'"> <td>Size/Type:</td><td><input class="form-control" type="text" name="variance_size[]" id="variance_size" placeholder="Enter the size of the product" value=""></td><td>Price:</td><td><input class="form-control" type="number" name="variance_price[]" id="variance_price" placeholder="Enter variant price of the product..." value=""></td><td><div class="imgr"><input type="file" name="fimgs[]"></div></td><td> <button type="button" name="remove" id="'+i+'" class="btn-floating small waves-effect waves-light gradient-45deg-red-pink btn_remove btn btn-sm btn-danger">X</button></td></tr>');  
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

if($('.weight').val() == ""){
var count = 1;
error += "<p>Product weight is required.</p>";
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

   <script type="text/javascript">
        $(document).ready(function(){  
          $('.dropify').dropify();

          
        (function($){
            $(window).on("load",function(){
                $(".scrollable").mCustomScrollbar({
                 axis:"yx", // vertical and horizontal scrollbar
                 theme:"dark-3"
    });
            });
        })(jQuery);


     // $(element).perfectScrollbar('update');  
    });


    </script>

  </body>
  <!-- END: Body-->
</html>