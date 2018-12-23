<?php

if(isset($_GET['rent_order_id'])) {
        $rent_order_id=$_GET['rent_order_id'];
     $ob_sup_admin ->end_rent_bike_ride($rent_order_id);
}
?>

<?php $query_rent = $ob_sup_admin->select_all_rent_completed_info(); ?>

<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Rent Request</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="manage_approved_request.php">
                <i class="icon-plus"></i>
                <p>View Running Rides</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->


<div class="row-fluid sortable">
        <div class="box span6">
                <div class="box-header">
                        <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Ride Billing Info</h2>
                        <div class="box-icon">
                                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                        </div>
                </div>
                <div class="box-content">
                        <table class="table table-striped">
                                <thead>
                                <tr>
                                        <th>Order #</th>
                                        <th>Rent Fare</th>
                                        <th>Total Fare</th>
                                        <th>Customer</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($order=mysqli_fetch_assoc($query_rent)) { ?>
                                        <tr>
                                                <td class="center"><?php echo $order['rent_order_id']; ?></td>
                                                <td class="center">৳<?php echo $order['rent_fare']; ?> /hour</td>
                                                <td class="center">৳<?php echo $order['rent_total_fare']; ?></td>
                                                <td class="center"><?php echo $order['first_name']; ?></td>
                                        </tr>


                                </tbody>
                        </table>
                </div>
        </div><!--/span-->

        <div class="row-fluid sortable">
                <div class="box span8">
                        <div class="box-header">
                                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Ride Details</h2>
                                <div class="box-icon">
                                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                </div>
                        </div>
                        <div class="box-content">
                                <table class="table table-striped">
                                        <thead>
                                        <tr>
                                                <th>Bike Number</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Ride Duration</th>
                                                <th>Payment Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                <?php
                                $rent_end =  date("Y-m-d H:i:s");
                                $rent_start = $order['rent_start'];
                                $rent_end = $order['rent_end'];
                                $duration = round((strtotime($rent_end ) - strtotime($rent_start) )/ 60);
                                ?>
                                        <tr>
                                                <td class="center"><?php echo $order['bike_number']; ?></td>
                                                <td class="center"><?php echo $order['From']; ?></td>
                                                <td class="center"><?php echo $order['To']; ?></td>
                                                <td class="center"><?php echo $duration ?> minutes</td>
                                                <td class="center"><span class="label label-success">Cash Collected</span></td>
                                        </tr>


                                        </tbody>
                                </table>
                        </div>
                        <?php
                        $previous = "javascript:history.go(-1)";
                        if(isset($_SERVER['HTTP_REFERER'])) {
                                $previous = $_SERVER['HTTP_REFERER'];
                        } ?>
                    <div class="box-content">
                        <a class="quick-button span2" href="<?= $previous ?>">
                            <i class="icon-hand-left"></i>
                            <p><b>GO BACK</b></p>
                        </a>

                        <div class="clearfix"></div>
                    </div>
                </div><!--/span-->


        <?php } ?>
