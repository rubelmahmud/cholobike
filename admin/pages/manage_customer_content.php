<?php
    $query_result=$ob_sup_admin->select_customer_info();
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Customer</h2>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <!--<th>Actions</th>   -->
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $order_info['customer_id']; ?></td>
                        <td class="center"><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>
                        <td class="center"><?php echo $order_info['email_address']; ?></td>
                        <td class="center"><?php echo $order_info['phone_number']; ?></td>
                        <td class="center"><?php echo ucfirst($order_info['address']); ?></td>
                        <td class="center"><?php echo ucfirst($order_info['city']); ?></td>
                        <!--<td class="center">
                            <a class="btn btn-primary" href="view_order.php?id=<?php echo $order_info['customer_id']; ?>" title="View Order">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            <a class="btn btn-primary" href="view_invoice.php?id=<?php echo $order_info['customer_id']; ?>" title="View Invoice">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $order_info['customer_id']; ?>" title="Download Invoice">
                                <i class="halflings-icon white download"></i>
                            </a>
                            <?php  if ($_SESSION['access_level'] == 1) { ?>
                            <a class="btn btn-info" href="edit_product.php?id=<?php echo $order_info['customer_id']; ?>" title="Edit Order">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $order_info['customer_id']; ?>" title="Delete Order" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i>
                            </a>
                            <?php } ?>
                        </td>-->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>