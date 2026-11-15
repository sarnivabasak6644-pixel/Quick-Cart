<?php
include __DIR__ . '/../database/config.php';

// POST method verification
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request');
}

// Retrieving POST variables
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm-password'] ?? '';
$terms = $_POST['terms'] ?? '';

// Required field validation
if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
    echo "All required fields must be filled. <br>";
    exit;
}

// Terms validation
if ($terms !== 'accepted') {
    echo "You must accept the terms and conditions.";
    exit;
}

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address. <br>";
    exit;
}

// Password validation
if ($password !== $confirm_password) {
    echo "Passwords do not match. <br>";
    exit;
}

if (strlen($password) < 8) {
    echo "Password must contain at least 8 characters. <br>";
    exit;
}

// Checking existing email
$fetch = $conn->prepare("SELECT id FROM users WHERE email = ?");
$fetch->bind_param("s", $email);
$fetch->execute();

$result = $fetch->get_result();

if ($result->num_rows > 0) {
    $fetch->close();
    echo "Email already registered. Please use another email.<br>";
    exit;
}

$fetch->close();

// Password hashing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Mobile number validation
if (!empty($mobile) && !preg_match('/^[6-9][0-9]{9}$/', $mobile)) {
    echo "Invalid mobile number.";
    exit;
}

if (empty($mobile)) {
    $mobile = null;
}

// Inserting data
$insert = $conn->prepare("INSERT INTO users(name, email, mobile, password)
VALUES(?, ?, ?, ?)");

$insert->bind_param("ssss", $name, $email, $mobile, $hashed_password);

if (!$insert->execute()) {
    echo "Registration Failed: " . $insert->error;
    exit;
}

// Checking insertion
if ($insert->affected_rows === 1) {
    $insert->close();

    header('Location: ' . BASE_URL . 'index.php');
    exit;
} else {
    echo "Registration Failed";
}

$insert->close();
exit;
?>