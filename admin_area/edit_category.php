<?php
// edit selected category
if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    // echo $edit_id;

    $get_data = "select * from `categories` where category_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
}

?>



<div mt-5>
    <h1 class="text-center"> Edit Category</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" id="category_title" name="category_title" value="<?php echo $category_title ?>" class="form-control" required>
        </div>
        <div class="w-50 m-auto my-3">
            <input type="submit" name="edit_category" value="update category" class="btn btn-info px-3 my-3">
        </div>
    </form>
</div>

<!-- editing categories -->

<?php
if (isset($_POST['edit_category'])) {
    $category_title = $_POST['category_title'];

    // checking of filds empty or not

    if ($category_title == '') {
        echo "<script>alert('please fill the field')</script>";
    } else {

        // query update
        $update_category = "update `categories` set category_title='$category_title' where category_id=$edit_id";
        $result_update = mysqli_query($con, $update_category);
        if ($result_update) {
            echo "<script>alert('Category updated successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }
}
?>