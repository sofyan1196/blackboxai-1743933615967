<?php
require_once 'config.php';
require_once 'functions.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? 0;
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    // Validate inputs
    $errors = [];
    if (empty($name)) $errors[] = 'Name is required';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email format';
    if (empty($phone)) $errors[] = 'Phone number is required';
    
    // Handle file upload
    $proof_path = '';
    if (isset($_FILES['payment_proof'])) {
        list($success, $result) = handle_file_upload($_FILES['payment_proof']);
        if (!$success) {
            $errors[] = $result;
        } else {
            $proof_path = $result;
        }
    } else {
        $errors[] = 'Payment proof is required';
    }
    
    if (empty($errors)) {
        try {
            // Save order to database
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, product_id, payment_proof_url) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $product_id, $proof_path]);
            $order_id = $pdo->lastInsertId();
            
            // Send email notification
            send_email_notification($order_id, $name, $email);
            
            // Redirect to thank you page
            header('Location: order_confirmation.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}

// If no POST data or errors, redirect to home
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !empty($errors)) {
    header('Location: index.php');
    exit;
}
