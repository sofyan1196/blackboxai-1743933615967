
Built by https://www.blackbox.ai

---

```markdown
# ESIM Access

ESIM Access is a web application that facilitates the purchasing and management of Electronic SIM (ESIM) packages. The application provides an admin dashboard for managing products and orders, as well as an interface for customers to purchase ESIM packages.

## Project Overview

This project allows administrators to log in, add products, manage orders, and view customer purchases. Customers can browse available ESIM packages and make purchases through a user-friendly web interface. The application is built with PHP and utilizes a database for storing product and order information.

## Installation

To set up the ESIM Access application locally, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd esim-access
   ```

2. **Set up a web server:**
   Ensure you have a PHP server running, such as Apache or Nginx. You can use software like [XAMPP](https://www.apachefriends.org/index.html) or [MAMP](https://www.mamp.info/en/) for local development.

3. **Set up the database:**
   - Create a database in your MySQL server (e.g., `esim_access`).
   - Import the necessary SQL scripts to create required tables like `admins`, `products`, and `orders`. These scripts are not included in the project files and should be created based on application requirements.

4. **Configure your environment:**
   - Update the `config.php` file with your database connection details:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'esim_access');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     ```

5. **Access the application:**
   Open your web browser and visit `http://localhost/esim-access/` to view the application.

## Usage

1. **Admin Login:**
   - Navigate to the Admin Login page by visiting `admin_login.php`.
   - Enter your email and password to log in.

2. **Admin Dashboard:**
   - After logging in, you will be redirected to the Admin Dashboard where you can see statistics, manage products, and view orders.

3. **Product Management:**
   - Go to the "Add Product" section to add new ESIM packages.
   - Manage existing orders in the "Manage Orders" section.

4. **Customer Purchasing:**
   - Customers can view available ESIM packages on the main page (`index.php`) and proceed to purchase by following the prompts.

## Features

- Admin authentication and authorization
- Admin dashboard with order and product stats
- Product management (add, edit, delete)
- View and manage customer orders
- Responsive design using Tailwind CSS
- Email notifications for new orders
- Handle file uploads for payment proof

## Dependencies

The application requires the following PHP packages and libraries:

- **PHPMailer** (for sending email notifications)
- **PDO** (for database interactions)

Make sure that PHP's `mbstring`, `exif`, and `fileinfo` extensions are enabled in your PHP configuration.

## Project Structure

```
.
├── admin_auth.php            # Handles admin authentication logic
├── admin_dashboard.php       # Admin dashboard displaying statistics and recent orders
├── admin_login.php           # Admin login page
├── add_product.php           # Form to add new products
├── checkout.php              # Handles order checkout process
├── config.php                # Database connection and configuration
├── functions.php             # Utility functions for the application
├── index.php                 # Main entry point for customers to view products
├── logout.php                # Logs the admin out
├── manage_orders.php         # Admin page to manage customer orders
├── order_confirmation.php     # Confirmation page after a successful order
├── product_details.php       # Page displaying specific product details
├── uploads/                  # Directory for storing uploaded payment proof
└── vendor/                   # Directory containing installed dependencies
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing

If you would like to contribute to this project, feel free to submit a pull request. Please ensure to follow the coding standards and ensure that no new errors are introduced.

---

For any additional questions or suggestions, please open an issue in the repository.
```