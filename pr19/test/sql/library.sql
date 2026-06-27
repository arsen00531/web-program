-- Практика 19. База library и таблица books

CREATE DATABASE IF NOT EXISTS library;
USE library;

CREATE TABLE IF NOT EXISTS books (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title TINYTEXT,
    author TINYTEXT,
    year VARCHAR(4),
    PRIMARY KEY (id)
);

INSERT INTO books VALUES (NULL, 'Война и мир', 'Л.Н. Толстой', '1870');
INSERT INTO books VALUES (NULL, 'Трудно быть богом', 'АБС', '1960');
INSERT INTO books VALUES (NULL, 'Три товарища', 'Е.М. Ремарк', '1930');
INSERT INTO books VALUES (NULL, 'Понедельник начинается в субботу', 'АБС', '1965');

-- Примеры:
-- SHOW DATABASES;
-- SHOW TABLES;
-- DESCRIBE books;
-- SELECT * FROM books;
-- SELECT * FROM books WHERE year < '1950';
-- UPDATE books SET year = '1961' WHERE title = 'Трудно быть богом';
