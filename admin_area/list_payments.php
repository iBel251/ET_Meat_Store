<h3 class="text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment mode</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details = "select * from `user_payments`";
        $result_orders = mysqli_query($con, $get_order_details);
        $number = 1;
        while ($row_orders = mysqli_fetch_assoc($result_orders)) {
            $payment_id = $row_orders['payment_id'];
            $amount = $row_orders['amount'];
            $invoice_number = $row_orders['invoice_number'];
            $date = $row_orders['date'];
            $payment_mode = $row_orders['payment_mode'];

            echo "<tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_payment=$payment_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>"
        ?>
        <?php
            $number++;
        }
        ?>

    </tbody>
    </thead>
</table>