<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_Keywords = $_POST['product_Keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if (
        $product_title == '' or $product_description == '' or $product_category == ''
        or $product_Keywords == '' or $product_brands == '' or $product_price == '' or $product_image1 == ''
        or $product_image2 == '' or $product_image3 == ''
    ) {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // insert query
        $insert_products = "insert into `products` (product_title,product_description,product_Keywords,
        category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
        values ('$product_title','$product_description','$product_Keywords','$product_category',
        '$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),
        '$product_status')";

        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <title>insert Products</title>
</head>

<body class="bg-light">
    <!-- Title -->
    <div class="contaier mt-3">
        <h1 class="text-center mt=3">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="forml-abel">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" require="required">
            </div>
            <!-- description -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="forml-abel">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" require="required">
            </div>

            <!-- Keywords -->

            <div class="form-outline pb-4 w-50 m-auto">
                <label for="product_Keywords" class="forml-abel">Product Keywords</label>
                <input type="text" name="product_Keywords" id="product_Keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" require="required">
            </div>

            <!-- categories -->

            <div class="form-outline w-50 m-auto h-10">
                <select name="product_category" class="form-select w-100 mb-4 p-1">
                    <option value="">Select a category</option>

                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'> $category_title </option>";
                    }

                    ?>
                </select>
            </div>

            <!-- Brands -->

            <div class="form-outline w-50 m-auto">
                <select name="product_brands" class="form-select w-100 mb-3 p-1">
                    <option value="">Select a Brands</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'> $brand_title </option>";
                    }

                    ?>
                </select>
            </div>


            <!-- image1 -->

            <div class="form-outline pb-4 w-50 m-auto">
                <label for="product_image1" class="forml-abel">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" require="required">
            </div>

            <!-- image2 -->

            <div class="form-outline pb-4 w-50 m-auto">
                <label for="product_image2" class="forml-abel">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" require="required">
            </div>

            <!-- image3 -->

            <div class="form-outline pb-4 w-50 m-auto">
                <label for="product_image3" class="forml-abel">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" require="required">
            </div>

            <!-- Price -->

            <div class="form-outline pb-4 w-50 m-auto">
                <label for="product_price" class="forml-abel">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" require="required">
            </div>

            <!-- Price -->

            <div class="form-outline pb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>

        </form>
    </div>


</body>

</html>