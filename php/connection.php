<?php
// connect to localhost, root username and food_ordering_system as database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'food_ordering_system';
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}