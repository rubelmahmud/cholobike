<?php
    
if(isset($_GET['status'])) {
    $product_id=$_GET['id'];
    if($_GET['status'] == 'unpublished') {
        $message = $ob_sup_admin->unpublished_product_by_id($product_id);
    }
    else if($_GET['status'] == 'published') {
        $message = $ob_sup_admin->published_product_by_id($product_id);
    } 
    else if($_GET['status'] == 'delete') {
        $message = $ob_sup_admin->delete_product_by_id($product_id);
    }

}
if($_SESSION['admin_type'] == 0) {
    $query_result=$ob_sup_admin->select_all_product_info_by_type_accessories();
} else {
    $query_result=$ob_sup_admin->select_all_product_info_by_type_accessories_sa();
}

?>

<?php if($_SESSION['admin_type'] == 0) { ?>
    <div class="row-fluid">
        <div class="box blue span12">
            <div class="box-header">
                <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Products</h2>
            </div>
            <div class="box-content">

                <a class="quick-button span2" href="manage_order.php">
                    <i class="icon-shopping-cart"></i>
                    <p>Orders</p>
                </a>
                <a class="quick-button span2" href="add_accessories.php">
                    <i class="icon-plus"></i>
                    <p>Add new</p>
                </a>


                <div class="clearfix"></div>
            </div>
        </div><!--/span-->

    </div><!--/row-->
<?php } else {} ?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Accessories</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
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
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Manufacturer</th>
                        <th>Price(৳)</th>
                        <th>Stock</th>
                            <?php if($_SESSION['admin_type'] == 1) { ?>
                        <th>Branch</th>
                        <?php } else {} ?>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($product_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo '<img src="'.$product_info['product_image'].'" alt="Image" style="width:75px;height:75px">';?></td>
                       <td><a href="../product_details.php?id=<?php echo $product_info['product_id']; ?>" target="_blank"> <?php echo $product_info['product_name']; ?></a></td>
                        <td><?php echo $product_info['product_sku']; ?></td>
                        <td class="center"><?php echo $product_info['category_name']; ?></td>
                        <td class="center"><?php echo $product_info['manufacturer_name']; ?></td>
                        <td class="center"><?php echo $product_info['product_price']; ?></td>
                        <td class="center"><?php echo $product_info['stock_amount']; ?></td>
                            <?php if($_SESSION['admin_type'] == 1) { ?>
                        <td class="center"><?php echo $product_info['branch_name']; ?></td>
                        <?php } else {} ?>

                        <td class="center">
                            <a class="btn btn-primary" href="view_product.php?id=<?php echo $product_info['product_id']; ?>" title="View">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            
                            
                            <?php if ($product_info['publication_status'] == 1) { ?>
                            <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $product_info['product_id']; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-danger" href="?status=published&&id=<?php echo $product_info['product_id']; ?>" title="Published">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } ?>
                            
                            <br>
                            <a class="btn btn-info" href="edit_product.php?id=<?php echo $product_info['product_id']; ?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $product_info['product_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>