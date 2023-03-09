<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php

        $get_brands = "select * from `brands`";
        $result = mysqli_query($con, $get_brands);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
        ?>
            <tr class='text-center'>
                <td><?php echo $number ?></td>
                <td><?php echo $brand_title ?></td>
                <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
        }
        
        
        ?>

</tbody>
</table>

