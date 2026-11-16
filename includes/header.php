<?
session_start();
?>
<?php
include __DIR__ . '/../database/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playball&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
    <title>Quick Cart</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar py-2">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
        Quick cart
        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
      </a>

      <div class="text-white small d-none d-lg-block location-text me-3">
        update location
        <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
      </div>

      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <form id="productSearchForm" class="d-flex flex-grow-1 mx-lg-4 my-3 my-lg-0 search-form" role="search">
          <div class="input-group">
            <input id="productSearch" name="q" class="form-control rounded-start-pill border-0 shadow-none px-4 py-2"
              type="search" placeholder="Search for products, categories..." aria-label="Search products"
              aria-controls="productSlider" />
            <button class="btn bg-white rounded-end-pill border-0 px-3 text-maroon" type="submit"
              aria-label="Submit search">
              <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            </button>
          </div>
        </form>

        <ul class="navbar-nav small align-items-center gap-2 gap-lg-3 ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              Home
            </a>
          </li>
          <!-- Categories Item with Dropdown -->
          <li class="nav-item position-relative">
            <a class="nav-link text-white" href="#" id="categoriesTrigger">
              Categories <i class="fa-solid fa-caret-down"></i>
            </a>

            <!-- Categories Popup Menu -->
            <div class="categories-popup shadow-lg d-none" id="categoriesPopup">
              <ul class="list-unstyled mb-0">
                <li class="category-item"><a href="#">cloths</a></li>
                <li class="category-item"><a href="#">electronics</a></li>
                <li class="category-item"><a href="#">grooming</a></li>
                <li class="category-item"><a href="#">kids/child</a></li>
                <li class="category-item"><a href="#">grocery</a></li>
                <li class="category-item"><a href="#">makeup</a></li>
                <li class="category-item"><a href="#">decorations</a></li>
                <li class="category-item border-0"><a href="#">fashion</a></li>
              </ul>
            </div>
          </li>
          <!-- User Account Item with Popup -->
<li class="nav-item position-relative">
    <a class="nav-link text-white user-trigger" href="#" id="userPopupTrigger">
        <i class="fa-solid fa-user"></i> 
        <!-- Display name if logged in, otherwise show 'You' -->
        <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'You'; ?>
    </a>
    
    <div class="user-popup shadow-lg d-none" id="userPopup">
        
        <?php if(isset($_SESSION['user_id'])): ?>
            <!-- LOGGED IN VIEW -->
            <div class="profile-section bg-white p-3 rounded-4 mb-3 d-flex align-items-center gap-3">
                <div class="avatar-circle"><i class="fa-solid fa-user text-maroon fs-1"></i></div>
                <div>
                    <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($_SESSION['user_name']); ?></h5>
                    
                    <div class="small text-muted mb-1">
                        <i class="fa-solid fa-location-dot"></i> 
                        <?php echo !empty($_SESSION['user_address']) ? htmlspecialchars($_SESSION['user_address']) : 'No address added'; ?>
                    </div>
                    
                    <div class="small fw-semibold">Mobile: 
                        <span class="fw-normal"><?php echo htmlspecialchars($_SESSION['user_phone']); ?></span>
                    </div>
                    
                    <div class="small fw-semibold">E-mail: 
                        <span class="fw-normal"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="popup-links mb-3 ms-2">
                <a href="<?php echo BASE_URL; ?>links/cart.php" class="d-block text-dark text-decoration-none fs-5 mb-2">
                    your cart <i class="fa-solid fa-cart-shopping text-maroon"></i>
                </a>
                <a href="#" class="d-block text-dark text-decoration-none fs-5 mb-3">
                    favourites <i class="fa-solid fa-heart text-maroon"></i>
                </a>
                <a href="<?php echo BASE_URL; ?>links/logout.php" class="btn btn-sm btn-outline-danger rounded-pill px-3 shadow-none">Logout</a>
            </div>

        <?php else: ?>
            <!-- GUEST / LOGGED OUT VIEW -->
            <div class="profile-section bg-white p-4 rounded-4 text-center">
                <h6 class="fw-bold mb-3">Welcome to Quick Cart!</h6>
                <p class="small text-muted mb-3">Login to access your orders, cart, and profile.</p>
                <a href="<?php echo BASE_URL; ?>links/login.php" class="btn custom-btn text-white w-100 rounded-pill mb-2">Login</a>
                <a href="<?php echo BASE_URL; ?>links/signup.php" class="btn btn-outline-dark w-100 rounded-pill shadow-none">Sign Up</a>
            </div>
        <?php endif; ?>
        
    </div>
</li>
          <li class="nav-item">
            <a class="nav-link text-white nav-pill" href="#">community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white nav-pill" href="<?= BASE_URL ?>links\login.php">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white nav-pill" href="#">support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white nav-pill" href="#">about</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>