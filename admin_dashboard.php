<?php
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// Get stats
$products_count = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$orders_count = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$pending_orders = $pdo->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ESIM Access</title>
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
                        <a href="admin_dashboard.php" class="block py-2 px-4 bg-blue-700 rounded">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="add_product.php" class="block py-2 px-4 hover:bg-blue-700 rounded">
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
            <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Products</h3>
                    <p class="text-3xl font-bold text-blue-600"><?= $products_count ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Orders</h3>
                    <p class="text-3xl font-bold text-blue-600"><?= $orders_count ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Pending Orders</h3>
                    <p class="text-3xl font-bold text-blue-600"><?= $pending_orders ?></p>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>
                <?php
                $recent_orders = $pdo->query("
                    SELECT o.*, p.name as product_name 
                    FROM orders o
                    JOIN products p ON o.product_id = p.id
                    ORDER BY o.created_at DESC
                    LIMIT 5
                ")->fetchAll();
                ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Order ID</th>
                                <th class="text-left py-2">Customer</th>
                                <th class="text-left py-2">Product</th>
                                <th class="text-left py-2">Status</th>
                                <th class="text-left py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_orders as $order): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2">#<?= $order['id'] ?></td>
                                <td class="py-2"><?= htmlspecialchars($order['customer_name']) ?></td>
                                <td class="py-2"><?= htmlspecialchars($order['product_name']) ?></td>
                                <td class="py-2">
                                    <span class="px-2 py-1 rounded text-xs 
                                        <?= $order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($order['status'] === 'paid' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </td>
                                <td class="py-2"><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>