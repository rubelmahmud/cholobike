<?php
if(isset($_POST['btn'])) {
    $message=$ob_sup_admin->save_admin_info($_POST);
}
if($_SESSION['admin_type'] == 1) {

$query_branch_result=$ob_sup_admin->select_branch_info_all();

?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Admin</h2>
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
                        <label class="control-label" for="typeahead">Admin Name </label>
                        <div class="controls">
                            <input type="text" name="admin_name" required class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email Address </label>
                        <div class="controls">
                            <input type="email" required onblur="verifyEmail(this)" name="email_address" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Password </label>
                        <div class="controls">
                            <input type="password" required name="password" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Re-enter Password </label>
                        <div class="controls">
                            <input type="password" name="re_password" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Phone Number </label>
                        <div class="controls">
                            <input type="number" required min="0" name="phone_number" class="span6 typeahead" id="typeahead">
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
                                <option selected value="0">General</option>
                                <option value="1">Super</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Account Status </label>
                        <div class="controls">
                            <select id="selectError3" name="account_status">
                                <option disabled>---Select Account Status---</option>
                                <option selected value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" onclick="return validatePassword();" class="btn btn-primary">Save Admin Info</button>
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
    function validatePassword(){
        var password = document.getElementById("password").value;
        var repassword = document.getElementById("re_password").value;

        var email_address = document.getElementById("email_address").value;
        if(email_address == ''){
            alert('You must type your email address');
            return false;
        }

        if(password == repassword){
            return true;
        }else{
            alert('Password dosen\'t match');
            return false;
        }
    }

    function verifyEmail(email_address){
        //alert(email);
        $.ajax({
            url: "verifyEmail.php",
            data:{'email_address':email_address.value},
            success: function(result){
                //alert(result);
                if(result == 1)
                    $('#error').html('This email already exist');
                else
                    $('#error').html('');

            }
        });
    }
</script>