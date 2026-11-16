<?php
include '../database/config.php';

// Check if a category was clicked in the URL
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Create the SQL rule
if($category === 'all') {
    $sql = "SELECT * FROM products";
} else {
    $safe_category = mysqli_real_escape_string($conn, $category);
    $sql = "SELECT * FROM products WHERE category = '$safe_category'";
}

// THIS is the variable line 40 is looking for! It runs the query.
$result = mysqli_query($conn, $sql);
?>

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
    <link rel="stylesheet" href="<?= BASE_URL ?>css/plp.css" />
</head>

<body>

    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Featured Products</h2>
        <div class="row g-4">
    <?php
    
    if (mysqli_num_rows($result) > 0) {
        

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    
        <div class="col-6 col-md-4 col-lg-3">
            <a href="pdp.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark d-block h-100">
                <div class="custom-card p-3 rounded-4 h-100 position-relative">
                    
                    <!-- Image -->
                    <img src="<?php echo BASE_URL . htmlspecialchars($row['image_path']); ?>" class="img-fluid rounded mb-3 w-100 object-fit-contain" style="height: 200px;" alt="<?php echo htmlspecialchars($row['description']); ?>">
                    
                    <!-- Title & Price -->
                    <h6 class="fw-bold mb-1 text-truncate"><?php echo htmlspecialchars($row['description']); ?></h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-maroon fw-bold">₹<?php echo number_format($row['price']); ?></span>
                    </div>
                    
                </div>
            </a>
        </div>
        
    <?php
        } // This closes the while loop
    } else {
        // If the category has no products, show this message
        echo "<div class='col-12 text-center py-5'><h4>No products found.</h4></div>";
    }
    ?>
</div>
       
    </div>

</body>

</html>
<?php
include '../includes/footer.php';
?>