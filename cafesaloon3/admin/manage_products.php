<?php
session_start();

// SECURITY CHECK
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../website/database.php';

$message = '';
$error = '';

// Handle Adding a Product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Insert product into database
    $stmt = $pdo->prepare("
        INSERT INTO products (category_id, name, description, price)
        VALUES (:category_id, :name, :description, :price)
    ");

    if ($stmt->execute([
        'category_id' => $category_id,
        'name' => $name,
        'description' => $description,
        'price' => $price
    ])) {
        $message = "Product added successfully!";
    } else {
        $error = "Error adding product.";
    }
}

// Handle Delete Product
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];

    // Now delete from database
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    if ($stmt->execute(['id' => $idToDelete])) {
        header("Location: manage_products.php?msg=deleted");
        exit;
    }
}

if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    $message = "Product deleted successfully!";
}

// Fetch categories for the dropdown menu
$catStmt = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
$categories = $catStmt->fetchAll();

// Fetch products with their category names to display in the table
// We use a JOIN query here to join the two tables together
$prodStmt = $pdo->query("SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC");
$products = $prodStmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products - Saloon 3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    
    <!-- Sidebar -->
     <div class="container">
    <div class="sidebar">
        <h2>Saloon <span>3</span></h2>
        <a href="../index.php" target="_blank" class="btn-outline">Site Web</a>
        <ul class="admin-nav">
            <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="manage_categories.php"><i class="fas fa-list"></i> Categories</a></li>
            <li><a href="manage_products.php" class="active"><i class="fas fa-coffee"></i> Products</a></li>
            <li><a href="view_contacts.php"><i class="fas fa-envelope"></i> Contacts</a></li>
            <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Products</h1>
        </header>

        <?php if ($message): ?>
            <div class="success-msg"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="form-card">
            <h3>Add New Product</h3>
            <!-- IMPORTANT: enctype="multipart/form-data" allows files (images) to be sent via the form -->
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="category" class="prd-head">Select Category</label>
                        <select name="category_id" id="category" required>
                            <option value="">-- Choose Category --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="prd-head">Product Name</label>
                        <input type="text" name="name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="prd-head">Price (DH)</label>
                        <input type="number" step="1" name="price" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="prd-head">Description (Optional)</label>
                    <textarea name="description" rows="5" cols="50"></textarea>
                </div>

                <button type="submit" class="btn-card">Add Product</button>
            </form>
        </div>

        <div class="table-card mt-3">
            <h3>Existing Products</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $prod): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($prod['name']); ?></td>
                        <td><?php echo htmlspecialchars($prod['category_name']); ?></td>
                        <td><?php echo htmlspecialchars($prod['price']); ?> MAD</td>
                        <td>
                            <a href="manage_products.php?delete=<?php echo $prod['id']; ?>" class="btn-danger-sm" onclick="return confirm('Delete this product?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
