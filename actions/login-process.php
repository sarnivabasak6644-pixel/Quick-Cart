<?php
include __DIR__ . '/../database/config.php';

// POST method verification
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request');
}

// Retrieving POST variables
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Checking the email and password empty
if (empty($email) || empty($password)) {
    echo "Email and password are required. <br>";
    exit;
}

// Fetching user data
$fetch = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
$fetch->bind_param("s", $email);
$fetch->execute();

$result = $fetch->get_result();

if ($result->num_rows === 0) {
    echo "Invalid email or password. <br>";
    $fetch->close();
    exit;
} else {
    $user = $result->fetch_assoc();
}

// Password verification
if (!password_verify($password, $user["password"])) {
    echo "Invalid email or password. <br>";
    $fetch->close();
    exit;
}

$fetch->close();

// Start authenticated session
session_start();
session_regenerate_id(true);

// Store user information
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];

// Redirect
header('Location: ' . BASE_URL . 'index.php');
exit;
?>