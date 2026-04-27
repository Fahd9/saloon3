<?php
session_start();

// SECURITY CHECK: Must be logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../website/database.php';

// Fetch all contacts to display in the table
$stmt = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC");
$contacts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Contacts - Saloon 3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>

<body>

    <!-- Sidebar Navigation -->
    <div class="container">
        <div class="sidebar">
            <h2>Saloon <span>3</span></h2>
            <a href="../index.php" target="_blank" class="btn-outline">Site Web</a>
            <ul class="admin-nav">
                <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="manage_categories.php"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="manage_products.php"><i class="fas fa-coffee"></i> Products</a></li>
                <li><a href="view_contacts.php" class="active"><i class="fas fa-envelope"></i> Contacts</a></li>
                <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Contacts</h1>
            </header>

            <!-- The Table -->
            <div class="table-card mt-3">
                <h3>Submitted Messages</h3>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($contacts) > 0): ?>
                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?php echo $contact['id']; ?></td>
                                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['subject']); ?></td>
                                    <td style="max-width: 300px; white-space: pre-wrap;">
                                        <?php echo htmlspecialchars($contact['message']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['created_at']); ?></td>
                                    <td><a href="manage_products.php?delete=<?php echo $prod['id']; ?>" class="btn-danger-sm"
                                            onclick="return confirm('Delete this product?');">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No messages found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>