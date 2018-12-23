<?php
require '../classes/application.php';
$obj_app=new Application();
if($_SESSION['admin_type'] == 0) {
$category_query_result=$obj_app->select_all_published_category_by_type_bike();
$manufacturer_query_result=$obj_app->select_all_published_mannufacturer_by_type_bike();

if(isset($_POST['btn'])) {
    $message=$ob_sup_admin->save_product_info($_POST);
}

?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name </label>
                        <div class="controls">
                            <input type="text" name="product_name" class="span6 typeahead" required id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product SKU </label>
                        <div class="controls">
                            <input type="text" name="product_sku" class="span6 typeahead" required id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
                            <select id="selectError3" name="category_id" required>
                                <option selected disabled>---Select Category Name---</option>
                                <?php while ($category_info =  mysqli_fetch_assoc($category_query_result)) { ?>
                                <option value="<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="selectError3">Manufacturer Name</label>
                        <div class="controls">
                            <select id="selectError3" name="manufacturer_id" required>
                                <option selected disabled>---Select Brand Name---</option>
                                <?php while ($manufacturer_info=  mysqli_fetch_assoc($manufacturer_query_result)) { ?>
                                <option value="<?php echo $manufacturer_info['manufacturer_id']; ?>"><?php echo $manufacturer_info['manufacturer_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price </label>
                        <div class="controls">
                            <input type="number" min="0" name="product_price" required class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Cost </label>
                        <div class="controls">
                            <input type="number" min="0" name="product_cost" required class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Stock Amount</label>
                        <div class="controls">
                            <input type="number" min="0" name="stock_amount" required class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Minimum Stock Amount</label>
                        <div class="controls">
                            <input type="number" min="0" name="minimum_stock_amount" required class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_short_description" required id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_long_description" required id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Image</label>
                        <div class="controls">
                            <input type="file" name="product_image" class="span6 typeahead" id="typeahead" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Is Featured?</label>
                        <div class="controls">
                           <label> <input type="radio" name="is_featured" class="span6 typeahead" id="typeahead" value="1" >Yes</label>
                           <label> <input type="radio" name="is_featured" class="span6 typeahead" id="typeahead" value="0" checked>No</label>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Allow Customer Reviews</label>
                        <div class="controls">
                            <label> <input type="radio" name="allow_review" class="span6 typeahead" id="typeahead" value="1" >Yes</label>
                            <label> <input type="radio" name="allow_review" class="span6 typeahead" id="typeahead" value="0" checked>No</label>

                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status </label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status" required>
                                <option disabled>---Select Publication Status---</option>
                                <option selected value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>

                        <?php
                        $admin_id = $_SESSION['admin_id'];
                        $branch_id = $_SESSION['branch_id'];
                        ?>

                    <input type="hidden" name="product_type" value="0" >
                    <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" >
                    <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" >

                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Product Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

<?php } else {
        echo "<br> <h2>No access</h2>";
} ?>