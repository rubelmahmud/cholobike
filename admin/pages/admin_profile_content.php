
<?php $query_result = $ob_sup_admin->select_admin_profile_info(); ?>

<div class="container" align="center">
   <img src="..\.\assets\front_end_assets\images\cholobike.png" alt="" />
</div>
<br>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>My Profile Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Branch</th>
                    <th>Branch Address</th>
                    <th>Admin Type</th>
                    <th>Account Status</th>

                </tr>
                </thead>
                <tbody>
                <?php while ($admin=mysqli_fetch_assoc($query_result)) { ?>
                <tr>
                    <td class="center"><?php echo $admin['admin_id']; ?></td>
                    <td class="center"><?php echo $admin['admin_name']; ?></td>
                    <td class="center"><?php echo $admin['email_address']; ?></td>
                    <td class="center"><?php echo $admin['phone_number']; ?></td>
                    <td class="center"><?php echo $admin['branch_name']; ?></td>
                    <td class="center"><?php echo $admin['branch_address']; ?></td>

                    <td class="center">
                            <?php
                            if($admin['admin_type'] == 1) {
                                    echo "Super Admin";
                            } else {
                                    echo "Branch Admin";
                            }
                            ?>
                    </td>
                    <td class="center">
                            <?php
                            if($admin['account_status'] == 1) {
                                    echo "<span class=\"label label-success\">Active</span>";
                            } else {
                                    echo "<span class=\"label label-important\">Inactive</span>";
                            }
                            ?>
                    </td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--/span-->

