<div class="mobile-version d-lg-none">
                           <div class="menu-mobile navbar">
                              <div class="mm-wrapper">
                                 <div class="nav-collapse is-mobile-nav">
                                     <ul class="main-nav mobile-touch-link">
                                       
                                       <li class="mobile-layout-bar">
                                          <ul class="list-inline">
                                             <li class="m-customer-accounts col-white">
                                                <a href="#" class="col-white">
                                                <i class="demo-icon icon-electro-user-icon"></i> My Account
                                                </a>
                                             </li>
                                             
                                           
                                             <!--<li class="currency_icon currency_icon_mobile type-lang-list" data-target="#language-popup" data-toggle="modal" data-flag="lang-list"></li>-->
                                          </ul>
                                       </li>
                                    <ul class="orders-list" style="padding-top: 15px; ">
                                     <?php
                                       if(isset($_SESSION['email'])){
                                       ?>
                                        

                                        <li class="listme p-3"><a href="failed-orders">Failed Orders</a></li>
                                        <li class="listme p-3"><a href="orders">My Orders</a></li>
                                        <li class="listme p-3"><a href="to-be-review">To Be Reviewed</a></li>
                                        <li class="listme p-3"><a href="wishlist" class="item">Saved Items</a></li>
                                        <li class="listme p-3"><a href="return" class="item">Return/Repair</a></li>
                                        <li class="hrule bg-grey p-3">Account</li>
                                        <li class="listme p-3"><a href="my-profile" class="item">My Details</a></li>
                                        <li class="listme p-3"><a href="address-book" class="item">Address Book</a></li>
                                        
                                    <?php }else{ ?>
                                       <li class="listme p-3 pl-3"><a href="register" class="btn-modal item" title="Register">
                                                      <i class="fa fa-user" style="font-size: 16px; margin-right: 10px"></i>
                                                      Register
                                                      </a>

                                                   </li>

                                         <li class="listme p-3 pl-3"><a href="login" class="btn-modal item" title="Sign in"> <i class="fa fa-lock" style="font-size: 16px; margin-right: 10px"></i> Sign in</a> </li>              

                                    <?php } ?>
                                     </ul>


                                    <ul class="main-nav mobile-touch-link">
                                       
                                       <li class="mobile-layout-bar">
                                          <ul class="list-inline">
                                             <li class="m-customer-account col-white">
                                                <a href="#" class="col-white" data-toggle="modal" data-target="#MenuPanel">
                                                <i class="demo-icon icon-th-list-1"></i> Categories
                                                </a>
                                             </li>
                                             
                                           
                                             <li class="currency_icon currency_icon_mobile type-lang-list" data-target="#language-popup" data-toggle="modal" data-flag="lang-list"></li>
                                          </ul>
                                       </li>
    
                                      
                                                   <?php 
                                                     if(isset($parent_cats) && !empty($parent_cats)){
                                                     $i = 0;
                                                     foreach (array_slice($parent_cats, 0, 10) as $parents ) {
                                                     $child_cats = $category->getChildByParentId($parents->id);
                                                       
                                                   ?>
                                       <li class="dropdown">
                                          <div class="dropdown-inner">
                                             <a href="category?cid=<?php echo $parents->id; ?>" class="dropdown-link">
                                             <span><?php echo stripslashes($parents->title); ?></span>
                                             </a>
                                             <span class="expand"></span>
                                          </div>
                                          
                                       </li>

                                    <?php 
                                       }
                                    }
                                    ?>


                                    </ul>
                                    <ul class="mobile-contact-bar list-inline">
                                       <li class="contactbar-item">
                                          <a class="contactbar-item-link col-white" href="tel:<?php echo $set['contactNum']; ?>">
                                          <i class="demo-icon icon-phone"></i>
                                          <span>Call</span>
                                          </a>
                                       </li>
                                       <li class="contactbar-item">
                                          <a class="contactbar-item-link col-white" href="mailto:<?php echo $set['Email']; ?>">
                                          <i class="demo-icon icon-mail-1"></i>
                                          <span>Contact</span>
                                          </a>
                                       </li>
                                       <li class="contactbar-item ci-store-info">
                                          <a class="contactbar-item-link col-white" href="javascript:;">
                                          <i class="demo-icon icon-globe-1"></i>
                                          <span>Store info</span>
                                          </a>
                                       </li>
                                       <?php if(isset($_SESSION['email'])){ ?>
                                      <li class="contactbar-item bg-red">
                                          <a class="contactbar-item-link  col-white" href="logout">
                                          <i class="demo-icon fa fa-lock"></i>
                                          <span>Logout</span>
                                          </a>
                                       </li>
                                       <?php } ?>
                                    </ul>
                                    <div class="contactbar-info">
                                       <span class="contactbar-info-close"><i class="demo-icon icon-cancel-2"></i></span>
                                       <p><?php echo wordwrap($set['address'],30,"<br>\n"); ?></p>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>





<div class="modal fade panelbox panelbox-left" id="MenuPanel" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="review-title"> Reviews</h5>
              <a href="javascript:;" data-dismiss="modal" ><ion-icon class="text-danger closeme" name="close-outline"></ion-icon></a>
          </div>
          <div class="modal-body">
          <div class="review_detail"></div>
          </div>
      </div>
  </div>
</div>