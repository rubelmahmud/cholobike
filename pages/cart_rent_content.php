<?php

    $query_result=$obj_app->select_rent_cost();


        if (isset($_POST['book'])) {

                $_SESSION['pickup']=$_POST['pickup'];
                $_SESSION['return']=$_POST['return'];

        }

        if(isset($_POST['pickup'], $_POST['return'])) {

     $pickup = $_POST['pickup'];
     $return = $_POST['return'];
          include 'connection.php';
          $sql = "SELECT * FROM tbl_branch WHERE branch_id=$pickup";
          $query_branch_name = $conn->query($sql);

          $sqlR = "SELECT * FROM tbl_branch WHERE branch_id=$return";
          $query_pickup = $conn->query($sqlR);

          ?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Rent Cart</li>
            </ol>
        </div>



        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Bike Rent</td>
                        <td class="description">From - Destination</td>
                        <td class="price">Rent Fare</td>
                        <td class="total">Approx. Total Fare</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $sum=0; while ($cart_product=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td class="cart_product">
                            <img src="assets\product_images\ghost-4900-race.jpg" alt="" width="80" height="80">
                        </td>
                        <td class="cart_description">
                                <?php foreach ($query_branch_name as $row) { ?>

                            <h4><?php echo $row['branch_name']; ?>
                             <?php }
                             foreach ($query_pickup as $rowP) { ?>
                                            -
                                <?php echo $rowP['branch_name']; ?> </h4> <br>
                                <?php } ?>


                        </td>
                        <td class="cart_price">
                            <p>৳<?php echo $cart_product['rent_cost']; ?> /hour</p>
                        </td>

<!--
   1.  - 2.  = 10km =>
   1.  - 5.  = 7 =>
   1. -  8. =  3 =>

   2 - 5 = 7 =>
   2 - 8 = 9 =>

   5 - 8 = 9 =>

   -->

                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                if ($pickup == 1 && $return == 2) {
                                    $total=$cart_product['rent_cost']*1.5;
                                    echo '৳'.$total;
                                }
                                elseif ($pickup == 2 && $return == 1) {
                                        $total=$cart_product['rent_cost']*1.5;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 1 && $return == 5){
                                        $total=$cart_product['rent_cost']*1.2;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 5 && $return == 1){
                                        $total=$cart_product['rent_cost']*1.2;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 1 && $return == 8){
                                        $total=$cart_product['rent_cost']*0.5;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 8 && $return == 1){
                                        $total=$cart_product['rent_cost']*0.8;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 2 && $return == 5){
                                        $total=$cart_product['rent_cost']*1.2;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 5 && $return == 2){
                                        $total=$cart_product['rent_cost']*1.2;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 2 && $return == 8){
                                        $total=$cart_product['rent_cost']*1.4;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 8 && $return == 2){
                                        $total=$cart_product['rent_cost']*1.4;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 5 && $return == 8){
                                        $total=$cart_product['rent_cost']*1*4;
                                        echo '৳'.$total;
                                }
                                elseif($pickup == 8 && $return == 5){
                                        $total=$cart_product['rent_cost']*1*4;
                                        echo '৳'.$total;
                                }
                                elseif($pickup ==  $return){
                                        $total="Info unavailable";
                                        echo $total;
                                } else {
                                        $total="Info unavailable";
                                        echo $total;
                                }
                                   
                                ?>
                            </p>
                        </td>

                    </tr>
                    <?php  $sum=$total; } ?>
                </tbody>
            </table>
<!--            <table class="table table-bordered" style="width: 60%; float: right; text-align: center;">-->
<!--                <tr>-->
<!--                    <td>Sub Total</td>-->
<!--                    <td>৳--><?php //echo $sum; ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>VAT Total</td>-->
<!--                    <td>--><?php
//                        $vat=($sum*15)/100;
//                        echo '৳ '.$vat;
//                    ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Grand Total</td>-->
<!--                    <td>৳-->
<!--                        --><?php
//                            $grand_total=$sum;
//                            $_SESSION['order_total']=$grand_total;
//                            echo $grand_total;
//                        ?>
<!--                    </td>-->
<!--                </tr>-->
<!--            </table>-->
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                        $customer_id=isset($_SESSION['customer_id']);
                     if($customer_id == NULL) {
                    ?>
                    <a href="rent_confirmation.php?pickup=<?php echo $pickup?> & return=<?php echo $return ?>" class="btn btn-primary pull-right">Confirm</a>
                    <?php } 
                    else if ($customer_id != NULL) {
                        ?>
                    <a href="rent_thank_u.php?pickup=<?php echo $pickup?> & return=<?php echo $return ?>" class="btn btn-primary pull-right">Confirm</a>
                   <?php 
               } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } else {
        echo "
   <section id=\"cart_items\">
    <div class=\"container\">
        <div class=\"breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><a href=\"index.php\">Home</a></li>
                <li class=\"active\">Shopping Cart</li>
            </ol>
        </div>
   </section>
      <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <h2 class=\"text-center text-success\" style='color: red'>You may be do not select pickup and return location</h2>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <h3 class=\"text-center text-success\">Please click the button below to rent a bike</h3>
                   <center> <a href=\"bike_rent.php\" class=\"btn btn-primary\">Rent Cycle</a> </center> 
                </div>
            </div>
        </div>
    </div>
</div>  
        
        ";
} ?>







