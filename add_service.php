<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the data from the form
    $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $service_category = mysqli_real_escape_string($conn, $_POST['service_category']);
    $service_price = mysqli_real_escape_string($conn, $_POST['service_price']);
    $service_description = mysqli_real_escape_string($conn, $_POST['service_description']);

    // Insert into database
    $sql = "INSERT INTO services (service_name, service_category, service_price, service_description)
            VALUES ('$service_name', '$service_category', '$service_price', '$service_description')";

    if ($conn->query($sql) === TRUE) {
        echo "New service added successfully!";
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
