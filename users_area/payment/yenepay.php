<?php
include('../../includes/connect.php');

session_start();
    if(!isset($_SESSION['username'])){
        header('Location: ../index.php');
    }

    if(isset($_GET['user_ip'])){
        $user_ip = $_GET['user_ip'];
    }
   
    $query = "SELECT cart_details.quantity, products.product_title, products.product_price
    FROM cart_details
    INNER JOIN products ON cart_details.product_id=products.product_id where ip_address = '$user_ip'";
    $run = mysqli_query($con,$query);

    $cart = [];

    while($result = mysqli_fetch_array($run)){
        $product_title = $result['product_title'];  
        $quantity = $result['quantity']; 
        $price = $result['product_price']; 
        echo $product_title;
        echo $quantity;
        echo $price;   

        $item = [
            "itemName" => "$product_title",
            "unitPrice" => "$price",
            "quantity" => "$quantity",
        ];
        array_push($cart,$item);
    }
?>

<!Doctype html>
<html>
    <title>Payment</title>
    <body>
        <h2>Pay with Yenepay</h2>
        <form method="post" action="https://test.yenepay.com/">
            <input type="hidden" name="process" value="Cart">
            <input type="hidden" name="successUrl" value="http://localhost/et-meat-store/users_area/payment/success.php">
            <input type="hidden" name="ipnUrl" value="http://localhost/Payment-with-Yenepay-Php-Main/ipn.php">
            <input type="hidden" name="cancelUrl" value="http://localhost/Payment-with-Yenepay-Php-Main/cancel.php">
            <input type="hidden" name="merchantId" value="SB2220">
            <input type="hidden" name="merchantOrderId" value="moi2">
            <input type="hidden" name="expiresAfter" value="24">
            <?php  foreach ($cart as $key1 => $value) {
                foreach ($value as $key => $value1) {
                    ?><input type="hidden" name="Items[<?php echo $key1,'].',$key ?>" value="<?php echo $value1 ?>"><?php
                }
            } ?>
            <input type="hidden" name="totalItemsDeliveryFee" value="0">
            <input type="hidden" name="totalItemsDiscount" value="0">
            <input type="hidden" name="totalItemsHandlingFee" value="20.5">
            <input type="hidden" name="totalItemsTax1" value="135.6675">
            <input type="hidden" name="totalItemsTax2" value="0">
            <button type="submit">Proceed with payment</button>
        </form>
    </body>
</html>
