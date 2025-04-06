<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product->name ?> - Afriza eSIM.io</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <?php $this->load->view('templates/header'); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-500 p-6 text-white">
                <h1 class="text-2xl font-bold"><?= $product->name ?></h1>
                <div class="flex items-center mt-2">
                    <span class="text-xl font-semibold">Rp <?= number_format($product->price, 0, ',', '.') ?></span>
                    <span class="ml-4 bg-blue-600 text-white text-sm font-semibold px-3 py-1 rounded-full">
                        <?= $product->data_quota ?>
                    </span>
                </div>
            </div>

            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi Produk</h2>
                    <p class="text-gray-600"><?= $product->description ?></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-database text-blue-500 mr-2"></i>
                            <span class="font-semibold">Kuota Data:</span>
                        </div>
                        <p class="text-gray-700"><?= $product->data_quota ?></p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                            <span class="font-semibold">Masa Aktif:</span>
                        </div>
                        <p class="text-gray-700"><?= $product->validity_days ?> hari</p>
                    </div>
                </div>

                <form action="<?= base_url('esim/checkout') ?>" method="post">
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300">
                        <i class="fas fa-credit-card mr-2"></i> Lanjutkan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>