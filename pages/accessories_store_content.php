<section id="advertisement">
    <div class="container">
        <a href="bike_rent.php"><img src="assets/front_end_assets/images/rentbike.png" alt="" /></a>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?php include('sidebar.php'); ?>
            <div class="col-sm-9 padding-right">

                 <?php
                 $product_info =  mysqli_fetch_assoc($query_result);
                 unset($product_info);

                $query_result=$obj_app->select_latest_accessories_info();

                  ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Exclusive Accessories</h2>
                 <?php while ($product_info =  mysqli_fetch_assoc($query_result)) { ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="pages/<?php echo $product_info['product_image']; ?>" alt="" width="250" height="250" />
                                    <h2>৳<?php echo $product_info['product_price']; ?></h2>
                                    <p><?php echo $product_info['product_name']; ?></p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>৳<?php echo $product_info['product_price']; ?></h2>
                                        <p><?php echo $product_info['product_name']; ?></p>
                                        <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>" class="btn btn-default add-to-cart">Product Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php } ?>

                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>