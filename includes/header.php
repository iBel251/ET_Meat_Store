<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid p-0">
        <img src="/et_meat_store/images/AnimalPrductLogo.png" alt="" class="logo">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-tabs mr-auto mb-2 mb-lg-0 text-light">
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'home') {
                                            echo 'active';
                                        } ?>" href="/et_meat_store/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'allproduct') {
                                            echo 'active';
                                        } ?>" href="/et_meat_store/display_all.php">Product</a>
                </li>
                <?php
                if ($current_page == 'profile' or $current_page == 'user_register') {
                    $class = 'active';
                } else {
                    $class = '';
                }
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link $class' href='/et_meat_store/users_area/profile.php'>My Account</a></li> ";
                } else {
                    echo "<li class='nav-item'><a class='nav-link $class' href='/et_meat_store/users_area/user_registration.php'>Register</a></li> ";
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'contact') {
                                            echo 'active';
                                        } ?>" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == 'cart') {
                                            echo 'active';
                                        } ?>" href="/et_meat_store/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>
                            <?php
                            cart_item();
                            ?></sup></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Total Price: <?php echo total_cart_price(); ?> Birr</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" action="/et_meat_store/search_product.php" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
</nav>

<!-- Second child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">

        <?php


        if (!isset($_SESSION['username'])) {
            echo "   <li class='nav-item'>
  <a class='nav-link' href='#'>Welcome Guest</a>
</li>";
        } else {
            echo "   <li class='nav-item'>
  <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
</li>";
        }

        if (!isset($_SESSION['username'])) {
            echo " <li class='nav-item'>
                    <a class='nav-link' href='/et_meat_store/users_area/user_login.php'>Login</a>
                </li>";
        } else {
            echo "  <li class='nav-item'>
                    <a class='nav-link' href='/et_meat_store/users_area/logout.php'>Logout</a>
                </li>";
        }
        ?>
    </ul>
</nav>