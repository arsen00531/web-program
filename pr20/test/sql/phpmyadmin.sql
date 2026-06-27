CREATE DATABASE IF NOT EXISTS myFirstDataBase CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE myFirstDataBase;

CREATE TABLE IF NOT EXISTS myFirstTable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    myName VARCHAR(100) NOT NULL,
    myAge INT NOT NULL
);

INSERT INTO myFirstTable (myName, myAge) VALUES
('Anna', 22),
('Boris', 30),
('Anna', 18);

CREATE DATABASE IF NOT EXISTS library CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE library;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author VARCHAR(100) NOT NULL,
    title VARCHAR(200) NOT NULL,
    year INT NOT NULL
);

INSERT INTO books (author, title, year) VALUES
('Tolstoy', 'War and Peace', 1869),
('Pushkin', 'Eugene Onegin', 1833),
('Tolstoy', 'Anna Karenina', 1877);

USE myFirstDataBase;
SELECT * FROM myFirstTable ORDER BY myName;
SELECT * FROM myFirstTable ORDER BY myName, myAge;
SELECT * FROM myFirstTable ORDER BY myName DESC;

USE library;
SELECT author, title, year FROM books ORDER BY author ASC, year DESC;

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
    password VARCHAR(100) NOT NULL
);

CREATE USER IF NOT EXISTS 'web_user'@'localhost' IDENTIFIED BY 'web_pass';
GRANT ALL PRIVILEGES ON web.* TO 'web_user'@'localhost';
FLUSH PRIVILEGES;