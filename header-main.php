<div class="header-main">
                           <div class="container">
                              <div class="table-row">
                                 <div class="navbar navbar-responsive-menu d-lg-none col-white">
                                    <div class="responsive-menu col-white">
                                       <span class="bar col-white"></span>
                                       <span class="bar col-white"></span>
                                       <span class="bar col-white"></span>
                                    </div>
                                 </div>
                                 <div class="header-logo">
                                    <a href="<?php echo $set['installUrl']; ?>" title="" class="logo-site logo-site-desktop d-none d-lg-block lazyload waiting">
                                       <img src="<?php echo $set['installUrl'].'assets/logo/'.$set['logo']; ?>" style="width: 100%; max-width: 150px; height: 100%; max-height: 100px;">
                                    </a>
                                    
                                 </div>
                                 <div class="m-search-icon d-lg-none">
                                    <i class="demo-icon icon-electro-search-icon col-white"></i>
                                    <i class="demo-icon icon-cancel-2"></i>
                                 </div>
                                 <div class="m-cart-icon cart-target d-lg-none icart">
                                    <a href="cart" class="mobile-basket" title="cart">
                                    <i class="demo-icon icon-electro-cart-icon col-white"></i>
                                    <span class="number"><span class="n-item">
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

                                    </span></span>
                                    </a>
                                 </div>
                                 <div class="searchbox d-none d-sm-block" style="width: 30%; min-width: 400px;">
                                    <form id="search" class="navbar-form search">
                                       <input type="hidden" name="type" value="product" />
                                       <input type="hidden" name="options[prefix]" value="last" />
                                       <input id="productSearch" type="text" name="q" class="form-control bc-product-search"  placeholder="Search Buildit" autocomplete="off" />
                                       <button type="submit" class="search-icon">
                                       <span>
                                       <i class="demo-icon icon-electro-search-icon col-white"></i>
                                       </span>
                                       </button>
                                    </form>
                                    <div id="result-ajax-search" class="result-ajax-search pl-4 pr-4">
                                       
                                    </div>
                                 </div>
                                 <div class="header-icons d-none d-lg-block">

                                    <ul class="list-inline">
                                     <?php
                                       if(isset($_SESSION['email'])){
                                       ?>
                                       <li class="top-cart-holder hover-dropdown ">
                                         <div class="cart-target">
                                             <a href="javascript:void(0)" class="basket dropdown-toggle menu-inline navbar-user widgets_div" title="">
                                                 <div class="icon_div">
                                                   <span><i class="demo-icon icon-electro-user-icon navbar-tool-icon"></i></span>
                                                 </div>
                                                 <div class="text_div">
                                                   <span><small>Welcome,</small></span>
                                                   My Account
                                                 </div>

                                             </a>

                                             <div class="cart-dd" style="text-align: left">
                                                 <div id="cart-content" class="cart-contents">
                                                   <div class="cart-loadings">

                                                    <ul class="orders-list">

                                                      <li class="listme"><a href="failed-orders">Failed Orders</a></li>
                                                      <li class="listme"><a href="orders">My Orders</a></li>
                                                       <li class="listme"><a href="to-be-review">To Be Reviewed</a></li>
                                                       <li class="listme"><a href="wishlist" class="item">Saved Items</a></li>
                                                       <li class="listme"><a href="return" class="item">Return/Repair</a></li>
                                                       <li class="hrule"><hr/></li>
                                                       <li class="listme"><a href="my-profile" class="item">My Details</a></li>
                                                       <li class="listme"><a href="address-book" class="item">Address Book</a></li>
                                                       <li class="hrule"><hr/></li>
                                                       <li class="logout bg-red"><a href="logout" class="item col-white">Logout</a></li>
                                                    </ul>

                                                   </div>
                                                 </div>
                                               
                                             </div>
                                         </div>
                                       </li>

                                    <?php }else{ 
                                      if($current_page != 'login' and $current_page != 'register' ){
                                      ?>
                                        <li class="top-cart-holder hover-dropdown ">
                                         <div class="cart-target">
                                             <a href="javascript:void(0)" class="basket dropdown-toggle menu-inline navbar-user widgets_div" title="">
                                                 <div class="icon_div">
                                                   <span><i class="demo-icon icon-electro-user-icon navbar-tool-icon"></i></span>
                                                 </div>
                                                 <div class="text_div">
                                                   <span><small>Hello, Sign in</small></span>
                                                   My Account
                                                 </div>

                                             </a>

                                             <div class="cart-dd">
                                                 <div id="cart-content" class="cart-contents">
                                                   <div id="cart-content" class="cart-contents customer-account">
                                                   <div class="cart-loadings">
                                                      <a href="register" class="btn-modal" title="Register">
                                                      <i class="demo-icon icon-electro-user-icon"></i>
                                                      Register
                                                      </a>
                                                      <span class="customer-or">or</span>
                                                      <a href="login" class="btn-modal" title="Sign in">Sign in</a>

                                                   </div>
                                                 </div>
                                                 </div>
                                               
                                             </div>
                                         </div>
                                       </li>  
                                       <?php 
                                     } 

                                     }
                                     ?>          

                                       <li class="vendor-link">
                                          <a class='col-orange' href="vendor/index">
                                              <i class="fa fa-money"></i> Sell on Buildit
                                          </a>
                                       </li>
                                       <li class="top-cart-holder hover-dropdown icart">
                                          <div class="cart-target">
                                             <a href="cart" class="basket dropdown-toggle col-blue" title="cart">
                                             <i class="demo-icon icon-electro-cart-icon"></i>
                                             <span class="number"><span class="n-item col-white">
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
                                             </span></span>
                                             </a>
                                             <!--<div class="cart-dd">
                                                
                                                   <div id="cart-contents" class="cart-content">
                                                      <div class="cart-loading"></div>
                                                   </div>
                                                
                                             </div>-->
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>