<?php
// Start the session
session_start();

// Include database configuration
include_once __DIR__ . '/../database/config.php';

// Check user authentication
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'links/login.php');
    exit;
}

// Handle ADD TO CART request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {

    // Retrieve POST variables
    $product_id = $_POST['product_id'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;

    // Validate product ID
    if (empty($product_id) || !is_numeric($product_id) || $product_id <= 0) {
        exit('Invalid Product ID. <br>');
    }

    // Validate quantity
    if (!is_numeric($quantity) || $quantity <= 0 || (int)$quantity != $quantity) {
        exit('Invalid Quantity. <br>');
    }

    // Convert quantity to integer
    $quantity = (int)$quantity;

    // Fetch product details from the database
    $fetch = $conn->prepare('SELECT id, name, price, image, stock FROM products WHERE id = ?');
    $fetch->bind_param("i", $product_id);
    $fetch->execute();

    // Retrieve query result
    $result = $fetch->get_result();

    // Check whether the product exists
    if ($result->num_rows === 0) {
        exit('Product not found. <br>');
    }

    // Fetch product details as an associative array
    $product = $result->fetch_assoc();
    $fetch->close();

    // Check available product stock
    if ($quantity > $product['stock']) {
        exit('Insufficient stock. <br>');
    }

    // Check whether the product already exists in the user's cart
    $check = $conn->prepare('SELECT quantity FROM cart_items WHERE user_id = ? AND product_id = ?');
    $check->bind_param("ii", $_SESSION['user_id'], $product_id);
    $check->execute();

    // Retrieve query result
    $result = $check->get_result();

    // Retrieve existing cart quantity
    if ($result->num_rows > 0) {
        $cart_item = $result->fetch_assoc();
        $existing_quantity = (int)$cart_item['quantity'];
    } else {
        $existing_quantity = 0;
    }

    $check->close();

    // Calculate the updated cart quantity
    $new_quantity = $existing_quantity + $quantity;

    // Validate stock against the updated quantity
    if ($new_quantity > $product['stock']) {
        exit('Insufficient stock. <br>');
    }

    // Update or insert the cart item
    if ($existing_quantity > 0) {

        // Update quantity if the product already exists in the cart
        $update = $conn->prepare('UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?');
        $update->bind_param("iii", $new_quantity, $_SESSION['user_id'], $product_id);
        $update->execute();
        $update->close();

    } else {

        // Insert a new cart item if the product does not exist in the cart
        $insert = $conn->prepare('INSERT INTO cart_items(user_id, product_id, quantity) VALUES(?, ?, ?)');
        $insert->bind_param("iii", $_SESSION['user_id'], $product_id, $quantity);
        $insert->execute();
        $insert->close();
    }

    // Redirect to the cart page
    header('Location: ' . BASE_URL . 'links/cart.php');
    exit;
}

// Handle REMOVE FROM CART request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {

    // Retrieve product ID
    $product_id = $_POST['product_id'] ?? '';

    // Validate product ID
    if (empty($product_id) || !is_numeric($product_id) || $product_id <= 0) {
        exit('Invalid Product ID. <br>');
    }

    // Remove the product from the logged-in user's cart
    $remove = $conn->prepare('DELETE FROM cart_items WHERE user_id = ? AND product_id = ?');
    $remove->bind_param("ii", $_SESSION['user_id'], $product_id);
    $remove->execute();
    $remove->close();

    // Redirect to the cart page
    header('Location: ' . BASE_URL . 'links/cart.php');
    exit;
}
