<section id="slider"><!--slider-->
        <div class="container">
                <div class="row">
                        <div class="col-sm-12">
                                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                                        </ol>
                                        <?php  $query_result=$obj_app->select_rent_cost(); ?>
                                        <div class="carousel-inner">
                                                <div class="item active">
                                                        <div class="col-sm-6">
                                                             <?php while ($customer=mysqli_fetch_assoc($query_result)) { ?>
                                                            <h1><span>Rent</span> Cycle <span>৳<?php echo $customer['rent_cost']; ?>/h</span> Only</h1>
                                                             <?php } ?>
                                                                <!-- <h2>Free E-Commerce Template</h2>       -->
                                                                <p>Rent a cycle to reach your destination avoid traffic jam within the cheapest cost.</p>
                                                                <a href="bike_rent.php" class="btn btn-default get">Rent Now</a>
                                                                <!--<button type="button" class="btn btn-default get">Get it now</button>   -->
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <img src="assets/front_end_assets/images/home/tmc/1.png" class="girl img-responsive" alt="" />
                                                                <!--<img src="assets/front_end_assets/images/home/pricing.png"  class="pricing" alt="" />-->
                                                        </div>
                                                </div>
                                                <div class="item">
                                                        <div class="col-sm-6">
                                                                <h1><span>Buy</span> Quality Cycle</h1>
                                                                <!--<h2>100% Responsive Design</h2>     -->
                                                                <p>Become the world leader for the sport of cycling.</p>
                                                                <a href="bike_store.php" class="btn btn-default get">Buy Now</a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <img src="assets/front_end_assets/images/home/tmc/2.png" class="girl img-responsive" alt="" />
                                                                <!-- <img src="assets/front_end_assets/images/home/pricing.png"  class="pricing" alt="" />   -->
                                                        </div>
                                                </div>

                                                <div class="item">
                                                        <div class="col-sm-6">
                                                                <h1><span>Best</span> Cycling Experience</h1>
                                                                <!--<h2>Free Ecommerce Template</h2> -->
                                                                <p>We are offering cycle for rent & cycle for purchase, what is your choice?</p>
                                                                <a href="bike_store.php" class="btn btn-default get">Buy Now</a>
                                                                <a href="bike_rent.php" class="btn btn-default get">Rent Now</a>

                                                        </div>
                                                        <div class="col-sm-6">
                                                                <img src="assets/front_end_assets/images/home/tmc/3.png" class="girl img-responsive" alt="" />
                                                                <!-- <img src="assets/front_end_assets/images/home/pricing.png" class="pricing" alt="" />  -->
                                                        </div>
                                                </div>

                                        </div>

                                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                                <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                                <i class="fa fa-angle-right"></i>
                                        </a>
                                </div>

                        </div>
                </div>
        </div>
</section><!--/slider-->