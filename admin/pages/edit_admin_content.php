<?php
if($_SESSION['admin_type'] == 1) {
$admin_id=$_GET['id'];
$query_result=$ob_sup_admin->select_admin_info_by_id($admin_id);
$admin_info= mysqli_fetch_assoc($query_result);

$query_branch_result=$ob_sup_admin->select_branch_info_all();

if(isset($_POST['btn'])) {
        $message=$ob_sup_admin->update_admin_info($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Admin</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form name="edit_admin_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Admin Name </label>
                        <div class="controls">
                            <input type="text" required value="<?php echo $admin_info['admin_name']; ?>" name="admin_name" class="span6 typeahead" id="typeahead">
                            <input type="hidden" value="<?php echo $admin_info['admin_id']; ?>" name="admin_id" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email Address </label>
                        <div class="controls">
                            <input type="email" required value="<?php echo $admin_info['email_address']; ?>"  name="email_address" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Phone Number </label>
                        <div class="controls">
                            <input type="number" required value="<?php echo $admin_info['phone_number']; ?>" min="0" name="phone_number" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Branch Name</label>
                        <div class="controls">
                            <select id="selectError3" name="branch_id" required>
                                <option disabled>---Select Branch Name---</option>
                                    <?php while ($branch_info=  mysqli_fetch_assoc($query_branch_result)) { ?>
                                        <option value="<?php echo $branch_info['branch_id']; ?>"><?php echo $branch_info['branch_name']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Admin Type </label>
                        <div class="controls">
                            <select id="selectError3" name="admin_type">
                                <option disabled>---Select Admin Type---</option>
                                <option value="0">General</option>
                                <option value="1">Super</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Account Status </label>
                        <div class="controls">
                            <select id="selectError3" name="account_status">
                                <option disabled>---Select Account Status---</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Admin Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

<?php } else {
        echo "<br> <h2>No access</h2>";
} ?>
<script>
    document.forms['edit_admin_form'].elements['branch_id'].value='<?php echo $admin_info['branch_id']; ?>';
    document.forms['edit_admin_form'].elements['admin_type'].value='<?php echo $admin_info['admin_type']; ?>';
    document.forms['edit_admin_form'].elements['account_status'].value='<?php echo $admin_info['account_status']; ?>';
</script>
