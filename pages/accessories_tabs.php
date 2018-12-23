<?php
include_once("connection.php");
$category_sql = 'SELECT * FROM tbl_category WHERE category_type ="Accessories" AND publication_status = 1 LIMIT 8';
$resultset = mysqli_query($conn, $category_sql) or die("database error:". mysqli_error($conn));
$active_class = 0 ;
$category_html = '';
$product_html = '';
while( $category = mysqli_fetch_assoc($resultset) ) {
        $current_tab = "";
        $current_content = "";
        if(!$active_class) {
                $active_class = 1;
                $current_tab = 'active';
                $current_content = 'in active';
        }
        $category_html.= '<li class="'.$current_tab.'"><a href="#'.$category['category_id'].'" data-toggle="tab">'.
                $category['category_name'].'</a></li>';
        $product_html .= '<div id="'.$category["category_id"].'" class="tab-pane fade '.$current_content.'">';
        $product_sql = "SELECT * FROM tbl_product WHERE publication_status = 1  AND category_id = '".$category["category_id"]."' ORDER BY product_id DESC LIMIT 4 ";
        $product_results = mysqli_query($conn, $product_sql) or die("database error:". mysqli_error($conn));
        if(!mysqli_num_rows($product_results)) {
                $product_html .= '<br>No product found!';
        }
        while( $product = mysqli_fetch_assoc($product_results) ) {
                $product_html .= '<div class="col-md-3 product">';
                $product_html .= '<div class="product-image-wrapper">';
                $product_html .= '<div class="single-products">';
                $product_html .= '<div class="productinfo text-center">';
                $product_html .= '<img src="images/'.$product["product_image"].'" class="img-responsive img-thumbnail product_image" />';
                $product_html .= '<h2>৳'.$product["product_price"].'</h2>';
                $product_html .= '<p><a href="product_details.php?id='. $product['product_id'].' "> '. $product['product_name'].'</a></p>';
                $product_html .= '<a href="product_details.php?id='. $product['product_id'].' " class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                $product_html .= '</div>';
                $product_html .= '</div>';
                $product_html .= '</div>';
                $product_html .= '</div>';

        }
        $product_html .= '<div class="clear_both"></div></div>';
}
?>