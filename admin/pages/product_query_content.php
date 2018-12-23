<?php

if (isset($_GET['status'])) {
        $enquiry_id = $_GET['id'];
        if ($_GET['status'] == 'unread') {
                $message = $ob_sup_admin->unread_enquiry_by_id($enquiry_id);
        } else if ($_GET['status'] == 'read') {
                $message = $ob_sup_admin->read_enquiry_by_id($enquiry_id);
        } else if ($_GET['status'] == 'delete') {
                $message = $ob_sup_admin->delete_enquiry_by_id($enquiry_id);
        }

}


$query_result = $ob_sup_admin->select_all_query_info();

?>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product Query</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h3><?php if (isset($message)) {
                                echo $message;
                                unset($message);
                        } ?> </h3>

            </div>
                <?php
                if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                }
                ?>


            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Product</th>
                    <th>Enquiry</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($sms_info = mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $sms_info['enquiry_id']; ?></td>
                        <td class="center"><?php echo $sms_info['name']; ?></td>
                        <td class="center"><?php echo $sms_info['email']; ?></td>
                        <td><a href="../product_details.php?id=<?php echo $sms_info['product_id']; ?>" target="_blank"> <?php echo $sms_info['product_name']; ?></a></td>
                        <td class="center"><?php echo $sms_info['enquiry']; ?></td>
                        <td class="center"><?php echo $sms_info['time']; ?></td>

                        <td class="center">
                                <?php
                                if ($sms_info['status'] == 1) {
                                        echo "<span class=\"label label-success\">Read</span>";
                                } else {
                                        echo "<span class=\"label label-important\">Unread</span>";
                                }
                                ?>
                        </td>

                        <td class="center">

                                <?php if ($sms_info['status'] == 1) { ?>
                                    <a class="btn btn-success"
                                       href="?status=unread&&id=<?php echo $sms_info['enquiry_id']; ?>"
                                       title="Unread">
                                        <i class="halflings-icon white arrow-down"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger"
                                       href="?status=read&&id=<?php echo $sms_info['enquiry_id']; ?>"
                                       title="Read">
                                        <i class="halflings-icon white arrow-up"></i>
                                    </a>
                                <?php } ?>

                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $sms_info['enquiry_id']; ?>"
                               title="Delete" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div><!--/span-->
</div>