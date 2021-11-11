  <!-- Navbar 3 Level (Light)-->
    <header class="box-shadow-sm bg-blue">
      <!-- Topbar-->
      <div class="topbar topbar-dark bg-blue">
        <div class="container">
          <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">Useful links</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-muted" href="tel:<?php echo $set['contactNum'];  ?>"><i class="fa fa-phone  mr-2"></i><?php echo $set['contactNum'];  ?></a></li>
              <li><a class="dropdown-item" href="order-tracking"><i class="fa fa-map-marker text-muted mr-2"></i>Order tracking</a></li>
            </ul>
          </div>
          <div class="topbar-text text-nowrap d-none d-md-inline-block text-white"><i class="fa fa-phone-square text-white"></i><span class="mr-2">Support</span><a class="topbar-link" href="tel:<?php echo $set['contactNum'];  ?>"><?php echo $set['contactNum'];  ?></a></div>
          <div class="cz-carousel cz-controls-static d-none d-md-block">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
        
              <div class="topbar-text">Friendly 24/7 customer support</div>
            </div>
          </div>
        
        </div>
      </div>
     <!-- Topbar #END-->



      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="<?php echo $set['installUrl']; ?>" style="min-width: 7rem;">
           <?php
              if(!empty($set['logo'])){
                echo '<img src="'.$set['installUrl'].'assets/logo/'.$set['logo'].'" alt="'.$set['storeName'].'" width="90" height="70">';
              }else{
                ?>
                <img src="<?php echo FRONT_IMAGES;?>cart.png" alt="" width="90" height="70">
            <?php
              }

              ?>

          </a>

            <a class="navbar-brand d-sm-none mr-2" href="<?php echo $set['installUrl']; ?>" style="min-width: 4.625rem;">
             <?php
              if(!empty($set['logo'])){
                echo '<img width="74" src="'.$set['installUrl'].'assets/logo/'.$set['logo'].'" alt="'.$set['storeName'].'">';
              }else{
                ?>
                <img width="74" src="<?php echo FRONT_IMAGES;?>cart.png" alt="">
            <?php
              }

              ?>

            </a>
             <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2 mobile-hide">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown"><i class="fa fa-navicon mr-2"></i>Categories
                  </a>
                  <div class="dropdown-menu px-2 pl-0 pb-4" style="overflow-y: auto; height: 500px;">

                    
 
                      <?php 
                      if(isset($parent_cats) && !empty($parent_cats)){
                      $i = 0;
                        foreach (array_slice($parent_cats, 0, 16) as $parents ) {
                          $child_cats = $category->getChildByParentId($parents->id);
                          if ($child_cats) {
                           if($i % 4 == 0) {
                            echo '<div class="d-flex  flex-md-nowrap">';
                           }
                            ?>
                      
                     <div class="mega-dropdown-column pt-3 px-2">
                        <div class="widget widget-links">
                         
                       <?php 
                        /*if (isset($parents->featured_image) && $parents->featured_image != "" && file_exists(UPLOAD_DIR.'/category/'.$parents->featured_image))  {
                          ?>
                          <a class="d-block overflow-hidden rounded-md mb-3" href="category?cid=<?php echo $parents->id; ?>">
                          <img class="d-block overflow-hidden rounded-lg mb-3" src="<?php echo UPLOAD_URL.'category/'.$parents->featured_image; ?>" alt="<?php echo stripslashes($parents->title); ?>" style="width: 100%; height: 150px;">
                        </a>
                          
                          <?php  
                        }*/
                         ?>


                          <h6 class="font-size-base mb-2">
                            <a href="category?cid=<?php echo $parents->id; ?>">
                            <?php echo stripslashes($parents->title); ?></h6>
                          </a>

                          <ul class="widget-list">

                            <?php 
                              foreach (array_slice($child_cats, 0, 10) as $children) {
                                ?>
                                <li class="widget-list-item">
                                  <a class="widget-list-link" href="category?child_id=<?php echo $children->id; ?>">
                                    
                                    <?php echo stripcslashes(mb_strimwidth($children->title, 0, 30, "...")); ?>
                                  </a>
                                </li>

                                <?php 
                              }
                               ?>


                           
                          </ul>
                        </div>
                      </div>
                      
                       <?php
                       $i++;
                       if($i % 4 == 0){
                        echo '</div>';
                       }
                }else{
                  if($i % 4 == 0) {
                            echo '<div class="d-flex  flex-md-nowrap">';
                           }
                  ?>
                 
                  <div class="mega-dropdown-column pt-3 px-2">
                   <div class="widget widget-links">
                    <!-- <a class="d-block overflow-hidden rounded-lg mb-3" href="category?cid=<?php echo $parents->id; ?>">
                          <img class="d-block overflow-hidden rounded-lg mb-3" src="<?php echo UPLOAD_URL.'category/'.$parents->featured_image; ?>" alt="<?php echo stripslashes($parents->title); ?>" style="width: 100%; height: 150px;">
                        </a>-->

                          <h6 class="font-size-base mb-2"><a href="category?cid=<?php echo $parents->id; ?>"> <?php echo stripcslashes($parents->title); ?></a></h6>
                         
                        </div>
                      </div>
                   

                 
                  <?php 
                   $i++;
                       if($i % 4 == 0){
                        echo '</div>';
                       }
                }
              }
            }
             ?>
                </div>
                </li>
              </ul>
            <form class="input-group-overlay d-none d-lg-flex mx-4" method="get" action="search">
          
              <input class="form-control appended-form-control" type="text" placeholder="Search store for products">
              <div class="input-group-append-overlay"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
        
          </form>
          
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span>'
              </button>
              <a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon fa fa-bars"></i>
                </div>
              </a>
                  <ul class="navbar-nav mobile-hide">
                  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle col-blue" href="#" data-toggle="dropdown"><i class="fa fa-question-circle col-blue"></i> Help</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="help-center">Help Center</a></li>
                    <li><a class="dropdown-item" href="how-to-shop">How to Shop on Buildit</a></li>
                    <li><a class="dropdown-item" href="how-to-shop">Returns and Refunds</a></li>
                  </ul>
                </li> 
              </ul>

              <a class="navbar-tool d-none d-lg-flex text-blue" href="store">
                Store
              </a>

               <!-- <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="#signin-modal" data-toggle="modal">
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon fa fa-user"></i>
                </div>
                <div class="navbar-tool-text ml-n3"><small>Hello, Sign in</small>My Account</div>
              </a>-->
              <?php 
                if(isset($_SESSION['email'])){
              ?>

               <li class="dropdown navbar-tool">

                <a class="navbar-tool  nav-link mobile-hide" href="#" data-toggle="dropdown">
                <div class="navbar-tool-text ml-n3 "><i class="fa fa-user"></i> <?php  echo $_SESSION['email']; ?></div>
                 </a>

                 <a class="navbar-tool  nav-link comp-hide" href="#" data-toggle="dropdown">
                <div class="navbar-tool-icon-box"><i class="fa fa-user"></i></div>
                 </a>

                  <ul class="dropdown-menu">
                    
                    <li><a class="dropdown-item" href="orders"><i class="fa fa-list-ul"></i> My Orders</a></li>
                    <li><a class="dropdown-item" href="wishlist"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                    <li><a class="dropdown-item" href="account-profile"><i class="fa fa-cog"></i> My Account</a></li>
                    
                    <li><a class="dropdown-item" href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                   
                  </ul>
              </li>



            <?php }else{ ?>

              <li class="dropdown navbar-tool">
                <a class="navbar-tool  nav-link " href="#" data-toggle="dropdown">
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon fa fa-user"></i></div>
                <div class="navbar-tool-text ml-n3"><small>Hello, Sign in</small>My Account</div>

                 </a>
                  <ul class="dropdown-menu">
                    
                    <li><a class="dropdown-item" href="account-signin">Sign In / Sign Up</a></li>
                    
                  </ul>
              </li>
           <?php  } ?>

            <!--Cart-->
              <div class="navbar-tool dropdown ml-3 icart">
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
              ?>

                <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="viewcart">
                  <span class="navbar-tool-label"><?php echo $total_quantity; ?></span><i class="navbar-tool-icon fa fa-shopping-cart"></i></a><a class="navbar-tool-text" href="viewcart"><small>My Cart</small><?php echo $left_currency.number_format($total_amount).$right_currency; ?>
                </a>

                <!-- Cart dropdown-->
                <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                 

                  <div class="widget widget-cart px-3 pt-2 pb-3">
                     <?php if($cart){
                  ?>

                    <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">

                      <?php foreach($cart as $cart_product){ ?>

                      <div class="widget-cart-item pb-2 border-bottom">
                        <button class="close text-danger cancel-btn btn-delete" type="button" aria-label="Remove" id="<?php echo $cart_product['id'];?>" datacolor="<?php echo $cart_product['color'];?>" datatitle="<?php echo $cart_product['title'];?>"><span class="fa fa-times"></span></button>
                        <div class="media align-items-center">
                          <a class="d-block mr-2" href="#">
                         <?php 

                         if($cart_product['image'] != "" && file_exists(UPLOAD_DIR.'/product/'.$cart_product['image'])){
                            $thumbnail = UPLOAD_URL.'product/'.$cart_product['image'];
                          }
                          else {
                            $thumbnail = FRONT_IMAGES.'no-image.png';
                          }
                        ?>
                        <img width="64"  src="<?php echo $thumbnail;?>" alt="<?php echo $cart_product['title']; ?>">
                        </a>
                          <div class="media-body">
                            <h6 class="widget-product-title"><a href="details?id=<?php echo $cart_product['product_id']; ?>"><?php echo $cart_product['title']; ?></a></h6>
                            <div class="widget-product-meta"><span class="text-accent mr-2"><?php echo $left_currency.number_format($cart_product['price']).$right_currency; ?>.<small>00</small></span><span class="text-muted">x <?php echo $cart_product['quantity'];?></span><br/>
                              <span class="text-muted"><small>
                                - <?php echo $cart_product['size']; ?><br/>
                                - <?php echo $cart_product['color']; ?>
                                
                              </small></span></div>
                          </div>
                        </div>
                      </div><!--Item list #end-->
                    
                   <?php } ?>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                      <div class="font-size-sm mr-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent font-size-base ml-1"><?php echo $left_currency.number_format($total_amount).$right_currency; ?>.<small>00</small></span>
                      </div>
                      <a class="btn btn-outline-secondary btn-sm" href="viewcart"><i class="fa fa-list-ul mr-2 font-size-base align-middle"></i> View cart</a>
                    </div><a class="btn btn-primary btn-sm btn-block" href="checkout">Checkout <i class="fa fa-forward-arrow mr-2 font-size-base align-middle"></i></a>


                    <?php
                  } else {
                    echo "No item(s) added.";
                  } ?>
                  </div><!--Cart drop-down ends here-->
                  


                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Search-->
              <form class="input-group-overlay d-lg-none my-3" method="get" action="search">
               <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                <input class="form-control prepended-form-control" type="text" placeholder="Search for products">
              </form>


           


              


               <ul class="navbar-nav comp-hide">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-navicon mr-2"></i> Categories</a>
                  <div class="dropdown-menu p-0">
                    <div class="d-flex flex-wrap flex-md-nowrap px-2">
                      
                      <?php 
                      if(isset($parent_cats) && !empty($parent_cats)){
                       echo '<div class="mega-dropdown-column py-4 px-3">';

                        foreach ($parent_cats as $parents ) {
                          $child_cats = $category->getChildByParentId($parents->id);
                          if ($child_cats) {
                            ?>
                      
                        <div class="widget widget-links mb-3">
                          <h6 class="font-size-base mb-3"><?php echo stripslashes($parents->title); ?></h6>
                          <ul class="widget-list">
                            <?php 
                              foreach ($child_cats as $children) {
                                ?>
                                <li class="widget-list-item pb-1">
                                  <a class="widget-list-link" href="category?child_id=<?php echo $children->id; ?>">
                                     <?php echo stripcslashes(mb_strimwidth($children->title, 0, 30, "...")); ?>
                                  </a>
                                </li>

                                <?php 
                              }
                               ?>

                          </ul>
                        </div>

                         <?php 
               }else{
?>
<div class="widget widget-links mb-3">
  <h6 class="font-size-base mb-3"><a href="category?cid=<?php echo $parents->id; ?>"> <?php echo stripcslashes($parents->title); ?></a></h6>
</div>
  <?php             }
              }
              echo '</div>';
            }

             ?>
                     
                      
                     
                    </div>
                  </div>
                </li>

              </ul>




              





            </div>
          </div>
        </div>
      </div>
    </header>