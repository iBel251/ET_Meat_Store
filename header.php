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
      <?php
      if (isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
      </li> ";
      } else {
        echo "<li class='nav-item'>
      <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
    </li> ";
      }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>
            <?php
            cart_item();
            ?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/-</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
    </form>
  </div>
</nav>