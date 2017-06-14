-- Esto es un comentario

-- Primero tratamos de borrar la base, en caso de que exista

DROP DATABASE IF EXISTS ecoticket_db;

CREATE DATABASE ecoticket_db;

/*
Esto es otro comentario
pero
este es
multi
linea
*/

USE ecoticket_db;

CREATE TABLE user (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_json             VARCHAR(50) NOT NULL,
    mail                VARCHAR(50) NOT NULL,
    name                VARCHAR(50) NOT NULL,
    lastName            VARCHAR(50) NOT NULL,
    pass                VARCHAR(72) NOT NULL
);

-- INSERT INTO genero (nombre, ranking, activo, fecha_de_creacion) VALUES
-- ('Comedia', 1, 1, '2016-7-04'),
-- ('Terror', 2, 1, '2014-7-04'),
-- ('Drama', 3, 1, '2013-7-04'),
-- ('Accion', 4, 1, '2011-7-04'),
-- ('Ciencia Ficcion', 5, 1, '2010-7-04'),
-- ('Suspenso', 6, 1, '2013-7-04'),
-- ('Animacion', 7, 1, '2005-7-04'),
-- ('Aventuras', 8, 1, '2003-7-04'),
-- ('Documental', 9, 1, '2008-7-04'),
-- ('Infantiles', 10, 1, '2013-7-04'),
-- ('Fantasia', 11, 1, '2011-7-04'),
-- ('Musical', 12, 1, '2013-7-04')
-- ;
--
-- INSERT INTO pelicula (titulo, rating, premios, fecha_de_estreno, duracion, id_genero) VALUES
-- ('Avatar', 7.9, 3, '2010-10-04', 120, 5),
-- ('Titanic', 7.7, 11, '1997-9-04', 320, 3),
-- ('La Guerra de las galaxias: Episodio VI', 9.1, 7, '2004-7-04', NULL, 5),
-- ('La Guerra de las galaxias: Episodio VII', 9, 6, '2003-11-04', 180, 5),
-- ('Parque Jurasico', 8.3, 5, '1999-1-04', 270, 5),
-- ('Harry Potter y las Reliquias de la Muerte - Parte 2', 9, 2, '2008-7-04', 190, 6),
-- ('Transformers: el lado oscuro de la luna', 0.9, 1, '2005-7-04', NULL, 5),
-- ('Harry Potter y la piedra filosofal', 10, 1, '2008-4-04', 120, 8),
-- ('Harry Potter y la cámara de los secretos', 3.5, 2, '2009-8-04', 200, 8),
-- ('El rey león', 9.1, 3, '2000-2-04', NULL, 10),
-- ('Alicia en el país de las maravillas', 5.7, 2, '2008-7-04', 120, NULL),
-- ('Buscando a Nemo', 8.3, 2, '2000-7-04', 110, 7),
-- ('Toy Story', 6.1, 0, '2008-3-04', 150, 7),
-- ('Toy Story 2', 3.2, 2, '2003-4-04', 120, 7),
-- ('La vida es bella', 8.3, 5, '1994-10-04', NULL, 3),
-- ('Mi pobre angelito', 3.2, 1, '1989-1-04', 120, 1),
-- ('Intensamente', 9, 2, '2008-7-04', 120, 7),
-- ('Carrozas de fuego', 9.9, 7, '1980-7-04', 180, NULL),
-- ('Big', 7.3, 2, '1988-2-04', 130, 8),
-- ('I am Sam', 9, 4, '1999-3-04', 130, 3),
-- ('Hotel Transylvania', 7.1, 1, '2012-5-04', 90, 10)
-- ;
