<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="admin_master.php"><i class="icon-bar-chart"></i><span
                            class="hidden-tablet"> Dashboard</span></a></li>
                <?php $url = $_SERVER['REQUEST_URI']; ?>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close"></i><span
                            class="hidden-tablet"> Products</span></a>

                <ul>
                    <li <?php if ($url == '/admin/add_product.php') {
                            echo "class='active'";
                    } ?>
                            <?php if (strpos($url, 'edit_product.php') !== false) {
                                    echo "class='active'";
                            } ?> >
                        <a class="submenu" href="manage_product.php">
                            <i class="icon-star"></i>
                            <span class="hidden-tablet"> Bikes</span>
                        </a>
                    </li>

<!--                    <li style="display: none"><a class="submenu" href="--><?php //echo $url ?><!--"></a></li>-->

                    <li <?php if ($url == '/admin/add_accessories.php') {
                            echo "class='active'";
                    } ?> ><a class="submenu" href="manage_accessories.php"><i class="icon-star"></i><span
                                    class="hidden-tablet"> Accessories</span></a></li>

                        <?php if ($_SESSION['admin_type'] == 0) { ?>
                            <li <?php if ($url == '/admin/category.php') {
                                    echo "class='active'";
                            } ?>
                                    <?php if (strpos($url, 'edit_category.php') !== false) {
                                            echo "class='active'";
                                    } ?> >
                                <a class="submenu" href="manage_category.php">
                                    <i class="icon-tags"></i>
                                    <span class="hidden-tablet"> Categories</span>
                                </a>
                            </li>

                            <li <?php if ($url == '/admin/manufacturer.php') {
                                    echo "class='active'";
                            } ?>
                                    <?php if (strpos($url, 'edit_manufacturer.php') !== false) {
                                            echo "class='active'";
                                    } ?> >
                                <a class="submenu" href="manage_manufacturer.php">
                                    <i class="icon-tag"></i>
                                    <span class="hidden-tablet"> Manufacturers</span>
                                </a>
                            </li>

                        <?php } else {
                        } ?>
                </ul>

            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close"></i><span class="hidden-tablet"> Rental Bike</span></a>
                <ul>
                    <li <?php if ($url == '/admin/add_rental_bike.php') {
                                    echo "class='active'";
                            } ?> <?php if (strpos($url, 'edit_rental_bike.php') !== false) {
                                    echo "class='active'";
                            } ?> ><a class="submenu" href="manage_rental_bike.php"><i class="icon-star"></i><span
                                    class="hidden-tablet"> Bikes</span></a></li>
                        <?php if ($_SESSION['admin_type'] == 1) { ?>
                            <li><a class="submenu" href="manage_rent_cost.php"><i class="icon-star"></i><span
                                            class="hidden-tablet"> Rent Fare</span></a></li>
                        <?php } else {
                        } ?>
                        <?php if ($_SESSION['admin_type'] == 0) { ?>

                            <li><a class="submenu" href="manage_rent_order.php"><i class="icon-star"></i><span
                                            class="hidden-tablet"> Rent Request</span></a></li>
                            <li><a class="submenu" href="manage_approved_request.php"><i class="icon-star"></i><span
                                            class="hidden-tablet"> Running Rides</span></a></li>
                        <?php } else {
                        } ?>

                </ul>

            </li>


            <?php if ($_SESSION['admin_type'] == 1) { ?>
                    <li <?php if ($url == '/admin/admin.php') {
                            echo "class='active'";
                    } ?> <?php if (strpos($url, 'edit_admin.php') !== false) {
                                    echo "class='active'";
                            } ?>  ><a href="manage_admin.php"><i class="icon-folder-close"></i><span class="hidden-tablet"> Admin</span></a>
                    </li>
                    <li <?php if ($url == '/admin/branch.php') {
                            echo "class='active'";
                    } ?><?php if (strpos($url, 'edit_branch.php') !== false) {
                                    echo "class='active'";
                            } ?>  > <a href="manage_branch.php"><i class="icon-folder-close"></i><span class="hidden-tablet"> Branch</span></a>
                    </li>
                <?php } else {
                } ?>
                <?php if ($_SESSION['admin_type'] == 0) { ?>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close"></i><span class="hidden-tablet"> Sales</span></a>
                        <ul>
                            <li>
                                <a class="submenu" href="manage_order.php">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="hidden-tablet"> Orders</span>
                                </a>
                            </li>
                            <li><a class="submenu" href="view_sell.php"><i class="icon-star"></i><span
                                            class="hidden-tablet"> Sell</span></a></li>
                        </ul>
                    </li>
                <?php } else {
                } ?>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close"></i><span
                            class="hidden-tablet"> Customers</span></a>
                <ul>
                    <li><a class="submenu" href="manage_customer.php"><i class="icon-group"></i><span
                                    class="hidden-tablet"> Customer List</span></a></li>
                    <li><a class="submenu" href="contact_sms.php"><i class="icon-envelope"></i><span
                                    class="hidden-tablet"> Customer Query</span></a></li>
                        <?php if ($_SESSION['admin_type'] == 0) { ?>
                    <li><a class="submenu" href="product_query.php"><i class="icon-envelope"></i><span
                                    class="hidden-tablet"> Product Query</span></a></li>
                        <?php } else {
                        } ?>

                </ul>
            </li>
                <?php if ($_SESSION['admin_type'] == 0) { ?>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close"></i><span class="hidden-tablet"> Promotions</span></a>
                        <ul>
                            <li><a class="submenu" href="subscribers.php"><i class="icon-star"></i><span
                                            class="hidden-tablet"> Subscribers</span></a></li>

                        </ul>
                    </li>
                <?php } else {
                } ?>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close"></i><span
                            class="hidden-tablet"> Reports</span></a>
                <ul>
                    <li <?php if ($url == '/admin/lowstock_accessories.php') {
                            echo "class='active'";
                    } ?> ><a class="submenu" href="lowstock_product.php"><i class="icon-star"></i><span
                                    class="hidden-tablet"> Low stock</span></a>
                    </li>
                    <li <?php if ($url == '/admin/sales_report_accessories.php') {
                            echo "class='active'";
                    } ?>  ><a class="submenu" href="sales_report_product.php"><i class="icon-shopping-cart"></i><span
                                    class="hidden-tablet"> Sales reports</span></a>
                    </li>
                    <li><a class="submenu" href="rental_report.php"><i class="icon-star"></i><span
                                    class="hidden-tablet"> Rental reports</span></a>
                    </li>
                    <li><a class="submenu" href="max_order_customer.php"><i class="icon-group"></i><span
                                    class="hidden-tablet"> Customer reports</span></a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>