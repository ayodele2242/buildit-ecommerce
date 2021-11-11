<?php
include("header.php");
include("header-bottom.php");
 $category = new Category();
  $product = new Product();
  $parent_id = null;
  $child_cat_id = null;

  if (isset($_GET['cid'])) {
    $parent_id = (int)$_GET['cid'];
     $cat = $category->getCategoryById($parent_id);
  }

  if (isset($_GET['child_id'])) {
    $child_cat_id = (int)$_GET['child_id'];
    $cat = $category->getCategoryById($child_cat_id);

  }

  $category_product = $product->getProductByCategory($parent_id, $child_cat_id);


?>
<style type="text/css">
  .pagination {
  display: inline-block;
  padding: 0;
  margin-top: 30px;

}

.pagination li {
  display: inline;
}

.pagination li a {
  margin: 0 4px; /* 0 is for top and bottom. Feel free to change it */
   display: inline-block;
  color: #fff;
  font-weight: bold;
  background: #2196F3;
  width: 40px;
  height: 40px;
  text-align: center;

 
  border-radius: 5px;

}

.pagination li.active {
  background-color: #4CAF50;
  color: white;
  padding: 8px 18px;
  text-decoration: none;
  border-radius: 5px;
}

.pagination li a:hover:not(.active) {background-color: #ddd;}

</style>


 <div class="main-content p-5" style="background: url(img/store.jpg); background-repeat: no-repeat; background-size: cover; height: 100%; min-height: 200px; display: block;  text-align:center; justify-content: center; align-items: center;  color: #fff; font-weight: bolder;">

    <p style="font-size: 38px; margin-bottom: 15px;"><?php echo $set['storeName']  ?> Store</p>
    <p>Shop for all items...</p>
</div>
    <!-- Page Content-->
 

 <div id="body-content" class="">
  <div id="main-content">
    <div class="main-content">
      <div id="shopify-section-collection-template" class="shopify-section">
        <div class="wrap-breadcrumb bw-color ">
          <div id="breadcrumb" class="breadcrumb-holder container">
            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
              <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo $set['installUrl']; ?>">
                  <span itemprop="name" class="d-none"><?php echo $set['storeName']; ?></span> Home
                  <meta itemprop="position" content="1">
                </a>
              </li>
              <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="d-none">
                <a href="/collections/cameras" itemprop="item">
                  <span itemprop="name">Store</span>
                  <meta itemprop="position" content="2">
                </a>
              </li>
              <li class="active">Store</li>
            </ul>
          </div>
        </div>
        <script crossorigin="anonymous" src="frontpage/jquery.history.js?v=9788135271330519338" defer=""></script>
        <script crossorigin="anonymous" src="frontpage/bc.ajax-filter.js?v=15568626357955134705" defer=""></script> 
        <div class="page-cata active-sidebar" data-logic="true">
          <div class="container">
            <div class="row">

              <div id="sidebar" class="left-column-container col-lg-3 col-md-12 mobile-hide">
                <!--<div class="f-close d-lg-none" title="Close"><i class="demo-icon icon-delete"></i></div>-->
                <div class="sb-widget d-none d-lg-block">

                  <div class="sb-menu">
                    <h5 class="sb-title">Categories</h5>
                    <div class="scrollbar" id="style-16" style="height: 100%; max-height: 300px;" >
                     <ul class="widget-list cz-filter-list list-unstyled pt-1 categories-menu all-clear force-overflow"  data-simplebar data-simplebar-auto-hide="false" >
                  <?php

                   if(isset($parent_cats) && !empty($parent_cats)){
                        
                      foreach ($parent_cats as $parents ) {
                          $child_cats = $category->getChildByParentId($parents->id);
                          if ($child_cats) {
                            ?>

                 <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all icategory" type="checkbox" id="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>" value="<?php echo $parents->id; ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>"><?php echo ucwords($parents->title); ?></label>
                    </div>
                  </li>

                  <?php
                }else{
                ?>

                <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all icategory" type="checkbox" id="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>" value="<?php echo $parents->id; ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>"><?php echo ucwords($parents->title); ?></label>
                    </div>
                  </li>

                <?php
                 }
               }
             }
                ?>

         
                  
                </ul>
                 </div>
                  </div>
                </div>
                <div class="sb-widget d-none d-lg-block">
                  <div class="sb-heading-filter">
                    <h5 class="sb-title">Filter</h5>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="color">
                        <div id="filter-1" class="sb-filter color" data-type="color">
                          <div class="sbf-title">
                            <span>Color</span>
                           
                          </div>

                           <div class="d-flex flex-wrap">
                   <?php
                    $cquery = mysqli_query($mysqli,"
                    SELECT DISTINCT(color)  FROM product_colors ORDER BY color DESC
                    ");

                     $ccount = mysqli_num_rows($cquery);
                    if($ccount < 1){
                      echo "No brands available.";
                    }else{
                    
                    while($crow = mysqli_fetch_array($cquery))
                    {
                       $colors[] = lcfirst($crow['color']);
     
                    }

                $j = 0; 
                foreach( $colors as $element) {  
            $arr[$j] = strtolower($element); 
              
            $j++; 
        } 

        //print_r($arr);

   
                $colors = array_unique(array_map('trim', explode(',', implode(',', $arr))));
        sort($colors);
          $icolors = implode(',', $colors);



          $mcolor = explode(',',  $icolors);
        foreach($mcolor as $color) {
          # code...
        $icolor = str_replace(" ", "", $color);
        if( preg_match("/_|&|%/", $icolor) )
                       {
                        $names_array = array_map('trim',explode('&', $icolor));
                        $grad = array();
                        foreach($names_array as $gradient){
                        //echo $names_array[2];
                          
                          $grad[] = $gradient;

                          }
                          $grad = implode(",", $grad);  
                          

        ?>
                  <div class="custom-control custom-option text-center mb-2 mx-1" style="width: 4rem;" data-toggle="tooltip" data-placement="top" title="<?php  echo $icolor; ?>">
                    <input class="custom-control-input filter_all color" type="checkbox" id="<?php echo $icolor;  ?>" value="<?php echo $color;  ?>">
                    <label class="custom-option-label rounded-circle" for="<?php echo $icolor;  ?>"><span class="custom-option-color rounded-circle" style="background-image: linear-gradient(to right, <?php echo  $grad; ?>
    );"></span></label>
                    
                  </div>
                   <?php
                   

                 }else{
                   ?>
                    <div class="custom-control custom-option text-center mb-2 mx-1" style="width: 4rem;" data-toggle="tooltip" data-placement="top" title="<?php  echo $icolor; ?>">
                    <input class="custom-control-input filter_all color" type="checkbox" id="<?php echo $icolor;  ?>" value="<?php echo $color;  ?>">
                    <label class="custom-option-label rounded-circle" for="<?php echo $icolor;  ?>"><span class="custom-option-color rounded-circle" style="background-color: <?php echo $icolor;  ?>;"></span></label>
                   
                  </div>

                <?php
              }
                }
              }
                ?>  



                  
                </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="size">
                        <div id="filter-2" class="sb-filter size" data-type="size">
                          <div class="sbf-title">
                            <span>Size</span>
                            
                          </div>
                          <div class="scrollbar pl-3 pt-2" id="style-16" style="height: 100%; max-height: 300px;" >
                          <ul class="widget-list cz-filter-list list-unstyled pt-1 force-overflow" >
                   <?php
                    $squery = mysqli_query($mysqli,"
                    SELECT DISTINCT(size)  FROM product_sizes ORDER BY size DESC
                    ");

                     $scount = mysqli_num_rows($squery);
                    if($scount < 1){
                      echo "No sizes available.";
                    }else{
                    
                    while($srow = mysqli_fetch_array($squery))
                    {
                       $sizes[] = $srow['size'];
     
                    }

                    $sj = 0; 
                foreach( $sizes as $selement) {  
            $sarr[$sj] = strtolower($selement); 
              
            $sj++; 
        } 
   
                $sizes = array_unique(array_map('trim', explode(',', implode(',', $sarr))));
        sort($sizes);
          $isizes = implode(',', $sizes);

          $msize = explode(',', $isizes);
        foreach($msize as $size) {
          # code...
        

        ?>

         <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all size" type="checkbox" id="<?php echo $size;  ?>" value="<?php echo $size;  ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo $size;  ?>"><?php echo $size;  ?></label>
                    </div>
                  </li>


        <?php
         }
        }

                    ?>

                  
                </ul>
              </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="brand">
                        <div id="filter-3" class="sb-filter brand" data-type="brand">
                          <div class="sbf-title">
                            <span>Brand</span>
                            <a id="clear-filter-3" class="clear-filter hidden" style="float: right;" href="javascript:void(0);">Clear</a>
                          </div>
                           <div class="scrollbar pl-3 pt-2" id="style-5" style="height: 100%; max-height: 300px;" >
                           <ul class="widget-list cz-filter-list list-unstyled pt-1 force-overflow">

                   <?php
                    $bquery = mysqli_query($mysqli,"
                    SELECT DISTINCT(brand)  FROM product_brands where brand != '' ORDER BY brand DESC
                    ");

                    $bcount = mysqli_num_rows($bquery);
                    if($bcount < 1){
                      echo "No brands available.";
                    }else{

                    
                    while($brow = mysqli_fetch_array($bquery))
                    {
                      $brands[] = $brow['brand'];
                                        
                   }


                   $bj = 0; 
                foreach( $brands as $belement) {  
            $barr[$bj] = strtolower($belement); 
              
            $bj++; 
        }  

                $brands = array_unique(array_map('trim', explode(',', implode(',', $barr))));
        sort($brands);
          $ibrands = implode(',', $brands);

          $mbrands = explode(',', $ibrands);
        foreach($mbrands as $bvalue) {

                ?>

                  <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all brand" type="checkbox" id="<?php echo $bvalue; ?>" value="<?php echo $bvalue; ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo $bvalue; ?>"><?php echo ucwords($bvalue); ?></label>
                    </div>
                  </li>

          <?php
        }
        }
                    ?>
                  
                </ul>
              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="price">
                        <div id="filter-4" class="sb-filter price" data-type="price">
                          <div class="sbf-title">
                            <span>Price</span>
                            
                          </div>
                              
              <!-- Price range-->
              <div class="widget mb-2 pb-2">
                <input type="hidden" id="min_price_hide" value="0" />
                    <input type="hidden" id="max_price_hide" value="1000000<?php //echo $maxamt; ?>" />
                    <p id="price_show">10 - 1000000<?php //echo $maxamt; ?></p>
                    <div id="price_range"></div>

               <!-- <div class="cz-range-slider" data-start-min="0" data-start-max="1680" data-min="0" data-max="<?php echo $maxamt; ?>" data-step="1">
                  <div class="cz-range-slider-ui" id="price_range"></div>
                  <div class="d-flex pb-1">
                    <div class="w-50 pr-2 mr-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><span class="input-group-text"><?php echo $left_currency ?></span></div>
                        <input class="form-control cz-range-slider-value-min" type="text" id="min_price_hide">
                      </div>
                    </div>
                    <div class="w-50 pl-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><span class="input-group-text"><?php echo $left_currency ?></span></div>
                        <input class="form-control cz-range-slider-value-max" type="text" id="max_price_hide">
                      </div>
                    </div>
                  </div>
                </div>-->
              </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


               



             
              </div>
              <div class="main-cata-page col-lg-9 col-md-12 col-sm-12 col-12">
              
                <div class="cata-toolbar">
                  <div class="group-toolbar p-3">
                      <div class="filter-icon mobile-filter-icon d-lg-none" data-toggle="modal" data-target="#filtermodal">
                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="sliders-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sliders-h fa-w-16 fa-2x">
                          <path fill="currentColor" d="M496 72H288V48c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v24H16C7.2 72 0 79.2 0 88v16c0 8.8 7.2 16 16 16h208v24c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-24h208c8.8 0 16-7.2 16-16V88c0-8.8-7.2-16-16-16zm0 320H160v-24c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v24H16c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h80v24c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-24h336c8.8 0 16-7.2 16-16v-16c0-8.8-7.2-16-16-16zm0-160h-80v-24c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v24H16c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h336v24c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-24h80c8.8 0 16-7.2 16-16v-16c0-8.8-7.2-16-16-16z" class=""></path>
                        </svg>
                        Filter
                    </div>
                    <div class="grid-list">
                      <span class="text">View</span>
                      <span class="grid grid-4 active" title="Grid" data-grid="grid-4">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th fa-w-16 fa-2x">
                          <path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z" class=""></path>
                        </svg>
                      </span>
                      <span class="grid grid-3" title="Large" data-grid="grid-3">
                        <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="th-large" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th-large fa-w-16 fa-2x">
                          <g class="fa-group">
                            <path fill="currentColor" d="M488 272H296a24 24 0 0 0-24 24v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V296a24 24 0 0 0-24-24zm-272 0H24a24 24 0 0 0-24 24v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V296a24 24 0 0 0-24-24z" class="fa-secondary"></path>
                            <path fill="currentColor" d="M488 32H296a24 24 0 0 0-24 24v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V56a24 24 0 0 0-24-24zm-272 0H24A24 24 0 0 0 0 56v160a24 24 0 0 0 24 24h192a24 24 0 0 0 24-24V56a24 24 0 0 0-24-24z" class="fa-primary"></path>
                          </g>
                        </svg>
                      </span>
                      <span class="grid grid-2" title="List" data-grid="grid-2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-list fa-w-16 fa-2x">
                          <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" class=""></path>
                        </svg>
                      </span>
                      <span class="grid grid-1" title="List Small" data-grid="grid-1">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th-list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th-list fa-w-16 fa-2x">
                          <path fill="currentColor" d="M149.333 216v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-80c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zM125.333 32H24C10.745 32 0 42.745 0 56v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24zm80 448H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm-24-424v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24zm24 264H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24z" class=""></path>
                        </svg>
                      </span>
                    </div>

           <!-- <div class="sort-by bc-toggle">
            <div class="sort-by-inner">
              <label class="d-none d-md-block">Sort by</label>
              <div id="cata_sort_by">
                <button id="sort_by_button">
                <span class="name"><a href="javascript:;"></a></span>
                <i class="demo-icon icon-down-dir"></i>
                </button>
              </div>
              <ul id="sort_by_box" class="bc-dropdown">
                <li class="sort-action price-ascending" data-sort="price-ascending"><a href="javascript:;">Price, Low To High</a></li>
                <li class="sort-action price-descending" data-sort="price-descending"><a href="javascript:;">Price, High To Low</a></li>
                
               
              </ul>
            </div>
           
          </div>-->
                    <!--<div class="pagination-showing">
                      <div class="showing">
                       
                      </div>
                    </div>-->
                  </div>
                </div>
                <div id="col-main">
                  <div class="cata-product cp-grid filter_data" id="filter_data">


                    



                   
                   
                   
                   
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>





 <!--Modal for delete-->
                         <!-- Panel Left -->
                         <div class="modal fade panelbox panelbox-left" id="filtermodal" tabindex="-1" role="dialog">
                        <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Filter</h5>
                                <a href="javascript:;" data-dismiss="modal">Close</a>
                            </div>
                            <div class="modal-body">
                           
                              <div class="left-column-container col-md-12">
                <!--<div class="f-close d-lg-none" title="Close"><i class="demo-icon icon-delete"></i></div>-->
                <div class="sb-widget d-none d-lg-block">

                  <div class="sb-menu">
                    <h5 class="sb-title">Categories</h5>
                    <div class="scrollbar" id="style-16" style="height: 100%; max-height: 300px;" >
                     <ul class="widget-list cz-filter-list list-unstyled pt-1 categories-menu all-clear force-overflow"  data-simplebar data-simplebar-auto-hide="false" >
                  <?php

                   if(isset($parent_cats) && !empty($parent_cats)){
                        
                      foreach ($parent_cats as $parents ) {
                          $child_cats = $category->getChildByParentId($parents->id);
                          if ($child_cats) {
                            ?>

                 <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all icategory" type="checkbox" id="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>" value="<?php echo $parents->id; ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>"><?php echo ucwords($parents->title); ?></label>
                    </div>
                  </li>

                  <?php
                }else{
                ?>

                <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all icategory" type="checkbox" id="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>" value="<?php echo $parents->id; ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo str_replace(' ', '-', stripslashes($parents->title)); ?>"><?php echo ucwords($parents->title); ?></label>
                    </div>
                  </li>

                <?php
                 }
               }
             }
                ?>

         
                  
                </ul>
                 </div>
                  </div>
                </div>
                <div class="sb-widget d-none d-lg-block">
                  <div class="sb-heading-filter">
                    <h5 class="sb-title">Filter</h5>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="color">
                        <div id="filter-1" class="sb-filter color" data-type="color">
                          <div class="sbf-title">
                            <span>Color</span>
                           
                          </div>

                           <div class="d-flex flex-wrap">
                   <?php
                    $cquery = mysqli_query($mysqli,"
                    SELECT DISTINCT(color)  FROM product_colors ORDER BY color DESC
                    ");

                     $ccount = mysqli_num_rows($cquery);
                    if($ccount < 1){
                      echo "No brands available.";
                    }else{
                    
                    while($crow = mysqli_fetch_array($cquery))
                    {
                       $colors[] = lcfirst($crow['color']);
     
                    }

                $j = 0; 
                foreach( $colors as $element) {  
            $arr[$j] = strtolower($element); 
              
            $j++; 
        } 

        //print_r($arr);

   
                $colors = array_unique(array_map('trim', explode(',', implode(',', $arr))));
        sort($colors);
          $icolors = implode(',', $colors);



          $mcolor = explode(',',  $icolors);
        foreach($mcolor as $color) {
          # code...
        $icolor = str_replace(" ", "", $color);
        if( preg_match("/_|&|%/", $icolor) )
                       {
                        $names_array = array_map('trim',explode('&', $icolor));
                        $grad = array();
                        foreach($names_array as $gradient){
                        //echo $names_array[2];
                          
                          $grad[] = $gradient;

                          }
                          $grad = implode(",", $grad);  
                          

        ?>
                  <div class="custom-control custom-option text-center mb-2 mx-1" style="width: 4rem;" data-toggle="tooltip" data-placement="top" title="<?php  echo $icolor; ?>">
                    <input class="custom-control-input filter_all color" type="checkbox" id="<?php echo $icolor;  ?>" value="<?php echo $color;  ?>">
                    <label class="custom-option-label rounded-circle" for="<?php echo $icolor;  ?>"><span class="custom-option-color rounded-circle" style="background-image: linear-gradient(to right, <?php echo  $grad; ?>
    );"></span></label>
                    
                  </div>
                   <?php
                   

                 }else{
                   ?>
                    <div class="custom-control custom-option text-center mb-2 mx-1" style="width: 4rem;" data-toggle="tooltip" data-placement="top" title="<?php  echo $icolor; ?>">
                    <input class="custom-control-input filter_all color" type="checkbox" id="<?php echo $icolor;  ?>" value="<?php echo $color;  ?>">
                    <label class="custom-option-label rounded-circle" for="<?php echo $icolor;  ?>"><span class="custom-option-color rounded-circle" style="background-color: <?php echo $icolor;  ?>;"></span></label>
                   
                  </div>

                <?php
              }
                }
              }
                ?>  



                  
                </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="size">
                        <div id="filter-2" class="sb-filter size" data-type="size">
                          <div class="sbf-title">
                            <span>Size</span>
                            
                          </div>
                          <div class="scrollbar pl-3 pt-2" id="style-16" style="height: 100%; max-height: 300px;" >
                          <ul class="widget-list cz-filter-list list-unstyled pt-1 force-overflow" >
                   <?php
                    $squery = mysqli_query($mysqli,"
                    SELECT DISTINCT(size)  FROM product_sizes ORDER BY size DESC
                    ");

                     $scount = mysqli_num_rows($squery);
                    if($scount < 1){
                      echo "No sizes available.";
                    }else{
                    
                    while($srow = mysqli_fetch_array($squery))
                    {
                       $sizes[] = $srow['size'];
     
                    }

                    $sj = 0; 
                foreach( $sizes as $selement) {  
            $sarr[$sj] = strtolower($selement); 
              
            $sj++; 
        } 
   
                $sizes = array_unique(array_map('trim', explode(',', implode(',', $sarr))));
        sort($sizes);
          $isizes = implode(',', $sizes);

          $msize = explode(',', $isizes);
        foreach($msize as $size) {
          # code...
        

        ?>

         <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all size" type="checkbox" id="<?php echo $size;  ?>" value="<?php echo $size;  ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo $size;  ?>"><?php echo $size;  ?></label>
                    </div>
                  </li>


        <?php
         }
        }

                    ?>

                  
                </ul>
              </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="brand">
                        <div id="filter-3" class="sb-filter brand" data-type="brand">
                          <div class="sbf-title">
                            <span>Brand</span>
                            <a id="clear-filter-3" class="clear-filter hidden" style="float: right;" href="javascript:void(0);">Clear</a>
                          </div>
                           <div class="scrollbar pl-3 pt-2" id="style-5" style="height: 100%; max-height: 300px;" >
                           <ul class="widget-list cz-filter-list list-unstyled pt-1 force-overflow">

                   <?php
                    $bquery = mysqli_query($mysqli,"
                    SELECT DISTINCT(brand)  FROM product_brands where brand != '' ORDER BY brand DESC
                    ");

                    $bcount = mysqli_num_rows($bquery);
                    if($bcount < 1){
                      echo "No brands available.";
                    }else{

                    
                    while($brow = mysqli_fetch_array($bquery))
                    {
                      $brands[] = $brow['brand'];
                                        
                   }


                   $bj = 0; 
                foreach( $brands as $belement) {  
            $barr[$bj] = strtolower($belement); 
              
            $bj++; 
        }  

                $brands = array_unique(array_map('trim', explode(',', implode(',', $barr))));
        sort($brands);
          $ibrands = implode(',', $brands);

          $mbrands = explode(',', $ibrands);
        foreach($mbrands as $bvalue) {

                ?>

                  <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input filter_all brand" type="checkbox" id="<?php echo $bvalue; ?>" value="<?php echo $bvalue; ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo $bvalue; ?>"><?php echo ucwords($bvalue); ?></label>
                    </div>
                  </li>

          <?php
        }
        }
                    ?>
                  
                </ul>
              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sb-widget filter-sidebar position-sidebar">
                  <div class="sb-filter-wrapper">
                    <div class="sbw-filter">
                      <div class="grid-uniform" data-prefix="price">
                        <div id="filter-4" class="sb-filter price" data-type="price">
                          <div class="sbf-title">
                            <span>Price</span>
                            
                          </div>
                              
              <!-- Price range-->
              <div class="widget mb-2 pb-2">
                <input type="hidden" id="min_price_hide" value="0" />
                    <input type="hidden" id="max_price_hide" value="1000000" />
                    <p id="price_show">10 - 1000000</p>
                    <div id="price_range"></div>

               <!-- <div class="cz-range-slider" data-start-min="0" data-start-max="1680" data-min="0" data-max="<?php echo $maxamt; ?>" data-step="1">
                  <div class="cz-range-slider-ui" id="price_range"></div>
                  <div class="d-flex pb-1">
                    <div class="w-50 pr-2 mr-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><span class="input-group-text"><?php echo $left_currency ?></span></div>
                        <input class="form-control cz-range-slider-value-min" type="text" id="min_price_hide">
                      </div>
                    </div>
                    <div class="w-50 pl-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><span class="input-group-text"><?php echo $left_currency ?></span></div>
                        <input class="form-control cz-range-slider-value-max" type="text" id="max_price_hide">
                      </div>
                    </div>
                  </div>
                </div>-->
              </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


               



             
              </div>



                            </div>
                            <div class="modal-footer">
                            <button class="btn-delete" id="<?php echo $cart_product['id'];?>" datacolor="<?php echo $cart_product['color'];?>" datatitle="<?php echo $cart_product['title'];?>"> 
                        <span class="fa fa-trash ion-2x"></span>
                        </button>
                        </div>
                        </div>
                        </div>
                        </div>
                                <!-- * Panel Left -->
                        <!-- * Modal for delete -->


<?php
//include("footer-newsletter-section.php");
//include("footer-section-two.php");
//include("footer-partners.php");
include("footer-bottom.php");
?>

