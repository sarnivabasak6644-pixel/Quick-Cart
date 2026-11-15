<?php 
include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/plp.css"/>
</head>
<body>

    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Featured Products</h2>
        
        <div class="row g-4">
            <!-- Product 1: Womenswear -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Womenswear</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Womenswear" alt="Womenswear">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹1,999</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2: Menswear -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Menswear</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Menswear" alt="Menswear">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹1,299</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3: T-shirts -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">T-shirts</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=T-shirts" alt="T-shirts">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹799</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 4: Watches -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Watches</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Watches" alt="Watches">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹2,499</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 5: Phones -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Phones</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Phones" alt="Phones">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹89,999</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 6: Keyboards -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Keyboards</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Keyboards" alt="Keyboards">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹3,499</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 7: Mice -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Mice</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Mice" alt="Mice">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹1,599</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 8: Gaming -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Gaming</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Gaming" alt="Gaming">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹5,499</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 9: Beauty -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Beauty</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Beauty" alt="Beauty">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹1,199</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 10: Snacks -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Snacks</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Snacks" alt="Snacks">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹899</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Product 10: Snacks -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Snacks</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Snacks" alt="Snacks">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹899</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Product 10: Snacks -->
            <div class="col-6 col-lg-3">
                <div class="product-card p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                    <h5 class="text-center fw-bold mb-3">Snacks</h5>
                    <div class="product-img-container mb-3">
                        <img src="https://placehold.co/300x400/e6e0d4/333?text=Snacks" alt="Snacks">
                    </div>
                    <div class="mt-auto">
                        <h5 class="fw-bold text-center mb-3">₹899</h5>
                        <div class="d-flex flex-column flex-xl-row gap-2">
                            <button class="btn btn-cart flex-grow-1 add-to-cart-btn">Add to Cart</button>
                            <button class="btn btn-buy-now flex-grow-1 buy-now-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Custom Interactions JS -->
    <script src="<?= BASE_URL ?>js/plp.js"></script>
</body>
</html>
<?php
include '../includes/footer.php';
?>