<?php
include '../database/config.php';
// If your config doesn't start the session automatically, uncomment the next line:
session_start(); 

// 1. Check if the user is logged in. If not, send them to login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// Calculate the cart subtotal for the logged-in user
$user_id = $_SESSION['user_id'];
$cart_query = "SELECT SUM(products.price * cart_items.quantity) AS total_price 
               FROM cart_items 
               JOIN products ON cart_items.product_id = products.id 
               WHERE cart_items.user_id = $user_id";

$cart_result = mysqli_query($conn, $cart_query);
$cart_data = mysqli_fetch_assoc($cart_result);
$subtotal = $cart_data['total_price'] ?? 0;

include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Quick Cart</title>
    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .text-maroon { color: #800000; }
        .bg-maroon { background-color: #800000; color: white; }
        .bg-maroon:hover { background-color: #600000; color: white; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <h2 class="fw-bold mb-4">Checkout</h2>
    
    <div class="row g-4">
        <!-- Shipping Details Form -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h4 class="mb-3">Shipping Address</h4>
                
                <!-- This form will eventually submit to an action file to process the order -->
                <form action="order-success.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="full_name" value="<?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="10-digit mobile number" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PIN Code</label>
                            <input type="text" class="form-control" name="pincode" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Delivery Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="House number, street, city, state" required></textarea>
                        </div>
                        
                        <h4 class="mt-4 mb-2">Payment Method</h4>
                        <div class="col-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                                <label class="form-check-label" for="cod">Cash on Delivery (COD)</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn bg-maroon w-100 py-3 fw-bold rounded-pill fs-5">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Order Summary Placeholder -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h4 class="mb-4">Order Summary</h4>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-semibold">₹<?php echo number_format($subtotal); ?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Delivery Fee</span>
                    <span class="text-success">Free</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold fs-5">Total</span>
                    <span class="fw-bold fs-5 text-maroon">₹<?php echo number_format($subtotal); ?></span>
                </div>
                <p class="small text-muted text-center"><i class="fa-solid fa-shield-halved me-1"></i> Secure Checkout</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>