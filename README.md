# Shoe Market - E-Commerce Project

## Project Overview
**Shoe Market** is a full-fledged e-commerce platform where users can browse, select, and purchase shoes from various categories. The platform also allows admins to manage products and monitor user orders efficiently. The website is fully responsive and designed for both desktop and mobile users.  

---

## Features

### User Features
- User registration and login
- Browse shoe products by category
- Add products to the cart
- Checkout products
- View order history
- Responsive design for all devices

### Admin Features
- View all user orders with details
- Mark orders as **Picked Up** or **Cancelled**
- Manage product listings
- Pagination and search for easier order management
- View product images and order totals

### Cart & Checkout Features
- Add multiple shoes to the cart
- Checkout transfers cart items to the database
- Automatic calculation of order totals
- Delete cart items after checkout

---

## Technologies Used
- **Backend:** PHP Laravel
- **Frontend:** HTML, CSS, Bootstrap 5
- **Database:** MySQL
- **Version Control:** Git
- **Other Tools:** VS Code, Postman

---

## Database Schema

### Tables

#### `user_info`
- `user_id` (Primary Key)
- `user_name`
- `email`
- `address`
- `city`

#### `user_cart`
- `cartId` (Primary Key)
- `userId` (Foreign Key → user_info.user_id)
- `product_name`
- `quantity`
- `price`
- `total`
- `image`
- `status` (Pending, Picked Up, Cancelled)
- `created_at`, `updated_at`

#### `products` (Optional if you have a products table)
- `product_id` (Primary Key)
- `name`
- `price`
- `category`
- `image`
- `description`
- `created_at`, `updated_at`

---

## Installation & Setup

Clone the repository and Run the Artisan commands
PHP ARTISAN OPTIMIZE
PHP ARTISAN MIGRATE
PHP ARTISAN SERVE
