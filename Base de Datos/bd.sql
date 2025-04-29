CREATE DATABASE IF NOT EXISTS datafast;
USE datafast;
  
-- Tabla principal
CREATE TABLE IF NOT EXISTS datos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    email VARCHAR(100),
    ciudad VARCHAR(100),
    valor DECIMAL(10,2),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO datos (cedula, nombre, telefono, email, ciudad, valor)
VALUES 
('0102030405', 'Juan Pérez', '0991234567', 'juan@example.com', 'Quito', 29.99),
('0203040506', 'María García', '0987654321', 'maria@example.com', 'Guayaquil', 49.50);

-- Tabla de mensajes
CREATE TABLE IF NOT EXISTS mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mensajes (nombre, correo, mensaje)
VALUES 
('Pedro Sánchez', 'pedro@correo.com', 'Quisiera saber más sobre el servicio.');

-- Tabla de formularios de correos
CREATE TABLE IF NOT EXISTS formularios_correos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    asunto VARCHAR(200),
    mensaje TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO formularios_correos (nombre, email, asunto, mensaje)
VALUES 
('Lucía Torres', 'lucia@email.com', 'Consulta de pago', 'Hola, tengo una duda sobre el botón de pago.');

CREATE TABLE informacion (
    idTransaccion INT AUTO_INCREMENT PRIMARY KEY,
    referencia VARCHAR(100),
    valor DECIMAL(10,2),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO informacion (referencia, valor) 
VALUES ('ref12345', 25.00);
