 <!-- App Header -->
 <div class="appHeader  no-border">
 
    <div class="search-box">
            <div class="form-group searchbox animated fadeIn">
                    <input type="text" class="form-control" placeholder="Search BuildIt" id="searchme" autocomplete="off">
                    <i class="input-icon search-icon">
                       <i class="material-icons icon">search</i>
                    </i>
                    <i class="close-icon animated fadeIn">
                       <i class="material-icons icon">arrow_back</i>
                    </i>      
            </div>
            
    </div>

    <div class="right">
            <a href="cart.php" class="headerButton icart">
               <i class="material-icons icon">shopping_cart</i>
           
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

        <div id="search-output"></div>
    </div>
    <!-- * App Header -->

    
