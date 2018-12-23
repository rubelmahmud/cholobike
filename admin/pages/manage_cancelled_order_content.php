<?php
    if(isset($_GET['status'])) {
        $product_id=$_GET['id'];
        if($_GET['status'] == 'approved') {
            $message = $ob_sup_admin->approved_product_by_id($product_id);
        }
        else if($_GET['status'] == 'delete') {
            $message = $ob_sup_admin->delete_order_by_id($product_id);
        }
    }
if($_SESSION['admin_type'] == 0) {
        $query_result = $ob_sup_admin->select_all_order_info_by_branch();

?>
<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Orders</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="manage_order.php">
                <i class="icon-eye-open"></i>
                <p>View Orders</p>
            </a>

            <a class="quick-button span2" href="view_sell.php">
                <i class="icon-eye-open"></i>
                <p>View Sells</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Management</h2>
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
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Total Amount</th>
                        <th>Customer Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                    <?php
                    if($order_info['order_status'] == 'cancelled') {
                        ?>
                            <tr>
                        <td><?php echo $order_info['order_id']; ?></td>
                        <td><a href="../product_details.php?id=<?php echo $order_info['product_id']; ?>" target="_blank"> <?php echo $order_info['product_name']; ?></a></td>
                         <td class="center"><?php echo $order_info['product_quantity']; ?></td>
                        
                        <td class="center"><?php echo $order_info['payment_type']; ?></td>
                                    <?php
                                    if($order_info['payment_type'] == 'bKash') {
                                            echo "<td class=\"center\"><span class=\"label label-success\">Paid</span></td>";
                                    } elseif($order_info['payment_type'] == 'cash_on_delivery'){
                                            echo "<td class=\"center\"><span class=\"label label-danger\">Pending</span></td>";
                                    }
                                    ?>
                        <td class="center">৳<?php echo $order_info['order_total']; ?></td>
                        <td class="center"><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>

                        <td class="center">
                            <a class="btn btn-primary" href="view_order.php?id=<?php echo $order_info['order_id']; ?>" title="View Order Details">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            <a class="btn btn-success" href="?status=approved&&id=<?php echo $order_info['order_id']; ?>" title="Approve">
                                <i class="halflings-icon white check"></i>
                            </a>

                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $order_info['order_id']; ?>" title="Delete Order" onclick="return check_delete(); ">
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
}
        ?>