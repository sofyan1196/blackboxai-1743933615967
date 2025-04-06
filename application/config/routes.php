<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default route
$route['default_controller'] = 'packages/index';

// Authentication routes
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// Packages routes
$route['packages'] = 'packages/index';
$route['packages/view/(:num)'] = 'packages/view/$1';

// Dashboard routes
$route['dashboard'] = 'dashboard/index';
$route['dashboard/buy_package/(:num)'] = 'dashboard/buy_package/$1';

// Admin routes
$route['admin'] = 'admin/index';
$route['admin/users'] = 'admin/users';
$route['admin/packages'] = 'admin/packages';
$route['admin/orders'] = 'admin/orders';

// Pages routes
$route['about'] = 'pages/about';

// 404 Override
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;