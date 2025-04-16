<?php

require_once './backend/models/productmodels.php';

$product_model = new ProductModels();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UA Campus Store | Homepage</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utility-styles.css">
    <link rel="stylesheet" href="css/popup-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>

    <nav class="nav-container">
        <a href="#" class="hamburger-menu">
            <i class="fas fa-bars"></i>
        </a>
        <a href="index.php" class="logo">
            <img src="images/logo.png" alt="UA Campus Store Logo">
        </a>
        <div class="nav-links">
            <div class="nav-logo">
                <button onclick=openForm()><i class="fas fa-square-plus"></i></button>
                <span class="tooltip">Add New Product</span>
            </div>
            <div class="nav-logo">
                <a href="search.html"><i class="fas fa-search"></i></a>
                <span class="tooltip">Search Products</span>
            </div>
            <div class="nav-logo">
                <a href="#"><i class="fas fa-user"></i></a>
                <span class="tooltip">Account</span>
            </div>
        </div>
    </nav>

    <div class="popup-form" id="add-product-form">
        <div class="form-box">
            <div class="form-header">
                <h3>Add New Product</h3>
                <button><i class="fas fa-times close-button" onclick=closeForm()></i></button>
            </div>
            <div class="form-body">
                <form id="the-real-add-product-form">
                    <label for="product-name">Product Name</label>
                    <input type="text" name="product-name" id="product-name" placeholder="Type the product name..." required>
                    <label for="product-price">Price</label>
                    <input type="number" name="product-price" id="product-price" min="0" step="0.1" placeholder="Type the product price..." required>
                    <label for="product-description">Description</label>
                    <textarea name="product-description" id="product-description" rows="5" placeholder="Type the product description..." required></textarea>
                    <label for="product-image">Product Image</label>
                    <input type="text" name="product-image" id="product-image" placeholder="Type the image file name... (e.g. product1.jpg)" required>
                    <div class="form-footer">
                        <button type="submit" id="add-product-btn">Add Product</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>

    <main>
        <!-- The hero section is designed to immediately capture the user's attention with a large, visually appealing image. 
            This helps to create a strong first impression and encourages users to explore the site further. -->
        <img src="images/hero.jpg" alt="Featured Products" class="hero-image">

        <section class="featured-products new-products">
            <h2>New Products</h2>
            <div class="product-grid" id="new-products-list"></div>
        </section>

        <!-- The featured products section showcases popular items to entice users to make a purchase. 
            By displaying product images, names, prices, and ratings, users can quickly see what is available and make informed decisions. -->
        <section class="featured-products">
            <h2>Featured Products</h2>
            <div class="product-grid">
                <?php 
                    $products = $product_model->getProductObjects();
                    foreach ($products as $product):
                ?>
                    <?php
                            $product_id = $product->getProductProperty("id");
                            $image = $product_model->getVisualObject($product_id, "featured-image");
                    ?>
                    
                    <div class="product-card">
                        <a href="product.php?id=<?php echo $product_id; ?>">
                            <?php echo $image->getHTML(); ?>
                            <p class="text-bold text-black"><?php echo $product->getProductProperty("name"); ?></p>
                        </a>
                        <p>$<?php echo number_format($product->getProductProperty("price"), 2); ?></p>
                        <div class="rating">
                            <?php echo $product->getRatingStars(); ?>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </section>
    </main>

    <footer>
        <div class="footer-links">
            <a href="#">Terms of Use</a>
            <a href="#">Privacy Policy</a>
            <a href="#">About</a>
            <a href="#">Help Center</a>
        </div>
        <div class="footer-copyright">
            <p>© 2025 The University of Arizona Campus Store. All Rights Reserved.</p>
        </div>
    </footer>
</body>
<script src="https://unpkg.com/papaparse@5.5.2/papaparse.min.js"></script>
<script src="scripts/loadDatas.js"></script>
<script src="scripts/displayer.js"></script>
<script src="scripts/product_add.js"></script>
</html>