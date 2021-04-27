<?php 
    //Start session
    session_start();

//Create constant to store non repeating values
define('SITEURL', 'http://localhost:8888/food-order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'jonathan');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'food-order');

//3. Execute Query and save data in database

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connection  /THIS LINE SHOWING ERROR
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting database
 

?>