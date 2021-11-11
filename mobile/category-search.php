<?php
include("header.php");
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
<div class="appHeader">
        <div class="left">
        <a href="#" class="headerButton goBack bolder" onclick="history.back();">
                <ion-icon name="chevron-back-outline"></ion-icon> Categories
            </a>
        </div>
</div>        







<?php
include("footer.php");
?>