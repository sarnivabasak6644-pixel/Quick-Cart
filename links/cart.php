<?php
// Start the session to remember cart data
session_start();

// Initialize the cart array if it doesn't exist yet
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 1. Handle ADD TO CART request from pdp.php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    
    // If product is already in cart, just increase the quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $_POST['quantity'];
    } else {
        // Otherwise, add it as a new item
        $_SESSION['cart'][$product_id] = [
            'name' => $_POST['product_name'],
            'price' => $_POST['product_price'],
            'image' => $_POST['product_image'],
            'quantity' => $_POST['quantity']
        ];
    }
    
    // Refresh page to prevent duplicate form submissions on refresh
    header("Location: cart.php");
    exit();
}

// 2. Handle REMOVE ITEM request
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    unset($_SESSION['cart'][$remove_id]);
    header("Location: cart.php");
    exit();
}
?>

<?php 
include '../includes/header.php';
?>

<div class="container my-5">
    <h2 class="fw-bold mb-4">Your Shopping Cart</h2>

    <div class="row g-5">
        <!-- Left Column: Cart Items -->
        <div class="col-lg-8">
            <?php 
            $subtotal = 0;
            
            if (empty($_SESSION['cart'])) {
                echo "<div class='custom-card p-5 text-center rounded-4 shadow-sm'>
                        <h4 class='text-muted mb-3'>Your cart is currently empty.</h4>
                        <a href='plp.php' class='btn custom-btn text-white rounded-pill px-4 py-2'>Continue Shopping</a>
                      </div>";
            } else {
                foreach ($_SESSION['cart'] as $id => $item) {
                    $item_total = $item['price'] * $item['quantity'];
                    $subtotal += $item_total;
            ?>
            
            <!-- Cart Item Card -->
            <div class="custom-card p-3 rounded-4 shadow-sm mb-3 d-flex align-items-center gap-3">
                <img src="<?php echo $item['image']; ?>" class="rounded" alt="<?php echo $item['name']; ?>" style="width: 100px; height: 100px; object-fit: cover;">
                
                <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1"><?php echo $item['name']; ?></h5>
                    <h6 class="text-maroon fw-bold mb-0">₹<?php echo number_format($item['price']); ?></h6>
                </div>
                
                <div class="text-center px-3">
                    <span class="small text-muted d-block mb-1">Qty</span>
                    <span class="fw-bold fs-5"><?php echo $item['quantity']; ?></span>
                </div>
                
                <div class="text-end px-3">
                    <span class="small text-muted d-block mb-1">Total</span>
                    <h5 class="fw-bold mb-0">₹<?php echo number_format($item_total); ?></h5>
                </div>
                
                <!-- Remove Button -->
                <a href="cart.php?remove=<?php echo $id; ?>" class="btn btn-outline-danger border-0 rounded-circle p-2 ms-2 shadow-none" title="Remove Item">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>

            <?php 
                } // End foreach
            } // End else
            ?>
        </div>

        <!-- Right Column: Order Summary -->
        <div class="col-lg-4">
            <div class="custom-card p-4 rounded-4 shadow-sm sticky-top" style="top: 20px;">
                <h4 class="fw-bold mb-4 border-bottom border-dark pb-3">Order Summary</h4>
                
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-semibold">₹<?php echo number_format($subtotal); ?></span>
                </div>
                
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Shipping</span>
                    <span class="fw-semibold text-success">Free</span>
                </div>
                
                <hr class="border-dark opacity-25 my-4">
                
                <div class="d-flex justify-content-between mb-4">
                    <span class="fs-5 fw-bold">Total</span>
                    <span class="fs-4 fw-bold text-maroon">₹<?php echo number_format($subtotal); ?></span>
                </div>
                
                <button class="btn custom-btn text-white w-100 rounded-pill py-3 fs-5 fw-semibold shadow-sm" <?php echo empty($_SESSION['cart']) ? 'disabled' : ''; ?>>
                    Proceed to Checkout <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>