<?php
    $branch_id=$_GET['id'];
    $query_result=$ob_sup_admin->select_branch_info_by_id($branch_id);
    $branch_info= mysqli_fetch_assoc($query_result);
    
    if(isset($_POST['btn'])) {
        $message=$ob_sup_admin->update_branch_info($_POST);
    }
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Branch Information</h2>
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
                        <label class="control-label" for="typeahead">Branch Name </label>
                        <div class="controls">
                            <input type="text" required value="<?php echo $branch_info['branch_name']; ?>" name="branch_name" class="span6 typeahead" id="typeahead">
                            <input type="hidden" value="<?php echo $branch_info['branch_id']; ?>" name="branch_id" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Branch Address </label>
                        <div class="controls">
                            <input type="text" required value="<?php echo $branch_info['branch_address']; ?>" name="branch_address" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Branch Email </label>
                        <div class="controls">
                            <input type="email" required value="<?php echo $branch_info['branch_email']; ?>" name="branch_email" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Branch Phone </label>
                        <div class="controls">
                            <input type="number" min="0" required value="<?php echo $branch_info['branch_phone']; ?>" name="branch_phone" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                        <?php if ($branch_info['branch_type'] == 0) { ?>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Branch Status </label>
                        <div class="controls">
                            <select id="selectError3" name="branch_status" required>
                                <option disabled>---Update Branch Status---</option>
                                <option value="1">Open</option>
                                <option value="0">Closed</option>
                            </select>
                        </div>
                    </div>
                    <?php } else {} ?>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Branch Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->
<script>
    document.forms['edit_branch_form'].elements['branch_status'].value='<?php echo $branch_info['branch_status']; ?>';
</script>

