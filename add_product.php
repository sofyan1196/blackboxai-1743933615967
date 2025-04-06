<?php
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';
    $image_url = $_POST['image_url'] ?? '';

    // Validate inputs
    $errors = [];
    if (empty($name)) $errors[] = 'Product name is required';
    if (!is_numeric($price) || $price <= 0) $errors[] = 'Price must be a positive number';
    if (empty($image_url)) $errors[] = 'Image URL is required';

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO products (name, price, description, image_url) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $price, $description, $image_url]);
            $success = "Product added successfully!";
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - ESIM Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 min-h-screen p-4">
            <h1 class="text-2xl font-bold mb-8">ESIM Access</h1>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="admin_dashboard.php" class="block py-2 px-4 hover:bg-blue-700 rounded">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="add_product.php" class="block py-2 px-4 bg-blue-700 rounded">
                            <i class="fas fa-plus-circle mr-2"></i>Add Product
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="manage_orders.php" class="block py-2 px-4 hover:bg-blue-700 rounded">
                            <i class="fas fa-shopping-cart mr-2"></i>Manage Orders
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="logout.php" class="block py-2 px-4 hover:bg-blue-700 rounded">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-2xl font-bold mb-6">Add New Product</h2>
            
            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="bg-white p-6 rounded-lg shadow">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 mb-2">Product Name</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 mb-2">Price (IDR)</label>
                    <input type="number" id="price" name="price" min="0" step="1000" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image_url" class="block text-gray-700 mb-2">Image URL</label>
                    <input type="text" id="image_url" name="image_url" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <p class="text-sm text-gray-500 mt-1">Example: https://images.pexels.com/photo/1234567</p>
                </div>
                <div class="mt-6">
                    <button type="submit" 
                            class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                        <i class="fas fa-save mr-2"></i>Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>