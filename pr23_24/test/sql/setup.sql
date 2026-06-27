-- Практика 23-24. Те же базы, что в практике 22 (adminBase, dataBase)

CREATE DATABASE IF NOT EXISTS `adminBase` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS `dataBase` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `adminBase`;
CREATE TABLE IF NOT EXISTS admin_table (
    id INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

USE `dataBase`;
CREATE TABLE IF NOT EXISTS user_data (
    id INT(11) NOT NULL AUTO_INCREMENT,
    userName TINYTEXT,
    userAge INT(4),
    PRIMARY KEY (id)
);
