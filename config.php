<?php
// Database connection parameters
$DB_HOST = 'vconroy.cs.uleth.ca';
$DB_USER = 'ward3660';
$DB_PASS = 'qzegwe'; // blank or new_password
$DB_NAME = 'ward3660'; // database instance name

$conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
?>