<?php
require_once 'database.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate (basic)
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Please fill in all required fields."]);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, phone, email, subject, message) VALUES (:name, :phone, :email, :subject, :message)");
        
        $success = $stmt->execute([
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);

        if ($success) {
            echo json_encode(["status" => "success", "message" => "Message saved successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to save the message."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
