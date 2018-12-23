<?php
    $rent_cost_id=$_GET['id'];
    $query_result=$ob_sup_admin->select_rent_cost_info_by_id($rent_cost_id);
    $rent_cost_info= mysqli_fetch_assoc($query_result);
    
    if(isset($_POST['btn'])) {
        $message=$ob_sup_admin->update_rent_cost_info($_POST);
    }
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Rent Fare Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form name="edit_branch_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Rent Fare </label>
                        <div class="controls">
                            <input type="number" required value="<?php echo $rent_cost_info['rent_cost']; ?>" name="rent_cost" class="span6 typeahead" id="typeahead">
                        
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Rent Fare</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->


