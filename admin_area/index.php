<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- bootstrap css link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../style.css">

  <style>
    .admin_image {
      width: 100px;
      object-fit: contain;
    }

    body {
      overflow-x: hidden;
    }

    .product-img {
      height: 50px;
      object-fit: contain;
    }
  </style>

</head>

<body>
  <div class="container-fluid p-0 ">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="../images/AnimalPrductLogo.png" alt="" class="logo">
      </div>

      <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="" class="nav-link">Welcome guest</a>
          </li>
        </ul>
      </nav>
    </nav>

    <!-- Second child -->
    <div class="bg-light">
      <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <!-- Third child -->
    <div class="row ">
      <div class="col-md-12 bg-secondary p-4 d-flex align-items-center">
        <div> <a href="#"><img src="https://picsum.photos/300" alt="" class="admin_image"></a>
          <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center">
          <button class="ml-5"><a href="index.php?insert_products" class="nav-link text-light bg-info my-1">Insert Products</a></button>
          <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
          <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
          <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
          <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
          <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
          <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
        </div>
      </div>
    </div>

    <!-- Forth child -->
    <div class="container my-5 text-center">
      <?php
      if (isset($_GET['insert_products'])) {
        include('insert_product.php');
      }
      if (isset($_GET['insert_category'])) {
        include('insert_categories.php');
      }
      if (isset($_GET['insert_brands'])) {
        include('insert_brands.php');
      }
      if (isset($_GET['view_products'])) {
        include('view_products.php');
      }
      if (isset($_GET['edit_products'])) {
        include('edit_products.php');
      }
      if (isset($_GET['delete_products'])) {
        include('delete_product.php');
      }
      if (isset($_GET['view_categories'])) {
        include('view_categories.php');
      }
      if (isset($_GET['edit_category'])) {
        include('edit_category.php');
      }
      if (isset($_GET['delete_category'])) {
        include('delete_category.php');
      }
      if (isset($_GET['view_brands'])) {
        include('view_brands.php');
      }
      if (isset($_GET['edit_brand'])) {
        include('edit_brand.php');
      }
      if (isset($_GET['delete_brand'])) {
        include('delete_brand.php');
      }
      ?>
    </div>
  </div>
  <?php
  include("../includes/footer.php");
  ?>
  <!-- bootstrap js link -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>