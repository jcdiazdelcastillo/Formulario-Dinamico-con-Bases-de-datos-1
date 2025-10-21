CREATE TABLE preocupacion(
    idPreocupacion tinyint unsigned PRIMARY KEY AUTO_INCREMENT,
    nombre varchar (40) unique
);

INSERT INTO preocupacion (nombre) values 
("preocupado"),
("muy preocupado"),
("nada preocupado");


CREATE TABLE transportes (
    idTransporte TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

INSERT INTO transportes (nombre) VALUES
('Coche'), 
('Autobús'), 
('Bicicleta'), 
('A pie');


CREATE TABLE usuarios (
    idUsuario SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idTransporte TINYINT UNSIGNED NOT NULL,
    idPreocupacion TINYINT UNSIGNED NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    edad TINYINT UNSIGNED NOT NULL,
    FOREIGN KEY (idTransporte) REFERENCES transportes (idTransporte),
    FOREIGN KEY (idPreocupacion) REFERENCES preocupacion (idPreocupacion)
);


CREATE TABLE medidas (
    idMedida TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);
 INSERT INTO medidas (nombre) VALUES
 ('Vehículos eléctricos'),
 ('Transporte público'),
 ('Construir Carriles bici'),
 ('Mejorar el acerado');
 
CREATE TABLE usuarios_medidas (
    idUsuario smallint UNSIGNED NOT NULL,
    idMedida tinyint UNSIGNED NOT NULL,
    PRIMARY KEY (idUsuario, idMedida),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
/* DUDA ISA-> COMO PUEDO HACER PARA QUE ME DIGA QUE TODO EL FORMULARIO ESTÁ REPETIDO? YA TENGO EL UNIQUE CON USUARIO TRANSPORTE, PREOCUPACION
Y TERMINOS, PERO TAMBIEN HABRÍA QUE AÑADIR TRANSPORTE */