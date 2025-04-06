<?php
require_once __DIR__ . '/config.php';

function send_email_notification($order_id, $customer_name, $customer_email) {
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;
        
        $mail->setFrom(SMTP_USER, 'ESIM Access');
        $mail->addAddress(ADMIN_EMAIL);
        $mail->addReplyTo($customer_email, $customer_name);
        
        $mail->isHTML(true);
        $mail->Subject = 'New Order #' . $order_id;
        $mail->Body = "
            <h1>New Order Received</h1>
            <p><strong>Order ID:</strong> #$order_id</p>
            <p><strong>Customer:</strong> $customer_name</p>
            <p><strong>Email:</strong> $customer_email</p>
            <p><a href='".$_SERVER['HTTP_HOST']."/manage_orders.php'>View Order Details</a></p>
        ";
        
        return $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: " . $e->getMessage());
        return false;
    }
}

function handle_file_upload($file) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return [false, 'File upload error'];
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        return [false, 'File is too large (max 2MB)'];
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    
    if (!in_array($mime, ALLOWED_TYPES)) {
        return [false, 'Only JPG and PNG files are allowed'];
    }

    // Create upload directory if not exists
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }
    
    // Generate unique filename
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'proof_' . uniqid() . '.' . $ext;
    $filepath = UPLOAD_DIR . $filename;
    
    if (!move_uploaded_file($file['tmp_name'], $filepath)) {
        return [false, 'Failed to save file'];
    }

    return [true, $filepath];
}