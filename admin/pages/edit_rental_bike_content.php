<?php
if($_SESSION['admin_type'] == 1) {
$bike_id=$_GET['id'];
$query_result=$ob_sup_admin->select_bike_info_by_id($bike_id);
$bike_info= mysqli_fetch_assoc($query_result);

$query_branch_result=$ob_sup_admin->select_branch_info_all();

if(isset($_POST['btn'])) {
        $message=$ob_sup_admin->update_bike_info($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Rental Bike Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form name="edit_bike_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Bike Number </label>
                        <div class="controls">
                            <input type="number" min="0" required value="<?php echo $bike_info['bike_number']; ?>" name="bike_number" class="span6 typeahead" id="typeahead">
                            <input type="hidden" value="<?php echo $bike_info['bike_id']; ?>" name="bike_id" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Frame Number </label>
                        <div class="controls">
                            <input type="text" min="0" required value="<?php echo $bike_info['frame_number']; ?>" name="frame_number" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Branch</label>
                        <div class="controls">
                            <select id="selectError3" name="branch_id" required>
                                <option selected disabled>---Select Branch---</option>
                                    <?php while ($branch_info=mysqli_fetch_assoc($query_branch_result)) { ?>
                                        <option value="<?php echo $branch_info['branch_id']; ?>"><?php echo $branch_info['branch_name']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Bike Condition </label>
                        <div class="controls">
                            <select id="selectError3" name="bike_condition">
                                <option disabled>---Select Bike Condition---</option>
                                <option value="1">Ready</option>
                                <option value="0">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Bike Info</button>
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
    document.forms['edit_bike_form'].elements['branch_id'].value='<?php echo $bike_info['branch_id']; ?>';
    document.forms['edit_bike_form'].elements['bike_condition'].value='<?php echo $bike_info['bike_condition']; ?>';
</script>
