<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid ">
        <h2 class="text-center mt-3">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center mt-4">
            <div class="col-lg-6">
                <img src="../images/adminlogin.png" alt="">
            </div>
            <div class="col-lg-4 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" class="col-lg-6">
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form.label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="user_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form.label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required name="user_email">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form.label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required name="user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form.label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required name="conf_user_password">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small font-weight-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];

    //select query
    $select_query = "select * from `admin_table` where admin_name = '$user_username' or admin_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username already exists')</script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('Passwords do not match!')</script>";
    } else {
        //insert query
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) 
        values ('$user_username','$user_email','$hash_password')";

        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}

?>