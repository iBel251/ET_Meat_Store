<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
    $current_page = 'profile';
    include('../includes/header.php');

    ?>
    <!-- calling function cart -->
    <?php
    cart();
    ?>

  </div>

  <!-- Third child -->
  <div class="bg-light">
    <h3 class="text-center">ETAnmial Products</h3>
    <p class="text-center">A place where you can find quality animal products</p>
  </div>
  <!-- Fourth child -->
  <div class="row">
    <div class="col-md-2 p-0">
      <div class="col-md-12 p-0">
        <ul class="navbar-nav bg-secondary text-center container-fluid">
          <li class="nav-item ">
            <a class="nav-link text-light" href="#">Your Profile </a>
          </li>

          <?php
          $username = $_SESSION['username'];
          $user_image = "select * from `user_table` where username='$username'";
          $user_image = mysqli_query($con, $user_image);
          $row_image = mysqli_fetch_array($user_image);
          $user_image = $row_image['user_image'];
          echo "            <li class='nav-item'>
            <img class='profileimg my-4' src='./user_images/$user_image' alt=''>
          </li>"

          ?>

          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php">Pending Orders </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?edit_account">Edit Accounts </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?my_orders">My Orders </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete Account </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="logout.php">Logout </a>

          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-10 p-0 text-center">
      <?php
      get_user_order_details();
      if (isset($_GET['edit_account'])) {
        include('edit_account.php');
      }
      if (isset($_GET['my_orders'])) {
        include('user_orders.php');
      }
      if (isset($_GET['delete_account'])) {
        include('delete_account.php');
      }
      ?>
    </div>
  </div>
  <!-- include footer -->
  <?php
  include("../includes/footer.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>