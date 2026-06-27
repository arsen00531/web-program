-- Практика 22. adminBase и dataBase
-- Имена в обратных кавычках: dataBase конфликтует с парсером MariaDB без них

CREATE DATABASE IF NOT EXISTS `adminBase` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS `dataBase` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `adminBase`;
CREATE TABLE IF NOT EXISTS admin_table (
    id INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(100) NOT NULL,
    password_hash CHAR(32) NOT NULL,
    PRIMARY KEY (id)
);

USE `dataBase`;
CREATE TABLE IF NOT EXISTS user_data (
    id INT(11) NOT NULL AUTO_INCREMENT,
    userName TINYTEXT,
    userAge INT(4),
    PRIMARY KEY (id)
);
