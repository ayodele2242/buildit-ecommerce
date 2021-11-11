<ul class="main-nav fix-vertical-left-column hide">

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