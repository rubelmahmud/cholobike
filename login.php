
<?php
    ob_start();

    session_start();

    require './classes/application.php';
    $obj_app=new Application();

?>
<?php
if (isset($_POST['signup'])) {
    $obj_app->save_customer_info($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Cholo Bike</title>
        <link href="assets/front_end_assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/prettyPhoto.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/price-range.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/animate.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/main.css?v3" rel="stylesheet">
        <link href="assets/front_end_assets/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="assets/front_end_assets/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/front_end_assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/front_end_assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/front_end_assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/front_end_assets/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <?php include './includes/header_top.php'; ?>
            <!--/header_top-->
            <?php include './includes/header_middle.php'; ?>
            <!--/header-middle-->
            <?php include './includes/header_bottom.php'; ?>
            <!--/header-bottom-->
        </header><!--/header-->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center text-success">You have to login to order. If you are not registered then please register first.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Registration</h3>
                    <hr/>
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">First Name</label>
                                <div class="col-md-8">
                                    <input id="name" name="first_name" type="text" placeholder="Enter your name" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Last Name</label>
                                <div class="col-md-8">
                                    <input id="name" name="last_name" type="text" placeholder="Enter your name" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-8">
                                    <input id="email" name="email_address" type="email" placeholder="Enter your email id" class="form-control input-md" required="" onblur="ajax_email_check(this.value, 'res'); ">
                                    <span id="res"></span>
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>
                                <div class="col-md-8">
                                    <input id="password" name="password" type="password" placeholder="Enter a password" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="contact">Phone Number</label>
                                <div class="col-md-8">
                                    <input id="contact" name="phone_number" type="number" min="0" placeholder="Enter your contact no." class="form-control input-md" required="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="contact">National ID Number</label>
                                <div class="col-md-8">
                                    <input id="contact" name="national_id" type="number" min="0" placeholder="Enter your national id no." class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="blood_group">Blood Group</label>
                                <div class="col-md-8">
                                    <select id="blood_group" name="blood_group" class="form-control">
                                        <option value="-1">Select</option>
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
                                <label class="col-md-4 control-label" for="street">Address</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="address"></textarea>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="city">City</label>
                                <div class="col-md-8">
                                    <input id="city" name="city" type="text" placeholder="Enter your city" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="dist">District</label>
                                <div class="col-md-8">
                                    <input id="dist" name="district" type="text" placeholder="Enter your district" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="signup"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="signup" name="signup" class="btn btn-success btn-block">Sign Up</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Login</h3>
                    <hr/>
                    <?php

                    $customer_id=  isset($_SESSION['customer_id']);
                    if($customer_id) {
                        header('Location: index.php');
                    }

                    if(isset($_POST['login'])) {
                        $message=$obj_app->customer_login_check($_POST);
                    }

                ?>
                    <form class="form-horizontal" action="" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-8">
                                    <input id="email" name="email_address" type="text" placeholder="Enter your email id" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>
                                <div class="col-md-8">
                                    <input id="password" name="password" type="password" placeholder="Enter a password" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="signup"></label>
                                <div class="col-md-8">
                                    <button id="signup" name="login" class="btn btn-success btn-block">Login</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

        <footer id="footer"><!--Footer-->
            <?php// include './includes/footer_top.php'; ?>
            <?php include './includes/footer_widget.php'; ?>
            <?php include './includes/footer_bottom.php'; ?>
        </footer><!--/Footer-->


        <script src="assets/front_end_assets/js/jquery.js"></script>
        <script src="assets/front_end_assets/js/bootstrap.min.js"></script>
        <script src="assets/front_end_assets/js/jquery.scrollUp.min.js"></script>
        <script src="assets/front_end_assets/js/price-range.js"></script>
        <script src="assets/front_end_assets/js/jquery.prettyPhoto.js"></script>
        <script src="assets/front_end_assets/js/main.js"></script>
    </body>
</html>