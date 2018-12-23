<?php
    $brand_id=$_GET['id'];
    $query_result=$obj_app->select_published_product_info_by_brand_id($brand_id);
    $query_result=$obj_app->select_mannufacturer_by_id($brand_id);
//    while ($product_info=mysqli_fetch_assoc($query_result) ) {
//        echo '<pre>';
//        print_r($product_info);
//    }
//    exit();
    
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
                    <?php
                    $brand_id=$_GET['id'];
                    $query_b_result=$obj_app->select_mannufacturer_by_id($brand_id);
                    ?>
                    <?php while ($b_info=mysqli_fetch_assoc($query_b_result) ) { ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Showing All Products of <span style="color: #3b003b"> <?php echo $b_info['manufacturer_name'];  ?></span></h2>
                    <?php }?>
                    <?php
                        $brand_id=$_GET['id'];
                        $query_result=$obj_app->select_published_product_info_by_brand_id($brand_id);
                    ?>
                    <?php while ($product_info=mysqli_fetch_assoc($query_result) ) { ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="assets/<?php echo $product_info['product_image'];  ?>" alt="" height="225" width="225" />
                                    <h2>৳<?php echo $product_info['product_price'];  ?></h2>
                                    <p><?php echo $product_info['product_name'];  ?></p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>৳<?php echo $product_info['product_price'];  ?></h2>
                                        <p><?php echo $product_info['product_name'];  ?></p>
                                        <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>" class="btn btn-default add-to-cart">Product Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   <!-- <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>-->
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>