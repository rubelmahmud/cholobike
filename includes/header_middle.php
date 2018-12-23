<?php
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'logout') {
            $obj_app->customer_logout();
        }
    }
?>
<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo pull-left">
                    <a href="index.php"><img src="assets/front_end_assets/images/cholobikef.png" alt="CHOLO BIKE" width="250" height="50" /></a>
                </div>
            </div>
            <div class="col-sm-7">
                 <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="index.php" class=""><b>HOME</b></a></li>
                        <li><a href="about.php"><b>ABOUT</b></a></li>
                        <li class="dropdown"><a href="bike_store.php"><b>PRODUCT</b><i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="bike_store.php"><b>BIKES</b></a></li>
                                <li><a href="accessories_store.php"><b>ACCESSORIES</b></a></li>
                            </ul>
                        </li>
                        <li><a href="bike_rent.php"><b>BIKE RENT</b></i></a></li>
                        <li><a href="contact.php"><b>CONTACT</b></a></li>

                    </ul>
                </div>
            </div>



            <div class="col-sm-2">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
<!--                        <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>-->
                        <?php if(isset($_SESSION['customer_id'])) { ?>
                        <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
                        <li><a href="?status=logout"><i class="fa fa-lock"></i> Logout</a></li>
                        <?php } else { ?>
                        <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                        <?php } ?>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                    </ul>
                </div>
<!--                <div class="col-sm-3">-->
<!--                    <div class="search_box pull-right">-->
<!--                        <input type="text" placeholder="Search"/>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>