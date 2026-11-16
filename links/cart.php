<?php
session_start();
include '../database/config.php';

// 1. Kick out users who aren't logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// 2. Handle ADD TO CART request from pdp.php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    
    // Because your teammate cleverly added a UNIQUE KEY for (user_id, product_id), 
    // we can use ON DUPLICATE KEY UPDATE to just increase the quantity if it's already in the cart.
    $insert_sql = "INSERT INTO cart_items (user_id, product_id, quantity) 
                   VALUES ($user_id, $product_id, $quantity) 
                   ON DUPLICATE KEY UPDATE quantity = quantity + $quantity";
                   
    mysqli_query($conn, $insert_sql);
    
    header("Location: cart.php");
    exit();
}

// 3. Handle REMOVE ITEM request
if (isset($_GET['remove'])) {
    $remove_id = intval($_GET['remove']);
    // Ensure the user only deletes THEIR cart item, not someone else's
    $delete_sql = "DELETE FROM cart_items WHERE id = $remove_id AND user_id = $user_id";
    mysqli_query($conn, $delete_sql);
    
    header("Location: cart.php");
    exit();
}

// 4. Fetch the user's cart items from the database
// We use a JOIN to combine the cart_items table with the products table to get names and prices
$fetch_cart_sql = "SELECT c.id AS cart_item_id, c.quantity, p.description, p.price, p.image_path 
                   FROM cart_items c 
                   JOIN products p ON c.product_id = p.id 
                   WHERE c.user_id = $user_id";
$cart_result = mysqli_query($conn, $fetch_cart_sql);
?>

<?php include '../includes/header.php'; ?>

<div class="container my-5">
    <h2 class="fw-bold mb-4">Your Shopping Cart</h2>

    <div class="row g-5">
        <!-- Left Column: Cart Items -->
        <div class="col-lg-8">
            <?php 
            $subtotal = 0;
            
            if (mysqli_num_rows($cart_result) == 0) {
                echo "<div class='custom-card p-5 text-center rounded-4 shadow-sm'>
                        <h4 class='text-muted mb-3'>Your cart is currently empty.</h4>
                        <a href='plp.php' class='btn custom-btn text-white rounded-pill px-4 py-2'>Continue Shopping</a>
                      </div>";
            } else {
                while ($item = mysqli_fetch_assoc($cart_result)) {
                    $item_total = $item['price'] * $item['quantity'];
                    $subtotal += $item_total;
            ?>

            <!-- Cart Item Card -->
            <div class="custom-card p-3 rounded-4 shadow-sm mb-3 d-flex align-items-center gap-3">
                <img src="<?php echo BASE_URL . htmlspecialchars($item['image_path']); ?>" class="rounded"
                    alt="<?php echo htmlspecialchars($item['description']); ?>"
                    style="width: 100px; height: 100px; object-fit: cover;">

                <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1">
                        <?php echo htmlspecialchars($item['description']); ?>
                    </h5>
                    <h6 class="text-maroon fw-bold mb-0">₹
                        <?php echo number_format($item['price']); ?>
                    </h6>
                </div>

                <div class="text-center px-3">
                    <span class="small text-muted d-block mb-1">Qty</span>
                    <span class="fw-bold fs-5">
                        <?php echo $item['quantity']; ?>
                    </span>
                </div>

                <div class="text-end px-3">
                    <span class="small text-muted d-block mb-1">Total</span>
                    <h5 class="fw-bold mb-0">₹
                        <?php echo number_format($item_total); ?>
                    </h5>
                </div>

                <!-- Remove Button (Passes the cart_items ID) -->
                <a href="cart.php?remove=<?php echo $item['cart_item_id']; ?>"
                    class="btn btn-outline-danger border-0 rounded-circle p-2 ms-2 shadow-none" title="Remove Item">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>

            <?php 
                } // End while loop
            } // End else
            ?>
        </div>

        <!-- //Right Column: Order Summary -->
        <div class="col-lg-4">
            <div class="custom-card p-4 rounded-4 shadow-sm sticky-top" style="top: 20px;">
                <h4 class="fw-bold mb-4 border-bottom border-dark pb-3">Order Summary</h4>

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-semibold">₹
                        <?php echo number_format($subtotal); ?>
                    </span>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Shipping</span>
                    <span class="fw-semibold text-success">Free</span>
                </div>

                <hr class="border-dark opacity-25 my-4">

                <div class="d-flex justify-content-between mb-4">
                    <span class="fs-5 fw-bold">Total</span>
                    <span class="fs-4 fw-bold text-maroon">₹
                        <?php echo number_format($subtotal); ?>
                    </span>
                </div>

                <a href="checkout.php"
                    class="btn custom-btn text-white w-100 rounded-pill py-3 fs-5 fw-semibold shadow-sm <?php echo ($subtotal == 0) ? 'disabled' : ''; ?>">
                    Proceed to Checkout <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>