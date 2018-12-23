<?php
    $query_result=$ob_sup_admin->select_max_customer_info();
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Max Order Customers List</h2>
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
                        <th>#</th>
                        <th>Name</th>
                        <th>Total Orders</th>
                        <th>Order Total Amount</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $order_info['customer_id']; ?></td>
                        <td class="center"><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>
                        <td class="center"><?php echo $order_info['total_purchased']; ?></td>
                        <td class="center">৳<?php echo $order_info['total_order_amount']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>