CREATE DATABASE IF NOT EXISTS libreria;

USE libreria;

CREATE TABLE productos(
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
categoria VARCHAR(50) NOT NULL,
precio DECIMAL(10,2) NOT NULL,
stock INT NOT NULL,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos(nombre,categoria,precio,stock)
VALUES
('Lapiz Faber Castell','Lapices',2.50,100),
('Cuaderno Gloria','Cuadernos',15.00,50),
('Marcador Permanente','Marcadores',8.00,30);