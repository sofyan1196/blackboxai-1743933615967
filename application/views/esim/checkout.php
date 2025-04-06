<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Afriza eSIM.io</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <?php $this->load->view('templates/header'); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-500 p-6 text-white">
                <h1 class="text-2xl font-bold">Checkout eSIM</h1>
                <p class="mt-2">Lengkapi data pembayaran Anda</p>
            </div>

            <div class="p-6">
                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Detail Produk</h2>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700"><?= $product->name ?></span>
                        <span class="font-semibold">Rp <?= number_format($product->price, 0, ',', '.') ?></span>
                    </div>
                </div>

                <form action="<?= base_url('esim/checkout') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2" for="payment_method">
                            Metode Pembayaran
                        </label>
                        <select name="payment_method" id="payment_method" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="bca">BCA</option>
                            <option value="bni">BNI</option>
                            <option value="bri">BRI</option>
                            <option value="mandiri">Mandiri</option>
                            <option value="dana">DANA</option>
                            <option value="ovo">OVO</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2" for="payment_proof">
                            Upload Bukti Transfer
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-md p-4 text-center">
                            <input type="file" name="payment_proof" id="payment_proof" class="hidden" accept="image/*" required>
                            <label for="payment_proof" class="cursor-pointer">
                                <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-2"></i>
                                <p class="text-gray-600">Klik untuk upload bukti transfer</p>
                                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG (Maks. 2MB)</p>
                            </label>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300">
                            <i class="fas fa-paper-plane mr-2"></i> Konfirmasi Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>