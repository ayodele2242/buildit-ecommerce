

           
            <div class="header-department">
               <div id="shopify-section-header" class="shopify-section">
                  <header data-section-type="header" data-section-id="header" class="header-content" data-headerstyle="1" data-stick="true" data-stickymobile="true">
                    <?php 
                      if($current_page == 'index'){
                     ?>
                     <div class="header-container layout-boxed style-1" data-style="1">
                     <?php }else{ ?>
                       <div class="header-container layout-boxed style-3" data-style="3">
                      <?php } ?>  

                       <?php //include("main-nav.php");  ?>
                       <?php include("top_bar.php") ?>
                       <?php include("header-main.php"); ?>

                        


                        <div class="header-navigation d-none d-lg-block">
                           <div class="container">
                              <div class="table-row">


                                <?php include("vertical-left-main-menu.php"); ?>

                                 <div class="wrap-horizontal-menu">
                                    <div class="horizontal-menu dropdown-fix d-none d-lg-block">
                                       <div class="sidemenu-holder">
                                          <nav class="navbar navbar-expand-md">
                                             <div class="collapse navbar-collapse">
                                                <ul class="menu-list">
                                                  <!-- <li class="dropdown highlight">
                                                      <div class="dropdown-inner">
                                                         <a href="store">
                                                         <span>Browse All Products Buildit</span>
                                                         </a>
                                                         
                                                      </div>
                                                     
                                                   </li>-->
                                                   
                                                  


                                                </ul>
                                             </div>
                                          </nav>
                                       </div>
                                    </div>
                                     
                                    <div class="shipping-text ">
                                  <?php 
                                    if($current_page == 'index'){
                                   ?>
                                      <span> <a href="store" class="">Browse All Buildit Products</a></span>
                                    <?php }else{ ?>
                                      <span> <a href="store" class="col-white text-bolder">Browse All Buildit Products</a></span>
                                    <?php } ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <!-- Begin Menu Mobile-->
                        <?php include("menu-mobile.php"); ?>
                        <!-- End Menu Mobile-->
                     </div>
                     <div class="searchbox searchbox-mobile">
                        <div class="container">
                           <form id="search-mobile" class="navbar-form search" action="search">
                              <input id="searchmobile" type="text" name="q" class="form-control bc-product-search"  placeholder="Search Buildit" autocomplete="off" />
                              <button type="submit" class="search-icon">
                              <span>
                              <i class="demo-icon icon-electro-search-icon col-white"></i>
                              </span>
                              </button>
                           </form>
                           <div class="resultMoble-search p-3" style="overflow: hidden;">
                             
                           </div>
                        </div>
                     </div>
                  </header>
               </div>


            </div>


           <?php //include("language-popup.php"); ?>