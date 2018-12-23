<?php
$query_result = $obj_app->select_latest_product_info();
$query_branch_result = $obj_app->select_branch_info_all();
$query_acc_result = $obj_app->select_all_published_category_by_type_accessories();

include 'slider.php';
?>
<section class="product-sectoin">
    <div class="container">
        <div class="row">
                <?php include('sidebar.php') ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Cycle Rent</h2>

                    <div class="container">

                        <form class="well form-horizontal" action="cart_rent.php" method="post" id="booking_form">
                            <fieldset>

                                <!-- Form Name -->
                                <!--                                <legend>Book a Cycle for Rent</legend>-->

                                <!-- Text input-->
                                    <?php
                                    $branch_info = mysqli_fetch_assoc($query_branch_result);
                                    unset($branch_info);

                                    $query_branch_result = $obj_app->select_branch_info_all();
                                    ?>
                                <div class="form-group" id="#rent">
                                    <label class="col-md-3 control-label">From</label>
                                    <div class="col-md-3 inputGroupContainer">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-map-marker"></i></span>
                                            <select required name="pickup">
                                                <option value="" selected disabled>Select your pickup location</option>
                                                    <?php while ($branch_info = mysqli_fetch_assoc($query_branch_result)) { ?>
                                                        <option value="<?= $branch_info['branch_id'] ?>"><?= $branch_info['branch_name'] ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!-- Text input-->
                                    <?php
                                    $branch_info = mysqli_fetch_assoc($query_branch_result);
                                    unset($branch_info);

                                    $query_branch_result = $obj_app->select_branch_info_all();
                                    ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">To</label>
                                    <div class="col-md-3 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-map-marker"></i></span>
                                            <select name="return" required>
                                                <option value="" selected disabled>Select your destination location
                                                </option>
                                                    <?php while ($branch_info = mysqli_fetch_assoc($query_branch_result)) { ?>
                                                        <option value="<?= $branch_info['branch_id'] ?>"><?= $branch_info['branch_name'] ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" name="book" class="btn btn-warning">Rent Now <span
                                                    ></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>


                        <?php
                        $product_info = mysqli_fetch_assoc($query_result);
                        unset($product_info);

                        $query_result = $obj_app->select_nonfeatured_product_info_home();

                        ?>
                </div><!--features_items-->
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Exclusive Cycle</h2>
                        <?php while ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="pages/<?php echo $product_info['product_image']; ?>" alt=""
                                                 width="250" height="250"/>
                                            <h2>৳<?php echo $product_info['product_price']; ?></h2>
                                            <p>
                                                <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>"><?php echo $product_info['product_name']; ?></a>
                                            </p>
                                            <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>"
                                               class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <img src="pages/<?php echo $product_info['product_image']; ?>" alt=""
                                                     width="70" height="70"/>
                                                <h2>৳<?php echo $product_info['product_price']; ?></h2>
                                                <p><?php echo $product_info['product_name']; ?></p>
                                                <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>"
                                                   class="btn btn-default add-to-cart">Product Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <div class="view-allproduct">
                        <a href="bike_store.php" class="btn btn-default get">BROWSE ALL</a>
                    </div>

                </div><!--features_items-->
                    <?php
                    $acc_info = mysqli_fetch_assoc($query_acc_result);
                    unset($acc_info);

                    $query_acc_result = $obj_app->select_all_published_category_by_type_accessories();

                    ?>


                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">

                            <?php include_once("accessories_tabs.php"); ?>
                        <ul class="nav nav-tabs">
                                <?php echo $category_html; ?>
                        </ul>
                        <div class="tab-content">
                                <?php echo $product_html; ?>
                        </div>
                    </div>
                </div>
                <!--/category-tab-->


                    <?php
                    $product_info = mysqli_fetch_assoc($query_result);
                    unset($product_info);

                    $query_result = $obj_app->select_latest_featured_product_info_home();

                    ?>

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">featured items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                                <?php $i = 1;
                                $c = $i;
                                ?>
                                <?php while ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                                <?php if ($i == $c) {
                                        $c = $c + 3; ?>
                                        <?php $item_class = ($i == 1) ? 'item active' : 'item'; ?>
                                <div class="<?php echo $item_class; ?>">
                                <?php } ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="pages/<?php echo $product_info['product_image']; ?>"
                                                         alt="" width="250" height="250"/>
                                                    <h2>৳<?php echo $product_info['product_price']; ?></h2>
                                                    <p>
                                                        <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>"><?php echo $product_info['product_name']; ?></a>
                                                    </p>
                                                    <a href="product_details.php?id=<?php echo $product_info['product_id']; ?>"
                                                       class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php if ($i == $c - 1) {

                                                ?>
                                        </div>
                                        <?php } ?>
                                        <?php $i++; ?>
                                <?php } ?>
                                <?php echo ($i%3 != 0) ? '</div>': '' ; ?>
                        </div>


                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->


            </div>
        </div>
</section>