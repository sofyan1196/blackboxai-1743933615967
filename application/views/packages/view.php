<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($package->name) ?></h1>
                    <p class="text-blue-600 font-medium"><?= htmlspecialchars($package->region) ?> Region</p>
                </div>
                <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                    Available
                </span>
            </div>

            <div class="prose max-w-none mb-8">
                <p class="text-gray-700"><?= nl2br(htmlspecialchars($package->description)) ?></p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gray-50 p-5 rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Package Specifications</h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between">
                            <span class="text-gray-600">Data Amount:</span>
                            <span class="font-medium"><?= htmlspecialchars($package->data_amount) ?></span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Validity Period:</span>
                            <span class="font-medium"><?= $package->validity_days ?> days</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Activation:</span>
                            <span class="font-medium">Instant</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Support:</span>
                            <span class="font-medium">24/7</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-blue-50 p-5 rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Pricing</h3>
                    <div class="flex items-end justify-between mb-4">
                        <div>
                            <span class="text-4xl font-bold text-blue-600">$<?= number_format($package->price, 2) ?></span>
                            <span class="text-gray-500 text-sm">one-time payment</span>
                        </div>
                        <?php if($this->session->userdata('logged_in')): ?>
                            <a href="<?= site_url('dashboard/buy_package/'.$package->id) ?>" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition shadow-md">
                                Buy Now
                            </a>
                        <?php else: ?>
                            <a href="<?= site_url('login?redirect=packages/view/'.$package->id) ?>" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition shadow-md">
                                Login to Purchase
                            </a>
                        <?php endif; ?>
                    </div>
                    <p class="text-sm text-gray-600">* Price includes all taxes and fees</p>
                </div>
            </div>

            <div class="border-t pt-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-3">Coverage Details</h3>
                <div class="prose max-w-none">
                    <p>This eSIM package provides coverage in the following countries:</p>
                    <ul class="list-disc pl-5">
                        <li>United Kingdom</li>
                        <li>France</li>
                        <li>Germany</li>
                        <li>Italy</li>
                        <li>Spain</li>
                        <li>And 20+ more European countries</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>