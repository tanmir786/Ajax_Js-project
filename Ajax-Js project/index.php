<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdowns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* style.css */
body {
    background: linear-gradient(135deg, #00bfa5, #4285f4);
    color: #fff;
    font-family: 'Roboto', sans-serif;
    transition: background 0.5s ease-in-out;
}

h5 {
    color: #ffffff;
    font-weight: bold;
}

.form-control {
    background: rgba(255, 255, 255, 0.8);
    color: #000;
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background 0.3s, transform 0.3s ease;
}

.form-control:focus {
    background: rgba(255, 255, 255, 1);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.container {
    background: rgba(0, 0, 0, 0.3);
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

select {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <h5>Select Country</h5>
        <select class="form-control w-26" id="countryId" onchange="loadOptions('city', this.value)">
            <option disabled selected>Select Country</option>
            <?php
            $query = mysqli_query($con, "SELECT * FROM countries");
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<option value="' . $row['id'] . '">' . $row['country_name'] . '</option>';
            }
            ?>
        </select>

        <h5 class="mt-3">Select City</h5>
        <select class="form-control w-26" id="cityId" onchange="loadOptions('location', this.value)">
            <option disabled selected>Select City</option>
        </select>

        <h5 class="mt-3">Select Location</h5>
        <select class="form-control w-26" id="locationId">
            <option disabled selected>Select Location</option>
        </select>
    </div>

    <script>
    function loadOptions(type, id) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if (type === 'city') {
                    document.getElementById('cityId').innerHTML = this.responseText;
                    // Reset location dropdown
                    document.getElementById('locationId').innerHTML = '<option disabled selected>Select Location</option>';
                } else if (type === 'location') {
                    document.getElementById('locationId').innerHTML = this.responseText;
                }
            }
        };
        xhttp.open('GET', 'loadData.php?type=' + type + '&id=' + id, true);
        xhttp.send();
    }
    </script>
</body>
</html>



