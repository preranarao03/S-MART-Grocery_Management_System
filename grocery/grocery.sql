-- Simplified Grocery Store Database Schema

CREATE DATABASE IF NOT EXISTS grocery;
USE grocery;

-- Table for Users (Customers and Employees)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role ENUM('customer', 'employee') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample products
INSERT INTO products (name, description, price, stock) VALUES
('Apple', 'Red Apple', 10, 100),
('Banana', 'Yellow Banana', 8, 150),
('Orange', 'Juicy Orange', 9, 120),
('Milk', '1L Amul Milk', 15, 50),
('Bread', 'Whole Wheat Bread', 15, 50),
('Eggs', 'White Eggs', 7, 100),
('Chicken', '1kg Chicken Breast', 20, 50),
('Rice', '1kg Basmati Rice', 30, 40),
('Pasta', '500g Italian Pasta', 24, 75),
('Tomato', 'Red Tomato', 15, 130),
('Potato', 'Brown Potatoes', 12, 140),
('Onion', 'Purple Onions', 10, 110),
('Carrot', 'Orange Carrots', 12, 90),
('Cheese', '200g Cheddar Cheese', 30, 60),
('Butter', '200g Amul Butter', 10, 70),
('Yogurt', '500g Amul Yogurt', 30, 80),
('Juice', '1 Liter Orange Juice', 30, 100),
('Cereal', '500g Kellogs Cereal', 45, 40),
('Tea', '100g Green Tea', 20, 50),
('Coffee', '200g Ground Coffee', 45, 60);

-- Table for Cart
CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Table for Transactions
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table for Transaction Details (Items Purchased)
CREATE TABLE IF NOT EXISTS transaction_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (transaction_id) REFERENCES transactions(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Sample Data for Testing
INSERT INTO users (username, password, email, role) VALUES 
('saksham', MD5('saksham'), 'saksham@saksham.com', 'customer'),
('prerana', MD5('prerana'), 'prerana@prerana.com', 'employee');
