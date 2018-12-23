<?php
$query_result=$ob_sup_admin->select_subscribers_info();
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Subscribers List</h2>
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
                    <th>Subscribers #</th>
                    <th>Email Address</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($order_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $order_info['subscribe_id']; ?></td>
                        <td class="center"><?php echo $order_info['email']; ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>



        </div>
    </div><!--/span-->
</div>