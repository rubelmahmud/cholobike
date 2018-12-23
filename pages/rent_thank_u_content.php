<?php
    if(isset($_GET['pickup']) && isset($_GET['return']) && isset($_SESSION['customer_id'])) {
        $obj_app->save_rent_info($_GET);
    }
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center text-success">Thank you for your rent request</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Please check your email for the ride confirmation</h3>
                    <hr/>

                </div>
            </div>
        </div>
    </div>
</div>
