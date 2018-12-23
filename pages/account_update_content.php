<?php

$customer_id=$_GET['id'];
$query_result=$obj_app->select_customer_info_by_id($customer_id);
$customer_info= mysqli_fetch_assoc($query_result);

if(isset($_POST['update'])) {
        $obj_app->update_customer_info($_POST);
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center text-success">Update your account info</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Account info</h3>
                    <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
                    <hr/>
                    <form class="form-horizontal" action="" method="post" name="edit_customer_form">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">First Name</label>  
                                <div class="col-md-8">
                                    <input id="name" name="first_name" type="text" value="<?php echo $customer_info['first_name']; ?>" class="form-control input-md" required="">
                                    <input type="hidden" value="<?php echo $customer_info['customer_id']; ?>" name="customer_id" class="span6 typeahead" id="typeahead">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Last Name</label>  
                                <div class="col-md-8">
                                    <input id="name" name="last_name" type="text" value="<?php echo $customer_info['last_name']; ?>" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>  
                                <div class="col-md-8">
                                    <input id="email" name="email_address" type="email" value="<?php echo $customer_info['email_address']; ?>" class="form-control input-md" required="" onblur="ajax_email_check(this.value, 'res'); ">
                                    <span id="res"></span>
                                </div>
                            </div>



                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="contact">Phone Number</label>  
                                <div class="col-md-8">
                                    <input id="contact" name="phone_number" type="number" value="<?php echo $customer_info['phone_number']; ?>" class="form-control input-md" required="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="contact">National ID Number</label>
                                <div class="col-md-8">
                                    <input id="contact" name="national_id" type="number" min="0" value="<?php echo $customer_info['national_id']; ?>"  class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="blood_group">Blood Group</label>
                                <div class="col-md-8">
                                    <select id="blood_group" name="blood_group" class="form-control">
                                        <option disabled>Select</option>
                                        <option value="1">A+</option>
                                        <option value="2">B+</option>
                                        <option value="3">AB+</option>
                                        <option value="4">O+</option>
                                        <option value="5">A-</option>
                                        <option value="6">B-</option>
                                        <option value="7">AB-</option>
                                        <option value="8">O-</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="address">Address</label>
                                <div class="col-md-8">
                                    <input id="address" name="address" type="text" value="<?php echo $customer_info['address']; ?>" class="form-control input-md" required>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="city">City</label>  
                                <div class="col-md-8">
                                    <input id="city" name="city" type="text" value="<?php echo $customer_info['city']; ?>" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Text input-->
<!--                            <div class="form-group">-->
<!--                                <label class="col-md-4 control-label" for="dist">District</label>  -->
<!--                                <div class="col-md-8">-->
<!--                                    <input id="dist" name="district" type="text" value="--><?php //echo $customer_info['district']; ?><!--" class="form-control input-md" required="">-->
<!--                                </div>-->
<!--                            </div>-->

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="update"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="update" name="update" class="btn btn-success btn-block">Update</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>


        <script>
            document.forms['edit_customer_form'].elements['blood_group'].value='<?php echo $customer_info['blood_group']; ?>';
        </script>




    </div>
</div>