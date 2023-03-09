<h3 class="text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Username</th>
            <th>User email</th>
            <th>User Image</th>
            <th>User address</th>
            <th>User mobile</th>
            <th>Delete</th>
        </tr>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details = "select * from `user_table`";
        $result = mysqli_query($con, $get_order_details);
        $number = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_address = $row['user_address'];
            $user_mobile = $row['user_mobile'];

            echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image' alt='' class='product-img'></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><a href='index.php?delete_user=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>"
        ?>
        <?php
            $number++;
        }
        ?>

    </tbody>
    </thead>
</table>