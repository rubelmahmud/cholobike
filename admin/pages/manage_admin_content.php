<?php
    
if(isset($_GET['status'])) {
    $admin_id=$_GET['id'];
    if($_GET['status'] == 'closed') {
        $message=$ob_sup_admin->closed_admin_by_id($admin_id);
    }
    else if($_GET['status'] == 'open') {
        $message=$ob_sup_admin->open_admin_by_id($admin_id);
    }
    else if($_GET['status'] == 'delete') {
        $message=$ob_sup_admin->delete_admin_by_id($admin_id);
    }

}
if($_SESSION['admin_type'] == 1) {

    $query_result=$ob_sup_admin->select_all_admin_info();

    $query_branch_result=$ob_sup_admin->select_all_admin_info_branch($admin_id);

?>

<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Admin</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="admin.php">
                <i class="icon-plus"></i>
                <p>Add new</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Admin</h2>
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
                        <th>Admin Name</th>
                        <th>Email Address</th>
                        <th>Phone</th>
                        <th>Admin Type</th>
                        <th>Branch</th>
                        <th>Account Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($admin_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $admin_info['admin_id']; ?></td>
                        <td class="center"><?php echo $admin_info['admin_name']; ?></td>
                        <td class="center"><?php echo $admin_info['email_address']; ?></td>
                        <td class="center"><?php echo $admin_info['phone_number']; ?></td>
                        <td class="center">
                                <?php
                                if($admin_info['admin_type'] == 0) {
                                        echo 'General';
                                } else {
                                        echo 'Super';
                                }
                                ?>
                        </td>
                        <td class="center"><?php echo $admin_info['branch_name']; ?></td>

                        <td class="center">
                            <?php  
                                if($admin_info['account_status'] == 1) {
                                        echo "<span class=\"label label-success\">Active</span>";
                                } else {
                                        echo "<span class=\"label\">Inactive</span>";
                                }
                            ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="edit_admin.php?id=<?php echo $admin_info['admin_id']; ?>" title="Edit">
                                <i class="halflings-icon white edit"></i>
                            </a>
                                <?php if($_SESSION['admin_id'] !== $admin_info['admin_id']) { ?>
                            <?php if ($admin_info['account_status'] == 0) { ?>
                            <a class="btn btn-success" href="?status=closed&&id=<?php echo $admin_info['admin_id']; ?>" title="Closed">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-danger" href="?status=open&&id=<?php echo $admin_info['admin_id']; ?>" title="Open">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } ?>

                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $admin_info['admin_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i>
                            </a>

                                <?php } else {} ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>
<?php } else {
        echo "<br> <h2>No access</h2>";
} ?>