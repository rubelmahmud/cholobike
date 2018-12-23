<?php
    if(isset($_SESSION['customer_id'])) {
?>


<section id="advertisement">
    <div class="container">
        <a href="bike_rent.php"><img src="assets/front_end_assets/images/rentbike.png" alt="" /></a>
    </div>
</section>
<section>

    <div class="container">
        <div class="row">
                <?php include('sidebar.php') ?>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                        <?php  $query_result=$obj_app->select_customer_info(); ?>
                        <?php  $rr_result=$obj_app->select_running_rent_info(); ?>
                        <?php  $order_result=$obj_app->select_order_info(); ?>
                        <?php  $orderp=$obj_app->select_order_pending_info(); ?>
                        <?php  $rent_result=$obj_app->select_rent_info(); ?>

                    <div class="row-fluid sortable">
                        <div class="box span6">
                            <div class="box-header">
                                <h4><i class="halflings-icon align-justify"></i><span class="break"></span>MY PROFILE</h4>
                                <div class="box-icon">
                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                        <th>National ID</th>
                                        <th>Address</th>
                                        <th>City</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($customer=mysqli_fetch_assoc($query_result)) { ?>
                                    <tr>
                                        <td class="center"><?php echo $customer['first_name'].' '.$customer['last_name']; ?></td>
                                        <td class="center"><?php echo $customer['email_address']; ?></td>
                                        <td class="center"><?php echo $customer['phone_number']; ?></td>
                                        <td class="center"><?php echo $customer['national_id']; ?></td>
                                        <td class="center"><?php echo $customer['address']; ?></td>
                                        <td class="center"><?php echo $customer['city']; ?></td>
                                    </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--/span-->
<br>
<?php 
$rows = mysqli_num_rows($rr_result);
if (!$rows) {
?>
                        <div class="row-fluid sortable">
                            <div class="box span6">
                                <div class="box-header">
                                    <h4 style="color: #FEA021"><i class="halflings-icon align-justify"></i><span class="break"></span>MY RUNNING RIDE</h4>
                                    <div class="box-icon">
                                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Rent Order #</th>
                                            <th>Bike Number</th>
                                            <th>Rent From</th>
                                            <th>Destination</th>
                                            <th>Ride Running Time</th>
                                            <th>Fare Until Now</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($customer=mysqli_fetch_assoc($rr_result)) {
                                            if($customer['rent_order_status'] == 1) {
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $customer['rent_order_id']; ?></td>
                                                <td class="center"><?php echo $customer['bike_number']; ?></td>
                                                <td class="center"><?php echo $customer['from']; ?></td>
                                                <td class="center"><?php echo $customer['to']; ?></td>
                                                    <?php
                                                    $time = date("Y-m-d H:i:s");
                                                    $rent_start = $customer['rent_start'];
                                                    $duration = round((strtotime($time) - strtotime($rent_start)) / 60);

                                                    $rent_fare = $customer['rent_fare'];
                                                    $fare = ($duration / 60) * $rent_fare;

                                                    ?>

                                                <td><?php echo $duration;?> minutes</td>
                                                <td>৳<?php echo number_format($fare, 2);?></td>
                                            </tr>

                                        <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--/span-->
                            <br>
                            <?php } else { ?>
                            
                            <div class="row-fluid sortable">
                            <div class="box span6">
                                <div class="box-header">
                                    <h4 style="color: #FEA021"><i class="halflings-icon align-justify"></i><span class="break"></span>MY RUNNING RIDE</h4>
                                </div>
                                <div class="box-content">
                                    <h5>You do not have any running ride</h5>
                                </div>
                                </div>
                                </div>
                            <br>
                       <?php } ?>
                       
                       <?php 
$rows = mysqli_num_rows($order_result);
if (!$rows) {
?>
                            
                                                    <div class="row-fluid sortable">
                            <div class="box span12">
                                <div class="box-header" data-original-title>
                                    <h4><i class="halflings-icon user"></i><span class="break"></span>PENDING ORDER</h4>
                                    <div class="box-icon">
                                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Bill</th>
                                            <th>Order Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($order=mysqli_fetch_assoc($orderp)) {
                                          
                                            ?>
                                            <tr>
                                                <td><?php echo $order['order_id']; ?></td>
                                                <td class="center"><?php echo $order['product_name']; ?></td>
                                                <td class="center">৳<?php echo $order['product_price']; ?></td>
                                                <td class="center"><?php echo $order['product_quantity']; ?></td>
                                                <td class="center"><?php echo $order['order_total']; ?></td>
                                                <td class="center"><?php echo $order['order_date']; ?></td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--/span-->
                        </div>

                        <br>
                        
                         <?php } elseif($rows) { ?>
                            
                            <div class="row-fluid sortable">
                            <div class="box span6">
                                <div class="box-header">
                                    <h4><i class="halflings-icon user"></i><span class="break"></span>PENDING ORDER</h4>
                                </div>
                                <div class="box-content">
                                    <h5>You do not have any pending order</h5>
                                </div>
                                </div>
                                </div>
                            <br>
                       <?php } ?>

                        <div class="row-fluid sortable">
                            <div class="box span12">
                                <div class="box-header" data-original-title>
                                    <h4><i class="halflings-icon user"></i><span class="break"></span>ORDER HISTORY</h4>
                                    <div class="box-icon">
                                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Bill</th>
                                            <th>Order Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($order_info=mysqli_fetch_assoc($order_result)) {
                                            if ($order_info['order_status'] == "approved"){
                                            ?>
                                            <tr>
                                                <td><?php echo $order_info['order_id']; ?></td>
                                                <td class="center"><?php echo $order_info['product_name']; ?></td>
                                                <td class="center">৳<?php echo $order_info['product_price']; ?></td>
                                                <td class="center"><?php echo $order_info['product_quantity']; ?></td>
                                                <td class="center">৳<?php echo $order_info['order_total']; ?></td>
                                                <td class="center"><?php echo $order_info['order_date']; ?></td>

                                            </tr>
                                        <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--/span-->
                        </div>

                        <br>

                        <div class="row-fluid sortable">
                            <div class="box span12">
                                <div class="box-header" data-original-title>
                                    <h4><i class="halflings-icon user"></i><span class="break"></span>RENT HISTORY</h4>
                                    <div class="box-icon">
                                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                        <tr>
                                            <th>Rent Order #</th>
                                            <th>Rent From</th>
                                            <th>Rent To</th>
                                            <th>Rent Fare</th>
                                            <th>Total Fare</th>
                                            <th>Rent Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($rent_info=mysqli_fetch_assoc($rent_result)) {
                                        if($rent_info['rent_order_status'] == 2) { ?>
                                            <tr>
                                                <td><?php echo $rent_info['rent_order_id']; ?></td>
                                                <td class="center"><?php echo $rent_info['from']; ?></td>
                                                <td class="center"><?php echo $rent_info['to']; ?></td>
                                                <td class="center">৳<?php echo $rent_info['rent_fare']; ?> per hour</td>
                                                <td class="center">৳<?php echo $rent_info['rent_total_fare']; ?></td>
                                                <td class="center"><?php echo $rent_info['rent_order_time']; ?></td>

                                            </tr>
                                        <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--/span-->
                        </div>



                </div><!--/product-details-->


            </div>
        </div>
    </div>
</section>
<?php  } else { 
    header('Location: login.php');
} ?>