 <?php
include("header.php");
include("navs.php");

 ?>

 <!-- Page Title (Shop)-->
    <div class="page-title-overlap bg-blue pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Store</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">All products</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0"><?php echo $set['storeName'];  ?> Store  </h1>   
          <!--<a class="cz-handheld-toolbar-item col-white comp-hide" href="#shop-sidebar" data-toggle="sidebar"><span class="col-white cz-handheld-toolbar-icons"><i class="fa fa-bars"></i> Filter Products</span>
          </a>-->
        </div>
      </div>
    </div>

 <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 pt-4" >
      <div class="row" style="background: white">
     
     <!-- Sidebar-->
        <aside class="col-lg-3">
          <!-- Sidebar-->
          <div class="cz-sidebar rounded-lg " id="shop-sidebar">
            <div class="cz-sidebar-header box-shadow-sm">
              <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle">Close sidebar</span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="cz-sidebar-body" data-simplebar data-simplebar-auto-hide="true">
              <!-- Categories-->
              <div class="widget widget-categories mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Categories</h3>
                <div class="accordion mt-n1" id="shop-categories">



              <!-- Filter by Brand-->
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                             
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
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



                  
              <!-- Price range-->
              <div class="widget mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Price</h3>
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

              <!-- Filter by Brand-->
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Brand</h3>
               
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">

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
              <!-- Filter by Size-->
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Size</h3>
               
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
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
              <!-- Filter by Color-->
              <div class="widget">
                <h3 class="widget-title">Color</h3>
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
        </aside>

 <!-- Content  -->
        <section class="col-lg-9">
            <!-- Toolbar-->
          <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
            <div class="d-flex flex-wrap">
              <div class="form-inline flex-nowrap mr-3 mr-sm-4 pb-3">
                <label class="text-light opacity-75 text-nowrap mr-2 d-none d-sm-block col-blue" for="sorting">Sort by:</label>
                <select class="form-control custom-select filter_all sorting" id="sorting">
                  <option></option>
                  <option value="high_price">High - High Price</option>
                  <option value="low_price">Low - Low Price</option>
                  
                </select><span class="font-size-sm text-light opacity-75 text-nowrap ml-2 d-none d-md-block"></span>
              </div>
            </div>
            <div class="d-flex pb-3"></div>
            <div class="d-none d-sm-flex pb-3"></div>
          </div>

           <div class="row filter_data" id="filter_data">

            </div>




        </section>











      </div>
    </div>
















 <?php 
include("footer.php");
 ?>