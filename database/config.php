<?php
$host = 'localhost';
$dbname = 'quickcart'; // to be filled
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    echo "Error: " . mysqli_connect_error();
}

define('BASE_URL', 'http://localhost/Quick-Cart/');
