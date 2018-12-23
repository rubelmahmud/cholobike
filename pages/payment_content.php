

<?php
    if(isset($_POST['btn'])) {
        $obj_app->save_order_info($_POST);
    }
    
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center text-success">You have to give us payment information to complete your order.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Select Your Payment Method</h3>
                    <hr/>
                    <form class="" action="" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <td><h5>Cash on Delivery</h5></td>
                                <td><input type="radio" name="payment_type" value="cash_on_delivery" required>
                                <input type="hidden" value="0" name="trx_id">
                                </td>
                                 
                            </tr>
                            <tr>
                                <td><h5>bKash</h5></td>
                                    
                                <td>
                                    <input type="radio" name="payment_type" value="bKash" required>
                                   <br>
                                    <label>Enter bKash Transaction ID</label>
                                    <input type="text" name="trx_id">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="btn" value="Confirm Order" class="btn-lg btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


