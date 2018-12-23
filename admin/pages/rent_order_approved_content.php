<?php
require './../classes/application.php';
$obj_app=new Application();

if(isset($_GET['status'])) {
        $rent_order_id=$_GET['id'];
        if($_GET['status'] == 'approved') {


        }
}


if(isset($_GET['rent_order_id']) && isset($_GET['bike_number'])){
        $bike_number = $_GET['bike_number'];
        $rent_order_id = $_GET['rent_order_id'];
   $approve= $obj_app->save_order_approved_info($_GET);

   if ($approve){
           $ob_sup_admin -> update_bike_status_by_id($bike_number);
           $message = $ob_sup_admin->approved_rent_by_id($rent_order_id);
           header('Location: manage_rent_order.php');
   }
}



if($_SESSION['admin_type'] == 0) {
$query_result = $ob_sup_admin->select_all_rent_order_approved_info_by_branch();
} else {
$query_result = $ob_sup_admin->select_all_rent_order_approved_info_by_branch_sa();
}
?>
<div class="row-fluid">
        <div class="box blue span12">
                <div class="box-header">
                        <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Rent Request</h2>
                </div>
                <div class="box-content">

                        <a class="quick-button span2" href="manage_approved_request.php">
                                <i class="icon-plus"></i>
                                <p>View Approved Requests</p>
                        </a>

                        <div class="clearfix"></div>
                </div>
        </div><!--/span-->

</div><!--/row-->
<?php $query_order = $ob_sup_admin->select_all_rent_order_approved_info(); ?>

<div class="row-fluid sortable">
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Rent Request Info</h2>
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
                    <th>From</th>
                    <th>To</th>
                    <th>Request By</th>
                    <th>National ID</th>

                </tr>
                </thead>
                <tbody>
                <?php while ($order=mysqli_fetch_assoc($query_order)) { ?>
                <tr>
                    <td class="center"><?php echo $order['rent_order_id']; ?></td>
                    <td class="center"><?php echo $order['from']; ?></td>
                    <td class="center"><?php echo $order['to']; ?></td>
                    <td class="center"><?php echo $order['first_name']; ?></td>
                    <td class="center"><?php echo $order['national_id']; ?></td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--/span-->

<div class="row-fluid sortable">
        <div class="box span8">
                <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Assign a Bike to Start the Rent </h2>
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
                                        <th class="center">Bike Number</th>
                                        <th class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                                        <?php
                                        if($order_info['rent_order_status'] == 0) {
                                                ?>
                                                <tr>
                                                        <td class="center"><?php echo $order_info['bike_number']; ?></td>
                                                        <td class="center">
                                                                <a class="btn btn-success" href="?bike_number=<?php echo $order_info['bike_number']; ?>&&rent_order_id=<?php echo $order_info['rent_order_id']; ?>" title="Start Ride">
                                                                        Start
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