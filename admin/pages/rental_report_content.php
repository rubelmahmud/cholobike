<?php

if($_SESSION['admin_type'] == 1) {
        $query_result = $ob_sup_admin->select_all_rent_order_info_by_branch2();
} else {
        $query_result = $ob_sup_admin->select_all_rent_order_info_by_b();
}

?>

<?php $query_order = $ob_sup_admin->select_all_rental_bike_count_branch(); ?>

<div class="row-fluid sortable">
    <div class="box span8">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Available Bike</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Branch #</th>
                    <th>Branch Name</th>
                    <th>Available Bikes</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($order=mysqli_fetch_assoc($query_order)) { ?>
                    <tr>
                        <td class="center"><?php echo $order['branch_id']; ?></td>
                        <td class="center"><?php echo $order['branch_name']; ?></td>
                        <td class="center"><?php echo $order['parked']; ?></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--/span-->

        <?php $query_o = $ob_sup_admin->select_all_rental_bike_count_r(); ?>

    <div class="row-fluid sortable">
        <div class="box span8">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Running Bike</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Branch #</th>
                        <th>Branch Name</th>
                        <th>Running Bikes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($order=mysqli_fetch_assoc($query_o)) { ?>
                        <tr>
                            <td class="center"><?php echo $order['branch_id']; ?></td>
                            <td class="center"><?php echo $order['branch_name']; ?></td>
                            <td class="center"><?php echo $order['parked']; ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div><!--/span-->

            <?php $query_m = $ob_sup_admin->select_all_rental_bike_count_m(); ?>

        <div class="row-fluid sortable">
            <div class="box span8">
                <div class="box-header">
                    <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Maintenance Bike</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Branch #</th>
                            <th>Branch Name</th>
                            <th>Maintenance Bikes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($order=mysqli_fetch_assoc($query_m)) { ?>
                            <tr>
                                <td class="center"><?php echo $order['branch_id']; ?></td>
                                <td class="center"><?php echo $order['branch_name']; ?></td>
                                <td class="center"><?php echo $order['parked']; ?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        <?php $query_b = $ob_sup_admin->select_branch_name(); ?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i>
                    <?php while ($b_info=mysqli_fetch_assoc($query_b)) { ?>
                <span class="break"></span>All Rides Report (<b> <?php echo $b_info['branch_name']; ?> Branch </b>)
            </h2>
                <?php } ?>

            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2><?php if(isset($message)) { echo $message; unset($message); } ?></h2>
            <h2>
                <?php
                    if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); }
                ?>
            </h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th data-field="order_id">Rent Order #</th>
                    <th>Bike Number</th>
                        <?php if($_SESSION['admin_type'] == 1) { ?>
                    <th>Rent From</th>
                    <?php } else {} ?>
                    <th>Destination</th>
                    <th>Customer Name</th>
                    <th>Ride Duration</th>
                    <th>Rent Fare(৳)</th>
                </tr>
                </thead>
                <tbody>
                    <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                    <?php
                    if($order_info['rent_order_status'] == 2) {
                        ?>
                            <tr>
                                <td><?php echo $order_info['rent_order_id']; ?></td>
                                <td><?php echo $order_info['bike_number']; ?></td>
                                <?php if($_SESSION['admin_type'] == 1) { ?>
                                <td><?php echo $order_info['from']; ?></td>
                                    <?php } else {} ?>
                                <td><?php echo $order_info['to']; ?></td>
                                <td class="center"><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>

                                <?php
                                $rent_end = $order_info['rent_end'];
                                $rent_start = $order_info['rent_start'];
                                $duration = round((strtotime($rent_end) - strtotime($rent_start)) / 60);

                                $rent_fare = $order_info['rent_fare'];
                                $fare = ($duration / 60) * $rent_fare;

                                ?>

                                <td><?php echo $duration ; ?> minutes</td>
                                <td><?php echo $order_info['rent_total_fare'];?></td>

                    </tr>
                        <?php
                    }
                ?>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div><!--/span-->
</div>