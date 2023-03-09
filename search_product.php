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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/et_meat_store/style.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container-fluid p-0">
    <?php
    $current_page = 'search';
    include('includes/header.php');

    ?>

    <?php
    cart();
    ?>

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
        <li class="nav-item bg-dark">
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
        <li class="nav-item bg-dark">
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