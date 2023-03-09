<?php

// Delete selected brand

if (isset($_GET['delete_brand'])) {
    $delete_id = $_GET['delete_brand'];
    $delete_brand = "delete from `brands` where brand_id=$delete_id";
    $result = mysqli_query($con, $delete_brand);
    if ($result) {
        echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>

