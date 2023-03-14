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
  <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container-fluid p-0">
    <?php

    $current_page = 'cart';
    include('includes/header.php');

    ?>
    <!-- calling function cart -->
    <?php
    cart();
    ?>

    <!-- Second child -->


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
        <table class="table table-bordered text-center">

          <!-- php code to desplay dynamic data -->
          <?php
          $get_ip_add = getIPAddress();
          $total_price = 0;
          $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {

            echo "<thead>
              <tr>
                <th>Product title</th>
                <th>Product image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Remove</th>
                <th colspan='2'>Operation</th>
              </tr>
            </thead>
            <tbody>";
            while ($row = mysqli_fetch_array($result)) {
              $product_id = $row['product_id'];
              $quantity = $row['quantity'];
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
                  <td>
                    <input class="qty-cart" type="number" value=<?php echo $quantity ?> disabled><br>
                    <form action="" method="post">
                      <button class="btn" type="submit" name="qty_inc" value=<?php echo $product_id ?>><i class="fa-solid fa-arrow-up"></i></button>
                      <button class="btn" type="submit" name="qty_dec" value=<?php echo $product_id ?>><i class="fa-solid fa-arrow-down"></i></button>
                    </form>
                  </td>
                  <?php

                  $get_ip_add = getIPAddress();
                  if (isset($_POST['update_cart'])) {
                    $quantities = intval($_POST['qty']);
                    $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                    $result_product_qty = mysqli_query($con, $update_cart);
                    $total_price = $total_price * $quantities;
                  }

                  ?>
                  <td><?php echo $price_table ?> Birr</td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                  <td>
                    <input type="submit" value="Update" class="text-light bg-dark px-3 border-0 p-3 py-2 mx-3" name="update_cart">
                    <input type="submit" value="Remove" class="bg-danger px-3 border-0 p-3 py-2 mx-2" name="remove_cart">
                  </td>
                </tr>
          <?php
              }
            }
          } else {
            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
          }
          ?>
          </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
          <?php
          $get_ip_add = getIPAddress();
          $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          $cart_price = total_cart_price();
          if ($result_count > 0) {
            echo "<h4 class='px-3'>Subtotal: <strong>$cart_price Birr</strong></h4>
            <input type='submit' value='Continue Shoping' class='text-light bg-dark px-3 border-0 p-3 py-2 mx-3' name='continue_shoping'>
            <button class='bg-success px-3 border-0 p-3 py-2 mx-3'><a href='./users_area/checkout.php' class='text-light'>Checkout</a></button>";
          } else {
            echo "<input type='submit' value='Continue Shoping' class='bg-dark px-3 border-0 p-3 py-2 mx-3' name='continue_shoping'>
            ";
          }

          if (isset($_POST['continue_shoping'])) {
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>


        </div>
    </div>
  </div>
  </form>

  <!-- function to remove item  -->
  <?php

  global $con;
  if (isset($_POST['remove_cart'])) {
    foreach ($_POST['removeitem'] as $remove_id) {
      echo $remove_id;
      $delete_query = "Delete from `cart_details` where product_id=$remove_id";
      $run_delete = mysqli_query($con, $delete_query);
      if ($run_delete) {
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }

  if (isset($_POST['qty_inc'])) {
    $product_id = $_POST['qty_inc'];
    $cart_query = "Select quantity from `cart_details` where product_id='$product_id'";
    $result = mysqli_query($con, $cart_query);
    $row = mysqli_fetch_array($result);
    $quantity = $row['quantity'];
    if ($quantity > 0) {

      $query = "update cart_details set quantity=quantity + 1 where product_id=$product_id";
      $run = mysqli_query($con, $query);
      if ($run) {

        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  } elseif (isset($_POST['qty_dec'])) {
    $product_id = $_POST['qty_dec'];
    $cart_query = "Select quantity from `cart_details` where product_id='$product_id'";
    $result = mysqli_query($con, $cart_query);
    $row = mysqli_fetch_array($result);
    $quantity = $row['quantity'];
    if ($quantity > 1) {
      $query = "update cart_details set quantity=quantity - 1 where product_id=$product_id";
      $run = mysqli_query($con, $query);
      if ($run) {
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
  ?>

  <!-- include footer -->
  <?php
  include("./includes/footer.php");
  ?>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>