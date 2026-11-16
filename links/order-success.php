<?php
include '../database/config.php';
session_start();

// Redirect to home if someone visits this page directly without checking out
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed | Quick Cart</title>
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

<div class="container text-center mt-5 mb-5">
    <div class="card shadow-sm border-0 rounded-4 p-5 mx-auto" style="max-width: 600px;">
        <div class="mb-4">
            <i class="fa-solid fa-circle-check text-success fa-4x"></i>
        </div>
        <h2 class="fw-bold mb-2">Order Placed Successfully!</h2>
        <p class="text-muted mb-4">Thank you for shopping with Quick Cart. Your order has been received and is being processed.</p>
        
        <div class="bg-light rounded-4 p-3 mb-4 text-start">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Order Number:</span>
                <span class="fw-bold">#QC-<?php echo rand(100000, 999999); ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Payment Mode:</span>
                <span class="fw-bold">Cash on Delivery (COD)</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-muted">Estimated Delivery:</span>
                <span class="fw-bold text-success">3-5 Business Days</span>
            </div>
        </div>

        <div class="d-grid gap-2">
            <a href="plp.php" class="btn bg-maroon py-3 fw-bold rounded-pill">Continue Shopping</a>
        </div>
    </div>
</div>

</body>
</html>