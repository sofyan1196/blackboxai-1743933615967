<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center">Available eSIM Packages</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach($packages as $package): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-xl font-semibold"><?= htmlspecialchars($package->name) ?></h2>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                        <?= htmlspecialchars($package->region) ?>
                    </span>
                </div>
                <p class="text-gray-600 mb-4"><?= htmlspecialchars($package->description) ?></p>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Data: <?= htmlspecialchars($package->data_amount) ?></p>
                        <p class="text-sm text-gray-500">Validity: <?= $package->validity_days ?> days</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-blue-600">$<?= number_format($package->price, 2) ?></p>
                        <a href="<?= site_url('packages/view/'.$package->id) ?>" 
                           class="inline-block mt-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition text-sm">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>