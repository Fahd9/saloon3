<?php
// Start the session to keep the user logged in across pages
session_start();

// Include the database connection from the parent directory
require_once __DIR__ . '/../website/database.php';

// If the user is already logged in, redirect them to the dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}

$error = '';

// Check if the form was submitted (the user clicked 'Login')
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form form
    $username = $_POST['username'];
    $password = md5($_POST['password']); // We use MD5 here to match the database script (db.sql)

    // Prepare a secure query to find the admin user
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :user AND password = :pass LIMIT 1");
    // Run the query with the data
    $stmt->execute(['user' => $username, 'pass' => $password]);
    // Fetch the result
    $admin = $stmt->fetch();

    if ($admin) {
        // If a match is found, store their ID in the session
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        
        // Redirect them to the admin dashboard
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Saloon 3</title>
    <!-- Use FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body class="login-page">
    <div class="login-container">
        <i class="fa-solid fa-circle-user"></i>

        <?php if ($error): ?>
            <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Enter password">
            </div>
            <button type="submit" class="btn-primary">Entre</button>
        </form>
    </div>
</body>
</html>
