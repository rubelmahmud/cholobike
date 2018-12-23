<?php
$query_branch_result = $obj_app->select_branch_info_all();
$query_count_result1 = $obj_app->select_rent_bike_count1();
$query_count_result2 = $obj_app->select_rent_bike_count2();
$query_count_result5 = $obj_app->select_rent_bike_count5();
$query_count_result8 = $obj_app->select_rent_bike_count8();

?>

<section id="advertisement">
    <div class="container">

                <a href="bike_rent.php"><img src="assets/front_end_assets/images/rentbike.png" alt="" /></a>
        <!--The div element for the map -->


    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?php include('sidebar.php'); ?>
                <div class="col-sm-9 padding-right">

                    <div id="map"></div>




                    <script>
                        function initMap() {

                                <?php while ($bike_info = mysqli_fetch_assoc($query_count_result1)) { ?>
                            var dhanmondi = {
                                info: '<center><strong><u>Dhanmondi Branch</u></strong><br>\
        <h2 style="color:#0000cc;"><?php echo $bike_info['total'] ; ?></h2> <h5> cycle available for rent</h5><br><br>\
        <a href="https://goo.gl/maps/9k2PSfRbZA52">Get Directions</a></center>',
                                lat: 23.746466,
                                long: 90.376015
                            };
                                <?php } ?>
                                <?php while ($bike_info = mysqli_fetch_assoc($query_count_result2)) { ?>
                            var mohammadpur = {
                                info: '<center><strong><u>Mohammadpur Branch</u></strong><br>\
        <h2 style="color:#0000cc;"><?php echo $bike_info['total'] ; ?></h2> <h5> cycle available for rent</h5><br><br>\
        <a href="https://goo.gl/maps/9HvvqBzENYn">Get Directions</a></center>',
                                lat: 23.766071,
                                long: 90.357710
                            };
                                <?php } ?>
                                <?php while ($bike_info = mysqli_fetch_assoc($query_count_result5)) { ?>
                            var motijheel = {
                                info: '<center><strong><u>Motijheel Branch</strong></u><br>\r\
               <h2 style="color:#0000cc;"><?php echo $bike_info['total'] ; ?></h2> <h5> cycle available for rent</h5><br><br>\
        <a href="https://goo.gl/maps/eAYMDRxyPKw">Get Directions</a></center>',
                                lat: 23.732971,
                                long: 90.417229
                            };
                                <?php } ?>
                                <?php while ($bike_info = mysqli_fetch_assoc($query_count_result8)) { ?>
                            var badda = {
                                info: '<center><strong><u>Badda Branch</u></strong><br>\r\
               <h2 style="color:#0000cc;"><?php echo $bike_info['total'] ; ?></h2> <h5> cycle available for rent</h5><br><br>\
        <a href="https://goo.gl/maps/uDdwGMZK2Mm">Get Directions</a></center>',
                                lat: 23.780192,
                                long: 90.429623
                            };
                                <?php } ?>
                            var locations = [
                                [dhanmondi.info, dhanmondi.lat, dhanmondi.long, 0],
                                [mohammadpur.info, mohammadpur.lat, mohammadpur.long, 1],
                                [motijheel.info, motijheel.lat, motijheel.long, 2],
                                [badda.info, badda.lat, badda.long, 3],
                            ];

                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 12,
                                center: new google.maps.LatLng(23.769673, 90.399731),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow({});

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        }
                    </script>


                    <!--Load the API from the specified URL
                    * The async attribute allows the browser to render the page while the API loads
                    * The key parameter will contain your own API key (which is not needed for this tutorial)
                    * The callback parameter executes the initMap() function
                    -->
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPikkkPd8PeO2ZVz6jkniI-R5lr3MI4Rc&callback=initMap">
                    </script>

<br> <br>
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

  <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Download Our App</h2>


                                                <?php

                                                if(isset($_GET['download'])) {
                                                        $message=$obj_app->download_app($_GET);
                                                }

                                                ?>
                                            <form class="form-horizontal" action="" method="GET">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="email">Enter your email address to get our app's download link</label>
                                                        <div class="col-md-8">
                                                            <input id="email" name="email_address" type="text" placeholder="Enter your email address" class="form-control input-md" required>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="download"></label>
                                                        <div class="col-md-8">
                                                            <button id="download" name="download" class="btn btn-success btn-block">EMAIL APP LINK</button>
                                                        </div>
                                                    </div>

                                                </fieldset>
                                            </form>
                            <center><h4>OR</h4>
                            <p><a target="_blank" href="/assets/cholobike.apk"><img alt="play store logo" src="/assets/front_end_assets/images/google-playstore.png" height="50" width="150"></a></p>
                            </center> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</section>





<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 300px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>