DROP DATABASE IF EXISTS ecoticket_db;

CREATE DATABASE ecoticket_db;

USE ecoticket_db;

CREATE TABLE buyers (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    mail                VARCHAR(50) NOT NULL,
    name                VARCHAR(50) NOT NULL,
    last_name           VARCHAR(50) NOT NULL,
    pass                VARCHAR(72) NOT NULL
);

CREATE TABLE sellers (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_name           VARCHAR(50) NOT NULL,
    pass                VARCHAR(72) NOT NULL
);

CREATE TABLE transactions(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    buyer_id            INT NOT NULL,
    seller_id           INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    barcode             INT NOT NULL,
    name                VARCHAR(25) NOT NULL,
    short_desc          VARCHAR(50) DEFAULT NULL,
    long_desc           VARCHAR(100) DEFAULT NULL,
    price               INT NOT NULL,
    brand_id            INT NOT NULL
);

CREATE TABLE images(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    src                 VARCHAR(50) NOT NULL,
    product_id          INT NOT NULL
);

CREATE TABLE brands(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name                VARCHAR(50)
);

CREATE TABLE categories(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name                VARCHAR(50)
);

CREATE TABLE products_transactions(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    transaction_id      INT NOT NULL,
    product_id          INT NOT NULL
);

CREATE TABLE buyers_sellers(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    buyer_id            INT NOT NULL,
    seller_id           INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP,
    ts                  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE buyers_products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    buyer_id            INT NOT NULL,
    product_id          INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP,
    ts                  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE products_sellers(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sellers_id          INT NOT NULL,
    product_id          INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP,
    ts                  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE categories_products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    product_id          INT NOT NULL,
    categorie_id        INT NOT NULL
);

CREATE TABLE user_types(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_type           INT NOT NULL,
);

INSERT INTO buyers (mail,name,last_name,pass) VALUES ('h.solaas1@gmail.com','Hari','Solaas','$2y$10$YuVs9crpdc/w1WIFQw8zB.JqsgJ7NU/cb8DcuHnqxXze9rCuvit5G');

INSERT INTO sellers (user_name,pass) VALUES ('SkyguySA','$2y$10$YuVs9crpdc/w1WIFQw8zB.JqsgJ7NU/cb8DcuHnqxXze9rCuvit5G');
