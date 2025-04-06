<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'ESIM Access' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="<?= site_url('/') ?>" class="flex items-center">
                    <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 text-xl font-bold text-gray-800">ESIM Access</span>
                </a>
                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="<?= site_url('packages') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">Packages</a>
                    <a href="<?= site_url('about') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">About</a>
                    
                    <?php if($this->session->userdata('logged_in')): ?>
                        <a href="<?= site_url('dashboard') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition font-medium">Dashboard</a>
                        <a href="<?= site_url('logout') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">Logout</a>
                    <?php else: ?>
                        <a href="<?= site_url('login') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">Login</a>
                        <a href="<?= site_url('register') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition font-medium">Sign Up</a>
                    <?php endif; ?>
                </nav>
                
                <!-- Mobile menu button -->
                <button class="md:hidden text-gray-600 focus:outline-none" id="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div class="md:hidden hidden pt-4" id="mobile-menu">
                <div class="flex flex-col space-y-4">
                    <a href="<?= site_url('packages') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">Packages</a>
                    <a href="<?= site_url('about') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">About</a>
                    
                    <?php if($this->session->userdata('logged_in')): ?>
                        <a href="<?= site_url('dashboard') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition font-medium text-center">Dashboard</a>
                        <a href="<?= site_url('logout') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">Logout</a>
                    <?php else: ?>
                        <a href="<?= site_url('login') ?>" class="text-gray-600 hover:text-blue-600 transition font-medium">Login</a>
                        <a href="<?= site_url('register') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition font-medium text-center">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <main class="min-h-screen">
        <!-- Mobile menu toggle script -->
        <script>
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        </script>