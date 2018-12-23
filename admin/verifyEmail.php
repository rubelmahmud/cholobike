<?php
// email verify AJAX reply
$email_address = $_GET['email_address'];
include '..\pages\connection.php';
$conn = connect();
//2. generate query to select all data from db table
$sql = "SELECT email_address FROM tbl_admin WHERE email_address='$email_address'";

//3. execute query to get result
$result = $conn->query($sql);

var_dump($result);

if($result->num_rows > 0){
        echo 1;
}else{
        echo 0;
}