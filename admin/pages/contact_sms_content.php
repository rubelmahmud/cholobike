<?php

if (isset($_GET['status'])) {
        $sms_id = $_GET['id'];
        if ($_GET['status'] == 'unread') {
                $message = $ob_sup_admin->unread_sms_by_id($sms_id);
        } else if ($_GET['status'] == 'read') {
                $message = $ob_sup_admin->read_sms_by_id($sms_id);
        } else if ($_GET['status'] == 'delete') {
                $message = $ob_sup_admin->delete_sms_by_id($sms_id);
        }

}


$query_result = $ob_sup_admin->select_all_sms_info();

?>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Query</h2>
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
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($sms_info = mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $sms_info['sms_id']; ?></td>
                        <td class="center"><?php echo $sms_info['first_name'].' '.$sms_info['last_name']; ?></td>
                        <td class="center"><?php echo $sms_info['email_address']; ?></td>
                        <td class="center"><?php echo $sms_info['phone_number']; ?></td>
                        <td class="center"><?php echo $sms_info['sms']; ?></td>
                        <td class="center"><?php echo $sms_info['sms_time']; ?></td>

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
                                       href="?status=unread&&id=<?php echo $sms_info['sms_id']; ?>"
                                       title="Unread">
                                        <i class="halflings-icon white arrow-down"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger"
                                       href="?status=read&&id=<?php echo $sms_info['sms_id']; ?>"
                                       title="Read">
                                        <i class="halflings-icon white arrow-up"></i>
                                    </a>
                                <?php } ?>

                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $sms_info['sms_id']; ?>"
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