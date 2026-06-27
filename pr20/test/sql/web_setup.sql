-- Практика 20. База web для проекта (admin + users)

CREATE DATABASE IF NOT EXISTS web CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE web;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    phone VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(100) NOT NULL UNIQUE,
    password_hash CHAR(32) NOT NULL
);

-- Пользователь только для базы web (выполнять под root)
CREATE USER IF NOT EXISTS 'web_user'@'localhost' IDENTIFIED BY 'web_pass';
GRANT ALL PRIVILEGES ON web.* TO 'web_user'@'localhost';
FLUSH PRIVILEGES;
