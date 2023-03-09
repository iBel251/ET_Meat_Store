<?php
// edit selected brand
if (isset($_GET['edit_brand'])) {
    $edit_id = $_GET['edit_brand'];
    // echo $edit_id;

    $get_data = "select * from `brands` where brand_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}

?>



<div mt-5>
    <h1 class="text-center"> Edit brand</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" id="brand_title" name="brand_title" value="<?php echo $brand_title ?>" class="form-control" required>
        </div>
        <div class="w-50 m-auto my-3">
            <input type="submit" name="edit_brand" value="update brand" class="btn btn-info px-3 my-3">
        </div>
    </form>
</div>

<!-- editing categories -->

<?php
if (isset($_POST['edit_brand'])) {
    $brand_title = $_POST['brand_title'];

    // checking if filds empty or not

    if ($brand_title == '') {
        echo "<script>alert('please fill the field')</script>";
    } else {

        // query update
        $update_brand = "update `brands` set brand_title='$brand_title' where brand_id=$edit_id";
        $result_update = mysqli_query($con, $update_brand);
        if ($result_update) {
            echo "<script>alert('Brand updated successfully')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }
}
?>