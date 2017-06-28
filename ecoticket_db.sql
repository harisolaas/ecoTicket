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
    id_buyer            INT NOT NULL,
    id_seller           INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    barcode             INT NOT NULL,
    name                VARCHAR(25) NOT NULL,
    sht_desc            VARCHAR(50) DEFAULT NULL,
    lg_desc             VARCHAR(100) DEFAULT NULL,
    id_brand            INT NOT NULL
);

CREATE TABLE brands(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name                VARCHAR(50)
);

CREATE TABLE categories(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name                VARCHAR(50)
);

CREATE TABLE transactions_products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_transaction      INT NOT NULL,
    id_product          INT NOT NULL
);

CREATE TABLE buyers_sellers(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_buyer            INT NOT NULL,
    id_seller           INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP,
    ts                  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE buyers_products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_buyer            INT NOT NULL,
    id_product          INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP,
    ts                  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE sellers_products(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_sellers          INT NOT NULL,
    id_product          INT NOT NULL,
    dt                  DATETIME DEFAULT CURRENT_TIMESTAMP,
    ts                  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE products_categories(
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_product          INT NOT NULL,
    id_categorie        INT NOT NULL
);

INSERT INTO buyers (mail,name,last_name,pass) VALUES ('h.solaas1@gmail.com','Hari','Solaas','$2y$10$YuVs9crpdc/w1WIFQw8zB.JqsgJ7NU/cb8DcuHnqxXze9rCuvit5G');

INSERT INTO sellers (user_name,pass) VALUES ('SkyguySA','$2y$10$YuVs9crpdc/w1WIFQw8zB.JqsgJ7NU/cb8DcuHnqxXze9rCuvit5G');
