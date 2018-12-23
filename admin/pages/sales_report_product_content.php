<?php

if($_SESSION['admin_type'] == 0) {
        $query_result = $ob_sup_admin->select_sales_report_bike();
} else {
      $query_result = $ob_sup_admin->select_sales_report_bike_sa();
}

    
?>

<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Best Selling Product Filter</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="sales_report_accessories.php">
                <i class="icon-eye-open"></i>
                <p>Accessories</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Best Selling Products</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2><?php if(isset($message)) { echo $message; unset($message); } ?></h2>
            <h2>
                <?php 
                    if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } 
                ?>
            </h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Product</th>
                        <th>Price(৳)</th>
                        <th>Total Sold</th>
                    <?php if($_SESSION['admin_type'] == 1) { ?>
                        <th>Branch</th>
                        <?php } else {} ?>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($product_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo '<img src="'.$product_info['product_image'].'" alt="Image" style="width:75px;height:75px">';?></td>
                        <td><a href="../product_details.php?id=<?php echo $product_info['product_id']; ?>" target="_blank"> <?php echo $product_info['product_name']; ?></a></td>
                        <td class="center"><?php echo $product_info['product_price']; ?></td>
                        <td class="center"><?php echo $product_info['TotalQuantity']; ?></td>
                        <?php if($_SESSION['admin_type'] == 1) { ?>
                        <td class="center"><?php echo $product_info['branch_name']; ?></td>
                         <?php } else {} ?>

                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--/span-->
</div>