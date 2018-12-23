<?php
if (isset($_POST['btn'])) {
        $message = $obj_app->update_cart_product_info($_POST);
}
if (isset($_GET['status'])) {
        $cart_product_id = $_GET['id'];
        $message = $obj_app->delete_cart_product_info_by_id($cart_product_id);
}
$session_id = session_id();
$query_result = $obj_app->select_cart_product_by_session_id($session_id);
$rows = mysqli_num_rows($query_result);
if ($rows) {
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
<?php $sum = 0;
while ($cart_product = mysqli_fetch_assoc($query_result)) { ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="assets/<?php echo $cart_product['product_image']; ?>" alt="" width="50"
                                        height="50"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $cart_product['product_name']; ?></a></h4>
                        <p>Product ID: <?php echo $cart_product['product_id']; ?></p>
                    </td>
                    <td class="cart_price">
                        <p>৳<?php echo $cart_product['product_price']; ?></p>
                    </td>
                    <td class="cart_quantity">
                        <form action="" method="post">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="number" min="1" name="product_quantity"
                                       value="<?php echo $cart_product['product_quantity']; ?>" autocomplete="off"
                                       size="2">
                                <input class="cart_quantity_input" type="hidden" name="temp_cart_id"
                                       value="<?php echo $cart_product['temp_cart_id']; ?>" autocomplete="off" size="2">
                                <input type="submit" name="btn" class="cart_quantity_down" value="Update">
                            </div>
                        </form>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">
                                <?php
                                $total = $cart_product['product_price'] * $cart_product['product_quantity'];
                                echo '৳' . $total;
                                ?>
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete"
                           href="?status=delete&&id=<?php echo $cart_product['temp_cart_id']; ?>"><i
                                    class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php $sum = $sum + $total;  } ?>
                </tbody>
            </table>
            <table class="table table-bordered" style="width: 60%; float: right; text-align: center;">

                <!--       <tr>
                    <td>VAT Total</td>
                    <td><?php
                $vat = ($sum * 15) / 100;
                echo '৳ ' . $vat;
                ?></td>
                </tr>-->
                <tr>
                    <td>Grand Total</td>
                    <td>৳<?php
                            $grand_total = $sum;
                            $_SESSION['order_total'] = $grand_total;
                            echo $grand_total;
                            ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <?php
                            $customer_id = isset($_SESSION['customer_id']);
                            $shipping_id = isset($_SESSION['shipping_id']);
                            if ($customer_id == NULL && $shipping_id == NULL) {
                                    ?>
                                <a href="checkout.php?grand_total=<?php echo $grand_total ?>"
                                   class="btn btn-primary pull-right">Checkout</a>
                            <?php } else if ($customer_id != NULL && $shipping_id == NULL) { ?>
                                <a href="shipping.php" class="btn btn-primary pull-right">Checkout</a>
                            <?php } else if ($customer_id != NULL && $shipping_id != NULL) { ?>
                                <a href="payment.php" class="btn btn-primary pull-right">Checkout</a>
                            <?php } ?>
                        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php } else {
        echo "
    <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <h2 class=\"text-center text-success\" style='color: red'>Your cart is empty</h2>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <h3 class=\"text-center text-success\">Please visit our store to purchase product</h3>
                   <center> <a href=\"bike_store.php\" class=\"btn btn-primary\">Cycle Store</a> </center> 
                   <center> <a href=\"accessories_store.php\" class=\"btn btn-primary\">Accessories Store</a> </center>
                </div>
            </div>
        </div>
    </div>
</div>

   </div>
    </div>
</section>
     ";
} ?>







