<?php
// database credentials
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'eco');

// create database connection
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// check if connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>