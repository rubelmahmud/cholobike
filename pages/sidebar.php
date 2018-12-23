<?php
    $query_result=$obj_app->select_all_published_category_by_type_accessories_count();
    $query_result_brand=$obj_app->select_all_published_mannufacturer_name_count();
/*    exit();  */
 $url= $_SERVER['REQUEST_URI'];
?>


<div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>ACCESSORIES</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php while ($category_info=  mysqli_fetch_assoc($query_result)) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="category.php?id=<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?><span class="pull-right">(<?php echo $category_info['total']; ?>)</span></a></h4>
                            </div>
                        </div>
                       <?php }
                       unset($category_info);
                       ?>
                    </div><!--/category-products-->
                        <?php if ($url !='/about.php' && $url !='/contact.php' && $url !='/account.php'){ ?>

                    <div class="shipping text-center"><!--shipping-->
                        <a href="bike_rent.php"> <img src="assets/front_end_assets/images/rentside.png" alt="" /> </a>
                    </div><!--/shipping-->
                    <br> <br>
                        <?php } else {

                        } ?>

                   <?php if ($url !='/bike_rent.php' && $url !='/about.php' && $url !='/contact.php' && $url !='/account.php'){ ?>

                    <h2>Follow Us</h2>
                    <div class="fb-page"
                         data-href="https://fb.me/cholobike1"
                         data-tabs="timeline, events, messages" data-width="350" data-height="400"
                         data-small-header="true" data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://fb.me/cholobike1"
                                    class="fb-xfbml-parse-ignore">
                            <a href="https://fb.me/cholobike1">Cholo Bike</a></blockquote>
                    </div>
&nbsp; <br> <br> <br>
                    <?php } else {

                    } ?>

                        <?php if ($url !='/bike_rent.php'){ ?>
                    <h2>POPULAR BAND</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                            <?php while ($brand_info=  mysqli_fetch_assoc($query_result_brand)) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="brand.php?id=<?php echo $brand_info['manufacturer_id']; ?>"><?php echo $brand_info['manufacturer_name']; ?><span class="pull-right">(<?php echo $brand_info['total']; ?>)</span></a></h4>
                                    </div>
                                </div>
                            <?php }
                            unset($brand_info);
                            ?>
                    </div><!--/category-products-->
                        <?php } else {

                        } ?>



                </div>
            </div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=703764323092754&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>