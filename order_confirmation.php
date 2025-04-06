<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - ESIM Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-blue-800 text-white py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">ESIM Access</h1>
                <a href="admin_login.php" class="text-sm hover:underline">
                    <i class="fas fa-lock mr-1"></i> Admin Login
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md text-center max-w-md w-full">
            <div class="text-green-500 text-6xl mb-4">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="text-2xl font-bold mb-4">Thank You For Your Order!</h2>
            <p class="text-gray-600 mb-6">
                We have received your order and payment proof. Our team will process your order shortly.
                You will receive a confirmation email once your order is processed.
            </p>
            <a href="index.php" 
               class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition inline-block">
                Back to Home
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; <?= date('Y') ?> ESIM Access. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>