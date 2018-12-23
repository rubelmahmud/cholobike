<?php
    
if(isset($_GET['status'])) {
    $category_id=$_GET['id'];
    if($_GET['status'] == 'unpublished') {
        $message=$ob_sup_admin->unpublished_category_by_id($category_id);
    } 
    else if($_GET['status'] == 'published') {
        $message=$ob_sup_admin->published_category_by_id($category_id);
    }
    else if($_GET['status'] == 'delete') {
        $message=$ob_sup_admin->delete_category_by_id($category_id);
    }
    
}


    $query_result=$ob_sup_admin->select_all_category_info();

?>

<div class="row-fluid">
    <div class="box blue span12">
        <div class="box-header">
            <h2><i class="halflings-icon hand-right"></i><span class="break"></span>Category</h2>
        </div>
        <div class="box-content">

            <a class="quick-button span2" href="category.php">
                <i class="icon-plus"></i>
                <p>Add new</p>
            </a>

            <div class="clearfix"></div>
        </div>
    </div><!--/span-->

</div><!--/row-->

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h3><?php if(isset($message)) { echo $message; unset($message); } ?> </h3>

            </div>
                    <?php
                    if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); }
                    ?>





            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($category_info=mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $category_info['category_id']; ?></td>
                        <td class="center"><?php echo $category_info['category_name']; ?></td>
                        <td class="center"><?php echo $category_info['category_description']; ?></td>
                        <td class="center"><?php echo $category_info['category_type']; ?></td>
                        <td class="center">
                            <?php
                                if($category_info['publication_status'] == 1) {
                                    echo "<span class=\"label label-success\">Published</span>";
                                } else {
                                    echo "<span class=\"label label-important\">Unpublished</span>";
                                }
                            ?>
                        </td>
                        <td class="center">
                            
                            <?php if ($category_info['publication_status'] == 1) { ?>
                            <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $category_info['category_id']; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-danger" href="?status=published&&id=<?php echo $category_info['category_id']; ?>" title="Published">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } ?>
                            
                            
                            <a class="btn btn-info" href="edit_category.php?id=<?php echo $category_info['category_id']; ?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $category_info['category_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>