 <!-- BEGIN: Main Menu-->
   

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="" src="<?php echo $set['installUrl']; ?>assets/logo/<?php echo $set['logo']; ?>"/>
              <h3 class="brand-text"><?php echo $name; ?></h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="navigation-background"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class=" nav-item"><a href="dashboard"><i class="fa fa-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>

          <li class=" nav-item"><a href="#"><i class="fa fa-align-justify"></i><span class="menu-title" data-i18n="">Products</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="new_product">Add Product</a></li>
              <li><a class="menu-item" href="product_list">Products List</a></li>
              <li><a class="menu-item" href="awaiting_product">Products Waiting Approval</a></li>
            </ul>
          </li>

          <li><a class="menu-item" href="sales"><i class="fa fa-credit-card"></i><span class="menu-title" data-i18n="">Pending Orders</span></a></li>

          <li><a class="menu-item" href="to_be_delivered"><i class="fa fa-calendar-alt"></i><span class="menu-title" data-i18n="">Awaiting Delivery</span></a></li>

           <li><a class="menu-item" href="delivered_products"><i class="fa fa-calendar-alt"></i><span class="menu-title" data-i18n="">Delivered Products</span></a></li>

            <li><a class="menu-item" href="wallet"><i class="fa fa-wallet"></i><span class="menu-title" data-i18n="">My Wallet</span></a></li>

          
         

         
           
            
            </ul>
          </li>
         
         
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->
