<?php
require_once('../config/config.php');
require_once('../inc/fetch.php');
 $email = $_SESSION['email'];
  if(!empty($right_currency)){
    $right_currency = $right_currency;
  }else{
    $right_currency='';
  }
  if(!empty($left_currency)){
    $left_currency = $left_currency;
  }else{
    $left_currency='';
  }
  ?>

     <div class="transactions" id="post-list">
            
            <?php
            $email = $_SESSION['email'];
            $sqlQuery = "SELECT * FROM customer_order WHERE (status='Processing' OR status='failed' OR status='Cancelled') AND c_email='$email'";
            $result = mysqli_query($mysqli, $sqlQuery);
            $total_count = mysqli_num_rows($result);
            
            $sqlQuery = "SELECT * FROM customer_order WHERE (status='Processing' OR status='failed' OR status='Cancelled') AND c_email='$email' ORDER BY id DESC LIMIT 6";
            $result = mysqli_query($mysqli, $sqlQuery);
            $count = mysqli_num_rows($result);
            if($count > 0){
            ?>
            <input type="hidden" name="total_count" id="total_count" value="<?php echo $total_count; ?>" />

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $content = substr($row['product_name'], 0, 25)."...";
                 if($row['product_image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$row['product_image'])){
                    $thumbnail = UPLOAD_URL.'product/'.$row['product_image'];
                  }
                  else {
                    $thumbnail = FRONT_IMAGES.'no-image.png';
                  }
                ?>

                <!-- item -->
                <div class="item post-item postid results" id="<?php echo $row['id']; ?>">
                    <div class="detail">
                        <img src="<?php echo $thumbnail; ?>" alt="img" class="image-block imaged w48">
                        <div>
                            <small><strong><?php echo $content; ?></strong></small>
                            <p><small>Size: <?php echo $row['size']; ?></small></p>
                            <p><small>Color: <?php echo $row['color']; ?></small></p>
                            <p><small>Qty: x<?php echo $row['quantity']; ?></small></p>
                            <p>
                            <?php
                            if($row['status'] == "Processing"){
                              echo '<span class="round bg-red">Payment failed</span>';
                            }else if($row['status'] == "Cancelled"){
                              echo '<span class="round bg-orange">Order cancelled</span>';
                            }
                            ?>
                          </p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price"> <?php echo $left_currency.number_format($row['total_amount']).$right_currency ?></div>
                    </div>

                </div>
                <!-- * item -->

               
                <?php
                }
            }else{
                ?>
                <div class="empty-cart">
                  <div class="empty-results">
                    <h3 class="text-center">
                     
                       <ion-icon name="cart"></ion-icon>
                    </h3>
                    <p class="text-center">
                     No order items.
                    </p>
                  </div>
                </div>
                
                <?php
            }
            ?>
            </div>
            <div class="aloader text-center">
               <div class="ME">
                <img src="gif/loading.gif">
               </div>
            </div>
      
        <!-- * Categories -->
    </div>


    <script type="text/javascript">
$(document).ready(function(){
    $('.aloader').hide();

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        var last_id = $(".postid:last").attr("id");
        loadMore(last_id);
    }
});

function loadMore(last_id){
  $.ajax({
      url: 'getMoreFailedOrder.php?last_id=' + last_id,
      type: "get",
      beforeSend: function(){
          $('.aloader').show();
      }
  }).done(function(data){
    if(data == "end"){
      $('.aloader').addClass("section");
      $('.ME').html("You have gotten to the end of data.").addClass("item");
       setTimeout(function() {
            $(".aloader").fadeOut(1500);
        }, 1000);
      //$('.aloader').removeClass("ajax-load").addClass("displayMe");
    }else{
      //$('.ajax-load').addClass("hide");  
      //$('.aloader').removeClass("aloader").addClass("displayMe");
      $("#post-list").append(data);
      $('.aloader').hide();

  }
  }).fail(function(jqXHR, ajaxOptions, thrownError){
      //alert('server not responding...');
  });
}

});


</script>