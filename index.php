<?php
require_once __DIR__ . '/config.php';

try {
    // Get all products
    $products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESIM Access - Buy ESIM Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
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
    <main class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-8 text-center">Available ESIM Packages</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($products as $product): ?>
            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="<?= htmlspecialchars($product['image_url']) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" 
                         class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="text-gray-600 mb-4"><?= htmlspecialchars($product['description']) ?></p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-blue-600">Rp<?= number_format($product['price'], 0, ',', '.') ?></span>
                        <a href="product_details.php?id=<?= $product['id'] ?>" 
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; <?= date('Y') ?> ESIM Access. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>