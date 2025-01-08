<?php
// Include the database connection
include('db.php');

// Start the session to access session variables
session_start();

// Check if the user is logged in by checking the session for user ID
if (isset($_SESSION['user_id'])) {
    // Capture the posted data (values from the form)
    $total_services = mysqli_real_escape_string($conn, $_POST['total_services']);
    $total_bookings = mysqli_real_escape_string($conn, $_POST['total_bookings']);
    $upcoming_events = mysqli_real_escape_string($conn, $_POST['upcoming_events']);
    $total_earnings = mysqli_real_escape_string($conn, $_POST['total_earnings']);

    // Get the user_id from the session
    $user_id = $_SESSION['user_id'];

    // SQL query to update data for the logged-in user
    $sql = "UPDATE service_provider SET 
            total_services = '$total_services', 
            total_bookings = '$total_bookings', 
            upcoming_events = '$upcoming_events', 
            total_earnings = '$total_earnings'
            WHERE user_id = '$user_id'";  // Use the user ID from session

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // If no user is logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>
