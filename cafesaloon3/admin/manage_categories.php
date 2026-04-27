<?php
session_start();

// SECURITY CHECK: Must be logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../website/database.php';

$message = '';

// ADD CATEGORY
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];

    // Optional slug (kept in case you use it later)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    // Insert into database 
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");

    if ($stmt->execute(['name' => $name])) {
        $message = "Category added successfully!";
    } else {
        $message = "Error adding category.";
    }
}

// DELETE CATEGORY
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
    if ($stmt->execute(['id' => $idToDelete])) {
        header("Location: manage_categories.php?msg=deleted");
        exit;
    }
}

if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    $message = "Category deleted successfully!";
}

// FETCH CATEGORIES
$stmt = $pdo->query("SELECT * FROM categories ORDER BY id DESC");
$categories = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Categories - Saloon 3</title>
    <link rel="stylesheet" href="admin_style.css">
</head>

<body>

    <div class="container">
        <div class="sidebar">
            <h2>Saloon <span>3</span></h2>

            <a href="../website/index.php" target="_blank" class="btn-outline">Site Web</a>

            <ul class="admin-nav">
                <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="manage_categories.php" class="active"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="manage_products.php"><i class="fas fa-coffee"></i> Products</a></li>
                <li><a href="view_contacts.php"><i class="fas fa-envelope"></i> Contacts</a></li>
                <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
            <header>
                <h1>Categories</h1>
            </header>

            <?php if ($message): ?>
                <div class="success-msg"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <!-- ADD FORM -->
            <div class="form-card">
                <h3>Add New Category</h3>

                <form method="POST" action="">
                    <input type="hidden" name="action" value="add">

                    <div class="form-row">
                        <div class="form-group">
                            <label class="prd-head">Category Name</label>
                            <input type="text" name="name" required>
                        </div>
                    </div>

                    <button class="btn-card" type="submit">Add Category</button>
                </form>
            </div>

            <!-- TABLE -->
            <div class="table-card mt-3">
                <h3>Existing Categories</h3>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                            <tr>
                                <td><?php echo $cat['id']; ?></td>
                                <td><?php echo htmlspecialchars($cat['name']); ?></td>
                                <td>
                                    <a href="manage_categories.php?delete=<?php echo $cat['id']; ?>" class="btn-danger-sm"
                                        onclick="return confirm('Are you sure? This will also delete all products in this category!');">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</body>

</html>