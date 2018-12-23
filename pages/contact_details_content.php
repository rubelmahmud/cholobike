<?php

if(isset($_POST['btn'])) {
        $obj_app->save_sms_info($_POST);
}
?>


<section id="advertisement">
    <div class="container">
        <a href="bike_rent.php"><img src="assets/front_end_assets/images/rentbike.png" alt="" /></a>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <?php include('sidebar.php') ?>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="page-header">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Leave us an instant message</legend>
    <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="first_name" placeholder="First Name" required class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" required class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Email Address</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email_address" required placeholder="Email Address" class="form-control"  type="email">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone_number" required placeholder="01XXXXXXXXX" class="form-control" type="number" min="0">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Message</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        	<textarea class="form-control" name="sms"  required placeholder="Message"></textarea>
  </div>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="btn" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
                    
                </div><!--/product-details-->

            </div>
        </div>
</section>