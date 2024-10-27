<?php
include 'db.php';

$type = $_GET['type'];
$id = $_GET['id'];

if ($type == 'city') {
    $query = mysqli_query($con, "SELECT * FROM cities WHERE country_id = '$id'");
    echo '<option disabled selected>Select City</option>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row['id'] . '">' . $row['city_name'] . '</option>';
    }
} elseif ($type == 'location') {
    $query = mysqli_query($con, "SELECT * FROM locations WHERE city_id = '$id'");
    echo '<option disabled selected>Select Location</option>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row['id'] . '">' . $row['location_name'] . '</option>';
    }
}





