SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE divinedew CHARACTER SET utf8 COLLATE utf8_general_ci;

USE divinedew;

DROP TABLE IF EXISTS profile;
CREATE TABLE IF NOT EXISTS profile(
    id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products(
    id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS popular_products;
CREATE TABLE IF NOT EXISTS popular_products (
    id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (product_name, image, price) VALUES
('DivineDew Ocean Breeze', 'product1.webp', 129),
('DivineDew Amber Sunset', 'product2.webp', 179),
('DivineDew Citrus Burst', 'product3.webp', 199),
('DivineDew Vanilla Orchid', 'product4.webp', 199),
('DivineDew Moonlit Garden', 'product5.webp', 189),
('DivineDew Emerald Isle', 'product6.webp', 159),
('DivineDew Fiery Spice', 'product7.webp', 189),
('DivineDew Tuscan Sun', 'product8.webp', 139),
('DivineDew Winter Frost', 'product9.webp', 139),
('DivineDew Celestial Rain', 'product10.webp', 129),
('DivineDew Celestial Rain', 'product11.webp', 149),
('DivineDew Blossom Bliss', 'product15.webp', 129),
('DivineDew Midnight Jasmine', 'product12.webp', 159),
('DivineDew Lavender Dreams', 'product13.webp', 169),
('DivineDew Golden Sands', 'product14.webp', 149);

INSERT INTO popular_products (product_name, image, price) VALUES
('DivineDew Winter Frost', 'product9.webp', 139),
('DivineDew Midnight Jasmine', 'product12.webp', 159),
('DivineDew Vanilla Orchid', 'product4.webp', 199),
('DivineDew Golden Sands', 'product14.webp', 149);
