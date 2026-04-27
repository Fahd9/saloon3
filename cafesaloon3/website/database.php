<?php
// ==========================================
// DATABASE CONNECTION FILE
// ==========================================
// This file connects our PHP application to the MySQL database.
// We use PDO (PHP Data Objects) because it is secure and protects against SQL injection.

$host = '127.0.0.1'; // The server where the database is hosted (localhost for XAMPP)
$db   = 'cafe_saloon_db'; // The name of the database we created in db.sql
$user = 'root'; // The default username for XAMPP
$pass = ''; // The default password for XAMPP is usually empty

// We wrap the connection attempt in a try-catch block.
// This means "try to connect, and if there is an error, catch it and show a clear message."
try {
    // We create a new PDO instance to connect to the database.
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    
    // We tell PDO to throw exceptions (errors) if something goes wrong with our queries.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // We tell PDO to return the data as associative arrays (like dictionaries) by default.
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If we cannot connect to the database, we stop everything and show this message.
    die("ERROR: Could not connect to the database. Have you imported db.sql into phpMyAdmin and started MySQL in XAMPP? <br>Details: " . $e->getMessage());
}
?>
