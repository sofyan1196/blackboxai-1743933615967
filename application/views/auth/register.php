<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Register</h1>
        
        <?php if($this->session->flashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $this->session->flashdata('error') ?>
        </div>
        <?php endif; ?>

        <form action="<?= site_url('register') ?>" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-700 mb-2">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Register
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="<?= site_url('login') ?>" class="text-blue-600 hover:underline">Already have an account? Login</a>
        </div>
    </div>
</div>