-- Практика 19. База myFirstDataBase и таблица myFirstTable

CREATE DATABASE IF NOT EXISTS myFirstDataBase;
USE myFirstDataBase;

CREATE TABLE IF NOT EXISTS myFirstTable (
    id INT(11) NOT NULL AUTO_INCREMENT,
    myName TINYTEXT,
    myAge INT(4),
    PRIMARY KEY (id)
);

INSERT INTO myFirstTable VALUES (NULL, 'Sergey', 49);
INSERT INTO myFirstTable VALUES (NULL, 'Сергей', 49);
INSERT INTO myFirstTable VALUES (NULL, 'Ольга', 20);

-- Примеры запросов (выполнять отдельно при необходимости):
-- SELECT * FROM myFirstTable;
-- SELECT * FROM myFirstTable WHERE myAge > 40;
-- SELECT * FROM myFirstTable WHERE myAge < 30;
-- UPDATE myFirstTable SET myAge = 35 WHERE myName = 'Ольга';
-- DELETE FROM myFirstTable WHERE myName = 'Sergey';
