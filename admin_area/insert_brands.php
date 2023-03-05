<?php
include("../includes/connect.php");
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    // select data from database

    $select_query="select * from `brands` where brand_title ='$brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number >0){
      echo "<script>alert('This brand is present inside the database')</script>";
    }

    else {
        $insert_query="insert into `brands`(brand_title) values ('$brand_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }

}
?>



<h1 class="text-center">Insert Brand</h1>
<form action="" method="POST" class="mb-2">
<div class="input-group mb-2 w-90">
  <span class="input-group-text bg-info" id="basic-addon1" ><i class="fa-solid fa-receipt">

  </i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-2 w-10 m-auto">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands"  aria-label="Username" aria-describedby="basic-addon1">

  
</div>
</form>