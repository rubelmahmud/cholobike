<?php
    ob_start();

    session_start();

    require './classes/application.php';
    $obj_app=new Application();
    
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

        <?php
            if(isset($pages)) {
                if($pages == 'bike_store') {
                    include './pages/bike_store_content.php';
                }
                else if ($pages == 'accessories_store') {
                        include './pages/accessories_store_content.php';
                }
                else if ($pages == 'bike_rent') {
                        include './pages/bike_rent_content.php';
                }
                else if ($pages == 'product-details') {
                    include './pages/product_details_content.php';
                }
                else if ($pages == 'account') {
                        include './pages/account_content.php';
                }
                else if ($pages == 'edit_account') {
                        include './pages/account_update_content.php';
                }
                else if ($pages == 'category') {
                    include './pages/category_content.php';
                }
                else if ($pages == 'brand') {
                    include './pages/brand_content.php';
                }
                else if ($pages == 'checkout') {
                    include './pages/checkout_content.php';
                }
                else if ($pages == 'rent_confirmation') {
                        include './pages/rent_confirmation_content.php';
                }
                else if ($pages == 'shipping') {
                    include './pages/shipping_content.php';
                }
                else if ($pages == 'payment') {
                    include './pages/payment_content.php';
                }
                else if ($pages == 'rent_thank_u') {
                        include './pages/rent_thank_u_content.php';
                }
                else if ($pages == 'customer_home') {
                    include './pages/customer_home_content.php';
                }
                else if ($pages == 'contact_details_content') {
                    include './pages/contact_details_content.php';
                }
                else if ($pages == 'about_details_content') {
                    include './pages/about_details_content.php';
                }
                else if ($pages == 'cart_rent') {
                      include './pages/cart_rent_content.php';
                }
                else if ($pages == 'cart_content') {
                        include './pages/cart_content.php';
                }
            } else {
                include './pages/home_content.php';
            }

        ?>
        
        
        
        
        

        <footer id="footer"><!--Footer-->
            <?php include './includes/footer_top.php'; ?>
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