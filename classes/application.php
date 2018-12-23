<?php

class Application
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

        public function select_all_published_category()
        {
                $sql = 'SELECT * FROM tbl_category WHERE publication_status = 1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_published_category_by_type_bike()
        {
                $sql = 'SELECT * FROM tbl_category WHERE category_type = "Bike" AND publication_status = 1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_published_category_by_type_accessories()
        {
                $sql = 'SELECT * FROM tbl_category WHERE category_type = "Accessories" AND publication_status = 1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_published_category_by_type_accessories_count()
        {
                $sql = 'SELECT *, COUNT(product_id) as total
                      FROM tbl_category as c, tbl_product as a
                      where c.category_id = a.category_id
                      AND c.publication_status = 1
                      AND c.category_type= "Accessories"
                      group by c.category_name';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_categories_by_id($category_id)
        {
                $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function save_sms_info($data) {
                $sql="INSERT INTO tbl_contact (first_name, last_name, email_address, phone_number, sms) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]', '$data[phone_number]', '$data[sms]' )";
                if(mysqli_query($this->db_connect, $sql)) {
                        $message="Your message sent successfully, we will reply you shortly!";
                        return $message;
                } else {
                        die('Query problem'.  mysqli_error($this->db_connect) );
                }
        }

        public function save_enquiry_info($data) {
                $sql="INSERT INTO tbl_enquiry (name, email, enquiry, product_id) VALUES ('$data[name]', '$data[email]', '$data[enquiry]', '$data[product_id]' )";
                if(mysqli_query($this->db_connect, $sql)) {
                        $message="Your message sent successfully, we will reply you shortly!";
                        return $message;
                } else {
                        die('Query problem'.  mysqli_error($this->db_connect) );
                }
        }
        public function save_subscribe_info($data) {
                $sql="INSERT INTO tbl_subscribe (email) VALUES ('$data[email]')";
                if(mysqli_query($this->db_connect, $sql)) {
                        $message="Your message sent successfully, we will reply you shortly!";
                        return $message;
                } else {
                        die('Query problem'.  mysqli_error($this->db_connect) );
                }
        }

        public function select_all_published_mannufacturer()
        {
                $sql = 'SELECT * FROM tbl_manufacturer WHERE publication_status = 1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_mannufacturer_by_id($brand_id)
        {
                $sql = "SELECT * FROM tbl_manufacturer WHERE manufacturer_id='$brand_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_published_mannufacturer_name_count()
        {
                $sql = 'SELECT *, COUNT(product_id) as total
                FROM tbl_manufacturer as m, tbl_product as p
                where m.manufacturer_id = p.manufacturer_id
                AND p.publication_status = 1
                group by m.manufacturer_name limit 10';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_published_mannufacturer_by_type_bike()
        {
                $sql = 'SELECT * FROM tbl_manufacturer WHERE manufacturer_type = "Bike" AND publication_status = 1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_all_published_mannufacturer_by_type_accessories()
        {
                $sql = 'SELECT * FROM tbl_manufacturer WHERE manufacturer_type = "Accessories" AND publication_status = 1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        /* ALL PRODUCT INFO */

        public function select_latest_product_info()
        {
                $sql = 'SELECT * FROM tbl_product WHERE publication_status = 1 and product_type=0 ORDER BY product_id DESC LIMIT 15';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_latest_accessories_info()
        {
                $sql = 'SELECT * FROM tbl_product WHERE publication_status = 1 and product_type=1 ORDER BY product_id DESC LIMIT 15';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_latest_featured_product_info_home()
        {
                $sql = 'SELECT * FROM tbl_product WHERE publication_status = 1 and product_type=0 AND is_featured=1 ORDER BY product_id DESC LIMIT 6';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_nonfeatured_product_info_home()
        {
                $sql = 'SELECT * FROM tbl_product WHERE publication_status = 1 and product_type=0 AND is_featured=0 ORDER BY product_id DESC LIMIT 6';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_latest_product_info_by_type()
        {
                $sql = 'SELECT * FROM tbl_product WHERE publication_status = 1 and product_type=1 ORDER BY product_id DESC LIMIT 3';
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
                $sql = "SELECT p.*, c.category_name, m.manufacturer_name, b.branch_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m, tbl_branch as b WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.branch_id=b.branch_id AND product_id='$product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function add_to_cart($data)
        {
                $product_id = $data['product_id'];
                $sql = "SELECT product_name, product_price, product_image FROM tbl_product WHERE product_id='$product_id' ";
                $query_result = mysqli_query($this->db_connect, $sql);
                $product_info = mysqli_fetch_assoc($query_result);
                session_start();
                $session_id = session_id();

                $sql = "INSERT INTO tbl_temp_cart (session_id, product_id, product_name, product_price, product_quantity, product_image) VALUES ('$session_id', '$product_id', '$product_info[product_name]', '$product_info[product_price]', '$data[product_quantity]', '$product_info[product_image]')";
                mysqli_query($this->db_connect, $sql);

                header('Location: cart.php');
        }

        public function select_cart_product_by_session_id($session_id)
        {
                $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_rent_cost()
        {
                $sql = "SELECT * FROM tbl_rent_cost";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function update_cart_product_info($data)
        {

                $sql = "UPDATE tbl_temp_cart SET product_quantity='$data[product_quantity]' WHERE temp_cart_id='$data[temp_cart_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Cart product info update successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function delete_cart_product_info_by_id($cart_product_id)
        {
                $sql = "DELETE FROM tbl_temp_cart WHERE temp_cart_id='$cart_product_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $message = "Cart product info delete successfully";
                        return $message;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_published_product_info_by_category_id($category_id)
        {
                $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id' AND publication_status=1 ORDER BY product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_published_product_info_by_brand_id($brand_id)
        {
                $sql = "SELECT * FROM tbl_product WHERE manufacturer_id='$brand_id' AND publication_status=1 ORDER BY product_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function save_customer_info($data)
        {
                $password = md5($data['password']);
                $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, phone_number, national_id, blood_group, address, city, district) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]' ,'$password', '$data[phone_number]', '$data[national_id]', '$data[blood_group]', '$data[address]', '$data[city]', '$data[district]')";
                if (mysqli_query($this->db_connect, $sql)) {
                        $customer_id = mysqli_insert_id($this->db_connect);
                        //session_start();
                        $_SESSION['customer_id'] = $customer_id;
                        $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
                        $_SESSION['email_address'] = $data['email_address'];
                        $email_address =$_SESSION['email_address'];
                        $customer_name = $_SESSION['customer_name'];

        
    
                        require '/home/rubefzqu/cholobike.rubelmahmud.me/pages/mail_sender.php';
                

                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your registration has been completed successfully. <br><br> Now you can order any product from our store & rent cycle anytime. <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Cholo Bike Registration Completed';
                        // notification
                        $mail->addAddress($email_address);
                        
                        

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                                echo 'Mail has been sent, check your inbox/spam please <br><br>';
                        }

                        if ($_GET['pickup'] && $_GET['return'] ){
                                header('Location: bike_rent.php');
                        } elseif ($_GET['grand_total']) {
                                header('Location: cart.php');
                        }
                        else {
                                header('Location: index.php');
                        }

                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        
         public function save_customer_info2($data)
        {
                $password = md5($data['password']);
                $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, phone_number, national_id, blood_group, address, city, district) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]' ,'$password', '$data[phone_number]', '$data[national_id]', '$data[blood_group]', '$data[address]', '$data[city]', '$data[district]')";
                if (mysqli_query($this->db_connect, $sql)) {
                        $customer_id = mysqli_insert_id($this->db_connect);
                        //session_start();
                        $_SESSION['customer_id'] = $customer_id;
                        $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
                        $_SESSION['email_address'] = $data['email_address'];
                        $email_address =$_SESSION['email_address'];
                        $customer_name = $_SESSION['customer_name'];

        
    
                        require '/home/rubefzqu/cholobike.rubelmahmud.me/pages/mail_sender.php';
                

                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> Your registration has been completed successfully. <br><br> Now you can order any product from our store & rent cycle anytime. <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Cholo Bike Registration Completed';
                        // notification
                        $mail->addAddress($email_address);
                        
                        

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                                echo 'Mail has been sent, check your inbox/spam please <br><br>';
                        }

                                header('Location: cart.php');
                    

                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        
        public function download_app($data)
        {
                $sql = "INSERT INTO tbl_app (email_address) VALUES ('$data[email_address]')";
                if (mysqli_query($this->db_connect, $sql)) {
                        
                        $_GET['email_address'] = $data['email_address'];
                        $email_address =$_GET['email_address'];
    
    
                        require '/home/rubefzqu/cholobike.rubelmahmud.me/pages/mail_sender.php';
                

                        /// the message
                        $mail->Body = 'Please <a target="_blank" href="https://cholobike.rubelmahmud.me/assets/cholobike.apk">Click Here</a> to download our app. <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Cholo Bike APP';
                        // notification
                        $mail->addAddress($email_address);
                        
                        

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                                echo 'Mail has been sent, check your inbox/spam please <br><br>';
                      
                                header('Location: bike_rent.php');
                        }
                        
                        $message="Please check your email for the download link of our app.";
                        return $message;

                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function customer_login_check($data)
        {
                $email_address = $data['email_address'];
                $password = md5($data['password']);
                $sql = "SELECT * FROM tbl_customer WHERE email_address='$email_address' AND password='$password' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        $admin_info = mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($admin_info);
//            exit();
                        if ($admin_info) {
                                session_start();
                                $_SESSION['first_name'] = $admin_info['first_name'];
                                $_SESSION['customer_id'] = $admin_info['customer_id'];
                                $_SESSION['email_address'] = $admin_info['email_address'];

                                //$_SESSION['access_level']=$admin_info['access_level'];
                                if($_GET['pickup'] && $_GET['return']) {
                                        header('Location: bike_rent.php');
                                } elseif ($_GET['grand_total']) {
                                        header('Location: cart.php');
                                }
                                else {
                                        header('Location: index.php');
                                }
                        } else {
                                $message = "Your email address or password invalid";
                                return $message;
                        }

                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function customer_login_check2($data)
        {
                $email_address = $data['email_address'];
                $password = md5($data['password']);
                $sql = "SELECT * FROM tbl_customer WHERE email_address='$email_address' AND password='$password' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        $admin_info = mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($admin_info);
//            exit();
                        session_start();
                        if ($admin_info) {
                                $_SESSION['first_name'] = $admin_info['first_name'];
                                $_SESSION['customer_id'] = $admin_info['customer_id'];
                                //$_SESSION['access_level']=$admin_info['access_level'];

                                header('Location: payment.php');
                        } else {
                                $message = "Your email address or password invalid";
                                return $message;
                        }

                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_customer_status($customer_id)
        {
                $sql = "UPDATE tbl_customer SET activation_status=1 WHERE customer_id='$customer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {

                        header('Location: payment.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function select_customer_info_by_id($customer_id)
        {
                $sql = "SELECT * FROM tbl_customer WHERE customer_id='$customer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function update_customer_info($data)
        {
                $sql = "UPDATE tbl_customer SET first_name='$data[first_name]', last_name='$data[last_name]', email_address='$data[email_address]', phone_number='$data[phone_number]', national_id='$data[national_id]', blood_group='$data[blood_group]', address='$data[address]', city='$data[city]' WHERE customer_id='$data[customer_id]' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $_SESSION['message'] = "Customer info update successfully";
                        header('Location: account_update.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_customer_info()
        {
                $customer_id = $_SESSION['customer_id'];

                $sql = "SELECT * FROM tbl_customer WHERE customer_id='$customer_id' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        
        
        public function select_running_rent_info()
        {
                $customer_id=$_SESSION['customer_id'];
                $sql = "SELECT r.rent_order_id, r.rent_order_status,  b.branch_name AS \"from\", b2.branch_name AS \"to\", rb.bike_number, od.rent_start, od.rent_fare
FROM tbl_rental_order as r, tbl_branch as b, tbl_customer as c, tbl_branch as b2, tbl_rental_order_details as od, tbl_rental_bike as rb
WHERE r.rent_from = b.branch_id
AND r.rent_to = b2.branch_id
AND r.customer_id = c.customer_id
AND r.rent_order_id = od.rent_order_id
AND od.bike_number = rb.bike_number
AND c.customer_id = '$customer_id'
ORDER BY r.rent_order_id DESC";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_order_info()
        {
                $customer_id = $_SESSION['customer_id'];

                $sql = "SELECT * 
FROM tbl_order as o, tbl_order_details as od, tbl_customer as c
WHERE o.order_id = od.order_id
AND o.customer_id = c.customer_id
AND c.customer_id ='$customer_id'
order by o.order_date desc limit 10";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        
         public function select_order_pending_info()
        {
                $customer_id = $_SESSION['customer_id'];

                $sql = "SELECT * 
FROM tbl_order as o, tbl_order_details as od, tbl_customer as c
WHERE o.order_id = od.order_id
AND o.order_status='pending'
AND o.customer_id = c.customer_id
AND c.customer_id ='$customer_id'
order by o.order_date desc limit 10";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_rent_info()
        {
                $customer_id = $_SESSION['customer_id'];

                $sql = "SELECT *, b.branch_name AS \"from\", b2.branch_name AS \"to\", o.rent_order_status
FROM tbl_rental_order as o, tbl_rental_order_details as od, tbl_customer as c, tbl_branch as b, tbl_branch as b2
WHERE o.rent_order_id = od.rent_order_id
AND o.rent_from = b.branch_id
AND o.rent_to = b2.branch_id
AND o.customer_id = c.customer_id
AND c.customer_id ='$customer_id'
order by o.rent_order_time desc limit 10";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function save_shipping_info($data)
        {
                $sql = "INSERT INTO tbl_shipping (full_name, email_address, phone_number, address, city, district) VALUES ('$data[full_name]', '$data[email_address]', '$data[phone_number]', '$data[address]', '$data[city]', '$data[district]')";
                if (mysqli_query($this->db_connect, $sql)) {
                        $shipping_id = mysqli_insert_id($this->db_connect);
                        session_start();
                        $_SESSION['shipping_id'] = $shipping_id;

                        header('Location: payment.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function save_order_info($data)
        {
                $payment_type = $data['payment_type'];
                $trx_id = $data['trx_id'];
                if ($payment_type == 'cash_on_delivery' || 'bKash') {
                        session_start();
                        $customer_id = $_SESSION['customer_id'];
                        $customer_name = $_SESSION['first_name'];
                        $email_address = $_SESSION['email_address'];
                        $shipping_id = $_SESSION['shipping_id'];
                        $order_total = $_SESSION['order_total'];
                        $sql = "INSERT INTO tbl_order (customer_id, shipping_id, order_total) VALUES ('$customer_id', '$shipping_id', '$order_total')";
                        if (mysqli_query($this->db_connect, $sql)) {

                               require '/home/rubefzqu/cholobike.rubelmahmud.me/pages/mail_sender.php';


                                /// the message
                                $mail->Body = 'Dear ' . $customer_name . ', <br> We have just received your order request. <br><br> You will get a confirmation email from us. <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                                $mail->Subject = 'Order Request Received';
                                // notification
                                $mail->addAddress($email_address);

                                if (!$mail->send()) {
                                        echo 'Mail could not be sent.';
                                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                                } else {
                                        echo 'Mail has been sent, check your inbox/spam please <br><br>';
                                }

                                $order_id = mysqli_insert_id($this->db_connect);
                                $sql = "INSERT INTO tbl_payment (order_id, payment_type, trx_id) VALUES ('$order_id', '$payment_type', '$trx_id')";
                                if (mysqli_query($this->db_connect, $sql)) {
                                        $session_id = session_id();
                                        $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id' ";
                                        $query_result = mysqli_query($this->db_connect, $sql);
                                        while ($product_info = mysqli_fetch_assoc($query_result)) {
                                                $sql = "INSERT INTO tbl_order_details (order_id, product_id, product_name, product_price, product_quantity, product_image) VALUES ('$order_id', '$product_info[product_id]', '$product_info[product_name]', '$product_info[product_price]', '$product_info[product_quantity]', '$product_info[product_image]')";
                                                mysqli_query($this->db_connect, $sql);
                                        }
                                        $sql = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id' ";
                                        mysqli_query($this->db_connect, $sql);
                                        unset($_SESSION['order_total']);

                                        header('Location: customer_home.php');
                                } else {
                                        die('Query problem' . mysqli_error($this->db_connect));
                                }
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }
                }
        }

        public function save_rent_info()
        {
                // session_start();
                $customer_id = $_SESSION['customer_id'];
                $email_address =$_SESSION['email_address'];
                $customer_name = $_SESSION['first_name'];

                $pickup = $_GET['pickup'];
                $return = $_GET['return'];


                $sql = "INSERT INTO tbl_rental_order (rent_from, rent_to, customer_id) VALUES ('$pickup', '$return', '$customer_id')";
                if (mysqli_query($this->db_connect, $sql)) {

                        $bn = "select b.branch_name as \"from\", b2.branch_name as \"to\"
                                from tbl_branch as b, tbl_branch as b2 
                                where b.branch_id='$pickup' 
                                AND b2.branch_id='$return'";
                        if (mysqli_query($this->db_connect, $bn)) {

                                $query_result = mysqli_query($this->db_connect, $bn);
                                $data = mysqli_fetch_assoc($query_result);
                                $from = $data['from'];
                                $to = $data['to'];
                        } else {
                                die('Query problem' . mysqli_error($this->db_connect));
                        }

                        require '/home/rubefzqu/cholobike.rubelmahmud.me/pages/mail_sender.php';


                        /// the message
                        $mail->Body = 'Dear ' . $customer_name . ', <br> We have just received your ride request from <b>'.$from.'</b> to <b>' .$to .'</b>. <br><br> Please wait until you will get the confirmation email from us. <br><br> Thanks for choosing us. <br> <b>CHOLO BIKE TEAM</b>';

                        $mail->Subject = 'Cycle Ride Request Received';
                        // notification
                        $mail->addAddress($email_address);

                        if (!$mail->send()) {
                                echo 'Mail could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                                echo 'Mail has been sent, check your inbox/spam please <br><br>';
                        }
                        header('Location: rent_thank_u.php');
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function save_order_approved_info()
        {
                $rent_order_id = $_GET['rent_order_id'];
                $bike_number = $_GET['bike_number'];
                $rent_start = date("Y-m-d H:i:s");
                $sql = "select rent_cost from tbl_rent_cost limit 1";
                if (mysqli_query($this->db_connect, $sql)) {

                        $query_result = mysqli_query($this->db_connect, $sql);
                        $data = mysqli_fetch_assoc($query_result);
                        $rent_cost = $data['rent_cost'];
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }


                $sql = "INSERT INTO tbl_rental_order_details (rent_order_id, bike_number,rent_fare,rent_start) VALUES ('$rent_order_id', '$bike_number', '$rent_cost','$rent_start')";
                if (mysqli_query($this->db_connect, $sql)) {
                        return true;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function customer_email_check($email_address)
        {
                $sql = "SELECT * FROM tbl_customer WHERE email_address='$email_address' ";
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


        public function customer_logout()
        {
                unset($_SESSION['customer_id']);
                unset($_SESSION['customer_name']);
                unset($_SESSION['email_address']);
                unset($_SESSION['shipping_id']);

                header('Location: index.php');

        }


//     ALL PRODUCT INFO 
        public function select_latest_product_info_all()
        {
                $sql = 'SELECT * FROM tbl_product WHERE publication_status = 1 ORDER BY product_id DESC';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_result = mysqli_query($this->db_connect, $sql);
                        return $query_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        //     ALL BRANCH INFO
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

        public function select_rent_bike_count1()
        {
                $sql = 'SELECT COUNT(branch_id) AS \'total\'
FROM `tbl_rental_bike` where branch_id=1 and status=0 and bike_condition=1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_count_result = mysqli_query($this->db_connect, $sql);
                        return $query_count_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }

        public function select_rent_bike_count2()
        {
                $sql = 'SELECT COUNT(branch_id) AS \'total\'
FROM `tbl_rental_bike` where branch_id=2 and status=0 and bike_condition=1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_count_result = mysqli_query($this->db_connect, $sql);
                        return $query_count_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        public function select_rent_bike_count5()
        {
                $sql = 'SELECT COUNT(branch_id) AS \'total\'
FROM `tbl_rental_bike` where branch_id=5 and status=0 and bike_condition=1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_count_result = mysqli_query($this->db_connect, $sql);
                        return $query_count_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }
        public function select_rent_bike_count8()
        {
                $sql = 'SELECT COUNT(branch_id) AS \'total\'
FROM `tbl_rental_bike` where branch_id=8 and status=0 and bike_condition=1';
                if (mysqli_query($this->db_connect, $sql)) {
                        $query_count_result = mysqli_query($this->db_connect, $sql);
                        return $query_count_result;
                } else {
                        die('Query problem' . mysqli_error($this->db_connect));
                }
        }


}
