<h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-2">Total Users</h3>
        <p class="text-3xl font-bold text-blue-600"><?= count($users) ?></p>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4">Recent Users</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">ID</th>
                    <th class="text-left py-2">Name</th>
                    <th class="text-left py-2">Email</th>
                    <th class="text-left py-2">Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2"><?= $user->id ?></td>
                    <td class="py-2"><?= htmlspecialchars($user->name) ?></td>
                    <td class="py-2"><?= htmlspecialchars($user->email) ?></td>
                    <td class="py-2"><?= ucfirst($user->role) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>