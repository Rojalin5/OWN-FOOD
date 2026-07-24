# 🍔 OwnFood - Online Food Ordering System

OwnFood is a web-based food ordering application built using PHP and MySQL. It allows customers to create an account, browse available food items, add products to their cart, place orders, make payments, and track their orders.

The project also includes a simple admin panel for managing food items and customer orders.

## ✨ Features

### 👤 User Features

- User Registration
- User Login & Logout
- Session-based Authentication
- User Dashboard
- Browse Available Food Items
- Add Food to Cart
- Update Cart Quantity
- Remove Items from Cart
- Checkout System
- Cash on Delivery
- Razorpay Online Payment
- Order History
- Order Details
- Order Tracking
- User Profile

### 🛠️ Admin Features

- Admin Login
- Admin Dashboard
- Manage Food Items
- Add New Food Items
- Edit Food Items
- Delete Food Items
- Manage Customer Orders
- Update Order Status

## 💻 Tech Stack

**Frontend**
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- Bootstrap Icons

**Backend**
- PHP

**Database**
- MySQL

**Payment Gateway**
- Razorpay

**Development Environment**
- XAMPP
- phpMyAdmin

## 📁 Project Structure

```text
OWN_FOOD/
│
├── admin/          # Admin dashboard and management
├── assets/         # CSS, images and frontend assets
├── auth/           # Authentication logic
├── config/         # Database configuration
├── user/           # Customer dashboard and ordering features
│
├── index.php       # Home page
├── order.php       # Public order/menu page
├── contact.php     # Contact page
├── log-in.php      # Login page
├── sign-up.php     # Registration page
└── README.md
```

## 🔄 Application Flow

```text
Home Page
   ↓
Sign Up / Login
   ↓
User Dashboard
   ↓
Browse Food
   ↓
Add to Cart
   ↓
Cart
   ↓
Checkout
   ↓
COD / Razorpay Payment
   ↓
Order Placed
   ↓
Order History
   ↓
Order Tracking
```

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone YOUR_REPOSITORY_URL
```

### 2. Move the project

Place the project inside your XAMPP `htdocs` directory.

Example on macOS:

```text
/Applications/XAMPP/xamppfiles/htdocs/OWN_FOOD
```

### 3. Start XAMPP

Start:

```text
Apache
MySQL
```

### 4. Create the database

Open phpMyAdmin and create a database named:

```text
OWN_FOOD
```

Import the project's SQL database file if provided.

### 5. Configure database connection

Update the database configuration inside:

```text
config/db.php
```

according to your local MySQL configuration.

### 6. Run the application

Open:

```text
http://localhost/OWN_FOOD/
```

## 💳 Payment

The project supports:

- Cash on Delivery
- Razorpay Online Payment

For development and testing, Razorpay should be configured using **Test Mode credentials**.

> Never commit Razorpay secret keys or other sensitive credentials to GitHub.

## 🔐 Security

The application uses:

- PHP Sessions for authentication
- Password hashing
- User/Admin role separation
- Protected user and admin pages

## 🚀 Future Improvements

Possible improvements include:

- Food image management
- Coupon system
- Email order notifications
- Better mobile responsiveness
- Advanced admin reports
- Customer reviews and ratings

## 👩‍💻 Author

**Rojalin Barik**

MCA Student  
Web Development Project

## 📄 License

This project was developed for educational and learning purposes.
