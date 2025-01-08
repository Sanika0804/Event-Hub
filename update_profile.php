<?php
include('db.php');
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to update your profile.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture and sanitize form inputs
    $username = mysqli_real_escape_string($conn, $_POST['provider_name']);
    $email = mysqli_real_escape_string($conn, $_POST['provider_email']);
    $contact = mysqli_real_escape_string($conn, $_POST['provider_contact']);
    $password = mysqli_real_escape_string($conn, $_POST['provider_password']);

    // Validate required fields
    if (empty($username) || empty($email) || empty($contact)) {
        echo "Name, email, and contact are required.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Base update query
    $update_query = "UPDATE users SET username = '$username', email = '$email', contact = '$contact'";
    
    // If password is provided, hash it and include in the update
    if (!empty($password)) {
        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long.";
            exit();
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_query .= ", password = '$hashed_password'";
    }

    // Add condition to update the currently logged-in user
    $update_query .= " WHERE id = {$_SESSION['user_id']}";

    // Execute the update query
    if ($conn->query($update_query) === TRUE) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>


