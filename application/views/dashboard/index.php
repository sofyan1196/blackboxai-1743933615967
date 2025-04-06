<h2 class="text-2xl font-bold mb-6">Welcome, <?= htmlspecialchars($user->name) ?></h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Your eSIM Packages</h3>
        <div class="space-y-4">
            <!-- Dummy data - replace with actual data from model -->
            <div class="border p-4 rounded-lg">
                <h4 class="font-medium">Europe Travel Package</h4>
                <p class="text-sm text-gray-600">Expires: 2023-12-31</p>
                <p class="text-sm text-gray-600">Data: 5GB remaining</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="#" class="block p-3 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition">
                Buy New eSIM
            </a>
            <a href="#" class="block p-3 bg-green-100 text-green-800 rounded-lg hover:bg-green-200 transition">
                Top Up Account
            </a>
            <a href="<?= site_url('logout') ?>" class="block p-3 bg-red-100 text-red-800 rounded-lg hover:bg-red-200 transition">
                Logout
            </a>
        </div>
    </div>
</div>