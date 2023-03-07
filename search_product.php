<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PhpCode</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">

      <div class="container-fluid p-0">
        <img src="./images/AnimalPrductLogo.png" alt="" class="logo">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php
              cart_item();
              ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price:<?php total_cart_price();?>/-</a>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0" action="" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
    </nav>

    <?php
    cart();    
    ?>
    <!-- Second child -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
          echo "   <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else {
          echo "   <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }
                if(!isset($_SESSION['username'])){
                    echo ' <li class="nav-item">
                    <a class="nav-link" href="./user_area/user_login.php">Login</a>
                </li>';
                }
                else {
                    echo ' <li class="nav-item">
                    <a class="nav-link" "./user_area/logout.php">Logout</a>
                </li>';
                }
                ?>
      </ul>
    </nav>
  </div>

  <!-- Third child -->
  <div class="bg-light">
    <h3 class="text-center">ETAnmial Products</h3>
    <p class="text-center">A place where you can find quality animal products</p>
  </div>

  <!-- Forth child -->

  <div class="row">
    <div class="col-md-10">
      <!-- Products -->
      <div class="row">

        <!-- fetching products -->
        <?php
        search_product();
        get_unique_categories();
        get_unique_brands();
        ?>

      </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <!-- brands to be displayed -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light text-center">
            <h4>Delivery brands</h4>
          </a>
        </li>

        <?php
        getBrands();
        ?>

      </ul>
      <!-- catagories to be displayed -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light text-center">
            <h4>Catagories</h4>
          </a>
        </li>

        <?php
        getCategories();
        ?>

      </ul>
    </div>
  </div>

  </div>

  <!-- include footer -->
  <?php
  include("./includes/footer.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>