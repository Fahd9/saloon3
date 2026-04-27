<?php
session_start();
// Destroy all session data to log the user out securely
session_destroy();

// Redirect back to login page
header("Location: login.php");
exit;
?>
