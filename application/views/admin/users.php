<h2 class="text-2xl font-bold mb-6">Manage Users</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">User List</h3>
        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Add New User
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">ID</th>
                    <th class="text-left py-2">Name</th>
                    <th class="text-left py-2">Email</th>
                    <th class="text-left py-2">Role</th>
                    <th class="text-left py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2"><?= $user->id ?></td>
                    <td class="py-2"><?= htmlspecialchars($user->name) ?></td>
                    <td class="py-2"><?= htmlspecialchars($user->email) ?></td>
                    <td class="py-2"><?= ucfirst($user->role) ?></td>
                    <td class="py-2 space-x-2">
                        <a href="#" class="text-blue-600 hover:underline">Edit</a>
                        <a href="#" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>