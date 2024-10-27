<?php
// Database connection settings
$con = mysqli_connect("localhost", "root", "", "location_db");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}





