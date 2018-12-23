<?php
$query_result=$ob_sup_admin->select_branch_info();
?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.php"><span>CHOLO BIKE</span></a>

                <?php
                $query_result1 = $ob_sup_admin->select_all_rent_order_info_by_branch_count();

                ?>
            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <li class="dropdown hidden-phone">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white warning-sign"></i>
                        </a>
                        <ul class="dropdown-menu notifications">
                                <?php while ($rent_info=mysqli_fetch_assoc($query_result1)) { ?>
                            <li class="dropdown-menu-title">
                                <span><b><?php echo $rent_info['total']; ?></b> rent request</span>
                                <a href="manage_rent_order.php"><i class="icon-arrow-right"></i></a>
                            </li>
                                <?php } ?>
                        </ul>
                    </li>
                    <?php
                    $query_result2 = $ob_sup_admin->select_all_order_info_by_branch_count();

                    ?>

                    <!-- start: Notifications Dropdown -->
                    <li class="dropdown hidden-phone">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white tasks"></i>
                        </a>
                        <ul class="dropdown-menu tasks">
                                <?php while ($order_info=mysqli_fetch_assoc($query_result2)) { ?>
                            <li class="dropdown-menu-title">
                                <span><b><?php echo $order_info['total']; ?></b> orders in pending</span>
                                <a href="manage_order.php"><i class="icon-arrow-right"></i></a>
                            </li>
                                <?php } ?>
                        </ul>
                    </li>
                    <!-- end: Notifications Dropdown -->

                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> <?php echo $_SESSION['admin_name']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                <span>Account Info</span>
                            </li>
                                <?php while ($branch_info=mysqli_fetch_assoc($query_result)) { ?>
                            <li><a href="#"><i class="halflings-icon home"></i> <?php echo $branch_info['branch_name']; ?></a></li>
                            <li><a href="admin_profile.php"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="?status=logout"><i class="halflings-icon off"></i> Logout</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>