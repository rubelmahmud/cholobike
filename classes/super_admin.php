<?php

class Super_admin
{

        private $db_connect;

        public function __construct()
        {
                $host_name = 'localhost';
                $user_name = 'root';
                $password = '';
                $db_name = 'cholobike';
                $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
                if (!$this->db_connect) {
                        die('Connection Fail' . mysqli_error($this->db_connect));
                }
        }

        public function save_category_info($data)
        {
                $sql = "INSERT INTO tbl_category (category_name, category_description, category_type, publication_status) VALUES ('$data[category_name]', '$data[category_description]','$data[category_type]', '$data[publication_status]' )";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Category info has been created successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_category_info()
        {
                $sql = "SELECT * FROM tbl_category order by category_id desc ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_sms_info()
        {
                $sql = "SELECT * FROM tbl_contact order by sms_id desc ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_query_info()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT * 
FROM tbl_enquiry as e, tbl_product as p, tbl_branch as b
where e.product_id = p.product_id
and p.branch_id = b.branch_id
and b.branch_id ='$branch_id' order by enquiry_id desc ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_destination_by_bike_id()
        {
                $sql = "SELECT b.branch_name AS \"destination\"
FROM tbl_rental_bike as rb, tbl_rental_order as r, tbl_rental_order_details as od, tbl_branch as b
WHERE rb.bike_number = od.bike_number
AND r.rent_order_id = od.rent_order_id
AND r.rent_to = b.branch_id
AND rb.status=1";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function unread_sms_by_id($sms_id)
        {
                $sql = "UPDATE tbl_contact SET status=0 WHERE sms_id='$sms_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "SMS info unread successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function read_sms_by_id($sms_id)
        {
                $sql = "UPDATE tbl_contact SET status=1 WHERE sms_id='$sms_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "SMS info read successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_sms_by_id($sms_id)
        {
                $sql = "DELETE FROM tbl_contact WHERE sms_id='$sms_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'SMS info delete successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function unread_enquiry_by_id($enquiry_id)
        {
                $sql = "UPDATE tbl_enquiry SET status=0 WHERE enquiry_id='$enquiry_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Enquiry info unread successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function read_enquiry_by_id($enquiry_id)
        {
                $sql = "UPDATE tbl_enquiry SET status=1 WHERE enquiry_id='$enquiry_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Enquiry info read successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_enquiry_by_id($enquiry_id)
        {
                $sql = "DELETE FROM tbl_enquiry WHERE enquiry_id='$enquiry_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'Enquiry info delete successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function unpublished_category_by_id($category_id)
        {
                $sql = "UPDATE tbl_category SET publication_status=0 WHERE category_id='$category_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Category info unpublished successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function published_category_by_id($category_id)
        {
                $sql = "UPDATE tbl_category SET publication_status=1 WHERE category_id='$category_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Category info published successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_category_info_by_id($category_id)
        {
                $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_category_info($data)
        {
                $sql = "UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]', category_type='$data[category_type]', publication_status='$data[publication_status]' WHERE category_id='$data[category_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = 'Category info update successfully';
                        header('Location: manage_category.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_category_by_id($category_id)
        {
                $sql = "DELETE FROM tbl_category WHERE category_id='$category_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'Category info delete successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function save_manufacturer_info($data)
        {
                $sql = "INSERT INTO tbl_manufacturer (manufacturer_name, manufacturer_description, manufacturer_type, publication_status) VALUES ('$data[manufacturer_name]', '$data[manufacturer_description]','$data[manufacturer_type]', '$data[publication_status]' )";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Manufacturer info has been created successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_manufacturer_info()
        {
                $sql = "SELECT * FROM tbl_manufacturer ORDER BY manufacturer_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function unpublished_manufacturer_by_id($manufacturer_id)
        {
                $sql = "UPDATE tbl_manufacturer SET publication_status=0 WHERE manufacturer_id='$manufacturer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Manufacturer info unpublished successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function published_manufacturer_by_id($manufacturer_id)
        {
                $sql = "UPDATE tbl_manufacturer SET publication_status=1 WHERE manufacturer_id='$manufacturer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Manufacturer info published successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_manufacturer_info_by_id($manufacturer_id)
        {
                $sql = "SELECT * FROM tbl_manufacturer WHERE manufacturer_id='$manufacturer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_manufacturer_info($data)
        {
                $sql = "UPDATE tbl_manufacturer SET manufacturer_name='$data[manufacturer_name]', manufacturer_description='$data[manufacturer_description]', manufacturer_type='$data[manufacturer_type]', publication_status='$data[publication_status]' WHERE manufacturer_id='$data[manufacturer_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = "Manufacturer info update successfully";
                        header('Location: manage_manufacturer.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_manufacturer_by_id($manufacturer_id)
        {
                $sql = "DELETE FROM tbl_manufacturer WHERE manufacturer_id='$manufacturer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'Manufacturer info delete successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        /*
          ADMIN
          */
        public function save_admin_info($data)
        {
                $sql = "INSERT INTO tbl_admin (admin_name, email_address, password, phone_number, admin_type, branch_id, account_status) VALUES ('$data[admin_name]', '$data[email_address]', '$data[password]', '$data[phone_number]', '$data[admin_type]', '$data[branch_id]', '$data[account_status]' )";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = " Admin info has been created successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function save_rental_bike_info($data)
        {
                $sql = "INSERT INTO tbl_rental_bike (bike_number, frame_number, bike_condition, branch_id) VALUES ('$data[bike_number]','$data[frame_number]', '$data[bike_condition]', '$data[branch_id]' )";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Rental bike info has been added successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rental_bike_info()
        {
                $sql = "SELECT a.*, b.branch_name, d.destination
FROM tbl_branch as b, tbl_rental_bike as a 
Left join (SELECT b2.branch_name as 'destination', rb.bike_number as 'bike_number'
FROM tbl_rental_bike as rb, tbl_rental_order as r, tbl_rental_order_details as od, tbl_branch as b2
WHERE rb.bike_number = od.bike_number
AND r.rent_order_id = od.rent_order_id
AND r.rent_to = b2.branch_id
AND r.rent_order_status=1) as d on d.bike_number = a.bike_number
WHERE a.branch_id = b.branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rental_bike_info_b()
        {
                $branch = $_SESSION['branch_id'];
                $sql = "SELECT a.*, b.branch_name, d.destination
FROM tbl_branch as b, tbl_rental_bike as a 
Left join (SELECT b2.branch_name as 'destination', rb.bike_number as 'bike_number'
FROM tbl_rental_bike as rb, tbl_rental_order as r, tbl_rental_order_details as od, tbl_branch as b2
WHERE rb.bike_number = od.bike_number
AND r.rent_order_id = od.rent_order_id
AND r.rent_to = b2.branch_id
AND r.rent_order_status=1) as d on d.bike_number = a.bike_number
WHERE a.branch_id = b.branch_id
AND b.branch_id ='$branch'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        /*
       BRANCH
       */
        public function save_branch_info($data)
        {
                $sql = "INSERT INTO tbl_branch (branch_name, branch_address, branch_email, branch_phone, branch_status) VALUES ('$data[branch_name]', '$data[branch_address]', '$data[branch_email]', '$data[branch_phone]', '$data[branch_status]' )";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Branch info has been created successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_branch_info()
        {
                $sql = "SELECT * from tbl_branch";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_admin_info()
        {
                $sql = "SELECT *
FROM tbl_admin as a, tbl_branch as b
WHERE a.branch_id = b.branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_admin_profile_info()
        {
                $admin_id = $_SESSION['admin_id'];
                $sql = "SELECT * FROM tbl_admin as a, tbl_branch as b WHERE a.branch_id = b.branch_id and admin_id = $admin_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_admin_info_branch($admin_id)
        {
                $sql = "SELECT b.branch_id, b.branch_name
FROM tbl_branch as b, tbl_admin as a
WHERE b.branch_id = a.branch_id
AND a.admin_id='$admin_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_bike_info_by_id($bike_id)
        {
                $sql = "SELECT * FROM tbl_rental_bike WHERE bike_id='$bike_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_admin_info_by_id($admin_id)
        {
                $sql = "SELECT * FROM tbl_admin WHERE admin_id='$admin_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function closed_admin_by_id($admin_id)
        {
                $sql = "UPDATE tbl_admin SET account_status=1 WHERE admin_id='$admin_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "This admin account is closed.";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function open_admin_by_id($admin_id)
        {
                $sql = "UPDATE tbl_admin SET account_status=0 WHERE admin_id='$admin_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "This admin account is open successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_admin_by_id($admin_id)
        {
                $sql = "DELETE FROM tbl_admin WHERE admin_id='$admin_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'This admin account has been deleted';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_admin_info($data)
        {
                $sql = "UPDATE tbl_admin SET admin_name='$data[admin_name]', email_address='$data[email_address]', password='$data[password]', phone_number='$data[phone_number]', branch_id='$data[branch_id]',admin_type='$data[admin_type]', account_status='$data[account_status]' WHERE admin_id='$data[admin_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = "Admin info update successfully";
                        header('Location: manage_admin.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_bike_info($data)
        {
                $sql = "UPDATE tbl_rental_bike SET bike_number='$data[bike_number]', frame_number='$data[frame_number]', bike_condition='$data[bike_condition]', branch_id='$data[branch_id]' WHERE bike_id='$data[bike_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = "Bike info update successfully";
                        header('Location: manage_rental_bike.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function closed_bike_by_id($bike_id)
        {
                $sql = "UPDATE tbl_rental_bike SET bike_condition=0 WHERE bike_id='$bike_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "This bike is now on maintenance.";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function open_bike_by_id($bike_id)
        {
                $sql = "UPDATE tbl_rental_bike SET bike_condition=1 WHERE bike_id='$bike_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "This bike is now available for rent";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_bike_by_id($bike_id)
        {
                $sql = "DELETE FROM tbl_rental_bike WHERE bike_id='$bike_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'This bike has been deleted';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function closed_branch_by_id($branch_id)
        {
                $sql = "UPDATE tbl_branch SET branch_status=0 WHERE branch_id='$branch_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "This branch is closed successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function open_branch_by_id($branch_id)
        {
                $sql = "UPDATE tbl_branch SET branch_status=1 WHERE branch_id='$branch_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "This branch is open successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_branch_info_by_id($branch_id)
        {
                $sql = "SELECT * FROM tbl_branch WHERE branch_id='$branch_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_branch_info($data)
        {
                $sql = "UPDATE tbl_branch SET branch_name='$data[branch_name]', branch_address='$data[branch_address]', branch_email='$data[branch_email]',branch_phone='$data[branch_phone]', branch_status='$data[branch_status]' WHERE branch_id='$data[branch_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = "Branch info update successfully";
                        header('Location: manage_branch.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_branch_by_id($branch_id)
        {
                $sql = "DELETE FROM tbl_branch WHERE branch_id='$branch_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'This branch has been deleted successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_branch_info_by_in_id($branch_incharge)
        {
                $sql = "SELECT admin_name FROM tbl_admin, tbl_branch WHERE admin_id = branch_incharge AND branch_incharge='$branch_incharge' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        /*
     RENT COST
     */
        public function save_rent_cost_info($data)
        {
                $sql = "INSERT INTO tbl_rent_cost (rent_cost, stock) VALUES ('$data[rent_cost]', '$data[stock]')";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Rent cost info has been created successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_cost_info()
        {
                $sql = "SELECT * FROM tbl_rent_cost";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_rent_cost_info_by_id($rent_cost_id)
        {
                $sql = "SELECT * FROM tbl_rent_cost WHERE rent_cost_id='$rent_cost_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_rent_cost_info($data)
        {
                $sql = "UPDATE tbl_rent_cost SET rent_cost='$data[rent_cost]'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = "Rent cost info update successfully";
                        header('Location: manage_rent_cost.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }



        /*
            PRODUCT QUERY
         */
        public function save_product_info($data)
        {
                $directory = '../assets/product_images/';
                $target_file = $directory . $_FILES['product_image']['name'];
                $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
                $file_size = $_FILES['product_image']['size'];
                $image = getimagesize($_FILES['product_image']['tmp_name']);
                if ($image) {
                        if (file_exists($target_file)) {
                                die('This image already exists');
                        } else {
                                if ($file_size > 5242880) {
                                        die('File sise is too large');
                                } else {
                                        if ($file_type != 'jpg' && $file_type != 'png') {
                                                die('File type is not valid');
                                        } else {
                                                $sql = "INSERT INTO tbl_product (product_name, product_sku, product_type, category_id, 
        manufacturer_id, product_price, stock_amount, minimum_stock_amount, product_short_description, product_long_description, 
        product_image, is_featured, product_cost, allow_review, publication_status, admin_id, branch_id) VALUES ('$data[product_name]','$data[product_sku]',
        '$data[product_type]', '$data[category_id]', '$data[manufacturer_id]', '$data[product_price]', '$data[stock_amount]', 
        '$data[minimum_stock_amount]', '$data[product_short_description]', '$data[product_long_description]', '$target_file', 
        '$data[is_featured]', '$data[product_cost]', '$data[allow_review]', '$data[publication_status]', '$data[admin_id]', '$data[branch_id]' )";

                                                if (mysqli_query($this->db_connect, $sql)) {
                                                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                                                        $message = "Product info save successfully";
                                                        return $message;
                                                } else {
                                                        die('Query problem' . mysqli_error($this->db_connect));
                                                }
                                        }
                                }
                        }
                } else {
                        die('This upload file not an image. Please use a image file');
                }
        }


        public function update_product_info($data)
        {
                $sql = "UPDATE tbl_product SET product_name='$data[product_name]', category_id='$data[category_id]', 
manufacturer_id='$data[manufacturer_id]', product_price='$data[product_price]', stock_amount='$data[stock_amount]', 
minimum_stock_amount='$data[minimum_stock_amount]', product_short_description='$data[product_short_description]', 
product_long_description='$data[product_long_description]', product_type='$data[product_type]', 
publication_status='$data[publication_status]', product_cost='$data[product_cost]', allow_review='$data[allow_review]',
is_featured='$data[is_featured]' WHERE product_id='$data[product_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = 'Product info update successfully';
                        if ($data['product_type'] == 0) {
                                header('Location: manage_product.php');
                        } else {
                                header('Location: manage_accessories.php');
                        }

                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        /* PRODUCT INFO */
        public function select_all_product_info()
        {
                $sql = "SELECT p.product_id, p.product_image, p.product_sku, p.product_name, p.category_id, p.manufacturer_id, p.product_price, p.stock_amount, p.publication_status, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_product_info_by_type_accessories()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT p.product_id, p.product_image, p.product_sku, p.product_name, p.category_id, p.manufacturer_id, p.product_price, p.stock_amount, p.minimum_stock_amount, p.publication_status, c.category_name, m.manufacturer_name 
FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m
WHERE p.category_id=c.category_id 
AND p.manufacturer_id=m.manufacturer_id 
AND p.product_type=1 
AND p.branch_id = $branch_id
ORDER BY p.product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_product_info_by_type_accessories_sa()
        {
                $sql = "SELECT p.product_id, p.product_image, p.product_sku, p.product_name, p.category_id, p.manufacturer_id, p.product_price, p.stock_amount, p.minimum_stock_amount, p.publication_status, c.category_name, m.manufacturer_name, b.branch_name
FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m, tbl_branch as b
WHERE p.category_id=c.category_id 
AND p.manufacturer_id=m.manufacturer_id 
AND p.branch_id = b.branch_id
AND p.product_type=1 
ORDER BY p.product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_product_info_by_type_bike()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT p.product_id, p.product_image, p.product_sku, p.product_name, p.category_id, p.manufacturer_id, p.product_price, p.stock_amount, p.minimum_stock_amount, p.publication_status, c.category_name, m.manufacturer_name 
                      FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m
                      WHERE p.category_id=c.category_id 
                      AND p.manufacturer_id=m.manufacturer_id 
                      AND p.product_type=0 
                      AND p.branch_id=$branch_id
                      ORDER BY p.product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_product_info_by_type_bike_sa()
        {
                $sql = "SELECT p.product_id, p.product_image, p.product_sku, p.product_name, p.category_id, p.manufacturer_id, p.product_price, p.stock_amount, p.minimum_stock_amount, p.publication_status, c.category_name, m.manufacturer_name, b.branch_name 
                      FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m, tbl_branch as b 
                      WHERE p.category_id=c.category_id 
                      AND p.manufacturer_id=m.manufacturer_id
                      AND p.branch_id = b.branch_id 
                      AND p.product_type=0 
                      ORDER BY p.product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_sales_report_bike()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT *, SUM(product_quantity) AS \"TotalQuantity\"
FROM tbl_order_details as od, tbl_branch as b, tbl_product as p
WHERE p.branch_id = b.branch_id
AND od.product_id = p.product_id
AND p.product_type=0
AND p.branch_id ='$branch_id'
GROUP BY od.product_id
ORDER BY SUM(product_quantity) DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_sales_report_bike_sa()
        {
                $sql = "SELECT *, SUM(product_quantity) AS \"TotalQuantity\"
FROM tbl_order_details as od, tbl_branch as b, tbl_product as p
WHERE p.branch_id = b.branch_id
AND od.product_id = p.product_id
AND p.product_type=0
GROUP BY od.product_id
ORDER BY SUM(product_quantity) DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_sales_report_acc()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT *, SUM(product_quantity) AS \"TotalQuantity\"
FROM tbl_order_details as od, tbl_branch as b, tbl_product as p
WHERE p.branch_id = b.branch_id
AND od.product_id = p.product_id
AND p.product_type=1
AND p.branch_id ='$branch_id'
GROUP BY od.product_id
ORDER BY SUM(product_quantity) DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_sales_report_acc_sa()
        {
                $sql = "SELECT *, SUM(product_quantity) AS \"TotalQuantity\"
FROM tbl_order_details as od, tbl_branch as b, tbl_product as p
WHERE p.branch_id = b.branch_id
AND od.product_id = p.product_id
AND p.product_type=1
GROUP BY od.product_id
ORDER BY SUM(product_quantity) DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_branch_info()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT branch_name FROM `tbl_branch` WHERE branch_id = $branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function select_branch_info_all()
        {
                $sql = 'SELECT * FROM tbl_branch where branch_type=0';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_branch_result = mysqli_query($this->db_connect, $sql);
                        return $query_branch_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        /* ACCESSORIES INFO */
        public function select_all_accessories_info()
        {
                $sql = "SELECT p.product_id, p.product_image, p.product_sku, p.product_name, p.category_id, p.manufacturer_id, p.product_price, p.stock_amount, p.publication_status, c.category_name, m.manufacturer_name FROM tbl_accessories as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        /* product */
        public function select_product_info_by_id($product_id)
        {
                $sql = "SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        /* rent */
        public function select_rent_info_by_id($product_id)
        {
                $sql = "SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_rent as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.rent_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function unpublished_product_by_id($product_id)
        {
                $sql = "UPDATE tbl_product SET publication_status=0 WHERE product_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Product info unpublished successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function cancel_product_by_id($order_id_id)
        {
                $sql = "UPDATE tbl_order SET order_status='cancelled' WHERE order_id='$order_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {


                        $bn = "select * from tbl_order_details where order_id='$order_id_id'";
                        if (mysqli_query($this->db_connect, $bn)) {

                                $query_result = mysqli_query($this->db_connect, $bn);
                                $data = mysqli_fetch_assoc($query_result);
                                $product_name = $data['product_name'];
                                $product_price = $data['product_price'];
                                $product_quantity = $data['product_quantity'];
                                $total_bill = $product_price * $product_quantity;
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        include '/home/rubefzqu/cholobike.rubelmahmud.me/admin/pages/mail_sender.php';

                        $bn2 = "SELECT * 
                                FROM tbl_order as r, tbl_customer as c
                                WHERE r.customer_id = c.customer_id
                                AND r.order_id = '$order_id_id'";
                        if (mysqli_query($this->db_connect, $bn2)) {

                                $query_result = mysqli_query($this->db_connect, $bn2);
                                $data = mysqli_fetch_assoc($query_result);
                                $customer_name = $data['first_name'];
                                $email_address = $data['email_address'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }


                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your order has been cancelled. <br><br> 
                      Cancelling reason: <b>Unknown</b> , please contact our support. <br><br> 
                   <u>Your order info:</u>  <br>
                    Order ID: <b>' . $order_id_id . '</b> <br>
                    Product name: <b>' . $product_name . '</b> <br>
                    Product price: <b>' . $product_price . '</b> <br>
                    Product qty: <b>' . $product_quantity . '</b> <br>
                    Total bill: <b>' . $total_bill . '</b> <br><br>    
                    Happy Cycling ... :)  <br><br> 
                    Thanks for choosing us. <br> 
                    <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Order Cancelled';
                        // notification
                        $mail->addAddress($email_address);

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {

                        }


                        $message = "Order has been cancelled";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function return_product_by_id($order_id_id)
        {
                $sql = "UPDATE tbl_order SET order_status='return' WHERE order_id='$order_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {

                        $qty = "SELECT od.product_id, od.product_quantity, p.stock_amount FROM tbl_order_details as od, tbl_product as p WHERE od.product_id = p.product_id AND od.order_id ='$order_id_id'";
                        $query_qty = mysqli_query($this->db_connect, $qty);
                        if ($query_qty){

                                while ($data=mysqli_fetch_assoc($query_qty)) {
                                        $product_id = $data['product_id'];
                                        $product_qty = $data['product_quantity'];
                                        $stock = $data['stock_amount'];
                                        $newqty = $stock + $product_qty;

                                        $sqlqty = "UPDATE tbl_product SET stock_amount ='$newqty' WHERE product_id='$product_id' ";
                                        $query_q = mysqli_query($this->db_connect, $sqlqty);
                                }
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        $bn = "select * from tbl_order_details where order_id='$order_id_id'";
                        if (mysqli_query($this->db_connect, $bn)) {

                                $query_result = mysqli_query($this->db_connect, $bn);
                                $data = mysqli_fetch_assoc($query_result);
                                $product_name = $data['product_name'];
                                $product_price = $data['product_price'];
                                $product_quantity = $data['product_quantity'];
                                $total_bill = $product_price * $product_quantity;
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        include '/home/rubefzqu/cholobike.rubelmahmud.me/admin/pages/mail_sender.php';

                        $bn2 = "SELECT * 
                                FROM tbl_order as r, tbl_customer as c
                                WHERE r.customer_id = c.customer_id
                                AND r.order_id = '$order_id_id'";
                        if (mysqli_query($this->db_connect, $bn2)) {

                                $query_result = mysqli_query($this->db_connect, $bn2);
                                $data = mysqli_fetch_assoc($query_result);
                                $customer_name = $data['first_name'];
                                $email_address = $data['email_address'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }


                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your order return has been approved. <br><br> We are really sorry for any inconvenience <br><br> 
              
                   <br><u>Order return reference:</u>  <br>
                    Order ID: <b>' . $order_id_id . '</b> <br>
                    Product name: <b>' . $product_name . '</b> <br>
                    Product price: <b>' . $product_price . '</b> <br>
                    Product qty: <b>' . $product_quantity . '</b> <br>
                    Total bill: <b>' . $total_bill . '</b> <br><br>    
                    Happy Cycling ... :)  <br><br> 
                    Thanks for choosing us. <br> 
                    <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Order Return Info';
                        // notification
                        $mail->addAddress($email_address);

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {

                        }

                        $message = "Product returned";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function approved_product_by_id($order_id_id)
        {
                $sql = "UPDATE tbl_order SET order_status='approved' WHERE order_id='$order_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {

                        $qty = "SELECT od.product_id, od.product_quantity, p.stock_amount FROM tbl_order_details as od, tbl_product as p WHERE od.product_id = p.product_id AND od.order_id ='$order_id_id'";
                        $query_qty = mysqli_query($this->db_connect, $qty);
                        if ($query_qty){

                                while ($data=mysqli_fetch_assoc($query_qty)) {
                                        $product_id = $data['product_id'];
                                        $product_qty = $data['product_quantity'];
                                        $stock = $data['stock_amount'];
                                        $newqty = $stock - $product_qty;

                                        $sqlqty = "UPDATE tbl_product SET stock_amount ='$newqty' WHERE product_id='$product_id' ";
                                        $query_q = mysqli_query($this->db_connect, $sqlqty);
                                }
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        $bn = "select * from tbl_order_details where order_id='$order_id_id'";
                        if (mysqli_query($this->db_connect, $bn)) {

                                $query_result = mysqli_query($this->db_connect, $bn);
                                $data = mysqli_fetch_assoc($query_result);
                                $product_name = $data['product_name'];
                                $product_price = $data['product_price'];
                                $product_quantity = $data['product_quantity'];
                                $total_bill = $product_price * $product_quantity;
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        include '/home/rubefzqu/cholobike.rubelmahmud.me/admin/pages/mail_sender.php';

                        $bn2 = "SELECT * 
                                FROM tbl_order as r, tbl_customer as c
                                WHERE r.customer_id = c.customer_id
                                AND r.order_id = '$order_id_id'";
                        if (mysqli_query($this->db_connect, $bn2)) {

                                $query_result = mysqli_query($this->db_connect, $bn2);
                                $data = mysqli_fetch_assoc($query_result);
                                $customer_name = $data['first_name'];
                                $email_address = $data['email_address'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }


                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your order has been approved. <br><br> Your product is on the way to your home <br><br> 
                   <u>Your order info:</u>  <br>
                    Order ID: <b>' . $order_id_id . '</b> <br>
                    Product name: <b>' . $product_name . '</b> <br>
                    Product price: <b>' . $product_price . '</b> <br>
                    Product qty: <b>' . $product_quantity . '</b> <br>
                    Total bill: <b>' . $total_bill . '</b> <br><br>    
                    Happy Cycling ... :)  <br><br> 
                    Thanks for choosing us. <br> 
                    <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Order Request Approved';
                        // notification
                        $mail->addAddress($email_address);

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {

                        }

                        $message = "Product approved successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function approved_rent_by_id($rent_id_id)
        {
                $sql = "UPDATE tbl_rental_order SET rent_order_status='1' WHERE rent_order_id='$rent_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {

                        $bn = "select * from tbl_rental_order_details where rent_order_id='$rent_id_id'";
                        if (mysqli_query($this->db_connect, $bn)) {

                                $query_result = mysqli_query($this->db_connect, $bn);
                                $data = mysqli_fetch_assoc($query_result);
                                $bike_number = $data['bike_number'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        include '/home/rubefzqu/cholobike.rubelmahmud.me/admin/pages/mail_sender.php';

                        $bn2 = "SELECT * 
                                       FROM tbl_rental_order as r, tbl_customer as c
                                       WHERE r.customer_id = c.customer_id
                                       AND r.rent_order_id = '$rent_id_id'";
                        if (mysqli_query($this->db_connect, $bn2)) {

                                $query_result = mysqli_query($this->db_connect, $bn2);
                                $data = mysqli_fetch_assoc($query_result);
                                $customer_name = $data['first_name'];
                                $email_address = $data['email_address'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your ride has been started. <br><br> Your cycle number is: <b>' . $bike_number . '</b> <br><br> Happy Cycling ... :)  <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Ride Started';
                        // notification
                        $mail->addAddress($email_address);

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {

                        }


                        $message = "Rent request has been approved successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function cancelled_rent_by_id($rent_id_id)
        {
                $sql = "UPDATE tbl_rental_order SET rent_order_status='3' WHERE rent_order_id='$rent_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {


                        include '/home/rubefzqu/cholobike.rubelmahmud.me/admin/pages/mail_sender.php';

                        $bn2 = "SELECT * 
                                       FROM tbl_rental_order as r, tbl_customer as c
                                       WHERE r.customer_id = c.customer_id
                                       AND r.rent_order_id = '$rent_id_id'";
                        if (mysqli_query($this->db_connect, $bn2)) {

                                $query_result = mysqli_query($this->db_connect, $bn2);
                                $data = mysqli_fetch_assoc($query_result);
                                $customer_name = $data['first_name'];
                                $email_address = $data['email_address'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your ride request has been cancelled. <br><br> Reason: No bike available right now <br><br> We are extremely sorry for this inconvenience<br><br> Happy Cycling ... :)  <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Ride Cancelled';
                        // notification
                        $mail->addAddress($email_address);

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {

                        }


                        $message = "Rent request has been cancelled";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_bike_status_by_id($bike_number)
        {
                $sql = "UPDATE tbl_rental_bike SET status='1' WHERE bike_number='$bike_number' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Bike status has been changed";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function end_rent_bike_ride($rent_order_id)
        {

                $sql = "SELECT * FROM tbl_rental_order_details as rd WHERE rd.rent_order_id = $rent_order_id";

                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        $data = mysqli_fetch_assoc($query_result);
                        $rent_start = $data['rent_start'];
                        $rent_fare = $data['rent_fare'];
                        $rent_end = date("Y-m-d H:i:s");
                        $total_minutes = round((strtotime($rent_end) - strtotime($rent_start)) / 60);
                        $bike_number = $data['bike_number'];
                        $current_branch_id = $_SESSION["branch_id"];

                        $rent_total_fare = ($total_minutes / 60) * $rent_fare;

                        $sql = "UPDATE tbl_rental_order_details SET rent_total_fare=$rent_total_fare, rent_end='$rent_end',  rent_start='$rent_start'  WHERE rent_order_id=$rent_order_id ";
                        if (mysqli_query($this->db_connect, $sql)) {

                                $bn = "SELECT * 
                                       FROM tbl_rental_order as r, tbl_customer as c
                                       WHERE r.customer_id = c.customer_id
                                       AND r.rent_order_id = '$rent_order_id'";
                                if (mysqli_query($this->db_connect, $bn)) {

                                        $query_result = mysqli_query($this->db_connect, $bn);
                                        $data = mysqli_fetch_assoc($query_result);
                                        $customer_name = $data['first_name'];
                                        $email_address = $data['email_address'];
                                } else {
                                        die('Query problem' . mysqli_error($this->db_connect));
                                }

                                include '/home/rubefzqu/cholobike.rubelmahmud.me/admin/pages/mail_sender.php';


                                /// the message
                                $mail->Body = 'Dear ' . $customer_name . ', <br> Your ride has been closed. <br><br> Ride duration: <b>' . $total_minutes . '</b> minutes. <br><br> Please pay: <b>' . number_format($rent_total_fare, 2) . '</b> bdt. <br><br> Happy Cycling ... :)  <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                                $mail->Subject = 'Ride Closed';
                                // notification
                                $mail->addAddress($email_address);

                                if (!$mail->send()) {
                                        echo 'Mail could not be sent.';
                                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                                } else {

                                }

                                $sql = "UPDATE tbl_rental_bike SET status='0',branch_id='$current_branch_id' WHERE bike_number='$bike_number' ";
                                if (mysqli_query($this->db_connect, $sql)) {

                                } else {
                                        die('Query problem' . mysqli_error($this->db_connect));
                                }

                                $sql = "UPDATE tbl_rental_order SET rent_order_status='2' WHERE rent_order_id='$rent_order_id'";
                                if (mysqli_query($this->db_connect, $sql)) {
                                } else {
                                        die('Query problem' . mysqli_error($this->db_connect));
                                }

                                $message = "Ride closed";
//                                return $message;
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }
//                        var_dump($rent_total_fare);
//                        exit();


                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }


        }

        public function pending_product_by_id($order_id_id)
        {
                $sql = "UPDATE tbl_order SET order_status='pending' WHERE order_id='$order_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Product info unpublished successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function pending_rent_by_id($rent_id_id)
        {
                $sql = "UPDATE tbl_rental_order SET rent_order_status=0 WHERE rent_order_id='$rent_id_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Rent request has been canceled successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function published_product_by_id($product_id)
        {
                $sql = "UPDATE tbl_product SET publication_status=1 WHERE product_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Product info published successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function unpublished_rent_by_id($product_id)
        {
                $sql = "UPDATE tbl_rent SET rent_status=0 WHERE rent_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Product info unpublished successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function published_rent_by_id($product_id)
        {
                $sql = "UPDATE tbl_rent SET rent_status=1 WHERE rent_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Product info published successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function product_approved_by_id($product_id)
        {
                $sql = "UPDATE tbl_product SET order_status=pending WHERE order_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Product info unpublished successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_order_by_id($product_id)
        {
                $sql = "DELETE FROM tbl_order WHERE order_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'Order info has been deleted';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_rent_by_id($rent_id)
        {
                $sql = "DELETE FROM tbl_rental_order WHERE rent_order_id='$rent_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'Rent request info has been deleted successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_product_by_id($product_id)
        {
                $sql = "DELETE FROM tbl_product WHERE product_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = 'product info delete successfully';
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }



        public function select_all_order_info()
        {
                $sql = "SELECT o.*, c.first_name, c.last_name, p.payment_type, p.payment_status FROM tbl_order as o, tbl_customer as c, tbl_payment as p 
WHERE o.customer_id=c.customer_id AND o.order_id=p.order_id ORDER BY o.order_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_order_info_by_branch()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT o.*, od.*, p.*, c.*, s.*, pay.*
FROM tbl_order as o, tbl_order_details as od, tbl_product as p, tbl_customer as c, tbl_shipping as s, tbl_payment as pay
WHERE o.order_id = od.order_id
AND p.product_id = od.product_id
AND o.customer_id = c.customer_id
AND o.shipping_id = s.shipping_id
AND pay.order_id = o.order_id
AND p.branch_id = $branch_id
ORDER BY p.product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_order_info_by_branch_count()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT COUNT(o.order_id) AS \"total\"
FROM tbl_order as o, tbl_order_details as od, tbl_product as p, tbl_customer as c, tbl_shipping as s, tbl_payment as pay
WHERE o.order_id = od.order_id
AND o.order_status = \"pending\"
AND p.product_id = od.product_id
AND o.customer_id = c.customer_id
AND o.shipping_id = s.shipping_id
AND pay.order_id = o.order_id
AND p.branch_id = $branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function select_all_rent_order_info_by_branch()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT r.rent_order_id, r.rent_order_status,  b.branch_name AS \"from\", b2.branch_name AS \"to\", c.first_name, c.last_name, c.national_id
FROM tbl_rental_order as r, tbl_branch as b, tbl_customer as c, tbl_branch as b2
WHERE r.rent_from = b.branch_id
AND r.rent_to = b2.branch_id
AND r.customer_id = c.customer_id
AND r.rent_from ='$branch_id'
ORDER BY r.rent_order_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

       public function select_all_rent_order_info_by_branch2()
        {
                $sql = "SELECT r.rent_order_id, r.rent_order_status,  b.branch_name AS \"from\", b2.branch_name AS \"to\", c.first_name, c.last_name, c.national_id, rb.bike_number, od.rent_start, od.rent_fare, od.rent_end, od.rent_total_fare
FROM tbl_rental_order as r, tbl_branch as b, tbl_customer as c, tbl_branch as b2, tbl_rental_order_details as od, tbl_rental_bike as rb
WHERE r.rent_from = b.branch_id
AND r.rent_to = b2.branch_id
AND r.customer_id = c.customer_id
AND r.rent_order_id = od.rent_order_id
AND od.bike_number = rb.bike_number
ORDER BY r.rent_order_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_order_info_by_b()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT r.rent_order_id, r.rent_order_status,  b.branch_name AS \"from\", b2.branch_name AS \"to\", c.first_name, c.last_name, c.national_id, rb.bike_number, od.rent_start, od.rent_fare, od.rent_end, od.rent_total_fare
FROM tbl_rental_order as r, tbl_branch as b, tbl_customer as c, tbl_branch as b2, tbl_rental_order_details as od, tbl_rental_bike as rb
WHERE r.rent_from = b.branch_id
AND r.rent_to = b2.branch_id
AND r.customer_id = c.customer_id
AND r.rent_order_id = od.rent_order_id
AND od.bike_number = rb.bike_number
AND r.rent_from = '$branch_id'
ORDER BY od.rent_total_fare DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        
        public function select_all_rental_bike_count_r()
        {

                $sql = "SELECT COUNT(bike_number) AS \"parked\", b.branch_name, b.branch_id
FROM tbl_rental_bike as rb, tbl_branch as b
WHERE status =1
AND rb.branch_id = b.branch_id
AND bike_condition=1
GROUP BY rb.branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rental_bike_count_m()
        {

                $sql = "SELECT COUNT(bike_number) AS \"parked\", b.branch_name, b.branch_id
FROM tbl_rental_bike as rb, tbl_branch as b
WHERE bike_condition =0
AND rb.branch_id = b.branch_id
GROUP BY rb.branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_order_info_by_branch_count()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT count(r.rent_order_id) AS \"total\"
FROM tbl_rental_order as r, tbl_branch as b, tbl_customer as c, tbl_branch as b2
WHERE r.rent_from = b.branch_id
AND r.rent_to = b2.branch_id
AND r.rent_order_status = 0
AND r.customer_id = c.customer_id
AND r.rent_from ='$branch_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_order_approved_info_by_branch_sa()
        {
                $rent_order_id = $_GET['id'];
                $sql = "SELECT rb.bike_number, b.branch_name, r.rent_order_id, r.rent_order_status
FROM tbl_rental_bike as rb, tbl_rental_order as r, tbl_branch as b
WHERE rb.branch_id = r.rent_from
AND r.rent_order_id=$rent_order_id
AND rb.bike_condition=1
AND rb.status=0
AND rb.branch_id = b.branch_id
ORDER BY r.rent_order_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_order_approved_info_by_branch()
        {
                $rent_order_id = $_GET['id'];
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT rb.bike_number, b.branch_name, r.rent_order_id, r.rent_order_status
FROM tbl_rental_bike as rb, tbl_rental_order as r, tbl_branch as b
WHERE rb.branch_id = r.rent_from
AND r.rent_order_id=$rent_order_id
AND rb.bike_condition=1
AND rb.status=0
AND rb.branch_id = b.branch_id
AND rb.branch_id = '$branch_id'
ORDER BY r.rent_order_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_order_approved_info()
        {
                $rent_order_id = $_GET['id'];
                $sql = "SELECT ro.rent_order_id, b.branch_name AS \"from\", b2.branch_name AS \"to\", c.first_name, c.national_id
FROM tbl_rental_order as ro, tbl_branch as b, tbl_customer as c, tbl_branch as b2
WHERE ro.rent_from = b.branch_id
AND ro.rent_to = b2.branch_id
AND ro.customer_id = c.customer_id
AND ro.rent_order_id='$rent_order_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rent_completed_info()
        {
                $rent_order_id = $_GET['rent_order_id'];
                $sql = "SELECT rod.*, c.first_name, b.branch_name AS \"From\", b2.branch_name AS \"To\"
FROM tbl_rental_order_details as rod, tbl_rental_order as rd, tbl_branch as b, tbl_branch as b2, tbl_customer as c
WHERE rod.rent_order_id = rd.rent_order_id
AND rd.rent_from = b.branch_id
AND rd.rent_to = b2.branch_id
AND rd.customer_id = c.customer_id
AND rod.rent_order_id ='$rent_order_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_rental_bike_count_branch()
        {

                $sql = "SELECT COUNT(bike_number) AS \"parked\", b.branch_name, b.branch_id
FROM tbl_rental_bike as rb, tbl_branch as b
WHERE status =0
AND rb.branch_id = b.branch_id
AND bike_condition=1
GROUP BY rb.branch_id";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_branch_name()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT branch_name from tbl_branch
Where branch_id ='$branch_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_b = mysqli_query($this->db_connect, $sql);
                        return $query_b;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_order_info_by_branch_order_id()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT o.order_id
FROM tbl_order_details as od, tbl_product as p, tbl_order as o
WHERE o.order_id = od.order_id
AND od.product_id = p.product_id
AND p.branch_id ='$branch_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_order_branch_info_by_order_id($order_id)
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT tbl_order.order_id from tbl_order_details,tbl_order,tbl_product where tbl_order_details.order_id=tbl_order.order_id and tbl_order_details.product_id=tbl_product.product_id and tbl_product.branch_id='$branch_id' and tbl_order.order_id='$order_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function select_customer_info_by_order_id($order_id)
        {
                $sql = "SELECT o.order_id, o.customer_id, c.* FROM tbl_order as o, tbl_customer as c WHERE o.customer_id=c.customer_id AND o.order_id='$order_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_shipping_info_by_order_id($order_id)
        {
                $sql = "SELECT o.order_id, o.shipping_id, s.* FROM tbl_order as o, tbl_shipping as s WHERE o.shipping_id=s.shipping_id AND o.order_id='$order_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_payment_info_by_order_id($order_id)
        {
                $sql = "SELECT o.order_id,  p.* FROM tbl_order as o, tbl_payment as p WHERE o.order_id=p.order_id AND o.order_id='$order_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_product_info_by_order_id($order_id)
        {
                $sql = "SELECT od.*, o.order_total FROM tbl_order_details as od, tbl_order as o WHERE od.order_id = o.order_id
                          AND o.order_id='$order_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_order_info_by_order_id($order_id)
        {
                $sql = "SELECT * from tbl_order where order_id='$order_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_customer_info()
        {
                $sql = "SELECT * FROM tbl_customer";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_max_customer_info()
        {
                $sql = "SELECT *, SUM(o.customer_id) AS \"total_purchased\", SUM(order_total) AS \"total_order_amount\"
FROM tbl_order as o, tbl_customer as c
WHERE o.customer_id = c.customer_id
AND o.order_status =\"approved\"
GROUP BY o.customer_id
ORDER BY SUM(o.customer_id) DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function count_product_bike_info_sa()
        {
                $sql = "SELECT COUNT(product_id) AS \"total\" FROM tbl_product where product_type=0 and publication_status=1";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        public function count_product_bike_info()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT COUNT(product_id) AS \"total\" FROM tbl_product where product_type=0 and publication_status=1 and branch_id='$branch_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function count_product_acc_info_sa()
        {
                $sql = "SELECT COUNT(product_id) AS \"total\" FROM tbl_product where product_type=1 and publication_status=1";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function count_product_acc_info()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT COUNT(product_id) AS \"total\" FROM tbl_product where product_type=1 and publication_status=1 and branch_id='$branch_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function count_rental_bike_info_sa()
        {
                $sql = "SELECT COUNT(bike_id) AS \"total\" FROM tbl_rental_bike where bike_condition=1 and status=0";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function count_rental_bike_info()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT COUNT(bike_id) AS \"total\" FROM tbl_rental_bike where bike_condition=1 and status=0 and branch_id='$branch_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function count_unread_query_info()
        {
                $branch_id = $_SESSION['branch_id'];
                $sql = "SELECT COUNT(enquiry_id) AS \"total\" FROM tbl_enquiry, tbl_product where status=0 AND tbl_enquiry.product_id = tbl_product.product_id AND tbl_product.branch_id='$branch_id'";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function count_unread_query_info_sa()
        {
                $sql = "SELECT COUNT(sms_id) AS \"total\" FROM tbl_contact where status=0 ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function count_admin_info_sa()
        {
                $sql = "SELECT COUNT(admin_id) AS \"total\" FROM tbl_admin where admin_type=0";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        public function count_branch_info_sa()
        {
                $sql = "SELECT COUNT(branch_id) AS \"total\" FROM tbl_branch where branch_type=0";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function select_subscribers_info()
        {
                $sql = "SELECT * FROM tbl_subscribe";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function logout()
        {
                unset($_SESSION['admin_name']);
                unset($_SESSION['admin_id']);

                header('Location: index.php');
        }
}
