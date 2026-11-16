<?php
include '../database/config.php';

// Check if an ID exists in the URL and isn't blank
if (isset($_GET['id']) && $_GET['id'] != '') {
    $product_id = intval($_GET['id']);

    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);

    // If the query fails due to a SQL error (like a wrong column name)
    if (!$result) {
        die("SQL Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result); 
    } else {
        // ERROR 1: ID is in the URL, but not in the database
        die("STOP: The URL has ID #$product_id, but that product does not exist in your database table.");
    }
} else {
    // ERROR 2: The PLP didn't send an ID at all
    die("STOP: No product ID was sent in the URL. Your PLP link is missing the ID.");
}
?>
<?php 
include '../includes/header.php';
?>
<div class="container my-5">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php"
                    class="text-dark text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>links/plp.php"
                    class="text-dark text-decoration-none">Categories</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-dark text-decoration-none">Womenswear</a></li>
            <li class="breadcrumb-item active text-maroon fw-bold" aria-current="page">
                <?php echo htmlspecialchars($product['description']); ?>
            </li>
        </ol>
    </nav>

    <div class="row g-5">
        <!-- Left Column: Image Gallery -->
        <div class="col-lg-6">

            <!-- Main Image (Dynamic) -->
            <div class="custom-card p-3 rounded-4 mb-3 text-center position-relative">
                <button
                    class="btn btn-light position-absolute top-0 end-0 m-3 rounded-circle shadow-sm p-2 heart-btn z-1">
                    <i class="fa-regular fa-heart"></i>
                </button>

                <!-- This pulls the single image path from your database -->
                <img src="<?php echo BASE_URL . htmlspecialchars($product['image_path']); ?>"
                    class="img-fluid rounded w-100 object-fit-cover"
                    alt="<?php echo htmlspecialchars($product['description']); ?>"
                    style="max-height: 600px; object-fit: contain; width: 100%;">
            </div>

        </div>
        <!-- Right Column: Product Info -->
        <div class="col-lg-6">
            <span class="badge bg-maroon mb-2 px-3 py-2 rounded-pill">Bestseller</span>
            <h2 class="fw-bold mb-2">
                <?php echo htmlspecialchars($product['description']); ?>
            </h2>

            <!-- Ratings -->
            <div class="d-flex align-items-center mb-3">
                <div class="text-warning me-2">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="#reviews" class="text-muted text-decoration-none small">(124 Reviews)</a>
            </div>

            <!-- Price -->
            <h3 class="text-maroon fw-bold mb-3">
                ₹
                <?php echo number_format($product['price']); ?>
            </h3>

            <hr class="border-dark opacity-25 mb-4">

            <!-- Size Selector -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fw-bold mb-0">Select Size</h6>
                    <a href="#" class="text-maroon text-decoration-none small fw-semibold">Size Guide</a>
                </div>
                <div class="d-flex gap-2 flex-wrap" id="sizeSelector">
                    <input type="radio" class="btn-check" name="options-size" id="size-xs" autocomplete="off">
                    <label class="btn btn-outline-dark rounded-circle size-btn" for="size-xs">XS</label>

                    <input type="radio" class="btn-check" name="options-size" id="size-s" autocomplete="off">
                    <label class="btn btn-outline-dark rounded-circle size-btn" for="size-s">S</label>

                    <input type="radio" class="btn-check" name="options-size" id="size-m" autocomplete="off" checked>
                    <label class="btn btn-outline-dark rounded-circle size-btn" for="size-m">M</label>

                    <input type="radio" class="btn-check" name="options-size" id="size-l" autocomplete="off">
                    <label class="btn btn-outline-dark rounded-circle size-btn" for="size-l">L</label>

                    <input type="radio" class="btn-check" name="options-size" id="size-xl" autocomplete="off">
                    <label class="btn btn-outline-dark rounded-circle size-btn" for="size-xl">XL</label>
                </div>
            </div>

            <form action="cart.php" method="POST">

                <!-- Hidden inputs to send product details to the cart -->
                <input type="hidden" name="product_id" value="101"> <!-- Will be dynamic from DB later -->
                <input type="hidden" name="description" value="Elegant Black Kurti Set">
                <input type="hidden" name="product_price" value="1999">
                <input type="hidden" name="product_image"
                    value="https://placehold.co/300x400/e6e0d4/333?text=Womenswear">

                <!-- Quantity Selector -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-2">Quantity</h6>
                    <div class="input-group align-items-center" style="max-width: 140px;">
                        <button class="btn btn-outline-dark rounded-start-pill px-3" type="button"
                            onclick="updateQty(-1)">-</button>
                        <!-- Note the name="quantity" attribute added here -->
                        <input type="text" class="form-control text-center border-dark shadow-none fw-bold"
                            id="qtyInput" name="quantity" value="1" readonly>
                        <button class="btn btn-outline-dark rounded-end-pill px-3" type="button"
                            onclick="updateQty(1)">+</button>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-sm-row gap-3 mb-5">
                    <button type="submit" name="add_to_cart"
                        class="btn custom-btn text-white flex-grow-1 rounded-pill py-3 fs-5 fw-semibold shadow-sm">
                        <i class="fa-solid fa-cart-plus me-2"></i>Add to Cart
                    </button>
                    <a href="checkout.php?product_id=<?php echo $product['id']; ?>"
                        class="btn btn-dark flex-grow-1 rounded-pill py-3 fs-5 fw-semibold shadow-sm text-center text-decoration-none">
                        <i class="fa-solid fa-bolt me-2"></i>Buy Now
                    </a>
                </div>
            </form>
            <!-- Accordion Information -->
            <div class="accordion custom-accordion" id="productAccordion">
                <!-- Detail Item -->
                <div
                    class="accordion-item bg-transparent border-dark border-opacity-25 border-start-0 border-end-0 border-top-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-transparent shadow-none fw-bold px-0 text-dark" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Product Details
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#productAccordion">
                        <div class="accordion-body px-0 pt-2 pb-4 text-muted small">
                            <ul class="mb-0">
                                <li>14-days easy returns</li>
                                <li>100% safe checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Delivery Item -->
                <div class="accordion-item bg-transparent border-dark border-opacity-25 border-start-0 border-end-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-transparent shadow-none fw-bold px-0 text-dark"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            Delivery & Returns
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#productAccordion">
                        <div class="accordion-body px-0 pt-2 pb-4 text-muted small">
                            Free standard delivery on orders over ₹999. Returns accepted within 14 days of delivery.
                            Make sure tags are intact.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="<?= BASE_URL ?>js/pdp.js"></script>
<?php
include '../includes/footer.php';
?>