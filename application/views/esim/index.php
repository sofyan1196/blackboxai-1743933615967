<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afriza eSIM.io - Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <?php $this->load->view('templates/header'); ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Daftar Paket eSIM</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="bg-blue-500 p-4 text-white">
                    <h2 class="text-xl font-bold"><?= $product->name ?></h2>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold text-blue-600">Rp <?= number_format($product->price, 0, ',', '.') ?></span>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded"><?= $product->data_quota ?></span>
                    </div>
                    <p class="text-gray-600 mb-4"><?= $product->description ?></p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>Masa aktif: <?= $product->validity_days ?> hari</span>
                    </div>
                    <a href="<?= base_url('esim/product/'.$product->id) ?>" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center transition-colors duration-300">
                        <i class="fas fa-shopping-cart mr-2"></i> Beli Sekarang
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>