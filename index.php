<?php
include __DIR__ . '/includes/header.php';
?>

<main class="container my-4">
  <div class="row g-4">
    <section class="col-lg-6" aria-label="Featured collection">
      <div class="custom-card p-4 h-100 position-relative d-flex flex-column justify-content-between">
        <div>
          <h1 class="h4 fw-bold mb-0">Everyday marketplace essentials,</h1>
          <p class="h4 cursive-text mb-4">artfully curated</p>
        </div>

        <div class="row align-items-center mt-3 position-relative">
          <div class="col-7">
            <img src="assets/images/modern_bags.png" alt="Modern bags collection" class="img-fluid rounded shadow-sm" />
          </div>
          <div class="col-5">
            <p class="small text-muted mb-0">
              Elevate your everyday style with our Modern Bags Collection,
              featuring sleek structured totes and elegant crossbody
              designs.
            </p>
          </div>
        </div>

        <h2 class="h5 fw-bold mt-4 mb-0">Modern bags collection</h2>
      </div>
    </section>

    <section class="col-lg-6" aria-labelledby="best-sellers-title">
      <div class="custom-card p-4 h-100 d-flex flex-column align-items-center text-center">
        <div class="w-100 text-start mb-3">
          <h2 class="h4 fw-bold mb-0" id="best-sellers-title">
            Best sellers
          </h2>
          <p class="small text-muted cursive-text">
            Customer favorites to help you find your next pick.
          </p>
        </div>

        <div class="slider-wrapper w-100 mb-3">

          <button class="btn slider-arrow left-arrow shadow-none" id="slideLeft">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <div class="slider-wrapper w-100">
            <div class="image-slider" id="productSlider">
              <div class="slide-item">
                <a href="<?= BASE_URL ?>links/plp.php?category=beauty" class="text-decoration-none w-100" style="color: black;">
                  <img src="assets/images/beauty%20products.png" alt="Beauty products" />
                  <span class="d-block small mt-1">Beauty products</span>
                </a>
              </div>
              <div class="slide-item">
                <a href="<?= BASE_URL ?>links/plp.php?category=bags" class="text-decoration-none w-100" style="color: black;">
                  <img src="assets/images/modern_bags.png" alt="Women's bags" />
                  <span class="d-block small mt-1">Women's bags</span>
                </a>
              </div>
              <div class="slide-item">
                <a href="<?= BASE_URL ?>links/plp.php?category=snacks" class="text-decoration-none w-100" style="color: black;">
                   <img src="assets/images/cookies.png" alt="Cookies and snacks" />
                   <span class="d-block small mt-1">Snacks</span>
                </a>
              </div>
              <div class="slide-item">
                <a href="<?= BASE_URL ?>links/plp.php?category=phones" class="text-decoration-none w-100" style="color: black;">
                     <img src="assets\images\phone.jpeg" alt="Mobile phones" />
                     <span class="d-block small mt-1">Mobile phones</span>
                </a>
              </div>
              <div class="slide-item">
                <a href="<?= BASE_URL ?>links/plp.php?category=laptop" class="text-decoration-none w-100" style="color: black;">
                  <img src="assets\images\laptop.jpeg" alt="Laptops" />
                  <span class="d-block small mt-1">Laptops</span>
                </a>
              </div>
              <div class="slide-item">
                <a href="<?= BASE_URL ?>links/plp.php?category=toys" class="text-decoration-none w-100" style="color: black;">
                  <img src="assets/images/soft%20toys3.png" alt="Soft toys" />
                  <span class="d-block small mt-1">Toys</span>
                </a> 
              </div>
            </div>
          </div>
          <button class="btn slider-arrow right-arrow shadow-none" id="slideRight">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
        <p class="search-status small text-muted mt-2 mb-0" id="searchStatus" role="status" aria-live="polite"></p>

        <div class="product-details mt-2">
          <div class="dots-indicator mb-2" aria-hidden="true">
            <span></span><span class="active"></span><span></span>
          </div>
          <h3 class="h5 fw-bold mb-0">
            4.9 <i class="fa-solid fa-star small" aria-hidden="true"></i>
          </h3>
          <p class="small mb-2">2,400+ Verified Reviews</p>
          <ul class="list-unstyled small mb-3 text-center">
            <li>48-Hour</li>
            <li>Carbon-Neutral Dispatch</li>
            <li>5-Year</li>
            <li>Modular Repair Warranty</li>
          </ul>
          <button class="btn custom-btn rounded-pill px-4 text-white" type="button">
            see more
          </button>
        </div>
      </div>
    </section>
  </div>

  <section class="mt-5 text-center position-relative" aria-labelledby="recommended-title">
    <h2 class="h3 fw-bold mb-0" id="recommended-title">
      Top recommended products
    </h2>
    <p class="h4 cursive-text text-muted mb-4 d-inline-block px-3 py-1 bg-light rounded-pill border">
      customer's choice
    </p>
    <i class="fa-solid fa-cart-shopping fs-3 position-absolute recommended-cart-icon" aria-hidden="true"></i>

    <div class="row g-3 mt-2">
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Womenswear</h3>
          <a href="links/plp.php?category=womenswear" class="w-100">
            <img class="recommended-product-image img-fluid w-100 shadow-sm" src="assets/images/dress_w_black.png"
              alt="Black patterned dress" />
          </a>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Menswear</h3>
          <a href="links/plp.php?category=menswear" class="w-100">
            <img class="recommended-product-image img-fluid shadow-sm" src="assets/images/dress_m_indigo.png"
              alt="Men's indigo shirt" />
          </a>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Watches</h3>
          <a href="links/plp.php?category=watches" class="w-100">
            <img class="recommended-product-image img-fluid shadow-sm" src="assets/images/watches.png"
              alt="Brown wristwatch" />
          </a>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Phones</h3>
          <a href="links/plp.php?category=phones" class="w-100">
            <img class="recommended-product-image img-fluid shadow-sm" src="assets/images/phones.jpeg"
              alt="Smartphones" />
          </a>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Keyboards</h3>
          <a href="links/plp.php?category=keyboards" class="w-100">
            <img class="recommended-product-image img-fluid shadow-sm" src="assets/images/keyboards.jpeg"
              alt="Computer keyboard" />
          </a>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Mouse</h3>
          <a href="links/plp.php?category=mouses" class="w-100">
            <img class="recommended-product-image img-fluid shadow-sm" src="assets/images/mouse.jpeg"
              alt="Computer mouse" />
          </a>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="blank-card shadow-sm">
          <h3 class="h2 fw-bold text-center mb-2">Gaming</h3>
          <a href="links/plp.php?category=game-accesssories" class="w-100">
            <img class="recommended-product-image img-fluid shadow-sm" src="assets/images/controllers.jpeg"
              alt="Game controller" />
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
include __DIR__ . '/includes/footer.php';
?>