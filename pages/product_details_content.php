<?php
    
    if(isset($_POST['btn'])) {
        $obj_app->add_to_cart($_POST);
    }
    
    $product_id=$_GET['id'];
    $query_result=$obj_app->select_product_info_by_id($product_id);
    $product_info=mysqli_fetch_assoc($query_result);
    
    
    
?>
<?php

if(isset($_POST['enq'])) {
        $obj_app->save_enquiry_info($_POST);
}
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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="assets/<?php echo $product_info['product_image']; ?>" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->

                            <h2><?php echo $product_info['product_name']; ?></h2>
                            <p><b>Product ID:</b> <?php echo $product_info['product_id']; ?></p>
                            <p><b>Product SKU:</b> <?php echo $product_info['product_sku']; ?></p>
                            <?php
                                $stock_amount= $product_info['stock_amount'];
                                $min_stock = $product_info['minimum_stock_amount'];

                                if ($stock_amount <= $min_stock ){
                                    echo "<p><b>Stock:</b> Not Available</p>";
                                } else  {
                                        echo "<p><b>Stock:</b> Available</p>";
                                }
                            ?>
                            <p><b>Category:</b> <?php echo $product_info['category_name']; ?></p>
                            <p><b>Manufacturer:</b> <?php echo $product_info['manufacturer_name']; ?></p>
                            <p><b>Product Available on :</b> <?php echo $product_info['branch_name']; ?> Branch</p>
                            <span><span><b>Price:</b> ৳<?php echo $product_info['product_price']; ?></span> </span>
                            <span>
                                <form action="" method="post">
                                    <label>Quantity:</label>
                                    <input type="number" min="1" max="6" name="product_quantity" value="1" />
                                    <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>" />

                                    <button type="submit" name="btn" class="btn btn-fefault cart cart-btn"
                                           <?php
                                           if ($stock_amount <= $min_stock ){
                                                   echo 'disabled="disabled"';
                                           } else  {
                                                   echo '';
                                           }
                                           ?> >
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                            </span>
                            <p><br> <?php echo $product_info['product_short_description']; ?></p>


                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#reviews" data-toggle="tab">Enquiry about this item</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="details" >
                            <p><?php echo $product_info['product_long_description']; ?></p>
                        </div>

                        <div class="tab-pane fade in" id="reviews" >
                            <div class="col-sm-12">
<!--                                <ul>-->
<!--                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>-->
<!--                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>-->
<!--                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>-->
<!--                                </ul>-->
                                <p><b>Write us an instant enquiry</b></p>
                                <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
                                <form action=" " method="post" enctype="multipart/form-data">
										<span>
											<input type="text" name="name" required placeholder="Your Name"/>
											<input type="email" name="email" required placeholder="Email Address"/>
                                            <input type="hidden" name="product_id" value=" <?php echo $product_id; ?>">
										</span>
                                    <textarea name="enquiry" required></textarea>
                                    <button type="submit" name="enq" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

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
    </div>
</section>