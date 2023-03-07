<?php
include('includes/connect.php');
include('functions/common_function.php');
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

  <style>
    .cart-img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
  </style>
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
              <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php
                                                                                                              cart_item();
                                                                                                              ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/-</a>
            </li>

          </ul>

        </div>
    </nav>
    <!-- calling function cart -->
    <?php
    cart();
    ?>

    <!-- Second child -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- Third child -->
  <div class="bg-light">
    <h3 class="text-center">ETAnmial Products</h3>
    <p class="text-center">A place where you can find quality animal products</p>
  </div>
  <!-- Forth chikd table -->
  <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-border text-center">
          <thead>
            <tr>
              <th>Product title</th>
              <th>Product image</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th colspan="2">Operation</th>
            </tr>
          </thead>
          <tbody>
            <!-- php code to desplay dynamic data -->
            <?php
            $get_ip_add = getIPAddress();
            $total_price = 0;
            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            while ($row = mysqli_fetch_array($result)) {
              $product_id = $row['product_id'];
              $select_products = "select * from  `products` where product_id='$product_id'";
              $result_products = mysqli_query($con, $select_products);
              while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = array($row_product_price['product_price']);
                $price_table = $row_product_price['product_price'];
                $product_title = $row_product_price['product_title'];
                $product_image1 = $row_product_price['product_image1'];
                $product_values = array_sum($product_price);
                $total_price += $product_values;

            ?>
                <tr>
                  <td><?php echo $product_title ?></td>
                  <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart-img"></td>
                  <td><input type="text" name="qty" class="form-input w-50"></td>
                  <?php
                  
                  $get_ip_add = getIPAddress();
                  if(isset($_POST['update_cart'])){
                    $quantities = intval($_POST['qty']);
                    $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                    $result_product_qty = mysqli_query($con, $update_cart);
                    $total_price = $total_price * $quantities;
                  }

                  ?>
                  <td><?php echo $price_table ?> Birr</td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                  <td>
                    <!-- <button class="bg-info px-3 border-0 p-3 py-2 mx-3">Update</button> -->
                    <input type="submit" value="Update Cart" class="bg-info px-3 border-0 p-3 py-2 mx-3" name="update_cart">
                    <!-- <button class="bg-info px-3 border-0 p-3 py-2 mx-3">Remove</button> -->
                    <input type="submit" value="Remove Cart" class="bg-info px-3 border-0 p-3 py-2 mx-3" name="remove_cart">
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-3">
          <h4 class="px-3">Subtotal: <strong><?php echo $total_price ?> Birr</strong></h4>
          <a href="index.php"><button class="bg-info px-3 border-0 py-2">Continue shopping</button></a>
          <a href="#"><button class="bg-info px-3 border-0 p-3 py-2 mx-3">Checkout</button></a>

        </div>
    </div>
  </div>
  </form>

  <!-- function to remove item  -->
<?php

global $con;
if(isset($_POST['remove_cart'])){
  foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;
    $delete_query = "Delete from `cart_details` where product_id=$remove_id";
    $run_delete = mysqli_query($con, $delete_query);
    if($run_delete){
      echo "<script>window.open('cart.php','_self')</script>";
    }
  }
}

?>

  <!-- include footer -->
  <?php
  include("./includes/footer.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>