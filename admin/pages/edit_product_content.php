<?php
$product_id=$_GET['id'];
$query_result=$ob_sup_admin->select_product_info_by_id($product_id);
$product_info=mysqli_fetch_assoc($query_result);
$category_query_result=$ob_sup_admin->select_all_category_info();
$manufacturer_query_result=$ob_sup_admin->select_all_manufacturer_info();


if(isset($_POST['btn'])) {
        $message=$ob_sup_admin->update_product_info($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update product info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form name="edit_product_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>

                    <div class="control-group">
                        <div class="controls">
                            <?php echo '<img src="'.$product_info['product_image'].'" alt="Image" style="width:200px;height:150px">';?>

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $product_info['product_name']; ?>" required name="product_name" class="span6 typeahead" id="typeahead">
                            <input type="hidden" value="<?php echo $product_info['product_id']; ?>" name="product_id" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
                            <select id="selectError3" name="category_id" required>
                                <option>---Select Category Name---</option>
                                <?php while ($category_info=  mysqli_fetch_assoc($category_query_result)) { ?>
                                <option value="<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="selectError3">Manufacturer Name</label>
                        <div class="controls">
                            <select id="selectError3" name="manufacturer_id" required>
                                <option>---Select Manufacturer Name---</option>
                                <?php while ($manufacturer_info=  mysqli_fetch_assoc($manufacturer_query_result)) { ?>
                                <option value="<?php echo $manufacturer_info['manufacturer_id']; ?>"><?php echo $manufacturer_info['manufacturer_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price </label>
                        <div class="controls">
                            <input type="number" min="0" value="<?php echo $product_info['product_price']; ?>" required name="product_price" class="span6 typeahead" id="typeahead">                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Cost </label>
                        <div class="controls">
                            <input type="number" min="0" value="<?php echo $product_info['product_cost']; ?>" required name="product_cost" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Stock Amount</label>
                        <div class="controls">
                            <input type="number" min="0" value="<?php echo $product_info['stock_amount']; ?>" required name="stock_amount" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Minimum Stock Amount</label>
                        <div class="controls">
                            <input type="number" min="0" value="<?php echo $product_info['minimum_stock_amount']; ?>" required name="minimum_stock_amount" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_short_description" id="product_short_description" required rows="3"><?php echo $product_info['product_short_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_long_description" id="product_long_description" required rows="3"><?php echo $product_info['product_long_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Image</label>
                        <div class="controls">
                            <input type="file" value="<?php echo $product_info['product_image']; ?>" name="product_image" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Is Featured?</label>
                        <div class="controls">
                            <label> <input type="radio" name="is_featured" class="span6 typeahead" id="typeahead" value="1" >Yes</label>
                            <label> <input type="radio" name="is_featured" class="span6 typeahead" id="typeahead" value="0" >No</label>

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
                        <label class="control-label" for="selectError3">Product Type </label>
                        <div class="controls">
                            <select id="selectError3" name="product_type" required>
                                <option>---Select Product Type---</option>
                                <option value="0">Bike</option>
                                <option value="1">Accessories</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status </label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status" required>
                                <option selected disabled>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Product Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->

<script>
   // document.getElementById("product_short_description").value = "<?php echo $product_info['product_short_description']; ?>";
   document.forms['edit_product_form'].elements['product_type'].value='<?php echo $product_info['product_type']; ?>';
   document.forms['edit_product_form'].elements['is_featured'].value='<?php echo $product_info['is_featured']; ?>';
   document.forms['edit_product_form'].elements['allow_review'].value='<?php echo $product_info['allow_review']; ?>';
   document.forms['edit_product_form'].elements['publication_status'].value='<?php echo $product_info['publication_status']; ?>';
   document.forms['edit_product_form'].elements['category_id'].value='<?php echo $product_info['category_id']; ?>';
   document.forms['edit_product_form'].elements['manufacturer_id'].value='<?php echo $product_info['manufacturer_id']; ?>';

</script>