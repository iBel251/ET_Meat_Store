<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
    php code here
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
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product title" autocomplete="off" require="required">
            </div>

            <!-- Keywords -->


            <div class="form-outline pb-4 w-50 m-auto">
                <label for="product_Keywords" class="forml-abel">Product Keywords</label>
                <input type="text" name="product_Keywords" id="product_Keywords" class="form-control" placeholder="Enter product title" autocomplete="off" require="required">
            </div>

            <!-- categories -->

            <div class="form-outline w-50 m-auto">
                <select name="product_category" class="form-select w-100 mb-4">
                    <option value="">Select a category</option>
                    <option value="">category1</option>
                    <option value="">category2</option>
                    <option value="">category3</option>
                    <option value="">category4</option>
                    <option value="">category5</option>
                    <option value="">category6</option>
                </select>
            </div>

            <!-- Brands -->

            <div class="form-outline w-50 m-auto">
                <select name="product_brands" class="form-select w-100 mb-3">
                    <option value="">Select a Brands</option>
                    <option value="">Brand1</option>
                    <option value="">Brand2</option>
                    <option value="">Brand3</option>
                    <option value="">Brand4</option>
                    <option value="">Brand5</option>
                    <option value="">Brand6</option>
                </select>
            </div>

    <div class="form-outline pb-4 w-50 m-auto">
        <label for="product_Keywords" class="forml-abel">Product Keywords</label>
    <input type="text" name="product_Keywords" id="product_Keywords" class="form-control" placeholder="Enter product title" autocomplete="off" require="required">  
    </div>
    
        <!-- categories -->

        <div class="form-outline w-50 m-auto h-10">
    <select name="product_category"  class="form-select w-100 mb-4 p-1">
        <option value="">Select a category</option>

        <?php
        $select_query="Select * from `categories`";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $category_title=$row['category_title'];
            $category_id=$row['category_id'];
            echo "<option value='$category_id'> $category_title </option>";
        }
        
    ?>
    </select>
    </div>

            <!-- Brands -->

    <div class="form-outline w-50 m-auto">
    <select name="product_brands"  class="form-select w-100 mb-3 p-1">
        <option value="">Select a Brands</option>
        <?php
        $select_query="Select * from `brands`";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $brand_title=$row['brand_title'];
            $brand_id=$row['brand_id'];
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