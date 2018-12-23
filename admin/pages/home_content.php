<!-- start: Content -->

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

<div class="container" align="center">
    <img src="..\.\assets\front_end_assets\images\cholobike.png" alt="" />
</div>
<br>

<?php
if ($_SESSION['admin_type'] == 1) {

        $query1 = $ob_sup_admin->count_product_bike_info_sa();
        $query2 = $ob_sup_admin->count_product_acc_info_sa();
        $query3 = $ob_sup_admin->count_rental_bike_info_sa();
        $query4 = $ob_sup_admin->count_admin_info_sa();
        $query5 = $ob_sup_admin->count_branch_info_sa();
        $query6 = $ob_sup_admin->count_unread_query_info_sa();


} else {
        $query1 = $ob_sup_admin->count_product_bike_info();
        $query2 = $ob_sup_admin->count_product_acc_info();
        $query3 = $ob_sup_admin->count_rental_bike_info();
        $query4 = $ob_sup_admin->select_all_order_info_by_branch_count();
        $query5 = $ob_sup_admin->select_all_rent_order_info_by_branch_count();
        $query6 = $ob_sup_admin->count_unread_query_info();
}
?>

<div class="row-fluid">
    <a class="quick-button metro green span2" href="manage_product.php">
        <i class="icon-barcode"></i>
            <?php while ($count=mysqli_fetch_assoc($query1)) { ?>
        <h1><?php echo $count['total']; ?></h1> <p>Cycles</p>
        <?php } ?>
    </a>
    <a class="quick-button metro orange span2" href="manage_accessories.php">
        <i class="icon-barcode"></i>
            <?php while ($count=mysqli_fetch_assoc($query2)) { ?>
        <h1><?php echo $count['total']; ?></h1> <p>Accessories</p>
            <?php } ?>

    </a>
    <a class="quick-button metro blue span2" href="manage_rental_bike.php">
        <i class="icon-thumbs-up"></i>
            <?php while ($count=mysqli_fetch_assoc($query3)) { ?>
        <h1><?php echo $count['total']; ?></h1> <p>Rental Cycle</p>
            <?php } ?>
    </a>
        <?php if ($_SESSION['admin_type'] == 0) { ?>
    <a class="quick-button metro yellow span2" href="manage_order.php">
        <i class="icon-shopping-cart"></i>
            <?php while ($count=mysqli_fetch_assoc($query4)) { ?>
        <h1><?php echo $count['total']; ?></h1> <p>Pending Orders</p>
            <?php } ?>
    </a>
        <?php } else { ?>
    <a class="quick-button metro yellow span2" href="manage_admin.php">
                <i class="icon-group"></i>
                    <?php while ($count=mysqli_fetch_assoc($query4)) { ?>
                        <h1><?php echo $count['total']; ?></h1> <p>Total Admin</p>
                    <?php } ?>
    </a>

    <a class="quick-button metro pink span2" href="manage_branch.php">
                <i class="icon-home"></i>
                    <?php while ($count=mysqli_fetch_assoc($query5)) { ?>
                        <h1><?php echo $count['total']; ?></h1> <p>Total Branch</p>
                    <?php } ?>
    </a>

    <a class="quick-button metro red span2" href="contact_sms.php">
                <i class="icon-envelope"></i>
                    <?php while ($count=mysqli_fetch_assoc($query6)) { ?>
                        <h1><?php echo $count['total']; ?></h1> <p>Unread Enquiries</p>
                    <?php } ?>
    </a>
      <?php  } ?>
        <?php if ($_SESSION['admin_type'] == 0) { ?>
    <a class="quick-button metro red span2" href="manage_rent_order.php">
        <i class="icon-comments-alt"></i>
            <?php while ($count=mysqli_fetch_assoc($query5)) { ?>
        <h1><?php echo $count['total']; ?></h1> <p>Rent Requests</p>
            <?php } ?>
    </a>

    <a class="quick-button metro pink span2" href="product_query.php">
        <i class="icon-envelope"></i>
            <?php while ($count=mysqli_fetch_assoc($query6)) { ?>
        <h1><?php echo $count['total']; ?></h1> <p>Unread Enquiries</p>
            <?php } ?>
    </a>
        <?php } else {} ?>

    <div class="clearfix"></div>

</div><!--/row-->
&nbsp;





<!-- end: Content -->