<?php
    if(isset($_GET['status'])) {
        $rent_order_id=$_GET['id'];
        if($_GET['status'] == 'approved') {
            $message = $ob_sup_admin->approved_rent_by_id($rent_order_id);
        }
        else if($_GET['status'] == 'delete') {
            $message = $ob_sup_admin->delete_rent_by_id($rent_order_id);
        }
    }
if($_SESSION['admin_type'] == 0) {
        $query_result = $ob_sup_admin->select_all_rent_order_info_by_branch();
?>

<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Rent Request</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="manage_rent_order.php">
                <i class="icon-eye-open"></i>
                <p>View Pending<br> Requests</p>
            </a>

            <a class="quick-button span2" href="manage_approved_request.php">
                <i class="icon-eye-open"></i>
                <p>View Approved Requests</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->
        <?php $query_b = $ob_sup_admin->select_branch_name(); ?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i>
                <?php while ($b_info=mysqli_fetch_assoc($query_b)) { ?>
                    <span class="break"></span>Manage Cancelled Request (<b> <?php echo $b_info['branch_name']; ?> Branch </b>)
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
            <table class="table table-striped table-bordered bootstrap-datatable datatable" data-sort-name="order_id" data-sort-order="desc">
                <thead>
                    <tr>
                        <th data-field="order_id">Order #</th>
                        <th>Rent From</th>
                        <th>Rent To</th>
                        <th>Customer Name</th>
                        <th>National ID</th>
                        <th>Request Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                    <?php
                    if($order_info['rent_order_status'] == 3) {
                        ?>
                            <tr>
                        <td><?php echo $order_info['rent_order_id']; ?></td>
                        <td><?php echo $order_info['from']; ?></td>
                        <td><?php echo $order_info['to']; ?></td>
                        <td class="center"><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>
                        <td><?php echo $order_info['national_id']; ?></td>
                        <td class="center">
                                        <?php
                                        if($order_info['rent_order_status'] == 3) {
                                                echo "<span class=\"label label-important\">Cancelled</span>";
                                        } else {
                                                echo "<span class=\"label label-danger\">Pending</span>";
                                        }
                                        ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-success" href="rent_order_approved.php?status=approved&&id=<?php echo $order_info['rent_order_id']; ?>" title="Approve Request">
                                <i class="halflings-icon white check"></i>
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $order_info['rent_order_id']; ?>" title="Delete Request" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i>
                            </a>

                        </td>
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
<?php
} else {
 echo "<h2>No Access</h2>";
} ?>