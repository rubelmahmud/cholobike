<?php
    $query_cat_result=$obj_app->select_all_published_category_by_type_accessories_count();
    $query_result=$obj_app->select_all_published_mannufacturer_name_count();
?>
<div class="footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>Service</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Change Location</a></li>
                        <li><a href="#">FAQ’s</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>Accessories</h2>
                    <ul class="nav nav-pills nav-stacked">
                            <?php while ($category_info=  mysqli_fetch_assoc($query_cat_result)) { ?>
                        <li><a href="category.php?id=<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?>( <?php echo $category_info['total']; ?>)</a></li>
                            <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>Popular Brand</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <?php while ($manufacturer_info=  mysqli_fetch_assoc($query_result)) { ?>
                            <li><b><a href="brand.php?id=<?php echo $manufacturer_info['manufacturer_id']; ?>"><?php echo $manufacturer_info['manufacturer_name']; ?> (<?php echo $manufacturer_info['total']; ?>)</b></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2>About Us</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Store Location</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                        <li><a href="#">Copyright</a></li>
                    </ul>
                </div>
            </div>
            
    
                <?php

                if(isset($_POST['sub'])) {
                        $obj_app->save_subscribe_info($_POST);
                }
                ?>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="single-widget">
                    <h2>Subscribe Now</h2>
                    <form action=" "  method="post" enctype="multipart/form-data" class="searchform">
                        <input type="email" name="email" placeholder="Your email address" />
                        <button type="submit" name="sub" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                        <p>Get the most recent updates from <br />us and be updated your self...</p>
                    </form>
                </div>
            </div>
            
            <div class="col-sm-3 col-sm-offset-1">
                <div class="single-widget">
                    <h2>We Are Trusted</h2>
                      <script language="JavaScript" type="text/javascript">
TrustLogo("https://cholobike.rubelmahmud.me/assets/front_end_assets/images/comodo_secure_seal_100x85_transp.png", "CL1", "none");
</script>
<a  href="https://ssl.comodo.com" id="comodoTL">Comodo SSL</a>
                </div>
            </div>

        </div>
    </div>
</div>