<h3 class="text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Amount Due</th>
            <th>Total products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details = "select * from `user_orders`";
        $result_orders = mysqli_query($con, $get_order_details);
        $number = 1;
        while ($row_orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];
            if ($order_status == 'pending') {
                $order_status = 'Incomplete';
            } else {
                $order_status = 'Complete';
            }
            echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=$order_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>"
        ?>
        <?php
            $number++;
        }
        ?>

    </tbody>
    </thead>
</table>