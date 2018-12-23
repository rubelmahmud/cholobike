<?php
    
if(isset($_GET['status'])) {
    $bike_id=$_GET['id'];
    if($_GET['status'] == 'closed') {
        $message=$ob_sup_admin->closed_bike_by_id($bike_id);
    }
    else if($_GET['status'] == 'open') {
        $message=$ob_sup_admin->open_bike_by_id($bike_id);
    }
    else if($_GET['status'] == 'delete') {
        $message=$ob_sup_admin->delete_bike_by_id($bike_id);
    }

}
if($_SESSION['admin_type'] == 1) {

    $query_result=$ob_sup_admin->select_all_rental_bike_info();

} else {
        $query_result = $ob_sup_admin->select_all_rental_bike_info_b();
}


?>

<?php if($_SESSION['admin_type'] == 1) { ?>
<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Rental Bike</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="add_rental_bike.php">
                <i class="icon-plus"></i>
                <p>Add new</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->
<?php } else {} ?>


        <?php $query_order = $ob_sup_admin->select_all_rental_bike_count_branch(); ?>

    <div class="row-fluid sortable">
    <div class="box span6">
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

            <?php $query_b = $ob_sup_admin->select_branch_name(); ?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i>
                    <?php while ($b_info=mysqli_fetch_assoc($query_b)) { ?>
                <span class="break"></span>Manage Rental Bike (<b> <?php echo $b_info['branch_name']; ?> Branch </b>)
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
                        <th>#</th>
                        <th>Bike Number</th>
                        <th>Frame Number</th>
                        <th>Branch</th>
                        <th>Status</th>
                        <th>Destination</th>
                        <th>Condition</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($bike_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $bike_info['bike_id']; ?></td>
                        <td class="center"><?php echo $bike_info['bike_number']; ?></td>
                        <td class="center"><?php echo $bike_info['frame_number']; ?></td>
                        <td class="center"><?php echo $bike_info['branch_name']; ?></td>
                        <td class="center">
                            <?php
                            if($bike_info['status'] == 1) {
                                    echo "<span class=\"label label-success\">On Rent</span>";
                            } else {
                                    echo "<span class=\"label\">Parked</span>";
                            }
                            ?>
                        </td>
                        <td class="center"><?php echo $bike_info['destination']; ?></td>
                        <td class="center">
                                <?php
                                if($bike_info['bike_condition'] == 1) {
                                        echo "<span class=\"label label-success\">Ready</span>";
                                } else {
                                        echo "<span class=\"label\">Maintenance</span>";
                                }
                                ?>
                        </td>
                            <?php
                            if($bike_info['status'] == 0) { ?>
                        <td class="center">
                                <?php if ($bike_info['bike_condition'] == 1) { ?>

                            <a class="btn btn-success" href="?status=closed&&id=<?php echo $bike_info['bike_id']; ?>" title="Closed">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                                <?php } else { ?>
                            <a class="btn btn-danger" href="?status=open&&id=<?php echo $bike_info['bike_id']; ?>" title="Open">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                                <?php } ?>
                                <?php if($_SESSION['admin_type'] == 1) { ?>

                            <a class="btn btn-info" href="edit_rental_bike.php?id=<?php echo $bike_info['bike_id']; ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                            </a>


                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $bike_info['bike_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i>
                            </a>
                                <?php } else {} ?>
                        </td>
                            <?php } elseif(($bike_info['status'] == 1)) {  echo "
<td class=\"center\">
<span class=\"label\">No action allowed</span>
</td>

";} ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>
