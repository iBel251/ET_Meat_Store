<?php

// include connect file
include('./includes/connect.php');

// getting products
function getProducts(){
    global $con;
    $select_query = "select * from `products` order by rand() limit 0,9";
        $result_query = mysqli_query($con,$select_query);
        //$row = mysqli_fetch_assoc($result_query);
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_keywords = $row['product_keywords'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='#' class='btn btn-secondary'>View More</a>
            </div>
          </div>
        </div>";
        }
}

// displaying brands in sidenav
function getBrands(){
    global $con;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    $row_data = mysqli_fetch_assoc($result_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      echo " <li class='nav-item'>
   <a href='index.php?brand=$brand_id' class='nav-link text-light text-center'>$brand_title</a></li>";
    }
}

// displaying categories in sidenav
function getCategories(){
    global $con;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    $row_data = mysqli_fetch_assoc($result_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
      $category_title = $row_data['category_title'];
      $id = $row_data['category_id'];
      echo " <li class='nav-item'>
   <a href='index.php?category=$id' class='nav-link text-light text-center'>$category_title</a></li>";
    }
}
