<?php
// Start session to access our logged-in state
session_start();

// SECURITY CHECK: If there is no 'admin_id' in the session, they are not logged in!
// Prevent unauthorized access by sending them back to login page.
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Include database
require_once __DIR__ . '/../website/database.php';

// Fetch quick stats for the dashboard
// 1. Total categories
$catCountStmt = $pdo->query("SELECT COUNT(*) FROM categories");
$totalCategories = $catCountStmt->fetchColumn();

// 2. Total products
$prodCountStmt = $pdo->query("SELECT COUNT(*) FROM products");
$totalProducts = $prodCountStmt->fetchColumn();

// 2 Total contacts
$contaCountStmt = $pdo->query("SELECT COUNT(*) FROM contacts");
$totalContacts = $contaCountStmt->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Saloon 3 Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>

<body>

    <!-- Admin Sidebar Navigation -->
    <div class="container">
        <div class="sidebar">
            <h2>Saloon <span>3</span></h2>
            <a href="../website/index.php" target="_blank" class="btn-outline">Site Web</a>
            <ul class="admin-nav">
                <li><a href="index.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="manage_categories.php"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="manage_products.php"><i class="fas fa-coffee"></i> Products</a></li>
                <li><a href="view_contacts.php"><i class="fas fa-envelope"></i> Contacts</a></li>
                <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <section class="dashboard-stats">
                <div class="info">
                    <div class="stat-card">
                        <i class="fas fa-list icon"></i>
                        <h3><?php echo $totalCategories; ?></h3>
                        <p>Total Categories</p>

                    </div>
                    <a href="manage_categories.php" class="btn-secondary">Manage<br>Categories</a>
                </div>
                <div class="info">
                    <div class="stat-card">
                        <i class="fas fa-coffee icon"></i>
                        <h3><?php echo $totalProducts; ?></h3>
                        <p>Total Produits</p>
                    </div>
                    <a href="manage_products.php" class="btn-secondary">Manage<br>Produits</a>
                </div>
                <div class="info">
                    <div class="stat-card">
                        <i class="fas fa-envelope icon"></i>
                        <h3><?php echo $totalContacts; ?></h3>
                        <p>Total Contacts</p>
                    </div>
                    <a href="view-contacts.php" class="btn-secondary">Manage<br>Contacts</a>
                </div>
            </section>
        </div>
    </div>

</body>

</html>