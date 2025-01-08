<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $address = $role == 'customer' ? mysqli_real_escape_string($conn, $_POST['customer-address']) : '';
    $phone = $role == 'customer' ? mysqli_real_escape_string($conn, $_POST['customer-phone']) : '';
    $company_name = $role == 'service_provider' ? mysqli_real_escape_string($conn, $_POST['company-name']) : '';
    $service_type = $role == 'service_provider' ? mysqli_real_escape_string($conn, $_POST['service-type']) : '';
    $website = $role == 'service_provider' ? mysqli_real_escape_string($conn, $_POST['company-website']) : '';
    $service_category = $role == 'service_provider' ? mysqli_real_escape_string($conn, $_POST['service-category']) : '';

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $sql = "INSERT INTO users (username, email, comtact, password, role, address, phone, company_name, service_type, website, service_category)
                VALUES ('$username', '$email', '$contact', '$hashed_password', '$role', '$address', '$phone', '$company_name', '$service_type', '$website','$service_category')";

        if ($conn->query($sql) === TRUE) {    
            // After successful registration, redirect to dashboard
            session_start();
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['role'] = $role;

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
