<?php
// Include our database connection
require_once 'database.php';

// Fetch all categories from the database
// We order them by 'id' so they appear in the order we added them
$stmt = $pdo->query("SELECT * FROM categories ORDER BY id ASC");
$categories = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="app.css">
  <title>Saloon 3 — Café & Restaurant</title>
</head>

<body>
  <div class="container">
    <nav id="navbar">
      <div class="nav-logo">Saloon <span>3</span></div>
      <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <section id="menu">
      <div class="menu-header reveal">
        <h2 class="section-title" style="color:var(--cream)">Menu</h2>
      </div>

      <div class="menu-layout">

        <?php foreach ($categories as $category): ?>

          <div class="menu-category">

            <h2 class="category-title">
              <?php echo htmlspecialchars($category['name']); ?>
            </h2>

            <?php
            $categoryId = $category['id'];
            $prodStmt = $pdo->prepare("
          SELECT * FROM products
          WHERE category_id = :cat_id
        ");
            $prodStmt->execute(['cat_id' => $categoryId]);
            $products = $prodStmt->fetchAll();
            ?>

            <?php if (count($products) > 0): ?>

              <?php foreach ($products as $product): ?>

                <div class="menu-row">

                  <div class="menu-content">

                    <div class="item-name">
                      • <?php echo htmlspecialchars($product['name']); ?>
                    </div>

                    <?php if (!empty($product['description'])): ?>
                      <div class="item-desc">
                        <?php echo htmlspecialchars($product['description']); ?>
                      </div>
                    <?php endif; ?>

                  </div>

                  <div class="item-price">
                    <?php echo htmlspecialchars($product['price']); ?> MAD
                  </div>

                </div>

              <?php endforeach; ?>

            <?php else: ?>

              <p>No items yet.</p>

            <?php endif; ?>

          </div>

        <?php endforeach; ?>

      </div>
    </section>
    <footer>
      <div class="footer-logo">Saloon 3</div>
      <ul class="footer-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#photos">Gallery</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <div class="footer-para">Saloon 3 Marrakech</div>
    </footer>
  </div>
  <script src="script.js"></script>
</body>

</html>