<?php
require '../classes/application.php';
$obj_app=new Application();
$query_branch_result = $obj_app->select_branch_info_all();
if(isset($_POST['btn'])) {
    $message=$ob_sup_admin->save_rental_bike_info($_POST);
}

?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Rental Bike Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Bike Number </label>
                        <div class="controls">
                            <input type="number" min="0" name="bike_number" required class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Frame Number </label>
                        <div class="controls">
                            <input type="text" min="0" name="frame_number" required class="span6 typeahead" id="typeahead">
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
                            <select id="selectError3" name="bike_condition" required>
                                <option disabled>---Select Bike Condition---</option>
                                <option selected value="1">Ready</option>
                                <option value="0">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Bike Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

