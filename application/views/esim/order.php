<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #<?= $order->order_code ?> - Afriza eSIM.io</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <?php $this->load->view('templates/header'); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-500 p-6 text-white">
                <h1 class="text-2xl font-bold">Order #<?= $order->order_code ?></h1>
                <div class="flex items-center mt-2">
                    <span class="px-2 py-1 rounded-full text-sm font-semibold 
                        <?= $order->payment_status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                        <?= ucfirst($order->payment_status) ?>
                    </span>
                </div>
            </div>

            <div class="p-6">
                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Detail Produk</h2>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700"><?= $order->product_name ?></span>
                        <span class="font-semibold">Rp <?= number_format($order->price, 0, ',', '.') ?></span>
                    </div>
                </div>

                <?php if ($order->payment_status == 'pending'): ?>
                <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-yellow-500"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">
                                Silahkan lakukan pembayaran ke rekening berikut:
                            </h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <p><strong>Bank:</strong> BCA</p>
                                <p><strong>No. Rekening:</strong> 1234567890</p>
                                <p><strong>Atas Nama:</strong> Afriza eSIM.io</p>
                                <p><strong>Jumlah:</strong> Rp <?= number_format($order->price, 0, ',', '.') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif ($order->payment_status == 'paid' && $order->qr_code_url): ?>
                <div class="mb-6 text-center">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">eSIM Anda Siap Digunakan!</h2>
                    <div class="inline-block p-4 bg-white rounded-lg shadow-md">
                        <img src="<?= $order->qr_code_url ?>" alt="QR Code eSIM" class="w-48 h-48 mx-auto">
                        <p class="mt-2 text-sm text-gray-600">Scan QR code untuk mengaktifkan eSIM</p>
                    </div>
                    <div class="mt-4">
                        <a href="<?= $order->usage_url ?>" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-external-link-alt mr-1"></i> Panduan Penggunaan
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="mt-6">
                    <a href="<?= base_url('esim') ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>