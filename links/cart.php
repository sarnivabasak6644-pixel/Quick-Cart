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

// Fetch cart items belonging to the logged-in user
$fetch = $conn->prepare(
    'SELECT
        ci.product_id,
        ci.quantity,
        p.name,
        p.price,
        p.image
    FROM cart_items AS ci
    INNER JOIN products AS p ON ci.product_id = p.id
    WHERE ci.user_id = ?'
);

$fetch->bind_param("i", $_SESSION['user_id']);
$fetch->execute();

// Retrieve query result
$result = $fetch->get_result();

$cart_items = [];
$subtotal = 0;

// Store cart items and calculate subtotal
while ($item = $result->fetch_assoc()) {
    $item['item_total'] = $item['price'] * $item['quantity'];

    $subtotal += $item['item_total'];
    $cart_items[] = $item;
}

$fetch->close();

// Include header
include __DIR__ . '/../includes/header.php';
?>

<div class="container my-5">
    <h2 class="fw-bold mb-4">Your Shopping Cart</h2>

    <div class="row g-5">

        <!-- Left Column: Cart Items -->
        <div class="col-lg-8">

            <?php if (empty($cart_items)): ?>

                <div class="custom-card p-5 text-center rounded-4 shadow-sm">
                    <h4 class="text-muted mb-3">
                        Your cart is currently empty.
                    </h4>

                    <a href="plp.php" class="btn custom-btn text-white rounded-pill px-4 py-2">
                        Continue Shopping
                    </a>
                </div>

            <?php else: ?>

                <?php foreach ($cart_items as $item): ?>

                    <!-- Cart Item Card -->
                    <div class="custom-card p-3 rounded-4 shadow-sm mb-3 d-flex align-items-center gap-3">

                        <img
                            src="<?php echo BASE_URL . htmlspecialchars($item['image']); ?>"
                            class="rounded"
                            alt="<?php echo htmlspecialchars($item['name']); ?>"
                            style="width: 100px; height: 100px; object-fit: cover;"
                        >

                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">
                                <?php echo htmlspecialchars($item['name']); ?>
                            </h5>

                            <h6 class="text-maroon fw-bold mb-0">
                                ₹<?php echo number_format((float)$item['price'], 2); ?>
                            </h6>
                        </div>

                        <div class="text-center px-3">
                            <span class="small text-muted d-block mb-1">Qty</span>

                            <span class="fw-bold fs-5">
                                <?php echo (int)$item['quantity']; ?>
                            </span>
                        </div>

                        <div class="text-end px-3">
                            <span class="small text-muted d-block mb-1">Total</span>

                            <h5 class="fw-bold mb-0">
                                ₹<?php echo number_format((float)$item['item_total'], 2); ?>
                            </h5>
                        </div>

                        <!-- Remove Item -->
                        <form
                            action="<?php echo BASE_URL; ?>actions/cart-process.php"
                            method="POST"
                        >
                            <input
                                type="hidden"
                                name="product_id"
                                value="<?php echo (int)$item['product_id']; ?>"
                            >

                            <input
                                type="hidden"
                                name="remove_from_cart"
                                value="1"
                            >

                            <button
                                type="submit"
                                class="btn btn-outline-danger border-0 rounded-circle p-2 ms-2 shadow-none"
                                title="Remove Item"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <!-- Right Column: Order Summary -->
        <div class="col-lg-4">

            <div class="custom-card p-4 rounded-4 shadow-sm sticky-top" style="top: 20px;">

                <h4 class="fw-bold mb-4 border-bottom border-dark pb-3">
                    Order Summary
                </h4>

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Subtotal</span>

                    <span class="fw-semibold">
                        ₹<?php echo number_format((float)$subtotal, 2); ?>
                    </span>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Shipping</span>
                    <span class="fw-semibold text-success">Free</span>
                </div>

                <hr class="border-dark opacity-25 my-4">

                <div class="d-flex justify-content-between mb-4">
                    <span class="fs-5 fw-bold">Total</span>

                    <span class="fs-4 fw-bold text-maroon">
                        ₹<?php echo number_format((float)$subtotal, 2); ?>
                    </span>
                </div>

                <button
                    class="btn custom-btn text-white w-100 rounded-pill py-3 fs-5 fw-semibold shadow-sm"
                    <?php echo empty($cart_items) ? 'disabled' : ''; ?>
                >
                    Proceed to Checkout
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>

            </div>

        </div>

    </div>
</div>

<?php
// Include footer
include __DIR__ . '/../includes/footer.php';
?>
