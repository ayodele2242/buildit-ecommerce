<div class="header-department">
  <div id="shopify-section-header" class="shopify-section">
    <header data-section-type="header" data-section-id="header" class="header-content" data-headerstyle="1" data-stick="true" data-stickymobile="true" style="">
      <div class="header-container layout-boxed style-1" data-style="1">
        <ul class="main-nav fix-vertical-left-column show">

            <?php 
             if(isset($parent_cats) && !empty($parent_cats)){
             $i = 0;
             foreach (array_slice($parent_cats, 0, 9) as $parents ) {
             $child_cats = $category->getChildByParentId($parents->id);
               
            ?>

           <li class="dropdown mega-menu">
              <div class="dropdown-inner">
                 <a href="category?cid=<?php echo $parents->id; ?>" class="dropdown-link">
                 <span><?php echo stripslashes($parents->title); ?></span>
                 </a>
                 <span class="expand"></span>
              </div>

             
              <?php  if ($child_cats) {   ?>
              <div class="dropdown-menu width-100 lazyload" 
                  style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;"
                 >
                 <div class="row row-1">

                    <?php 
                      foreach (array_slice($child_cats, 0, 6) as $children) {
                                                                                     
                       $subchild_cats = $category->getChildByParentId($children->id);
                      ?>

                    <div class="mega-col mega-col- col-lg-4">
                       <div class="dropdown mega-sub-link ">
                          <a href="category?cid=<?php echo $children->id; ?>">
                          <span> 
                             <?php echo stripcslashes(mb_strimwidth($children->title, 0, 30, "...")); ?> 


                       </span>

                          </a>
                          <span class="expand"></span>
                          <ul class="dropdown-menu dropdown-menu-sub">
                              <?php 
                             foreach (array_slice($subchild_cats, 0, 10) as $subchildren) {

                               ?>
                             <li>
                               
                                <a href="details?id=<?php echo $subchildren->id; ?>"> <?php echo stripcslashes(mb_strimwidth($subchildren->title, 0, 30, "...")); ?></a>
                             
                             </li>
                             <?php } ?>
                          </ul>
                       </div>
                    </div>

                    <?php 
                       }
                        ?>

                 </div>
              </div>
           <?php } ?>
          
           </li>


           <?php 
         
                }
              } ?>
           
        </ul>

        <div class="top-bar multi-store-false border-top-false d-none d-lg-block">
          <div class="container">
            <div class="table-row">
              <div class="header-contact-box">
                <ul class="list-inline">
                  <li class="phone">
                    <i class="demo-icon icon-phone"></i>
                    <span>(+800) 123 456 7890</span>
                  </li>
                  <li class="email">
                    <i class="demo-icon icon-mail-1"></i>
                    <span>sample@email.com</span>
                  </li>
                </ul>
              </div>
              <div class="top-bar-right">
                <ul class="list-inline">
                  <li class="store-location">
                    <a href="/pages/store-location">
                    <i class="demo-icon icon-electro-marker-icon"></i>
                    <span>Store Location</span>
                    </a>
                  </li>
                  <li class="order">
                    <a href="/pages/track-your-order">
                    <i class="demo-icon icon-electro-track-order-icon"></i>
                    <span>Track Your Order</span>
                    </a>
                  </li>
                  <li id="ssw-topauth" class="ssw-topauth customer-account">
                    <a id="customer_register_link" data-toggle="ssw-modal" data-target="#signup_modal" href="javascript:void(0);" onclick="trackShopStats('login_popup_view', 'all')">
                    <i class="demo-icon icon-electro-user-icon"></i>
                    Register
                    </a>
                    <span class="customer-or">or</span>
                    <a id="customer_login_link" href="javascript:void(0);" data-toggle="ssw-modal" data-target="#login_modal" onclick="trackShopStats('login_popup_view', 'all')">Sign in</a>
                  </li>
                  <li class="currency_icon currency_icon_desktop type-lang-list" data-target="#language-popup" data-toggle="modal" data-flag="lang-list"><i class="language-flag language-flag-en"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

       

        <div class="header-navigation d-none d-lg-block">
          <div class="container">
            <div class="table-row">
              <div class="vertical-menu dropdown-fix">
                <div class="sidemenu-holder">
                  <div class="navigation">
                    <div class="head">
                      <i class="demo-icon icon-th-list-1"></i>
                      <span>All Departments</span>
                    </div>
                    <nav class="navbar vertical-navbar">
                      <div class="collapse navbar-collapse">
                        <ul class="main-nav" data-expand="20">
                          <li class=" highlight">
                            <a href="/collections">
                            <span>Value of the Day</span>
                            </a>
                          </li>
                          <li class=" highlight">
                            <a href="/collections/all-in-one">
                            <span>Top 100 Offers</span>
                            </a>
                          </li>
                          <li class=" highlight">
                            <a href="/collections/accessories">
                            <span>New Arrivals</span>
                            </a>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/tv-audio" class="dropdown-link">
                              <span>TV &amp; Audio</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu width-100 lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-4-300x256_292x270.png?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                              <div class="row row-1">
                                <div class="mega-col mega-col- col-lg-4">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/watches">
                                    <span>Watches</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/watches"> All Watches </a></li>
                                      <li><a href="/collections/accessories"> Men's Watches </a></li>
                                      <li><a href="/collections/all-in-one"> Women's Watches </a></li>
                                      <li><a href="/collections/cameras"> Kid Watches </a></li>
                                      <li><a href="/collections/gadgets"> Premium Watches </a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-4">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/tv-audio">
                                    <span>Audio &amp; Video</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/ultrabooks"> All Cameras &amp; Photography </a></li>
                                      <li><a href="/collections/accessories"> Camera Accessories </a></li>
                                      <li><a href="/collections/phones-pdas"> Digital SLRs </a></li>
                                      <li><a href="/collections/photography"> Security &amp; Surveillance </a></li>
                                      <li><a href="/collections/software"> Binoculars &amp; Telescopes </a></li>
                                      <li><a href="/collections/watches">Camcorders</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-4">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/laptops-computer">
                                    <span>Laptop</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/accessories">Toshiba</a></li>
                                      <li><a href="/collections/software">Samsung</a></li>
                                      <li><a href="/collections/photography">Lenovo</a></li>
                                      <li><a href="/collections/software">Dell</a></li>
                                      <li><a href="/collections/watches">Apple</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/gadgets" class="dropdown-link">
                              <span>Gadgets</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu width-75 lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-9.png?v=1604560581" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                              <div class="row row-1">
                                <div class="mega-col mega-col- col-lg-4">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/watches">
                                    <span>Watches</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/watches"> All Watches </a></li>
                                      <li><a href="/collections/accessories"> Men's Watches </a></li>
                                      <li><a href="/collections/all-in-one"> Women's Watches </a></li>
                                      <li><a href="/collections/cameras"> Kid Watches </a></li>
                                      <li><a href="/collections/gadgets"> Premium Watches </a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-4">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/accessories">
                                    <span>Industrial Supplies</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/accessories">All Industrial Supplies</a></li>
                                      <li><a href="/collections/cameras">Lab &amp; Scientific</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/all-in-one" class="dropdown-link">
                              <span>All in One</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu width-75 lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-8.png?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                              <div class="row row-1">
                                <div class="mega-col mega-col- col-lg-6">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/accessories" class="dropdown-link">
                                    <span> Computers &amp; Accessories </span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/all-in-one"> All Computers &amp; Accessories </a></li>
                                      <li><a href="/collections/cameras"> Laptops, Desktops &amp; Monitors </a></li>
                                      <li><a href="/collections/cameras"> Printers &amp; Ink </a></li>
                                      <li><a href="/collections/gadgets"> Networking &amp; Internet Devices </a></li>
                                    </ul>
                                  </div>
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/watches" class="dropdown-link">
                                    <span> Mobiles &amp; Tablets </span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/cameras"> Cases &amp; Covers </a></li>
                                      <li><a href="/collections/laptops-computer"> Android Mobiles </a></li>
                                      <li><a href="/collections/phones-pdas"> Windows Mobiles </a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-6">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/tv-audio">
                                    <span>Audio &amp; Video</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/ultrabooks"> All Cameras &amp; Photography </a></li>
                                      <li><a href="/collections/accessories"> Camera Accessories </a></li>
                                      <li><a href="/collections/phones-pdas"> Digital SLRs </a></li>
                                      <li><a href="/collections/photography"> Security &amp; Surveillance </a></li>
                                      <li><a href="/collections/software"> Binoculars &amp; Telescopes </a></li>
                                      <li><a href="/collections/watches">Camcorders</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/accessories" class="dropdown-link">
                              <span>Accessories</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu width-75 lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image1-1_292x270.jpg?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                              <div class="row row-1">
                                <div class="mega-col mega-col- col-lg-4">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/eyewear">
                                    <span>Eyewear</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/eyewear"> Men’s Sunglasses </a></li>
                                      <li><a href="/collections/accessories"> Women’s Sunglasses </a></li>
                                      <li><a href="/collections/gadgets"> Spectacle Frames </a></li>
                                      <li><a href="/collections/mp3-players"> All Sunglasses </a></li>
                                      <li><a href="/collections/pc-computers"> Amazon Fashion </a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-3">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/pages/contact-us">
                                    <span>Ecommerce Page</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/all">Shop</a></li>
                                      <li><a href="/pages/about-us">About Us</a></li>
                                      <li><a href="/pages/shipping-return">Shipping &amp; Return</a></li>
                                      <li><a href="/pages/frequently-asked-questions">FAQs</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/gaming" class="dropdown-link">
                              <span>Gaming</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu width-75 lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu.png?v=1604560581" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                              <div class="row row-1">
                                <div class="mega-col mega-col- col-lg-6">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/accessories" class="dropdown-link">
                                    <span> Computers &amp; Accessories </span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/all-in-one"> All Computers &amp; Accessories </a></li>
                                      <li><a href="/collections/cameras"> Laptops, Desktops &amp; Monitors </a></li>
                                      <li><a href="/collections/cameras"> Printers &amp; Ink </a></li>
                                      <li><a href="/collections/gadgets"> Networking &amp; Internet Devices </a></li>
                                    </ul>
                                  </div>
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/watches" class="dropdown-link">
                                    <span> Mobiles &amp; Tablets </span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/cameras"> Cases &amp; Covers </a></li>
                                      <li><a href="/collections/laptops-computer"> Android Mobiles </a></li>
                                      <li><a href="/collections/phones-pdas"> Windows Mobiles </a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-6">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/music">
                                    <span>Music</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/accessories">All Industrial Supplies</a></li>
                                      <li><a href="/collections/cameras">Lab &amp; Scientific</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/laptops-computer" class="dropdown-link">
                              <span>Laptops &amp; Computer</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu width-75 lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-2-300x256_292x270.png?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                              <div class="row row-1">
                                <div class="mega-col mega-col- col-lg-6">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/accessories">
                                    <span>Single Product Pages</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/products/consectetur-nibh-eget">Single Product Sidebar</a></li>
                                      <li><a href="/products/faxtex-product-sample">Single Product Full</a></li>
                                      <li><a href="/products/gold-diamond-chain">Group Product</a></li>
                                      <li><a href="/products/condimentum-turpis">Product Redirect</a></li>
                                      <li><a href="/products/magna-elementum-odio">Product Re-order</a></li>
                                      <li><a href="/products/coneco-product-sample">Discount Popup Product</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col mega-col- col-lg-6">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections">
                                    <span>Shop Pages</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/cameras">Shop Left Sidebar</a></li>
                                      <li><a href="/collections/all/?preview_theme_id=82768887859">Shop Right Sidebar</a></li>
                                      <li><a href="/collections/all-in-one">Shop Full Width</a></li>
                                      <li><a href="/collections/accessories">Shop Sub Collection</a></li>
                                      <li><a href="/collections/printers-ink">Collection Infinite Load</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown">
                            <div class="dropdown-inner">
                              <a href="/collections/mac-computers" class="dropdown-link">
                              <span> Mac Computers </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="/collections/accessories"><span>Cases</span></a></li>
                              <li><a tabindex="-1" href="/collections/eyewear"><span>Chargers</span></a></li>
                              <li><a tabindex="-1" href="/collections/laptops-computer"><span>Computer Accessories</span></a></li>
                              <li><a tabindex="-1" href="/collections/headphone"><span>Headphones</span></a></li>
                              <li><a tabindex="-1" href="/collections/keyboard"><span>Keyboard</span></a></li>
                              <li><a tabindex="-1" href="/collections/mouse"><span>Mouse</span></a></li>
                              <li><a tabindex="-1" href="/collections/ultrabooks"><span>Monitors</span></a></li>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <div class="dropdown-inner">
                              <a href="/collections/ultrabooks" class="dropdown-link">
                              <span>Ultrabooks</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="/collections/cameras"><span>Cameras</span></a></li>
                              <li><a tabindex="-1" href="/collections/watches"><span>Watches</span></a></li>
                              <li><a tabindex="-1" href="/collections/mouse"><span>Mouse</span></a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
              <div class="wrap-horizontal-menu">
                <div class="horizontal-menu dropdown-fix d-none d-lg-block">
                  <div class="sidemenu-holder">
                    <nav class="navbar navbar-expand-lg">
                      <div class="collapse navbar-collapse">
                        <ul class="menu-list">
                          <li class="dropdown highlight">
                            <div class="dropdown-inner">
                              <a href="/" class="dropdown-link">
                              <span>Home</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-1/"><span>Home 1 </span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-1-1280px/"><span>Home 1.1</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-2/"><span>Home 2 </span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-2-1280px/"><span>Home 2.1</span></a></li>
                              <li class=""><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-3/"><span>Home 3</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-3-1280px/"><span>Home 3.1</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-3-2/"><span>Home 3.2</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-4/"><span>Home 4</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-4-1280px/"><span>Home 4.1</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-5/"><span>Home 5 </span></a></li>
                              <li class=""><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-6/"><span>Home 6</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-7/"><span>Home 7</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-8/"><span>Home 8</span></a></li>
                              <li><a tabindex="-1" href="http://i.arenacommerce.com/go/electro/electro-home-9/"><span>Home 9</span></a></li>
                            </ul>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="/collections/all" class="dropdown-link">
                              <span>Catalog</span>
                              <span class="labels-wrapper">
                              <span class="menu-label label-new"><span class="new-text">New</span></span>
                              </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu position-left lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-2-300x256_292x270.png?v=1604560580" style="width: 100%;min-height: 190px; background-repeat: no-repeat; background-position: top right;">
                              <div class="row row-1">
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections/laptops-computer">
                                    <span>Single Product Pages</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/products/consectetur-nibh-eget">Single Product Sidebar</a></li>
                                      <li><a href="/products/faxtex-product-sample">Single Product Full</a></li>
                                      <li><a href="/products/gold-diamond-chain">Group Product</a></li>
                                      <li><a href="/products/condimentum-turpis">Product Redirect</a></li>
                                      <li><a href="/products/magna-elementum-odio">Product Re-order</a></li>
                                      <li><a href="/products/coneco-product-sample">Discount Popup Product</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/collections">
                                    <span>Shop Pages</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/cameras">Shop Left Sidebar</a></li>
                                      <li><a href="/collections/all/?preview_theme_id=82768887859">Shop Right Sidebar</a></li>
                                      <li><a href="/collections/all-in-one">Shop Full Width</a></li>
                                      <li><a href="/collections/accessories">Shop Sub Collection</a></li>
                                      <li><a href="/collections/printers-ink">Collection Infinite Load</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/pages/contact-us">
                                    <span>Ecommerce Page</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/collections/all">Shop</a></li>
                                      <li><a href="/pages/about-us">About Us</a></li>
                                      <li><a href="/pages/shipping-return">Shipping &amp; Return</a></li>
                                      <li><a href="/pages/frequently-asked-questions">FAQs</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link">
                                    <a href="/blogs/news">
                                    <span>Blog</span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub">
                                      <li><a href="/blogs/news-15">Blog Style 01</a></li>
                                      <li><a href="/blogs/sweet-memorires-in-our-store-15"> Blog Style 02 </a></li>
                                      <li><a href="/blogs/news-15/robot-wars"> Blog Detail </a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown">
                            <div class="dropdown-inner">
                              <a href="/pages/about-us" class="dropdown-link">
                              <span>Pages</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu">
                              <li class="dropdown dropdown-submenu flyout-left">
                                <div class="dropdown-inner">
                                  <a href="#" class="dropdown-link">
                                  <span>Flyout Left</span>    
                                  </a>
                                  <span class="expand"></span>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="back-prev-menu d-block d-lg-none"><span class="expand back">Back</span></li>
                                  <li><a tabindex="-1" href="/collections/cameras"><span>Cameras</span></a></li>
                                  <li><a tabindex="-1" href="/collections/eyewear"><span> Eyewear </span></a></li>
                                  <li><a tabindex="-1" href="/collections/gadgets"><span>Gadgets</span></a></li>
                                </ul>
                              </li>
                              <li class="dropdown dropdown-submenu">
                                <div class="dropdown-inner">
                                  <a href="#" class="dropdown-link">
                                  <span> Flyout Right </span>    
                                  </a>
                                  <span class="expand"></span>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="back-prev-menu d-block d-lg-none"><span class="expand back">Back</span></li>
                                  <li><a tabindex="-1" href="/collections/headphone"><span>Headphone</span></a></li>
                                  <li><a tabindex="-1" href="/collections/keyboard"><span>Keyboard</span></a></li>
                                  <li><a tabindex="-1" href="/collections/mouse"><span>Mouse </span></a></li>
                                </ul>
                              </li>
                              <li><a tabindex="-1" href="/pages/about-us"><span> About Us </span></a></li>
                              <li><a tabindex="-1" href="/pages/contact-us"><span> Contact Us </span></a></li>
                              <li><a tabindex="-1" href="/pages/store-location"><span> Store Locator </span></a></li>
                              <li><a tabindex="-1" href="/pages/frequently-asked-questions"><span>FAQs</span></a></li>
                              <li><a tabindex="-1" href="/pages/terms-conditions"><span> Terms &amp; Conditions </span></a></li>
                            </ul>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="#" class="dropdown-link">
                              <span>Features</span>
                              <span class="labels-wrapper">
                              <span class="menu-label label-sale"><span class="sale-text">Sale</span></span>
                              </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-tabs column-4" style="background: #ffffff;">
                              <div class="row">
                                <div class="mm-tab-col-title col-lg-3">
                                  <ul class="tab-title">
                                    <li data-id="mm-tabs-1" class="title-item title-item-1 active">
                                      <span>Electronics</span>
                                    </li>
                                    <li data-id="mm-tabs-2" class="title-item title-item-2">
                                      <span>Domestic Appliances</span>
                                    </li>
                                    <li data-id="mm-tabs-3" class="title-item title-item-3">
                                      <span>Health &amp; Beauty</span>
                                    </li>
                                    <li data-id="mm-tabs-4" class="title-item title-item-4">
                                      <span>Baby, Toys, &amp; Kids</span>
                                    </li>
                                    <li data-id="mm-tabs-5" class="title-item title-item-5">
                                      <span>Lifestyle &amp; Sports</span>
                                    </li>
                                    <li data-id="mm-tabs-6" class="title-item title-item-6">
                                      <span>Home &amp; Garden</span>
                                    </li>
                                    <li data-id="mm-tabs-7" class="title-item title-item-7">
                                      <span>Office &amp; Furniture</span>
                                    </li>
                                  </ul>
                                </div>
                                <div class="mm-tab-col-content col-lg-9" style="min-height: 300px;">
                                  <div class="tab-content-inner mm-tabs-1 active" id="mm-tabs-1">
                                    <div class="row row-1">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/tv-audio">
                                          <span>TV &amp; Audio</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/ultrabooks"> All Cameras &amp; Photography </a></li>
                                            <li><a href="/collections/accessories"> Camera Accessories </a></li>
                                            <li><a href="/collections/phones-pdas"> Digital SLRs </a></li>
                                            <li><a href="/collections/photography"> Security &amp; Surveillance </a></li>
                                            <li><a href="/collections/software"> Binoculars &amp; Telescopes </a></li>
                                            <li><a href="/collections/watches">Camcorders</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/photography">
                                          <span>Photography</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/watches"> All Watches </a></li>
                                            <li><a href="/collections/accessories"> Men's Watches </a></li>
                                            <li><a href="/collections/all-in-one"> Women's Watches </a></li>
                                            <li><a href="/collections/cameras"> Kid Watches </a></li>
                                            <li><a href="/collections/gadgets"> Premium Watches </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/laptops-computer">
                                          <span>Computer &amp; Tablets</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/accessories">Toshiba</a></li>
                                            <li><a href="/collections/software">Samsung</a></li>
                                            <li><a href="/collections/photography">Lenovo</a></li>
                                            <li><a href="/collections/software">Dell</a></li>
                                            <li><a href="/collections/watches">Apple</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-content-inner mm-tabs-2" id="mm-tabs-2">
                                    <div class="row row-2">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/all-in-one">
                                          <span>Lorem Et Dorus</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/pages/contact-us">Contact Us</a></li>
                                            <li><a href="/pages/arena-wishlist-page">Wishlist</a></li>
                                            <li><a href="/pages/shipping-return">Shipping &amp; Return</a></li>
                                            <li><a href="/pages/terms-conditions"> Terms &amp; Conditions </a></li>
                                            <li><a href="/pages/frequently-asked-questions"> FAQs </a></li>
                                            <li><a href="/pages/about-us"> About Us </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/cameras">
                                          <span>Nor Loremirus</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/watches">Maecenas commodos</a></li>
                                            <li><a href="/collections/ultrabooks">Malesuada sarcus </a></li>
                                            <li><a href="/collections/tv-audio">Fermentum loremous</a></li>
                                            <li><a href="/collections/software">Habitasse molateas </a></li>
                                            <li><a href="/collections/photography">Phasellus lorem </a></li>
                                            <li><a href="/collections/accessories">Fermentum facilisis </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown banners mega-sub-link">
                                          <a href="/collections/accessories">
                                          <span>Comos De Milano</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li>
                                              <a href="">
                                                <span class="image-lazysize" style="position:relative;padding-top:100.0%;">
                                                  <!-- noscript pattern -->
                                                  <noscript>
                                                    <img class="img-lazy " src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/main_photo-1024x1024_460x240.jpg?v=1604560581" alt=""/>
                                                  </noscript>
                                                  <img class="lazyload  img-lazy blur-up" data-src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/main_photo-1024x1024_{width}x.jpg?v=1604560581" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0" data-sizes="auto" data-parent-fit="cover" alt="">
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-content-inner mm-tabs-3" id="mm-tabs-3">
                                    <div class="row row-1">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown banners mega-sub-link">
                                          <a href="/products/black-fashion-zapda-shoes">
                                          <span>Lynn Cosmopolis</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li>
                                              <a href="">
                                                <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                  <!-- noscript pattern -->
                                                  <noscript>
                                                    <img class="img-lazy " src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image5-300x275_460x240.jpg?v=1604560580" alt=""/>
                                                  </noscript>
                                                  <img class="lazyload  img-lazy blur-up" data-src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image5-300x275_{width}x.jpg?v=1604560580" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-sizes="auto" data-parent-fit="cover" alt="">
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown banners mega-sub-link">
                                          <a href="/products/coneco-product-sample">
                                          <span>Nor Loremirus</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li>
                                              <a href="">
                                                <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                  <!-- noscript pattern -->
                                                  <noscript>
                                                    <img class="img-lazy " src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image6-300x275_460x240.jpg?v=1604560580" alt=""/>
                                                  </noscript>
                                                  <img class="lazyload  img-lazy blur-up" data-src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image6-300x275_{width}x.jpg?v=1604560580" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-sizes="auto" data-parent-fit="cover" alt="">
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown banners mega-sub-link">
                                          <a href="/products/daltex-product-example">
                                          <span>Comos De Milano</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li>
                                              <a href="">
                                                <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                  <!-- noscript pattern -->
                                                  <noscript>
                                                    <img class="img-lazy " src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image7-300x275_460x240.jpg?v=1604560579" alt=""/>
                                                  </noscript>
                                                  <img class="lazyload  img-lazy blur-up" data-src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image7-300x275_{width}x.jpg?v=1604560579" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-sizes="auto" data-parent-fit="cover" alt="">
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-content-inner mm-tabs-4" id="mm-tabs-4">
                                    <div class="row row-2">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/gadgets">
                                          <span>Toys &amp; Games</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/watches">Maecenas commodos</a></li>
                                            <li><a href="/collections/ultrabooks">Malesuada sarcus </a></li>
                                            <li><a href="/collections/tv-audio">Fermentum loremous</a></li>
                                            <li><a href="/collections/software">Habitasse molateas </a></li>
                                            <li><a href="/collections/photography">Phasellus lorem </a></li>
                                            <li><a href="/collections/accessories">Fermentum facilisis </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/gaming">
                                          <span>Travel &amp; Safety Gear</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/headphone">Commodos </a></li>
                                            <li><a href="/collections/cameras">Malesuada sarcus </a></li>
                                            <li><a href="/collections/eyewear">Cosmmopolitan</a></li>
                                            <li><a href="/collections/keyboard">Fermentumos</a></li>
                                            <li><a href="/collections/accessories">Loremica</a></li>
                                            <li><a href="/collections/pc-computers">Fermentumos</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections" class="dropdown-link">
                                          <span>Lorem Et Dorus </span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/all-in-one">Habitasse molateas</a></li>
                                            <li><a href="/collections/cameras">Malesuada sarcus </a></li>
                                            <li><a href="/collections/cameras">Maecenas commodos </a></li>
                                          </ul>
                                        </div>
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections" class="dropdown-link">
                                          <span>Comos De Milano </span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/gadgets">Nullam aliquet</a></li>
                                            <li><a href="/collections/cameras">Duis tristique </a></li>
                                            <li><a href="/collections/laptops-computer">Maecenas commodos </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-content-inner mm-tabs-5" id="mm-tabs-5">
                                    <div class="row row-1">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown banners mega-sub-link">
                                          <a href="/collections/gaming">
                                          <span>Lynn Cosmopolis</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li>
                                              <a href="">
                                                <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                  <!-- noscript pattern -->
                                                  <noscript>
                                                    <img class="img-lazy " src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image11-300x275_460x240.jpg?v=1604560580" alt=""/>
                                                  </noscript>
                                                  <img class="lazyload  img-lazy blur-up" data-src="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image11-300x275_{width}x.jpg?v=1604560580" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-sizes="auto" data-parent-fit="cover" alt="">
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/keyboard">
                                          <span>Hobbies</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/watches">Maecenas commodos</a></li>
                                            <li><a href="/collections/ultrabooks">Malesuada sarcus </a></li>
                                            <li><a href="/collections/tv-audio">Fermentum loremous</a></li>
                                            <li><a href="/collections/software">Habitasse molateas </a></li>
                                            <li><a href="/collections/photography">Phasellus lorem </a></li>
                                            <li><a href="/collections/accessories">Fermentum facilisis </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections" class="dropdown-link">
                                          <span>Lorem Et Dorus </span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/all-in-one">Habitasse molateas</a></li>
                                            <li><a href="/collections/cameras">Malesuada sarcus </a></li>
                                            <li><a href="/collections/cameras">Maecenas commodos </a></li>
                                          </ul>
                                        </div>
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections" class="dropdown-link">
                                          <span>Comos De Milano </span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/gadgets">Nullam aliquet</a></li>
                                            <li><a href="/collections/cameras">Duis tristique </a></li>
                                            <li><a href="/collections/laptops-computer">Maecenas commodos </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-content-inner mm-tabs-6" id="mm-tabs-6">
                                    <div class="row row-2">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/software">
                                          <span>Decor &amp; Furnituretody</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/watches">Maecenas commodos</a></li>
                                            <li><a href="/collections/ultrabooks">Malesuada sarcus </a></li>
                                            <li><a href="/collections/tv-audio">Fermentum loremous</a></li>
                                            <li><a href="/collections/software">Habitasse molateas </a></li>
                                            <li><a href="/collections/photography">Phasellus lorem </a></li>
                                            <li><a href="/collections/accessories">Fermentum facilisis </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/laptops-computer">
                                          <span>Garden &amp; Outdoor</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/accessories">Toshiba</a></li>
                                            <li><a href="/collections/software">Samsung</a></li>
                                            <li><a href="/collections/photography">Lenovo</a></li>
                                            <li><a href="/collections/software">Dell</a></li>
                                            <li><a href="/collections/watches">Apple</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="">
                                          <span>Home Bricolage</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/headphone">Commodos </a></li>
                                            <li><a href="/collections/cameras">Malesuada sarcus </a></li>
                                            <li><a href="/collections/eyewear">Cosmmopolitan</a></li>
                                            <li><a href="/collections/keyboard">Fermentumos</a></li>
                                            <li><a href="/collections/accessories">Loremica</a></li>
                                            <li><a href="/collections/pc-computers">Fermentumos</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-content-inner mm-tabs-7" id="mm-tabs-7">
                                    <div class="row row-1">
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/ultrabooks">
                                          <span>Office Supplies</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/headphone">Commodos </a></li>
                                            <li><a href="/collections/cameras">Malesuada sarcus </a></li>
                                            <li><a href="/collections/eyewear">Cosmmopolitan</a></li>
                                            <li><a href="/collections/keyboard">Fermentumos</a></li>
                                            <li><a href="/collections/accessories">Loremica</a></li>
                                            <li><a href="/collections/pc-computers">Fermentumos</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections" class="dropdown-link">
                                          <span>Lorem Et Dorus </span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/all-in-one">Habitasse molateas</a></li>
                                            <li><a href="/collections/cameras">Malesuada sarcus </a></li>
                                            <li><a href="/collections/cameras">Maecenas commodos </a></li>
                                          </ul>
                                        </div>
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections" class="dropdown-link">
                                          <span>Comos De Milano </span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/gadgets">Nullam aliquet</a></li>
                                            <li><a href="/collections/cameras">Duis tristique </a></li>
                                            <li><a href="/collections/laptops-computer">Maecenas commodos </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-item col-lg-4">
                                        <div class="dropdown mega-sub-link">
                                          <a href="/collections/tv-audio">
                                          <span>Office Appliances</span>
                                          </a>
                                          <span class="expand"></span>
                                          <ul class="m-list dropdown-menu dropdown-menu-sub">
                                            <li><a href="/collections/ultrabooks"> All Cameras &amp; Photography </a></li>
                                            <li><a href="/collections/accessories"> Camera Accessories </a></li>
                                            <li><a href="/collections/phones-pdas"> Digital SLRs </a></li>
                                            <li><a href="/collections/photography"> Security &amp; Surveillance </a></li>
                                            <li><a href="/collections/software"> Binoculars &amp; Telescopes </a></li>
                                            <li><a href="/collections/watches">Camcorders</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="dropdown mega-menu">
                            <div class="dropdown-inner">
                              <a href="#" class="dropdown-link">
                              <span>Gift Cards</span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <div class="dropdown-menu position-right" style="width: 100%;min-height: 300px; background: #ffffff;">
                              <div class="row row-1">
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link no-title-0">
                                    <a href="">
                                    <span></span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub fix no-title-1">
                                      <li class="bp-item">
                                        <div class="product-wrapper">
                                          <div class="product-head">
                                            <div class="product-image">
                                              <div class="product-group-vendor-name">
                                                <h5 class="product-name"><a href="/products/black-fashion-zapda-shoes">Black Fashion Zapda</a></h5>
                                              </div>
                                              <div class="featured-img product-ratio-false">
                                                <a href="/products/black-fashion-zapda-shoes">
                                                  <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                    <!-- noscript pattern -->
                                                    <noscript>
                                                      <img class="img-lazy product-ratio-false featured-image front" src="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_370x.jpg?v=1604559863" alt="Black Fashion Zapda" style="object-fit: unset" />
                                                    </noscript>
                                                    <img class="featured-image front img-lazy blur-up auto-crop-false lazyautosizes lazyloaded" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-expand="auto" data-sizes="auto" data-parent-fit="cover" alt="Black Fashion Zapda" style="object-fit: unset" data-srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_180x.jpg?v=1604559863 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_320x.jpg?v=1604559863 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_540x.jpg?v=1604559863 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_720x.jpg?v=1604559863 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_1080x.jpg?v=1604559863 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_1366x.jpg?v=1604559863 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_1920x.jpg?v=1604559863 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_2048x.jpg?v=1604559863 2048w" sizes="117px" srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_180x.jpg?v=1604559863 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_320x.jpg?v=1604559863 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_540x.jpg?v=1604559863 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_720x.jpg?v=1604559863 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_1080x.jpg?v=1604559863 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_1366x.jpg?v=1604559863 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_1920x.jpg?v=1604559863 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GamePad_2048x.jpg?v=1604559863 2048w">
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="product-content">
                                            <div class="pc-inner">
                                              <div class="price-cart-wrapper">
                                                <div class="product-price notranslate">
                                                  <span class="price-sale"><span class="money" data-currency-usd="$350.00">$350.00</span></span>
                                                  <span class="price-compare"><span class="money" data-currency-usd="$500.00">$500.00</span></span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link no-title-0">
                                    <a href="">
                                    <span></span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub fix no-title-1">
                                      <li class="bp-item">
                                        <div class="product-wrapper">
                                          <div class="product-head">
                                            <div class="product-image">
                                              <div class="product-group-vendor-name">
                                                <h5 class="product-name"><a href="/products/consectetur-nibh-eget">Dentoex Product Sample</a></h5>
                                              </div>
                                              <div class="featured-img product-ratio-false">
                                                <a href="/products/consectetur-nibh-eget">
                                                  <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                    <!-- noscript pattern -->
                                                    <noscript>
                                                      <img class="img-lazy product-ratio-false featured-image front" src="//cdn.shopify.com/s/files/1/0066/4322/0562/products/1_370x.jpg?v=1604559865" alt="Dentoex Product Sample" style="object-fit: unset" />
                                                    </noscript>
                                                    <img class="featured-image front img-lazy blur-up auto-crop-false lazyautosizes lazyloaded" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-expand="auto" data-sizes="auto" data-parent-fit="cover" alt="Dentoex Product Sample" style="object-fit: unset" data-srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/1_180x.jpg?v=1604559865 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_320x.jpg?v=1604559865 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_540x.jpg?v=1604559865 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_720x.jpg?v=1604559865 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_1080x.jpg?v=1604559865 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_1366x.jpg?v=1604559865 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_1920x.jpg?v=1604559865 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_2048x.jpg?v=1604559865 2048w" sizes="117px" srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/1_180x.jpg?v=1604559865 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_320x.jpg?v=1604559865 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_540x.jpg?v=1604559865 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_720x.jpg?v=1604559865 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_1080x.jpg?v=1604559865 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_1366x.jpg?v=1604559865 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_1920x.jpg?v=1604559865 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/1_2048x.jpg?v=1604559865 2048w">
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="product-content">
                                            <div class="pc-inner">
                                              <div class="price-cart-wrapper">
                                                <div class="product-price notranslate">
                                                  <span class="price-sale"><span class="money" data-currency-usd="$450.00">$450.00</span></span>
                                                  <span class="price-compare"><span class="money" data-currency-usd="$499.00">$499.00</span></span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link no-title-0">
                                    <a href="">
                                    <span></span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub fix no-title-1">
                                      <li class="bp-item">
                                        <div class="product-wrapper">
                                          <div class="product-head">
                                            <div class="product-image">
                                              <div class="product-group-vendor-name">
                                                <h5 class="product-name"><a href="/products/quisque-placerat-libero">Dentotam Product Sample</a></h5>
                                              </div>
                                              <div class="featured-img product-ratio-false">
                                                <a href="/products/quisque-placerat-libero">
                                                  <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                    <!-- noscript pattern -->
                                                    <noscript>
                                                      <img class="img-lazy product-ratio-false featured-image front" src="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_370x.jpg?v=1605600708" alt="group-brown" style="object-fit: unset" />
                                                    </noscript>
                                                    <img class="featured-image front img-lazy blur-up auto-crop-false lazyautosizes lazyloaded" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-expand="auto" data-sizes="auto" data-parent-fit="cover" alt="group-brown" style="object-fit: unset" data-srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_180x.jpg?v=1605600708 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_320x.jpg?v=1605600708 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_540x.jpg?v=1605600708 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_720x.jpg?v=1605600708 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_1080x.jpg?v=1605600708 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_1366x.jpg?v=1605600708 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_1920x.jpg?v=1605600708 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_2048x.jpg?v=1605600708 2048w" sizes="117px" srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_180x.jpg?v=1605600708 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_320x.jpg?v=1605600708 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_540x.jpg?v=1605600708 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_720x.jpg?v=1605600708 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_1080x.jpg?v=1605600708 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_1366x.jpg?v=1605600708 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_1920x.jpg?v=1605600708 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GoldPhone_bd50e26e-6236-4648-88db-d0b8a94a1bde_2048x.jpg?v=1605600708 2048w">
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="product-content">
                                            <div class="pc-inner">
                                              <div class="price-cart-wrapper">
                                                <div class="product-price notranslate">
                                                  <span class="price"><span class="money" data-currency-usd="$20.00">$20.00</span></span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="mega-col col-lg-3">
                                  <div class="dropdown mega-sub-link no-title-0">
                                    <a href="">
                                    <span></span>
                                    </a>
                                    <span class="expand"></span>
                                    <ul class="dropdown-menu dropdown-menu-sub fix no-title-1">
                                      <li class="bp-item">
                                        <div class="product-wrapper">
                                          <div class="product-head">
                                            <div class="product-image">
                                              <div class="product-group-vendor-name">
                                                <h5 class="product-name"><a href="/products/gold-diamond-chain">Gold Diamond Chain</a></h5>
                                              </div>
                                              <div class="featured-img product-ratio-false">
                                                <a href="/products/gold-diamond-chain">
                                                  <span class="image-lazysize" style="position:relative;padding-top:91.66666666666667%;">
                                                    <!-- noscript pattern -->
                                                    <noscript>
                                                      <img class="img-lazy product-ratio-false featured-image front" src="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_370x.jpg?v=1604559863" alt="Gold Diamond Chain" style="object-fit: unset" />
                                                    </noscript>
                                                    <img class="featured-image front img-lazy blur-up auto-crop-false lazyautosizes lazyloaded" data-widths="[180, 320, 540, 720, 1080, 1366, 1920, 2048] " data-aspectratio="1.0909090909090908" data-expand="auto" data-sizes="auto" data-parent-fit="cover" alt="Gold Diamond Chain" style="object-fit: unset" data-srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_180x.jpg?v=1604559863 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_320x.jpg?v=1604559863 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_540x.jpg?v=1604559863 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_720x.jpg?v=1604559863 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_1080x.jpg?v=1604559863 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_1366x.jpg?v=1604559863 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_1920x.jpg?v=1604559863 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_2048x.jpg?v=1604559863 2048w" sizes="117px" srcset="//cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_180x.jpg?v=1604559863 180w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_320x.jpg?v=1604559863 320w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_540x.jpg?v=1604559863 540w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_720x.jpg?v=1604559863 720w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_1080x.jpg?v=1604559863 1080w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_1366x.jpg?v=1604559863 1366w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_1920x.jpg?v=1604559863 1920w, //cdn.shopify.com/s/files/1/0066/4322/0562/products/GameStation_2048x.jpg?v=1604559863 2048w">
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="product-content">
                                            <div class="pc-inner">
                                              <div class="price-cart-wrapper">
                                                <div class="product-price notranslate">
                                                  <span class="price"><span class="money" data-currency-usd="$399.00">$399.00</span></span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </nav>
                  </div>
                </div>
                <div class="shipping-text">
                  <span>Free Shipping on Orders $500+</span>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Begin Menu Mobile-->
        <div class="mobile-version d-lg-none" style="">
          <div class="menu-mobile navbar">
            <div class="mm-wrapper">
              <div class="nav-collapse is-mobile-nav">
                <ul class="main-nav mobile-touch-link">
                  <li class="mobile-layout-bar">
                    <ul class="m-block-icons list-inline">
                      <li id="ssw-topauth" class="ssw-topauth m-customer-account">
                        <a id="customer_login_link" href="javascript:void(0);" data-toggle="ssw-modal" data-target="#login_modal" onclick="trackShopStats('login_popup_view', 'all')">
                        <i class="demo-icon icon-electro-user-icon"></i>
                        </a>
                      </li>
                      <li class="compare-target">
                        <a data-arn-action="show" class="show-compare icon-5 " href="javascript:;">
                          <svg width="24" height="24" class="arn_icon arn_icon-show-compare">
                            <use xlink:href="#arn_icon-show-compare"></use>
                          </svg>
                          <svg width="24" height="24" class="arn_icon arn_icon-preloader">
                            <use xlink:href="#arn_icon-preloader"></use>
                          </svg>
                          <span class="number">
                          <span class="n-item">1</span>
                          </span>
                        </a>
                      </li>
                      <li class="wishlist-target">
                        <a data-arn-action="show" class="show-wishlist icon-2 " href="javascript:;">
                          <svg width="24" height="24" class="arn_icon arn_icon-show-wishlist">
                            <use xlink:href="#arn_icon-show-wishlist"></use>
                          </svg>
                          <svg width="24" height="24" class="arn_icon arn_icon-preloader">
                            <use xlink:href="#arn_icon-preloader"></use>
                          </svg>
                          <span class="number">
                          <span class="n-item">1</span>
                          </span>
                        </a>
                      </li>
                      <li class="currency_icon currency_icon_mobile type-lang-list" data-target="#language-popup" data-toggle="modal" data-flag="lang-list"><i class="language-flag language-flag-en"></i></li>
                    </ul>
                  </li>
                  <li class="">
                    <a href="/collections">
                    <span>Value of the Day</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="/collections/all-in-one">
                    <span>Top 100 Offers</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="/collections/accessories">
                    <span>New Arrivals</span>
                    </a>
                  </li>
                  <li class="dropdown mega-menu">
                    <div class="dropdown-inner">
                      <a href="/collections/tv-audio" class="dropdown-link">
                      <span>TV &amp; Audio</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <div class="dropdown-menu lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-4-300x256_292x270.png?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                      <div class="back-prev-menu"><span class="expand back">Back</span></div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/watches">
                          <span>Watches</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/watches"> All Watches </a></li>
                          <li><a href="/collections/accessories"> Men's Watches </a></li>
                          <li><a href="/collections/all-in-one"> Women's Watches </a></li>
                          <li><a href="/collections/cameras"> Kid Watches </a></li>
                          <li><a href="/collections/gadgets"> Premium Watches </a></li>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/tv-audio">
                          <span>Audio &amp; Video</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/ultrabooks"> All Cameras &amp; Photography </a></li>
                          <li><a href="/collections/accessories"> Camera Accessories </a></li>
                          <li><a href="/collections/phones-pdas"> Digital SLRs </a></li>
                          <li><a href="/collections/photography"> Security &amp; Surveillance </a></li>
                          <li><a href="/collections/software"> Binoculars &amp; Telescopes </a></li>
                          <li><a href="/collections/watches">Camcorders</a></li>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/laptops-computer">
                          <span>Laptop</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/accessories">Toshiba</a></li>
                          <li><a href="/collections/software">Samsung</a></li>
                          <li><a href="/collections/photography">Lenovo</a></li>
                          <li><a href="/collections/software">Dell</a></li>
                          <li><a href="/collections/watches">Apple</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown mega-menu">
                    <div class="dropdown-inner">
                      <a href="/collections/gadgets" class="dropdown-link">
                      <span>Gadgets</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <div class="dropdown-menu lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-9.png?v=1604560581" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                      <div class="back-prev-menu"><span class="expand back">Back</span></div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/watches">
                          <span>Watches</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/watches"> All Watches </a></li>
                          <li><a href="/collections/accessories"> Men's Watches </a></li>
                          <li><a href="/collections/all-in-one"> Women's Watches </a></li>
                          <li><a href="/collections/cameras"> Kid Watches </a></li>
                          <li><a href="/collections/gadgets"> Premium Watches </a></li>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/accessories">
                          <span>Industrial Supplies</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/accessories">All Industrial Supplies</a></li>
                          <li><a href="/collections/cameras">Lab &amp; Scientific</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown mega-menu">
                    <div class="dropdown-inner">
                      <a href="/collections/all-in-one" class="dropdown-link">
                      <span>All in One</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <div class="dropdown-menu lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-8.png?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                      <div class="back-prev-menu"><span class="expand back">Back</span></div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="" class="d-lg-none">
                          <span>All in One Title</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <div class="dropdown mega-sub-link">
                            <div class="dropdown-inner">
                              <a href="/collections/accessories" class="dropdown-link">
                              <span> Computers &amp; Accessories </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-sub">
                              <li class="back-prev-menu"><span class="expand back">Back</span></li>
                              <li><a href="/collections/all-in-one"> All Computers &amp; Accessories </a></li>
                              <li><a href="/collections/cameras"> Laptops, Desktops &amp; Monitors </a></li>
                              <li><a href="/collections/cameras"> Printers &amp; Ink </a></li>
                              <li><a href="/collections/gadgets"> Networking &amp; Internet Devices </a></li>
                            </ul>
                          </div>
                          <div class="dropdown mega-sub-link">
                            <div class="dropdown-inner">
                              <a href="/collections/watches" class="dropdown-link">
                              <span> Mobiles &amp; Tablets </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-sub">
                              <li class="back-prev-menu"><span class="expand back">Back</span></li>
                              <li><a href="/collections/cameras"> Cases &amp; Covers </a></li>
                              <li><a href="/collections/laptops-computer"> Android Mobiles </a></li>
                              <li><a href="/collections/phones-pdas"> Windows Mobiles </a></li>
                            </ul>
                          </div>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/tv-audio">
                          <span>Audio &amp; Video</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/ultrabooks"> All Cameras &amp; Photography </a></li>
                          <li><a href="/collections/accessories"> Camera Accessories </a></li>
                          <li><a href="/collections/phones-pdas"> Digital SLRs </a></li>
                          <li><a href="/collections/photography"> Security &amp; Surveillance </a></li>
                          <li><a href="/collections/software"> Binoculars &amp; Telescopes </a></li>
                          <li><a href="/collections/watches">Camcorders</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown mega-menu">
                    <div class="dropdown-inner">
                      <a href="/collections/accessories" class="dropdown-link">
                      <span>Accessories</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <div class="dropdown-menu lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-image1-1_292x270.jpg?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                      <div class="back-prev-menu"><span class="expand back">Back</span></div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/eyewear">
                          <span>Eyewear</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/eyewear"> Men’s Sunglasses </a></li>
                          <li><a href="/collections/accessories"> Women’s Sunglasses </a></li>
                          <li><a href="/collections/gadgets"> Spectacle Frames </a></li>
                          <li><a href="/collections/mp3-players"> All Sunglasses </a></li>
                          <li><a href="/collections/pc-computers"> Amazon Fashion </a></li>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/pages/contact-us">
                          <span>Ecommerce Page</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/all">Shop</a></li>
                          <li><a href="/pages/about-us">About Us</a></li>
                          <li><a href="/pages/shipping-return">Shipping &amp; Return</a></li>
                          <li><a href="/pages/frequently-asked-questions">FAQs</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown mega-menu">
                    <div class="dropdown-inner">
                      <a href="/collections/gaming" class="dropdown-link">
                      <span>Gaming</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <div class="dropdown-menu lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu.png?v=1604560581" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                      <div class="back-prev-menu"><span class="expand back">Back</span></div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="">
                          <span>Computers</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <div class="dropdown mega-sub-link">
                            <div class="dropdown-inner">
                              <a href="/collections/accessories" class="dropdown-link">
                              <span> Computers &amp; Accessories </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-sub">
                              <li class="back-prev-menu"><span class="expand back">Back</span></li>
                              <li><a href="/collections/all-in-one"> All Computers &amp; Accessories </a></li>
                              <li><a href="/collections/cameras"> Laptops, Desktops &amp; Monitors </a></li>
                              <li><a href="/collections/cameras"> Printers &amp; Ink </a></li>
                              <li><a href="/collections/gadgets"> Networking &amp; Internet Devices </a></li>
                            </ul>
                          </div>
                          <div class="dropdown mega-sub-link">
                            <div class="dropdown-inner">
                              <a href="/collections/watches" class="dropdown-link">
                              <span> Mobiles &amp; Tablets </span>
                              </a>
                              <span class="expand"></span>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-sub">
                              <li class="back-prev-menu"><span class="expand back">Back</span></li>
                              <li><a href="/collections/cameras"> Cases &amp; Covers </a></li>
                              <li><a href="/collections/laptops-computer"> Android Mobiles </a></li>
                              <li><a href="/collections/phones-pdas"> Windows Mobiles </a></li>
                            </ul>
                          </div>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/music">
                          <span>Music</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/accessories">All Industrial Supplies</a></li>
                          <li><a href="/collections/cameras">Lab &amp; Scientific</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown mega-menu">
                    <div class="dropdown-inner">
                      <a href="/collections/laptops-computer" class="dropdown-link">
                      <span>Laptops &amp; Computer</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <div class="dropdown-menu lazyload" data-bgset="//cdn.shopify.com/s/files/1/0066/4322/0562/files/megamenu-2-300x256_292x270.png?v=1604560580" style="min-height: 300px; background-repeat: no-repeat; background-position: bottom right;">
                      <div class="back-prev-menu"><span class="expand back">Back</span></div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections/accessories">
                          <span>Single Product Pages</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/products/consectetur-nibh-eget">Single Product Sidebar</a></li>
                          <li><a href="/products/faxtex-product-sample">Single Product Full</a></li>
                          <li><a href="/products/gold-diamond-chain">Group Product</a></li>
                          <li><a href="/products/condimentum-turpis">Product Redirect</a></li>
                          <li><a href="/products/magna-elementum-odio">Product Re-order</a></li>
                          <li><a href="/products/coneco-product-sample">Discount Popup Product</a></li>
                        </ul>
                      </div>
                      <div class="dropdown mega-sub-link">
                        <div class="dropdown-inner">
                          <a href="/collections">
                          <span>Shop Pages</span>
                          </a>
                          <span class="expand"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-sub">
                          <li class="back-prev-menu"><span class="expand back">Back</span></li>
                          <li><a href="/collections/cameras">Shop Left Sidebar</a></li>
                          <li><a href="/collections/all/?preview_theme_id=82768887859">Shop Right Sidebar</a></li>
                          <li><a href="/collections/all-in-one">Shop Full Width</a></li>
                          <li><a href="/collections/accessories">Shop Sub Collection</a></li>
                          <li><a href="/collections/printers-ink">Collection Infinite Load</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown">
                    <div class="dropdown-inner">
                      <a href="/collections/mac-computers" class="dropdown-link">
                      <span> Mac Computers </span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="back-prev-menu"><span class="expand back">Back</span></li>
                      <li><a tabindex="-1" href="/collections/accessories"><span>Cases</span></a></li>
                      <li><a tabindex="-1" href="/collections/eyewear"><span>Chargers</span></a></li>
                      <li><a tabindex="-1" href="/collections/laptops-computer"><span>Computer Accessories</span></a></li>
                      <li><a tabindex="-1" href="/collections/headphone"><span>Headphones</span></a></li>
                      <li><a tabindex="-1" href="/collections/keyboard"><span>Keyboard</span></a></li>
                      <li><a tabindex="-1" href="/collections/mouse"><span>Mouse</span></a></li>
                      <li><a tabindex="-1" href="/collections/ultrabooks"><span>Monitors</span></a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <div class="dropdown-inner">
                      <a href="/collections/ultrabooks" class="dropdown-link">
                      <span>Ultrabooks</span>
                      </a>
                      <span class="expand"></span>
                    </div>
                    <ul class="dropdown-menu">
                      <li class="back-prev-menu"><span class="expand back">Back</span></li>
                      <li><a tabindex="-1" href="/collections/cameras"><span>Cameras</span></a></li>
                      <li><a tabindex="-1" href="/collections/watches"><span>Watches</span></a></li>
                      <li><a tabindex="-1" href="/collections/mouse"><span>Mouse</span></a></li>
                    </ul>
                  </li>
                </ul>
                <ul class="mobile-contact-bar list-inline">
                  <li class="contactbar-item">
                    <a class="contactbar-item-link" href="tel:(+800) 123 456 7890">
                    <i class="demo-icon icon-phone"></i>
                    <span>Call</span>
                    </a>
                  </li>
                  <li class="contactbar-item">
                    <a class="contactbar-item-link" href="mailto:sample@email.com">
                    <i class="demo-icon icon-mail-1"></i>
                    <span>Contact</span>
                    </a>
                  </li>
                  <li class="contactbar-item ci-store-info">
                    <a class="contactbar-item-link" href="javascript:;">
                    <i class="demo-icon icon-globe-1"></i>
                    <span>Store info</span>
                    </a>
                  </li>
                  <li class="contactbar-item">
                    <a class="contactbar-item-link" href="/pages/contact-us">
                    <i class="demo-icon icon-electro-marker-icon"></i>
                    <span>Directions</span>
                    </a>
                  </li>
                </ul>
                <div class="contactbar-info">
                  <span class="contactbar-info-close"><i class="demo-icon icon-cancel-2"></i></span>
                  <p>632 SW Pine Street<br>Portland, Oregon</p>
                  <p>Mon-Sat, 11-7<br>Sun, 12-5</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Menu Mobile-->
      </div>
      <div class="searchbox searchbox-mobile">
        <div class="container">
          <form id="search-mobile" class="navbar-form search" action="/search" method="get">
            <input type="hidden" name="type" value="product">
            <input type="hidden" name="options[prefix]" value="last">
            <input id="bc-product-mobile-search" type="text" name="q" class="form-control bc-product-search" placeholder="Search" autocomplete="off">
            <button type="submit" class="search-icon">
            <span>
            <i class="demo-icon icon-electro-search-icon"></i>
            </span>
            </button>
          </form>
          <div class="result-ajax-search">
            <ul class="search-results"></ul>
          </div>
        </div>
      </div>
    </header>
  </div>
</div>