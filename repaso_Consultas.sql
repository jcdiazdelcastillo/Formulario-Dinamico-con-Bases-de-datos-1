/*REPASO CONSULTAS SQL*/

/*------------CONSULTAS DE AGREGADO-----------*/
/*COUNT*/
/*CONTAR EL NÚMERO TOTAL DE USUARIOS*/
SELECT COUNT (*) AS totalUsuarios
FROM usuarios;

/*CONTAR EL NUMERO DE USUARIOS QUE SE LLAMEN LUCIA LOPEZ*/
SELECT COUNT (*) AS totalUsuarios
FROM usuarios
WHERE nombre = 'lucía lópez';


/*CONTAR CUANTOS USUARIOS TIENE CADA PATROCINIO*/
SELECT patrocinios.idPatrocinio, COUNT(usuarios.idUsuario) AS totalUsuarios
FROM usuarios
INNER JOIN patrocinios ON usuarios.idPatrocinio = patrocinios.idPatrocinio
GROUP BY patrocinios.idPatrocinio;

/*CONTAR CUANTOS DEPORTES HACE CADA USUARIO*/
select usuarios.nombre, COUNT(deportes_usuarios.idDeporte) AS 'totalDeportes'
FROM usuarios
INNER JOIN deportes_usuarios ON usuarios.idUsuario=deportes_usuarios.idUsuario
GROUP BY usuarios.idUsuario

/*mostrar usuarios y sus marcas*/
SELECT usuarios.nombre, marcas.nombre AS nombreMarca
FROM usuarios
INNER JOIN marcas on usuarios.idMarca = marcas.idMarca

/*Mostrar usuarios y sus patrocinios*/
SELECT usuarios.nombre, patrocinios.tipoPatrocinio
FROM usuarios
INNER JOIN patrocinio on usuarios.idPatrocinio= Patrocinios.idPatrocinio


/* -------------------CONSULTAS DE DOS Y TRES TABLA CON OPERADORES*/
--Usuarios y su marca
SELECT usuarios.nombre, marcas.nombre FROM usuarios
INNER JOIN marcas on usuarios.idMarca = marcas.idMarca;

--usuario con el patrocinio completo
SELECT usuarios.nombre, tipoPatrocinio FROM usuarios
INNER JOIN patrocinios on usuarios.idPatrocinio = patrocinios.idPatrocinio
WHERE tipoPatrocinio LIKE'complet_'; /*POR PRACTICAR*/

SELECT usuarios.nombre, tipoPatrocinio FROM usuarios
INNER JOIN patrocinios on usuarios.idPatrocinio = patrocinios.idPatrocinio
WHERE tipoPatrocinio LIKE %completa%; /*POR PRACTICAR*/

--Usuarios cuya marca no sea Nike
SELECT * from usuarios 
INNER JOIN marcas on usuarios.idMarca=marcas.idMarca
WHERE marcas.nombre != "nike"

--Usuarios q practican el deporte "TENIS" y "FUTBOL"
SELECT usuarios.nombre, deportes.nombre FROM usuarios
INNER JOIN deportes_usuarios on deportes_usuarios.idUsuario = usuarios.idUsuario
INNER JOIN deportes on deportes_usuarios.idDeporte = deportes.idDeporte
where deportes.nombre IN('Tenis', 'Futbol');

--USUARIOS Q PRACTICAN DEPORTES ENTRE LOS DEPORTES 1 Y 3
SELECT usuarios.nombre, deportes.nombre FROM usuarios
INNER JOIN deportes_usuarios on deportes_usuarios.idUsuario = usuarios.idUsuario
INNER JOIN deportes on deportes_usuarios.idDeporte = deportes.idDeporte
where deportes.idDeporte BETWEEN 1 AND 3;