<?php
    
if(isset($_GET['status'])) {
    $rent_cost_id=$_GET['id'];
    if($_GET['status'] == 'unpublished') {
        $message = $ob_sup_admin->unpublished_product_by_id($product_id);
    }
    else if($_GET['status'] == 'published') {
        $message = $ob_sup_admin->published_product_by_id($product_id);
    }

}
    $query_result=$ob_sup_admin->select_all_rent_cost_info();
    
//    while ($product_info=  mysqli_fetch_assoc($query_result)) {
//        echo '<pre>';
//        print_r($product_info);
//    }
//    exit();

    
    
    
    
    
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Rent Fare</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2><?php if(isset($message)) { echo $message; unset($message); } ?></h2>
            <h2>
                <?php 
                    if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } 
                ?>
            </h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Rent Fare</th>
                        <th>Update</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($rent_cost_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><b>৳<?php echo $rent_cost_info['rent_cost']; ?></b> per hour</td>

                        <td class="center">

                            <a class="btn btn-info" href="edit_rent_cost.php?id=<?php echo $rent_cost_info['rent_cost_id']; ?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>