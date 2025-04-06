<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_email'] = $admin['email'];
            header('Location: admin_dashboard.php');
            exit;
        } else {
            header('Location: admin_login.php?error=Invalid email or password');
            exit;
        }
    } catch (PDOException $e) {
        header('Location: admin_login.php?error=Database error');
        exit;
    }
} else {
    header('Location: admin_login.php');
    exit;
}