<?php
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    
    try {
        $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->execute([$status, $order_id]);
        $success = "Order status updated successfully!";
    } catch (PDOException $e) {
        $errors[] = "Database error: " . $e->getMessage();
    }
}

// Get all orders
$orders = $pdo->query("
    SELECT o.*, p.name as product_name 
    FROM orders o
    JOIN products p ON o.product_id = p.id
    ORDER BY o.created_at DESC
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - ESIM Access</title>
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
                        <a href="add_product.php" class="block py-2 px-4 hover:bg-blue-700 rounded">
                            <i class="fas fa-plus-circle mr-2"></i>Add Product
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="manage_orders.php" class="block py-2 px-4 bg-blue-700 rounded">
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
            <h2 class="text-2xl font-bold mb-6">Manage Orders</h2>
            
            <?php if (isset($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Order ID</th>
                                <th class="text-left py-2">Customer</th>
                                <th class="text-left py-2">Product</th>
                                <th class="text-left py-2">Email</th>
                                <th class="text-left py-2">Payment Proof</th>
                                <th class="text-left py-2">Status</th>
                                <th class="text-left py-2">Date</th>
                                <th class="text-left py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2">#<?= $order['id'] ?></td>
                                <td class="py-2"><?= htmlspecialchars($order['customer_name']) ?></td>
                                <td class="py-2"><?= htmlspecialchars($order['product_name']) ?></td>
                                <td class="py-2"><?= htmlspecialchars($order['customer_email']) ?></td>
                                <td class="py-2">
                                    <?php if ($order['payment_proof_url']): ?>
                                        <a href="<?= htmlspecialchars($order['payment_proof_url']) ?>" 
                                           target="_blank" 
                                           class="text-blue-600 hover:underline">
                                            View Proof
                                        </a>
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td class="py-2">
                                    <span class="px-2 py-1 rounded text-xs 
                                        <?= $order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($order['status'] === 'paid' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </td>
                                <td class="py-2"><?= date('d M Y H:i', strtotime($order['created_at'])) ?></td>
                                <td class="py-2">
                                    <form method="POST" class="flex items-center">
                                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                        <select name="status" class="border rounded px-2 py-1 text-sm mr-2">
                                            <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="paid" <?= $order['status'] === 'paid' ? 'selected' : '' ?>>Paid</option>
                                            <option value="shipped" <?= $order['status'] === 'shipped' ? 'selected' : '' ?>>Shipped</option>
                                        </select>
                                        <button type="submit" class="bg-blue-600 text-white px-2 py-1 rounded text-sm hover:bg-blue-700">
                                            Update
                                        </button>
                                    </form>
                                </td>
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